<!DOCTYPE html>
<?php
require 'PHPMailer/PHPMailerAutoload.php';

 
 
    $sender_name = $_POST['name']; // required
    $$sender = $_POST['mail']; // required
    $$Body = $_POST['message']; // required
	$Subject = "Resume mail";
	
  $mail = new PHPMailer;
    //Enable SMTP debugging. 
    $mail->SMTPDebug = 1;
    //Set PHPMailer to use SMTP.
    $mail->isSMTP();
    //Set SMTP host name                          
    $mail->Host = $hostname;
    //Set this to true if SMTP host requires authentication to send email
    $mail->SMTPAuth = true;
    //Provide username and password     
    $mail->Username = $sender;
    $mail->Password = $mail_password;
    //If SMTP requires TLS encryption then set it
    $mail->SMTPSecure = "ssl";
    //Set TCP port to connect to 
    $mail->Port = 465;
    $mail->From = $sender;  
    $mail->FromName = $sender_name;
    $mail->addAddress($to);
    $mail->isHTML(true);
    $mail->Subject = $Subject;
    $mail->Body = $Body;
    $mail->AltBody = "This is the plain text version of the email content";
    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
    else {
           echo 'Mail Sent Successfully';
    }	
?>