<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class CollectionShopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //收藏商品
    public function store(Request $request){

    	$res = Auth::user()->followThis_shop($request->shop_id);

        // 判断是否收藏店铺
    	if(count($res['attached'])>0){
    		return 1;
    	}else{
    		return 0;
    	}

    }
}
