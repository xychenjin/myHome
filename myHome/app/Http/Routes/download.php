<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/12/1
 * Time: 18:19
 */

Route::group(['prefix'=>'/download'], function() {

    //下载数据库
    Route::get('/db', ['uses' => 'Download\\DownloadController@db', 'as' => 'download.db']);
    Route::put('/dbDown', ['uses' => 'Download\\DownloadController@dbDown', 'as' => 'download.dbDown']);
    Route::post('/connect', ['uses' => 'Download\\DownloadController@testConnect', 'as' => 'download.connect']);

    //下载
    Route::post('/getList', ['uses' => 'Download\\DownloadController@getList', 'as' => 'download.getList']);
});