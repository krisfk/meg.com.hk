<!DOCTYPE html>
<html>
<head>
	<title>CNY Promotion</title>
	<meta charset="UTF-8">
</head>
<body>
</body>
</html>

<?php

/*********************************************************/
/* File       : Savemeg.php                              */
/* Usage      : !!! Notice email is supported            */
/*              save the MEG promotion registration info */
/* Created by : Barry 07-Feb-2011				         */
/*********************************************************/

//include "includes/config.php";
//include "includes/php_func.php";
//session_start();

function redirectJS($uri){?>
<script type="text/javascript">
<!--
document.location.href="<?php echo $uri;?>";
-->
</script><?php
  die("the URL file does not locate!");
  }

	$success = 0;
	$errmsg = "";

	//$returnURL = "txtVoucherNo=".urlencode($_POST["txtVoucherNo"])."&";
	$returnURL = "txtName=".urlencode($_POST["txtName"])."&";
	$returnURL = $returnURL."txtTel=".urlencode($_POST["txtTel"])."&";
	$returnURL = $returnURL."txtEmail=".urlencode($_POST["txtEmail"])."&";
	//$returnURL = $returnURL."txtFacebookID=".urlencode($_POST["txtFacebookID"])."&";
	$returnURL = $returnURL."txtHKID=".urlencode($_POST["txtHKID"])."&";
	//$returnURL = $returnURL."txtSecurityCode=".urlencode($_POST["txtSecurityCode"])."&";
	//$returnURL = $returnURL."shop=".urlencode($_POST["shop"])."&";
	$returnURL = $returnURL."course=".urlencode($_POST["course"])."&";

	$returnURL = $returnURL."area=".urlencode($_POST["area"])."&";
	$returnURL = $returnURL."age=".urlencode($_POST["age"])."&";
	$returnURL = $returnURL."occupation=".urlencode($_POST["occupation"]);

	//$returnURL = $returnURL."course=".urlencode($_POST["txtName2"])."&";
	//$returnURL = $returnURL."course=".urlencode($_POST["txtVoucherNo2"]);



