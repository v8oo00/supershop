<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;//**记得引入这个啊（因为在composer函数参数里使用了View类）**
use App\Cate;
class MovieComposer
{
    public $movieList = [];
    public function __construct()
    {
        $this->movieList = [
            'Shawshank redemption',
            'Forrest Gump',
        ];
    }
    public function compose(View $view)
    {
        $cates = Cate::where('pid','=','0')->get();
        foreach($cates as $k=>$v){
            $cates[$k]['son'] = Cate::where('pid','=',$v['id'])->get();
        }

        $view->with('cates',$cates);
    }
}
