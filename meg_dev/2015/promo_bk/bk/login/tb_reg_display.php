<?php
session_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MEG Limited</title>
<!-- <link href="styles.css" rel="stylesheet" type="text/css" />
<style type="text/css"> -->


<?php

extract ($_POST);
extract ($_GET);

if ($_SESSION["TBValidLogin"]!="success") {
	?>
<script language="JavaScript">
   alert("Please Login first");
   if (location.href)
      location.href = "tb_login.php";
   else
      location.replace("tb_login.php");
</script>
<?php
   exit();
}



$conn = mysql_connect("localhost", "megcom_admin", "!4h*ZAwduzBB") or die("Could not connect : " . mysql_error());
//mysql_query("SET SESSION character_set_results = 'BIG5'");
mysql_select_db("megcom_production") or die("Could not select the database");

//$gno = $_GET["gno"];

//$chkGameNo=$_GET["chkGameNo"];
//$game_no=$gno;
//
//echo $gno . "####<br><br>";


$sql  = "select a.formno, b.description, count(1) cnt ";
$sql .= "from tb_register_info a, tb_form_description b ";
//$sql .= "where a.formno=b.formno and a.formno in (" . $gno . ")";
$sql .= "where a.formno=b.formno and a.formno in (22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86) ";   // Matthew 2014-01-23 Form description by formno
$sql .= "group by a.formno, b.description";

//echo $sql;

//select a.formno, b.description, count(1) cnt from tb_register_info a, tb_form_description b where a.formno=b.formno and a.formno in ()group by a.formno, b.description
//$sql2  = "select a.*, b.description from tb_register_info a, tb_form_description b ";
//$sql2 .= "where a.formno=b.formno and a.formno in (" . $gno . ")";
//$sql2 .= "where a.formno=b.formno and a.formno in (7,8,9,10,11,12,13)";
//$sql2 .= "order by a.regdate desc";


$sql2 = "SELECT a.formno, a.regdate, a.facebookid, a.hkid, a.name, a.telno, a.email, a.age, a.occupation, a.area, a.address, a.medium, a.txn_id, a.source, a.other_source, a.course, a.voucher_no, a.security_code, a.name2, a.voucher_no2, a.namepay, a.emailpay, a.telnopay, b.description, area_eng_desc, occupation_eng_desc, age_desc, ";
$sql2 .= " institution ";
$sql2 .= "FROM tb_register_info a ";
$sql2 .= "JOIN tb_form_description b ON a.formno = b.formno ";
$sql2 .= "LEFT JOIN age_selection ss1 ON a.age = ss1.age ";
$sql2 .= "LEFT JOIN area_selection ss2 ON a.area = ss2.area ";
$sql2 .= "LEFT JOIN occupation_selection ss3 ON a.occupation = ss3.occupation ";
$sql2 .= "WHERE a.formno IN (22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86) ";   // Matthew 2014-01-23 Registration description by formno
$sql2 .= "ORDER BY a.regdate DESC  ";

$sql3  = "select distinct description descpt, formno gno from tb_form_description ";
//$sql3 .= "where formno in (" . $gno . ")";
$sql3 .= "where formno in (22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86)";   // Matthew 2014-01-23 Function name by formno


$sql31  = "select max(formno) mgno from tb_form_description ";
//$sql31 .= "where formno in (" . $gno . ")";
$sql31 .= "where formno in (22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86)";   // Matthew 2014-01-23 Function length by formno


$sql4  = "select max(regdate) mdate from tb_register_info ";
//$sql4 .= "where formno in (" . $gno . ")";
$sql4 .= "where formno in (22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86)";   // Matthew 2014-01-23 Max registration date by formno

mysql_query("SET NAMES 'UTF8'");

