<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNavigationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('navigations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title',200)->comment('导航标题');
            $table->integer('navigation_category_id')->index()->default(0)->comment('分类ID');
            $table->text('url')->comment('链接网址URL');
            $table->integer('sort')->default(0)->comment('排序值');
            $table->integer('views')->default(0)->comment('点击量');
            $table->integer('user_id')->default(0)->comment('用户ID');
            $table->integer('status')->default(1)->comment('导航状态');
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
        Schema::dropIfExists('navigations');
    }
}
