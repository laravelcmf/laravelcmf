<?php

namespace App\Models;

/**
 * App\Models\Menu
 *
 * @property int $id
 * @property int|null $parent_id 父级ID
 * @property string|null $parent_path 父级路径
 * @property string $name 菜单名称
 * @property int $sequence 排序值
 * @property string|null $icon 图标
 * @property string|null $router 访问路由
 * @property int $hidden 隐藏菜单: 0:不隐藏, 1:隐藏
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\MenuAction[] $actions
 * @property-read int|null $actions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\MenuResource[] $resources
 * @property-read int|null $resources_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model ordered()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model recent()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model statusDeleted()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model statusHidden()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model statusNormal()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereHidden($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereParentPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereRouter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereSequence($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
