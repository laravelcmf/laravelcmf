<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuActionsTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('menu_actions', function(Blueprint $table) {
            $table->id();
            $table->string('name')->comment('动作名称');
            $table->string('code')->nullable()->comment(' 动作编号');
            $table->unsignedInteger('menu_id')->nullable()->comment('菜单ID');
            $table->timestamps();
        });
        \Illuminate\Support\Facades\DB::statement("alter table `menu_actions` comment '菜单动作关联实体'");
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_actions');
    }
}
