<?php
declare(strict_types=1);

use App\Controllers\EmailController;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->get("/", function (Request $req, Response $res) use ($app) {
  echo "Hello world";
  return $res;
});
$app->post("/send_mail", [EmailController::class, 'sendEmail']);