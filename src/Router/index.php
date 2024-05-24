<?php

use App\Controllers\CustomerController;
use App\Controllers\LoanController;
use App\Controllers\MovieController;
use App\Router;

$router = new Router();

$router->get('/movies', MovieController::class, 'getMovies');
$router->post('/store-movie', MovieController::class, 'storeMovie');
$router->get('/customers', CustomerController::class, 'getCustomers');
$router->post('/store-customer', CustomerController::class, 'storeCustomer');
$router->post('/store-loan', LoanController::class, 'storeCustomerMovie');
$router->post('/movies-available', LoanController::class, 'getMoviesAvailable');
$router->post('/movies-return', LoanController::class, 'storeReturnMovie');
$router->dispatch();