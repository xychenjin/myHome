<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/12/16
 * Time: 11:24
 */
Route::group(['prefix' => '/login'], function(){
    Route::post('/store', ['uses' => 'Auth\\AuthController@store','as' => 'login.store']);
});

Route::group(['prefix' => config('admin.prefix', 'admin')], function () {
    Route::group(['middleware' => config('admin.filter.auth')], function () {
        Route::get('/', ['as' => 'myHome', 'uses' => 'SiteController@index']);
        Route::get('/pwd', ['as' => 'admin.users.pwd', 'uses' => 'Admin\\AdminController@pwd']);
        Route::put('/updatePwd', ['as' => 'admin.users.updatePwd', 'uses' => 'Admin\\AdminController@updatePwd']);
    });
});
