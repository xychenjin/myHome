<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDbM2016BonusLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! Schema::connection('db_m2016')->hasTable('t_bonus_log')) {
            Schema::connection('db_m2016')->create('t_bonus_log', function (Blueprint $table) {
                $table->increments('id');
                $table->decimal('amount', 5, 2)->default('0.00')->comment('金额：0.00元');
                $table->decimal('balance', 5, 2)->default('0.00')->comment('余额：0.00元');
                $table->tinyInteger('number')->default(0)->comment('数量/份');
                $table->string('name')->default('')->comment('红包名称');
                $table->integer('owner')->default(0)->comment('发红包者');
                $table->integer('user_id')->default(0)->comment('抢到红包者');
                $table->tinyInteger('type')->default(1)->comment('红包类型：1.普通红包，2.手气红包，3.定向红包。特别说明：1、2类限制上限为200 3类限制20000以内');
                $table->string('desc')->comment('备注');
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('db_m2016')->dropIfExists('t_bonus_log');
    }
}
