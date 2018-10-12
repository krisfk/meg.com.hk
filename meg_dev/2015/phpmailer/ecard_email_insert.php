<html>
<head></head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
//session_start();

/************************************************************************************************/
/* File       : ecard_email_insert.php															*/
/* Usage      : re-gen data of table named in ecard_email 										*/
/*																								*/
/*				1. before clearing necessary data, update all unsuccessful info to 				*/
/*                 ecard_email_unsuccessful - Added by Barry on 200801							*/
/*																								*/
/* 				2. clear all records whether the type not in ISD / CCD / CEO / GMO				*/
/* 				3. reset SENT flag to 0 except type in CEO										*/
/* 				4. grep data from another 2 tables of member_tb_members AND tb_play_info again	*/
/*                 whether the SENT is fault in 0												*/
/* 				5. CEO's record will be sent out from special notice							*/
/*                                5. sent flag = 0 (unsend)										*/
/*                                5. sent flag = 1 (sent)										*/
/*                                5. sent flag = -2 (sent failed)								*/
/*                                5. sent flag = -1 (hold)										*/
/* Created by : Rebecca on 14-Jun-2007															*/
/************************************************************************************************/


include_once ("common/db_connect.inc.php");



//delete records of last unsuccessful email, added by Barry
$sql = "delete from ecard_email_unsuccessful ";
$mysql_result = mysql_query($sql) or die("failed! <br><br>" . $sql . "<br><br>");
echo "<font color='red'>Last Unsuccessful Email Record deleted! </font> => <font color='Brown'><b>" . date('dS \of F, Y') . " </font><font color='Blue'>" . date('H:i:s') ."</font></b><br><br>";



// insert records of last unsuccessful email from ecard_email, added by Barry
$sql = "insert into ecard_email_unsuccessful select * from ecard_email where sent < 0";
$mysql_result = mysql_query($sql) or die("failed! <br><br>" . $sql . "<br><br>");
echo "<font color='red'>Unsuccessful Email Record Inserted! </font> => <font color='Brown'><b>" . date('dS \of F, Y') . " </font><font color='Blue'>" . date('H:i:s') ."</font></b><br><br>";



//delete records type <> ISD or CCD or CEO or GMO
$sql = "delete from ecard_email where (type not in ('ISD','CCD','CEO','GMO')) or (type is null)";
$mysql_result = mysql_query($sql) or die("failed! <br><br>" . $sql . "<br><br>");
echo "<font color='red'>Record deleted! </font> => <font color='Brown'><b>" . date('dS \of F, Y') . " </font><font color='Blue'>" . date('H:i:s') ."</font></b><br><br>";


//reset the SENT= 0 except TYPE = "CEO"
//$sql = "update ecard_email set sent=0 where type in ('ISD','CCD','GMO','CEO')";
//$mysql_result = mysql_query($sql) or die("failed! <br><br>" . $sql . "<br><br>");
//echo "<font color='red'>the flag of SENT updated! </font> => <font color='Brown'><b>" . date('dS \of F, Y') . " </font><font color='Blue'>" . date('H:i:s') ."</font></b><br><br>";


// grep data from member_tb_members where email is not null and receive in Y 
// grep data from member_tb_members where email is not null and receive in Y and active in Y -- 20080215 by Reb
$sql = "select * from member_tb_members where email <> '' and receive='Y' and active='Y'";
$mysql_result = mysql_query($sql) or die("failed! <br><br>" . $sql . "<br><br>");
echo $sql . "<br>**********<br>";
$rs = mysql_fetch_assoc($mysql_result);
//echo $rs['EMAIL'] . "<br>" . $rs['NAME_EN'] . "<br>";
while ($rs['EMAIL']<>''){
	$ins = "insert into ecard_email (email,sent,name,message,card_code,type) values ('" . $rs['EMAIL'] . "',0,'" . $rs['NAME_EN'] . "',null,'" . $rs['EMAIL'] . "',null)";
	echo $ins . "<br>";
	//exit;
	mysql_query($ins) or die($ins . "<br><br>");
	$rs=mysql_fetch_assoc($mysql_result);
}
echo "<font color='red'> member_tb_members' info added! </font> => <font color='Brown'><b>" . date('dS \of F, Y') . " </font><font color='Blue'>" . date('H:i:s') ."</font></b><br><br>";


// grep data from tb_play_info
$sql = "select * from tb_play_info";
$mysql_result = mysql_query($sql) or die("failed! <br><br>" . $sql . "<br><br>");
$rs = mysql_fetch_assoc($mysql_result);
while ($rs['gameno']>0){
	$ins = "insert into ecard_email (email,sent,name,message,card_code,type) values ('" . $rs['email'] . "',0,'" . $rs['name'] . "',null,'" . $rs['email'] . "'," . "'GAMENO_" . $rs['gameno'] . "')";
	echo $ins . "<br>";
	mysql_query($ins) or die($ins . "<br><br>");
	$rs=mysql_fetch_assoc($mysql_result);
}
echo "<font color='red'>Player's info added! </font> => <font color='Brown'><b>" . date('dS \of F, Y') . " </font><font color='Blue'>" . date('H:i:s') ."</font></b><br><br>";




// Mark unsuccessful email in ecard_email
$sql = "select * from ecard_email_unsuccessful";
$mysql_result = mysql_query($sql) or die("failed! <br><br>" . $sql . "<br><br>");
echo $sql . "<br>**********<br>";
$rs = mysql_fetch_assoc($mysql_result);
//echo $rs['EMAIL'] . "<br>" . $rs['NAME_EN'] . "<br>";
while ($rs['email']<>''){
	$ins = "update ecard_email set sent = " . $rs['sent'] . " where email = '" . $rs['email'] . "' and name = '" . $rs['name'] . "'";
	echo $ins . "<br>";
	//exit;
	mysql_query($ins) or die($ins . "<br><br>");
	$rs=mysql_fetch_assoc($mysql_result);
}
echo "<font color='red'>Unsuccessful Email Updated! </font> => <font color='Brown'><b>" . date('dS \of F, Y') . " </font><font color='Blue'>" . date('H:i:s') ."</font></b><br><br>";




?>
</html>
