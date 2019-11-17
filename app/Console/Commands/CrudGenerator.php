<?php

namespace App\Console\Commands;

use App\Traits\MysqlStructure;
use Illuminate\Console\Command;

class CrudGenerator extends Command
{
    use MysqlStructure;

    private $db;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api:generator
    {name : Class (singular) for example User}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Api operations';

    public function __construct()
    {
        parent::__construct();
        $this->db = env('DB_DATABASE');
    }

    protected function getStub($type)
    {
        return file_get_contents(resource_path("stubs/$type.stub"));
    }

    protected function validation($name)
    {
        $requestTemplate = str_replace(
            ['{{modelName}}'],
            [$name],
            $this->getStub('validation')
        );

        file_put_contents(app_path("/Http/Validations/Api/{$name}Request.php"), $requestTemplate);
    }

    /**
     * 创建控制器
     * @param $name
     */
    protected function controller($name)
    {
        $controllerTemplate = str_replace(
            [
                '{{modelName}}',
                '{{modelNamePluralLowerCase}}',
                '{{modelNameSingularLowerCase}}'
            ],
            [
                $name,
                strtolower($name),
                strtolower($name)
            ],
            $this->getStub('controller')
        );

        file_put_contents(app_path("/Http/Controllers/Api/{$name}Controller.php"), $controllerTemplate);
    }

    /**
     * 创建模型
     * @param $name
     */
    protected function model($name)
    {
        $modelTemplate = str_replace(
            ['{{modelName}}'],
            [$name],
            $this->getStub('model')
        );

        file_put_contents(app_path("/Models/{$name}.php"), $modelTemplate);
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->exportAllTables();

        $name = $this->argument('name');
        $this->controller($name);
        $this->model($name);
        $this->validation($name);

        \File::append(base_path('routes/api.php'), 'Route::resource(\'' . strtolower($name) . "', '{$name}Controller');");
    }

}
