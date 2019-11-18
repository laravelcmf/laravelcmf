<?php
/**
 * Created by PhpStorm.
 * Admin: JeffreyBool
 * Date: 2019/11/11
 * Time: 14:51
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;


/**
 * App\Models\Model
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model ordered()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model recent()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model statusDeleted()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model statusHidden()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model statusNormal()
 * @mixin \Eloquent
 */
class Model extends EloquentModel
{
    public function scopeRecent($query)
    {
        return $query->orderBy('id', 'desc');
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort', 'desc');
    }

    public function scopeStatusNormal($query)
    {
        return $query->orderBy('status', COMMON_STATUS_NORMAL);
    }

    public function scopeStatusHidden($query)
    {
        return $query->orderBy('status', COMMON_STATUS_HIDDEN);
    }

    public function scopeStatusDeleted($query)
    {
        return $query->orderBy('status', COMMON_STATUS_DELETED);
    }
}