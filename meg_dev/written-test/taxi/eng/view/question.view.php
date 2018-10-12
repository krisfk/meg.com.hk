<?php include "view/header.view.php";?>
<table border=0 cellpadding=0 cellspacing=0 width="100%" height="100%"><tr><!--bgcolor="#666699"-->
<!--<td align="center" valign="middle">-->
<td align="left" valign="top">

<table border=0 cellpadding=0 cellspacing=0 width="770" height="400" bgcolor="white" align="left"><!-- bgcolor="#CCCCFF"-->
  <tr>
    <td colspan="2">
<form name="frmTest" method="post">
<input type="hidden" id="code" name="code" value="<?php echo $paperCode;?>">
<input type="hidden" id="expired_time" name="expired_time" value="<?php echo $expired_time;?>">
<input type="hidden" id="create_time" name="create_time" value="<?php echo $create_time;?>">

<input type="hidden" id="now" name="now" value="<?php echo time();?>">
<input type="hidden" name="submited" value="1">
<table border=0 cellpadding=0 cellspacing=3 width="100%" height="100%">
  <tr>
    <td height="8%">
      <!-- Header Area -->
      <table border=0 cellpadding=3 cellspacing=0 width="100%" height="100%">
        <tr><td colspan="2"><img src="img/test-banner.jpg" width="770" height="118"></td></tr>
        <tr>
          <td width="70%" style="text-align:left;">
            試卷編號: <?php echo $paperNum;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;第 <?php echo $questionCount;?> 條</td>
          <td style="font-weight:bold;font-family:Verdena;">考試時間：<span id="ExamTimer"><?php echo $TimeLeft;?><span></td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td height="36%">
      <!-- Question Area -->
      <table border=0 cellpadding=3 cellspacing=0 width="100%" height="100%">
        <tr>
          <td width="100%" height="85%" colspan="3" align="center">
            <table border=0 cellpadding=3 cellspacing=0 width="100%" height="100%" style="border:3px solid black;background-color:#FFFAD0;">
              <tr>
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
						<td style="text-align:left;"><input type="radio" name="chkAnswer" value="1" onClick="selectAnswer(this);">&nbsp;A. <?php echo $question['answer1'];?></td>
						<?php if(!empty($question['img'])){?><td style="text-align:left;" rowspan=3><img src="img/question/<?php echo $question['img'];?>" border=0></td><?php }?>
					</tr>
					<tr>
						<td style="text-align:left;"><input type="radio" name="chkAnswer" value="2" onClick="selectAnswer(this);">&nbsp;B. <?php echo $question['answer2'];?></td>
					</tr>
					<tr>
						<td style="text-align:left;"><input type="radio" name="chkAnswer" value="3" onClick="selectAnswer(this);">&nbsp;C. <?php echo $question['answer3'];?></td>
					</tr>
					<?php if(isset($question['answer4'])){?>
					<tr>
						<td style="text-align:left;"><input type="radio" name="chkAnswer" value="4" onClick="selectAnswer(this);">&nbsp;D. <?php echo $question['answer4'];?></td>
					</tr>
					<?php }?>
				  </table>
                </td>
              </tr>

            </table>
          </td>
          <!--<td><img src="images/test/title_en.gif" border=0><br><img src="images/test/title_en.gif" border=0><br><img src="images/test/title_en.gif" border=0></td>-->
                   

        </tr>
                            
        <!-- Answer Area -->
        <tr>
          <td style="text-align:left;" width="25%" id="AnswerLabel">
            您選擇的答案是：<input type="hidden" name="txtAnswer" value="">
          </td>
          <td id="Answer" style="color:red;text-align:left;font-weight:bold;" width="40%"></td>
          <td width="35%">&nbsp;</td>          
        </tr>
        
		
        <!-- Answer Chooses -->
        
      </table>
    </td>
  </tr>
  
  
  <tr>
    <td height="30%">
      <!-- Navigation -->
      <table border=0 cellpadding=3 cellspacing=0 width="100%">
        <tr>
           <td style="text-align:left;" width="140">
					<table border=0 cellpadding=3 cellspacing=0 width="120" height="30" style="background-color:#7CFC00;border:1px solid black;font-weight:bold;text-align:center;vertical-align:middle"><tr><td id="確認本題答案" onMouseOver="mOverControl(this);" onMouseOut="mOutControl(this);" onClick="checkAnswer();">確認本題答案</td></tr></table></td><td style="text-align:left;"><table border=0 cellpadding=3 cellspacing=0 width="120" height="30" style="background-color:#7CFC00;border:1px solid black;font-weight:bold;text-align:center;vertical-align:middle"><tr><td id="完成並交卷" onMouseOver="mOverControl(this);" onMouseOut="mOutControl(this);" onClick="finishExam();">完成並交卷</td></tr></table></td>                
              <!--&nbsp;&nbsp;<input type="button" name="btnFinish" value="完成並交卷" onClick="finishExam();" class="Button4"></td>-->
          </tr>
      </table>
    </td>
  </tr>
</table>
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
		<b>Copyright©Hong Kong School of Motoring&nbsp;&nbsp;&nbsp;&nbsp;</b>
  </td>
  </tr>
</table>
</td></tr></table>
<?php include "view/footer.view.php";?>