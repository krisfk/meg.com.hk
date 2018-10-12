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
            試卷編號: <?php echo $paperNum;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;第 <?php echo $questionCount;?> 條          </td>
          <td style="font-weight:bold;font-family:Verdena;">剩餘時間：<span id="ExamTimer"><?php echo $TimeLeft;?><span></td>
        </tr>
        <!--<tr>
        	<td>&nbsp;</td>
        	<td>1200 - 1429966234 - 1429966230 - 19 分鐘 56 秒 - 90</td>
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
				<?php echo $haveImg ? '此交通標誌表示：':$question['question'];?>
				</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td width="100%" valign="top">
                  <table border=0 cellpadding=3 cellspacing=0 width="100%">
					<tr>
						<td style="text-align:left;">&nbsp;A. <?php echo $question['answer1'];?></td>
						<?php if(!empty($question['img'])){?><td style="text-align:left;" rowspan=3><img src="images/<?php echo $question['img'];?>" border=0></td><?php }?>
					</tr>
					<tr>
						<td style="text-align:left;">&nbsp;B. <?php echo $question['answer2'];?></td>
					</tr>
					<tr>
						<td style="text-align:left;">&nbsp;C. <?php echo $question['answer3'];?></td>
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
          <td style="text-align:left;color:red;" width="25%" id="AnswerLabel">您選擇的答案是：</td>
          <td id="Answer" style="color:red;text-align:left;font-weight:bold;" width="40%"><?php echo $userAnswer;?></td>
          <td width="35%">&nbsp;</td>          
        </tr>
        
		       
        <tr>
          <td style="text-align:left;">此題正確答案是：</td>
          <td style="text-align:left;font-weight:bold;"><?php echo $txtAnswer;?></td>
          <td></td>
        </tr>
        <tr>
          <td style="text-align:left;" colspan="2">
		    <?php if($correct){?>
			<font style="padding:3px;color:white;background-color:#00CC00;">此題正確</font>
			<?php }else{?>
			<font style="padding:3px;color:white;background-color:red;">此題不正確</font>
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
				<td id="下一條題目" onmouseover="mOverControl(this);" onmouseout="mOutControl(this);" onclick="jumpQuestion(1);">下一條題目</td>
				</tr>
				</tbody>
				</table>
			</td>
		<?php }?>
			<td style="text-align:left;">
			<table border="0" cellpadding="3" cellspacing="0" width="120" height="30" style="background-color:#7CFC00;border:1px solid black;font-weight:bold;text-align:center;vertical-align:middle">
			<tbody><tr>
			<td id="完成並交卷" onmouseover="mOverControl(this);" onmouseout="mOutControl(this);" onclick="finishExam();">完成並交卷</td></tr></tbody></table></td>                
              <!--&nbsp;&nbsp;<input type="button" name="btnFinish" value="完成並交卷" onClick="finishExam();" class="Button4"></td>-->
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
		<b>版權所有，嚴禁翻印</b>
  </td>  
  <td style="text-align:right;">
		<b>Copyright©2015 MEG LTD</b>
  </td>
  </tr>
</tbody></table>
</td></tr></tbody></table>
<?php include "view/footer.view.php";?>