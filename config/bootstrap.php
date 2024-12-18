<?php
declare(strict_types= 1);

use Slim\Factory\AppFactory;

require_once __DIR__ ."/../vendor/autoload.php";

$app =AppFactory::create();
$app->addRoutingMiddleware();
$app->addErrorMiddleware(true,true,true);

require __DIR__ . "/../config/routes.php";

return $app;