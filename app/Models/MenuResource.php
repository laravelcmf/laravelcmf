<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\MenuResource
 *
 * @property int $id
 * @property string $name 资源名称
 * @property string|null $code 资源编码
 * @property string|null $method 资源请求方式
 * @property string|null $path 资源请求路径
 * @property int $menu_id 菜单ID
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MenuResource newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MenuResource newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MenuResource query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MenuResource whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MenuResource whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MenuResource whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MenuResource whereMenuId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MenuResource whereMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MenuResource whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MenuResource wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MenuResource whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class MenuResource extends Model
{
    //
}
