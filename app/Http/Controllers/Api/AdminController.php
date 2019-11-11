<?php
/**
 * Created by PhpStorm.
 * User: JeffreyBool
 * Date: 2019/11/11
 * Time: 20:01
 */

namespace App\Http\Controllers\Api;

use App\Http\Resources\AdminResource;

class AdminController extends Controller
{
    //管理员信息
    public function me()
    {
        return new AdminResource(auth()->user());
    }
}