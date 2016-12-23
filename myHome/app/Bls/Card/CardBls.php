<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/12/23
 * Time: 14:10
 */

namespace App\Bls\Card;


class CardBls
{
    public function getListByPage($searchData, $orderByRaw = '`id` desc' , $paginator = 10)
    {
        $query = CardModel::query();

        return $query->orderByRaw($orderByRaw)->paginate($paginator);
    }
}