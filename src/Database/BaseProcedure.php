<?php

namespace App\Database;

use App\Container\Container;
use App\Utils\Converter;

abstract class BaseProcedure
{
    use Converter;

    protected Connection $connection;
    protected mixed $result;

    function __construct()
    {
        $this->connection = Container::singleton(Connection::class);
        $this->result = [];
    }


    public function get(array $parameters, string $procedure): self
    {
        $this->result = $this->procedure($parameters, $procedure);

        $this->response($this->result);

        return $this;
    }

    public function execute(string $query): self
    {
        $this->result = $this->query($query);
        $this->response($this->result);
        return $this;
    }

    public function result(): mixed
    {
        return $this->result;
    }

    protected abstract function procedure(array $parameters, string $procedure): array|bool;

    protected abstract function query(string $query): bool;
}