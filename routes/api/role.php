<?php
/**
 * Created by PhpStorm.
 * User: JeffreyBool
 * Date: 2019/11/21
 * Time: 00:58
 */

//角色
Route::namespace('Api')->middleware(['auth:api','ability'])->group(function() {
    Route::get('roles/list', 'RoleController@list')->name('roles.list');
    Route::apiResource('roles', 'RoleController');
});