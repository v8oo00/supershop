<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_details extends Model
{
    //指定表名
    protected $table = 'order_details';

    //是否开启时间戳
    public $timestamps = true;

    //过滤字段，只有包含的字段才能被更新
    protected $fillable = ['order_id','sku_id','num'];

    //隐藏字段
    protected $hidden = ['created_at'];

    //一个订单详情属于一个订单
    public function order(){
        return $this->belongsTo('App\Order','id','order_id');
    }
}
