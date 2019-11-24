<?php

namespace App\Models;

/**
 * App\Models\Role
 *
 * @property int $id
 * @property string $name 角色名称
 * @property int $sequence 排序值
 * @property string|null $memo 备注
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Admin[] $admins
 * @property-read int|null $admins_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Menu[] $menus
 * @property-read int|null $menus_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model ordered()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model recent()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model statusDeleted()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model statusHidden()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model statusNormal()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Role whereMemo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Role whereSequence($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Role whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
        return $this->belongsToMany(Menu::class,'role_menus')->withTimestamps();
    }
}
