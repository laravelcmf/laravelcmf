<?php

namespace App\Models;

class Role extends Model
{
    protected $fillable = [
        'name',
        'sequence',
        'memo'
    ];
}
