<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\RoleMenu
 *
 * @property int $id
 * @property mixed|null $action 动作编号
 * @property mixed|null $resource 资源编号
 * @property int $role_id 角色ID
 * @property int $menu_id 菜单ID
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RoleMenu newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RoleMenu newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RoleMenu query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RoleMenu whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RoleMenu whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RoleMenu whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RoleMenu whereMenuId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RoleMenu whereResource($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RoleMenu whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RoleMenu whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class RoleMenu extends Model
{
    //
}
