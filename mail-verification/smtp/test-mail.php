<?php
require_once('class.phpmailer.php');
 
$mail             = new PHPMailer(); // defaults to using php "mail()"
$body             = 'Test mail';
$mail->IsSMTP(true);            // use SMTP
//$mail->IsHTML(true);
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->Host       = "ssl://smtp.gmail.com"; // Amazon SES server, note "tls://" protocol
$mail->Port       =  465; 
$mail->SetFrom('basstechsindia@gmail.com', 'Sathish');
$address = "sjksathishkumar@gmail.com";
$mail->AddAddress($address, "Sathish");
$mail->Subject    = "Test mail from basspris";
$mail->MsgHTML($body);
if(!$mail->Send()) {
echo "Mailer Error: " . $mail->ErrorInfo;
} else {
echo "Message sent!";
}

?>