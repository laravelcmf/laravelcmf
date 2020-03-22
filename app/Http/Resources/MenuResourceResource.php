<?php
/**
 * Created by PhpStorm.
 * User: JeffreyBool
 * Date: 2020/3/22
 * Time: 16:20
 */

namespace App\Http\Resources;

use App\Models\MenuResource;
use League\Fractal\TransformerAbstract;

class MenuResourceResource extends TransformerAbstract
{
    public function transform(MenuResource $resource)
    {
        return [
            'id'      => $resource->id,
            'name'    => $resource->name,
            'code'    => $resource->code,
            'method'  => $resource->method,
            'path'    => $resource->path,
            'menu_id' => $resource->menu_id,
        ];
    }
}
