<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDbM2016ExerciseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! Schema::connection('db_m2016')->hasTable('t_exercise')) {
            Schema::connection('db_m2016')->create('t_exercise', function (Blueprint $table) {
                $table->increments('id');
                $table->date('day')->default('0000-00-00')->comment('运动日期');
                $table->time('period')->default('00:00:00')->comment('运动时长');
                $table->tinyInteger('weekTh')->default('0')->comment('星期');
                $table->text('desc')->comment('内容');
                $table->text('ext')->comment('其他');
                $table->tinyInteger('star')->comment('自我评价：0-10分');
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
        Schema::connection('db_m2016')->dropIfExists('t_exercise');
    }
}
