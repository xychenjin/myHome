<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/11/25
 * Time: 9:52
 */

Route::get('/json',['uses'=>'Json\\JsonController@index', 'as'=>'json.index']);