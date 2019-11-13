<?php
/**
 * Created by PhpStorm.
 * User: JeffreyBool
 * Date: 2018/11/4
 * Time: 22:45
 */

namespace App\Http\Validations\Api;

class Admin
{
    public function store()
    {
        return [
            'rules' => [
                'name'     => 'required|between:3,25|unique:admins,name,' . request()->route('admin.id'),
                'password' => 'required|confirmed|min:6',
                'email'    => 'nullable|email|unique:admins,email,' . request()->route('admin.id'),
                'portrait' => 'nullable|string',
                'status'   => 'nullable|integer',
            ],

            'messages' => [
                'name.required'      => '名称不能为空',
                'name.between'       => '名称必须介于 3 - 25 个字符之间。',
                'name.unique'        => '名称已被占用，请重新填写',
                'password.required'  => '密码不能为空',
                'password.confirmed' => '两次密码不一致',
                'password.min'       => '密码长度不能小于6位',
                'email.email'        => '邮箱格式不正确',
                'email.unique'       => '邮箱已经被使用',
            ]
        ];
    }


    public function update()
    {
        return [
            'rules' => [
                'name'     => 'nullable|between:3,25|unique:admins,name,' . request()->route('admin.id'),
                'password' => 'nullable|min:6',
                'email'    => 'nullable|email|unique:admins,email,' . request()->route('admin.id'),
                'avatar'   => 'nullable|string',
                'status'   => 'nullable|integer',
            ],

            'messages' => [
                'name.between' => '名称必须介于 3 - 25 个字符之间。',
                'name.unique'  => '名称已被占用，请重新填写',
                'password.min' => '密码长度不能小于6位',
                'email.email'  => '邮箱格式不正确',
                'email.unique' => '邮箱已经被使用',
            ]
        ];
    }
}