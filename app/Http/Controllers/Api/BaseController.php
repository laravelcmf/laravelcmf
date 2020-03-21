<?php
/**
 * Created by PhpStorm.
 * User: JeffreyBool
 * Date: 2020/3/21
 * Time: 13:06
 */

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    use Helpers;

    protected $reservedWords = ['page', 'per_page', 'filters'];

    /**
     * @param array $params
     * @return array
     */
    protected function ignoreReserved(array $params)
    {
        foreach($this->reservedWords as $reservedKey) {
            if(array_key_exists($reservedKey, $params)) {
                unset($params[$reservedKey]);
            }
        }
        return $params;
    }


    /**
     * @param Request     $request
     * @param string|null $name
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateRequest(Request $request, string $name = null)
    {
        if(!$validator = $this->getValidator($request, $name)) {
            return;
        }
        $rules = array_get($validator, 'rules', []);
        $messages = array_get($validator, 'messages', []);
        $this->validate($request, $rules, $messages);
    }


    /**
     * @param Request     $request
     * @param string|null $name
     * @return bool|mixed
     */
    private function getValidator(Request $request, string $name = null)
    {
        [$controller, $method] = explode('@', $request->route()->action['uses']);
        $method = $name ?: $method;
        $class = str_replace('Controller', 'Validation', $controller);
        if(!class_exists($class) || !method_exists($class, $method)) {
            return false;
        }
        return call_user_func([new $class, $method]);
    }
}
