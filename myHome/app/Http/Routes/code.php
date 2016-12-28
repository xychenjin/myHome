<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/18 0018
 * Time: 下午 9:51
 */
Route::group(['prefix' => 'code' ], function(){
   Route::get('/desc', ['uses'=> 'Code\\CodeController@desc', 'as' => 'code.desc']);

   Route::get('/test', ['uses'=> 'Code\\CodeController@test', 'as' => 'code.test']);
});