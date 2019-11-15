<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('parent_id')->nullable()->comment('父级ID');
            $table->string('parent_path')->nullable()->comment('父级路径');
            $table->uuid('record_id')->comment('记录ID');
            $table->string('name')->comment('菜单名称');
            $table->unsignedInteger('sequence')->default(10000)->comment('排序值');
            $table->string('icon')->nullable()->comment('图标');
            $table->string('router')->nullable()->comment('访问路由');
            $table->unsignedTinyInteger('hidden')->default(0)->comment('隐藏菜单: 0:不隐藏, 1:隐藏');
            $table->timestamps();
        });
        \Illuminate\Support\Facades\DB::statement("alter table `menus` comment '菜单'");
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
