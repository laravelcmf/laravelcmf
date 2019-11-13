<?php

namespace App\Http\Controllers\Api;

use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Resources\PermissionResource;

class PermissionController extends Controller
{
    /**
     * @param Request    $request
     * @param Permission $permission
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request, Permission $permission)
    {
        $permissions = $permission->where(request_intersect(['name', 'guard_name', 'permission_group_id']))->paginate();
        return PermissionResource::collection($permissions);
    }

    /**
     * @param Request    $request
     * @param Permission $permission
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function all(Request $request, Permission $permission)
    {
        $permissions = $permission->where(request_intersect(['name', 'guard_name', 'permission_group_id']))->get();
        return PermissionResource::collection($permissions);
    }

    /**
     * @param Request    $request
     * @param Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Permission $permission)
    {
        $this->validateRequest($request);
        $permission->fill($request->all());
        $permission->save();
        return $this->created($permission);
    }

    /**
     * @param Permission $permission
     * @return PermissionResource
     */
    public function show(Permission $permission)
    {
        return new PermissionResource($permission);
    }

    /**
     * @param Request    $request
     * @param Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        $this->validateRequest($request);
        $permission->fill($request->all());
        $permission->save();
        return $this->created($permission);
    }

    /**
     * @param Permission $permission
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        return $this->noContent();
    }
}
