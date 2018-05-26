<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;

class RoleController extends Controller
{
    //
    public function index(){
        $roles=Role::get()->toArray();
        // dd($roles);
        return view('admin.role.index',compact('roles'));
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

    public function edit(Request $request){
        $roles=Role::findOrFail($request->id);
        // dd($roles);
        return view('admin.role.edit',compact('roles'));
    }

    public function update(Request $request){
        $role = Role::find($request->id);
        $role->r_name = $request->r_name;
        $role->desc = $request->desc;
        $res = $role->save();

        if($res){
            return redirect()->action('Admin\RoleController@index');
        }else{
            return back();
        }
    }

    public function delete(Request $request){
        // dd($request->id);

        $res = Role::destroy($request->id);

        if($res){
            return redirect()->action('Admin\RoleController@index');
        }else{
            return redirect()->action('Admin\RoleController@index');
        }
    }
}
