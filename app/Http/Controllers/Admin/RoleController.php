<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;

class RoleController extends Controller
{
    //
    public function index(){
        $role=Role::get()->toArray();
        $roleasds = json_encode($role);
        // dd($roles);
        return view('admin.role.index',compact('roleasds'));
    }

    public function add(){
        return view('admin.role.add');
    }

    public function store(Request $request){
        // dd($request->all());
        $res = Role::create([
            'r_name'=>$request->r_name,
            'desc'=>$request->desc,
        ]);
        if($res){
            return redirect()->action('Admin\RoleController@index');
        }else{
            return back();
        }
    }
}
