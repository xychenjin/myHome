<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/12/27
 * Time: 15:48
 */

Route::group([ 'middleware' => 'auth'], function() {
    Route::group(['prefix' => 'memo'], function(){
        Route::get('/study', ['uses' => 'Memo\\MemoController@study' , 'as' => 'memo.study']);
        Route::get('/secret', ['uses' => 'Memo\\MemoController@secret' , 'as' => 'memo.secret']);
        Route::put('/ask', ['uses' => 'Memo\\MemoController@ask' , 'as' => 'memo.ask']);
    });

    Route::resource('memo', 'Memo\\MemoController');
});



