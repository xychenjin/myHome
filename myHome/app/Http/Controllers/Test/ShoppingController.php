<?php

namespace App\Http\Controllers\Test;


use App\Bls\OpenInterface\OrderInterface;
use App\Http\Controllers\Controller;

class ShoppingController extends Controller implements OrderInterface
{

    /**
     *  支付结算
     *
     * @param $sn
     */
    public function paymentSettlement($sn)
    {
        // TODO: Implement paymentSettlement() method.
        dd(__CLASS__. '=>' . __FUNCTION__);
    }

    /**
     * 退款结算
     *
     * @param $sn
     */
    public function refundSettlement($sn)
    {
        // TODO: Implement refundSettlement() method.
        dd(__CLASS__. '=>' . __FUNCTION__);
    }

    /**
     * 微信支付
     *
     * @param $orderSn
     */
    public function weixinPayment($orderSn)
    {
        // TODO: Implement weixinPayment() method.
        dd(__CLASS__. '=>' . __FUNCTION__);
    }

    /**
     * 银联支付
     *
     * @param $orderSn
     */
    public function yinlianPayment($orderSn)
    {
        // TODO: Implement yinlianPayment() method.
        dd(__CLASS__. '=>' . __FUNCTION__);
    }
}