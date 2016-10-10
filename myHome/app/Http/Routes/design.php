<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/9/30
 * Time: 10:49
 */
Route::group(['prefix'=>'/design'], function(){
    Route::get('/',['uses'=>'Design\\DesignPatternsController@index','as'=>'designPatterns.index']);

    Route::get('/strategy',['uses'=>'Design\\Strategy\\StrategyController@strategy', 'as'=>'designPatterns.strategy']);//策略模式
    Route::get('/factory',['uses'=>'Design\\DesignPatternsController@factory','as'=>'designPatterns.factory']);//工厂模式
    Route::get('/singleton',['uses'=>'Design\\DesignPatternsController@singleton','as'=>'designPatterns.singleton']);//单例模式
    Route::get('/chain',['uses'=>'Design\\Chain\\ChainController@chain','as'=>'designPatterns.chain']);//命令链模式
    Route::get('/observer',['uses'=>'Design\\Observer\\ObserverController@observer','as'=>'designPatterns.observer']);//观察者模式

});

