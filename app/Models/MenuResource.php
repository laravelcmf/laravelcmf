<?php

namespace App\Models;

class MenuResource extends Model
{
    protected $fillable = [
      'name',
      'code',
      'menu_id',
      'method',
      'path',
    ];
}
