<?php

declare(strict_types=1);
namespace App\Handlers;
class ResponseHandlers
{
  public function __construct(public int $statusCode, public string $message)
  {

  }
  public function __invoke()
  {
    return ["statusCode" => $this->statusCode, "message" => $this->message];
  }
}