<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/6/7
 * Time: 13:36
 */
Route::get('/test',['uses'=>'MyHome\\IndexController@index','as'=>'myhome.index']);
Route::get('/createPwd',['uses'=>'MyHome\\IndexController@createPwd','as'=>'myhome.create.pwd']);
Route::any('/ajax',['uses'=>'MyHome\\IndexController@ajaxTest','as'=>'myhome.ajax.test']);
Route::get('/visit',['uses'=>'MyHome\\IndexController@visit','as'=>'myhome.visit']);

