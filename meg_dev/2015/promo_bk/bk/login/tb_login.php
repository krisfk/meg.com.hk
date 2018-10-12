<?php
   session_start();
   include "common/db_connect.inc.php"; 

   
   $err = 0;
   
   
   
if ($_POST["txtStaffID"]!="") {
	
$tb = "tb_staff";
$sql = "select SUPER from " . $tb . " where STAFFID = '".$_POST["txtStaffID"].
                "' and PASSWORD = '".$_POST["txtPassword"]."'";
$sql_result = mysql_query($sql) or die("Could not select database!<br><br>" . $sql);
$num_rows = mysql_num_rows($sql_result);

      
      if ($num_rows > 0)
      {
         
		//$TBStaffID = $_POST["txtStaffID"];
		$row = mysql_fetch_array($sql_result);
		$SUPER = $row[0];				
		//$TBValidLogin = "success";

		$_SESSION["TBValidLogin"]="success";
		$_SESSION["TBStaffID"]=$_POST["txtStaffID"];

		//session_register("TBValidLogin");
	
		//session_register("TBStaffID");
			
		 mysql_free_result($sql_result);
		 
		mysql_query("UPDATE tb_staff SET LASTLOGINTIME = now()".
		    " where STAFFID = '".$TBStaffID."'");
		    		 
   		 mysql_close($conn);	
   		 
 ?>
<script language="JavaScript">
   if (location.href)
      //location.href = "tb_reg_info.php";
      location.href = "tb_reg_display.php";
      
   else
      //location.replace("tb_reg_info.php");
      location.replace("tb_reg_display.php");      
</script>
<?php

         //header("Location: http://".$HTTP_SERVER_VARS['HTTP_HOST']
                               //.dirname($HTTP_SERVER_VARS['PHP_SELF'])
                               //."/tb_player_info.php");
         $err = 0;
         exit(0);
      }
      else
      {
   		 mysql_close($conn);		      
         //$TBStaffID = "";
         //$TBValidLogin = "";
         //session_unregister("TBStaffID");
         //session_unregister("TBValidLogin");
		$_SESSION["TBValidLogin"]="";
		$_SESSION["TBStaffID"]="";         
         $err = 1;
      }
      
}
else
{
		$_SESSION["TBValidLogin"]="";
		$_SESSION["TBStaffID"]="";
	     //session_unregister("TBStaffID");
         //session_unregister("TBValidLogin");
}

//   if ($err == 1)
   //{
?>
<html>
<head>
<title>Staff Area</title>

<style type="text/css">
<!--
table.input {  font-family: "Arial", "Helvetica", "sans-serif"; font-size: 14px; border: #666666; border-style: solid; border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px}
input.txtbox {  font-family: "Arial", "Helvetica", "sans-serif"; font-size: 14px; border: #6666CC; border-style: solid; border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px}
td.record {  font-family: "Arial", "Helvetica", "sans-serif"; font-size: 14px; border: #336600; border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px}
.btn
{
   font-family: Arial, Helvetica, sans-serif;
   font-size: 12px;
   font-weight: normal;
}
-->
</style>

</head>

<Script Language="JavaScript">
<!--
   function dataCheck()
   {
      if (document.frmCases.txtStaffID.value == null || document.frmCases.txtStaffID.value == "")
      {
         document.frmCases.txtStaffID.select();
         alert ("Please enter your staff ID!");
      }
      else
         if (document.frmCases.txtPassword.value == null || document.frmCases.txtPassword.value == "")
         {
            document.frmCases.txtPassword.select();
            alert ("Please enter your password!");
         }
         else
            document.frmCases.submit();
   }
   
   function mySelect(obj)
   {
      obj.select();
   }
//-->
</Script>

<body>

<form name="frmCases" method="post" action="tb_login.php">
<center>
<font style="font-family: Arial, Helvetica, sans-serif; font-size: 14px;">
MEG Registration Login
</font></center>
<table border="0" cellpadding="3" cellspacing="0" class="input" align="center">
<?php
   if ($err == 1)
   {
?>
  <tr>
    <td style="color:red;" colspan="2">
      Invalid login!
    </td>
  </tr>
<?php
   }
?>
  <tr>
    <td>Staff ID</td>
    <td>
      <input name="txtStaffID" value="<?php echo $_POST["txtStaffID"]; ?>" class="txtbox" onFocus="mySelect(this);">
    </td>
  </tr>
  <tr>
    <td>Password</td>
    <td><input type="password" name="txtPassword" class="txtbox" onFocus="mySelect(this);"></td>
  </tr>
  <tr>
    <td colspan="2">
      <input type="button" name="btnSubmit" value="Submit" onClick="dataCheck();" class="btn">
    </td>
  </tr>
</table>
</form>

</body>

</html>

<?php
//   }
?>