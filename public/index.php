<?php

header("Access-Control-Allow-Origin: http://localhost:3000");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Max-Age: 1000");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");
header("Access-Control-Allow-Methods: PUT, POST, GET, OPTIONS, DELETE");

session_set_cookie_params([
    'secure' => true,
    'samesite' => 'none',
]);

use App\Application;

require __DIR__ . '/../vendor/autoload.php';

$app = new Application;

$app->register();
$app->run();
