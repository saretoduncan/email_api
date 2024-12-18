<?php
declare(strict_types=1);

use App\Services;
use PHPMailer\PHPMailer\PHPMailer;

class EmailServices
{
  public function mailer(string $subject)
  {
    //SERVER SETTINGS
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = $_ENV['EMAIL_HOST'];
    $mail->SMTPAuth = $_ENV['SMTP_AUTH'];
    $mail->Username = $_ENV['USERNAME'];
    $mail->Password = $_ENV['PASSWORD'];
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = $_ENV['PORT'];

    //RECIPIENTs
    $mail->setFrom($_ENV['USERNAME'], 'Mailer');
    $mail->addAddress($_ENV['RECIPIENT_EMAIL'], '');

    //Content
    $mail->isHTML(true);
    $mail->Subject = $subject;

  }
}