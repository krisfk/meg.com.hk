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

$total = $model->part2RandCount($paper['part']);
$correctCount = $model->getCorrectCount($paper);
$wrongCount = $total - $correctCount;
$pass = $model->isPass($paper['part'], $correctCount);

if($paper['finish_time']=='0000-00-00 00:00:00'){
	$model->paperFinish($paper);
	$paper = $model->getPaper($paperCode);
}
$time = FormatTimer('zh', strtotime($paper['finish_time']) - strtotime($paper['create_time']));

include 'view/result.view.php';
	
?>