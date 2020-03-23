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
            $menusIds = $role->menus()->get()->pluck('id')->toArray();
            $pivot = \DB::table('role_menus')->where('role_id', $role->id)->whereIn('menu_id', $menusIds)->get();
            $menus = $role->menus()->with(['actions', 'resources'])->orderBy('sequence', 'ASC')->get();

            $menus->transform(function($menu) use ($pivot) {
                $_temp = $pivot->where('menu_id', $menu->id)->first();
                $menu->makeHidden('pivot');
                if($menu->actions->isNotEmpty()) {
                    $actionCodes = json_decode($_temp->action);
                    $actions = [];
                    foreach($menu->actions as $key => $action) {
                        if(in_array($action->code, $actionCodes)) {
                            $actions[] = $action;
                        }
                    }
                    unset($menu->actions);
                    $menu->actions = $actions;
                }
                if($menu->resources->isNotEmpty()) {
                    $resourcesCodes = json_decode($_temp->resource);
                    $resources = [];
                    foreach($menu->resources as $key => $resource) {
                        if(in_array($resource->code, $resourcesCodes)) {
                            $resources[] = $resource;
                        }
                    }
                    unset($menu->resources);
                    $menu->resources = $resources;
                }
                return $menu;
            });
        }

        return response()->json([
            'data' => make_tree($menus->toArray()),
        ]);
    }
}
