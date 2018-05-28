<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Commodity;
class CommodityController extends Controller
{
    //
    public function index(){
        $commodities = Commodity::get();
        return view('admin.commodity.index',compact('commodities'));
    }
}
