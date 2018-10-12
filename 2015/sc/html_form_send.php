<html>
<body>
<?php

	$i_name = $_POST['name'];
	$i_email = $_POST['email'];
	$i_phone = $_POST['telephone'];
	$i_comment = $_POST['comments'];

	$error_flag = ( empty($i_name) or empty($i_email) or empty($i_comment) );

	if ($error_flag) {

		?><ul><?php
			if (empty($i_name)) { ?><li>Required field found empty: name</li><?php }
			if (empty($i_email)) { ?><li>Required field found empty: email</li><?php }
			if (empty($i_comment)) { ?><li>Required field found empty: comment</li><?php }
		?>
			</ul>
			<div>
				<div>We're sorry, but there's errors found with the form you submitted.</div>
				<div>Please go back and fix these errors.</div>
			</div>
		<?php

	} else {

		require("./PHPMailer_5.2.2/class.phpmailer.php");

		$mail = new PHPMailer();

		$mail->SMTPDebug  = 0; // 0 production 2 debug
		$mail->IsHTML(true);

		$mail->IsSMTP();  // telling the class to use SMTP
		$mail->Host = "210.245.164.81"; // SMTP servers
		$mail->SMTPAuth = true; // turn on SMTP authentication
		$mail->Username = "formmail@mail.meg.hk"; // SMTP username
		$mail->Password = "134679as"; // SMTP password
		$mail->Port = "366";

		$mail->SetFrom('info@meg.hk', 'info');
		$mail->AddAddress("info@meg.hk", "info");

		$mail->Subject = "website html form submissions";

		$mail->Body = ''
			. 'Name: ' . $i_name . '<br>'
			. 'Email: ' . $i_email . '<br>'
			. 'Telephone: ' . $i_phone . '<br>'
			. 'Comments: ' . $i_comment . '<br>'
			;

		$mail->Send();

		?><div>Thank you for contacting us. We will be in touch with you very soon.</div><?php

	}
?>

</body>
</html>