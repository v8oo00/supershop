<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Picture;
use App\Commodity;
use App\Cate;
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
        $pictures = Picture::get();
        $commodities = Commodity::where('status','=',1)->orderBy('sale','desc')->limit(5)->get();

        foreach($commodities as $commodity){
            foreach($commodity->skus as $key=>$sku){
                if($sku['stock'] != 0){
                    $commodity['price'] = $sku->price;
                    break;
                }
            }
            foreach($commodity->compictures as $k=>$pic){
                if($pic['status'] != 0){
                    $commodity['picture'] = $pic->image;
                    break;
                }
            }
        }

        $cates = Cate::where('pid','=',0)->get();

        foreach($cates as $cate){
            $arr = [];
            foreach(Cate::where('pid','=',$cate->id)->get() as $s_cate){
                array_push($arr,$s_cate->id);
            }
            $commodities_2 = Commodity::where('status','=',1)->whereIn('cate_id',$arr)->orderBy('sale','desc')->limit(10)->get();

            foreach($commodities_2 as $commodity){
                foreach($commodity->skus as $key=>$sku){
                    if($sku['stock'] != 0){
                        $commodity['price'] = $sku->price;
                        break;
                    }
                }
                foreach($commodity->compictures as $k=>$pic){
                    if($pic['status'] != 0){
                        $commodity['picture'] = $pic->image;
                        break;
                    }
                }
            }

            $cate['commodity'] = $commodities_2;
        }
        // dd($cates);
        $block = 'block';
        return view('home.index.index',compact('block','pictures','commodities','cates'));
    }

}
