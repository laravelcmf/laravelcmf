<?php
/**
 * Created by PhpStorm.
 * User: JeffreyBool
 * Date: 2019/11/11
 * Time: 12:12
 */

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as BaseController;

class Controller extends BaseController
{
    protected $reservedWords = ['page', 'per_page', 'filters'];

    protected function ignoreReserved(array $params)
    {
        foreach($this->reservedWords as $reservedKey) {
            if(array_key_exists($reservedKey, $params)) {
                unset($params[$reservedKey]);
            }
        }
        return $params;
    }

    protected function validateRequest(Request $request, string $name = null)
    {
        if(!$validator = $this->getValidator($request, $name)) {
            return;
        }
        $rules = array_get($validator, 'rules', []);
        $messages = array_get($validator, 'messages', []);
        $this->validate($request, $rules, $messages);
    }

    private function getValidator(Request $request, string $name = null)
    {
        list($controller, $method) = explode('@', $request->route()->action['uses']);
        $method = $name ?: $method;
        $class = str_replace('Controller', 'Validation', $controller);
        if(!class_exists($class) || !method_exists($class, $method)) {
            return false;
        }
        return call_user_func([new $class, $method]);
    }
}