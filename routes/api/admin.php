<?php
/**
 * Created by PhpStorm.
 * User: JeffreyBool
 * Date: 2019/11/11
 * Time: 19:59
 */

Route::namespace('Api')->prefix('admins')->middleware('auth:api')->group(function() {
    Route::get('me', 'AdminController@me')->name('admin.me');
    Route::apiResource('', 'AdminController');
});