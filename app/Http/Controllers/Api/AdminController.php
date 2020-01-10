<?php

namespace App\Http\Controllers\Api;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Queries\AdminQuery;
use App\Http\Resources\AdminResource;

class AdminController extends Controller
{
    //管理员信息
    public function me()
    {
        return new AdminResource(auth()->user());
    }

    /**
     * admins paginate.
     * @param Request    $request
     * @param AdminQuery $query
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request, AdminQuery $query)
    {
        $list = $query->where('name', 'like', '%' . $request->get('name') . '%')->where(request_intersect([
            'email',
            'role_id'
        ]))->paginate($request->get('per_page'));
        return AdminResource::collection($list);
    }

    /**
     * 新增管理员
     * @param Request $request
     * @param Admin   $admin
     * @return AdminResource
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request, Admin $admin)
    {
        $this->validateRequest($request);
        $admin->fill($request->all());
        $admin->last_login_ip = $request->getClientIp();
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
     * 启用
     * @param Admin $admin
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function enable(Admin $admin)
    {
        $admin->update(['status' => 1]);
        return $this->noContent();
    }

    /**
     * 禁用
     * @param Admin $admin
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function disable(Admin $admin)
    {
        $admin->update(['status' => 2]);
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
        $admin->update(['status' => 3]);
        return $this->noContent();
    }

    //获取我的菜单列表
    public function getMenus()
    {
        $menus = \Auth::user()->getMenus();
        return response()->json($menus);
    }
}
