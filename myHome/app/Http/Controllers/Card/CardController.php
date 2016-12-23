<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2016/12/23
 * Time: 14:43
 */

namespace App\Http\Controllers\Card;


use App\Bls\Card\CardBls;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function cardList(Request $request)
    {
        $data = (new CardBls())->getListByPage($request->all());
        return \View::make('card.list', compact('data'));
    }
}