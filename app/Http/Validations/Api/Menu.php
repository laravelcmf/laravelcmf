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
                'name'      => 'required|max:64',
                'parent_id' => 'required|numeric',
                'path'      => 'nullable|max:128',
                'icon'      => 'nullable|max:50',
                'is_link'   => 'in:0,1',
                'sort'      => 'nullable|integer',
                'status'    => 'nullable|integer',
            ],

            'messages' => [
                'name.required'                => '名称不能为空',
                'name.max'                     => '名称最大长度不能超过64字符',
                'permission_group_id.required' => '父级菜单不能为空',
                'permission_group_id.numeric'  => '父级菜单为整数',
                'path.max'                     => '路径最大不能超过128字符',
                'icon.max'                     => '图标最大不能超过50字符',
                'is_link.in'                   => 'is_link只能为 0和1',
                'sort.integer'                 => '排序必须为整型',
                'status.integer'               => '状态必须为整型',
            ]
        ];
    }
}