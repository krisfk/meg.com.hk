<?php 
require_once 'init.php';

$model = new Model();

$paperCode = $_GET['code'];
if(!$paperCode) {
	redirect('index.php');
}

if(isset($_POST['submited'])){
	
	$answer = $_POST['chkAnswer'];
	$model->answer($paperCode, $answer);
	redirect('answer.php?code='.$paperCode);
} else {

	$paper = $model->getPaper($paperCode);
	if(!$paper) {
		redirect('index.php');
	}
	
	if(now() >= $paper['expired_time']) {
		redirect('result.php?code='.$paperCode);
	}
	
	$question = $model->getNextQuestion($paper);
	if(!$question) {
		redirect('result.php?code='.$paperCode);
	}
	
	$paperNum = getPaperNum($paper['id']);
	$questionCount = count($paper['questions']);
	$expired_time = strtotime($paper['expired_time']) * 1000;
	$create_time = strtotime($paper['create_time']) * 1000;
//	$pass_time = strtotime($paper['pass_time']) * 1000;
//	$TimeLeft = FormatTimer('zh', strtotime($paper['expired_time']) - time());
	$TimeLeft = FormatTimer('zh', time() - strtotime($paper['create_time']));
	$haveImg = !empty($question['img']);
	include 'view/question.view.php';
	
}
?>