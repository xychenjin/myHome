<?php
Route::get('/file',['uses'=>'Content\\FileContentController@getFile','as'=>'get.file.content']);