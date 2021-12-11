<?php

namespace Elysa\Pfive\c;

use SplSubject;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ContactController
{
    public function showContactView()
    {
        require_once('./view/frontend/contact.php');
    }
    public function showRgpdView()
    {
        require_once('./view/frontend/rgpd.php');
    }

    public function sendMessage($name, $email, $subject, $content)
    {

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'auth.smtp.1and1.fr';                   //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'lili@elysabouttier.fr';                     //SMTP username
            // Test123456789!!
            $mail->Password   = 'Test123456789!!';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            $mail->CharSet = 'UTF-8';
            //Recipients
            $mail->setFrom('ne-pas-repondre@noreply.com', 'Noreply');
            $mail->addAddress('lili@elysabouttier.fr');     //Add a recipient
            // $mail->addAddress('ellen@example.com');               //Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Message provenant du site internet';
            $mail->Body    = "
            <html>
            <head>
            <title>Message en provenance du site Tatyana</title>
            </head>
            <body>                
            <div style='width:800px;background:#fff;border-style:groove;'>
            <div style='width:50%; height:30px; text-align:left;'><a href='http://tatyana.elysabouttier.fr'>Accéder au site </a></div>
            <hr width='100%' size='2' color='#A4168E'>   
            <h4 style='color:#ea6512;margin-top:5px;'> Hello,
            </h4>
            <p>Un nouveau message vous à été envoyé via le formulaire de contact de votre site concernant : \"$subject \" </p>
            <hr/>
            <div style='height:210px;'>
            <table cellspacing='0' width='100%' >
            <thead>
            <col width='40px' />
            <col width='150px' />
            <tr>          
            <th style='color:#0A903B'>En provenance de</th>
            <th style='color:#0A903B'>Message</th>                                                                            
            </tr>
            </thead>
            <tbody>
            <tr>
            <td>$name ($email)</td>
            <td> $content</td>
            </tr>
            </tbody>
            </table>                        
            </div> 
            </div>              
            </body>
            </html>";
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
