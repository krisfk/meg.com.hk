<?php 
require_once 'init.php';

$model = new Model();

$paperCode = $_GET['code'];
if(!$paperCode) {
	redirect('index.php');
}

$paper = $model->getPaper($paperCode);
if(!$paper) {
	redirect('index.php');
}

if(now() >= $paper['expired_time']) {
	redirect('result.php?code='.$paperCode);
}

$question = $model->getLastAnswer($paper);
if(!$question) {
	redirect('question.php?code='.$paperCode);
}

$paperNum = getPaperNum($paper['id']);
$questionCount = count($paper['questions']);
$TimeLeft = FormatTimer('zh', strtotime($paper['expired_time']) - time());
//$TimeLeft = FormatTimer('zh', time() - strtotime($paper['create_time']));
$haveImg = !empty($question['img']);
$userAnswer = translateAnswer($question['user_answer']);
$txtAnswer = translateAnswer($question['answer']);
$correct = $question['answer']==$question['user_answer'];
$haveNext = $model->getNextQuestion($paper) ? true : false;
$expired_time = strtotime($paper['expired_time']) * 1000;
$create_time = strtotime($paper['create_time']) * 1000;
//$pass_time = strtotime($paper['pass_time']) * 1000;
include 'view/answer.view.php';

?>