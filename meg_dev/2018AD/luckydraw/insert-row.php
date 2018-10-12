
<?php
require_once('connection.php');

$conn = mysql_connect($dbhost, $dbuser, $dbpass,$dbname) or die ('Error connecting to mysql');

mysql_select_db($dbname,$conn);


for(i=0;i<1000;i++)
{
    
$sql = "INSERT INTO ".$lucky_draw_tbname." (price_idx)
VALUES (".$i.")";

$result = mysql_query($sql);


if ($result) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" .mysql_error();
}


}



mysql_close($conn);


?>

