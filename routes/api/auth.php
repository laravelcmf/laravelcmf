<?php
/**
 * Created by PhpStorm.
 * User: JeffreyBool
 * Date: 2019/11/11
 * Time: 19:58
 */

Route::namespace('Api')->group(function() {
    //获取 token
    Route::post('oauth/token', 'AccessTokenController@authorizations')->name('passport.token');

    //刷新token
    Route::put('oauth/token/refresh', 'TransientTokenController@refresh')->name('passport.token.refresh');

    //删除 token
    Route::delete('oauth/token', 'AuthorizedAccessTokenController@destroy')->name('passport.tokens.destroy')->middleware('auth:api');
});