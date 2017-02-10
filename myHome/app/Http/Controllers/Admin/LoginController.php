<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2017/1/23
 * Time: 16:00
 */

namespace App\Http\Controllers\Admin;


use Illuminate\Support\Facades\Validator;

class LoginController extends \Pingpong\Admin\Controllers\LoginController
{
    public function store()
    {
        $validator = Validator::make(\Input::all(), [
            'email' => 'required',
            'password' => 'required',
            'captcha' => 'required|captcha',
        ], [
            'email.required' => '邮箱必填',
            'password.required' => '密码必填',
            'captcha.required' => '验证码必填',
            'captcha.captcha' => '验证码不正确',
        ]);

        if ($validator->fails()) {
            return \Redirect::back()->withFlashMessage($validator->errors()->first())->withFlashType('danger')->withInput();
        }

        $credentials = \Input::only('email', 'password');
        $remember = \Input::has('remember');

        if (\Auth::attempt($credentials, $remember)) {
            $_SESSION['admin'] = \Auth::id();

            return \Redirect::to('/')->withFlashMessage('Login Success!');
        }

        if (getenv('PINGPONG_ADMIN_TESTING')) {
            return \Redirect::to('admin/login')->withFlashMessage('Login failed!')->withFlashType('danger');
        }

        return \Redirect::back()->withFlashMessage('Login failed!')->withFlashType('danger');
    }
}