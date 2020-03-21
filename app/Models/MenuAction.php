<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\MenuAction
 *
 * @property int $id
 * @property string $name 动作名称
 * @property string|null $code  动作编号
 * @property int|null $menu_id 菜单ID
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MenuAction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MenuAction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MenuAction query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MenuAction whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MenuAction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MenuAction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MenuAction whereMenuId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MenuAction whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MenuAction whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class MenuAction extends Model
{
    protected $fillable = [
        'name',
        'code',
        'menu_id'
    ];
}
