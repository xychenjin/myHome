<?php
Route::get('/file',['uses'=>'Content\\FileContentController@getFile','as'=>'get.file.content']);
Route::get('/fop',['uses'=>'File\\IndexController@index','as'=>'fp.file.index']);