<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Resources\RoleResource;

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
     * @param $guardName
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function guardNameRoles($guardName)
    {
        $roles = Role::query()->where('guard_name', $guardName)->get();
        return RoleResource::collection($roles);
    }

    /**
     * @param Request $request
     * @param Role    $role
     * @return RoleResource
     */
    public function store(Request $request, Role $role)
    {
        $this->validateRequest($request);
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
        $this->validateRequest($request, 'store');
        $role->fill($request->all());
        $role->save();
        return $this->noContent();
    }

    /**
     * @param Role $role
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function permissions(Role $role)
    {
        return RoleResource::collection($role->with('permissions'));
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
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function assignPermissions(Request $request, Role $role)
    {
        $role->syncPermissions($request->get('permissions', []));
        return $this->noContent();
    }
}
