<?php
declare(strict_types=1);
namespace App\Middlewares;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class ResponseMiddleware
{

  public function __invoke(Request $req, Response $res, callable $next)
  {
    $res = $next($req, $res);
    return $res->withHeader("Content-Type", "application/json");

  }
}