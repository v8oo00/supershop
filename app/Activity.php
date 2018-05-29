<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{

    //指定表名
    protected $table = 'activities';

    //指定主键
    protected $primaryKey = 'id';

    //是否开启时间戳
    public $timestamps = false;

    //设置时间戳格式为Unix
    // protected $dateFormat = 'U';

    //过滤字段，只有包含的字段才能被更新
    protected $fillable = ['name','rule','image','route','start_time','end_time'];

    //隐藏字段
    protected $hidden = ['updated_at','created_at'];

    public function commodities(){
        return $this->hasMany('App\Commodity','activity_id','id');
    }
}
