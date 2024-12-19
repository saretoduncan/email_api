<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Handlers\ResponseHandlers;
use App\Services\EmailServices;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Exception\HttpBadRequestException;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Valitron\Validator;

class EmailController
{
  public function sendEmail(Request $request, Response $response, array $args): Response
  {
    
    $data = $request->getParsedBody();
    $validateData = new Validator($data);
    $validateData->rule('required',['customer_email', 'customer_phone_number', 'customer_name','customer_address','message_content','message_subject']);
    $validateData->rule('email',['customer_email']);
if(!$validateData->validate()){
  $errors = $validateData->errors();
    $response->getBody()->write(json_encode($errors));
   return $response->withStatus(400);
}
    $customer_email_data = $data["customer_email"];
    $customer_phone_number_data = $data["customer_phone_number"];
    $customer_name_data = $data["customer_name"];
    $customer_address_data = $data["customer_address"];
    $message_content_data = $data["message_content"];
    $message_subject = $data["message_subject"];

    $mail = new EmailServices();
    $mailFunc = $mail->mailer($subject = $message_subject, $customer_email = $customer_email_data, $customer_phone_number = $customer_phone_number_data, $customer_name = $customer_name_data, $mail_content = $message_content_data, customer_address: $customer_address_data);

    try {
      $mailFunc->send();
      $response->getBody()->write(json_encode(["message" => "success"]));
      return $response;
    } catch (\Exception $e) {


      $error_data = "something went wrong: " . $e->getMessage();
      $response->getBody()->write(json_encode($error_data));
      return $response->withStatus(400);

    }

  }
}