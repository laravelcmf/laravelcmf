<?php
/**
 * Created by PhpStorm.
 * User: JeffreyBool
 * Date: 2019/11/13
 * Time: 19:00
 */

namespace App\Http\Validations\Api;


class Role
{
    public function store()
    {
        return [
            'rules' => [
                'name'        => 'required|between:1,20',
                'description' => 'nullable|max:500',
                'status'      => 'nullable|integer'
            ],

            'messages' => [
                'name.required'   => '名称不能为空',
                'name.between'    => '名称长度必须为1到20位',
                'description.max' => '描述不能超过500个字符',
                'status.integer'  => 'status必须为整型',
            ]
        ];
    }
}