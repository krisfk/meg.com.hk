<?php
require("class.phpmailer.php");

$mail = new phpmailer();



//$mail->Subject = "恭喜發財．路路亨通"; Reb on 26/04/2007
//$mail->Subject = "Happy Birthday"; 
//$mail->Host     = "smtp1.example.com;smtp2.example.com";
$mail->Host     = "smtp.hksm.com.hk";
$mail->Mailer   = "smtp";

// added by Barry for kanotec
$mail->SMTPAuth = true;
$mail->Username = 'smail01';
$mail->Password = 'sm13579';

// Start: Reb on 13/12/2006
//@MYSQL_CONNECT("localhost","student","");
//@mysql_select_db("ecard");

// modified by Barry for kanotec
@MYSQL_CONNECT("localhost","meg","134679as");
mysql_query("SET SESSION character_set_results = 'BIG5'");  
@mysql_select_db("meg_production");
//@MYSQL_CONNECT("localhost","root","summer");
//@mysql_select_db("hksm_production");
// End: Reb on 13/12/2006

echo "<b>Email subject: ".$mail->Subject."<br><br></b>";
//if ($HTTP_GET_VARS['go'] != "1") {
if ($_GET["go"] != "1") {	
		// Start: Reb on 13/12/2006
		$query  = "SELECT count(*) FROM ecard_email where email <> '' and sent=0";
		// End: Reb on 13/12/2006
		$result = @MYSQL_QUERY($query);
		if ($row = mysql_fetch_array ($result))
			echo "No of unsent email: ".$row[0];
	?>
		<form name="frmMain" method="POST">
		<input name="btnSend" type="button" value="Send email" onclick="location.href='sendmail_1.php?go=1';">	
		</form>
	<?php
}
else {
	$query  = "SELECT name, email, message, card_code, type from ecard_email where email <> '' and sent=0 group by name, email, message, card_code order by name desc";
	//$query  = "SELECT name, email, message, card_code, type from ecard_email where email <> '' and email like 'j%' and sent=0 group by name, email, message, card_code";

	$result = @MYSQL_QUERY($query);
	$nosuccess = 0;
	$nofail = 0;
	
	while ($row = mysql_fetch_array ($result))	
	{	
		$tmp_type = $row["type"];
		
		// Reb on 20071219
		if ($tmp_type=='CEO' || $tmp_type=='GMO'){
			$mail->FromName = "MEG Limited";
			$mail->Subject = "Motorcycle Promotion"; 
			$mail->From     = "donotreply@meg.hk";
		
	    	// HTML body
$body ="";	    	
$body .= "<html>";
$body .= "<head>";
$body .= "<title>MEG Limited</title>";
$body .= "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=uft-8\">";
$body .= "</head>";
$body .= "<body bgcolor=\"#FFFFFF\" leftmargin=\"0\" topmargin=\"0\" marginwidth=\"0\" marginheight=\"0\">";

$body .= "Dear <font size=\"4\">".$row["name"]."</font>, <p>";
$body .= "<p><hr /><p>&nbsp;</p>If the image is not showing, please click <a target=\"_blank\" href=\"http://64.37.57.130/~tccom/market/lt.php?id=K0pTWwhSVlJPB0kCAV4KBgE%3D\" >HERE</a><br />";
$body .= "<table id=\"Table_01\" width=\"1001\" height=\"1420\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">";
$body .= "<tr>";
$body .= "<td colspan=\"13\">";
$body .= "<a href=\"http://www.meg.hk\" target=\"_blank\"><img src=\"http://www.meg.hk/images/1000_MC_01.jpg\" width=\"1000\" height=\"1120\" alt=\"\"></a></td>";
$body .= "<td>";
$body .= "<img src=\"http://www.meg.hk/images/spacer.gif\" width=\"1\" height=\"1120\" alt=\"\"></td>";
$body .= "</tr>";
// $body .= "<tr>";
// $body .= "<td colspan=\"2\" rowspan=\"4\">";
// $body .= "<img src=\"http://www.meg.hk/images/1000_MC_02.jpg\" width=\"56\" height=\"237\" alt=\"\"></td>";
// $body .= "<td rowspan=\"3\" align=\"left\" valign=\"top\">";
// $body .= "<a href=\"http://www.meg.hk\" target=\"_blank\"><img src=\"http://www.meg.hk/images/1000_MC_03.jpg\" alt=\"\" width=\"197\" height=\"197\" border=\"0\"></a></td>";
// $body .= "<td colspan=\"10\">";
// $body .= "<img src=\"http://www.meg.hk/images/1000_MC_04.jpg\" width=\"747\" height=\"26\" alt=\"\"></td>";
// $body .= "<td>";
// $body .= "<img src=\"http://www.meg.hk/images/spacer.gif\" width=\"1\" height=\"26\" alt=\"\"></td>";
// $body .= "</tr>";
// $body .= "<tr>";
// $body .= "<td rowspan=\"3\">";
// $body .= "<img src=\"http://www.meg.hk/images/1000_MC_05.jpg\" width=\"15\" height=\"211\" alt=\"\"></td>";
// $body .= "<td colspan=\"5\" align=\"left\" valign=\"top\">";
// $body .= "<a href=\"http://www.meg.hk/mc\" target=\"_blank\"><img src=\"http://www.meg.hk/images/1000_MC_06.jpg\" alt=\"\" width=\"391\" height=\"59\" border=\"0\"></a></td>";
// $body .= "<td colspan=\"4\" rowspan=\"4\">";
// $body .= "<img src=\"http://www.meg.hk/images/1000_MC_07.jpg\" width=\"341\" height=\"227\" alt=\"\"></td>";
// $body .= "<td>";
// $body .= "<img src=\"http://www.meg.hk/images/spacer.gif\" width=\"1\" height=\"59\" alt=\"\"></td>";
// $body .= "</tr>";
// $body .= "<tr>";
// $body .= "<td colspan=\"5\" rowspan=\"2\">";
// $body .= "<img src=\"http://www.meg.hk/images/1000_MC_08.jpg\" width=\"391\" height=\"152\" alt=\"\"></td>";
// $body .= "<td>";
// $body .= "<img src=\"http://www.meg.hk/images/spacer.gif\" width=\"1\" height=\"112\" alt=\"\"></td>";
// $body .= "</tr>";
// $body .= "<tr>";
// $body .= "<td>";
// $body .= "<img src=\"http://www.meg.hk/images/1000_MC_09.jpg\" width=\"197\" height=\"40\" alt=\"\"></td>";
// $body .= "<td>";
// $body .= "<img src=\"http://www.meg.hk/images/spacer.gif\" width=\"1\" height=\"40\" alt=\"\"></td>";
// $body .= "</tr>";
// $body .= "<tr>";
// $body .= "<td rowspan=\"5\">";
// $body .= "<img src=\"http://www.meg.hk/images/1000_MC_10.jpg\" width=\"45\" height=\"62\" alt=\"\"></td>";
// $body .= "<td colspan=\"4\" rowspan=\"4\" align=\"left\" valign=\"top\">";
// $body .= "<a href=\"http://www.hksm.com.hk\" target=\"_blank\"><img src=\"http://www.meg.hk/images/1000_MC_11.jpg\" alt=\"\" width=\"323\" height=\"56\" border=\"0\"></a></td>";
// $body .= "<td colspan=\"4\">";
// $body .= "<img src=\"http://www.meg.hk/images/1000_MC_12.jpg\" width=\"291\" height=\"16\" alt=\"\"></td>";
// $body .= "<td>";
// $body .= "<img src=\"http://www.meg.hk/images/spacer.gif\" width=\"1\" height=\"16\" alt=\"\"></td>";
// $body .= "</tr>";
// $body .= "<tr>";
// $body .= "<td colspan=\"3\">";
// $body .= "<img src=\"http://www.meg.hk/images/1000_MC_13.jpg\" width=\"240\" height=\"8\" alt=\"\"></td>";
// $body .= "<td colspan=\"2\" rowspan=\"3\" align=\"left\" valign=\"top\">";
// $body .= "<a href=\"http://itunes.apple.com/hk/app/meg/id416072313?mt=8\" target=\"_blank\"><img src=\"http://www.meg.hk/images/1000_MC_14.jpg\" alt=\"\" width=\"156\" height=\"40\" border=\"0\"></a></td>";
// $body .= "<td rowspan=\"4\">";
// $body .= "<img src=\"http://www.meg.hk/images/1000_MC_15.jpg\" width=\"37\" height=\"46\" alt=\"\"></td>";
// $body .= "<td rowspan=\"2\" align=\"left\" valign=\"top\">";
// $body .= "<a href=\"http://www.facebook.com/meglimited\" target=\"_blank\"><img src=\"http://www.meg.hk/images/1000_MC_16.jpg\" alt=\"\" width=\"160\" height=\"38\" border=\"0\"></a></td>";
// $body .= "<td rowspan=\"4\">";
// $body .= "<img src=\"http://www.meg.hk/images/1000_MC_17.jpg\" width=\"39\" height=\"46\" alt=\"\"></td>";
// $body .= "<td>";
// $body .= "<img src=\"http://www.meg.hk/images/spacer.gif\" width=\"1\" height=\"8\" alt=\"\"></td>";
// $body .= "</tr>";
// $body .= "<tr>";
// $body .= "<td rowspan=\"3\">";
// $body .= "<img src=\"http://www.meg.hk/images/1000_MC_18.jpg\" width=\"40\" height=\"38\" alt=\"\"></td>";
// $body .= "<td rowspan=\"2\" align=\"left\" valign=\"top\">";
// $body .= "<a href=\"http://www.meg.hk\" target=\"_blank\"><img src=\"http://www.meg.hk/images/1000_MC_19.jpg\" alt=\"\" width=\"155\" height=\"32\" border=\"0\"></a></td>";
// $body .= "<td rowspan=\"3\">";
// $body .= "<img src=\"http://www.meg.hk/images/1000_MC_20.jpg\" width=\"45\" height=\"38\" alt=\"\"></td>";
// $body .= "<td>";
// $body .= "<img src=\"http://www.meg.hk/images/spacer.gif\" width=\"1\" height=\"30\" alt=\"\"></td>";
// $body .= "</tr>";
// $body .= "<tr>";
// $body .= "<td rowspan=\"2\">";
// $body .= "<img src=\"http://www.meg.hk/images/1000_MC_21.jpg\" width=\"160\" height=\"8\" alt=\"\"></td>";
// $body .= "<td>";
// $body .= "<img src=\"http://www.meg.hk/images/spacer.gif\" width=\"1\" height=\"2\" alt=\"\"></td>";
// $body .= "</tr>";
// $body .= "<tr>";
// $body .= "<td colspan=\"4\">";
// $body .= "<img src=\"http://www.meg.hk/images/1000_MC_22.jpg\" width=\"323\" height=\"6\" alt=\"\"></td>";
// $body .= "<td>";
// $body .= "<img src=\"http://www.meg.hk/images/1000_MC_23.jpg\" width=\"155\" height=\"6\" alt=\"\"></td>";
// $body .= "<td colspan=\"2\">";
// $body .= "<img src=\"http://www.meg.hk/images/1000_MC_24.jpg\" width=\"156\" height=\"6\" alt=\"\"></td>";
// $body .= "<td>";
// $body .= "<img src=\"http://www.meg.hk/images/spacer.gif\" width=\"1\" height=\"6\" alt=\"\"></td>";
// $body .= "</tr>";
// $body .= "<tr>";
// $body .= "<td>";
// $body .= "<img src=\"http://www.meg.hk/images/spacer.gif\" width=\"45\" height=\"1\" alt=\"\"></td>";
// $body .= "<td>";
// $body .= "<img src=\"http://www.meg.hk/images/spacer.gif\" width=\"11\" height=\"1\" alt=\"\"></td>";
// $body .= "<td>";
// $body .= "<img src=\"http://www.meg.hk/images/spacer.gif\" width=\"197\" height=\"1\" alt=\"\"></td>";
// $body .= "<td>";
// $body .= "<img src=\"http://www.meg.hk/images/spacer.gif\" width=\"15\" height=\"1\" alt=\"\"></td>";
// $body .= "<td>";
// $body .= "<img src=\"http://www.meg.hk/images/spacer.gif\" width=\"100\" height=\"1\" alt=\"\"></td>";
// $body .= "<td>";
// $body .= "<img src=\"http://www.meg.hk/images/spacer.gif\" width=\"40\" height=\"1\" alt=\"\"></td>";
// $body .= "<td>";
// $body .= "<img src=\"http://www.meg.hk/images/spacer.gif\" width=\"155\" height=\"1\" alt=\"\"></td>";
// $body .= "<td>";
// $body .= "<img src=\"http://www.meg.hk/images/spacer.gif\" width=\"45\" height=\"1\" alt=\"\"></td>";
// $body .= "<td>";
// $body .= "<img src=\"http://www.meg.hk/images/spacer.gif\" width=\"51\" height=\"1\" alt=\"\"></td>";
// $body .= "<td>";
// $body .= "<img src=\"http://www.meg.hk/images/spacer.gif\" width=\"105\" height=\"1\" alt=\"\"></td>";
// $body .= "<td>";
// $body .= "<img src=\"http://www.meg.hk/images/spacer.gif\" width=\"37\" height=\"1\" alt=\"\"></td>";
// $body .= "<td>";
// $body .= "<img src=\"http://www.meg.hk/images/spacer.gif\" width=\"160\" height=\"1\" alt=\"\"></td>";
// $body .= "<td>";
// $body .= "<img src=\"http://www.meg.hk/images/spacer.gif\" width=\"39\" height=\"1\" alt=\"\"></td>";
// $body .= "<td></td>";
// $body .= "</tr>";
$body .= "</table>";
$body .= "</body>";
$body .= "</html>";

	    	
	   					
			// Plain text body (for mail clients that cannot read HTML)
	    	$text_body  = "Dear ".$row["name"].",\n\n";
	    	$text_body .= "Wishing you a Merry Christmas and a Happy New Year!<br><br>";
	    	$text_body .= "Please click the following link and enjoy to view it!<br><br>http://www.hksm.com.hk/ecard201012a/getcard.php?batch=1&code=".$row["card_code"]."&tmp_type=".$row["type"];
			$text_body .= "<br>Best Regards";
			$text_body .= "<br>Taurus Leung";
			$text_body .= "<br>Chief Executive Officer";
			$text_body .= "<br>The Hong Kong School of Motoring Ltd.<br><br><br>";
			$text_body .= "<font size=\"1\">If the above link did not open the e-card, please copy and paste the URL to your browser web address bar.<br>";
			$text_body .= "若你未能直接開啟 e-card，請將以上連結剪貼在瀏覽器的網址列內。";			
		}else{
			$mail->FromName = "MEG Limited";
			$mail->Subject = "Motoring Group Purchase Registration"; 
			$mail->From     = "donotreply@meg.hk";
		
	    	// HTML body
$body ="";	    	
$body .= "<html>";
$body .= "<head>";
$body .= "<title>MEG Limited</title>";
$body .= "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
$body .= "</head>";
$body .= "<body bgcolor=\"#FFFFFF\" leftmargin=\"0\" topmargin=\"0\" marginwidth=\"0\" marginheight=\"0\">";
$body .= "Dear <font size=\"4\">".$row["name"]."</font>, <p>";
$body .= "<p><hr /><p>&nbsp;</p>If the image is not showing, please click <a target=\"_blank\" href=\"http://64.37.57.130/~tccom/market/lt.php?id=K0pTWwhSVlJPB0kCAV4KBgE%3D\" >HERE</a><br />";
$body .= "<table id=\"Table_01\" width=\"1001\" height=\"1420\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">";
$body .= "<tr>";
$body .= "<td colspan=\"13\">";
$body .= "<a href=\"http://www.meg.hk\" target=\"_blank\"><img src=\"http://www.meg.hk/images/1000_MC_01.jpg\" width=\"1000\" height=\"1120\" alt=\"\"></a></td>";
$body .= "<td>";
$body .= "<img src=\"http://www.meg.hk/images/spacer.gif\" width=\"1\" height=\"1120\" alt=\"\"></td>";
$body .= "</tr>";
// $body .= "<tr>";
// $body .= "<td colspan=\"2\" rowspan=\"4\">";
// $body .= "<img src=\"http://www.meg.hk/images/1000_MC_02.jpg\" width=\"56\" height=\"237\" alt=\"\"></td>";
// $body .= "<td rowspan=\"3\" align=\"left\" valign=\"top\">";
// $body .= "<a href=\"http://www.meg.hk\" target=\"_blank\"><img src=\"http://www.meg.hk/images/1000_MC_03.jpg\" alt=\"\" width=\"197\" height=\"197\" border=\"0\"></a></td>";
// $body .= "<td colspan=\"10\">";
// $body .= "<img src=\"http://www.meg.hk/images/1000_MC_04.jpg\" width=\"747\" height=\"26\" alt=\"\"></td>";
// $body .= "<td>";
// $body .= "<img src=\"http://www.meg.hk/images/spacer.gif\" width=\"1\" height=\"26\" alt=\"\"></td>";
// $body .= "</tr>";
// $body .= "<tr>";
// $body .= "<td rowspan=\"3\">";
// $body .= "<img src=\"http://www.meg.hk/images/1000_MC_05.jpg\" width=\"15\" height=\"211\" alt=\"\"></td>";
// $body .= "<td colspan=\"5\" align=\"left\" valign=\"top\">";
// $body .= "<a href=\"http://www.meg.hk/mc\" target=\"_blank\"><img src=\"http://www.meg.hk/images/1000_MC_06.jpg\" alt=\"\" width=\"391\" height=\"59\" border=\"0\"></a></td>";
// $body .= "<td colspan=\"4\" rowspan=\"4\">";
// $body .= "<img src=\"http://www.meg.hk/images/1000_MC_07.jpg\" width=\"341\" height=\"227\" alt=\"\"></td>";
// $body .= "<td>";
// $body .= "<img src=\"http://www.meg.hk/images/spacer.gif\" width=\"1\" height=\"59\" alt=\"\"></td>";
// $body .= "</tr>";
// $body .= "<tr>";
// $body .= "<td colspan=\"5\" rowspan=\"2\">";
// $body .= "<img src=\"http://www.meg.hk/images/1000_MC_08.jpg\" width=\"391\" height=\"152\" alt=\"\"></td>";
// $body .= "<td>";
// $body .= "<img src=\"http://www.meg.hk/images/spacer.gif\" width=\"1\" height=\"112\" alt=\"\"></td>";
// $body .= "</tr>";
// $body .= "<tr>";
// $body .= "<td>";
// $body .= "<img src=\"http://www.meg.hk/images/1000_MC_09.jpg\" width=\"197\" height=\"40\" alt=\"\"></td>";
// $body .= "<td>";
// $body .= "<img src=\"http://www.meg.hk/images/spacer.gif\" width=\"1\" height=\"40\" alt=\"\"></td>";
// $body .= "</tr>";
// $body .= "<tr>";
// $body .= "<td rowspan=\"5\">";
// $body .= "<img src=\"http://www.meg.hk/images/1000_MC_10.jpg\" width=\"45\" height=\"62\" alt=\"\"></td>";
// $body .= "<td colspan=\"4\" rowspan=\"4\" align=\"left\" valign=\"top\">";
// $body .= "<a href=\"http://www.hksm.com.hk\" target=\"_blank\"><img src=\"http://www.meg.hk/images/1000_MC_11.jpg\" alt=\"\" width=\"323\" height=\"56\" border=\"0\"></a></td>";
// $body .= "<td colspan=\"4\">";
// $body .= "<img src=\"http://www.meg.hk/images/1000_MC_12.jpg\" width=\"291\" height=\"16\" alt=\"\"></td>";
// $body .= "<td>";
// $body .= "<img src=\"http://www.meg.hk/images/spacer.gif\" width=\"1\" height=\"16\" alt=\"\"></td>";
// $body .= "</tr>";
// $body .= "<tr>";
// $body .= "<td colspan=\"3\">";
// $body .= "<img src=\"http://www.meg.hk/images/1000_MC_13.jpg\" width=\"240\" height=\"8\" alt=\"\"></td>";
// $body .= "<td colspan=\"2\" rowspan=\"3\" align=\"left\" valign=\"top\">";
// $body .= "<a href=\"http://itunes.apple.com/hk/app/meg/id416072313?mt=8\" target=\"_blank\"><img src=\"http://www.meg.hk/images/1000_MC_14.jpg\" alt=\"\" width=\"156\" height=\"40\" border=\"0\"></a></td>";
// $body .= "<td rowspan=\"4\">";
// $body .= "<img src=\"http://www.meg.hk/images/1000_MC_15.jpg\" width=\"37\" height=\"46\" alt=\"\"></td>";
// $body .= "<td rowspan=\"2\" align=\"left\" valign=\"top\">";
// $body .= "<a href=\"http://www.facebook.com/meglimited\" target=\"_blank\"><img src=\"http://www.meg.hk/images/1000_MC_16.jpg\" alt=\"\" width=\"160\" height=\"38\" border=\"0\"></a></td>";
// $body .= "<td rowspan=\"4\">";
// $body .= "<img src=\"http://www.meg.hk/images/1000_MC_17.jpg\" width=\"39\" height=\"46\" alt=\"\"></td>";
// $body .= "<td>";
// $body .= "<img src=\"http://www.meg.hk/images/spacer.gif\" width=\"1\" height=\"8\" alt=\"\"></td>";
// $body .= "</tr>";
// $body .= "<tr>";
// $body .= "<td rowspan=\"3\">";
// $body .= "<img src=\"http://www.meg.hk/images/1000_MC_18.jpg\" width=\"40\" height=\"38\" alt=\"\"></td>";
// $body .= "<td rowspan=\"2\" align=\"left\" valign=\"top\">";
// $body .= "<a href=\"http://www.meg.hk\" target=\"_blank\"><img src=\"http://www.meg.hk/images/1000_MC_19.jpg\" alt=\"\" width=\"155\" height=\"32\" border=\"0\"></a></td>";
// $body .= "<td rowspan=\"3\">";
// $body .= "<img src=\"http://www.meg.hk/images/1000_MC_20.jpg\" width=\"45\" height=\"38\" alt=\"\"></td>";
// $body .= "<td>";
// $body .= "<img src=\"http://www.meg.hk/images/spacer.gif\" width=\"1\" height=\"30\" alt=\"\"></td>";
// $body .= "</tr>";
// $body .= "<tr>";
// $body .= "<td rowspan=\"2\">";
// $body .= "<img src=\"http://www.meg.hk/images/1000_MC_21.jpg\" width=\"160\" height=\"8\" alt=\"\"></td>";
// $body .= "<td>";
// $body .= "<img src=\"http://www.meg.hk/images/spacer.gif\" width=\"1\" height=\"2\" alt=\"\"></td>";
// $body .= "</tr>";
// $body .= "<tr>";
// $body .= "<td colspan=\"4\">";
// $body .= "<img src=\"http://www.meg.hk/images/1000_MC_22.jpg\" width=\"323\" height=\"6\" alt=\"\"></td>";
// $body .= "<td>";
// $body .= "<img src=\"http://www.meg.hk/images/1000_MC_23.jpg\" width=\"155\" height=\"6\" alt=\"\"></td>";
// $body .= "<td colspan=\"2\">";
// $body .= "<img src=\"http://www.meg.hk/images/1000_MC_24.jpg\" width=\"156\" height=\"6\" alt=\"\"></td>";
// $body .= "<td>";
// $body .= "<img src=\"http://www.meg.hk/images/spacer.gif\" width=\"1\" height=\"6\" alt=\"\"></td>";
// $body .= "</tr>";
// $body .= "<tr>";
// $body .= "<td>";
// $body .= "<img src=\"http://www.meg.hk/images/spacer.gif\" width=\"45\" height=\"1\" alt=\"\"></td>";
// $body .= "<td>";
// $body .= "<img src=\"http://www.meg.hk/images/spacer.gif\" width=\"11\" height=\"1\" alt=\"\"></td>";
// $body .= "<td>";
// $body .= "<img src=\"http://www.meg.hk/images/spacer.gif\" width=\"197\" height=\"1\" alt=\"\"></td>";
// $body .= "<td>";
// $body .= "<img src=\"http://www.meg.hk/images/spacer.gif\" width=\"15\" height=\"1\" alt=\"\"></td>";
// $body .= "<td>";
// $body .= "<img src=\"http://www.meg.hk/images/spacer.gif\" width=\"100\" height=\"1\" alt=\"\"></td>";
// $body .= "<td>";
// $body .= "<img src=\"http://www.meg.hk/images/spacer.gif\" width=\"40\" height=\"1\" alt=\"\"></td>";
// $body .= "<td>";
// $body .= "<img src=\"http://www.meg.hk/images/spacer.gif\" width=\"155\" height=\"1\" alt=\"\"></td>";
// $body .= "<td>";
// $body .= "<img src=\"http://www.meg.hk/images/spacer.gif\" width=\"45\" height=\"1\" alt=\"\"></td>";
// $body .= "<td>";
// $body .= "<img src=\"http://www.meg.hk/images/spacer.gif\" width=\"51\" height=\"1\" alt=\"\"></td>";
// $body .= "<td>";
// $body .= "<img src=\"http://www.meg.hk/images/spacer.gif\" width=\"105\" height=\"1\" alt=\"\"></td>";
// $body .= "<td>";
// $body .= "<img src=\"http://www.meg.hk/images/spacer.gif\" width=\"37\" height=\"1\" alt=\"\"></td>";
// $body .= "<td>";
// $body .= "<img src=\"http://www.meg.hk/images/spacer.gif\" width=\"160\" height=\"1\" alt=\"\"></td>";
// $body .= "<td>";
// $body .= "<img src=\"http://www.meg.hk/images/spacer.gif\" width=\"39\" height=\"1\" alt=\"\"></td>";
// $body .= "<td></td>";
// $body .= "</tr>";
$body .= "</table>";
$body .= "</body>";
$body .= "</html>";

   	
			
			// Plain text body (for mail clients that cannot read HTML)
	    	//$text_body  = "親愛的 ".$row["name"]."\n";
	    	$text_body  = "Dear ".$row["name"].",\n\n";
	    	//$text_body .= "祝你聖誕快樂，新年進步！<br>";
	    	//$text_body .= "請即按 http://www.hksm.com.hk/ecard200712/getcard.php?batch=1&code=".$row["card_code"]."&tmp_type=".$row["type"];
	    	//$text_body .= " 提取心意卡<br><br><br><br>";
	    	$text_body .= "The Hong Kong School of Motoring wishes you a Merry Christmas and a Happy New Year!<br><br>";
	    	$text_body .= "Please click on the following link to view your ecard!<!<br>http://www.hksm.com.hk/ecard201012a/getcard.php?batch=1&code=".$row["card_code"]."&tmp_type=".$row["type"] . "<br><br><br>";
			//$text_body .= "The Hong Kong School of Motoring Ltd.<br>";
			//$text_body .= "香港駕駛學院<br><br><br>";
			$text_body .= "<font size=\"1\">If the above link did not open the e-card, please copy and paste the URL to your browser web address bar.<br>";
			$text_body .= "若你未能直接開啟 e-card，請將以上連結剪貼在瀏覽器的網址列內。";
		}
		
			
	    $mail->Body    = $body;
	    $mail->AltBody = $text_body;
	    $mail->AddAddress($row["email"], $row["name"]);

	    $mail->IsHTML(true); 
	     
	    if(!$mail->Send()) {
	        echo "There has been a mail error sending to " . $row["email"] . "<br>";
	        $nofail += 1;   	
	        
	        $query  = "update ecard_email set sent=-1 where email = '".$row["email"]."'";
	        
	        
	        // 20071127 Reb: add GMO
			if (($row["type"] == 'CEO') || ($row["type"] == 'GMO')){
				$query  = "update ecard_email set sent=-10 where email = '".$row["email"]."'";
			}
			else {
				if ($row["type"] == 'ISD'){
					$query  = "update ecard_email set sent=-99 where email = '".$row["email"]."'";
				} else if ($row["type"] == 'CCD'){
					$query  = "update ecard_email set sent=-88 where email = '".$row["email"]."'";
				} else {
					$query  = "update ecard_email set sent=-1 where email = '".$row["email"]."'";
				}
			}
							
			// End: Reb on 13/12/2006
			$result2 = @MYSQL_QUERY($query);
	    } else {
		    // Start: Reb on 10/02/2007
			$nosuccess += 1;	    
			
			$query = "update ecard_email set sent=1 where email = '".$row["email"]."'";
			
			
			// 20071127 Reb: add GMO
			if (($row["type"] == 'CEO') || ($row["type"] == 'GMO')){
				$query = "update ecard_email set sent=10 where email = '".$row["email"]."'";
			} else {	    
				if ($row["type"] == 'ISD'){
					$query = "update ecard_email set sent=99 where email = '".$row["email"]."'";
				} else if ($row["type"] == 'CCD'){
					$query = "update ecard_email set sent=88 where email = '".$row["email"]."'";
				} else {
					$query = "update ecard_email set sent=1 where email = '".$row["email"]."'";
				}
			}			
			
			
			// End: Reb on 10/02/2007
			$result2 = @MYSQL_QUERY($query);	
	    }
	    // Clear all addresses and attachments for next loop
	    $mail->ClearAddresses();
	    $mail->ClearAttachments();
	}
	echo "<br>".$nofail." failure!<br>";
	echo $nosuccess." email sent successfully!";
}
?>