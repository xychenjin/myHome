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

    Route::post('/getDb', ['uses' => 'Download\\DownloadController@getDb', 'as' => 'download.getDb']);
    Route::post('/getTb', ['uses' => 'Download\\DownloadController@getTb', 'as' => 'download.getTb']);

    //导出成功
    Route::get('/success', ['uses' => 'Download\\DownloadController@success', 'as' => 'download.success']);

});