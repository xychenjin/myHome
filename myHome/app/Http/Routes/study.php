<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2017/1/12
 * Time: 14:22
 */
Route::group(['prefix'=>'study', 'middleware' => 'auth'], function() {
    Route::get('/', ['uses' => 'Memo\\MemoController@index' , 'as' => 'memo.index']);
    Route::get('/{name}', ['uses' => 'Memo\\MemoController@study' , 'as' => 'memo.study']);
});