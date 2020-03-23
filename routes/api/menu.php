<?php
/**
 * Created by PhpStorm.
 * User: JeffreyBool
 * Date: 2019/11/17
 * Time: 04:04
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
    $api->get('menus/tree', 'MenuController@tree')->name('menus.tree');
    $api->resource('menus', 'MenuController');
});
