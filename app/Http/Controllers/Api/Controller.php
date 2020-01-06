<?php
/**
 * Created by PhpStorm.
 * AdminQuery: JeffreyBool
 * Date: 2019/11/11
 * Time: 12:12
 */

namespace App\Http\Controllers\Api;

use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Response\Factory;
use App\Http\Controllers\Controller as BaseController;

class Controller extends BaseController
{
    use Factory;

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
     * 获取验证规则检验
     * @param Request     $request
     * @param string|null $name
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateRequest(Request $request, string $name = null)
    {
        if(!$validator = $this->getValidator($request, $name)) {
            return;
        }
        $rules = Arr::get($validator,'rules',[]);
        $messages= Arr::get($validator,'messages',[]);
        $this->validate($request, $rules, $messages);
    }

    /**
     * 获取规则文件
     * @param Request     $request
     * @param string|null $name
     * @return bool|mixed
     */
    private function getValidator(Request $request, string $name = null)
    {
        list($controller, $method) = explode('@', $request->route()->getActionName());
        $method = $name ?: $method;
        $className = substr(strrchr($controller, '\\'), 1);
        $class = "App\\Http\\Validations\\Api\\" . str_replace('Controller', '', $className);
        if(!class_exists($class) || !method_exists($class, $method)) {
            return false;
        }
        return call_user_func([new $class, $method]);
    }

    /**
     * with page default 1
     * @return mixed
     */
    public function WithPage()
    {
        return app(Request::class)->get('page', 1);
    }
}