<?php
/**
 * Created by PhpStorm.
 * User: JeffreyBool
 * Date: 2019/11/13
 * Time: 15:01
 */

//权限分组
Route::namespace('Api')->middleware('auth:api')->group(function() {
    Route::get('permission-groups/all', 'PermissionGroupController@all')->name('permission-groups.all');
    Route::apiResource('permission-groups', 'PermissionGroupController');
});

//权限
Route::namespace('Api')->middleware('auth:api')->group(function() {
    Route::get('permissions/all', 'PermissionController@all')->name('permissions.all');
    Route::apiResource('permissions', 'PermissionController');
});