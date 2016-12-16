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
    });
});
