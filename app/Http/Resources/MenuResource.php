<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MenuResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $data = parent::toArray($request);
        $data['path'] = $data['path'] ? $data['path'] : '';
        $data['actions'] = new MenuActionResource($this->whenLoaded('actions'));
        $data['resources'] = new MenuResourceResource($this->whenLoaded('resources'));
        return $data;
    }
}
