<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DbM2016CreateWage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('db_m2016')->create('t_wage', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sent_account')->default('')->comment('对方打钱账户名');
            $table->string('saved_account')->default('')->comment('己方收钱账户名');
            $table->integer('balance')->default(0)->comment('余额');
            $table->integer('received_amount')->default(0)->comment('收入金额');
            $table->decimal('tax', 5, 2)->default('0.00')->comment('支付手续费');
            $table->date('received_date')->comment('入账日期');
            $table->dateTime('received_at')->comment('入账时间');
            $table->dateTime('sent_at')->comment('转账时间');
            $table->text('notice')->comment('备注');
            $table->tinyInteger('trans_way')->default(0)->comment('打钱渠道，方式：0.未知,1.网银转账，2.ATM转账，3.支付宝，4.微信，5.其他');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('db_m2016')->dropIfExists('t_wage');
    }
}
