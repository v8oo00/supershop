<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Activity;

class ActivityController extends Controller
{
    //
    public function index(){
        $activitys = Activity::get();
        return view('admin.activity.index',compact('activitys'));
    }

    public function create(){

        return view('admin.activity.add');
    }

    public function store(Request $request){
        $first_arr = explode(' - ',$request->reservation);

        $str = [];

        foreach($first_arr  as $k=>$v){
            $arr = array_reverse(explode('/',$v));

            $str_a = $arr[1];
            $str_b = $arr[2];

            $arr[1] = $str_b;
            $arr[2] = $str_a;

            $str[$k] = implode('-',$arr);
        }
        // dump($str);
         // $pic=$request->all();

         $destinationPath = "/admins/images/".date("Ym/d", time());

         $upload_path = public_path() . '/' . $destinationPath;

         $file = $request->file('image');

         $extension = strtolower($file->getClientOriginalExtension()) ?: 'png';
         $file_name = md5($file->getClientOriginalName()).time().'.'.$extension;

         $res = $file->move($upload_path,$file_name);


         $res = Activity::create([
             'name'=>$request->name,
             'route'=>$request->route,
             'rule'=>$request->rule,
             'image'=>$destinationPath.'/'.$file_name,
             'start_time'=>strtotime($str[0]),
             'end_time'=>strtotime($str[1])
         ]);

         if($res){
             return redirect()->action('Admin\ActivityController@index');
         }else{
             return back();
         }

    }
}
