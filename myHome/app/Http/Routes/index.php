<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/9/23
 * Time: 11:14
 */

Route::group(['prefix' => '/ifc'], function(){
    Route::get('/', ['uses' => 'Http\\IndexController@index' , 'as'=>'http.index']);
});