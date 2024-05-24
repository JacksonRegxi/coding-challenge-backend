<?php

use Dotenv\Dotenv;

require 'vendor/autoload.php';
// header('Access-Control-Allow-Origin: stylishgames.myshopify.com');
header('Access-Control-Allow-Origin: *');


// header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
// header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Content-Type: application/json;charset=UTF-8');
// header('Access-Control-Allow-Origin: * ');
header('Access-Control-Allow-Methods: HEAD, GET, OPTIONS, POST, PUT');
header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');
header('Access-Control-Max-Age: 1728000');
header('Access-Control-Allow-Credentials', 'true');
Dotenv::createImmutable(__DIR__)->load();
$router = require 'src/Router/index.php';