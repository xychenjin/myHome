<?php

namespace App\Bls\OpenInterface;


interface OrderInterface
{
    //支付结算
    public function paymentSettlement($sn);

    //退款结算
    public function refundSettlement($sn);

    //微信支付接口
    public function weixinPayment($orderSn);

    //银联支付接口
   public function yinlianPayment($orderSn);

}