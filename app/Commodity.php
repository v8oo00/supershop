<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commodity extends Model
{
    //
    //指定表名
    protected $table = 'commodities';

    //指定主键
    protected $primaryKey = 'id';

    //是否开启时间戳
    public $timestamps = true;

    //设置时间戳格式为Unix
    // protected $dateFormat = 'U';

    //过滤字段，只有包含的字段才能被更新
    protected $fillable = ['name','cate_id','shop_id','desc','company','origin','sale','click_num','detail'];

    //隐藏字段
    protected $hidden = ['created_at','updated_at'];

    public function shop(){
        return $this->belongsTo('App\Shop','shop_id','id');
    }

    public function tags(){
        return $this->hasMany('App\Tag','c_id','id');
    }

    public function compictures(){
        return $this->hasMany('App\Compic','c_id','id');
    }
}
