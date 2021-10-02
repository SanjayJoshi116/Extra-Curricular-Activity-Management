<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendmail($toaddress,$toname,$subject,$message)
{
	//Load Composer's autoloader
	require 'vendor/autoload.php';

	//Create an instance; passing `true` enables exceptions
	$mail = new PHPMailer(true);

	try {
		//Server settings
		$mail->SMTPDebug = false;//SMTP::DEBUG_SERVER;                      //Enable verbose debug output
		$mail->isSMTP();                                            //Send using SMTP
		$mail->Host       = 'mail.myprojectcoding.xyz';                     //Set the SMTP server to send through
		$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
		$mail->Username   = 'extracurricular@myprojectcoding.xyz';                     //SMTP username
		$mail->Password   = '6I.RtW92+xet';                               //SMTP password
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
		$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

		//Recipients
		$mail->setFrom('extracurricular@myprojectcoding.xyz', 'ExtraCurricular');
		$mail->addAddress($toaddress, $toname);     //Add a recipient
		/*
		$mail->addAddress('ellen@example.com');               //Name is optional
		$mail->addReplyTo('info@example.com', 'Information');
		$mail->addCC('cc@example.com');
		$mail->addBCC('bcc@example.com');

		//Attachments
		$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
		$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
		*/
		//Content
		$mail->isHTML(true);                                  //Set email format to HTML
		$mail->Subject = $subject;
		$mail->Body    = $message;
		$mail->AltBody = $subject;

		$mail->send();
		//echo 'Message has been sent';
	} catch (Exception $e) {
		echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}
}
//sendmail("mvaravinda@gmail.com","Aravinda","Hello from Technopulse","Welcome mail from technopulse.");
function sendbulkmail($toaddresses,$subject,$message)
{
	//Load Composer's autoloader
	require 'vendor/autoload.php';

	//Create an instance; passing `true` enables exceptions
	$mail = new PHPMailer(true);

	try {
		//Server settings
		$mail->SMTPDebug = false;//SMTP::DEBUG_SERVER;                      //Enable verbose debug output
		$mail->isSMTP();                                            //Send using SMTP
		$mail->Host       = 'mail.myprojectcoding.xyz';                     //Set the SMTP server to send through
		$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
		$mail->Username   = 'extracurricular@myprojectcoding.xyz';                     //SMTP username
		$mail->Password   = '6I.RtW92+xet';                               //SMTP password
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
		$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

		//Recipients
		$mail->setFrom('extracurricular@myprojectcoding.xyz', 'ExtraCurricular');
		for($i=0;$i<count($toaddresses);$i++)
		{
			$mail->addAddress($toaddresses[$i]['student_rollno'],$toaddresses[$i]['name']);
		}
		/*
		$mail->addAddress('ellen@example.com');               //Name is optional
		$mail->addReplyTo('info@example.com', 'Information');
		$mail->addCC('cc@example.com');
		$mail->addBCC('bcc@example.com');

		//Attachments
		$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
		$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
		*/
		//Content
		$mail->isHTML(true);                                  //Set email format to HTML
		$mail->Subject = $subject;
		$mail->Body    = $message;
		$mail->AltBody = $subject;

		$mail->send();
		//echo 'Message has been sent';
	} catch (Exception $e) {
		echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}
}
?>