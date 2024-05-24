<?php

namespace App\Database;
use Exception;

class Connection
{
    private mixed $connection;
    private array $parameters = [];
    private string $host;
    private string $database;
    private string $port;
    private string $user;
    private string $password;
    private mixed $declaration;


    public function __construct()
    {
        $this->host = env('DB_HOST');
        $this->database = env('DB_DATABASE');
        $this->user = env('DB_USERNAME');
        $this->password = env('DB_PASSWORD');
        $this->port = env('DB_PORT');
        $this->connect();
    }


    private function connect(): void
    {
        try {
            $this->connection = mysqli_connect(
                $this->host,
                $this->user,
                $this->password,
                $this->database,
                $this->port
            );
        } catch (Exception $exception) {
            die($exception->getMessage());
        }
    }


    function exec_query(string $query): self
    {
        $this->declaration = mysqli_query(
            $this->connection,
            $query
        );

        return $this;
    }

    function exec_procedure(string $procedure): self
    {
        $parameters = $this->entryParameters();

        $query = "CALL $procedure (" . implode(', ', array_fill(0, count($parameters), "?")) . ")";

        $this->declaration = mysqli_execute_query(
            $this->connection,
            $query,
            $parameters
        );

        return $this;
    }

    function checkBool($string): bool
    {
        $string = strtolower($string);
        return (in_array($string, array("true", "false", "1", "0", "yes", "no"), true));
    }

    function parameters(array $parameters): self
    {
        $this->parameters = $parameters;

        return $this;
    }

    function get(): array|bool
    {
        $result = [];

        if ($this->declaration === true || $this->declaration === false){
            return $this->declaration;
        }

        while ($row = mysqli_fetch_array($this->declaration, MYSQLI_ASSOC)) {
            $result[] = $row;
        }

        return $result;
    }

    function close(): void
    {
        mysqli_close($this->connection);
    }

    private function entryParameters(): array
    {
        $parameters = [];

        foreach ($this->parameters as $parameter) {
            $parameters[] = $parameter;
        }

        return $parameters;
    }

    private function parametersFormat(): array
    {
        $parametersKeys = [];

        foreach ($this->parameters as $key => $parameter) {
            $parametersKeys[] = "@$key = ?";
        }

        return $parametersKeys;
    }
}