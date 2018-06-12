<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;//**记得引入这个啊（因为在composer函数参数里使用了View类）**
use App\Cate;
use App\Cart;
use Auth;
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

        //判断是否有用户登录
        if(Auth::check() && Auth::user()){
            $carts_data = Cart::where('uid',Auth::id())->with('commodities','sku')->get();
            $view->with(['cates'=>$cates,'carts_data'=>$carts_data]);
        }else{
            $view->with('cates',$cates);
        }

    }
}
