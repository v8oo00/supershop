<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tvalue extends Model
{
    //
    //指定表名
    protected $table = 'ctag_vals';

    //指定主键
    protected $primaryKey = 'id';

    //是否开启时间戳
    public $timestamps = true;

    //设置时间戳格式为Unix
    // protected $dateFormat = 'U';

    //过滤字段，只有包含的字段才能被更新
    protected $fillable = ['t_id','value'];

    //隐藏字段
    protected $hidden = ['created_at','updated_at'];

    
}
