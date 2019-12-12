<?php
/**
 * Created by PhpStorm.
 * User: JeffreyBool
 * Date: 2019/11/11
 * Time: 19:59
 */

Route::namespace('Api')->middleware(['auth:api','ability'])->group(function() {
    Route::get('admins/me', 'AdminController@me')->name('admin.me');
    Route::apiResource('admins', 'AdminController');
    Route::post('admins/{admin}/access_roles', 'AdminController@AccessRoles')->name('admins.access_roles');
});