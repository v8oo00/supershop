<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Activity;
use App\Commodity;

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

        $str = ChangeCalendarDays($request->reservation);

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

    public function edit(Request $request){
        // echo "aaaaa";
        $activity = Activity::findOrFail($request->id);

        // dd($activity);

        return view('admin.activity.edit',compact('activity'));
    }

    public function update(Request $request){
        // dd($request->all());
        $activity = Activity::findOrFail($request->id);

        $str = ChangeCalendarDays($request->reservation);

        if($request->hasFile('image')){

            $destinationPath = "/admins/images/".date("Ym/d", time());

            $upload_path = public_path() . '/' . $destinationPath;

            $file = $request->file('image');

            $extension = strtolower($file->getClientOriginalExtension()) ?: 'png';
            $file_name = md5($file->getClientOriginalName()).time().'.'.$extension;

            $res = $file->move($upload_path,$file_name);

            $res = $activity->update([
                'name'=>$request->name,
                'route'=>$request->route,
                'rule'=>$request->rule,
                'image'=>$destinationPath.'/'.$file_name,
                'start_time'=>strtotime($str[0]),
                'end_time'=>strtotime($str[1])
            ]);
        }else{
            $res = $activity->update([
                'name'=>$request->name,
                'route'=>$request->route,
                'rule'=>$request->rule,
                'start_time'=>strtotime($str[0]),
                'end_time'=>strtotime($str[1])
            ]);
        }

        if($res){
            return redirect()->action('Admin\ActivityController@index');
        }else{
            return back();
        }
    }

    public function delete(Request $request){
        // dd($request->id);
        $res = Activity::destroy($request->id);

        if($res){
            return redirect()->action('Admin\ActivityController@index');
        }else{
            return redirect()->action('Admin\ActivityController@index');
        }
    }

    public function addcom(Request $request){
        // dd($request->id);
        $act_coms = Activity::findOrFail($request->id)->commodities;

        $act_id = $request->id;

        $commodities = Commodity::where('activity_id','=','0')->where('status','=',1)->get();
        // dd($commodities);

        return view('admin.activity.actcom',compact(['act_coms','act_id','commodities']));
    }

    public function com_status(Request $request){
        $com = Commodity::findOrFail($request->id);

        if($com->activity_id == 0){
            $com->update(['activity_id'=>$request->activity_id]);
        }else{
            $com->update(['activity_id'=>0]);
        }
    }

    public function activity_commodity(Request $request){
        foreach($request->id as $k=>$v){
            Commodity::findOrFail($v)->update(['activity_id'=>$request->activity_id]);
        }
    }
}
