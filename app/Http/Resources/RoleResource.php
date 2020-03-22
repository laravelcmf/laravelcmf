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
        $collection = collect(\DB::table('role_menus')->where('role_id', $role->id)->get());
        $menus = $collection->map(function($item) {
            $data['menu_id'] = $item->menu_id;
            $data['actions'] = json_decode($item->action);
            $data['resources'] = json_decode($item->resource);
            return $data;
        });
        return [
            "id"         => $role->id,
            "name"       => $role->name,
            "memo"       => $role->memo,
            "sequence"   => $role->sequence,
            "created_at" => $role->created_at->diffForHumans(),
            "updated_at" => $role->updated_at->diffForHumans(),
            "menus"      => $menus,
        ];
    }
}
