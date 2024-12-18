<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Services\EmailServices;


class EmailController
{
  public function sendEmail()
  {
    $mail = new EmailServices();
    $mailFunc = $mail->mailer("Test mail", "saretoduncan@gmail.com", "0715691186", "Duncan", "Please send me the quote");
    $mailFunc->send();
    echo "already sent";
  }
}