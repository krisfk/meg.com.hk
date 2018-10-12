<?php include "view/header.view.php";?>
<table border="0" cellpadding="0" cellspacing="0" width="100%" height="100%"><tbody><tr><!--bgcolor="#666699"-->
<!--<td align="center" valign="middle">-->
<td align="left" valign="top">

<table border="0" cellpadding="0" cellspacing="0" width="770" height="400" bgcolor="white" align="left"><!-- bgcolor="#CCCCFF"-->
  <tbody><tr>
    <td colspan="2">
<form name="frmTest" method="post">
<input type="hidden" id="code" name="code" value="<?php echo $paperCode;?>">
<input type="hidden" id="expired_time" name="expired_time" value="<?php echo $expired_time;?>">
<input type="hidden" id="create_time" name="create_time" value="<?php echo $create_time;?>">

<input type="hidden" id="now" name="now" value="<?php echo time();?>">
<table border="0" cellpadding="0" cellspacing="3" width="100%" height="100%">
  <tbody><tr>
    <td height="8%">
      <!-- Header Area -->
      <table border="0" cellpadding="3" cellspacing="0" width="100%" height="100%">
        <tbody><tr><td colspan="2"><img src="img/test-banner.jpg" width="770" height="118"></td></tr>
        <tr>
          <td width="70%" style="text-align:left;">
            Paper No: <?php echo $paperNum;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Question <?php echo $questionCount;?>           </td>
          <td style="font-weight:bold;font-family:Verdena;">Time left：<span id="ExamTimer"><?php echo $TimeLeft;?><span></td>
        </tr>
        <!--<tr>
        	<td>&nbsp;</td>
        	<td>1200 - 1429966234 - 1429966230 - 19 minutes 56 second - 90</td>
        </tr>-->
      </tbody></table>
    </td>
  </tr>
  <tr>
    <td height="36%">
      <!-- Question Area -->
      <table border="0" cellpadding="3" cellspacing="0" width="100%" height="100%">
        <tbody><tr>
          <td width="100%" height="85%" colspan="3" align="center">
            <table border="0" cellpadding="3" cellspacing="0" width="100%" height="100%" style="border:3px solid black;background-color:#FFFAD0;">
              <tbody><tr>
                <td style="text-align:left;vertical-align:top;">
				<?php echo $haveImg ? 'This road sign represents：':$question['question_en'];?>
				</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td width="100%" valign="top">
                  <table border=0 cellpadding=3 cellspacing=0 width="100%">
					<tr>
						<td style="text-align:left;">&nbsp;A. <?php echo $question['answer1_en'];?></td>
						<?php if(!empty($question['img'])){?><td style="text-align:left;" rowspan=3><img src="images/<?php echo $question['img'];?>" border=0></td><?php }?>
					</tr>
					<tr>
						<td style="text-align:left;">&nbsp;B. <?php echo $question['answer2_en'];?></td>
					</tr>
					<tr>
						<td style="text-align:left;">&nbsp;C. <?php echo $question['answer3_en'];?></td>
					</tr>
					<?php if(isset($question['answer4'])){?>
					<tr>
						<td style="text-align:left;">&nbsp;D. <?php echo $question['answer4'];?></td>
					</tr>
					<?php }?>
				  </table>
                </td>
              </tr>

            </tbody></table>
          </td>
          <!--<td><img src="images/test/title_en.gif" border=0><br><img src="images/test/title_en.gif" border=0><br><img src="images/test/title_en.gif" border=0></td>-->
                   

        </tr>
                            
        <!-- Answer Area -->
        <tr>
          <td style="text-align:left;color:red;" width="25%" id="AnswerLabel">Your answer is：</td>
          <td id="Answer" style="color:red;text-align:left;font-weight:bold;" width="40%"><?php echo $userAnswer;?></td>
          <td width="35%">&nbsp;</td>          
        </tr>
        
		       
        <tr>
          <td style="text-align:left;">The correct answer is：</td>
          <td style="text-align:left;font-weight:bold;"><?php echo $txtAnswer;?></td>
          <td></td>
        </tr>
        <tr>
          <td style="text-align:left;" colspan="2">
		    <?php if($correct){?>
			<font style="padding:3px;color:white;background-color:#00CC00;">Correct</font>
			<?php }else{?>
			<font style="padding:3px;color:white;background-color:red;">Incorrect</font>
			<?php }?>
		  </td>
          <td></td>
        </tr>
        
        <!-- Answer Chooses -->
        
      </tbody></table>
    </td>
  </tr>
  
  
  <tr>
    <td height="30%">
      <!-- Navigation -->
      <table border="0" cellpadding="3" cellspacing="0" width="100%">
        <tbody><tr>
		<?php if($haveNext){?>
           <td style="text-align:left;" width="140">
				<table border="0" cellpadding="3" cellspacing="0" width="120" height="30" style="background-color:#7CFC00;border:1px solid black;font-weight:bold;text-align:center;vertical-align:middle">
				<tbody>
				<tr>
				<td id="Next Question" onmouseover="mOverControl(this);" onmouseout="mOutControl(this);" onclick="jumpQuestion(1);">Next Question</td>
				</tr>
				</tbody>
				</table>
			</td>
		<?php }?>
			<td style="text-align:left;">
			<table border="0" cellpadding="3" cellspacing="0" width="120" height="30" style="background-color:#7CFC00;border:1px solid black;font-weight:bold;text-align:center;vertical-align:middle">
			<tbody><tr>
			<td id="Complete and Submit" onmouseover="mOverControl(this);" onmouseout="mOutControl(this);" onclick="finishExam();">Complete and Submit</td></tr></tbody></table></td>                
              <!--&nbsp;&nbsp;<input type="button" name="btnFinish" value="Complete and Submit" onClick="finishExam();" class="Button4"></td>-->
          </tr>
      </tbody></table>
    </td>
  </tr>
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