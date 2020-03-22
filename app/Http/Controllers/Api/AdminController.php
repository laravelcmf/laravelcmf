<?php

namespace App\Http\Controllers\Api;

use App\Models\Menu;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Resources\AdminResource;
use App\Http\Resources\MenuApiResource;

class AdminController extends BaseController
{
    /**
     * admin info.
     * @return \Dingo\Api\Http\Response
     */
    public function me()
    {
        return $this->response->item(auth()->user(), AdminResource::class);
    }

    /**
     * admin paginate.
     * @param Request $request
     * @param Admin   $admin
     * @return \Dingo\Api\Http\Response
     */
    public function index(Request $request, Admin $admin)
    {
        $paginate = $admin->where('name', 'like', '%' . $request->get('name') . '%')->where(request_intersect([
            'email',
            'role_id'
        ]))->paginate($request->get('per_page'));

        return $this->response->paginator($paginate, AdminResource::class);
    }


    /**
     * admin store.
     * @param Request $request
     * @param Admin   $admin
     * @return \Dingo\Api\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request, Admin $admin)
    {
        $this->validateRequest($request);
        $admin->fill($request->all());
        $admin->last_login_ip = $request->getClientIp();
        $admin->password = bcrypt($request->get('password'));
        $admin->save();

        return $this->response->item($admin, AdminResource::class);
    }


    /**
     * admin show.
     * @param Admin $admin
     * @return \Dingo\Api\Http\Response
     */
    public function show(Admin $admin)
    {
        return $this->response->item($admin, AdminResource::class);
    }


    /**
     * admin update.
     * @param Request $request
     * @param Admin   $admin
     * @return \Dingo\Api\Http\Response
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

        return $this->response->noContent();
    }


    /**
     * admin enable.
     * @param Admin $admin
     * @return \Dingo\Api\Http\Response
     */
    public function enable(Admin $admin)
    {
        $admin->status = Admin::Normal;
        $admin->save();

        return $this->response->noContent();
    }


    /**
     * admin disable.
     * @param Admin $admin
     * @return \Dingo\Api\Http\Response
     */
    public function disable(Admin $admin)
    {
        $admin->status = Admin::Hidden;
        $admin->save();

        return $this->response->noContent();
    }


    /**
     * admin delete.
     * @param Admin $admin
     * @return \Dingo\Api\Http\Response
     */
    public function destroy(Admin $admin)
    {
        $admin->status = Admin::Deleted;
        $admin->save();

        return $this->response->noContent();
    }


    /**
     * admin getMenus.
     * @return \Dingo\Api\Http\Response
     */
    public function getMenus()
    {
        $role = $this->auth()->user()->role;
        if($role && config('permission.role_id') && in_array($role->id, config('permission.role_id'))) {
            $menus = Menu::where('parent_id', '=', null)->with('children', 'actions', 'resources')->orderBy('sequence',
                'asc')->get();
        } else {
            $menus = $role->menus()->with('children', 'actions', 'resources')->where('parent_id', '=',
                null)->orderBy('sequence', 'asc')->get();
        }

        return $this->response->collection($menus, MenuApiResource::class);
    }
}
