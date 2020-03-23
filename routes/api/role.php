<?php
/**
 * Created by PhpStorm.
 * User: JeffreyBool
 * Date: 2019/11/21
 * Time: 00:58
 */


$api->version('v1', [
    'namespace'  => 'App\Http\Controllers\Api',
    'middleware' => [
        'bindings',
        'auth:api',
        'serializer:array',
        'authority'
    ],
], function($api) {
    $api->get('roles/list', 'RoleController@list')->name('roles.list');;
    $api->resource('roles', 'RoleController');
});
