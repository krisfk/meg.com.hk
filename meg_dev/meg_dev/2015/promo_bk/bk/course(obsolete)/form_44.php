<html>

	<head>

<?php // Matthew 2014-01-23 Update page information ?>
<title>CNY Promotion 2014</title>
<meta forua="true" http-equiv="Cache-Control" content="max-age=0"/>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="robots" content="index, follow" />
<meta name="keywords" content="駕駛, 駕駛學校, 駕駛學院, driving school" />
<meta name="description" content="CNY Promotion 2014 優惠課程" />

<style>

	body {
		background-color: black;
		color: white;
	}

	#page {
		background-color: black;
	}

	.section {
		padding: 20px;
	}

</style>

<script type="text/javascript">

function submitForm() {

	var sRE = new RegExp("^[0-9]");<?php // Matthew 2014-01-23 For tel no ?>
	var sRE3 = new RegExp("^([0-9a-zA-Z]+([_.-]?[0-9a-zA-Z]+)*@[0-9a-zA-Z]+[0-9,a-z,A-Z,.,-]*(.){1}[a-zA-Z]{2,4})+$");<?php // Matthew 2014-01-23 For email ?>

	var frm = document.frmRegistration;

	if (frm.txtName.value == "" && frm.txtTel.value == "" && frm.txtEmail.value == "") {
		alert("請輸入姓名 / 電郵 / 聯絡電話!");
		return false;
	}

	if (frm.txtName.value == "") {
		alert("請輸入姓名!");
		return false;
	}

	if (frm.txtEmail.value.match(sRE3) == null)
	{
		alert("請輸入正確電郵地址!");
		return false;
	}

	if ((frm.txtTel.value).match(sRE) == null)
	{
		alert("請輸入正確聯絡電話!");
		return false;
	}

	if (frm.course.value == "0") {
		alert("請選擇學車課程!");
		return false;
	}

	return true;
}

function trim(stringToTrim) {

	return stringToTrim.replace(/^\s+|\s+$/g,"");
}

</script>

<script>

  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-78524347-1', 'auto');
  ga('send', 'pageview');

</script>

	</head>

	<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
		<div id='page' align='left'>

<div class='section'>
	<div><img alt="band" border="0" src="band_1k-01.png" width="1000" height="165" usemap="#bandmap"></div>
	<div><img alt="ad" border="0" src="ad_1k-01.png" width="1000" height="786"></div>
</div>

<div class='section'>
	<font size='6'><b>即時報名 Enroll Now!</b></font>
</div>

<div class='section'>
	<div><a href='http://www.meg.hk/site/index.php?main_page=product_info&cPath=64&products_id=653'><img alt="chart1" border="0" align="middle" src="chart1_1k.jpg"></a></div>
	<div><a href='http://www.meg.hk/site/index.php?main_page=product_info&cPath=64&products_id=625'><img alt="chart2" border="0" align="middle" src="chart2_1k.jpg"></a></div>
	<div><a href='http://www.meg.hk/site/index.php?main_page=product_info&cPath=64&products_id=655'><img alt="chart3" border="0" align="middle" src="chart3_1k.jpg"></a></div>
	<div><a href='http://www.meg.hk/site/index.php?main_page=product_info&products_id=626'><img alt="chart4" border="0" align="middle" src="chart4_1k.jpg"></a></div>
</div>

