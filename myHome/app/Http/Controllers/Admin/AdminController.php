<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/12/22
 * Time: 14:20
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Pingpong\Admin\Entities\User as UserModel;
use Validator;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except'=> '']);
    }

    public function pwd()
    {
        return \View::make('user.pwd');
    }

    public function updatePwd(Request $request)
    {
        $user = \Auth::user();

        $model = UserModel::findOrFail($user->id);

        $validator = Validator::make($request->all(), [
            'password' => 'required|between:6,20|confirmed',
            'password_confirmation' => 'required'
        ], [
//            'password.alpha' => '密码为数字，大小写字母之间的字符',
            'password.required' => '密码为必填',
            'password_confirmation.required' => '确认密码为必填',
            'password.between' => '密码长度为6-20位之间的字符',
            'password.confirmed' => '两次密码不一致',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $model->password = $request->password;
        $model->save();

        \Auth::logout();

        return redirect('admin/login');
    }
}