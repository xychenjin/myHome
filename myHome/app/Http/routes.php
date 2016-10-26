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
require_once 'Routes/designDemo.php';
require_once 'Routes/test.php';
require_once 'Routes/preg.php';
require_once 'Routes/keyConsts.php';
require_once 'Routes/map.php';

Route::get('/', function () {
    return view('welcome');
});
