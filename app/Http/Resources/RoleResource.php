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
        return $role->toArray();
    }
}
