<?php

			$fileatt = "pdf/type.pdf";
			$fileatt_type = "pdf/type.pdf";
			$fileatt_name = "pdf/type.pdf";
			$email_from = "no-reply@mydomain.com";
			$email_subject = "subject";
			$email_message = 'Hi,<br /><br />blablabla<br>';
			$email_message .= "<br /><br />Thanks for visiting.<br>";
			$email_to =  $_POST['to'];  //$e;
			$headers = "From: ".$email_from;
			$file = fopen($fileatt,'rb');
			$data = fread($file,filesize($fileatt));
			fclose($file);
			$semi_rand = md5(time());
			$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
			$headers .= "\nMIME-Version: 1.0\n" .
			"Content-Type: multipart/mixed;\n" .
			" boundary=\"{$mime_boundary}\"";
			$email_message .= "This is a multi-part message in MIME format.\n\n" .
			"--{$mime_boundary}\n" .
			"Content-Type:text/html; charset=\"iso-8859-1\"\n" .
			"Content-Transfer-Encoding: 7bit\n\n" .
			$email_message .= "\n\n";
			$data = chunk_split(base64_encode($data));
			$email_message .= "--{$mime_boundary}\n" .
			"Content-Type: {$fileatt_type};\n" .
			" name=\"{$fileatt_name}\"\n" .
			//"Content-Disposition: attachment;\n" .
			//" filename=\"{$fileatt_name}\"\n" .
			"Content-Transfer-Encoding: base64\n\n" .
			$data .= "\n\n" . "--{$mime_boundary}--\n";
			$ok = @mail($email_to, $email_subject, $email_message, $headers);
			
			if($ok)
				{
					echo "sent successfully";
				}
			else
				{
					die("Sorry but the email could not be sent. Please go back and try again!");
				}

?>