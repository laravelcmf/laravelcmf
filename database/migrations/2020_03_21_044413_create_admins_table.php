<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function(Blueprint $table) {
            $table->id();
            $table->string('name')->unique()->comment('用户名');
            $table->string('email')->unique()->comment('邮箱');
            $table->string('password')->comment('密码');
            $table->string('portrait', 128)->nullable()->comment('头像');
            $table->integer('role_id')->nullable()->default(null)->comment('角色ID');
            $table->unsignedInteger('login_count')->default(0)->comment('登录次数');
            $table->string('last_login_ip')->nullable()->comment('最后登录IP');
            $table->unsignedTinyInteger('status')->default(1)->comment('状态，1正常 2禁止 3删除');
            $table->timestamps();
        });
        \Illuminate\Support\Facades\DB::statement("alter table `admins` comment '后台用户'");
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
