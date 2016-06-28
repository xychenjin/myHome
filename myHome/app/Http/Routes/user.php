<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/6/23
 * Time: 16:21
 */

Route::get('/user',['uses'=>'User\\UserController@index', 'as'=>'user.index']);