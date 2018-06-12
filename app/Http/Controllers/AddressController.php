<?php

namespace App\Http\Controllers;

use App\Address;
use Illuminate\Http\Request;
use App\Http\Requests\AddressRequest;

class AddressController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //添加地址
    public function add(Request $request){
        Address::create($request->all());

        return back();
    }
}