$mysql_result = mysql_query($sql) or die("Could not select database on <br><br>" . $sql);
$mysql_result2 = mysql_query($sql2) or die("Could not select database on <br><br>" . $sql2);
$mysql_result3 = mysql_query($sql3) or die("Could not select database on <br><br>" . $sql3);
$mysql_result31 = mysql_query($sql31) or die("Could not select database on <br><br>" . $sql31);
$mysql_result4 = mysql_query($sql4) or die("Could not select database on <br><br>" . $sql4);

   // check the no. of rows (records) after running the query
	   $num_rows = mysql_num_rows($mysql_result);
	   $num_rows2 = mysql_num_rows($mysql_result2);
	   $num_rows3 = mysql_num_rows($mysql_result3);
	   $num_rows31 = mysql_num_rows($mysql_result31);
	   $num_rows4 = mysql_num_rows($mysql_result4);

	   if ($num_rows == 0){
			echo "Sorry, there is no record found.";
	    } //if
	    else {

		    // max game no.
		    while ($rows = mysql_fetch_array($mysql_result31)){
			    $maxgno = $rows["mgno"];
		    }

		    // title
		    while ($rows = mysql_fetch_array($mysql_result3)){
			    if ($rows["gno"] == $maxgno) {
			    	$title = $title .  $rows["descpt"];
		    	}else {
			    	$title = $title .  $rows["descpt"] . " <b><font color='orange'> or </font></b> ";
			    }
		    }

		    // maxplaying date
		    while ($rows = mysql_fetch_array($mysql_result4)){
			    $maxdate = $rows["mdate"];
		    }

		    //show the no. of player by game
		    //echo "<font color=\"#008B8B\"><b>No. of Player by Game upto " .  $maxdate . "</br></font>";
		    ?>



			<?php //<font color="orange"><b>Function : <font color="#008B8B"><php echo $title ></font></font><br><br><br> ?>

		    <font color="#008B8B"><b>No. of Registration upto<font color="red">&nbsp;<?php echo $maxdate?></font><br>


		    <table>
		    	<tr>
		    		<td>
						<table width=50% Align=Left Border=1>
							<tr>
								<TH><font color=\"blue\">Form No</TH>
								<TH><font color=\"blue\">Form Description</TH>
								<TH><font color=\"blue\">No. of Count</TH>
							</tr>

		    				<?php
		    				while ($rows = mysql_fetch_array($mysql_result)){
							    $form_no = $rows["formno"];
							    $form_desc = $rows["description"];
							    $count = $rows["cnt"];
							?>
								<tr>
									<TD align="center" width=5%><?php echo $form_no;?></TD>
									<TD align="center" width=0%><font size=2><?php echo $form_desc;?></font></TD>
									<TD width=15% align="center"><?php echo  $count; ?></TD>
								</tr>
							<?php
		    				}
		    				?>
						</table>
					<td>
				</tr>

				<tr>
					<td colspan=7 Height="30">
						<font color="orange"><b>Registration Info</font><br>
					</td>
				</tr>

				<tr>
					<td>
						<table border='1'>
						<!-- <table width=100% Align=Center Border=8> -->
							<tr>
								<TH><font color=\"blue\">Form No</TH>
								<TH><font color=\"blue\">Form Description</TH>
								<TH><font color=\"blue\">Reg Date</TH>
								<!--<TH><font color=\"blue\">Facebook ID</TH>								-->
								<TH><font color=\"blue\">Voucher No</TH>
								<TH><font color=\"blue\">HKID</TH>
								<TH><font color=\"blue\">Name</TH>
								<TH><font color=\"blue\">Telephone No</TH>
								<TH><font color=\"blue\">Email</TH>
								<TH><font color=\"blue\">Security Code</TH>
								<TH><font color=\"blue\">Course</TH>
								<TH><font color=\"blue\">Name 2</TH>
								<TH><font color=\"blue\">Voucher No 2</TH>
								<TH><font color=\"blue\">Source</TH>
								<TH><font color=\"blue\">Other Source</TH>
								<TH><font color=\"blue\">Payer Name</TH>
								<TH><font color=\"blue\">Payer Email</TH>
								<TH><font color=\"blue\">Payer Tel</TH>
								<TH><font color=\"blue\">Area</TH>
								<TH><font color=\"blue\">Age</TH>
								<TH><font color=\"blue\">Occupation</TH>
								<TH><font color=\"blue\">Institution</TH>

								<!--<TH><font color=\"blue\">Age</TH>
								<TH><font color=\"blue\">Occupation</TH>
								<TH><font color=\"blue\">Address</TH>
								<TH><font color=\"blue\">Medium</TH>
								<TH><font color=\"blue\">TXN ID</TH>-->
								<!--<TH><font color=\"blue\">Source</TH>
								<TH><font color=\"blue\">Other Source</TH>-->



							</tr>
							<?php

                            $aryInstitutionName = array("", "Chu Hai College of Higher Education", "City University of Hong Kong", "Lingnan University", "Hong Kong Baptist University", "Hong Kong Shue Yan University", "The Chinese University of Hong Kong", "The Hong Kong Institute of Education", "The Hong Kong Polytechnic University", "The Hong Kong University of Science and Technology", "The Open University of Hong Kong", "The University of Hong Kong", "Others");
							while ($rows = mysql_fetch_array($mysql_result2)){
								$formno = $rows["formno"];
								$regdate = $rows["regdate"];
								$facebookid = $rows["facebookid"];
								$hkid = $rows["hkid"];
								$name = $rows["name"];
								$telno = $rows["telno"];
								$email = $rows["email"];
								$age = $rows["age_desc"];
								$occupation = $rows["occupation_eng_desc"];
								$area = $rows["area_eng_desc"];
							    $form_desc = $rows["description"];

								$address = $rows["address"];
								$medium = $rows["medium"];
								$txn_id = $rows["txn_id"];

								$source = $rows["source"];
								$other_source = $rows["other_source"];

								$course = $rows["course"];

								$voucher_no = $rows["voucher_no"];
								$security_code = $rows["security_code"];
								$name2 = $rows["name2"];
								$voucher_no2 = $rows["voucher_no2"];

								$namepay = $rows["namepay"];
								$emailpay = $rows["emailpay"];
								$telnopay = $rows["telnopay"];
								//echo $row["institution"];
								$institution = $aryInstitutionName[$rows["institution"]];

							//display results
							?>
							<tr>
								<TD align="center"><font size=2><?php echo $formno;?></font></TD>
								<TD align="center"><font size=2><?php echo $form_desc;?></font></TD>
								<TD align="center"><font size=2><?php echo $regdate; ?></font></TD>
								<TD align="center"><font size=2><?php if ($voucher_no=="") {echo "&nbsp";} else {echo $voucher_no;} ?></font></TD>
								<TD align="center"><font size=2><?php if ($hkid=="") {echo "&nbsp";} else {echo $hkid;} ?></font></TD>
								<TD align="center"><font size=2><?php echo $name; ?></font></TD>
								<TD align="center"><?php echo $telno; ?></TD>
								<TD align="center"><?php echo $email; ?></TD>

								<?php
									// <!--<TD width=10% align="center"><php if ($age=="") {echo "&nbsp";} else {echo $age;} ></td>
									// <TD width=10% align="center"><php if ($occupation=="") {echo "&nbsp";} else {echo $occupation;} ></td>
									// <TD width=5% align="center"><font size=2><php if ($address=="") {echo "&nbsp";} else {echo $address;} ></font></TD>
									// <TD width=5% align="center"><font size=2><php if ($medium=="") {echo "&nbsp";} else {echo $medium;} ></font></TD>
									// <TD width=5% align="center"><font size=2><php if ($txn_id=="") {echo "&nbsp";} else {echo $txn_id;} ></font></TD>-->
								?>

								<TD align="center"><font size=2><?php if ($security_code=="") {echo "&nbsp";} else {echo $security_code;} ?></font></TD>
								<TD align="center"><font size=2><?php if ($course=="") {echo "&nbsp";} else {echo $course;} ?></font></TD>
								<TD align="center"><font size=2><?php if ($name2=="") {echo "&nbsp";} else {echo $name2;} ?></font></TD>
								<TD align="center"><font size=2><?php if ($voucher_no2=="") {echo "&nbsp";} else {echo $voucher_no2;} ?></font></TD>
								<TD align="center"><font size=2><?php if ($source=="") {echo "&nbsp";} else {echo $source;} ?></font></TD>
								<TD align="center"><font size=2><?php if ($other_source=="") {echo "&nbsp";} else {echo $other_source;} ?></font></TD>
								<TD align="center"><font size=2><?php if ($namepay=="") {echo "&nbsp";} else {echo $namepay;} ?></font></TD>
								<TD align="center"><font size=2><?php if ($emailpay=="") {echo "&nbsp";} else {echo $emailpay;} ?></font></TD>
								<TD align="center"><font size=2><?php if ($telnopay=="") {echo "&nbsp";} else {echo $telnopay;} ?></font></TD>
								<TD align="center"><font size=2><?php if ($area=="") {echo "&nbsp";} else {echo $area;} ?></font></TD>
								<TD align="center"><font size=2><?php if ($age=="") {echo "&nbsp";} else {echo $age;} ?></font></TD>
								<TD align="center"><font size=2><?php if ($occupation=="") {echo "&nbsp";} else {echo $occupation;} ?></font></TD>
								<TD align="center"><font size=2><?php if ($institution=="") {echo "&nbsp";} else {echo $institution;} ?></font></TD>


							</tr>
							<?php
							}
							?>
						</table>
					</td>
				</tr>
			</table>
	<?php
	} //else

		 mysql_close($conn);
?>

</html>