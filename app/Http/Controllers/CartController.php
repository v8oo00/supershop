<?php

namespace App\Http\Controllers;

use Auth;
use App\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //购物车页面
    public function index(){
        $carts = Cart::where('uid',Auth::id())->with('commodities','sku')->get();

        return view('home.cart.index',compact('carts'));
    }

    //添加购物车
    public function add(Request $request){
        //先判断自己的购物车中是否买过该商品
        $cart = Cart::where('uid',$request->uid)->where('sku_id',$request->sku_id)->first();

        if($cart){
            $temp = [];
            $temp['num'] = $cart['num']+$request->num;
            $cart->update($temp);
        }else{
            Cart::create($request->all());
        }

        return 'ok';
    }

    //更新购物车的库存
    public function update(Request $request){
        $cart = Cart::findOrFail($request->id);

        if($request->flag == '+'){
            $cart->increment('num');
        }else if($request->flag == '-'){
            $cart->decrement('num');
        }
    }

    //删除购物车数据
    public function del(Request $request){
        if(Cart::destroy($request->id)){
            return 'ok';
        }
    }
}
