<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminRolesTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('admin_roles', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('admin_id')->index()->comment('后台用户ID');
            $table->unsignedInteger('role_id')->index()->comment('角色ID');
            $table->timestamps();
        });
        \Illuminate\Support\Facades\DB::statement("alter table `admin_roles` comment '用户角色关联'");
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_roles');
    }
}
