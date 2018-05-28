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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

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
});
