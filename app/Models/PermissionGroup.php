<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PermissionGroup
 *
 * @property int $id
 * @property string $name 权限组
 * @property int $sort 排序
 * @property int $status 状态，1正常 2禁止 3删除
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Permission[] $permission
 * @property-read int|null $permission_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PermissionGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PermissionGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PermissionGroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PermissionGroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PermissionGroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PermissionGroup whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PermissionGroup whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PermissionGroup whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PermissionGroup whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PermissionGroup extends Model
{
    protected $guarded = ['id'];

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'sort',
        'status',
    ];

    public function permission()
    {
        return $this->hasMany(Permission::class, 'permission_group_id');
    }
}
