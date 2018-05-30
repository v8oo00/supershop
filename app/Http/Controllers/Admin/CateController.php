<?php

namespace App\Http\Controllers\Admin;

use App\Cate;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests\CateRequest;
use App\Http\Controllers\Controller;

class CateController extends Controller
{
    //浏览所有分类
    public function index(){
        $cates = $this->getCateByPid(Cate::get());
        return view('Admin\cate.index',compact('cates'));
    }

    //添加分类
    public function create(Request $request){
        $id = isset($request->id) ? $request->id : '';
        $cates = Cate::select(DB::raw("id,cate,pid,path,concat(path,id) as p"))->orderBy('p')->get();
        foreach($cates as $k=>$v){
            $cates[$k]['cate'] = str_repeat('|---',count(explode(',',$v['path']))-2).$v['cate'];
        }
        return view('Admin\cate.create',compact('cates','id'));
    }

    //执行添加分类
    public function store(CateRequest $request){
        if($request->pid == 0){
            Cate::create([
                'cate' => $request->cate,
                'pid' => 0,
                'path' => '0,'
            ]);
        }else{
            Cate::create([
                'cate' => $request->cate,
                'pid' => $request->pid,
                'path' => Cate::findOrFail($request->pid)['path'].$request->pid.','
            ]);
        }

        return redirect()->action('Admin\CateController@index');
    }

    //执行修改分类
    public function update(Request $request){
        $cate = Cate::findOrFail($request->id);
        $cate->cate = $request->cate;
        $cate->save();
    }

    //执行删除分类
    public function delete(Request $request){
        Cate::destroy($request->id);
    }

    //查询该分类下是否有子类
    public function chaxun(Request $request){
        if(Cate::where('path','like','%,'.$request->get('id').',%')->count() > 0){
            return 'no';
        }else{
            return 'ok';
        }
    }

    /**
     * [getCateByPid 通过pid查询所有cate]
     * @param  [array]  $allcates [数据库数据]
     * @param  int $pid      [父类id]
     * @return [array]            [分层返回数组]
     */
    public function getCateByPid($allcates,$pid=0){
        $data = [];
        foreach($allcates as $k=>$v){
            if($v['pid'] == $pid){
                $v['sub'] = $this->getCateByPid($allcates,$v['id']);//根据自己的ID查询该类的子类
                $data[] = $v;
            }
        }
        return $data;
    }
}
