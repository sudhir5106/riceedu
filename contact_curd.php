<?php 
if($_POST['type']=="enquiry"){
	
	
  require_once('recaptchalib.php');
  $privatekey = "6LennPISAAAAAJBERy3ksjlQllAOCn2K7uy9ckC5";
  $resp = recaptcha_check_answer ($privatekey,
		$_SERVER["REMOTE_ADDR"],
		$_POST["recaptcha_challenge_field"],
		$_POST["recaptcha_response_field"]);

  if (!$resp->is_valid) {
 	
	die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
         "(reCAPTCHA said: " . $resp->error . ")");
  }
  else{
	
		///////////////////////////////////
		//data send to the admin via Email
		///////////////////////////////////
		//$to  = "admin@samriddhidevelopers.in";
		//$to  = "contact@sdmsonline.in";
		$to  = "richa.sach.meshram@gmail.com";
		
		// subject ///////////////////////////////////////
		$subject = 'A New Enquiry has been initiated';
		
		$user_name=$_POST['name'];
		$emailId=$_POST['emailId'];
		$countrycode=$_POST['countrycode'];
		$phone=$_POST['phone'];
		$msg=$_POST['msg'];
		
		
		// message ////////////////////////////////////////////////
		$message = "
		<table width='100%' border='0' cellspacing='0' cellpadding='0'>
		  <tr>
			<td>Name:</td>
			<td align='left'><strong>$user_name</strong></td>
		  </tr>
		  <tr>
			<td>Email:</td>
			<td align='left'><strong>$emailId</strong></td>
		  </tr>
		  <tr>
			<td>Phone:</td>
			<td align='left'><strong>$countrycode-$phone</strong></td>
		  </tr>
		  <tr>
			<td>Message/Enquiry:</td>
			<td align='left'><strong>$msg</strong></td>
		  </tr>
		</table>";
		
		// To send HTML mail, the Content-type header must be set
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		
		
		// Additional headers
		$headers .= 'From: SDMS Online <info@sdmsonline.in>' . "\r\n";
		//$headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
		//$headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";
		
		// Mail it
		mail($to, $subject, $message, $headers);
		////////////////////////////////////////////////////////////////
		echo 1;
  }
}
?>