<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/6/7
 * Time: 13:36
 */
Route::get('test',['uses'=>'MyHome\\IndexController@index','as'=>'myhome.index']);

