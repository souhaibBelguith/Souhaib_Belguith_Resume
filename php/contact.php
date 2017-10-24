<?php
if(isset($_POST['mail'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $mail_to = "souhaib.belguith@esprit.tn";
    $mail_subject = "Resume mail";
 
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['name']) ||
        !isset($_POST['mail']) ||
        !isset($_POST['message'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
     
 
    $name = $_POST['name']; // required
    $mail_from = $_POST['mail']; // required
    $message = $_POST['message']; // required
 
    $error_message = "";
    $mail_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($mail_exp,$mail_from)) {
    $error_message .= 'The mail Address you entered does not appear to be valid.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$name)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
 
 
  if(strlen($message) < 2) {
    $error_message .= 'The message you entered do not appear to be valid.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $mail_message = "Form details below.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $mail_message .= "First Name: ".clean_string($name)."\n";
    $mail_message .= "mail: ".clean_string($mail_from)."\n";
    $mail_message .= "message: ".clean_string($message)."\n";
 
// create mail headers// <!-- include your own success html here -->
$headers = 'From: '.$mail_from."\r\n".
'Reply-To: '.$mail_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($mail_to, $mail_subject, $mail_message, $headers);  
?>
 

 
Thank you for contacting us. We will be in touch with you very soon.
echo $mail_message;
echo $name;
echo $mail_from;
 
<?php
 
}
?>