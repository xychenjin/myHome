<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/11/25
 * Time: 9:52
 */

Route::get('/json',['uses'=>'Json\\JsonController@index', 'as'=>'json.index']);
Route::get('/json/file',['uses'=>'Json\\JsonController@getFile', 'as'=>'json.file']);
Route::get('/json/files',['uses'=>'Json\\JsonController@getFiles', 'as'=>'json.files']);



