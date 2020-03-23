<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_actions', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('role_id')->index()->comment('角色ID');
            $table->unsignedInteger('action_id')->index()->comment('动作ID');
            $table->timestamps();
        });
        \Illuminate\Support\Facades\DB::statement("alter table `role_actions` comment '角色动作关联实体'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_actions');
    }
}
