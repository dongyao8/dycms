<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique()->comment('用户名');
            $table->string('avatar')->nullable()->comment('用户头像路径');
            $table->string('email')->unique()->comment('用户邮箱');
            $table->string('mobile', 50)->default(0)->comment('手机号');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->decimal('amount', 8, 2);
            $table->bigInteger('integral');
            $table->integer('source')->default(0)->comment('邀请上级用户ID');
            $table->rememberToken();
            $table->timestamps();
            $table->bigInteger('active')->default(1)->comment('用户状态，默认为1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
