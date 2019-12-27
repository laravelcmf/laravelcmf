<?php
/**
 * Created by PhpStorm.
 * User: JeffreyBool
 * Date: 2019/11/13
 * Time: 20:59
 */

namespace App\Http\Validations\Api;

class Menu
{
    public function store()
    {
        return [
            'rules' => [
                'name'      => 'required|between:2,64|unique:menus,name,' . request()->route('menu.id'),
                'parent_id' => 'nullable|integer',
                'icon'      => 'nullable|max:50',
                'router'    => 'nullable|max:128',
                'sequence'  => 'nullable|integer',
                'hidden'    => 'nullable|integer',
                'actions'   => 'nullable|array',
                'resources' => 'nullable|array',
            ],

            'messages' => [
                'name.required'      => '名称不能为空',
                'name.between'       => '名称必须介于 2 - 64 个字符之间。',
                'name.unique'        => '名称已被占用，请重新填写',
                'icon.max'           => '图标最大不能超过50字符',
                'parent_id.integer'  => '父级菜单必须为整数',
                'router.max'         => '路由最大长度不能超过128字符',
                'sequence.integer'   => '排序必须为整型',
                'hidden.integer'     => '状态必须为整型',
                'actions.array'       => '菜单动作必须为合法的json',
                'resources.array'     => '菜单资源必须为合法的json',
            ]
        ];
    }
}