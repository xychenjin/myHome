<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/11/30
 * Time: 16:42
 */

Route::group(['prefix'=>'encode'], function(){
    Route::get('/', ['uses'=>'Encode\\EncodeController@index', 'as'=>'encode.index']);

});