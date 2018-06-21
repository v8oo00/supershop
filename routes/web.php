<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/',  'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//个人中心
Route::get('/account', 'UserController@index');
Route::post('/account/updateAvatar', 'UserController@updateAvatar');
Route::post('/account/updateDetail', 'UserController@updateDetail');
Route::post('/account/cz', 'UserController@cz');
Route::post('/account/order/changeStatus', 'UserController@changeStatus');
Route::post('/account/address/add', 'UserController@addAddress');
Route::post('/account/address/del', 'UserController@delAddress');
Route::post('/account/address/swmr', 'UserController@swmr');
Route::post('/account/user/changeOldPass', 'UserController@changeOldPass');
Route::post('/account/user/changePass', 'UserController@changePass');

//分类页面
Route::get('/cate/f_cate/{id}','CateController@lookfcate');
Route::get('/cate/s_cate/{id}','CateController@lookscate');

//商品详情页
Route::get('/commodity/{id}','CommodityController@product');
Route::post('/commodity/sku','CommodityController@getclicksku');

Route::get('/commodity/cart/data','CommodityController@cart_data');

//购物车模块
Route::get('/cart','CartController@index');
Route::post('/cart/add','CartController@add');
Route::post('/cart/update','CartController@update');
Route::post('/cart/del','CartController@del');

//订单模块
Route::get('/order','OrderController@index');
Route::post('/order/add','OrderController@add');
Route::get('/order/success/{id}','OrderController@order_suc');

//地址模块
route::post('/address/add','AddressController@add');
Route::post('/commodity/evaluate_pic','CommodityController@evaluate_pic');
Route::post('/commodity/evaluate_text','CommodityController@evaluate_text');


Route::group(['prefix' => 'admin'], function () {
    //首页
    Route::group(['middleware' => 'auth.admin'], function () {
        Route::get('/', 'Admin\IndexController@index');
    });

    //登录模块
    Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\LoginController@login');

    //注册时的机制
    Route::post('register', 'Admin\RegisterController@register');
    Route::post('ucpaas_vcode', 'Admin\RegisterController@ucpaas_vcode');
    Route::post('ucpaas_check', 'Admin\RegisterController@ucpaas_check');


    Route::post('logout', 'Admin\LoginController@logout');

    //前台用户管理模块
    Route::get('homeuser', 'Admin\HomeUserController@index');
    Route::get('homeuser/create', 'Admin\HomeUserController@create');
    Route::post('homeuser/store', 'Admin\HomeUserController@store');
    Route::get('homeuser/status', 'Admin\HomeUserController@status');

    //后台用户管理模块
    Route::get('adminuser', 'Admin\AdminUserController@index');
    Route::get('adminuser/create', 'Admin\AdminUserController@create');
    Route::post('adminuser/store', 'Admin\AdminUserController@store');
    Route::get('adminuser/status', 'Admin\AdminUserController@status');

    //后台店铺模块
    Route::get('shop', 'Admin\ShopController@index');
    Route::get('shop/status', 'Admin\ShopController@status');

    //后台商品分类模块
    Route::get('cate', 'Admin\CateController@index');
    Route::get('cate/create', 'Admin\CateController@create');
    Route::post('cate/store', 'Admin\CateController@store');
    Route::post('cate/update', 'Admin\CateController@update');
    Route::get('cate/delete', 'Admin\CateController@delete');
    Route::get('cate/chaxun', 'Admin\CateController@chaxun');

    //退出登录
    Route::post('logout', 'Admin\LoginController@logout');

    //角色管理模块
    Route::get('role','Admin\RoleController@index');
    Route::get('role/add','Admin\RoleController@add');
    Route::post('role/store','Admin\RoleController@store');
    Route::get('role/edit/{id}','Admin\RoleController@edit');
    Route::post('role/edit','Admin\RoleController@update');
    Route::get('role/delete/{id}','Admin\RoleController@delete');

    //订单管理模块
    Route::get('order','Admin\OrderController@index');
    Route::post('order/check_status','Admin\OrderController@check_status');

    //活动管理模块
    Route::get('activity','Admin\ActivityController@index');
    Route::get('activity/create','Admin\ActivityController@create');
    Route::post('activity/store','Admin\ActivityController@store');
    Route::get('activity/edit/{id}','Admin\ActivityController@edit');
    Route::post('activity/edit','Admin\ActivityController@update');
    Route::get('activity/delete/{id}','Admin\ActivityController@delete');
    Route::get('activity/addcom/{id}','Admin\ActivityController@addcom');
    Route::get('activity/com_status','Admin\ActivityController@com_status');
    Route::post('activity/add_com','Admin\ActivityController@activity_commodity');


    //轮播图管理模块
    Route::get('picture','Admin\PictureController@index');
    Route::get('picture/create','Admin\PictureController@create');
    Route::post('picture/store','Admin\PictureController@store');
    Route::get('picture/edit/{id}','Admin\PictureController@edit');
    Route::post('picture/update','Admin\PictureController@update');
    Route::get('picture/delete/{id}','Admin\PictureController@delete');


    //商品管理模块
    Route::get('commodity','Admin\CommodityController@index');
    Route::get('commodity/add_com','Admin\CommodityController@add_com');
    Route::post('commodity/create_com','Admin\CommodityController@create_com');
    Route::get('commodity/edit_com/{id}','Admin\CommodityController@edit_com');
    Route::post('commodity/update_com','Admin\CommodityController@update_com');
    Route::post('commodity/uploadpic','Admin\CommodityController@uploadpic');

    //获取标签及标签值
    Route::get('commodity/tags','Admin\CommodityController@tags');

    //添加标签和标签值
    Route::post('commodity/tag_val/create','Admin\CommodityController@storetv');

    //删除标签及标签值
    Route::get('commodity/tag_val/delete','Admin\CommodityController@delete');
    Route::get('commodity/pic/{id}','Admin\CommodityController@com_pic');
    Route::post('commodity/pic_upload','Admin\CommodityController@pic_upload');
    Route::get('commodity/status','Admin\CommodityController@status');
    Route::get('commodity/status_com','Admin\CommodityController@status_com');

    //商品sku模块
    Route::get('commodity/sku/{id}','Admin\CommodityController@com_sku');
    Route::post('commodity/create_sku','Admin\CommodityController@create_sku');
    Route::post('commodity/check_sku','Admin\CommodityController@check_sku');
    Route::get('commodity/del_sku/{id}','Admin\CommodityController@del_sku');
    Route::post('commodity/update_sku','Admin\CommodityController@update_sku');

});
