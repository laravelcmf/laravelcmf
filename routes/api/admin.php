<?php
/**
 * Created by PhpStorm.
 * User: JeffreyBool
 * Date: 2019/11/11
 * Time: 19:59
 */

Route::namespace('Api')->middleware(['auth:api','ability'])->group(function() {
    Route::get('admins/me', 'AdminController@me')->name('admin.me');
    Route::get('admins/menus','AdminController@getMenus')->name('admin.menus');
    Route::apiResource('admins', 'AdminController');
});