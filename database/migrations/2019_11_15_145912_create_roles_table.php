<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->comment('角色名称');
            $table->unsignedInteger('sequence')->default(10000)->comment('排序值');
            $table->string('memo')->nullable()->comment('备注');
            $table->timestamps();
        });
        \Illuminate\Support\Facades\DB::statement("alter table `roles` comment '角色'");
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
