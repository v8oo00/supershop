<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluate extends Model
{
    //
    //指定表名
    protected $table = 'evaluates';

    //指定主键
    protected $primaryKey = 'id';

    //是否开启时间戳
    public $timestamps = true;

    //设置时间戳格式为Unix
    // protected $dateFormat = 'U';

    //过滤字段，只有包含的字段才能被更新
    protected $fillable = ['user_id','text','score','commodity_id'];

    //隐藏字段
    protected $hidden = ['created_at','updated_at'];

    public function HasManyEvaluatePic(){
        return $this->hasMany('App\Evaluatepic','evaluate_id','id');
    }

    public function commodity(){
        return $this->belongsTo('App\Commodity','commodity_id','id');
    }

}
