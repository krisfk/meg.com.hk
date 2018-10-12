<?	$expire_dt = date_create_from_format('Y-m-d H:i:s', $expire_dte);
	$current_dt = new DateTime('now');
	$is_expire = $current_dt > $expire_dt;
?>

<!DOCTYPE html>
<html>

<head>

	<title><?=$page_title?></title>
	<meta charset="UTF-8">

	<script type="text/javascript">

function submitForm() {

	var sRE = new RegExp("^[0-9]");
	var sRE3 = new RegExp("^([0-9a-zA-Z]+([_.-]?[0-9a-zA-Z]+)*@[0-9a-zA-Z]+[0-9,a-z,A-Z,.,-]*(.){1}[a-zA-Z]{2,4})+$");

	var frm = document.frmRegistration;

	if (frm.txtName.value == "" && frm.txtTel.value == "" && frm.txtEmail.value == "") {
		alert("請輸入姓名 / 電郵 / 聯絡電話!");
		return false;
	}

	if (frm.txtName.value == "") {
		alert("請輸入姓名!");
		return false;
	}

	if (frm.txtEmail.value.match(sRE3) == null) {
		alert("請輸入正確電郵地址!");
		return false;
	}

	if ((frm.txtTel.value).match(sRE) == null) {
		alert("請輸入正確聯絡電話!");
		return false;
	}

	if (frm.course.value == "0") {
		alert("請選擇學車課程!");
		return false;
	}

	frm.txtFormNo.value = '<?=$formno?>';

	return true;
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

<body style='background-color:black;color:white'>

<? if ($is_expire) { echo $expire_msg; } else { ?>

	<div style='max-width:800px'>

		<div>
			<table cellpadding="0" border="0" cellspacing="0" width='100%' style='min-width:200px'>
				<tr>
					<td width='25%' valign="middle"><a href='http://www.meg.hk/'                            ><img src="slice_0_0.png" style="width:100%;border-width:0px" alt="meg"    ></td>
					<td width='22%' valign="middle"><a href='http://www.hksm.com.hk/tc/index.html'               ><img src="slice_0_1.png" style="width:100%;border-width:0px" alt="hksm"   ></td>
					<td width='23%' valign="middle"><a href='http://freewaydriving.com.hk/catalog/index.php'><img src="slice_0_2.png" style="width:100%;border-width:0px" alt="freeway"></td>
					<td width='30%' valign="middle"><a href='http://a1driving.com.hk/main-page.html'        ><img src="slice_0_3.png" style="width:100%;border-width:0px" alt="a1"     ></td>
				</tr>
			</table>
		</div>

		<div><img alt="ad" border="0" src="ad_1k-01.jpg" width="100%" style='vertical-align:middle;min-width:200px' /></div>

		<div style='padding:10px 0px'>

			<div><b>讓700萬人都震撼的學車優恵！</b></div>
			<div><b>現報讀香港駕駛學院15堂私家車/輕型貨車課程，即送你考試攻略A，內容包括：</b></div>
			<div><b>-模擬考試</b></div>
			<div><b>-基礎訓練</b></div>
			<div><b>-獨立訓練</b></div>
			<div><b>-長距離駕駛練習</b></div>
			<div><b>總值超過$2,000</b></div>

			<br>

			<div><b>帽子戲法點止咁簡單！MEG哥仲變出考試攻略B！</b></div>
			<div><b>現報讀香港駕駛學院20堂私家車/輕型貨車課程，即送你考試攻略B，內容包括：</b></div>
			<div><b>-首次重考保障</b></div>
			<div><b>-基礎訓練</b></div>
			<div><b>-模擬考試</b></div>
			<div><b>總值超過$2,800</b></div>

			<div><b>優恵期有限，從速報名！</b></div>

		</div>

		<div style='padding:10px 0px'><font size='6'><b>即時報名 Enroll Now!</b></font></div>

		<div style='padding:10px 0px'><font size="4px"><b>請填妥以下資料，我們將有專人盡快與您聯絡。</b></font></div>

		<div style='padding:10px 0px'>
			<form method="post" action="Savemeg_reg.php" name="frmRegistration" onSubmit="return submitForm();" accept-charset="UTF-8">

				<div style='padding:5px 0px'>
					<div style='display:inline-block;vertical-align: middle;min-width:100px'>學車課程：</div>
					<div style='display:inline-block;vertical-align: middle'>
						<select name="course">
							<option value="0" selected>&nbsp;</option>
							<option value="4">羊年咩咩咩咩大優惠</option>
							<option value="1">香港駕駛學院課程</option>
							<option value="2">A1駕駛學院課程</option>
							<option value="3">自由學課程</option>
						</select>
					</div>
				</div>

				<div style='padding:5px 0px'>
					<div style='display:inline-block;vertical-align: middle;min-width:100px'>姓名：</div>
					<div style='display:inline-block;vertical-align: middle'>
						<input type="text" name="txtName" />
					</div>
				</div>

				<div style='padding:5px 0px'>
					<div style='display:inline-block;vertical-align: middle;min-width:100px'>聯絡電話：</div>
					<div style='display:inline-block;vertical-align: middle'>
						<input type="text" name="txtTel" size=10 />
					</div>
				</div>

				<div style='padding:5px 0px'>
					<div style='display:inline-block;vertical-align: middle;min-width:100px'>電郵地址：</div>
					<div style='display:inline-block;vertical-align: middle'>
						<input type="text" name="txtEmail" />
					</div>
				</div>

				<div style='padding:5px 0px'>
					<div style='display:inline-block;vertical-align: middle;min-width:100px'>居住地區：</div>
					<div style='display:inline-block;vertical-align: middle'>
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
					</div>
				</div>

				<div style='padding:5px 0px'>
					<div style='display:inline-block;vertical-align: middle;min-width:100px'>年齡：</div>
					<div style='display:inline-block;vertical-align: middle'>
						<select name="age">
							<option value="0" selected>&nbsp;</option>
							<option value="1">18-25</option>
							<option value="2">26-30</option>
							<option value="3">31-35</option>
							<option value="4">36-40</option>
							<option value="5">40+</option>
						</select>
					</div>
				</div>

				<div style='padding:5px 0px'>
					<div style='display:inline-block;vertical-align: middle;min-width:100px'>職業：</div>
					<div style='display:inline-block;vertical-align: middle'>
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
					</div>
				</div>

				<div style='padding:20px 0px'><center><input type="submit" name="submit" value="提交 Submit now!" style='padding:10px'/></center></div>

				<input type="hidden" name="txtFormNo" value="" />

			</form>
		</div>

		<div style='padding:10px 0px'>閣下提供之資料只作MEG網上報名及查詢用途。</div>

		<div>
			<table cellpadding="0" border="0" cellspacing="0" width='100%' style='min-width:200px'>
				<tr>
					<td width='25%' valign="middle"><a href='http://www.meg.hk/'                            ><img src="slice_0_0.png" style="width:100%;border-width:0px" alt="meg"    ></td>
					<td width='22%' valign="middle"><a href='http://www.hksm.com.hk/tc/index.html'               ><img src="slice_0_1.png" style="width:100%;border-width:0px" alt="hksm"   ></td>
					<td width='23%' valign="middle"><a href='http://freewaydriving.com.hk/catalog/index.php'><img src="slice_0_2.png" style="width:100%;border-width:0px" alt="freeway"></td>
					<td width='30%' valign="middle"><a href='http://a1driving.com.hk/main-page.html'        ><img src="slice_0_3.png" style="width:100%;border-width:0px" alt="a1"     ></td>
				</tr>
			</table>
		</div>

	</div>

<? } ?>

</body>

</html>