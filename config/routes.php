<?php
declare(strict_types=1);

use App\Controllers\EmailController;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->get("/", function (Request $req, Response $res) use ($app) {

 $res->getbody()->write(json_encode(["message"=>"hello world"]));
 return $res->withStatus(200);
});
$app->post("/send_mail", [EmailController::class, 'sendEmail']);