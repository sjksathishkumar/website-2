<?php
function Send_Mail($to,$subject,$body)
{
require 'class.phpmailer.php';
$from       = "admin@basspris.com";
$mail       = new PHPMailer();
$mail->IsSMTP(true);            // use SMTP
$mail->IsHTML(true);
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->Host       = "tls://mail.basspris.com"; // Amazon SES server, note "tls://" protocol
$mail->Port       =  465;                    // set the SMTP port
$mail->Username   = "admin@basspris.com";  // SMTP  username
$mail->Password   = "Bassbiz@12";  // SMTP password
$mail->SetFrom($from, 'no-reply@basspris.com');
$mail->Subject    = $subject;
$mail->MsgHTML($body);
$address = $to;
$mail->AddAddress($address, $to);
$mail->Send();   
}
?>
