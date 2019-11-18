<?php

namespace App\Http\Controllers\Api;

use App\Models\Permission;
use Illuminate\Http\Request;
use App\Models\PermissionGroup;
use App\Http\Resources\PermissionGroupResource;

class PermissionGroupController extends Controller
{

    /**
     * get PermissionGroup paginate
     * @param Request         $request
     * @param PermissionGroup $permissionGroup
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request, PermissionGroup $permissionGroup)
    {
        $permissionGroups = tap($permissionGroup::query(), function($query) {
            $query->where(request_intersect(['name']));
        })->paginate();
        return PermissionGroupResource::collection($permissionGroups);
    }

    /**
     * @param Request         $request
     * @param PermissionGroup $permissionGroup
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function all(Request $request, PermissionGroup $permissionGroup)
    {
        $permissionGroups = tap($permissionGroup::query(),function ($query) {
            $query->where(request_intersect(['name']));
        })->get();
        return PermissionGroupResource::collection($permissionGroups);
    }


    /**
     * @param Request         $request
     * @param PermissionGroup $permissionGroup
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, PermissionGroup $permissionGroup)
    {
        $this->validateRequest($request);
        $permissionGroup->fill($request->all());
        $permissionGroup->save();
        return $this->created($permissionGroup);
    }

    /**
     * @param PermissionGroup $permissionGroup
     * @return PermissionGroupResource
     */
    public function show(PermissionGroup $permissionGroup)
    {
        return new PermissionGroupResource($permissionGroup);
    }


    /**
     * @param Request         $request
     * @param PermissionGroup $permissionGroup
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function update(Request $request, PermissionGroup $permissionGroup)
    {
        $this->validateRequest($request, 'store');
        $permissionGroup->fill($request->all());
        $permissionGroup->save();
        return $this->noContent();
    }

    /**
     * @param PermissionGroup $permissionGroup
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(PermissionGroup $permissionGroup)
    {
        if (Permission::query()->where('permission_group_id', $permissionGroup->id)->count()) {
            $this->unprocesableEtity();
        }
        $permissionGroup->delete();
        return $this->noContent();
    }
}
