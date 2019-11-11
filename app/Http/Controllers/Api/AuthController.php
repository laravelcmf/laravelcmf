<?php
/**
 * Created by PhpStorm.
 * User: JeffreyBool
 * Date: 2019/11/11
 * Time: 12:10
 */

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * get access_token
     * @param Request $request
     */
    public function login(Request $request)
    {
        $this->validateRequest($request);
    }


    public function refresh(Request $request)
    {

    }

    public function logout()
    {

    }
}