//	$returnURL = $returnURL."course=".urlencode($_POST["course"])."&";
	//$returnURL = $returnURL."veh_type=".urlencode($_POST["veh_type"])."&";
	//$returnURL = $returnURL."shop=".urlencode($_POST["shop"]);
	//$returnURL = $returnURL."txtHKID=".urlencode($_POST["txtHKID"])."&";
	//$returnURL = $returnURL."txtAddress=".urlencode($_POST["txtAddress"])."&";
	//$returnURL = $returnURL."age=".urlencode($_POST["age"])."&";
	//$returnURL = $returnURL."occupation=".urlencode($_POST["occupation"])."&";
	//$returnURL = $returnURL."medium=".urlencode($_POST["medium"]);

	//$returnURL = $returnURL."area=".urlencode($_POST["area"]);

	//$isPC = $HTTP_POST_VARS["chkPC"];
	//$isLGV = $HTTP_POST_VARS["chkLGV"];

	//$studentname = $HTTP_POST_VARS["txtName"];
	//$contacttel = $HTTP_POST_VARS["txtTel"];
	//$couponno = "WLN880001";



		   	$meg_mysql = mysql_connect("localhost", "megcom_admin", "!4h*ZAwduzBB")
	    	or die("Cannot connect to MySQL server.");
			$megdb = mysql_select_db("megcom_production", $meg_mysql)
			or die("Cannot open Database.");
			$result = mysql_query("select * from tb_register_info where formno=".$_POST['txtFormNo']." and email='".$_POST["txtEmail"]."'");

			$rs=mysql_fetch_assoc($result);
			if (mysql_num_rows($result)>0)
				$duplicate = 1;
			else $duplicate = 0;
			mysql_close($meg_mysql);

			if ($duplicate==1) {
				// duplicate player
				$success = 0;
				echo "<script Language='JavaScript'>alert('對不起!你不能重複登記! Sorry! You cannot register Repeatedly');</script>";
				redirectjs('form_'. $_POST['txtFormNo'] . '.php'); // Matthew 2014-01-23 Back to registration form page
			} else {
				$success = 1;
				echo "<script Language='JavaScript'>alert('登記成功，數日內會有專人與你聯絡。Registration Completed! Our staff will contact you shortly.');</script>";
			}

	// insert record

	if ($success == 1) {
	   	$meg_mysql = mysql_connect("localhost", "megcom_admin", "!4h*ZAwduzBB")
    	or die("Cannot connect to MySQL server.");
		$leinam_lessondate = mysql_select_db("megcom_production", $meg_mysql)
		or die("Cannot open Database.");

		//echo "<br>insert into tb_play_info (gameno, email, name, telno, playdate, hkid, PC) values (".$HTTP_POST_VARS['txtGameno'].", '".$HTTP_POST_VARS["txtEmail"]."','".$HTTP_POST_VARS["txtName"]."','".$HTTP_POST_VARS["txtTel"]."', now() " .",'".$HTTP_POST_VARS["txtHKID"]."','".$HTTP_POST_VARS["chkPC"]."','".$HTTP_POST_VARS["chkLGV"]."','".$HTTP_POST_VARS["chkMC"]."')";
		//exit;

		//mysql_query("insert into tb_register_info (formno, email, name, telno, regdate, hkid, voucher_no, security_code, shop, course) values (".$_POST['txtFormNo'].", '".$_POST["txtEmail"]."','".$_POST["txtName"]."','".$_POST["txtTel"]."', now() " .",'".$_POST["txtHKID"]."','".$_POST["txtVoucherNo"]."','".$_POST["txtSecurityCode"]."','".$_POST["txtShop"]."',".$_POST["course"].")");
		//mysql_query("insert into tb_register_info (formno, email, name, telno, regdate, hkid, voucher_no, security_code, course, name2, voucher_no2) values (".$_POST['txtFormNo'].", '".$_POST["txtEmail"]."','".$_POST["txtName"]."','".$_POST["txtTel"]."', now() " .",'".$_POST["txtHKID"]."','".$_POST["txtVoucherNo"]."','".$_POST["txtSecurityCode"]."',".$_POST["course"].",'".$_POST["txtName2"]."','".$_POST["txtVoucherNo2"]."')");

		mysql_query("SET NAMES 'UTF8'");
		mysql_query("insert into tb_register_info (formno, email, name, telno, regdate, hkid, course, area, age, occupation) values (".$_POST['txtFormNo'].", '".$_POST["txtEmail"]."','".$_POST["txtName"]."','".$_POST["txtTel"]."', now() " .",'".$_POST["txtHKID"]."',".$_POST["course"].",".$_POST["area"].",".$_POST["age"].",".$_POST["occupation"].")");


		mysql_close($meg_mysql);



   		$aryOccupation = array("", "Management", "Professional", "Teacher", "Civilian", "Workers", "Housewives", "Student", "Self-employed", "Unemployed", "Retired", "Other");
   		$aryArea = array("", "Western and Central", "Eastern HK", "Southern HK", "Wan Chai", "TST/Yaumatei/Mongkok", "Sham Shui Po", "Kowloon City", "Wong Tai Sin", "Kwun Tong", "Kwai Chung & Tsing Yi", "Tsuen Wan", "Yuen Long", "Tuen Mun", "Northern District", "Tai Po", "Shatin", "Sai Kung", "Islands District");
   		$aryAge = array("", "18-25", "26-30", "31-35", "36-40", "40+");
   		$aryCourseName = array("", "香港駕駛學院課程", "A1駕駛學院課程", "自由學課程", "羊年咩咩咩咩大優惠"); // Matthew 2014-01-23 Course Name


		// Email body

	    	// HTML body
	    	//$body  = "親愛的 <font size=\"4\">".$row["name"]."</font><br>";

			$body = "The following person has been registered in our web site\n\n";
			$body .= "Offer: " . $aryCourseName[$_POST['course']]."\n";
			$body .= "Name: " . $_POST['txtName']."\n";
			$body .= "HKID: " . $_POST['txtHKID']."\n";
			$body .= "Email: " . $_POST['txtEmail']."\n";
			$body .= "Tel: " . $_POST['txtTel']."\n";

			$body .= "Region: " . $aryArea[$_POST['area']]."\n";
			$body .= "Age Group: " . $aryAge[$_POST['age']]."\n";
			$body .= "Job Category: " . $aryOccupation[$_POST['occupation']]."\n";


			//$body .= "Branch: " . $_POST['shop']."<br>";


//			$body .= "HKID: " . $HTTP_POST_VARS['txtHKID']."<br>";
//			$body .= "Age: " . $HTTP_POST_VARS['age']."<br>";
//			$body .= "Occupation: " . $HTTP_POST_VARS['occupation']."<br>";
//			$body .= "Address: " . $HTTP_POST_VARS['txtAddress']."<br>";
//			$body .= "Medium: " . $HTTP_POST_VARS['medium']."<br>";
//			$body .= "Coupon No: " . $couponno."<br>";

			// $text_body = "The following person has been registered in our web site\n\n";
            //
			// $text_body .= "Offer: " . $aryCourseName[$_POST['course']]."\n";
			// $text_body .= "Name: " . $_POST['txtName']."\n";
			// $text_body .= "HKID: " . $_POST['txtHKID']."\n";
			// $text_body .= "Email: " . $_POST['txtEmail']."\n";
			// $text_body .= "Tel: " . $_POST['txtTel']."\n";
            //
			// $text_body .= "Region: " . $aryArea[$_POST['area']]."\n";
			// $text_body .= "Age Group: " . $aryAge[$_POST['age']]."\n";
			// $text_body .= "Job Category: " . $aryOccupation[$_POST['occupation']]."\n";







	//$from = "dickytam@hksm.com.hk";
	//$from = "info@meg.com.hk";
	//$email = "py@meg.com.hk, barrykui@hksm.com.hk"; // !!! Email receivers
	//$email = "dickytam@hksm.com.hk"; // !!! Email receivers
	//$email = "py@meg.com.hk, py@hksm.com.hk, joyceleung@hksm.com.hk, joyceleung@meg.com.hk, abbeywong@meg.com.hk"; // !!! Email receivers
	//$email = "py@hksm.com.hk, tonysit@hksm.com.hk, tony@meg.com.hk"; // !!! Email receivers
	//$email = "dickytam@hksm.com.hk"; // !!! Matthew 2014-01-23 Email receivers

	// $subject = "HKSM Summer Promotion (summerpromobk)"; // !!! Matthew 2014-01-23 Email subject
	//$subject = "CNY Promotion 2014"; // !!! Matthew 2014-01-23 Email subject

	//$message = $body;
	//$header = "Content-type: text/html; charset=big5\r\nFrom: MEG Limited <$from>\r\n";

	//send PHP mail at this line, mail() return true if suceed else return false
	//$sent = mail($email, $subject, $message, $header); // Matthew 20140422 Email Notification


	// Matthew 20140422 Email Notification Start

		require("../../PHPMailer_5.2.2/class.phpmailer.php");

		$mail = new PHPMailer();

		$mail->IsSMTP();  // telling the class to use SMTP
        $mail->Host = "localhost"; // SMTP servers
        $mail->SMTPAuth = false; // turn on SMTP authentication
        $mail->Username = "smtp@meg.com.hk"; // SMTP username
        $mail->Password = "canonbox448"; // SMTP password
		$mail->Port = "25";
		$mail->CharSet = 'UTF-8';

		$mail->From = "info@meg.com.hk";

		$mail->AddAddress("patrickyeung@meg.com.hk", "PY");
		$mail->AddBCC("tonysit@hksm.com.hk", "Tony");
		$mail->AddBCC("ringowong@hksm.com.hk", "Ringo");

		$mail->Subject = "MEG Promotion";
		$mail->Body = $body;

		$mail->Send();

	// Matthew 20140304 Email Notification End


	// if ($sent){
	// 	//echo "E-mail Sent";
	// } else {
	// 	//echo "Failed";
	// }




	}
	redirectJS("http://www.hksm.com.hk");
?>

