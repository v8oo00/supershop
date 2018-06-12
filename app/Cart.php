<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //指定表名
    protected $table = 'carts';

    protected $fillable = [
        'uid','c_id','sku_id','num',
    ];

    //一对一 商品
    public function commodities(){
        return $this->hasOne('App\Commodity','id','c_id');
    }

    //一对一 sku
    public function sku(){
        return $this->hasOne('App\Sku','id','sku_id');
    }
}
