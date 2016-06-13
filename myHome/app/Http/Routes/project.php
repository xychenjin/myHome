<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/6/13
 * Time: 15:48
 */
Route::get('/project',['uses'=>'Project\\IndexController@index','as'=>'project.index']);