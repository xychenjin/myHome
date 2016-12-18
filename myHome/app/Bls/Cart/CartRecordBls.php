<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/18 0018
 * Time: 下午 9:01
 */

namespace App\Bls\Cart;


use App\Bls\Cart\Model\CartRecordModel;

class CartRecordBls
{
    public function getListByPage($searchData, $orderBy = 'id desc', $paginator = 10)
    {
        return CartRecordModel::query()->orderByRaw($orderBy)->paginate($paginator);
    }

    public function store($input)
    {
        return CartRecordModel::create($input);
    }

    public function findById($id)
    {
        return CartRecordModel::findOrFail($id);
    }
}