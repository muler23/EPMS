<html>
<head>
<script language="JavaScript">
var frmvalidator  = new Validator("contactform");
frmvalidator.addValidation("name","req","Please provide your name");
frmvalidator.addValidation("email","req","Please provide your email");
frmvalidator.addValidation("email","email",
  "Please enter a valid email address");
</script>
</head>
<form method="post" name="contact_form"
action="contact-form-handler.php">
    Your Name:
    <input type="text" name="name"><br>
    Email Address:
    <input type="text" name="email"><br>
    Message:
    <textarea name="message"></textarea><br>
    <input type="submit" value="Submit">
</form>
<?php
$errors = '';
$myemail = 'gizeman845@gmail.com';//<-----Put Your email address here.
if(empty($_POST['name'])  ||
   empty($_POST['email']) ||
   empty($_POST['message']))
{
    $errors .= "\n Error: all fields are required";
}
$name = $_POST['name'];
$email_address = $_POST['email'];
$message = $_POST['message'];
if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))
{
$to = $myemail;
$email_subject = "Contact form submission: $name";
$email_body = "You have received a new message. ".
" Here are the details:\n Name: $name \n ".
"Email: $email_address\n Message \n $message";
$headers = "From: $myemail\n";
$headers .= "Reply-To: $email_address";
mail($to,$email_subject,$email_body,$headers);
//redirect to the 'thank you' page
header('Location: contact-form-thank-you.html');
}
?>
</html>