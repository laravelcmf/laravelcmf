<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PermissionGroup extends Model
{
    protected $guarded = ['id'];

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'sort',
        'status',
    ];

    public function permission()
    {
        return $this->hasMany(Permission::class, 'permission_group_id');
    }
}
