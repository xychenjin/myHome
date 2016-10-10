<?php

namespace App\Http\Controllers\Http\Code;

use App\Bls\OpenInterface\OrderInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;

class IndexController extends Controller implements OrderInterface
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return View::make('Http.Code.index', [
            'q'=> isset($q) ? $q : '' ,
            'error'=> isset($info['replace']) ? $info['replace'] : '',
            'error_msg'=> isset($info['resultCodeDesc']) ? $info['resultCodeDesc'] : ''
        ]);
    }

    public function ajax(Request $request)
    {
//        header('Access-Control-Allow-Origin:*');
        $data = $request->all();

        var_dump($data['code']);
        exit();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     *  支付结算
     *
     * @param $sn
     */
    public function paymentSettlement($sn)
    {
        // TODO: Implement paymentSettlement() method.
    }

    /**
     * 退款结算
     *
     * @param $sn
     */
    public function refundSettlement($sn)
    {
        // TODO: Implement refundSettlement() method.
    }

    /**
     * 微信支付
     *
     * @param $orderSn
     */
    public function weixinPayment($orderSn)
    {
        // TODO: Implement weixinPayment() method.
    }

    /**
     * 银联支付
     *
     * @param $orderSn
     */
    public function yinlianPayment($orderSn)
    {
        // TODO: Implement yinlianPayment() method.
    }

}
