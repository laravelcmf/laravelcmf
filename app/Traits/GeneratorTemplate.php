<?php
/**
 * Created by PhpStorm.
 * User: JeffreyBool
 * Date: 2019/11/18
 * Time: 01:20
 */

namespace App\Traits;

trait GeneratorTemplate
{
    /**
     * 创建验证模板.
     * @param $dummyNamespace
     * @param $modelName
     * @param $storeRules
     * @param $updateRules
     * @param $storeMessages
     * @param $updateMessages
     * @return string
     */
    public function genValidationTemplate(
        $dummyNamespace,
        $modelName,
        $storeRules,
        $updateRules,
        $storeMessages,
        $updateMessages
    ) {
        $template = <<<EOF
<?php
namespace {$dummyNamespace};

class {$modelName}
{
    /**
     * @return array
     */
    public function store()
    {
        /**
         * 新增验证规则
         */
        return [
            'rules'=> $storeRules,

            'messgaes'=> $storeMessages
        ];
     }


    /**
     * 编辑验证规则
     */
    public function update()
    {
        return [
           'rules'=> $updateRules,

           'messgaes'=> $updateMessages
        ];
    }
}
EOF;
        return $template;
    }


    /**
     * 创建资源返回模板.
     * @param $dummyNamespace
     * @param $modelName
     * @return string
     */
    public function genResourceTemplate($dummyNamespace, $modelName)
    {
        $template = <<<EOF
<?php
namespace {$dummyNamespace};

use Illuminate\Http\Resources\Json\JsonResource;

class {$modelName}Resource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  \$request
     * @return array
     */
    public function toArray(\$request)
    {
        return parent::toArray(\$request);
    }
}
EOF;
        return $template;
    }

    /**
     * 创建控制器模板.
     * @param $dummyNamespace
     * @param $modelName
     * @param $letterModelName
     * @param $modelNamePluralLowerCase
     * @return string
     */
    public function genControllerTemplate($dummyNamespace, $modelName, $letterModelName, $modelNamePluralLowerCase)
    {
        $template = <<<EOF
<?php
namespace {$dummyNamespace};

use Illuminate\Http\Request;
use App\Models\\{$modelName};
use App\Http\Resources\\{$modelName}Resource;

class {$modelName}Controller extends Controller
{
    /**
     * Get {$modelName} Paginate.
     * @param {$modelName} \${$letterModelName}
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index({$modelName} \${$letterModelName})
    {
        \${$modelNamePluralLowerCase} = \${$letterModelName}->paginate();
        return {$modelName}Resource::collection(\${$modelNamePluralLowerCase});
    }


    /**
     * Create {$modelName}.
     * @param Request         \$request
     * @param {$modelName} \${$letterModelName}
     * @return \Illuminate\Http\Response
     */
    public function store(Request \$request, {$modelName} \${$letterModelName})
    {
        \$this->validateRequest(\$request);
        \${$letterModelName}->fill(\$request->all());
        \${$letterModelName}->save();

        return \$this->created(\${$letterModelName});
    }


    /**
     * All {$modelName}.
     * @param Request         \$request
     * @param {$modelName} \${$letterModelName}
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function all(Request \$request, {$modelName} \${$letterModelName})
    {
       \${$modelNamePluralLowerCase} = \${$letterModelName}->get();

       return {$modelName}Resource::collection(\${$modelNamePluralLowerCase});
    }



    /**
     * Show {$modelName}.
     * @param {$modelName} \${$letterModelName}
     * @return {$modelName}Resource
     */
    public function show({$modelName} \${$letterModelName})
    {
        return new {$modelName}Resource(\${$letterModelName});
    }


    /**
     * Update {$modelName}.
     * @param Request         \$request
     * @param {$modelName} \${$letterModelName}
     * @return \Illuminate\Http\Response
     */
    public function update(Request \$request, {$modelName} \${$letterModelName})
    {
        \$this->validateRequest(\$request);
        \${$letterModelName}->fill(\$request->all());
        \${$letterModelName}->save();

        return \$this->noContent();
    }


    /**
     * Delete {$modelName}.
     * @param {$modelName} \${$letterModelName}
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy({$modelName} \${$letterModelName})
    {
        \${$letterModelName}->delete();
        return \$this->noContent();
    }
}
EOF;
        return $template;
    }

    /**
     * 创建模型模板.
     * @param $dummyNamespace
     * @param $modelName
     * @param $fields
     * @return string
     */
    public function genModelTemplate($dummyNamespace, $modelName, $fields)
    {
        $template = <<<EOF
<?php
namespace {$dummyNamespace};

class {$modelName} extends Model
{
    protected \$fillable = {$fields};
}
EOF;
        return $template;
    }
}