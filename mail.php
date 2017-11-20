
<?php
require 'class.phpmailer.php';
require 'class.smtp.php';

$mail = new PHPMailer;

$mail->IsSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'mail.riceedu.org';                 // Specify main and backup server
$mail->Port = 25;                                    // Set the SMTP port
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'admin@riceedu.org';                // SMTP username
$mail->Password = 'Gurudatt148';                  // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted

$mail->From = 'admin@riceedu.org';
$mail->FromName = 'Bookmymoment';
$mail->AddAddress('richa.sach.meshram@gmail.com', 'dgh');  // Add a recipient

$mail->IsHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Bookmymoment confirmation : Booking no# 9982349';
$mail->Body    = 'This is the HTML message body <strong>in bold!</strong>';


if(!$mail->Send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
}

echo 'Booking confirmation is sent via e-mail!Thanks you!';
?>
HI