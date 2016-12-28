<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/12/28
 * Time: 10:04
 */
Route::group(['middleware' => 'auth'], function(){
//    Route::get('/list', ['uses' => 'Exercise\\ExerciseController@exercise', 'as' => 'exercise.list']);

   Route::resource('exercise', 'Exercise\\ExerciseController', []);

});