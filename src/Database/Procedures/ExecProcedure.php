<?php

namespace App\Database\Procedures;

use App\Database\BaseProcedure;

class ExecProcedure extends BaseProcedure
{
    protected function procedure(array $parameters, string $procedure): array|bool
    {
        return $this->connection
            ->parameters($parameters)
            ->exec_procedure($procedure)
            ->get();
    }

    protected function query(string $query): bool
    {
        return $this->connection
            ->exec_query($query)
            ->get() > 0;
    }
}