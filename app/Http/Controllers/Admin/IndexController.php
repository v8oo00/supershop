<?php

namespace App\Http\Controllers\Admin;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
	public function __construct()
    {

    }

    /**
     * 显示后台管理模板首页
     */
    public function index(Request $Request)
    {

        return view('admin.index1');
    }
}
