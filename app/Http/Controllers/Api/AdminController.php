<?php

namespace App\Http\Controllers\Api;

use App\Models\Admin;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\AdminResource;

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
            'role_id',
            'status',
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

        return $this->response->item($admin, AdminResource::class);
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function getMenus()
    {
        $admin = Auth::user();
        $role = $admin->role;
        if($role && is_root($role->id)) {
            $menus = Menu::with('actions', 'resources')->orderBy('sequence', 'ASC')->get();
        } else {
            $menus = $role->menus()->with('actions', 'resources')->orderBy('sequence',
                'ASC')->get()->makeHidden('pivot');
        }

        return response()->json([
            'data' => make_tree($menus->toArray()),
        ]);
    }
}
