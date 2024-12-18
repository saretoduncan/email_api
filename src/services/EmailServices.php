<?php
declare(strict_types=1);

namespace App\Services;
use PHPMailer\PHPMailer\PHPMailer;

class EmailServices
{
  public function mailer(string $subject, string $customer_email, string $customer_phone_number, string $customer_name, string $mail_content, string $customer_address): PHPMailer
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
    $mail->setFrom($_ENV['USERNAME'], $customer_name);
    $mail->addAddress($_ENV['RECIPIENT_EMAIL'], '');
    $mail->addReplyTo($customer_email, $customer_name);

    //Content
    $mail->isHTML(true);
    $mail->Subject = $subject;
    ob_start();
    include(__DIR__ . "/../Templates/emailTemplate.php");
    $mail->Body = ob_get_contents();
    ob_get_clean();


    return $mail;

  }
}