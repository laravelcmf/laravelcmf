<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Menu
 *
 * @property int $id
 * @property int|null $parent_id 父级ID
 * @property string|null $parent_path 父级路径
 * @property string $name 菜单名称
 * @property string|null $icon 图标
 * @property string|null $path 访问路由
 * @property string|null $locale 语言包配置
 * @property int $sequence 排序值
 * @property int $hidden 隐藏菜单: 0:不隐藏, 1:隐藏
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
 */
class Menu extends Model
{
    //
}
