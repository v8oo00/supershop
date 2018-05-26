<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CateController extends Controller
{
    //浏览所有分类
    public function index(){
        return view('Admin\cate.index');
    }

    //添加分类
    public function create(){
        return view('Admin\cate.create');
    }

    //执行添加分类
    public function store(){
        
    }
}
