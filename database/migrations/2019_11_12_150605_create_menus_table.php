<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('name')->nullable()->comment('名称');
            $table->integer('parent_id')->default(0)->comment('父级ID');
            $table->string('icon', 50)->nullable()->comment('图标');
            $table->string('path')->nullable()->comment('路径');
            $table->tinyInteger('is_link')->default(0)->comment('是否链接：0否，1是');
            $table->smallInteger('sort')->default(0)->comment('排序');
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
        Schema::dropIfExists('menus');
    }
}
