<?php
    Route::group(['prefix' => '/http'], function() {

        Route::group(['prefix' => '/code'], function () {
            Route::get('/', ['uses' => 'Http\\Code\\IndexController@index', 'as' => 'http.code.index']);
            Route::post('/ajax', ['uses' => 'Http\\Code\\IndexController@ajax', 'as' => 'http.code.post.ajax']);

        });

        Route::get('/memory', ['uses' => 'Http\\IndexController@memory', 'as' => 'http.get.memory']);
        Route::get('/test', ['uses' => 'Http\\IndexController@test', 'as' => 'http.get.test']);
        Route::get('/max', ['uses' => 'Http\\IndexController@maxNumber', 'as' => 'http.get.max']);

    });