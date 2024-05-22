<?php

namespace App\Database;

use App\Utils\Converter;

abstract class BaseProcedure
{
    use Converter;

    protected Connection $connection;
    protected mixed $result;

    function __construct()
    {
        $this->connection = new Connection();
        $this->result = [];
    }


    public function get(array $parameters = []): self
    {
        $this->result = $this->procedure($parameters);

        $this->response($this->result);

        return $this;
    }

    public function result(): mixed
    {
        return $this->result;
    }

    protected abstract function procedure(array $parameters): array;
}