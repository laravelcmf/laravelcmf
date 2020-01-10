<?php
/**
 * Created by PhpStorm.
 * User: JeffreyBool
 * Date: 2019/11/11
 * Time: 19:59
 */

Route::namespace('Api')->middleware(['auth:api', 'ability'])->group(function() {
    Route::get('admins/me', 'AdminController@me')->name('admin.me');
    Route::patch('admins/{admin}/enable', 'AdminController@enable')->name('admins.enable');
    Route::patch('admins/{admin}/disable', 'AdminController@disable')->name('admins.disable');
    Route::get('admins/menus', 'AdminController@getMenus')->name('admin.menus');
    Route::apiResource('admins', 'AdminController');
});