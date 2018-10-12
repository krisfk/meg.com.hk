<?
		require("../../PHPMailer_5.2.2/class.phpmailer.php");
		$mail2 = new PHPMailer(true);

		$mail2->IsSMTP();
		$mail2->SMTPAuth   = false;
		$mail2->IsHTML(true); // send as HTML

		$mail2->Host       = "localhost";		
		$mail2->Port       = 25;
		$mail2->Username   = "sales@meg.com.hk";
		$mail2->Password   = "canonbox448";
		//$mail2->SMTPDebug = 2;
		$mail2->From       = "sales@meghongkong.com";
		$mail2->FromName   = "IAM Legacy";
		// $mail2->Subject    = $default_subject;
		// $mail2->Body       = $contact_message;

/*
		$mail->SMTPAuth   = true;                  // enable SMTP authentication
		$mail->SMTPSecure = "";                 // sets the prefix to the servier (ssl / tls)
		
		$mail2->IsSMTP();  
		$mail2->Host = "superhub.hk"; // SMTP servers
		$mail2->SMTPAuth = false; // turn on SMTP authentication
		$mail2->Username = "sales@meghongkong.com"; // SMTP username
		$mail2->Password = "canonbox448"; // SMTP password
		$mail2->SMTPSecure = 'tls';
		$mail2->Port = "587";
		$mail2->IsHTML(true);
		$mail2->CharSet = 'UTF-8';
*/
	


		// $mail2->SetFrom("info@meg.com.hk", 'info');
		$mail2->SetFrom("sales@meghongkong.com", 'info');

		$mail2->AddAddress('barryli@hksm.com.hk', 'Testing');

		$mail2->Subject = "Subject"; 

		$mail2->Body = 'Body';


		try {
		  $mail2->Send();
		} catch (phpmailerException $e) {
		  echo $e->errorMessage(); //Pretty error messages from PHPMailer
		} catch (Exception $e) {
		  echo $e->getMessage(); //Boring error messages from anything else!
		}




?>

