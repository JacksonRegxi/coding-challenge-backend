<?php

use Dotenv\Dotenv;

require 'vendor/autoload.php';

Dotenv::createImmutable(__DIR__)->load();
$router = require 'src/Router/index.php';