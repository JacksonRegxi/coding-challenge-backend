<?php

use App\Controllers\MovieController;
use App\Router;

$router = new Router();

$router->get('/', MovieController::class, 'getMovies');

try {
    $router->dispatch();
} catch (Exception $e) {

}