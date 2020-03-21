<?php
/**
 * Created by PhpStorm.
 * User: JeffreyBool
 * Date: 2020/3/22
 * Time: 02:18
 */

namespace App\Http\Resources;

use App\Models\Menu;
use League\Fractal\TransformerAbstract;

class MenuApiResource extends TransformerAbstract
{
    public function transform(Menu $menu)
    {
        dd($menu);
        return [
            'id'         => $menu->id,
            'name'       => $menu->name,
            'code'       => $menu->code,
            'menu_id'    => $menu->menu_id,
            'method'     => $menu->method,
            'path'       => $menu->path,
            "created_at" => $menu->created_at->diffForHumans(),
            "updated_at" => $menu->updated_at->diffForHumans(),
        ];
    }
}
