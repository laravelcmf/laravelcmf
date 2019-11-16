<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\MenuResource;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $menus = tap(Menu::query(), function($query) {
            $query->where(request_intersect(['name','hidden']));
        })->orderBy('sequence', 'desc')->paginate();
        return MenuResource::collection($menus);
    }

    public function userMenu()
    {
        //Todo
    }

    public function store(Request $request, Menu $menu)
    {
        $this->validateRequest($request);
        $menu->fill($request->all());
        $menu->save();
        return new MenuResource($menu);
    }

    public function show(Menu $menu)
    {
        return new MenuResource($menu);
    }

    public function update(Request $request, Menu $menu)
    {
        $this->validateRequest($request, 'store');
        $menu->fill($request->all());
        $menu->save();
        return $this->noContent();
    }

    /**
     * @param Menu $menu
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Menu $menu)
    {
        if(Menu::query()->where('parent_id', $menu->id)->count()) {
            $this->unprocesableEtity();
        }
        $menu->delete();
        return $this->noContent();
    }
}
