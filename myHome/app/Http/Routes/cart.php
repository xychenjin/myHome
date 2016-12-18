<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/18 0018
 * Time: 下午 8:39
 */

Route::group(['prefix' => 'cart'], function(){
   Route::get('/record', ['uses' => 'Cart\\IndexController@index', 'as' => 'cart.record']);
   Route::get('/create', ['uses' => 'Cart\\IndexController@create', 'as' => 'cart.create']);
   Route::post('/store', ['uses' => 'Cart\\IndexController@store', 'as' => 'cart.store']);
   Route::put('/{id}/update', ['uses' => 'Cart\\IndexController@update', 'as' => 'cart.update'])->where(['id'=>'[0-9]+']);
   Route::get('/{id}/edit', ['uses' => 'Cart\\IndexController@edit', 'as' => 'cart.edit'])->where(['id'=>'[0-9]+']);
});
