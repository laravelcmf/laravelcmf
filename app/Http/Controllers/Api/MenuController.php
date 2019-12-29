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
     * 分页
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $menus = tap(Menu::query(), function($query) {
            $query->where(request_intersect(['hidden', 'parent_id']));
        })->where('name', 'like', '%' . $request->get('name') . '%')->orderBy('sequence',
            'asc')->paginate($request->get('per_page'));
        return MenuApiResource::collection($menus);
    }

    /**
     * tree
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function tree()
    {
        $menus = tap(Menu::query(), function($query) {
            $query->where(request_intersect(['name', 'hidden']));
        })->where('parent_id', '=', null)->with('actions','resources','children')->orderBy('sequence', 'asc')->get();
        $this->treeTransform($menus);
        return MenuApiResource::collection($menus);
    }

    /**
     * @param $menus
     */
    private function treeTransform($menus): void
    {
        $menus->transform(function($menu) {
            $menu->actions;
            $menu->resources;
            if($menu->children) {
                $this->treeTransform($menu->children);
            }
            unset($menu->pivot);
            return $menu;
        });
    }

    /**
     *  新增
     * @param Request $request
     * @param Menu    $menu
     * @return MenuApiResource
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request, Menu $menu)
    {
        $this->validateRequest($request);
        $menu->fill($request->all());
        $menu->save();
        // 菜单动作
        if($actions = $request->get('actions')) {
            collect($actions)->unique('code')->map(function($item) use ($menu) {
                $menu->actions()->create($item);
            });
        }
        // 菜单资源
        if($resources = $request->get('resources')) {
            collect($actions)->unique('code')->map(function($item) use ($menu) {
                $menu->resources()->create($item);
            });
        }
        return new MenuApiResource($menu);
    }


    /**
     * 查看
     * @param Menu $menu
     * @return MenuApiResource
     */
    public function show(Menu $menu)
    {
        $menu = Menu::query()->where("id", $menu->id)->with('actions', 'resources')->first();
        return new MenuApiResource($menu);
    }


    /**
     * 更新
     * @param Request $request
     * @param Menu    $menu
     * @return MenuApiResource
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Menu $menu)
    {
        $this->validateRequest($request, 'store');

        $menu->fill($request->all());
        $menu->save();
        // 菜单动作
        if($actions = $request->get('actions')) {
            $actions = collect($actions)->unique('code');
            $allCodes = MenuAction::where('menu_id', $menu->id)->get()->pluck('code')->all();
            $requestCodes = $actions->pluck('code')->all();
            $diffCodes = collect($allCodes)->diff($requestCodes);
            if(count($diffCodes)) {
                MenuAction::whereIn('code', $diffCodes)->where('menu_id', $menu->id)->delete();
            }
            $actions->map(function($action) use ($menu) {
                if($menuAction = MenuAction::where('code', $action['code'])->where('menu_id', $menu->id)->first()) {
                    $menuAction->fill($action);
                    $menuAction->save();
                } else {
                    $menu->actions()->create($action);
                }
            });
        } else {
            $menu->actions()->where('menu_id', $menu->id)->delete();
        }
        // 菜单资源
        if($resources = $request->get('resources')) {
            $resources = collect($resources)->unique('code');
            $allCodes = MenuResource::where('menu_id', $menu->id)->get()->pluck('code')->all();
            $requestCodes = $resources->pluck('code')->all();
            $diffCodes = collect($allCodes)->diff($requestCodes);
            if(count($diffCodes)) {
                MenuResource::whereIn('code', $diffCodes)->where('menu_id', $menu->id)->delete();
            }
            $resources->map(function($resource) use ($menu) {
                if($menuResource = MenuResource::where('code', $resource['code'])->where('menu_id',
                    $menu->id)->first()) {
                    $menuResource->fill($resource);
                    $menuResource->save($resource);
                } else {
                    $menu->resources()->create($resource);
                }
            });
        } else {
            $menu->resources()->where('menu_id', $menu->id)->delete();
        }
        return new MenuApiResource($menu);
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
