<?php
/**
 * Created by PhpStorm.
 * User: JeffreyBool
 * Date: 2019/11/11
 * Time: 19:58
 */

$api->version('v1', [
    'namespace'  => 'App\Http\Controllers\Api',
    'middleware' =>[
        'api.throttle',
        'serializer'
    ],
], function($api) {
    // 获取 token
    $api->post('oauth/token', 'AccessTokenController@authorizations')->name('passport.token');

    // 刷新token
    $api->put('oauth/token/refresh', 'TransientTokenController@refresh')->name('passport.token.refresh');

    // 删除 token
    $api->delete('oauth/token', 'AuthorizedAccessTokenController@destroy')->name('passport.tokens.destroy')->middleware('auth:api');
});
