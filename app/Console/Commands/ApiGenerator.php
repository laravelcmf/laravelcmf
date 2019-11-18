<?php

namespace App\Console\Commands;

use Illuminate\Support\Str;
use App\Traits\MysqlStructure;
use Illuminate\Console\Command;
use App\Traits\GeneratorTemplate;
use Symfony\Component\Console\Exception\RuntimeException;

class ApiGenerator extends Command
{
    use MysqlStructure, GeneratorTemplate;

    private $db;

    /**
     * The name and signature of the console command.
     * @var string
     */
    protected $signature = 'api:generator
    {name : Class (singular) for example User}';

    /**
     * The console command description.
     * @var string
     */
    protected $description = 'Create Api operations';

    public function __construct()
    {
        parent::__construct();
        $this->db = env('DB_DATABASE');
    }

    /**
     * Get the root namespace for the class.
     * @return string
     */
    protected function rootNamespace()
    {
        return $this->laravel->getNamespace();
    }

    /**
     * Get the default namespace for the class.
     * @param $name
     * @return string
     */
    protected function getDefaultNamespace($name)
    {
        $namespace = trim($this->rootNamespace(), '\\') . '\\' . $name;
        return $namespace;
    }

    /**
     * 获取规则文件
     * @param $type
     * @return bool|string
     */
    protected function getStub($type)
    {
        return file_get_contents(resource_path("stubs/$type.stub"));
    }


    /**
     * 创建规则文件
     * @param $name
     */
    protected function validation($name)
    {
        $namespace = $this->getDefaultNamespace('Http\Validations\Api');
        $table = Str::snake(Str::pluralStudly(class_basename($this->argument('name'))));
        $columns = $this->tableFieldsReplaceModelFields($table);
        $rules = "[\n";
        $messgaes = '[]';
        foreach($columns as $column) {
            if(in_array($column->COLUMN_NAME, ['id', 'created_at', 'updated_at', 'status'])) {
                continue;
            }
            $rule = '';
            if($column->IS_NULLABLE == "YES") {
                $rule .= 'required';
            } else {
                $rule .= 'nullable';
            }
            if($column->CHARACTER_MAXIMUM_LENGTH) {
                $rule .= '|max:' . $column->CHARACTER_MAXIMUM_LENGTH;
            }
            $rules .= sprintf("                '%s' => '%s',\n", $column->COLUMN_NAME, $rule);
        }
        $rules .= "            ]";
        $templateContent = $this->genValidationTemplate($namespace, $name, $rules, $rules, $messgaes, $messgaes);
        $class = $namespace . '\\' . $name;
        if(class_exists($class)) {
            throw new RuntimeException(sprintf('class %s exist', $class));
        }
        file_put_contents(app_path("/Http/Validations/Api/{$name}.php"), $templateContent);
        $this->info($name . ' created validation successfully.');
    }

    /**
     * 创建资源文件
     * @param $name
     */
    protected function resource($name)
    {
        $namespace = $this->getDefaultNamespace('Http\Resources');
        $resourceTemplate = $this->genResourceTemplate($namespace, $name);
        $class = $namespace . '\\' . $name;
        if(class_exists($class)) {
            throw new RuntimeException(sprintf('class %s exist', $class));
        }
        file_put_contents(app_path("/Http/Resources/{$name}Resource.php"), $resourceTemplate);
        $this->info($name . ' created resource successfully.');
    }

    /**
     * 创建控制器
     * @param $name
     */
    protected function controller($name)
    {
        $namespace = $this->getDefaultNamespace('Http\Controllers\Api');
        $controllerTemplate = $this->genControllerTemplate($namespace, $name, Str::camel($name),
            Str::pluralStudly(Str::camel($name)));
        $class = $namespace . '\\' . $name;
        if(class_exists($class)) {
            throw new RuntimeException(sprintf('class %s exist', $class));
        }
        file_put_contents(app_path("/Http/Controllers/Api/{$name}Controller.php"), $controllerTemplate);
        $this->info($name . ' created controller successfully.');
    }

    /**
     * 创建模型
     * @param $name
     */
    protected function model($name)
    {
        $namespace = $this->getDefaultNamespace('Models');
        $table = Str::snake(Str::pluralStudly(class_basename($this->argument('name'))));
        $columns = $this->getTableFields($table);
        $fields = "[";
        for($i = 0; $i < count($columns); $i++) {
            $column = $columns[$i];
            if(in_array($column, ["'id'", "'created_at'", "'updated_at'", "'status'"])) {
                continue;
            }
            $fields .= sprintf("%s,", $column);
        }
        $fields .= "]";
        $fields = str_replace(",]", "]", $fields);
        $modelTemplate = $this->genModelTemplate($namespace, $name, $fields);
        $class = $namespace . '\\' . $name;
        if(class_exists($class)) {
            throw new RuntimeException(sprintf('class %s exist', $class));
        }
        file_put_contents(app_path("/Models/{$name}.php"), $modelTemplate);
        $this->info($name . ' created model successfully.');
    }

    /**
     * Execute the console command.
     * @return mixed
     */
    public function handle()
    {
        $name = Str::ucfirst($this->argument('name'));
        $this->validation($name);
        $this->resource($name);
        $this->controller($name);
        $this->model($name);
    }
}
