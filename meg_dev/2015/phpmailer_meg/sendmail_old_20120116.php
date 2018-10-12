<?php
//require("class.phpmailer.php");

//$mail = new phpmailer();



//$mail->Subject = "恭喜發財．路路亨通"; Reb on 26/04/2007
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
		<input name="btnSend" type="button" value="Send email" onclick="location.href='sendmail_old.php?go=1';">	
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
			$from = "taurus@hksm.com.hk";
			$header = "MIME-Version: 1.0\nContent-type: text/html; charset=big5\r\nFrom: Taurus Leung <$from>\r\n";			
			$mail_subject = "Seasons Greetings";			
			
			//$mail->FromName = "Taurus Leung";
			//$mail->Subject = "Seasons Greetings"; 
			//$mail->From     = "taurus@hksm.com.hk";
		
	    	// HTML body
	    	$body  = "Dear <font size=\"4\">".$row["name"]."</font>, <p>";
	    	$body .= "Wishing you a Merry Christmas and a Happy New Year!<br><br>";
	    	$body .= "Please click the following link and enjoy to view it!<br><br><a href='http://www.meg.hk/ecard201112/getcard.php?batch=1&code=".$row["card_code"]."&tmp_type=".$row["type"];
	    	$body .= "'>http://www.meg.hk/ecard201112/getcard.php?batch=1&code=".$row["card_code"]."&tmp_type=".$row["type"]."<br><br></a>";
			$body .= "<br>Best Regards";
			$body .= "<br>Taurus Leung";
			$body .= "<br>Chief Executive Officer";
			$body .= "<br>The Hong Kong School of Motoring Ltd.<br><br><br>";
			$body .= "<font size=\"1\">If the above link did not open the e-card, please copy and paste the URL to your browser web address bar.<br>";
			$body .= "若你未能直接開啟 e-card，請將以上連結剪貼在瀏覽器的網址列內。";			
			
			// Plain text body (for mail clients that cannot read HTML)
	    	$text_body  = "Dear ".$row["name"].",\n\n";
	    	$text_body .= "Wishing you a Merry Christmas and a Happy New Year!<br><br>";
	    	$text_body .= "Please click the following link and enjoy to view it!<br><br>http://www.meg.hk/ecard201112/getcard.php?batch=1&code=".$row["card_code"]."&tmp_type=".$row["type"];
			$text_body .= "<br>Best Regards";
			$text_body .= "<br>Taurus Leung";
			$text_body .= "<br>Chief Executive Officer";
			$text_body .= "<br>The Hong Kong School of Motoring Ltd.<br><br><br>";
			$text_body .= "<font size=\"1\">If the above link did not open the e-card, please copy and paste the URL to your browser web address bar.<br>";
			$text_body .= "若你未能直接開啟 e-card，請將以上連結剪貼在瀏覽器的網址列內。";			
		}else{
			$from = "donotreply@meg.hk";
			$header = "MIME-Version: 1.0\nContent-type: text/html; charset=big5\r\nFrom: MEG Limited <$from>\r\n";			
			$mail_subject = "Merry Christmas";				
			
			//$mail->FromName = "HK School of Motoring";
			//$mail->Subject = "Merry Christmas"; 
			//$mail->From     = "info@hksm.com.hk";
		
	    	// HTML body
	    	//$body  = "親愛的 <font size=\"4\">".$row["name"]."</font><br>";
	    	$body  = "Dear <font size=\"4\">".$row["name"]."</font>, <p>";
	    	//$body .= "祝你聖誕快樂，新年進步！<br>";
	    	//$body .= "請即按 <a href='http://www.hksm.com.hk/ecard200712/getcard.php?batch=1&code=".$row["card_code"]."&tmp_type=".$row["type"];
	    	//$body .= "'>http://www.hksm.com.hk/ecard200712/getcard.php?batch=1&code=".$row["card_code"]."</a>";
	    	//$body .= " 提取心意卡<br><br><br>";
	    	$body .= "The Hong Kong School of Motoring wishes you a Merry Christmas and a Happy New Year!<br><br>";
	    	$body .= "Please click on the following link to view your ecard!<br>";
	    	//$body .= "<a href='http://www.meg.hk/ecard201112/getcard.php?batch=1&code=".$row["card_code"]."&tmp_type=".$row["type"];
	    	//$body .= "'>http://www.meg.hk/ecard201112/getcard.php?batch=1&code=".$row["card_code"]."&tmp_type=".$row["type"]."</a><br><br><br>";
	    	$body .= "<a href='http://www.meg.hk/ecard201112/xmas.php";
	    	$body .= "'>http://www.meg.hk/ecard201112/xmas.php</a><br><br><br>";
	    	
			//$body .= "The Hong Kong School of Motoring Ltd.<br>";
			//$body .= "香港駕駛學院<br><br><br>";
			$body .= "<font size=\"1\">If the above link did not open the e-card, please copy and paste the URL to your browser web address bar.<br>";
			$body .= "若你未能直接開啟 e-card，請將以上連結剪貼在瀏覽器的網址列內。";
			
			// Plain text body (for mail clients that cannot read HTML)
	    	//$text_body  = "親愛的 ".$row["name"]."\n";
	    	$text_body  = "Dear ".$row["name"].",\n\n";
	    	//$text_body .= "祝你聖誕快樂，新年進步！<br>";
	    	//$text_body .= "請即按 http://www.hksm.com.hk/ecard200712/getcard.php?batch=1&code=".$row["card_code"]."&tmp_type=".$row["type"];
	    	//$text_body .= " 提取心意卡<br><br><br><br>";
	    	$text_body .= "The Hong Kong School of Motoring wishes you a Merry Christmas and a Happy New Year!<br><br>";
	    	$text_body .= "Please click on the following link to view your ecard!<!<br>http://www.meg.hk/ecard201112/getcard.php?batch=1&code=".$row["card_code"]."&tmp_type=".$row["type"] . "<br><br><br>";
			//$text_body .= "The Hong Kong School of Motoring Ltd.<br>";
			//$text_body .= "香港駕駛學院<br><br><br>";
			$text_body .= "<font size=\"1\">If the above link did not open the e-card, please copy and paste the URL to your browser web address bar.<br>";
			$text_body .= "若你未能直接開啟 e-card，請將以上連結剪貼在瀏覽器的網址列內。";
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
			
			$query = "update ecard_email set sent=0 where email like 'barrykui@%' or email like 'lyw_joyce%' or email like 'joyceleung@meg%'";			
			$result2 = @MYSQL_QUERY($query);				
	    }
	    // Clear all addresses and attachments for next loop

		$from = "";
		$header = "";
		$mail_subject = "";	    
	    //$mail->ClearAddresses();
	    //$mail->ClearAttachments();
	}
	echo "<br>".$nofail." failure!<br>";
	echo $nosuccess." email sent successfully!";
}
?>