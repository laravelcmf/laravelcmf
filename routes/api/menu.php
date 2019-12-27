<?php
/**
 * Created by PhpStorm.
 * User: JeffreyBool
 * Date: 2019/11/17
 * Time: 04:04
 */

//菜单
Route::namespace('Api')->middleware(['auth:api', 'ability'])->group(function() {
    Route::get('menus/tree', 'MenuController@tree')->name('menus.tree');
    Route::apiResource('menus', 'MenuController');
});