<?php

namespace App\Http\Controllers\Api;

use App\Models\Menu;
use App\Models\MenuAction;
use App\Models\MenuResource;
use Illuminate\Http\Request;
use App\Http\Resources\MenuResource as MenuApiResource;

class MenuController extends Controller
{
    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $menus = tap(Menu::query(), function($query) {
            $query->where(request_intersect(['name', 'hidden']));
        })->orderBy('sequence', 'desc')->paginate();
        return MenuApiResource::collection($menus);
    }

    public function userMenu()
    {
        //Todo
    }

    /**
     * 新增
     * @param Request $request
     * @param Menu    $menu
     * @return MenuApiResource
     */
    public function store(Request $request, Menu $menu)
    {
        $this->validateRequest($request);
        $menu->fill($request->all());
        $menu->save();
        if($actions = $request->get('actions')) {
            collect($actions)->map(function($item) use ($menu) {
                if($menu->actions()->where('code', $item['code'])->count() == 0) {
                    $menu->actions()->create($item);
                }
            });
        }
        if($resources = $request->get('resources')) {
            collect($resources)->map(function($item) use ($menu) {
                if($menu->resources()->where('code', $item['code'])->count() == 0) {
                    $menu->resources()->create($item);
                }
            });
        }
        return new MenuApiResource($menu);
    }

    public function show(Menu $menu)
    {
        return new MenuApiResource($menu);
    }


    /**
     * 更新
     * @param Request $request
     * @param Menu    $menu
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Exception
     */
    public function update(Request $request, Menu $menu)
    {
        $this->validateRequest($request, 'store');
        $this->validateRequest($request);
        $menu->fill($request->all());
        $menu->save();
        if($actions = $request->get('actions')) {
            $actionsCodes = MenuAction::where('menu_id', $menu->id)->get()->pluck('code')->all();
            $requestCodes = collect($actions)->pluck('code')->all();
            $codes = collect($actionsCodes)->diff($requestCodes);
            if(count($codes)) {
                MenuAction::whereIn('code', $codes)->delete();
            }
            collect($actions)->map(function($item) use ($menu) {
                if($menuAction = MenuAction::where('code', $item['code'])->first()) {
                    $menuAction->fill($item);
                    $menuAction->save();
                } else {
                    $menu->actions()->create($item);
                }
            });
        } else {
            $menu->actions()->where('menu_id', $menu->id)->delete();
        }
        if($resources = $request->get('resources')) {
            $resourcesCodes = MenuResource::where('menu_id', $menu->id)->get()->pluck('code')->all();
            $requestCodes = collect($resources)->pluck('code')->all();
            $codes = collect($resourcesCodes)->diff($requestCodes);
            if(count($codes)) {
                MenuResource::whereIn('id', $codes)->delete();
            }
            collect($resources)->map(function($item) use ($menu) {
                if($menuResource = MenuResource::where('code', $item['code'])->first()) {
                    $menuResource->fill($item);
                    $menuResource->save($item);
                } else {
                    $menu->resources()->create($item);
                }
            });
        } else {
            $menu->resources()->where('menu_id', $menu->id)->delete();
        }
        return $this->noContent();
    }

    /**
     * 删除
     * @param Menu $menu
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Menu $menu)
    {
        $menu->actions()->delete();
        $menu->resources()->delete();
        $menu->delete();
        return $this->noContent();
    }
}
