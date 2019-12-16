<?php
/**
 * Created by PhpStorm.
 * User: JeffreyBool
 * Date: 2019/11/21
 * Time: 00:58
 */

//角色
Route::namespace('Api')->middleware(['auth:api','ability'])->group(function() {
    Route::patch("roles/{role}/sync_permissions",'RoleController@syncPermissions')->name('roles.sync_permissions');
    Route::apiResource('roles', 'RoleController');
});