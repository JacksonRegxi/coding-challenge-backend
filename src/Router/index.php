<?php

use App\Controllers\MovieController;
use App\Router;

$router = new Router();

$router->get('/movies', MovieController::class, 'getMovies');
$router->post('/store-movie', MovieController::class, 'storeMovie');

$router->dispatch();