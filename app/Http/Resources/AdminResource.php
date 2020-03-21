<?php
/**
 * Created by PhpStorm.
 * User: JeffreyBool
 * Date: 2020/3/21
 * Time: 21:39
 */

namespace App\Http\Resources;

use App\Models\Admin;
use League\Fractal\TransformerAbstract;

class AdminResource extends TransformerAbstract
{
    protected $availableIncludes = ['role'];

    public function transform(Admin $admin)
    {
        return [
            'id'            => $admin->id,
            'name'          => $admin->name,
            'email'         => $admin->email,
            'portrait'      => $admin->portrait,
            'role_id'       => $admin->role_id,
            'login_count'   => $admin->login_count,
            'last_login_ip' => $admin->last_login_ip,
            'status'        => $admin->status,
            "created_at"    => $admin->created_at->diffForHumans(),
            "updated_at"    => $admin->updated_at->diffForHumans(),
        ];
    }


    /**
     * @param Admin $admin
     * @return \League\Fractal\Resource\Item
     */
    public function includeRole(Admin $admin)
    {
        if($admin->role) {
            return $this->item($admin->role, new RoleResource);
        }
    }
}
