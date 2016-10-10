<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

require_once 'Routes/myhome.php';
require_once 'Routes/arrays.php';
require_once 'Routes/project.php';
require_once 'Routes/user.php';
require_once 'Routes/file.php';
require_once 'Routes/httpCode.php';
require_once 'Routes/index.php';
require_once 'Routes/design.php';

Route::get('/', function () {
    return view('welcome');
});
