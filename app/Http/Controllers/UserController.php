<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
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
}
