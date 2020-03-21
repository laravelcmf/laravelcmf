<?php
/**
 * Created by PhpStorm.
 * User: JeffreyBool
 * Date: 2020/3/21
 * Time: 21:52
 */

namespace App\Http\Resources;

use App\Models\Role;
use League\Fractal\TransformerAbstract;

class RoleResource extends TransformerAbstract
{
    public function transform(Role $role)
    {
        return [
            "id"         => $role->id,
            "name"       => $role->name,
            "memo"       => $role->memo,
            "sequence"   => $role->sequence,
            "created_at" => $role->created_at->diffForHumans(),
            "updated_at" => $role->updated_at->diffForHumans(),
        ];
    }
}
