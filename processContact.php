<?php

// Clean up the input values
foreach($_POST as $key => $value) {
	if(ini_get('magic_quotes_gpc'))
		$_POST[$key] = stripslashes($_POST[$key]);
	
	$_POST[$key] = htmlspecialchars(strip_tags($_POST[$key]));
}

// Assign the input values to variables for easy reference
$name = $_POST["name"];
$subject = $_POST["subject"];
$email = $_POST["email"];
$message = $_POST["message"];
// Test input values for errors
$errors = array();

if(!$email) {
	$errors[] = "You must enter an email.";
} else if(!validEmail($email)) {
	$errors[] = "You must enter a valid email.";
}
if(strlen($message) < 10) {
	if(!$message) {
		$errors[] = "You must enter a message.";
	} else {
		$errors[] = "Message must be at least 10 characters.";
	}
}

if($errors) {
	
	$errortext = "";
	foreach($errors as $error) {
		$errortext .= "<li>".$error."</li>";
	}
	die("<div class='thanks failure'>The following errors occured:<ul>". $errortext ."</ul></div>");
}

$to = "assem.ukg@gmail.com";
$subject = "Contact Form: $name - $subject";
$headers = "From: $email";

mail($to, $subject, $message, $headers);


die("<div class='thanks'>Thanks for submitting your email! Our manager will contact you shortly.</div>");

function validEmail($email)
{
   $isValid = true;
   $atIndex = strrpos($email, "@");
   if (is_bool($atIndex) && !$atIndex)
   {
      $isValid = false;
   }
   else
   {
      $domain = substr($email, $atIndex+1);
      $local = substr($email, 0, $atIndex);
      $localLen = strlen($local);
      $domainLen = strlen($domain);
      if ($localLen < 1 || $localLen > 64)
      {
       
         $isValid = false;
      }
      else if ($domainLen < 1 || $domainLen > 255)
      {
         
         $isValid = false;
      }
      else if ($local[0] == '.' || $local[$localLen-1] == '.')
      {
         
         $isValid = false;
      }
      else if (preg_match('/\\.\\./', $local))
      {
        
         $isValid = false;
      }
      else if (!preg_match('/^[A-Za-z0-9\\-\\.]+$/', $domain))
      {
         
         $isValid = false;
      }
      else if (preg_match('/\\.\\./', $domain))
      {
        
         $isValid = false;
      }
      else if(!preg_match('/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/',
                 str_replace("\\\\","",$local)))
      {
         
         if (!preg_match('/^"(\\\\"|[^"])+"$/',
             str_replace("\\\\","",$local)))
         {
            $isValid = false;
         }
      }
      if ($isValid && !(checkdnsrr($domain,"MX") || checkdnsrr($domain,"A")))
      {
         
         $isValid = false;
      }
   }
   return $isValid;
}

?>