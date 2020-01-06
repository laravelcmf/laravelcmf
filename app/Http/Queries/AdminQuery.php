<?php

namespace App\Http\Queries;

use App\Models\Admin;
use Spatie\QueryBuilder\QueryBuilder;

class AdminQuery extends QueryBuilder
{
    public function __construct()
    {
        parent::__construct(Admin::query());
        $this->allowedIncludes('role');
    }
}