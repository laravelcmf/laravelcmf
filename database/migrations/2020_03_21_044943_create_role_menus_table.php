<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_menus', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('role_id')->index()->comment('角色ID');
            $table->unsignedInteger('menu_id')->index()->comment('菜单ID');
            $table->timestamps();
        });
        \Illuminate\Support\Facades\DB::statement("alter table `menu_resources` comment '角色菜单关联实体'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_menus');
    }
}
