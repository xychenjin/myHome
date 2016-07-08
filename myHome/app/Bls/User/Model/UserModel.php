<?php

namespace App\Bls\User\Model;

use Pingpong\Admin\Entities\User as PingpongUser;

class UserModel extends PingpongUser
{
    protected $connection = 'db_myhome';
    protected $table = 'users';

    protected $appends = ['is_admin'];

    public function getIsAdminAttribute()
    {
        return 'yes';
    }

}