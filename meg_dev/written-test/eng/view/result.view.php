<?php include "view/header.view.php";?>
<table border="0" cellpadding="0" cellspacing="0" width="100%" height="100%"><tbody><tr><!--bgcolor="#666699"-->
<!--<td align="center" valign="middle">-->
<td align="left" valign="top">

<table border="0" cellpadding="0" cellspacing="0" width="770" height="400" bgcolor="white" align="left"><!-- bgcolor="#CCCCFF"-->
  <tbody><tr>
    <td colspan="2">
<form name="frmResult" method="post">
<table border="0" cellpadding="0" cellspacing="3" width="100%" height="70%">
<!--<table border=0 cellpadding=0 cellspacing=3 width="100%" height="100%">-->
  <tbody><tr>
    <td height="5%">
      <!-- Header Area -->
      <table border="0" cellpadding="0" cellspacing="0" width="100%" height="100%">
      <!--<table border=0 cellpadding=3 cellspacing=0 width="100%" height="100%">-->
        <tbody><tr><td colspan="2"><img src="img/test-banner.jpg" width="770" height="118"></td></tr>      
        <tr>
          <td width="100%" style="text-align:left;"><b>Test Result</b></td>
        </tr>
      </tbody></table>
    </td>
  </tr>
  <tr>
    <!--<td height="78%"> by Barry-->
    <td height="30%">
      <!-- Question ID Area -->
      <input type="hidden" name="txtQuestionID">
      <input type="hidden" name="qseq" value="1">
      <table border="0" cellpadding="3" cellspacing="0" width="100%" height="100%">
        <tbody><tr>
          <td width="70%" height="30%">
            <table border="0" cellpadding="3" cellspacing="0" width="100%" style="border:1px solid black;" height="100%">
              <tbody><tr>
                <td colspan="4">
                  <table border="0" cellpadding="3" cellspacing="3" width="100%">
                    <tbody><tr>
                      <td width="10%">&nbsp;</td>
                      <td width="10%"><?php echo $correctCount;?></td>
                      <td width="40%" align="left"> Correct Answers</td>
                      <td width="200" rowspan="2">
					  <?php if($pass){?>
					  <img src="images/test/pass_zh.gif"></td>
					  <?php }else{?>
					  <img src="images/test/fail_zh.gif"></td>
					  <?php }?>
                    </tr>
                    <tr>
                      <td width="10%">&nbsp;</td>
                      <td width="10%"><?php echo $wrongCount;?></td>
                      <td> Incorrect Answers</td>
                    </tr>
                  </tbody></table>
                </td>
              </tr>
            </tbody></table>
          </td>
          <td width="30%">
              <table border="0" cellpadding="3" cellspacing="0" width="150" height="60" style="background-color:#7CFC00;border:1px solid black;font-weight:bold;text-align:center;vertical-align:middle"><tbody><tr><td id="Another group of questions" onmouseover="mOverControl(this);" onmouseout="mOutControl(this);" onclick="anotherSet();;">Another group of questions</td></tr></tbody></table><br><br>              <table border="0" cellpadding="3" cellspacing="0" width="150" height="60" style="background-color:#7CFC00;border:1px solid black;font-weight:bold;text-align:center;vertical-align:middle"><tbody><tr><td id="Leave Online Mock Test" onmouseover="mOverControl(this);" onmouseout="mOutControl(this);" onclick="exitTest();;">Leave Online Mock Test</td></tr></tbody></table><br><br><!--
            <input type="button" name="btnAgain" value="Another group of questions" onClick="anotherSet();" class="Button4"><Br><br>
-->
          </td>
        </tr>
      </tbody></table>
    </td>
  </tr>
  <!--<tr>
    <td height="15%" width="100%">
      <table border=0 cellpadding=3 cellspacing=0 width="100%" height="100%">
        <tr>
          <td width="10%">&nbsp;</td>
          <td width="20%"><img src="images/test/legend_correct.gif">&nbsp;-&nbsp;答對的題目</td>
          <td width="20%"><img src="images/test/legend_wrong.gif">&nbsp;-&nbsp;答錯的題目</td>
          <td width="50%">&nbsp;</td>
        </tr>
      </table>
    </td>
  </tr>-->
</tbody></table>
</form>



      <!-- End of Content -->
    </td>
  </tr>
  <!--<td><td colspan="2">&nbsp;</td></tr>-->
  <tr>
  <td style="text-align:left;">
		<b>Copyrighted, Reproduction prohibited</b>
  </td>  
  <td style="text-align:right;">
		<b>Copyright©2015 Hong Kong School of Motoring</b>
  </td>
  </tr>
</tbody></table>
</td></tr></tbody></table>
<?php include "view/footer.view.php";?>