<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMajorLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('major_links', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title',200)->comment('导航标题');
            $table->string('imgurl',250)->nullable(true)->comment('封面图片');
            $table->text('url')->comment('链接网址URL');
            $table->integer('sort')->default(0)->comment('排序值');
            $table->integer('views')->default(0)->comment('点击量');
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
        Schema::dropIfExists('major_links');
    }
}
