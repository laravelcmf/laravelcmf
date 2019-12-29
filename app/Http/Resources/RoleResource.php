<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class RoleResource extends JsonResource
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $collection = collect(DB::table('role_menus')->where('role_id', $this->id)->get());
        $menus = $collection->map(function($item) {
            $data['menu_id'] = $item->menu_id;
            $data['actions'] = $item->action;
            $data['resources'] = $item->resource;
            return $data;
        });
        $data = parent::toArray($request);
        $data['menus'] = $menus;
        return $data;
    }
}
