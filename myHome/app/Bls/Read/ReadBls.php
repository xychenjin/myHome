<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2017/2/10
 * Time: 11:07
 */

namespace App\Bls\Read;


use App\Bls\Read\Model\BookModel;

class ReadBls
{
    public function getList($input , $orderBy = 'id desc', $paginator = 20)
    {
        return BookModel::query()->orderByRaw($orderBy)->paginate($paginator);
    }
}