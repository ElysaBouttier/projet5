<?php

namespace Controller;

use SplSubject;

use phpmailer\PHPMailer\PHPMailer;
use phpmailer\PHPMailer\Exception;
// require('./../PHPMailer/src/Exception.php');
// require('./../PHPMailer/src/PHPMailer.php');


class ContactController
{
    public function showContactView()
    {
        require_once('./view/frontend/contact.php');
    }

    // public function sendMessage()
    // {

    //     //Create an instance; passing `true` enables exceptions
    //     $mail = new PHPMailer(true);

    //     try {
    //         //Server settings
    //         $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    //         $mail->isSMTP();                                            //Send using SMTP
    //         $mail->Host       = 'auth.smtp.1and1.fr';                   //Set the SMTP server to send through
    //         $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    //         $mail->Username   = 'lili@elysabouttier.fr';                     //SMTP username
    //         // Test123456789!!
    //         $mail->Password   = 'Test123456789!!';                               //SMTP password
    //         $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    //         $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //         //Recipients
    //         $mail->setFrom('ne-pas-repondre@noreply.com', 'Noreply');
    //         $mail->addAddress('lili@elysa.bouttier.net');     //Add a recipient
    //         // $mail->addAddress('ellen@example.com');               //Name is optional
    //         // $mail->addReplyTo('info@example.com', 'Information');
    //         // $mail->addCC('cc@example.com');
    //         // $mail->addBCC('bcc@example.com');

    //         //Attachments
    //         // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //         // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //         //Content
    //         $mail->isHTML(true);                                  //Set email format to HTML
    //         $mail->Subject = 'Message provenant du site internet';
    //         $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    //         // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    //         $mail->send();
    //         echo 'Message has been sent';
    //     } catch (Exception $e) {
    //         echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    //     }
    // }

    public function sendMessage(){
        $to= '';
        $subject='';
        $message = '';

        mail($to, $subject, $message);
    }
}
