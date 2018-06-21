<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Commodity;
use App\Shop;
class SearchController extends Controller
{
    //
    public function search(Request $request){
        // dd($request->all());
        if($request->search_dx == 1){
            $str = 'ok';
            $commodities = Commodity::where('name','like',"%{$request->search_xx}%")->where('status','=',1)->get();
            if(count($commodities) <= 0){
                $commodities = Commodity::where('status','=',1)->orderBy('sale','desc')->limit(30)->get();
                $str = 'no';
            }
            $commodities = get_shop_info($commodities);

            return view('home.search.show',compact(['commodities','str']));
        }else{
            $str = 'ok';

            $shops = Shop::where('name','like',"%{$request->search_xx}%")->where('status','=',1)->get();

            if(count($shops) <= 0){
                $shops = Shop::where('status','=',1)->limit(20)->get();
                $str = 'no';
            }
            $shops = get_com_by_shop($shops);
            return view('home.search.shop',compact(['shops','str']));
        }
    }
}
