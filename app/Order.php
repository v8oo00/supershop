<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    //指定表名
    protected $table = 'orders';

    //指定主键
    protected $primaryKey = 'id';

    //是否开启时间戳
    public $timestamps = true;

    //设置时间戳格式为Unix
    // protected $dateFormat = 'U';

    //过滤字段，只有包含的字段才能被更新
    protected $fillable = ['order_num','uid','address_id','total','status'];

    //隐藏字段
    protected $hidden = ['created_at'];

    //一个订单对应一个订单详情表
    public function details(){
        return $this->hasMany('App\Order_details');
    }


}
