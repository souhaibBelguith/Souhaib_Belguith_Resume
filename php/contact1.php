<!DOCTYPE html>
<?php
require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();                            // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                     // Enable SMTP authentication
$mail->Username = '@gmail.com';          // SMTP username
$mail->Password = ''; // SMTP password
$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                          // TCP port to connect to

$mail->setFrom('sou.belguith@gmail.com', 'resume souhaib');
$mail->addReplyTo('sou.belguith@gmail.com', 'resume souhaib reply');
//$mail->addAddress('mohamedmouldi.slama@esprit.tn');   // Add a recipient
$mail->isHTML(true);  // Set email format to HTML

if(isset($_POST['mail']))
	
	//$name = $_POST['name']; // required
    //$mail_from = $_POST['mail']; // required
    //$message = $_POST['message']; // required
{
	$mail->addAddress($_POST['mail'];);
	$bodyContent = $_POST['message'];

$mail->Subject = 'Resume mail';
$mail->Body    = $bodyContent;

$mail->send();
?>