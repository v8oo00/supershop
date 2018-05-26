<?php

namespace App\Http\Controllers\Admin;

use App\Shop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{
    //后台浏览店铺页面 进行状态的更改
    public function index(){
        $shops = Shop::get();
        return view('Admin\Shop.index',compact('shops'));
    }

    //后台店铺状态
    public function status(Request $request){
        $shop = Shop::findOrFail($request->id);
        if($shop->status == 1){
            $shop->status = 0;
            $shop->save();
        }else{
            $shop->status = 1;
            $shop->save();
        }
    }
}
