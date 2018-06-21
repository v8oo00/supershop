<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class CollectionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //收藏商品
    public function store(Request $request){

    	$res = Auth::user()->followThis($request->commodity_id);

        // 判断是否收藏商品
    	if(count($res['attached'])>0){
    		return 1;
    	}else{
    		return 0;
    	}

    }
}
