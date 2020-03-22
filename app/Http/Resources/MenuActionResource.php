<?php
/**
 * Created by PhpStorm.
 * User: JeffreyBool
 * Date: 2020/3/22
 * Time: 16:16
 */

namespace App\Http\Resources;

use App\Models\MenuAction;
use League\Fractal\TransformerAbstract;

class MenuActionResource extends TransformerAbstract
{
    public function transform(MenuAction $action)
    {
        return [
            'id'      => $action->id,
            'name'    => $action->name,
            'code'    => $action->code,
            'menu_id' => $action->menu_id,
        ];
    }
}
