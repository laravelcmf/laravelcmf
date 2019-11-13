<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PermissionGroup extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'sort',
        'status',
    ];
}
