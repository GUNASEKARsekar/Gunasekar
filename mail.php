<?php

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader


if (isset($_POST["send"])) 
{

    $sender_name = $_POST["sender_name"];
    $sender = $_POST['sender'];
    $subject = $_POST["subject"];
    $attachments = $_FILES["file"]["name"];
    $to = explode(",", $_POST["to"]);
    $cc = explode(",", $_POST["cc"]);
    $bcc = explode(",", $_POST["bcc"]);
    $body = $_POST["body"];

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer;
    //$cc = explode(",", $_POST["cc"]);
    //$bcc = explode(",", $_POST["bcc"]);


        //try {
                //Server settings
                //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'your@gmail.com';                     //SMTP username
                $mail->Password   = 'your password';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
                $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom($sender, $sender_name);
                $mail->addaddress($_POST['to']);
                foreach ($to as $reci) 
                {
                    $mail->addaddress($reci);
                }
                
                $mail->addcc($_POST['cc']);
                
                foreach ($cc as $recipient) 
                    {

                     $mail->addcc($recipient);
                    }
                $mail->addBCC($_POST['bcc']);

                foreach ($bcc as $recipients) 
                {
                  $mail->addBCC($recipients);

                }
                //Attachments
                for($i = 0; $i < count($_FILES['file']['tmp_name']); $i++) 
                    {
                      $mail->addAttachment($_FILES["file"]["tmp_name"][$i],$_FILES['file']["name"][$i]);
                        //move_uploaded_file($file_tmp, "attachments/" .$mail);

                        //$mail->addAttachment("attachments/" . $mail);
                    }

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject =$_POST['subject'];
                $mail->Body =$_POST['body'];
                $mail->AltBody = $_POST['body'];

                if(!$mail->send()) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                echo 'Message has been sent';
            }

                //$mail->send();
                //echo 'Message has been sent';
       // } 

       /* catch (Exception $e) 
        {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        } */
}