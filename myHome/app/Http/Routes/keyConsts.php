<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/10/18
 * Time: 11:49
 */
Route::group(['prefix'=>'key'], function(){

    Route::get('/const' , ['uses'=>'Key\\KeyController@getKey' , 'as'=>'key.const.getKey']);

    Route::get('/break', ['uses'=>'Key\\KeyController@broke', 'as'=>'key.const.break']);
});