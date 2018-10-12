<html>

<head>

<?php // Matthew 2014-01-23 Update page information ?>
<title>PDI Course</title><? // !!! Matthew 2014-07-14 Title?>
<meta forua="true" http-equiv="Cache-Control" content="max-age=0"/>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="robots" content="index, follow" />
<meta name="keywords" content="駕駛, 駕駛學校, 駕駛學院, driving school" />
<meta name="description" content="PDI Course" /><? // !!! Matthew 2014-07-14 Description?>

<script type="text/javascript">

function submitForm() {

	var sRE = new RegExp("^[0-9]");<?php // Matthew 2014-01-23 For tel no ?>
	var sRE3 = new RegExp("^([0-9a-zA-Z]+([_.-]?[0-9a-zA-Z]+)*@[0-9a-zA-Z]+[0-9,a-z,A-Z,.,-]*(.){1}[a-zA-Z]{2,4})+$");<?php // Matthew 2014-01-23 For email ?>
	var sRE4 = new RegExp("^G[0-9]-[0-9]{6}$");<?php // Matthew 2014-11-18 For application no ?>

	var frm = document.frmRegistration;

	if (frm.voucher_no.value.match(sRE4) == null) {<?php // Matthew 2014-11-18 For application no ?>
		alert("請輸入正確申請編號!");
		return false;
	}

	if (frm.txtName.value == "" && frm.area.value == "" && frm.txtTel.value == "" && frm.txtEmail.value == "") {
		alert("請輸入姓名 / 性別 / 聯絡電話 / 電郵地址!");
		return false;
	}

	if (frm.txtName.value == "") {
		alert("請輸入姓名!");
		return false;
	}

	if (frm.area.value == "") {
		alert("請輸入性別!");
		return false;
	}

	if (frm.txtTel.value.match(sRE) == null) {
		alert("請輸入正確聯絡電話!");
		return false;
	}

	if (frm.txtEmail.value.match(sRE3) == null) {
		alert("請輸入正確電郵地址!");
		return false;
	}

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

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" style='background-color:black;color:white'>

<?
	$expire = '2015-12-31 23:59:59'; // Set expiry date

	$expire_dt = date_create_from_format('Y-m-d H:i:s', $expire);
	$current_dt = new DateTime('now');

	if ($current_dt > $expire_dt) {

	// 2014-08-01 Matthew Expire message Start
?>
	此推廣活動已完結,謝謝!
<?
	// 2014-08-01 Matthew Expire message End

	} else { ?>

	<div><img alt="ad" border="0" src="ad_1k_58.png" width="1000" height="951" usemap="#brandmap"></div>

	<div style='padding:20px 0px'>如需要更多資訊，請填妥以下資料，我們將有專人盡快與您聯絡。</div>

	<div style='padding:20px 0px'>
		<form method="post" action="Savemeg_reg.php" name="frmRegistration" onSubmit="return submitForm();" accept-charset="UTF-8">

			<div style='padding:10px'>
				<div style='display:inline-block;width:150px'>申請編號：</div>
				<div style='display:inline-block;'><input type="text" name="voucher_no" value = ""></div>
				<div style='display:inline-block'>(列印於運輸署考試申請書覆函之右上角)</div>
			</div>

			<div style='padding:10px'>
				<div style='display:inline-block;width:150px'>姓名：</div>
				<div style='display:inline-block;'><input type="text" name="txtName" value = ""></div>
				<div style='display:inline-block'>(身份證上姓名)</div>
			</div>

			<div style='padding:10px'>
				<div style='display:inline-block;width:150px'>性別：</div>
				<div style='display:inline-block'><input type="radio" name="security_code" value="M">男</div>
				<div style='display:inline-block'><input type="radio" name="security_code" value="F">女</div>
			</div>

			<div style='padding:10px'>
				<div style='display:inline-block;width:150px'>日間聯絡電話：</div>
				<div style='display:inline-block;'><input type="text"  name="txtTel" value = ""></div>
			</div>

			<div style='padding:10px'>
				<div style='display:inline-block;width:150px'>電郵：</div>
				<div style='display:inline-block;'><input type="text"  name="txtEmail" value = ""></div>
			</div>

			<div style='padding:20px'>
				<input type="submit" name="submit" value="提交 Submit now!" style="height:3em; width:15em; font-size:16px; font-weight:bold">
			</div>

			<div><input type="hidden" name="course" value="1"></div>
			<div><input type="hidden" name="area" value="1"></div>
			<div><input type="hidden" name="age" value="1"></div>
			<div><input type="hidden" name="occupation" value="1"></div>

			<div><input type="hidden" name="txtFormNo" value="58"></div><?php // !!! Matthew 2014-01-23 22 For PDI Course ?>

		</form>
	</div>

	<div style='padding:20px 0px'>
		<div>個人資料收集聲明:</div>
		<div>1) 是次推廣所收集的個人資料只作登記「私人駕駛教師考試備戰課程」用途</div>
		<div>2) 在遞交個人資料後即同意MEG Limited將不定期向提供者發放有關「私人駕駛教師考試備戰課程」的最新資料</div>
	</div>

<? } ?>

</body>

</html>