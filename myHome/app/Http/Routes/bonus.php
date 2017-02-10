<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/12/28
 * Time: 10:36
 */

Route::group(['middleware' => 'auth'], function(){

    #抢红包相关动作
    Route::group(['prefix' => 'bonus'], function(){
        Route::post('/makeBonus', ['as' => 'make.bonus', 'uses' => 'Bonus\\BonusController@makeBonus']);//发红包
        Route::get('/fetch', ['as' => 'bonus.fetch', 'uses' => 'Bonus\\BonusController@fetchList']); //抢红包列表
        Route::get('/{id}/fetchBonus', ['as' => 'fetch.bonus', 'uses' => 'Bonus\\BonusController@fetchBonus']);//抢红包
        Route::get('/{id}/logs', ['as' => 'logs.bonus', 'uses' => 'Bonus\\BonusController@logs']);//抢红包
        Route::get('/myBonus', ['as' => 'my.bonus', 'uses' => 'Bonus\\BonusController@myBonus']);//我抢到的红包
    });

    #抢红包组
    Route::resource('bonus', 'Bonus\\BonusController', []);
});