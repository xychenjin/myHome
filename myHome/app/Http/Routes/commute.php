<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/12/15
 * Time: 9:43
 */

//上下班打卡记录
Route::group(['prefix' =>'/commute', 'middleware' => 'auth'], function(){
   Route::get('/', ['uses' => 'Commute\\CommuteController@index', 'as' => 'commute.index']);
   Route::get('/create', ['uses' => 'Commute\\CommuteController@create', 'as' => 'commute.create']);
   Route::put('/store', ['uses' => 'Commute\\CommuteController@store', 'as' => 'commute.store']);
   Route::get('/{id}/show', ['uses' => 'Commute\\CommuteController@show', 'as' => 'commute.show'])
       ->where(['id' => '[0-9]+']);
   Route::get('/{id}/edit', ['uses' => 'Commute\\CommuteController@edit', 'as' => 'commute.edit'])
       ->where(['id' => '[0-9]+']);
   Route::post('/{id}/update', ['uses' => 'Commute\\CommuteController@update', 'as' => 'commute.update'])
       ->where(['id' => '[0-9]+']);
    Route::get('/{id}/destroy', ['uses' => 'Commute\\CommuteController@destroy', 'as' => 'commute.destroy'])
       ->where(['id' => '[0-9]+']);

    Route::get('/export', ['uses' => 'Commute\\CommuteController@export', 'as' => 'commute.export']);
    Route::get('/{id}/detail', ['uses' => 'Commute\\CommuteController@detail', 'as' => 'commute.detail'])
        ->where(['id' => '[0-9]+']);

    //补签
    Route::group(['prefix' => 'subscribe'], function(){
        Route::get('/', ['uses' => 'Commute\\SubscribeController@index', 'as' => 'commute.subscribe']);
        Route::put('/store', ['uses' => 'Commute\\SubscribeController@store', 'as' => 'commute.subscribe.store']);
    });

});