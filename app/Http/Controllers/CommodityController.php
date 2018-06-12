<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Commodity;
use App\Compic;
use App\Cart;
use App\Tag;
use App\Sku;
use App\Shop;
use App\Evaluate;
use App\Evaluatepic;
use Auth;
class CommodityController extends Controller
{
    public function product(Request $request){
        $commodity = Commodity::findOrFail($request->id);
        $commodity['picture'] = $commodity->compictures;
        foreach($commodity->skus as $sku){
            if($sku->stock != 0){
                $commodity['price'] = $sku->price;
                $commodity['sku_value'] = $sku->s_value;
                $commodity['stock'] = $sku->stock;
                $commodity['sku_id'] = $sku->id;
                break;
            }
        }

        $tags = Tag::where('c_id','=',$request->id)->get();
        foreach($tags as $tag){
            $tag['tag_val'] = $tag->HasOneTagVal;
        }

        $mshops_hsale = Commodity::where('shop_id','=',$commodity->shop_id)->where('id','!=',$commodity->id)->orderBy('sale','desc')->limit(8)->get();
        $mshops_hsale = get_shop_info($mshops_hsale);

        $mshops_bcate = Commodity::where('shop_id','=',$commodity->shop_id)->where('id','!=',$commodity->id)->where('cate_id','=',$commodity->cate_id)->orderBy('sale','desc')->get();
        $mshops_bcate = get_shop_info($mshops_bcate);

        $evaluates = Evaluate::where('commodity_id','=',$request->id)->orderBy('created_at','desc')->get();
        foreach($evaluates as $evaluate){
            $evaluate['image'] = $evaluate->HasManyEvaluatePic;
        }


        return view('home.commodity.product',compact('commodity','tags','mshops_hsale','mshops_bcate','evaluates'));
    }

    public function getclicksku(Request $request){
        // dd($request->all());
        $skus = Sku::where('c_id','=',$request->good_id)->get();
        $arr = explode(',',substr($request->skuid,1));
        foreach($skus as $sku){
            $res = check_skuid($arr,explode(',',$sku->s_value));
            if($res){
                return json_encode($sku);
                exit;
            }
            // dump($sku);
        }
        echo "no";
        // dd($skus);
    }


    //获取登录用户的购物车数据
    public function cart_data(){
        $carts = Cart::where('uid',Auth::id())->with('commodities','sku')->get();

        foreach($carts as $key=>$cart){
            $carts[$key]['pic'] = $cart->commodities->compictures->first()->image;
        }

        return $carts;
    }

    public function evaluate_pic(Request $request){
        $file = $request->file('file');
        $filePath =[];  // 定义空数组用来存放图片路径
        foreach($file as $key => $value) {
            // 判断图片上传中是否出错
            if (!$value->isValid()) {
                exit("上传图片出错，请重试！");
            }
            if(!empty($value)){//此处防止没有多文件上传的情况
                $destinationPath = '/homes/evaluate/pic/'.date('Y-m-d'); // public文件夹下面uploads/xxxx-xx-xx 建文件夹
                $extension = $value->getClientOriginalExtension();   // 上传文件后缀
                $fileName = date('YmdHis').mt_rand(100,999).'.'.$extension; // 重命名
                $value->move(public_path().$destinationPath, $fileName); // 保存图片
                $filePath[] = $destinationPath.'/'.$fileName;

            }
        }
        // 返回上传图片路径，用于保存到数据库中
        // return $filePath;
        foreach($filePath as $k=>$v){
            Evaluatepic::create([
                'evaluate_id'=>$request->evaluate,
                'image'=>$v
            ]);
        }
        return $request->evaluate;
    }

    public function evaluate_text(Request $request){
        // dd($request->all());
        $res = Evaluate::create([
            'user_id'=>Auth::User()->id,
            'text'=>$request->text,
            'score'=>$request->score,
            'commodity_id'=>$request->commodity_id,
        ]);
        return $res->id;
    }
}
