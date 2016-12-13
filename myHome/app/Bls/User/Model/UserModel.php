<?php

namespace App\Bls\User\Model;

use Pingpong\Admin\Entities\User as PingpongUser;

class UserModel extends PingpongUser
{
    protected $connection = 'db_2016';
    protected $table = 't_user';

    protected $appends = ['is_admin'];

    protected $guarded = [];

    public function getIsAdminAttribute()
    {
        return 'yes';
    }

}