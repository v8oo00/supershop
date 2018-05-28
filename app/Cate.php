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
}
