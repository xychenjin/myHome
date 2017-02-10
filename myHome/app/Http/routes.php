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
require_once 'Routes/json.php';
require_once 'Routes/codeBeautify.php';
require_once 'Routes/encode.php';
require_once 'Routes/download.php';
require_once 'Routes/commute.php';
require_once 'Routes/admin.php';
require_once 'Routes/cart.php';
require_once 'Routes/code.php';
require_once 'Routes/wage.php';
require_once 'Routes/card.php';
require_once 'Routes/backward.php';
require_once 'Routes/memo.php';
require_once 'Routes/exercise.php';
require_once 'Routes/about.php';
require_once 'Routes/bonus.php';
require_once 'Routes/study.php';
require_once 'Routes/reading.php';

Route::get('/', function () {
    return redirect()->route('myHome');
});

Route::get('/captcha', function(){
     (new Securimage(config('captcha')))->show();
})->name('captcha');
