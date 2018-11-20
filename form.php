<?php
if(isset($_POST['submit'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "mathis.lrn@hotmail.fr";
    $email_subject = "Jeux de rôle";
 
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['first_name']) ||
        !isset($_POST['last_name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['message'])) {
        died('Nous sommes désolé, mais une erreur est surevenue lors de la soumission du formulaire.');       
    }
 
     
 
    $first_name = $_POST['first_name']; // required
    $last_name = $_POST['last_name']; // required
    $email_from = $_POST['email']; // required
    $message = $_POST['message']; // required
 
    $error_message = "";
    $email_exp = '/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= "L'adresse email que vous avez entré n\'est pas valide.<br />";
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$first_name)) {
    $error_message .= "Le prénom que vous avez entré n'est pas valide.<br />";
  }
 
  if(!preg_match($string_exp,$last_name)) {
    $error_message .= "Le nom que vous avez entré n'est pas valide.<br />";
  }
 
  if(strlen($comments) < 2) {
    $error_message .= "Le message que vous avez entré n'est pas valide.<br />";
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Détails du formulaire en dessous.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= "Prénom : ".clean_string($first_name)."\n";
    $email_message .= "Nom : ".clean_string($last_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Message : ".clean_string($message)."\n";
 
// create email headers
$headers = 'De : '.$email_from."\r\n".
'Reply-To : '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
 
<!-- include your own success html here -->
 
Thank you for contacting us. We will be in touch with you very soon.
 
<?php
 
}
?>