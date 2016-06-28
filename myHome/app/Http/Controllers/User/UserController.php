<?php

namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;
use App\Bls\User\UserBls;

class UserController extends Controller
{
    public function index(){
        $user = (new UserBls())->getAll();
        dd($user);
    }
}