<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/10/12
 * Time: 17:08
 */
Route::group(['prefix'=>'/test'], function(){
    Route::get('/', ['uses'=>'Test\\TestController@index', 'as'=>'test.index']);
    Route::get('/sign', ['uses'=>'Test\\TestController@sign', 'as'=>'test.sign']);//签名

    Route::get('/loc', ['uses'=>'Test\\TestController@getLocation', 'as'=>'test.loc']);//获取经纬度

    Route::get('/puc', ['uses'=>'Test\\TestController@puc', 'as'=>'test.puc']);//获取影院座位JSON

    Route::get('/jsn', ['uses'=>'Test\\TestController@jsn', 'as'=>'test.jsn']);//获取影院座位JSON
    Route::get('/getdata', ['uses'=>'Test\\TestController@getData', 'as'=>'test.getdata']);//获取影院座位JSON


    Route::get('/getShow', ['uses'=>'Test\\TestController@getShow', 'as'=>'test.getShow']);//获取场次JSON
});