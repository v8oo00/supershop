<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    //指定表名
    protected $table = 'cates';

    protected $fillable = [
        'cate','pid','path',
    ];

    public function commofitys(){
        return $this->hasMany('App\Commodity','cate_id','id');
    }
}
