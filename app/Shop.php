<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    //指定表名
    protected $table = 'shops';

    //属于某个用户
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function commodity(){
        return $this->hasMany('App\Commodity','shop_id','id');
    }
}
