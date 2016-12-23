<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/12/1
 * Time: 18:19
 */

Route::group(['prefix'=>'/download', 'middleware' => ['auth', 'menu']], function() {

    //下载数据库
    Route::get('/db', ['uses' => 'Download\\DownloadController@db', 'as' => 'download.db']);
    Route::put('/dbDown', ['uses' => 'Download\\DownloadController@dbDown', 'as' => 'download.dbDown']);
    Route::post('/connect', ['uses' => 'Download\\DownloadController@testConnect', 'as' => 'download.connect']);

    //下载

    Route::post('/getDb', ['uses' => 'Download\\DownloadController@getDb', 'as' => 'download.getDb']);
    Route::post('/getTb', ['uses' => 'Download\\DownloadController@getTb', 'as' => 'download.getTb']);

    //导出成功
    Route::get('/success', ['uses' => 'Download\\DownloadController@success', 'as' => 'download.success']);
    //key查看
    Route::get('/key/detail', ['uses' => 'Download\\DownloadController@keyDetail', 'as' => 'download.keyDetail']);
    //日志查看
    Route::get('/logs', ['uses' => 'Download\\DownloadController@logLists', 'as' => 'logs']);
    Route::get('/log/view', ['uses' => 'Download\\DownloadController@view', 'as' => 'log.view']);
    Route::get('/history', ['uses' => 'Download\\DownloadController@history', 'as' => 'download.history']);

    //删除
    Route::get('/delete', ['uses' => 'Download\\DownloadController@delete', 'as' => 'download.delete']);

    //卡列表
    Route::get('/cardList', ['uses' => 'Download\\DownloadController@cardList', 'as' => 'download.cardList']);
});