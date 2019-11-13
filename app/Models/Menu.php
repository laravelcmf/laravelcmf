<?php

namespace App\Models;

class Menu extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'parent_id',
        'icon',
        'path',
        'is_link',
        'sort',
        'status',
    ];
}
