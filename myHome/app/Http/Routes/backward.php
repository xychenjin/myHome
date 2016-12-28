<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/12/27
 * Time: 9:54
 */

Route::group(['prefix'=>'backward', 'middleware' => 'auth'], function(){
   Route::any('/', ['as' => 'backward.index', 'uses' => 'Backward\\BackwardController@index']);
   Route::any('/detail', ['as' => 'backward.detail', 'uses' => 'Backward\\BackwardController@detail']);
});