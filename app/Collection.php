<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    //指定操作的表名
    protected $table = 'user_commodities';

    protected $fillable = ['commodity_id','user_id'];
}
