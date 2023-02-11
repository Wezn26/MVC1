<?php

use App\Router\Router;

require 'autoload.php';

session_start();

$router = new Router();
$router->run();