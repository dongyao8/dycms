<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->default(0)->index()->comment('用户ID，管理员为0');
            $table->string('title',200);
            $table->string('imgurl',250)->nullable(true)->comment('封面图片');
            $table->integer('category_id')->default(0)->index()->comment('分类ID');
            $table->text('content');
            $table->integer('status')->default(0)->comment('文章状态');
            $table->integer('is_hot')->default(0)->comment('是否推荐，默认不推荐');
            $table->integer('views')->default(0)->comment('文章阅读量');
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
        Schema::dropIfExists('articles');
    }
}
