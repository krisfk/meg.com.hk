<?php
//require("class.phpmailer.php");

//$mail = new phpmailer();



//$mail->Subject = "���ߵo�]�D������q"; Reb on 26/04/2007
//$mail->Subject = "Happy Birthday"; 
//$mail->Host     = "smtp1.example.com;smtp2.example.com";

//$mail->Host     = "smtp.hksm.com.hk";
//$mail->Mailer   = "smtp";

// added by Barry for kanotec

//$mail->SMTPAuth = true;
//$mail->Username = 'barrykui';
//$mail->Password = '875371';

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
		<input name="btnSend" type="button" value="Send email" onclick="location.href='sendmail.php?go=1';">	
		</form>
	<?php
}
else {
	$query  = "SELECT name, email, message, card_code, type from ecard_email where email <> '' and sent=0 group by name, email, message, card_code, type order by name desc";
	//$query  = "SELECT name, email, message, card_code, type from ecard_email where email <> '' and email like 'j%' and sent=0 group by name, email, message, card_code";

	$result = @MYSQL_QUERY($query);
	$nosuccess = 0;
	$nofail = 0;
	
	$from = "";
	$header = "";
	$mail_subject = "";
	
	while ($row = mysql_fetch_array ($result))	
	{	
		$tmp_type = $row["type"];
		
		// Reb on 20071219
		if ($tmp_type=='CEO' || $tmp_type=='GMO'){
			$from = "ceo@hksm.com.hk";
			$header = "MIME-Version: 1.0\nContent-type: text/html; charset=big5\r\nFrom: Taurus Leung <$from>\r\n";			
			$mail_subject = "Seasons Greetings";			
			
			//$mail->FromName = "Taurus Leung";
			//$mail->Subject = "Seasons Greetings"; 
			//$mail->From     = "taurus@hksm.com.hk";
		
	    	// HTML body
	    	$body  = "Dear <font size=\"4\">".$row["name"]."</font>, <p>";
	    	$body .= "Wishing you a Merry Christmas and a Happy New Year!<br><br>";
	    	$body .= "Please click the following link and enjoy to view it!<br><br><a href='http://www.meg.hk/ecard2012/getcard.php?batch=1&code=".$row["card_code"]."&tmp_type=".$row["type"];
	    	$body .= "'>http://www.meg.hk/ecard2012/getcard.php?batch=1&code=".$row["card_code"]."&tmp_type=".$row["type"]."<br><br></a>";
			$body .= "<br>Best Regards";
			$body .= "<br>Taurus Leung";
			$body .= "<br>Chief Executive Officer";
			$body .= "<br>The Hong Kong School of Motoring Ltd.<br><br><br>";
			$body .= "<font size=\"1\">If the above link did not open the e-card, please copy and paste the URL to your browser web address bar.<br>";
			$body .= "�Y�A���ઽ���}�� e-card�A�бN�H�W�s���ŶK�b�s���������}�C���C";			
					
		}else{
			$from = "donotreply@meg.hk";
			$header = "MIME-Version: 1.0\nContent-type: text/html; charset=big5\r\nFrom: MEG Limited <$from>\r\n";			
			$mail_subject = "Merry Christmas";				
			
			//$mail->FromName = "HK School of Motoring";
			//$mail->Subject = "Merry Christmas"; 
			//$mail->From     = "info@hksm.com.hk";
		
	    	// HTML body
	    	$body  = "Dear <font size=\"4\">".$row["name"]."</font>, <p>";
	    	//$body .= "The Hong Kong School of Motoring wishes you a Merry Christmas and a Happy New Year!<br><br>";
	    	//$body .= "Please click on the following link to view your ecard!<br>";
	    	//$body .= "<a href='http://www.meg.hk/ecard2012/getcard.php?batch=1&code=".$row["card_code"]."&tmp_type=".$row["type"];
	    	//$body .= "'>http://www.meg.hk/ecard2012/getcard.php?batch=1&code=".$row["card_code"]."&tmp_type=".$row["type"]."</a><br><br><br>";
			//$body .= "<font size=\"1\">If the above link did not open the e-card, please copy and paste the URL to your browser web address bar.<br>";
			//$body .= "�Y�A���ઽ���}�� e-card�A�бN�H�W�s���ŶK�b�s���������}�C���C";
			
			//$body ="";	    	
			$body .= "<html>";
			$body .= "<head>";
			$body .= "<title>Merry Christmas</title>";
			$body .= "<meta forua=\"true\" http-equiv=\"Cache-Control\" content=\"max-age=0\"/>";
			$body .= "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=big5\">";
			$body .= "<style type=\"text/css\">";
			$body .= "<!--";			
			
			$body .= "body {";
			$body .= "	margin-left: 0px;";
			$body .= "	margin-top: 0px;";
			$body .= "	margin-right: 0px;";
			$body .= "	margin-bottom: 0px;";
			$body .= "	background-color: #B0A47D;";
			$body .= "}";
			$body .= ".style3 {";
			$body .= "	font-size: 13px;";
			$body .= "	color: #FFFFFF;";
			$body .= "}";
			$body .= ".style5 {";
			$body .= "	color: #000000;";
			$body .= "	font-size: 13px;";
			$body .= "}";
			$body .= ".style7 {font-size: 13px; color: #333333; }";
			$body .= ".style8 {font-size: 13px; color: #000000; }";
			$body .= ".style9 {";
			$body .= "	font-family: Arial, Helvetica, sans-serif;";
			$body .= "	font-size: 9px;";
			$body .= "}";
			$body .= "-->";
			$body .= "</style>";
				

			$body .= "</head>";
			$body .= "<body bgcolor=\"#FFFFFF\" leftmargin=\"0\" topmargin=\"0\" marginwidth=\"0\" marginheight=\"0\">";
			$body .= "<table id=\"Table_01\" width=\"521\" height=\"771\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">";
			$body .= "<tr><td align=\"center\"><font size=\"2px\">If you cannot read this e-mail properly, please click <a target=\"_blank\" href=\"http://www.meg.hk/ecard2012/xmas.php\" >here</a><font><br>";
			$body .= "<font size=\"2px\">�p�դU����\�����q�l�A��<a target=\"_blank\" href=\"http://www.meg.hk/ecard2012/xmas.php\" >����</a>�C</font><br>&nbsp;</td><tr>";
			$body .= "<tr><td>";
			$body .= "<object classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\" codebase=\"http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0\" width=\"600\" height=\"600\" align=\"middle\">";
   			$body .= "<param name=\"allowScriptAccess\" value=\"sameDomain\" />";
   			$body .= "<param name=\"movie\" value=\"http://www.meg.hk/ecard2012/ecard.swf\" />";
   			$body .= "<param name=\"quality\" value=\"high\" />";
   			$body .= "<param name=\"bgcolor\" value=\"#ffffff\" />";
    		$body .= "<embed src=\"http://www.meg.hk/ecard2012/ecard.swf\" quality=\"high\" bgcolor=\"#ffffff\" width=\"600\" height=\"600\" align=\"middle\" allowScriptAccess=\"sameDomain\" type=\"application/x-shockwave-flash\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" />";
			$body .= "</object>";
			
						
			$body .= "</td></tr>";
			//$body .= "<tr><td align=\"center\"><br><font size=\"2px\">If you do not wish to receive our promotion messages, please click <a href=\"mailto:po@meg.hk\">here</a></font><br>";
			//$body .= "<font size=\"2px\">�p�դU���Q����ڭ̪��ŶǱ��s�q�l�A��<a href=\"mailto:po@meg.hk\">����</a>�C</font></td></tr>";

			$body .= "</table>";

			$body .= "</body>";
			$body .= "</html>";
			
			
			
			
			
			
			
			
		}
		
			
	    //$mail->Body    = $body;
	    //$mail->AltBody = $text_body;
	    //$mail->AddAddress($row["email"], $row["name"]);

	    //$mail->IsHTML(true); 

		$sent = mail(str_ireplace("@meg.hk","@meghk.hk",$row["email"]), $mail_subject, $body, $header);	    
		if (!$sent){		
	    //if(!$mail->Send()) {
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
			
			
			$query = "update ecard_email set sent=0 where email like 'andychan@%'";			
			$result2 = @MYSQL_QUERY($query);				
	    }
	    // Clear all addresses and attachments for next loop

		$from = "";
		$header = "";
		$mail_subject = "";	    
	    //$mail->ClearAddresses();
	    //$mail->ClearAttachments();
        sleep(2);
        
	}
	echo "<br>".$nofail." failure!<br>";
	echo $nosuccess." email sent successfully!";
}
?>