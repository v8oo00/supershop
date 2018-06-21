<?php

namespace App;

use App\Collection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar', 'phone', 'qq', 'money', 'sex', 'status', 'address_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','created_at','updated_at',
    ];

    //一个用户可以有多个店铺
    public function shops(){
        return $this->hasOne('App\Shop','user_id','id');
    }

    //收藏商品
    public function follows(){
        return $this->belongsToMany('App\Commodity','user_commodities')->withTimestamps();
    }

    public function followThis($commodities_id){
        return $this->follows()->toggle($commodities_id);
    }

    public function followed($commodity_id){
        return Collection::where('commodity_id',$commodity_id)->where('user_id',$this->id)->count();
    }

    //收藏店铺
    public function follows_shop(){
       return $this->belongsToMany('App\Shop','user_shops')->withTimestamps();
    }

    public function followThis_shop($shop_id){
       return $this->follows_shop()->toggle($shop_id);
    }

    public function followed_shop($shop_id){
       return CollectionShop::where('shop_id',$shop_id)->where('user_id',$this->id)->count();
    }
}
