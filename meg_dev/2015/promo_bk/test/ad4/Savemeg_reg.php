<html>
<head>
<title>PDI Course</title><? // !!! Matthew 2014-07-14 Title?>
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



		   	$meg_mysql = mysql_connect("localhost", "meg", "134679as")
	    	or die("Cannot connect to MySQL server.");
			$megdb = mysql_select_db("meg_production", $meg_mysql)
			or die("Cannot open Database.");
			//$result = mysql_query("select * from tb_register_info where formno=".$_POST['txtFormNo']." and email='".$_POST["txtEmail"]."'");
			$result = mysql_query("select * from tb_register_info where formno=".$_POST['txtFormNo']." and telno='".$_POST["txtTel"]."'"); // 2014-09-12 Matthew Duplicated checking

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
	   	$meg_mysql = mysql_connect("localhost", "meg", "134679as")
    	or die("Cannot connect to MySQL server.");
		$leinam_lessondate = mysql_select_db("meg_production", $meg_mysql)
		or die("Cannot open Database.");

		//echo "<br>insert into tb_play_info (gameno, email, name, telno, playdate, hkid, PC) values (".$HTTP_POST_VARS['txtGameno'].", '".$HTTP_POST_VARS["txtEmail"]."','".$HTTP_POST_VARS["txtName"]."','".$HTTP_POST_VARS["txtTel"]."', now() " .",'".$HTTP_POST_VARS["txtHKID"]."','".$HTTP_POST_VARS["chkPC"]."','".$HTTP_POST_VARS["chkLGV"]."','".$HTTP_POST_VARS["chkMC"]."')";
		//exit;

		//mysql_query("insert into tb_register_info (formno, email, name, telno, regdate, hkid, voucher_no, security_code, shop, course) values (".$_POST['txtFormNo'].", '".$_POST["txtEmail"]."','".$_POST["txtName"]."','".$_POST["txtTel"]."', now() " .",'".$_POST["txtHKID"]."','".$_POST["txtVoucherNo"]."','".$_POST["txtSecurityCode"]."','".$_POST["txtShop"]."',".$_POST["course"].")");
		//mysql_query("insert into tb_register_info (formno, email, name, telno, regdate, hkid, voucher_no, security_code, course, name2, voucher_no2) values (".$_POST['txtFormNo'].", '".$_POST["txtEmail"]."','".$_POST["txtName"]."','".$_POST["txtTel"]."', now() " .",'".$_POST["txtHKID"]."','".$_POST["txtVoucherNo"]."','".$_POST["txtSecurityCode"]."',".$_POST["course"].",'".$_POST["txtName2"]."','".$_POST["txtVoucherNo2"]."')");

		mysql_query("SET NAMES 'UTF8'");
		mysql_query("insert into tb_register_info (formno, email, name, telno, regdate, hkid, course, area, age, occupation, security_code) values (".$_POST['txtFormNo'].", '".$_POST["txtEmail"]."','".$_POST["txtName"]."','".$_POST["txtTel"]."', now() " .",'".$_POST["txtHKID"]."',".$_POST["course"].",".$_POST["area"].",".$_POST["age"].",".$_POST["occupation"]
			. ", '" . $_POST["security_code"] . "')" );


		mysql_close($meg_mysql);



   		$aryOccupation = array("", "Management", "Professional", "Teacher", "Civilian", "Workers", "Housewives", "Student", "Self-employed", "Unemployed", "Retired", "Other");
   		$aryArea = array("", "Western and Central", "Eastern HK", "Southern HK", "Wan Chai", "TST/Yaumatei/Mongkok", "Sham Shui Po", "Kowloon City", "Wong Tai Sin", "Kwun Tong", "Kwai Chung & Tsing Yi", "Tsuen Wan", "Yuen Long", "Tuen Mun", "Northern District", "Tai Po", "Shatin", "Sai Kung", "Islands District");
   		$aryAge = array("", "18-25", "26-30", "31-35", "36-40", "40+");
   		$aryCourseName = array("", "1. Private Car", "2. Light Goods Vehicle", "3. Motorcycle", "4. Other courses"); // Matthew 2014-01-23 Course Name


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
	//$from = "info@meg.hk";
	//$email = "py@meg.hk, barrykui@hksm.com.hk"; // !!! Email receivers
	//$email = "dickytam@hksm.com.hk"; // !!! Email receivers
	//$email = "py@meg.hk, py@hksm.com.hk, joyceleung@hksm.com.hk, joyceleung@meg.hk, abbeywong@meg.hk"; // !!! Email receivers
	//$email = "py@hksm.com.hk, tonysit@hksm.com.hk, tony@meg.hk"; // !!! Email receivers
	//$email = "dickytam@hksm.com.hk"; // !!! Matthew 2014-01-23 Email receivers

	// $subject = "HKSM Summer Promotion (summerpromobk)"; // !!! Matthew 2014-01-23 Email subject
	//$subject = "CNY Promotion 2014"; // !!! Matthew 2014-01-23 Email subject

	//$message = $body;
	//$header = "Content-type: text/html; charset=big5\r\nFrom: MEG Limited <$from>\r\n";

	//send PHP mail at this line, mail() return true if suceed else return false
	//$sent = mail($email, $subject, $message, $header); // Matthew 20140422 Email Notification


	require("../../PHPMailer_5.2.2/class.phpmailer.php");

	// Matthew 20140422 Email notification for supervisor Start

		$mail = new PHPMailer();

		$mail->IsSMTP();  // telling the class to use SMTP
        $mail->Host = "localhost"; // SMTP servers
        $mail->SMTPAuth = false; // turn on SMTP authentication
        $mail->Username = "sales@meg.com.hk"; // SMTP username
        $mail->Password = "canonbox448"; // SMTP password
		$mail->Port = "25";

		$mail->SetFrom("info@meg.hk", 'MEG');

		$mail->AddAddress("amandawong@hksm.com.hk", "Amanda");
		$mail->AddBCC("tonysit@hksm.com.hk", "Tony");
		$mail->AddBCC("tony@meg.hk", "Tony");
		$mail->AddBCC("ringo@hksm.com.hk", "Ringo");

		$mail->Subject = "PDI Course"; // !!! Matthew 2014-01-23 Email subject
		$mail->Body = $body;

		$mail->Send();

	// Matthew 20140422 Email notification for supervisor End


	// !!! 2014-09-19 Matthew Email notification for registered user Start

		$mail2 = new PHPMailer();

		$mail2->IsSMTP();  // telling the class to use SMTP
        $mail2->Host = "localhost"; // SMTP servers
        $mail2->SMTPAuth = false; // turn on SMTP authentication
        $mail2->Username = "sales@meg.com.hk"; // SMTP username
        $mail2->Password = "canonbox448"; // SMTP password
		$mail2->Port = "25";

		$mail2->SetFrom("info@meg.hk", 'MEG');

		$mail2->AddAddress($_POST["txtEmail"], $_POST["txtName"]);

		$mail2->Subject = "登記私人駕駛教師執照課程"; // !!! Matthew 2014-01-23 Email subject

		$mail2->Body = ''
