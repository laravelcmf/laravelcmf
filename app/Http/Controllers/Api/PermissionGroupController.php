<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\PermissionGroup;
use App\Http\Resources\PermissionGroupResource;

class PermissionGroupController extends Controller
{

    /**
     * paginate.
     * @param Request         $request
     * @param PermissionGroup $permissionGroup
     * @return PermissionGroupResource
     */
    public function index(Request $request, PermissionGroup $permissionGroup)
    {
        $permissionGroups = $permissionGroup->where('name',$request->get('name'))->paginate();
        return new PermissionGroupResource($permissionGroups);
    }

    /**
     * @param Request         $request
     * @param PermissionGroup $permissionGroup
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function all(Request $request,PermissionGroup $permissionGroup)
    {
        $permissionGroups = $permissionGroup->get();
        return PermissionGroupResource::collection($permissionGroups);
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
