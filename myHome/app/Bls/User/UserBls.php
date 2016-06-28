<?php

namespace App\Bls\User;

use App\Bls\User\Model\UserModel;

class UserBls
{
    public function getAll(){
        return UserModel::all();
    }
}