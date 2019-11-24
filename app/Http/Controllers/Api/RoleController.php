<?php

namespace App\Http\Controllers\Api;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Resources\RoleResource;
use Illuminate\Support\Arr;

class RoleController extends Controller
{
    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $roles = Role::query()->where(request_intersect(['name']))->paginate();
        return RoleResource::collection($roles);
    }


    /**
     * @param Request $request
     * @param Role    $role
     * @return RoleResource
     */
    public function store(Request $request, Role $role)
    {
        $this->validateRequest($request, 'store');
        $role->fill($request->all());
        $role->save();
        return new RoleResource($role);
    }


    /**
     * @param Role $role
     * @return RoleResource
     */
    public function show(Role $role)
    {
        return new RoleResource($role);
    }


    /**
     * @param Request $request
     * @param Role    $role
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $this->validateRequest($request, 'update');
        $role->fill($request->all());
        $role->save();
        return $this->noContent();
    }

    /**
     * @param Role $role
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return $this->noContent();
    }

    /**
     * @param Request $request
     * @param Role    $role
     */
    public function assignMenus(Request $request, Role $role)
    {
        if($menus = $request->get('menus')) {
            $collection = collect($menus);
            $collection->transform(function($item, $key) {
                //FIXME:这里 actions resources 内容可以查询合法性，后续完善。。。
                $actions = Arr::get($item,'actions',[]);
                $resources = Arr::get($item,'resources',[]);
                $actions = json_encode($actions);
                $resources = json_encode($resources);
                $item['action'] = $actions;
                $item['resource'] = $resources;
                unset($item['actions']);
                unset($item['resources']);
                return $item;
            });
            $role->menus()->sync($collection->all());
        }
    }
}
