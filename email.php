<?php

session_start();
error_reporting(E_ALL);
date_default_timezone_set("America/Sao_Paulo");

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function redirectToIndex()
{
  header("Location: ./index3.php");
  exit;
}

function sendMail($name, $email, $message, $subject, $date)
{

  $mail = new PHPMailer();
  $mail->isSMTP();
  $mail->Host = "smtp.gmail.com";
  $mail->SMTPAuth = true;
  $mail->Username = "your@gmail.com";
  $mail->Password = "your smtp password";

  $mail->setFrom($myemail, $name);
  $mail->addReplyTo($myemail, $name);
  $mail->addAddress($email);

  $mail->isHTML(true);
  $mail->Subject = $subject;
  $mail->Body = "<b>Name:</b> {$name}<br><b>Email:</b> {$email}<br><br><b>Message:</b><br><br>
    {$message}<br><br><b>Date:</b> {$date}";

  if ($mail->send()) {
    $_SESSION["mail_success"] = true;
  } else {
    $_SESSION["mail_error"] = true;
  }

  redirectToIndex();
}

function start()
{
  if (
    isset($_POST["email"]) && !empty(trim($_POST["email"]))
    && isset($_POST["message"]) && !empty(trim($_POST["message"]))
  ) {

    $name = !empty($_POST["name"]) ? $_POST["name"] : "Not informed";
    $email = trim($_POST["email"]);
    $message = trim(str_replace("\n", '<br />', $_POST["message"]));
    $subject = "Welcome";
    $date = date("d/m/Y H:i");

    sendMail($name, $email, $message, $subject, $date);
  } else {
    $_SESSION["mail_error"] = true;
    redirectToIndex();
  }
}

start();
