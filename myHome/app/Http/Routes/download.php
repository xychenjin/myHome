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
<<<<<<< HEAD
    Route::post('/getDb', ['uses' => 'Download\\DownloadController@getDb', 'as' => 'download.getDb']);
    Route::post('/getTb', ['uses' => 'Download\\DownloadController@getTb', 'as' => 'download.getTb']);
=======
    Route::post('/getList', ['uses' => 'Download\\DownloadController@getList', 'as' => 'download.getList']);
>>>>>>> 44e6e3423b392ef5459e1a3cff4ee49949a7c4ec
});