<div class='section'>

	<form method="post" action="Savemeg_reg.php" name="frmRegistration" onSubmit="return submitForm();" accept-charset="UTF-8">

		<table id="Table_01" width="800" border="0" cellpadding="2" cellspacing="2">

			<tr><td colspan="3"><font size="4px"><b>如需要更多資訊，請填妥以下資料，我們將有專人盡快與您聯絡。</b></font></td></tr>

			<tr><td colspan="3"><font size="1px">&nbsp;</font></td></tr>

			<?php // Matthew 2014-01-23 Course Start ?>
			<tr>
				<td width="40%">學車課程：</td>
				<td colspan=2 width="70%">
					<select name="course">
					<option value="0" selected>&nbsp;</option>
					<option value="1">1. 私家車</option>
					<option value="2">2. 輕型貨車</option>
					<option value="3">3. 電單車</option>
					<option value="4">4. 其他課程</option>
					</select>
				</td>
			</tr>
			<?php // Matthew 2014-01-23 Course End ?>

			<tr><td colspan="3"><font size="1px">&nbsp;</font></td></tr>

			<tr><td width="40%">姓名：</td><td colspan=2 width="70%"><input type="text" name="txtName" value = ""></td></tr>

			<tr><td colspan="3"><font size="1px">&nbsp;</font></td></tr>

			<tr><td>聯絡電話：</td><td colspan="2"><input type="text"  name="txtTel" value = ""></td></tr>

			<tr><td colspan="3"><font size="1px">&nbsp;</font></td></tr>

			<tr><td>電郵地址：</td><td colspan="2"><input type="text"  name="txtEmail" value = ""></td></tr>

			<tr><td colspan="3"><font size="1px">&nbsp;</font></td></tr>

			<tr><td>居住地區：</td><td>
				<select name="area">
					<option value="0" selected>&nbsp;</option>
					<option value="1">中西區</option>
					<option value="2">東區</option>
					<option value="3">南區</option>
					<option value="4">灣仔區</option>
					<option value="5">油尖旺</option>
					<option value="6">深水步</option>
					<option value="7">九龍城</option>
					<option value="8">黃大仙</option>
					<option value="9">觀塘</option>
					<option value="10">葵青</option>
					<option value="11">荃灣</option>
					<option value="12">元朗</option>
					<option value="13">屯門</option>
					<option value="14">北區</option>
					<option value="15">大埔區</option>
					<option value="16">沙田區</option>
					<option value="17">西貢區</option>
					<option value="18">離島區</option>
				</select>
			</td></tr>

			<tr><td colspan="3"><font size="1px">&nbsp;</font></td></tr>

			<tr><td>年齡：</td><td>
				<select name="age">
					<option value="0" selected>&nbsp;</option>
					<option value="1">18-25</option>
					<option value="2">26-30</option>
					<option value="3">31-35</option>
					<option value="4">36-40</option>
					<option value="5">40+</option>
				</select>
			</td></tr>

			<tr><td colspan="3"><font size="1px">&nbsp;</font></td></tr>

			<tr><td>職業：</td><td>
				<select name="occupation">
					<option value="0" selected>&nbsp;</option>
					<option value="1">管理階層</option>
					<option value="2">專業人士</option>
					<option value="3">教師</option>
					<option value="4">文職</option>
					<option value="5">工人</option>
					<option value="6">主婦</option>
					<option value="7">學生</option>
					<option value="8">自僱</option>
					<option value="9">待業</option>
					<option value="10">退休</option>
					<option value="11">其他</option>
				</select>
			</td></tr>

			<tr><td colspan="3"><font size="1px">&nbsp;</font></td></tr>

			<tr>
				<td colspan="2" width="70%">&nbsp;</td>
				<td align="right">
					<input type="submit" name="submit" value="提交 Submit now!" style="height:3em; width:20em; font-size:16px;font-weight:bold;font-family:Arial;padding-left:1px;padding-right:1px;padding-top:1px;padding-bottom:1px;;text-align:center;">
				</td>
			</tr>

			<tr><td colspan="3"><font size="1px">&nbsp;</font></td></tr>

			<tr><td colspan='3'>閣下提供之資料只作MEG網上報名及查詢用途。</td></tr>

		</table>

		<input type="hidden" name="txtFormNo" value="44"><?php // Matthew 2014-01-23 22 For CNY promotion 2014 2014-01-23 ?>

	</form>

</div>

<div class='section'><img alt="band" border="0" src="band_1k-01.png" width="1000" height="165" usemap="#bandmap"></div>

		</div> <!-- /page -->

		<map name='bandmap'>
			<area shape="rect" coords="91,32,234,114" href="http://www.meg.hk/" alt="meg">
			<area shape="rect" coords="294,27,482,155" href="http://www.hksm.com.hk/tc/index" alt="hksm">
			<area shape="rect" coords="520,29,657,125" href="http://freewaydriving.com.hk/catalog/index.php" alt="freeway">
			<area shape="rect" coords="719,29,926,119" href="http://a1driving.com.hk/main-page.html" alt="a1">
		</map>

	</body>

</html>