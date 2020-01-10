<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdminResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {

        $address = join(array_unique(array_filter(\Ip::find($this->last_login_ip))), ' ');

        return [
            'id'            => $this->id,
            'name'          => $this->name,
            'email'         => $this->email,
            'portrait'      => $this->portrait,
            'role_id'       => $this->role_id,
            'login_count'   => $this->login_count,
            'last_login_ip' => $this->last_login_ip,
            'login_address' => $address ? $address : null,
            'status'        => $this->status,
            "created_at"    => (string)$this->created_at,
            "updated_at"    => (string)$this->updated_at,
            "role"          => $this->whenLoaded('role')
        ];
    }
}
