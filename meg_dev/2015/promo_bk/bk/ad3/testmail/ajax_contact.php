<?php
if ($_POST):

	$name = $_POST['name'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];
	
	$target_person = array("sales@meghongkong.com");
	$default_subject = "Testing - Contact Us";
	$contact_message = "Name: ".$name. "<br/>\r\n";
	$contact_message .= "Email: ".$email. "<br/>\r\n";;
	$contact_message .= "Subject: ".$subject. "<br/>\r\n";
	$contact_message .= "Message: ".$message. "\r\n";

	$headers = "From: HKSM<sales@meghongkong.com>" . "\r\n" . "Reply-To: HKSM<sales@meghongkong.com>" . "\r\n";
	$headers .= "Return-Path: HKSM<sales@meghongkong.com>\r\n";
	$headers .= "Organization: HKSM\r\n";
	$headers .= 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset="UTF-8"' . "\r\n";
	$headers .= "X-Mailer: PHP/" . phpversion();
	
	include("./class.phpmailer.php");
	include("./class.smtp.php");

	$mail=new PHPMailer();

	$mail->IsSMTP();
	$mail->SMTPAuth   = true;
	$mail->IsHTML(true); // send as HTML

	$mail->SMTPAuth   = true;                  // enable SMTP authentication
	$mail->SMTPSecure = "";                 // sets the prefix to the servier (ssl / tls)

	$mail->Host       = "superhub.hk";		
	$mail->Port       = 587;
	$mail->Username   = "sales@meghongkong.com";
	$mail->Password   = "canonbox448";
	//$mail->SMTPDebug = 2;
	$mail->From       = "sales@meghongkong.com";
	$mail->FromName   = "HKSM";
	$mail->Subject    = $default_subject;
	$mail->Body       = $contact_message;
	//$mail->Body      .= "ㄐㄐㄐ";
	
	foreach ($target_person as $person) {
	
		/* $result = mail($person, $default_subject, $contact_message, $headers);
		if (!$result){
			echo ("Mail to " . $person . " was NOT successful!\r\n");
		} */
		$mail->AddAddress($person);
		//$mail->AddBCC("");
		$mail->AddReplyTo("sales@meghongkong.com");
		if(!$mail->Send()) {
			echo ("Mail to " . $person . " was NOT successful!\r\n");
		}
		
	}

endif;
?>
