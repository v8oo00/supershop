<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\HomeUserRequest;
use App\Http\Controllers\Controller;

class HomeUserController extends Controller
{
    //前台用户管理浏览
    public function index(){
        $homeUsers = User::get();
        return view('Admin\homeuser.index',compact('homeUsers'));
    }

    //添加前台用户页面
    public function create(){
        return view('Admin\homeuser.create');
    }

    //执行添加前台用户页面
    public function store(HomeUserRequest $request){
        $homeUser = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'avatar'=>'/admins/images/img.jpg',
            'password' => bcrypt($request->password)
        ]);

        return redirect()->action('Admin\HomeUserController@index');
    }

    //修改前台用户的状态
    public function status(HomeUserRequest $request){
        $homeUser = User::findOrFail($request->id);
        if($homeUser->status == 1){
            $homeUser->status = 0;
            $homeUser->save();
        }else{
            $homeUser->status = 1;
            $homeUser->save();
        }
    }
}
