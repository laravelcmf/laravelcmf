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
                'name'     => 'required|between:1,20|unique:roles',
                'memo'     => 'nullable|max:500',
                'sequence' => 'nullable|integer'
            ],

            'messages' => [
                'name.required'    => '名称不能为空',
                'name.between'     => '名称长度必须为1到20位',
                'name.unique'      => '名称已被占用，请重新填写',
                'memo.max'         => '描述不能超过500个字符',
                'sequence.integer' => '排序必须为整型',
            ]
        ];
    }

    public function update()
    {
        return [
            'rules' => [
                'name'     => 'required|between:1,20||unique:roles,name,' . request()->route('role.id'),
                'memo'     => 'nullable|max:500',
                'sequence' => 'nullable|integer'
            ],

            'messages' => [
                'name.required'    => '名称不能为空',
                'name.between'     => '名称长度必须为1到20位',
                'name.unique'      => '名称已被占用，请重新填写',
                'memo.max'         => '描述不能超过500个字符',
                'sequence.integer' => '排序必须为整型',
            ]
        ];
    }
}