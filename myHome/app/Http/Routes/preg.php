<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/10/18
 * Time: 10:12
 */
Route::group(['prefix' => 'preg'], function(){

    Route::get('/test', ['uses'=> 'Preg\\PregController@preg', 'as'=>'preg.test']);

    Route::get('/searchKey', ['uses'=> 'Preg\\PregController@searchKey', 'as'=>'preg.searchKey']);

    Route::get('/getImg', ['uses'=> 'Preg\\PregController@getImg', 'as'=>'preg.getImg']);

    Route::get('/export', ['uses'=> 'Preg\\PregController@export', 'as'=>'preg.export']);

});