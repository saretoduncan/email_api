<?php
declare(strict_types=1);

use App\Middlewares\ResponseMiddleware;
use Slim\Factory\AppFactory;

require_once __DIR__ . "/../vendor/autoload.php";
$dotEnv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../");
$dotEnv->load();
$app = AppFactory::create();
$app->addRoutingMiddleware();

$app->addErrorMiddleware(true, true, true);
$app->add(ResponseMiddleware::class);
require __DIR__ . "/../config/routes.php";

return $app;