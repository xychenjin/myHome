<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/6/8
 * Time: 14:20
 */
Route::get('/arrays/test',['uses'=>'Arrays\\IndexController@testArray','as'=>'arrays.test']);