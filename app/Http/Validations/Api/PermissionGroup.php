<?php
/**
 * Created by PhpStorm.
 * User: JeffreyBool
 * Date: 2019/11/13
 * Time: 14:33
 */

namespace App\Http\Validations\Api;

class PermissionGroup
{
    public function store()
    {
        return [
            'rules' => [
                'name' => 'required|between:3,255',
            ],

            'messages' => [
                'name.required' => '名称不能为空',
                'name.between'  => '名称必须介于 3 - 255 个字符之间。',
            ]
        ];
    }
}