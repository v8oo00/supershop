<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Requests\AdminUserRequest;
use App\Http\Controllers\Controller;

class AdminUserController extends Controller
{
    //后台管理员浏览
    public function index(){
        $adminUsers = Admin::get();
        return view('Admin\AdminUser.index',compact('adminUsers'));
    }

    //后台管理员添加
    public function create(){
        $roles = Role::get()->toArray();
        return view('Admin\AdminUser.create',compact('roles'));
    }

    //执行后台管理员添加
    public function store(AdminUserRequest $request){
        $adminUser = Admin::create([
            'name' => randString(10),
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
            'role_id' => $request->role_id,
            'qq' => randString(10),
            'avatar' => '/admins/images/img.jpg',
            'last_login' => 000000000,
            'ip' => '127.0.0.1'
        ]);

        return redirect()->action('Admin\AdminUserController@index');
    }

    //修改管理者的状态
    public function status(AdminUserRequest $request){
        $adminUser = Admin::findOrFail($request->id);
        if($adminUser->status == 1){
            $adminUser->status = 0;
            $adminUser->save();
        }else{
            $adminUser->status = 1;
            $adminUser->save();
        }
    }
}
