<?php
declare(strict_types=1);

namespace App\Controllers;

class EmailController
{
  public function sendEmail()
  {
    echo $_ENV['NAME'];
  }
}