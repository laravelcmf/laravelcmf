<?php
/**
 * Created by PhpStorm.
 * User: JeffreyBool
 * Date: 2020/3/21
 * Time: 21:54
 */

namespace App\Http\Resources;

use League\Fractal\TransformerAbstract;
use Illuminate\Contracts\Support\Arrayable;

class Resource extends TransformerAbstract
{
    /**
     * default transformer.
     * @param Arrayable $model
     * @return array
     */
    public function transform(Arrayable $model)
    {
        return $model->toArray();
    }
}
