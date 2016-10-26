<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/10/24
 * Time: 13:43
 */
Route::group(['prefix' => 'map'], function(){
   //地图测试
   Route::get('/', ['uses'=>'Map\\MapController@index', 'as'=>'map.index']);

   //地图数据
   Route::get('/show',['uses'=>'Map\\MapController@show', 'as'=>'map.show']);
});
