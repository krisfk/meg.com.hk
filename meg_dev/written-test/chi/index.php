<?php
require_once 'init.php';

if(isset($_GET['code'])){
	redirect('question.php?code='.$_GET['code']);
} else {
	$model = new Model();
	$code = $model->createPaper(1);
	redirect('question.php?code='.$code);
}

?>