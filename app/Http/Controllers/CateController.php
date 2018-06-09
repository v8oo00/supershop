<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cate;
use App\Commodity;
use DB;
class CateController extends Controller
{
    //

    function lookfcate(Request $request){

        $f_cates = Cate::where('pid','=',0)->get();

        $s_cates = Cate::where('pid','=',$request->id)->get();

        $cate_id = $request->id;


        $arr = [];
        foreach($s_cates as $s_cate){
            array_push($arr,$s_cate->id);
        }
        $cate_commodity = Commodity::where('status','=',1)->whereIn('cate_id',$arr)->orderBy('sale','desc')->paginate(3);

        $cate_commodity = get_shop_info($cate_commodity);

        $cates_com = Commodity::where('status','=',1)->whereIn('cate_id',$arr)->orderBy('sale','desc')->get();

        $cates_com = get_shop_info($cates_com);


        return view('home.cate.lookfcate',compact(['f_cates','s_cates','cate_id','cate_commodity','cates_com']));
    }

    function lookscate(Request $request){
        // dd($request->id);
        $f_cates = Cate::where('pid','=',0)->get();

        $s_cates = Cate::where('pid','=',Cate::findOrFail($request->id)->pid)->get();

        $cate_id = $request->id;

        $cate_commodity = Commodity::where('status','=',1)->where('cate_id','=',$request->id)->orderBy('sale','desc')->paginate(3);

        $cate_commodity = get_shop_info($cate_commodity);

        $cates_com = Commodity::where('status','=',1)->where('cate_id',$request->id)->orderBy('sale','desc')->get();

        $cates_com = get_shop_info($cates_com);

        return view('home.cate.lookscate',compact(['f_cates','s_cates','cate_id','cate_commodity','cates_com']));


    }


}
