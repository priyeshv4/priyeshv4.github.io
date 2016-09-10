<?php
// form validation vars
    $formok = true;
    $errors = array();

    // sumbission data
//    $ipaddress = $_SERVER['REMOTE_ADDR'];
//    $date = date('d/m/Y');
//    $time = date('H:i:s');

// $email and $message are the data that is being
// posted to this page from our html contact form
$name = $_REQUEST['name'] ;
$email = $_REQUEST['email'] ;
$phone = $_REQUEST['phone'] ;
$subject = $_REQUEST['subject'] ;
$message = $_REQUEST['message'] ;
$price = $_REQUEST['price'] ;
$district = $_REQUEST['district'] ;
$state = $_REQUEST['state'] ;

// When we unzipped PHPMailer, it unzipped to
// public_html/PHPMailer_5.2.0
require("lib/PHPMailer/PHPMailerAutoload.php");

$mail = new PHPMailer();

// set mailer to use SMTP
$mail->IsSMTP();

// As this email.php script lives on the same server as our email server
// we are setting the HOST to localhost
$mail->Host = "wc-125.atnoc.com";  // specify main and backup server

$mail->SMTPAuth = true;     // turn on SMTP authentication

// When sending email using PHPMailer, you need to send from a valid email address
// In this case, we setup a test email account with the following credentials:
// email: send_from_PHPMailer@bradm.inmotiontesting.com
// pass: password
$mail->Username = "customercare@ilikeitt.in";  // SMTP username
$mail->Password = "brprpsj7"; // SMTP password

// $email is the user's email address the specified
// on our contact us page. We set this variable at
// the top of this page with:
// $email = $_REQUEST['email'] ;
$mail->From = "customercare@ilikeitt.in";

// below we want to set the email address we will be sending our email to.
$mail->AddAddress($_REQUEST['email'], "user");

// set word wrap to 50 characters
$mail->WordWrap = 1000;
// set email format to HTML
$mail->IsHTML(true);

$mail->Subject = "New AD Submission";
<php?
// $message is the user's message they typed in
// on our contact us page. We set this variable at
// the top of this page with:
// $message = $_REQUEST['message'] ;
$mail->CharSet  = 'UTF-8';
$mail->Body     = "	<p>Hello {$name}.</p>

		   	<p>Thanks for choosing our services. Glad to be associated with you</p>

		   	<p>Your submission has been received and it will active for listing within 6 hours after making review of the content.</p>
			<p>Please feel free to write us anythingh about your listings or anything you wish to enquir at the link <a href="http://ilikeitt.in/page-contact.html">HERE</a>
                        <p>
                            Thanks, 
                        </p>
			<p>
                            With Regards, <strong>Team ILIKEITT.IN</strong> 
                        </p>";
//$mail->Body    = $message;
//$mail->AltBody = $message;

if(!$mail->Send())
{
  
   exit;
}
  
?>