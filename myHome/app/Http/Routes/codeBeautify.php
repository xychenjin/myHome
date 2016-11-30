<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/11/30
 * Time: 10:06
 */
Route::group(['prefix'=>'codeBt'], function(){

    Route::get('/', ['uses'=>'CodeBeautify\\CodeController@index', 'as'=>'code.beautify']);

    Route::get('/delete', ['uses'=>'CodeBeautify\\CodeController@delete', 'as'=>'code.beautify.delete']);

});