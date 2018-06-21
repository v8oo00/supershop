<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    //指定表名
    protected $table = 'shops';

    //指定主键
    protected $primaryKey = 'id';

    //是否开启时间戳
    public $timestamps = true;

    //设置时间戳格式为Unix
    // protected $dateFormat = 'U';

    //过滤字段，只有包含的字段才能被更新
    protected $fillable = ['name','avatar','desc','phone','address','status','user_id'];

    //隐藏字段
    protected $hidden = ['created_at','update_at'];

    //属于某个用户
    public function user(){
        return $this->belongsTo('App\User','user_id','id');
    }

    public function commodity(){
        return $this->hasMany('App\Commodity','shop_id','id');
    }

    public function follows(){
        return $this->belongsToMany('App\User','user_shops')->withTimestamps();
    }
}
