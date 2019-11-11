<?php
/**
 * Created by PhpStorm.
 * User: JeffreyBool
 * Date: 2019/11/11
 * Time: 19:59
 */

Route::namespace('Api',function(){
    Route::get('/me', 'AdminController@me')->name('admin.me');
});