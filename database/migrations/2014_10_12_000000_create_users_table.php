<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('users', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique()->comment('邮箱');
            $table->string('password');
            $table->string('portrait', 128)->comment('头像');
            $table->unsignedInteger('login_count')->default(0)->comment('登录次数');
            $table->string('last_login_ip')->comment('最后登录IP');
            $table->unsignedTinyInteger('status')->default(1)->comment('状态，1正常 2禁止 3删除');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
