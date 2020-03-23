<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleResourcesTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('role_resources', function(Blueprint $table) {
            $table->id();
            $table->unsignedInteger('role_id')->index()->comment('角色ID');
            $table->unsignedInteger('resource_id')->index()->comment('资源ID');
            $table->timestamps();
        });
        \Illuminate\Support\Facades\DB::statement("alter table `role_actions` comment '角色资源关联实体'");
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_resources');
    }
}
