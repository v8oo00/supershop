<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Picture;
use App\Commodity;
use App\Cate;
use App\Activity;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        // 轮播图
        $pictures = Picture::get();

        $activities = Activity::limit(2)->get();

        // 新上架商品
        $commodities = Commodity::where('status','=',1)->orderBy('created_at','desc')->limit(10)->get();

        $commodities = get_shop_info($commodities);

        // 分类以及分类下的商品
        $cates = Cate::where('pid','=',0)->get();

        foreach($cates as $cate){
            $arr = [];
            foreach(Cate::where('pid','=',$cate->id)->get() as $s_cate){
                array_push($arr,$s_cate->id);
            }
            $commodities_2 = Commodity::where('status','=',1)->whereIn('cate_id',$arr)->orderBy('sale','desc')->limit(10)->get();

            $commodities_2 = get_shop_info($commodities_2);

            $cate['commodity'] = $commodities_2;
        }

        // 热销商品
        $sale_com = Commodity::select(DB::raw("*,((sale+click_num)/2) as p"))->where('status','=',1)->orderBy('p','desc')->limit(20)->get();

        $sale_com = get_shop_info($sale_com);
        // dd($sale_com);
        // 菜单栏是否显示
        $block = 'block';
        return view('home.index.index',compact('block','pictures','commodities','cates','sale_com','activities'));
    }

}
