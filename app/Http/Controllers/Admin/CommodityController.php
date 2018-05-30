<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Commodity;
use App\Tag;
use App\Tvalue;
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
}
