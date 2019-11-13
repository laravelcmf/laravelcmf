<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\MenuResource;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $menus = Menu::query()->orderBy('sort', 'desc')->get();
        return response()->json(['data' => make_tree($menus->toArray())]);
    }

    public function userMenu()
    {
        $userPermissions = \Auth::user()->getAllPermissions()->pluck('name');
        $menus = Menu::query()
            ->orderBy('sort', 'desc')
            ->get()
            ->filter(function ($item) use ($userPermissions) {
                return !$item->permission_name || $userPermissions->contains($item->permission_name);
            });

        return response()->json(['data' => make_tree($menus->toArray())]);
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
