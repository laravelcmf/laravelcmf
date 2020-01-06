<?php

namespace App\Http\Controllers\Api;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Services\RoleService;
use App\Http\Resources\RoleResource;

class RoleController extends Controller
{
    /**
     * 分页
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $roles = Role::query()->where('name', 'like',
            '%' . $request->get('name') . '%')->paginate($request->get('per_page'));
        return RoleResource::collection($roles);
    }

    public function list(Request $request)
    {
        $roles = Role::query()->where('name', 'like', '%' . $request->get('name') . '%')->get();
        return RoleResource::collection($roles);
    }

    /**
     * 新增
     * @param Request $request
     * @param Role    $role
     * @return RoleResource
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request, Role $role)
    {
        $this->validateRequest($request, 'store');
        $role->fill($request->all());
        $role->save();
        app(RoleService::class)->syncPermissions($role, $request->get('menus', []));
        return new RoleResource($role);
    }

    /**
     * 查看
     * @param Role $role
     * @return RoleResource
     */
    public function show(Role $role)
    {
        return new RoleResource($role);
    }

    /**
     * 更新
     * @param Request $request
     * @param Role    $role
     * @return RoleResource
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Role $role)
    {
        $this->validateRequest($request, 'update');
        $role->fill($request->all());
        $role->save();

        app(RoleService::class)->syncPermissions($role, $request->get('menus', []));
        return new RoleResource($role);
    }

    /**
     * 删除
     * @param Role $role
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Role $role)
    {
        $role->menus()->detach();
        $role->delete();
        return $this->noContent();
    }
}
