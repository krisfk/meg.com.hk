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
			$mail->Subject = "$2100 MEG全港最平電單車課程"; 
			$mail->From     = "donotreply@meg.hk";
		
	    	// HTML body
$body ="";	    	
$body .= "<html>";
$body .= "<head>";
$body .= "<title>$2100 MEG全港最平電單車課程</title>";
$body .= "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=big5\">";
$body .= "</head>";
$body .= "<body bgcolor=\"#FFFFFF\" leftmargin=\"0\" topmargin=\"0\" marginwidth=\"0\" marginheight=\"0\">";
$body .= "<table id=\"Table_01\" width=\"1000\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">";
$body .= "<tr><td><img src=\"http://www.meg.hk/images/1000_MC.jpg\" alt=\"\" width=\"1000\" height=\"1419\" border=\"0\" usemap=\"#Map\"></td></tr>";
$body .= "<tr><td align=\"center\">";
$body .= "<a href=\"http://www.facebook.com/sharer/sharer.php?u=http://www.meg.hk/mc&t=%242100+MEG%e5%85%a8%e6%b8%af%e6%9c%80%e5%b9%b3%e9%9b%bb%e5%96%ae%e8%bb%8a%e8%aa%b2%e7%a8%8b\" target=\"_blank\"><img src=\"http://www.meg.hk/images/fbs_share.jpg\" width=\"75\" height=\"37\" alt=\"\" border=\"0\"></a>";
$body .= "</td></tr></table>";
$body .= "<map name=\"Map\">";
$body .= "<area shape=\"rect\" coords=\"54,1117,252,1315\" href=\"http://www.meg.hk\" target=\"_blank\">";
$body .= "<area shape=\"rect\" coords=\"270,1131,473,1188\" href=\"http://www.meg.hk/mc\" target=\"_blank\">";
$body .= "<area shape=\"rect\" coords=\"48,1357,253,1413\" href=\"http://www.hksm.com.hk\" target=\"_blank\">";
$body .= "<area shape=\"rect\" coords=\"408,1379,566,1412\" href=\"http://www.meg.hk\" target=\"_blank\">";
$body .= "<area shape=\"rect\" coords=\"606,1370,761,1410\" href=\"http://itunes.apple.com/hk/app/meg/id416072313?mt=8\" target=\"_blank\">";
$body .= "<area shape=\"rect\" coords=\"798,1371,955,1412\" href=\"http://www.facebook.com/meglimited\" target=\"_blank\">";
$body .= "</map>";
//$body .= "<br><center><a href=\"http://www.facebook.com/sharer/sharer.php?u=http://www.meg.hk/mc&t=%242100+MEG%e5%85%a8%e6%b8%af%e6%9c%80%e5%b9%b3%e9%9b%bb%e5%96%ae%e8%bb%8a%e8%aa%b2%e7%a8%8b\" target=\"_blank\"><img src=\"http://www.meg.hk/images/fbs_share.jpg\" width=\"75\" height=\"37\" alt=\"\" border=\"0\"></a></center>";
$body .= "<br><p>&nbsp;</p>If you cannot read this e-mail properly, please click <a target=\"_blank\" href=\"http://www.meg.hk/mc/1000_MC.html\" >here</a><br>";
$body .= "<br><p>&nbsp;</p>如閣下未能閱覽此電郵，請<a target=\"_blank\" href=\"http://www.meg.hk/mc/1000_MC.html\" >按此</a><br>";
$body .= "<br><p>&nbsp;</p>If you do not wish to receive our promotion messages, please click <a target=\"_blank\" href=\"http://www.meg.hk/mc/1000_MC.html\" >here</a><br>";
$body .= "<br><p>&nbsp;</p>如閣下不想收到我們的宣傳推廣電郵，請<a target=\"_blank\" href=\"http://www.meg.hk/mc/1000_MC.html\" >按此</a><br>";


$body .= "</body>";
$body .= "</html>";

