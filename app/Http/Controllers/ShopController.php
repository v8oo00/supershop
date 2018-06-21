<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop;
use App\Commodity;
use Auth;
class ShopController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function admission(){
        $user = Auth::user();
        $shop = $user->shops;
        // dd($shop);
        if(!$shop){
            return view('home.shop.admission');
        }else{
            if($shop->status == 0 || $shop->status == 2){
                return view('home.shop.catshop',compact(['shop']));
            }else{
                // $commodities = $shop->commodity;
                $commodities=Commodity::where('shop_id','=',$shop->id)->paginate(2);
                return view('home.shop.indexshop',compact(['shop','commodities']));
            }
        }

    }

    public function check_name(Request $request){
        $shops = Shop::where('name','=',$request->name)->get();

        $count = $shops->count();

        return $count;
    }

    public function addshop(Request $request){

        $res = Shop::create([
            'name'=>$request->name,
            'desc'=>$request->desc,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'avatar'=>$request->avatar,
            'user_id'=>Auth::id()
        ]);

        if($res){
            return redirect()->action('ShopController@catshop',['id'=>$res->id]);
        }else{
            return back();
        }
    }

    public function catshop(Request $request){
        $shop = Shop::findOrFail($request->id);
        return view('home.shop.catshop',compact(['shop']));
    }

    public function status_com(Request $request){
        // echo "aaa";
        $com = Commodity::findOrFail($request->id);

        if($com->status == 1){
            $com->update(['status'=>0]);
        }else{
            $com->update(['status'=>1]);
        }
    }

    public function catdetail(Request $request){
        $com_one = Commodity::findOrFail($request->id);

        return view('home.shop.editcom',compact(['com_one']));
    }

    public function updatedetailpic(Request $request){
        $arr = ["errno"=>0,"data"=>[]];
        $file = $request->file('file');
        $filePath =[];  // 定义空数组用来存放图片路径
        foreach($file as $key => $value) {
            // 判断图片上传中是否出错
            if (!$value->isValid()) {
                exit("上传图片出错，请重试！");
            }
            if(!empty($value)){//此处防止没有多文件上传的情况
                $destinationPath = '/admins/commodity_detail/'.date('Y-m-d'); // public文件夹下面uploads/xxxx-xx-xx 建文件夹
                $extension = $value->getClientOriginalExtension();   // 上传文件后缀
                $fileName = date('YmdHis').mt_rand(100,999).'.'.$extension; // 重命名
                $value->move(public_path().$destinationPath, $fileName); // 保存图片
                $filePath[] = $destinationPath.'/'.$fileName;
                $arr['errno'] = 0;

            }
        }

        foreach($filePath as $k=>$v){
            array_push($arr['data'],$v);
        }
        return json_encode($arr);
    }

    public function updatedetail(Request $request){
        $this->validate($request,[
            'detail' => 'required',
        ],[
            'detail.required' => '商品详情未填写',
        ]);

        $com = Commodity::findOrFail($request->id);

        $com->update(['detail'=>$request->detail]);

        return redirect()->action('ShopController@admission');
    }

    //查询商品关联的标签
    public function tags(Request $request){
        $tags = Commodity::findOrFail($request->id)->tags;

        if(count($tags)>0){
            foreach($tags as $k=>$v){
                $goods[$v->name] = $v->HasOneTagVal;
            }
        }else{
            return 'no';
        }

        return $goods;

    }

    //执行添加商品的标签和标签值
    public function storetv(Request $request){
        $tag = Tag::create([
            'c_id' => $request->id,
            'name' => $request->tag
        ]);

        $val = Tvalue::create([
            't_id' => $tag->id,
            'value' => $request->value
        ]);

        if($tag && $val){
            return 'ok';
        }else{
            return 'no';
        }
    }

    //删除标签及标签值
    public function delete(Request $request){
        if(Tag::destroy($request->t_id) && Tvalue::destroy($request->v_id)){
            return 'ok';
        }else{
            return 'no';
        }
    }

    public function catsku(Request $request){
        return view('home.shop.catsku');
    }
}
