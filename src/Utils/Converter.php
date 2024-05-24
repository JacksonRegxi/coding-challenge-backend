<?php

namespace App\Utils;

trait Converter
{
    private mixed $response;

    public function response(mixed $response): void
    {
        $this->response = $response;
    }

    public function json(): string
    {
        return json_encode($this->response, JSON_INVALID_UTF8_SUBSTITUTE|JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }
}