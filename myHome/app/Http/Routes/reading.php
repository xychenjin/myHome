<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2017/2/9
 * Time: 13:46
 */
Route::group(['prefix' => 'read', 'middleware' => 'auth'], function(){

    //图书列表
    Route::get('/', ['uses' => 'Read\\ReadController@index', 'as' =>'read.index']);
    Route::post('/distribute', ['uses' => 'Read\\ReadController@distribute', 'as' =>'read.distribute']);
    //添加
    Route::get('/add', ['uses' => 'Read\\ReadController@add', 'as' =>'read.add']);
    Route::get('/{id}/edit', ['uses' => 'Read\\ReadController@edit', 'as' =>'read.edit']);
    //已阅读
    Route::get('/done', ['uses' => 'Read\\ReadController@done', 'as' =>'read.done']);
    //阅读心得
    Route::get('/got', ['uses' => 'Read\\ReadController@got', 'as' =>'read.got']);
    //读书笔记
    Route::get('/note', ['uses' => 'Read\\ReadController@note', 'as' =>'read.note']);
    //保存
    Route::post('/store', ['uses' => 'Read\\ReadController@store', 'as' =>'read.store']);
    //

});