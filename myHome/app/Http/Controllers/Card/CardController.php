<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/12/23
 * Time: 14:43
 */

namespace App\Http\Controllers\Card;


use App\Bls\Card\CardBls;
use App\Consts\Card\CardStatusConst;
use App\Consts\Card\CardTypeConst;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function cardList(Request $request)
    {
        $data = (new CardBls())->getListByPage($request->all());
        //卡状态
        $selectStatus = CardStatusConst::status();
        array_unshift($selectStatus, '请选择');
        //卡类型
        $selectTypes = CardTypeConst::type();
        array_unshift($selectTypes , '请选择');

        $searchData = $request->all();
        ! empty($request->name) && $data->appends('name', $request->name);
        ! empty($request->type) && $data->appends('type', $request->type);
        ! empty($request->status) && $data->appends('status', $request->status);


        return \View::make('card.list', compact('data', 'selectStatus', 'selectTypes', 'searchData'));
    }
}