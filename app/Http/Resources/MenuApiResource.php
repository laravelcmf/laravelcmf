<?php
/**
 * Created by PhpStorm.
 * User: JeffreyBool
 * Date: 2020/3/22
 * Time: 02:18
 */

namespace App\Http\Resources;

use App\Models\Menu;
use League\Fractal\TransformerAbstract;

class MenuApiResource extends TransformerAbstract
{
    protected $availableIncludes = ['children', 'actions', 'resources'];

    public function transform(Menu $menu)
    {
        return [
            'id'          => $menu->id,
            'name'        => $menu->name,
            'parent_id'   => $menu->parent_id,
            'parent_path' => $menu->parent_path,
            'icon'        => $menu->icon,
            'path'        => $menu->path,
            'locale'      => $menu->locale,
            'hidden'      => $menu->hidden,
            'sequence'    => $menu->sequence,
            "created_at"  => $menu->created_at->diffForHumans(),
            "updated_at"  => $menu->updated_at->diffForHumans(),
        ];
    }


    /**
     * @param Menu $menu
     * @return \League\Fractal\Resource\Collection
     */
    public function includeChildren(Menu $menu)
    {
        if($menu->children->isNotEmpty()) {
            return $this->collection($menu->children, new MenuApiResource);
        }
    }


    /**
     * @param Menu $menu
     * @return \League\Fractal\Resource\Collection
     */
    public function includeActions(Menu $menu)
    {
        if($menu->actions->isNotEmpty()) {
            return $this->collection($menu->actions, new MenuActionResource);
        }
    }


    /**
     * @param Menu $menu
     * @return \League\Fractal\Resource\Collection
     */
    public function includeResources(Menu $menu)
    {
        if($menu->resources->isNotEmpty()) {
            return $this->collection($menu->resources, new MenuResourceResource);
        }
    }
}
