<?php
require __DIR__ . '/../vendor/autoload.php';

use Framework\Router;

require __DIR__ . '/../routes/web.php';

Router::dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
