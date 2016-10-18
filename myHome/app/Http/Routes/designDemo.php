<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/10/11
 * Time: 10:39
 */
//示例
Route::group(['prefix'=>'/design/demo'], function(){
    //策略模式：鸭子游戏
    Route::get('/duck',['uses'=>'Design\\Demo\\DemoController@duck', 'as'=>'demo.duck']);

    //观察者模式：报警通知
    Route::get('/notify',['uses'=>'Design\\Demo\\DemoController@notify', 'as'=>'demo.notify']);

    //工厂模式：加减乘除
    Route::get('/operate',['uses' =>'Design\\Demo\\DemoController@operate', 'as'=>'demo.operate']);

    //单例模式
    Route::get('/singleton',['uses' =>'Design\\Demo\\DemoController@singleton', 'as'=>'demo.singleton']);

});