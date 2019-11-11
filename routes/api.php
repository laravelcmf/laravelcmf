<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::namespace('Api')->group(function () {
    //获取 token
    Route::post('oauth/token', 'AccessTokenController@authorizations')->name('passport.token');

    //刷新token
    Route::put('oauth/token/refresh', 'TransientTokenController@refresh')->name('passport.token.refresh');
});

