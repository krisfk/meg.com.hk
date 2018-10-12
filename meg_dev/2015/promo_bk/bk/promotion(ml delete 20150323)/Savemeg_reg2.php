<html>
<head>
<title>CNY Promotion 2014</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<style type="text/css">
<!--
.style1 {color: #FFFF00}
.style2 {color: #FFFFFF}
-->
</style>
</head>
<body>
</body>
</html>

<?php

	// Matthew 20140422 Email Notification Start

		require("../../PHPMailer_5.2.2/class.phpmailer.php");

		$mail = new PHPMailer();

		$mail->IsSMTP();  // telling the class to use SMTP
        $mail->Host = "210.245.164.81"; // SMTP servers
        $mail->SMTPAuth = true; // turn on SMTP authentication
        $mail->Username = "formmail@mail.meg.hk"; // SMTP username
        $mail->Password = "134679as"; // SMTP password
		$mail->Port = "366";

		$mail->From = "info@meg.hk";

		$mail->AddAddress("po@meg.hk", "PO");


		$mail->Subject = "MEG Promotion";
		$mail->Body = 'abc';

		$mail->Send();
echo 'Done.';
	// Matthew 20140304 Email Notification End


	// if ($sent){
	// 	//echo "E-mail Sent";
	// } else {
	// 	//echo "Failed";
	// }




	}
	redirectJS("http://www.hksm.com.hk");
?>

