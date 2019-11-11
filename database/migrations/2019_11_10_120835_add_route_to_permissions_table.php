<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRouteToPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('permissions', function (Blueprint $table) {
            $table->string('route')->nullable()->comment('路由');
            $table->unsignedInteger('sort')->nullable(false)->default(1)->comment('排序');
            $table->unsignedTinyInteger('status')->default(1)->comment('状态，1正常 2隐藏 3删除');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('permissions', function (Blueprint $table) {
            $table->dropColumn('route');
            $table->dropColumn('sort');
            $table->dropColumn('status');
        });
    }
}
