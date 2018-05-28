<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Picture;

class PictureController extends Controller
{
    //

    public function index(){
        $pictures = Picture::get();
        return view('admin.picture.index',compact('pictures'));
    }

    public function create(){

        if(Picture::get(['id'])->toArray()){

            $p_maxid = max(Picture::get(['id'])->toArray())['id']+1;
        }else{

            $p_maxid = 1;
        }
        return view('admin.picture.add',compact('p_maxid'));
    }

    public function store(Request $request){

        $this->validate($request, [
            'image' => 'dimensions:min_width=1000,min_height=500,max_width=1500,max_height=800',
        ]);

        // dd($request->all());

        $destinationPath = "/admins/pictures/".date("Ym/d", time());

        $upload_path = public_path() . '/' . $destinationPath;

        $file = $request->file('image');

        $extension = strtolower($file->getClientOriginalExtension()) ?: 'png';
        $file_name = md5($file->getClientOriginalName()).time().'.'.$extension;

        $file->move($upload_path,$file_name);


        $res = Picture::create([
            'id'=>$request->id,
            'route'=>$request->route,
            'image'=>$destinationPath.'/'.$file_name,
        ]);

        if($res){
            return redirect()->action('Admin\PictureController@index');
        }else{
            return back();
        }
    }

    public function edit(Request $request){
        $picture = Picture::findOrFail($request->id);

        return view('admin.picture.edit',compact('picture'));
    }

    public function update(Request $request){
        // dd($request->all());
        $picture = Picture::findOrFail($request->id);

        if($request->hasFile('image')){

            $this->validate($request, [
                'image' => 'dimensions:min_width=1000,min_height=500,max_width=1500,max_height=800',
            ]);

            $destinationPath = "/admins/pictures/".date("Ym/d", time());

            $upload_path = public_path() . '/' . $destinationPath;

            $file = $request->file('image');

            $extension = strtolower($file->getClientOriginalExtension()) ?: 'png';
            $file_name = md5($file->getClientOriginalName()).time().'.'.$extension;

            $file->move($upload_path,$file_name);

            $res = $picture->update([
                'route'=>$request->route,
                'image'=>$destinationPath.'/'.$file_name,
            ]);
        }else{
            $res = $picture->update([
                'route'=>$request->route,
            ]);
        }

        if($res){
            return redirect()->action('Admin\PictureController@index');
        }else{
            return back();
        }
    }

    public function delete(Request $request){
        // dd($request->id);
        $res = Picture::destroy($request->id);

        if($res){
            return redirect()->action('Admin\PictureController@index');
        }else{
            return redirect()->action('Admin\PictureController@index');
        }
    }

}
