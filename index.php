<?php

use Dotenv\Dotenv;

require 'vendor/autoload.php';
header("Access-Control-Allow-Origin: *");
Dotenv::createImmutable(__DIR__)->load();
$router = require 'src/Router/index.php';