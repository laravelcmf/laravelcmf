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

    /**
     * 定义菜单 => 动作一对多关联
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function actions()
    {
        return $this->hasMany(MenuAction::class, 'menu_id', 'id');
    }

    /**
     * 定义菜单 => 资源一对多关联关系
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function resources()
    {
        return $this->hasMany(MenuResource::class, 'menu_id', 'id');
    }

    /**
     * 菜单角色多对多关联
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }
}
