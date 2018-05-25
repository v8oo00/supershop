<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    //指定表名
    protected $table = 'roles';

    //指定主键
    protected $primaryKey = 'id';

    //是否开启时间戳
    public $timestamps = false;

    //设置时间戳格式为Unix
    // protected $dateFormat = 'U';

    //过滤字段，只有包含的字段才能被更新
    protected $fillable = ['r_name','desc'];

    //隐藏字段
    // protected $hidden = ['password'];

}