. '你好:<br/>'
. '<br/>'
. '我們已經收到你經網頁遞交之資料。<br/>'
. '<br/>'
. '請到以下網址查詢私人駕駛教師執照申請人須知及下載申請表格。<br/>'
. 'http://www.td.gov.hk/tc/public_services/application_for_private_driving_instructors_test/index.html<br/>'
. '<br/>'
. '填妥申請表格後，請於9月24日或以前交往以下地點之收集箱。<br/>'
. '銅鑼灣: 銅鑼灣軒尼詩道 502 號黃金廣場 15 樓 1503 室<br/>'
. '旺角: 旺角彌敦道 610 號荷李活商業中心 10 樓 1023 室<br/>'
. '荃灣: 荃灣青山公路 263 - 267 號力生廣場地下 G8-10 號舖<br/>'
. '元朗: 元朗廣場2樓 266 號舖<br/>'
. '屯門: 屯門港鐵站TUM42號舖<br/>'
. '以上地點之辦公時間為星期一至日11:30 ~ 20:30<br/>'
. '<br/>'
. '深水埗: 深水埗福榮街153號冠奇大廈地下4A舖<br/>'
. '以上地點之辦公時間為星期一至日10:00 ~ 18:30<br/>'
. '<br/>'
. '我們將於運輸署公佈抽籤結果後再個別聯絡申請者。<br/>'
. '<br/>'
. '利南駕駛學校<br/>';
		
		$mail2->Send();

	// !!! 2014-09-19 Matthew Email notification for registered user End


	// if ($sent){
	// 	//echo "E-mail Sent";
	// } else {
	// 	//echo "Failed";
	// }




	}
	redirectJS("http://www.hksm.com.hk");
?>

