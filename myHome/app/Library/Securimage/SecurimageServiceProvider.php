<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2017/1/23
 * Time: 15:35
 */

namespace App\Library\Securimage;


use Illuminate\Support\ServiceProvider;

class SecurimageServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app['validator']->extend('captcha', function($attribute, $value, $parameters){
            return (new \Securimage())->check($value);
        });
    }

    public function register()
    {
        $this->app->bind('captcha', function(){
            return new \Securimage();
        });
    }
}