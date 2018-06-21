<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;
use App\Commodity;
class ActivityController extends Controller
{
    //
    public function catactivity(Request $request){
        return view('home.activity.catactivity');
    }
}
