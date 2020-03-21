<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuResourcesTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('menu_resources', function(Blueprint $table) {
            $table->id();
            $table->string('name')->comment('资源名称');
            $table->string('code')->nullable()->comment('资源编码');
            $table->string('method')->nullable()->comment('资源请求方式');
            $table->string('path')->nullable()->comment('资源请求路径');
            $table->unsignedInteger('menu_id')->comment('菜单ID');
            $table->timestamps();
        });
        \Illuminate\Support\Facades\DB::statement("alter table `menu_resources` comment '菜单资源关联实体'");
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_resources');
    }
}
