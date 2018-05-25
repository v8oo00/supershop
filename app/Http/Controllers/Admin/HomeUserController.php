<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\HomeUserRequest;
use App\Http\Controllers\Controller;

class HomeUserController extends Controller
{
    //前台用户管理首页
    public function index(){
        $homeUser = User::get()->toArray();
        $homeUser_json = json_encode($homeUser);
        return view('Admin\homeuser.index',compact('homeUser_json'));
    }

    public function create(){
        return view('Admin\homeuser.create');
    }

    public function store(HomeUserRequest $request){
        $homeUser = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return redirect()->action('Admin\HomeUserController@index');
    }
}
