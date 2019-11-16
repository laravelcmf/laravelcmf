<?php

namespace App\Models;

class Role extends Model
{
    protected $fillable = [
        'name',
        'sequence',
        'memo'
    ];

    /**
     * 角色用户多对多关联
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function admins()
    {
        return $this->belongsToMany(Admin::class)->withTimestamps();
    }

    /**
     * 角色菜单多对多关联
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function menus()
    {
        return $this->belongsToMany(Menu::class)->withTimestamps();
    }
}
