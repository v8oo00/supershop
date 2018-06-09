<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //个人中心页面
    public function index(){
        return view('home.user.index');
    }

    //修改头像页面
    public function updateAvatar(){
        $user = User::findOrFail(Auth::id());
        if($user->update($_POST)){
            return response()->json(['result'=>'ok','file'=>$_POST['avatar']]);
        };
    }

    //修改个人信息
    public function updateDetail(){
        $user = User::findOrFail(Auth::id());
        $arr = [
            $_POST['name']=>$_POST['value']
        ];
        if($user->update($arr)){
            return 'ok';
        }
    }

    //充值金额
    public function cz(){
        $user = User::findOrFail(Auth::id());

        $arr = [
            'money'=>$user->money + $_POST['money']
        ];

        //修改成功返回ok 并返回总余额
        if($user->update($arr)){
            return ['result'=>'ok','money'=>$user->money];
        }
    }
}
