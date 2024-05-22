<?php

use App\Container\Container;

function app(string $class): mixed
{
    return Container::resolve($class);
}

function singleton(string $class, callable|string|null $construction = null): mixed
{
    return Container::singleton($class, $construction);
}