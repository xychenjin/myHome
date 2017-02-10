<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2017/2/10
 * Time: 11:08
 */

namespace App\Bls\Read\Model;


use Illuminate\Database\Eloquent\Model;

class BookModel extends Model
{
    protected $connection = 'db_m2016';

    protected $table = 't_book';

    protected $guarded = [];

}