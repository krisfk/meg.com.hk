<?php

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
			
		
		}else{
			//$from = "donotreply@hksm.com.hk";
			//$header = "MIME-Version: 1.0\nContent-type: text/html; charset=big5\r\nFrom: HK School of Motoring <$from>\r\n";			
			$from = "donotreply@meg.hk";
			$header = "MIME-Version: 1.0\nContent-type: text/html; charset=big5\r\nFrom: HK School of Motoring <$from>\r\n";			
			
			$mail_subject = "安全駕駛中心新春開放時間 Road Safety Centres Special Service Hours during Chinese New Year";				
	
	    	//$body  = "Dear <font size=\"4\">".$row["name"]."</font>, <p>";
	    	
	    	$body = "香港駕駛學院3間安全駕駛中心將於將於1月22至24日全日休息。<br>詳情請瀏覽<a href=\"http://www.hksm.com.hk\">www.hksm.com.hk</a><br>祝新年進步！<br><br>";
	    	$body .= "The 3 Road Safety Centres of Hong Kong School of Motoring will be closed on 22-24 Jan. <br>Please click <a href=\"http://www.hksm.com.hk\">www.hksm.com.hk</a> for details. <br>Happy Chinese New Year!";
 	
			

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
			
			$query = "update ecard_email set sent=0 where email like 'barrykui@%' or email like 'tonysit@hksm%' or email like 'lyw_joyce%' or email like 'joyceleung@meg%'";			
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