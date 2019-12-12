<?php

namespace App\Models\Traits;

use Auth;

trait HasPermission
{

    /**
     * 检验权限
     * @param string $method
     * @param string $route
     * @return bool
     */
    public function checkPermission(string $method, string $route): bool
    {
        //获取用户角色验证权限.
        $user = Auth::user();
        $role = $user->getRole();
        if($role && in_array($role->id, config('permission.role_id'))) {
            return true;
        }
        foreach($role->menus as $menu) {
            foreach($menu->resources as $resource) {
                if($resource->method == $method && $resource->path == $route) {
                    return true;
                }
            }
        }
        return false;
    }
}