//$body .= "Dear <font size=\"4\">".$row["name"]."</font>, <p>";
//$body .= "<p><hr /><p>&nbsp;</p>If the image is not showing, please click <a target=\"_blank\" href=\"http://64.37.57.130/~tccom/market/lt.php?id=K0pTWwhSVlJPB0kCAV4KBgE%3D\" >HERE</a><br />";


	    	
	   					
			// Plain text body (for mail clients that cannot read HTML)
	    	$text_body = "";
	    	//$text_body  = "Dear ".$row["name"].",\n\n";
			//$text_body .= "<br><p>&nbsp;</p>If the image is not showing, please click <a target=\"_blank\" href=\"http://www.meg.hk/mc/1000_MC.html\" >HERE</a><br>";	    							
			//$text_body .= "<br>http://www.meg.hk/mc/1000_MC.html<br>";	    										
			//$text_body .= "<font size=\"1\">If the above link did not open the image, please copy and paste the URL to your browser web address bar.<br>";			
			//$text_body .= "若你未能直接開啟圖像，請將以上連結剪貼在瀏覽器的網址列內。";		
		}else{
			$mail->FromName = "MEG Limited";
			$mail->Subject = "$2100 MEG全港最平電單車課程"; 
			$mail->From     = "donotreply@meg.hk";
		
	    	// HTML body
$body ="";	    
//$body .= "<html>";
//$body .= "<head>";
//$body .= "<title></title>";
//$body .= "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=big5\">";
//$body .= "</head>";
//$body .= "<FRAMESET NAME=\"main\" COLS=\"*\" rows=\"500,*\" FRAMEBORDER=NO BORDER=0 TOPMARGIN=0 LEFTMARGIN=0 MARGINWIDTH=0 MARGINHEIGHT=0>";
//$body .= "<FRAME NAME=\"upper\" SRC=\"http://www.meg.hk/mc/1000_MC.html\" SCROLLING=\"auto\" TOPMARGIN=0 LEFTMARGIN=0 MARGINWIDTH=0 MARGINHEIGHT=0>";
//$body .= "</frameset>";
//$body .= "<NOFRAMES>";
//$body .= "<BODY>";
//$body .= "Viewing this page requires a browser capable of displaying frames.";
//$body .= "</BODY>";
//$body .= "</NOFRAMES>";
//$body .= "</html>";


$body .= "<html>";
$body .= "<head>";
$body .= "<title></title>";
$body .= "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
$body .= "</head>";
$body .= "<body bgcolor=\"#FFFFFF\" leftmargin=\"0\" topmargin=\"0\" marginwidth=\"0\" marginheight=\"0\">";
$body .= "<table id=\"Table_01\" width=\"1000\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">";
$body .= "<tr><td><img src=\"http://www.meg.hk/images/1000_MC.jpg\" alt=\"\" width=\"1000\" height=\"1419\" border=\"0\" usemap=\"#Map\"></td></tr>";
$body .= "<tr><td align=\"center\">";
$body .= "<a href=\"http://www.facebook.com/sharer/sharer.php?u=http://www.meg.hk/mc&t=%242100+MEG%e5%85%a8%e6%b8%af%e6%9c%80%e5%b9%b3%e9%9b%bb%e5%96%ae%e8%bb%8a%e8%aa%b2%e7%a8%8b\" target=\"_blank\"><img src=\"http://www.meg.hk/images/fbs_share.jpg\" width=\"75\" height=\"37\" alt=\"\" border=\"0\"></a>";
$body .= "</td></tr></table>";
$body .= "<map name=\"Map\">";
$body .= "<area shape=\"rect\" coords=\"54,1117,252,1315\" href=\"http://www.meg.hk\" target=\"_blank\">";
$body .= "<area shape=\"rect\" coords=\"270,1131,473,1188\" href=\"http://www.meg.hk/mc\" target=\"_blank\">";
$body .= "<area shape=\"rect\" coords=\"48,1357,253,1413\" href=\"http://www.hksm.com.hk\" target=\"_blank\">";
$body .= "<area shape=\"rect\" coords=\"408,1379,566,1412\" href=\"http://www.meg.hk\" target=\"_blank\">";
$body .= "<area shape=\"rect\" coords=\"606,1370,761,1410\" href=\"http://itunes.apple.com/hk/app/meg/id416072313?mt=8\" target=\"_blank\">";
$body .= "<area shape=\"rect\" coords=\"798,1371,955,1412\" href=\"http://www.facebook.com/meglimited\" target=\"_blank\">";
$body .= "</map>";
//$body .= "<br><a href=\"http://www.facebook.com/sharer/sharer.php?u=http://www.meg.hk/mc\" target=\"_blank\">Share on Facebook</a>";
//$body .= "<br><center><a href=\"http://www.facebook.com/sharer/sharer.php?u=http://www.meg.hk/mc&t=%242100+MEG%e5%85%a8%e6%b8%af%e6%9c%80%e5%b9%b3%e9%9b%bb%e5%96%ae%e8%bb%8a%e8%aa%b2%e7%a8%8b\" target=\"_blank\"><img src=\"http://www.meg.hk/images/fbs_share.jpg\" width=\"75\" height=\"37\" alt=\"\" border=\"0\"></a></center>";
//$body .= "<br><p>&nbsp;</p>If the image is not showing, please click <a target=\"_blank\" href=\"http://www.meg.hk/mc/1000_MC.html\" >HERE</a><br>";

$body .= "<br><p>&nbsp;</p>If you cannot read this e-mail properly, please click <a target=\"_blank\" href=\"http://www.meg.hk/mc/1000_MC.html\" >here</a><br>";
$body .= "<br><p>&nbsp;</p>如閣下未能閱覽此電郵，請<a target=\"_blank\" href=\"http://www.meg.hk/mc/1000_MC.html\" >按此</a><br>";
$body .= "<br><p>&nbsp;</p>If you do not wish to receive our promotion messages, please click <a target=\"_blank\" href=\"http://www.meg.hk/mc/1000_MC.html\" >here</a><br>";
$body .= "<br><p>&nbsp;</p>如閣下不想收到我們的宣傳推廣電郵，請<a target=\"_blank\" href=\"http://www.meg.hk/mc/1000_MC.html\" >按此</a><br>";

$body .= "</body>";
$body .= "</html>";

//$body .= "Dear <font size=\"4\">".$row["name"]."</font>, <p>";
//$body .= "<p><hr /><p>&nbsp;</p>If the image is not showing, please click <a target=\"_blank\" href=\"http://64.37.57.130/~tccom/market/lt.php?id=K0pTWwhSVlJPB0kCAV4KBgE%3D\" >HERE</a><br />";
	    				
			// Plain text body (for mail clients that cannot read HTML)
	    	//$text_body  = "親愛的 ".$row["name"]."\n";
	    	$text_body = "";
			
			//$text_body .= "<br><p>&nbsp;</p>If the image is not showing, please click <a target=\"_blank\" href=\"http://www.meg.hk/mc/1000_MC.html\" >HERE</a><br>";	    							
			//$text_body .= "<br>http://www.meg.hk/mc/1000_MC.html<br>";	    										
			//$text_body .= "<font size=\"1\">If the above link did not open the image, please copy and paste the URL to your browser web address bar.<br>";			
			//$text_body .= "若你未能直接開啟圖像，請將以上連結剪貼在瀏覽器的網址列內。";				
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