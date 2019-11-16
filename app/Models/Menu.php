<?php

namespace App\Models;

class Menu extends Model
{
    protected $fillable = [
        'parent_id',
        'parent_path',
        'name',
        'sequence',
        'icon',
        'router',
        'hidden'
    ];
}
