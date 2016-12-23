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

        if (isset($searchData['name']) && ! empty($searchData['name']) ) {
            $query->where(function($q) use($searchData) {
                $q->where('card_no', trim($searchData['name']))
                    ->orWhere('card_pwd', str_replace('-', '', trim($searchData['name'])));
            });
        }
        if (isset($searchData['type']) && ! empty($searchData['type'])) {
            $query->where('type', $searchData['type']);
        }
        if (isset($searchData['status']) && ! empty($searchData['status'])) {
            $query->where('status', $searchData['status']);
        }

        return $query->orderByRaw($orderByRaw)->paginate($paginator);
    }
}