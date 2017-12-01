<?php 

$to="richa.sach.meshram@gmail.com";
$message="hii richa";
$subject="Testing email";
$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: bookmymoment <info@bookmymoment.com>' . "\r\n";
		// Mail it
		
		if(mail($to, $subject, $message, $headers))
		{
		echo "mail sent";
		}
		?>
		