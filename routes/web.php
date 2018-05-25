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

    //退出登录
    Route::post('logout', 'Admin\LoginController@logout');

    //角色管理模块
    Route::get('role','Admin\RoleController@index');
    Route::get('role/add','Admin\RoleController@add');
    Route::post('role/store','Admin\RoleController@store');

});
