<?php
include 'mail-verification/db.php';
$name  			= mysqli_real_escape_string($connection,$_POST['name']);
$email   		= mysqli_real_escape_string($connection,$_POST['email']);
$company_name	= mysqli_real_escape_string($connection,$_POST['company_name']);
$designation	= mysqli_real_escape_string($connection,$_POST['designation']);
$mobile 		= mysqli_real_escape_string($connection,$_POST['mobile']);
$industry  		= mysqli_real_escape_string($connection,$_POST['industry']);
$message   		= mysqli_real_escape_string($connection,$_POST['message']);
$no_emp 		= mysqli_real_escape_string($connection,$_POST['no_emp']);
$package 		= mysqli_real_escape_string($connection,$_POST['package']);
$amount			= mysqli_real_escape_string($connection,$_POST['amount']);	

$activation=md5($email.time()); // Encrypted email+timestamp

$count=mysqli_query($connection,"SELECT uid FROM enquiry WHERE email='$email'");
if(mysqli_num_rows($count) < 1)
{
mysqli_query($connection,"INSERT INTO enquiry(name,company_name,designation,mobile,industry,description,email,activation,package,no_emp,amount,enquiry_date) VALUES('$name','$company_name','$designation','$mobile','$industry','$message','$email','$activation','$package','$no_emp','$amount',CURRENT_TIMESTAMP);");

include 'mail-verification/smtp/Send_Mail.php';
$to=$email;
$subject="Registration confirmation for Basspris";
$body='Hi, <br/> <br/> We need to make sure you are human. Please verify your email and get started using your Basspris account. <br/> <br/> <a href="'.$base_url.'activation/'.$activation.'">'.$base_url.'activation/'.$activation.'</a>';
Send_Mail($to,$subject,$body);

echo "success";	

}
else
{
echo 'error';	
}

?>
