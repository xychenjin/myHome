<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/12/15
 * Time: 10:22
 */

namespace App\Bls\Commute\Model;


use Illuminate\Database\Eloquent\Model;
use Pingpong\Admin\Entities\User;

class CommuteModel extends Model
{
    protected $connection = 'db_m2016';

    protected $table = 't_commute';

    protected $guarded = [];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}