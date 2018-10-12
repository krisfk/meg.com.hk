<?php
require './config.php';
$lang = isset($_GET['lang']) && in_array($_GET['lang'], $_CONFIG['language_support']) ? htmlspecialchars($_GET['lang']) : 'zh';
require './resources/language/lang.'. $lang .'.php';
require './resources/phpmailer/PHPMailerAutoload.php';
require './resources/classes/func.php';

if(!isset($_SESSION))
	session_start();

$id = isset($_GET['id']) ? $_GET['id'] : 0;
$id = array_key_exists($id, $_LANG['apply_jobs']) ? $id : 0;

$job = $_LANG['apply_jobs'][$id]['name'];

$area = 0;
$ps = $phone = $name = $verifier_number = '';
$sent = false;

if(isset($_POST['send'])){

	$pass = true;
	$errormsg = array();

	$name = htmlspecialchars($_POST['name']);
	$phone = htmlspecialchars($_POST['phone']);
	$ps = htmlspecialchars($_POST['ps']);
	$verifier_number = htmlspecialchars($_POST['verifier_number']);
	$area = is_numeric($_POST['area']) ? $_POST['area'] : 0;

	if(is_empty($name)){
		$errormsg['name'] = $_LANG['input_error']['empty']['name'];
		$pass = false;
	}else if(!is_name($name)){
		$errormsg['name'] = $_LANG['input_error']['format']['name'];
		$pass = false;
	}

	if(is_empty($area) && $area == 0){
		$errormsg['area'] = $_LANG['input_error']['empty']['area'];
		$pass = false;
	}

	if(is_empty($phone)){
		$errormsg['phone'] = $_LANG['input_error']['empty']['phone'];
		$pass = false;
	}else if(!is_phone($phone)){
		$errormsg['phone'] = $_LANG['input_error']['format']['phone'];
	}

	if($verifier_number !== $_SESSION['verifier_number']){
		$errormsg['verifier_number'] = $_LANG['input_error']['format']['verifier_number'];
		$pass = false;
	}

	}

	if($pass){
		$sent = emailToApply($job_position, $name, $_LANG['areas'][$area], $phone, is_empty($ps) ? $_LANG['empty'] : $ps);
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-hk" lang="zh-hk" dir="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="content-language" content="zh-hk">
	<meta http-equiv="content-style-type" content="text/css">
	<meta http-equiv="content-script-type" content="text/javascript">
	<meta name="viewport" content="width=device-width">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<link rel="stylesheet" href="./resources/static/css/main.css" type="text/css" media="all">
    <title><?php echo $_LANG['title'] ?></title>
</head>
<body>
<script type="text/javascript">
	$(function() {
	   $("#apply").click(function(){
	   		$("#apply").attr('disabled','disabled');
	   		$("#target")[0].submit();
	   });
	});

</script>

<div id="apply_form">
<?php if(!empty($errormsg)): ?>
	<div class="error">
		<p><?php echo $_LANG['input_error']['empty']['description'] ?></p>
		<ul>
		<?php foreach ($errormsg as $type => $error): ?>
			<li><p><?php echo $error; ?></p></li>
		<?php endforeach; ?>
		</ul>
	</div>
<?php endif ?>

<p class="hints" style="display:block;"><span class="st">*</span><?php echo $_LANG['apply_form_must'] ?> </p>
<form method="POST" id="target"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) . "?lang=" . $lang . "&id=" . $id ?>" enctype="multipart/form-data" autocomplete="off">
<input type="hidden" name="send" value="1">
<table id="miyazaki" cellpadding="0" cellspacing="0">
<tbody>
	<tr>
	<td><?php echo $_LANG['job_position'] ?>:</td>
	<td><?php echo $_LANG['apply_jobs'][$id]['name'] ?></td>
	</tr>
	<tr>
	<td><?php echo $_LANG['name'] ?>:<span class="st">*</span></td>
	<td>
	<input name="name" type="text" id="name" class="required" value="<?php echo $name ?>"></td>
	</tr>
	<tr>
	<td><?php echo $_LANG['area'] ?>:<span class="st">*</span></td>
	<td>
		<select id="area" name="area">
		<?php foreach ($_LANG['areas'] as $key => $value): ?>
		<?php echo "<option value='$key' ". ($key == $area ? "selected='selected'" : '') .">$value</option>"; ?>
		<?php endforeach;  ?>
		</select>
	</td>
	</tr>
	<tr>
	<td><?php echo $_LANG['phone_number'] ?>:<span class="st">*</span></td>
	<td><input name="phone" type="text" id="phone" class="required" value="<?php echo $phone ?>"></td>
	</tr>
	<tr>
	<tr>
	<td><?php echo $_LANG['ps'] ?>:</td>
	<td><textarea style="width:80%;height:100px;" name="ps" type="text" id="ps" class="required"><?php echo $ps ?></textarea></td>
	</tr>
	<tr>
	<td><?php echo $_LANG['verifier_number'] ?>:<span class="red">*</span></td>
	<td><input type="text" name="verifier_number" id="osolCatchaTxt0" class="inputbox required validate-captcha"><p><img src='./resources/classes/code.php' /></p></td>
	</tr>
	<tr>
		<td>
			<input type="button" name="apply" id="apply" value="<?php echo $_LANG['submit_apply'] ?>">
		</td>
		<td></td>
	</tr>
	</tbody>
	</table>

</form>
<?php if($sent): ?>
<p class="sucess"> <?php echo $_LANG['send_sucessful'] ?></p>
<?php endif; ?>
</div>
</body>
</html>