<?php
require_once 'init.php';

/*test db
$cn = mysql_connect('localhost', 'meghongkong', 'meg_369');
if (!$cn) {
    die('Could not connect: ' . mysql_error());
}
echo 'Connected successfully';
mysql_select_db("admin_meghongkong", $cn);
$query = mysql_query('select * from taxi_setting');
$result = mysql_fetch_row($query);
dump($result);
mysql_close($cn);
*/

if(isset($_GET['code'])){
	redirect('question.php?code='.$_GET['code']);
}

if(isset($_GET['part'])){
	$model = new Model();
	$code = $model->createPaper($_GET['part']);
	redirect('question.php?code='.$code);
}

include 'view/index.view.php';

?>

