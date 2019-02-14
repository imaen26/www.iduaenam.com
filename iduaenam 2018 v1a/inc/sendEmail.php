<?php

/* Configuration */
$subject = 'Contacto Nebraska Web'; // Set email subject line here
$mailto  = 'imaen26@gmail.com'; // Email address to send the form to
/* END Configuration */


   $name = trim(stripslashes($_POST['contactName']));
   $email = trim(stripslashes($_POST['contactEmail']));
   $subject = trim(stripslashes($_POST['contactSubject']));
   $contact_message = trim(stripslashes($_POST['contactMessage']));


// HTML for email to send submission details
$body = "
<br>
<p>Message:</p>
<p><b>Name</b>: $name <br>
<b>Email</b>: $email<br>
<b>subject</b>: $subject<br>
<b>message</b>: $contact_message<br>
<p>This form was submitted on <b>$timestamp</b></p>
";

// Success Message
$success = "
<div class=\"row\">
    <div class=\"thankyou\">
        <h3>Submission successful</h3>
        <p>Mensaje recibido, gracias por contactarte con Nebraska Films, te responderemos a la brevedad.</p>
    </div>
</div>
";

$headers = "From: $name <$email> \r\n";
$headers .= "Reply-To: $email \r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$message = "<html><body>$body</body></html>";

if (mail($mailto, $subject, $message, $headers)) {
    echo "$success"; // success
} else {
    echo 'Hubo un error, por favor intenta nuevamente.'; // failure
}

?>
