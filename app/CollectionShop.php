<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CollectionShop extends Model
{
    //指定操作的表名
    protected $table = 'user_shops';

    protected $fillable = ['shop_id','user_id'];
}
