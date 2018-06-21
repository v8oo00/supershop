<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Order;
use App\Address;
use Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //个人中心页面
    public function index(){
        $orders = Order::where('uid',Auth::id())->get();
        $AllAddress = Address::where('uid',Auth::id())->get();
        return view('home.user.index',compact('orders','AllAddress'));
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

    //确认收货
    public function changeStatus(Request $request){
        if(Order::findOrFail($request->id)->update(['status'=>2])){
            echo 'yes';
        }else{
            echo 'no';
        }
    }

    //添加地址
    public function addAddress(Request $request){
        if($address = Address::create($request->all())){
            return $address->id;
        }else{
            return 0;
        }
    }

    //删除地址
    public function delAddress(Request $request){

        //先查出来该地址是否为该用户的默认地址
        if(Auth::user()->address_id == $request->id){
            User::findOrFail(Auth::id())->update(['address_id'=>0]);
        }

        if(Address::destroy($request->id)){
            return 'yes';
        }else{
            return 'no';
        }
    }

    //设为默认地址
    public function swmr(Request $request){
        $address_id = Auth::user()->address_id;

        if(User::findOrFail(Auth::id())->update(['address_id'=>$request->id])){
            if($address_id != 0){
				echo $address_id;
			}else{
				echo 'yes';
			}
        }else{
            echo 'no';
        }
    }

    //验证旧密码
    public function changeOldPass(Request $request){
        if(Hash::check($request->oldpassword,Auth::user()->password)){
            return 'ok';
        }else{
            return 'no';
        }
    }

    //更改密码
    public function changePass(Request $request){
        if(User::findOrFail(Auth::id())->update(['password'=>bcrypt($request->password)])){
            return 'ok';
        }else{
            return 'no';
        }
    }
}
