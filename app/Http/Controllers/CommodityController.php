<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Commodity;
use App\Compic;
use App\Cart;
use App\Tag;
use App\Sku;
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

        return view('home.commodity.product',compact('commodity','tags'));
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
}
