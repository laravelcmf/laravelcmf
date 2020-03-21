<?php
/**
 * Created by PhpStorm.
 * User: JeffreyBool
 * Date: 2019/11/11
 * Time: 19:59
 */

$api->version('v1', [
    'namespace'  => 'App\Http\Controllers\Api',
    'middleware' => [
        'bindings',
        'auth:api',
        'serializer:array'
    ],
], function($api) {
    $api->get('admins/me', 'AdminController@me')->name('admin.me');
    $api->get('admins/menus', 'AdminController@getMenus')->name('admin.menus');
    $api->patch('admins/{admin}/enable', 'AdminController@enable')->name('admins.enable');
    $api->patch('admins/{admin}/disable', 'AdminController@disable')->name('admins.disable');
    $api->resource('admins', 'AdminController');
});
