<?php
$CtrlTemplate = <<<EOF
<?php
namespace {$dummyNamepace};

use Illuminate\Http\Request;
use App\Models\{$modelName};
use App\Http\Resources\{$modelName}Resource;

class {$modelName}Controller extends Controller
{
    /**
     * Get {$modelName} Paginate.
     * @param {$modelName} {$letterModelName}
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index({$modelName} {$letterModelName})
    {
        {$modelNamePluralLowerCase} = ${letterModelName}->paginate();
        return {$modelName}Resource::collection({$modelNamePluralLowerCase});
    }


    /**
     * Create {$modelName}.
     * @param Request         $request
     * @param {$modelName} {$letterModelName}
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, {$modelName} {$letterModelName})
    {
        $this->validateRequest($request);
        {$letterModelName}->fill($request->all());
        {$letterModelName}->save();

        return $this->created({$letterModelName});
    }


    /**
     * All {$modelName}.
     * @param Request         $request
     * @param {$modelName} {$letterModelName}
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function all(Request $request, {$modelName} {$letterModelName})
    {
       {$modelNamePluralLowerCase} = {$letterModelName}->get();

       return {$modelName}Resource::collection({$modelNamePluralLowerCase});
    }



    /**
     * Show {$modelName}.
     * @param {$modelName} {$letterModelName}
     * @return {$modelName}Resource
     */
    public function show({$modelName} {$letterModelName})
    {
        return new {$modelName}Resource({$letterModelName});
    }


    /**
     * Update {$modelName}.
     * @param Request         $request
     * @param {$modelName} {$letterModelName}
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, {$modelName} {$letterModelName})
    {
        $this->validateRequest($request);
        {$letterModelName}->fill($request->all());
        {$letterModelName}->save();

        return $this->noContent();
    }


    /**
     * Delete {$modelName}.
     * @param {$modelName} {$letterModelName}
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy({$modelName} {$letterModelName})
    {
        {$letterModelName}->delete();
        return $this->noContent();
    }
}
EOF;

