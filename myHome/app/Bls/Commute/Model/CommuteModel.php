<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/12/15
 * Time: 10:22
 */

namespace App\Bls\Commute\Model;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Pingpong\Admin\Entities\User;

class CommuteModel extends Model
{
    use SoftDeletes;

    protected $connection = 'db_m2016';

    protected $table = 't_commute';

    protected $guarded = [];

    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    //软删除
    public function softDelete()
    {
        $this->runSoftDelete();
    }
}