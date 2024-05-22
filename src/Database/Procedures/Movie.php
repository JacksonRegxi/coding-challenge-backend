<?php

namespace App\Database\Procedures;

use App\Database\BaseProcedure;

class Movie extends BaseProcedure
{
    protected function procedure(array $parameters): array
    {
        return $this->connection
            ->parameters($parameters)
            ->exec_procedure('get_movies')
            ->get();
    }
}