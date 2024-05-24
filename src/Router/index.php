<?php

use App\Controllers\CustomerController;
use App\Controllers\MovieController;
use App\Router;

$router = new Router();

$router->get('/movies', MovieController::class, 'getMovies');
$router->post('/store-movie', MovieController::class, 'storeMovie');
$router->get('/customers', CustomerController::class, 'getCustomers');
$router->post('/store-customer', CustomerController::class, 'storeCustomer');

$router->dispatch();