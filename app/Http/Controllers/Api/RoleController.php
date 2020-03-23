<?php

namespace App\Http\Controllers\Api;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Resources\RoleResource;
use Illuminate\Support\Arr;

class RoleController extends BaseController
{
    /**
     * role paginate.
     * @param Request $request
     * @return \Dingo\Api\Http\Response
     */
    public function index(Request $request)
    {
        $roles = Role::query()->where('name', 'like','%' . $request->get('name') . '%')->paginate($request->get('per_page'));

        return $this->response->paginator($roles, RoleResource::class);
    }


    /**
     * role list.
     * @param Request $request
     * @return \Dingo\Api\Http\Response
     */
    public function list(Request $request)
    {
        $roles = Role::query()->where('name', 'like', '%' . $request->get('name') . '%')->get();

        return $this->response->collection($roles, RoleResource::class);
    }


    /**
     * role store.
     * @param Request $request
     * @param Role    $role
     * @return \Dingo\Api\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request, Role $role)
    {
        $this->validateRequest($request, 'store');
        $role->fill($request->all());
        $role->save();

        if($menus = $request->get('menus', [])) {
            $_tempMenus = [];
            foreach($menus as $key => $menu) {
                $_tempMenus[$menu['menu_id']] = [
                    'action'   => json_encode(Arr::get($menu, 'actions', [])),
                    'resource' => json_encode(Arr::get($menu, 'resources', [])),
                ];
            }
            $role->menus()->sync($_tempMenus);
        }

        return $this->response->item($role, RoleResource::class);
    }


    /**
     * role show.
     * @param Role $role
     * @return \Dingo\Api\Http\Response
     */
    public function show(Role $role)
    {
        return $this->response->item($role, RoleResource::class);
    }

    /**
     * role update.
     * @param Request $request
     * @param Role    $role
     * @return \Dingo\Api\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Role $role)
    {
        $this->validateRequest($request, 'update');
        $role->fill($request->all());
        $role->save();

        if($menus = $request->get('menus', [])) {
            $_tempMenus = [];
            foreach($menus as $key => $menu) {
                $_tempMenus[$menu['menu_id']] = [
                    'action'   => json_encode(Arr::get($menu, 'actions', [])),
                    'resource' => json_encode(Arr::get($menu, 'resources', [])),
                ];
            }
            $role->menus()->sync($_tempMenus);
        }

        return $this->response->item($role, RoleResource::class);
    }


    /**
     * role delete.
     * @param Role $role
     * @return mixed
     * @throws \Exception
     */
    public function destroy(Role $role)
    {
        $role->menus()->detach();
        $role->delete();
        return $this->noContent();
    }
}
