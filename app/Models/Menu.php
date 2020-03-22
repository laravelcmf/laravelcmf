<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Menu
 *
 * @property int                             $id
 * @property int|null                        $parent_id   父级ID
 * @property string|null                     $parent_path 父级路径
 * @property string                          $name        菜单名称
 * @property string|null                     $icon        图标
 * @property string|null                     $path        访问路由
 * @property string|null                     $locale      语言包配置
 * @property int                             $sequence    排序值
 * @property int                             $hidden      隐藏菜单: 0:不隐藏, 1:隐藏
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereHidden($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereParentPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereSequence($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\MenuAction[] $actions
 * @property-read int|null $actions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Menu[] $children
 * @property-read int|null $children_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\MenuResource[] $resources
 * @property-read int|null $resources_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Role[] $roles
 * @property-read int|null $roles_count
 */
class Menu extends Model
{
    protected $fillable = [
        'name',
        'parent_id',
        'parent_path',
        'icon',
        'path',
        'locale',
        'hidden',
        'sequence',
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

    /*
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {
        return $this->hasMany(get_class($this), 'parent_id');
    }
}
