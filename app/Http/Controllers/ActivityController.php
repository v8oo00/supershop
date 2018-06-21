<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;
use App\Commodity;
class ActivityController extends Controller
{
    //
    public function catactivity(Request $request){
        $activity = Activity::findOrFail($request->id);
        $commodities = Commodity::where('activity_id','=',$request->id)->where('status','=',1)->orderBy('sale','desc')->get();
        $commodities = get_shop_info($commodities);
        return view('home.activity.catactivity',compact(['activity','commodities']));
    }
}
