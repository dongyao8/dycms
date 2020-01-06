<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWatersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('waters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->default(0)->index()->comment('用户ID');
            $table->integer('type')->default(1)->comment('消费类型，1消费，2扣除');
            $table->integer('method')->default(1)->comment('消费种类，1积分，2现金');
            $table->decimal('amount', 8, 2)->default(0)->comment('消费金积分');
            $table->bigInteger('integral')->default(0)->comment('消费金积分');
            $table->string('content',150)->default(0)->comment('备注信息');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('waters');
    }
}
