<?php
namespace App\Traits;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Exception\RuntimeException;

trait MysqlStructure
{

    private $db;

    private $database;

    private $doctrineTypeMapping = [
        'tinyint'    => 'boolean',
        'smallint'   => 'smallint',
        'mediumint'  => 'integer',
        'int'        => 'integer',
        'integer'    => 'integer',
        'bigint'     => 'bigint',
        'tinytext'   => 'text',
        'mediumtext' => 'text',
        'longtext'   => 'text',
        'text'       => 'text',
        'varchar'    => 'string',
        'string'     => 'string',
        'char'       => 'string',
        'date'       => 'date',
        'datetime'   => 'datetime',
        'timestamp'  => 'datetime',
        'time'       => 'time',
        'float'      => 'float',
        'double'     => 'float',
        'real'       => 'float',
        'decimal'    => 'decimal',
        'numeric'    => 'decimal',
        'year'       => 'date',
        'longblob'   => 'blob',
        'blob'       => 'blob',
        'mediumblob' => 'blob',
        'tinyblob'   => 'blob',
        'binary'     => 'binary',
        'varbinary'  => 'binary',
        'set'        => 'simple_array',
        'json'       => 'json',
    ];

//    protected function exportAllTables()
//    {
//        $tables = $this->getAllTables();
//        $rows = [];
//        foreach($tables as $key => $table) {
//            $tableComment = $this->getTableComment($table);
//            $columns = $this->getTableColumns($table);
//            dump($this->tableFieldsReplaceModelFields($table));
//            $tableTitle = $table;
//            if($tableComment) {
//                $tableTitle .= "($tableComment)";
//            }
//            echo $tableTitle, "\n";
//            $rows[$tableTitle] = $columns;
//        }
//    }

    /**
     * 表字段类型替换成laravel字段类型
     * @param string $table
     * @return Collection
     */
    public function tableFieldsReplaceModelFields(string $table): Collection
    {
        $sql = sprintf('SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = \'%s\' AND TABLE_NAME = \'%s\' ',
            $this->getDatabase(), $table);
        $columns = collect(DB::select($sql));
        if($columns->isEmpty()) {
            throw new RuntimeException(sprintf('Not Found Table, got "%s".', $table));
        }
        $columns = $columns->map(function($column) {
            if($column && $column->DATA_TYPE) {
                if(array_key_exists($column->DATA_TYPE,$this->doctrineTypeMapping)) {
                    $column->DATA_TYPE = $this->doctrineTypeMapping[$column->DATA_TYPE];
                }
            }
            return $column;
        });
        return $columns;
    }

    /**
     * 获取数据库所有表
     * @return array
     */
    protected function getAllTables()
    {
        $tables = DB::select('show tables');
        $box = [];
        $key = 'Tables_in_' . $this->db;
        foreach($tables as $tableName) {
            $tableName = $tableName->$key;
            $box[] = $tableName;
        }
        return $box;
    }


    /**
     * 输出表信息
     * @param $tableName
     */
    protected function outTableAction($tableName)
    {
        $columns = $this->getTableColumns($tableName);
        $rows = [];
        foreach($columns as $column) {
            $rows[] = [
                $column->COLUMN_NAME,
                $column->COLUMN_TYPE,
                $column->COLUMN_DEFAULT,
                $column->IS_NULLABLE,
                $column->EXTRA,
                $column->COLUMN_COMMENT,
            ];
        }
        $header = ['COLUMN', 'TYPE', 'DEFAULT', 'NULLABLE', 'EXTRA', 'COMMENT'];
        $this->table($header, $rows);
    }

    /**
     * 输出某个表所有字段
     * @param $tableName
     * @return mixed
     */
    public function getTableFields($tableName)
    {
        $columns = collect($this->getTableColumns($tableName));
        $columns = $columns->pluck('COLUMN_NAME');
        $columns = $columns->map(function($value) {
            return "'{$value}'";
        });
        return $columns->toArray();
    }


    /**
     * 获取数据库的表名
     * @param $table
     * @return array
     */
    public function getTableColumns($table)
    {
        $sql = sprintf('SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = \'%s\' AND TABLE_NAME = \'%s\' ',
            $this->getDatabase(), $table);
        $columns = DB::select($sql);
        if(!$columns) {
            throw new RuntimeException(sprintf('Not Found Table, got "%s".', $table));
        }
        return $columns;
    }


    /**
     * 获取表注释
     * @param $table
     * @return string
     */
    public function getTableComment($table)
    {
        $sql = sprintf('SELECT TABLE_COMMENT FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME = \'%s\' AND TABLE_SCHEMA = \'%s\'',
            $table, $this->getDatabase());
        $tableComment = DB::selectOne($sql);
        if(!$tableComment) {
            return '';
        }
        return $tableComment->TABLE_COMMENT;
    }

    public function getDatabase()
    {
        return env('DB_DATABASE');
    }
}