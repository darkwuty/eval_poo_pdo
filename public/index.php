<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/Routes.php';

use Src\Routes;

$route = $_GET['route'] ?? '/';

Routes::handle($route);