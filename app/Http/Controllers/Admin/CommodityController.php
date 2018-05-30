<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Commodity;
use App\Tag;
use App\Tvalue;
use App\Compic;
class CommodityController extends Controller
{
    //
    public function index(){
        $commodities = Commodity::get();
        return view('admin.commodity.index',compact('commodities'));
    }

    //查询商品关联的标签
    public function tags(Request $request){
        $tags = Commodity::findOrFail($request->id)->tags;

        if(count($tags)>0){
            foreach($tags as $k=>$v){
                $goods[$v->name] = $v->HasOneTagVal;
            }
        }else{
            return 'no';
        }

        return $goods;

    }

    //执行添加商品的标签和标签值
    public function storetv(Request $request){
        $tag = Tag::create([
            'c_id' => $request->id,
            'name' => $request->tag
        ]);

        $val = Tvalue::create([
            't_id' => $tag->id,
            'value' => $request->value
        ]);

        if($tag && $val){
            return 'ok';
        }else{
            return 'no';
        }
    }

    //删除标签及标签值
    public function delete(Request $request){
        if(Tag::destroy($request->t_id) && Tvalue::destroy($request->v_id)){
            return 'ok';
        }else{
            return 'no';
        }
    }
    //商品图片管理
    public function com_pic(Request $request){
        $pictures = Commodity::findOrFail($request->id)->compictures;
        $com_id =$request->id;
        return view('admin.commodity.pic',compact(['pictures','com_id']));
    }

    public function pic_upload(Request $request){
        // dd($request->all());
        $file = $request->file('file');
        $filePath =[];  // 定义空数组用来存放图片路径
        foreach($file as $key => $value) {
            // 判断图片上传中是否出错
            if (!$value->isValid()) {
                exit("上传图片出错，请重试！");
            }
            if(!empty($value)){//此处防止没有多文件上传的情况
                $destinationPath = '/admins/manypic/pic/'.date('Y-m-d'); // public文件夹下面uploads/xxxx-xx-xx 建文件夹
                $extension = $value->getClientOriginalExtension();   // 上传文件后缀
                $fileName = date('YmdHis').mt_rand(100,999).'.'.$extension; // 重命名
                $value->move(public_path().$destinationPath, $fileName); // 保存图片
                $filePath[] = $destinationPath.'/'.$fileName;

            }
        }
        // 返回上传图片路径，用于保存到数据库中
        // return $filePath;
        foreach($filePath as $k=>$v){
            Compic::create([
                'c_id'=>$request->c_id,
                'image'=>$v
            ]);
        }
    }

    public function status(Request $request){
        $pic = Compic::findOrFail($request->id);

        if($pic->status == 1){
            $pic->update(['status'=>0]);
        }else{
            $pic->update(['status'=>1]);
        }
    }

    public function status_com(Request $request){
        $com = Commodity::findOrFail($request->id);
        // dd($com);
        if($com->status == 1){
            $com->update(['status'=>0]);
        }else{
            $com->update(['status'=>1]);
        }

    }
}
