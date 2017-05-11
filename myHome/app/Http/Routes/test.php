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
    Route::get('/doWhere', ['uses' =>'Test\\TestController@doWhere', 'as'=>'test.doWhere']);//do while循环
    Route::get('/doSwitch', ['uses' =>'Test\\TestController@doSwitch', 'as'=>'test.doSwitch']);//do while + switch循环
    Route::get('/collect', ['uses'=>'Test\\TestController@collect', 'as'=>'test.collect']);//collection测试
    Route::get('/download', ['uses'=>'Test\\TestController@download', 'as'=>'test.download']);//download测试

    Route::group(['prefix'=>'auth'], function() {
//        Route::get('/', ['uses'=>'Test\\AuthController@index', 'as'=>'test.auth']);
    });

    //打印
    Route::get('/print' , ['uses'=>'Test\\TestController@println', 'as'=>'test.print']);

    //测试javascript对象写法
    Route::get('/js',['uses'=>'Test\\TestController@js', 'as'=>'test.js', 'middleware' => 'auth']);
    Route::get('/path',['uses'=>'Test\\TestController@path', 'as'=>'test.path', 'middleware' => 'auth']);
    Route::get('/test1',['uses'=>'Test\\TestController@test1', 'as'=>'test.path', 'middleware' => 'auth']);
    Route::get('/c',['uses'=>'Test\\TestController@c', 'as'=>'test.c', 'middleware' => 'auth']);



});



