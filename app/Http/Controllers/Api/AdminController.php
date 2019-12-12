<?php

namespace App\Http\Controllers\Api;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Resources\AdminResource;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //管理员信息
    public function me()
    {
        dd(Auth::user()->checkPermission("",""));
//        return new AdminResource(auth()->user());
    }

    /**
     * admins paginate.
     * @param Request $request
     * @param Admin   $admin
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request, Admin $admin)
    {
        return AdminResource::collection($admin->paginate());
    }

    /**
     * 新增管理员
     * @param Request $request
     * @param Admin   $admin
     * @return AdminResource
     */
    public function store(Request $request, Admin $admin)
    {
        $this->validateRequest($request);
        $admin->fill($request->all());
        $admin->password = bcrypt($request->get('password'));
        $admin->save();

        return new AdminResource($admin);
    }

    /**
     * 查看
     * @param Admin $admin
     * @return AdminResource
     */
    public function show(Admin $admin)
    {
        return new AdminResource($admin);
    }

    /**
     * 更新
     * @param Request $request
     * @param Admin   $admin
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Admin $admin)
    {
        $this->validateRequest($request, 'update');

        $admin->fill($request->all());
        if(!empty($request->get('password'))) {
            $admin->password = bcrypt($request->get('password'));
        }
        $admin->save();
        return $this->noContent();
    }

    /**
     *  删除
     * @param Admin $admin
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();
        return $this->noContent();
    }

    /**
     *  删除
     * @param Request $request
     * @param Admin   $admin
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function AccessRoles(Request $request,Admin $admin)
    {
        $admin->roles()->sync($request->get('role_ids'));
        return $this->noContent();
    }
}
