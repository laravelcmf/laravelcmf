<?php

namespace App\Http\Resources;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Resources\Json\JsonResource;

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
            $data['actions'] = json_decode($item->action);
            $data['resources'] = json_decode($item->resource);
            return $data;
        });
        $data = parent::toArray($request);
        $data['menus'] = $menus;
        return $data;
    }
}
