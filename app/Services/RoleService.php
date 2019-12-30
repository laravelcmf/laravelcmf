<?php
/**
 * Created by PhpStorm.
 * User: JeffreyBool
 * Date: 2019/12/30
 * Time: 23:21
 */

namespace App\Services;

use App\Models\Role;
use Illuminate\Support\Arr;

class RoleService
{
    public function syncPermissions(Role $role, array $menus = [])
    {
        if($menus) {
            $_tempMenus = [];
            foreach($menus as $key => $menu) {
                $_tempMenus[$menu['menu_id']] = [
                    'action'   => json_encode(Arr::get($menu, 'actions', [])),
                    'resource' => json_encode(Arr::get($menu, 'resources', [])),
                ];
            }
            $role->menus()->sync($_tempMenus);
        }
    }
}