<?php
/**
 * Created by PhpStorm.
 * Admin: JeffreyBool
 * Date: 2019/11/11
 * Time: 14:20
 */

namespace App\Http\Validations\Api;

class Auth
{
    public function login()
    {
        return [
            'rules'    => [
                'name'     => 'required|string',
                'password' => 'required|string',
            ],
            'messages' => [
                'name.required'     => '用户名不能为空',
                'name.string'       => '用户名必须是字符串',
                'password.required' => '密码不能为空',
                'password.string'   => '密码必须是字符串',
            ]
        ];
    }

    public function refresh()
    {
        return [
            'rules'    => [
                'refresh_token' => 'required|string',
            ],
            'messages' => [
                'refresh_token.required' => 'refresh_token不能为空',
                'refresh_token.string'   => 'refresh_token必须是字符串',
            ]
        ];
    }
}