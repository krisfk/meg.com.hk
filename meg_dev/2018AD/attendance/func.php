<?php

/*$lucky_draw_tbname = "2018ad_luckydraw";
$lucky_draw_config_tbname = "2018ad_luckydraw_config";*/

require_once('connection.php');

$conn = mysql_connect($dbhost, $dbuser, $dbpass,$dbname) or die ('Error connecting to mysql');

mysql_select_db($dbname,$conn);


$ldtb=$lucky_draw_tbname;
$ldctb=$lucky_draw_config_tbname;
$stb= $staff_info_tbname;




if($_POST['func'])
{

    $func = $_POST['func'];
    
    switch($func)
    {
        case 'get_staff_info': 
            $func($stb);
            break;   
//        default:
//            $func($ldtb,$ldctb,$stb);

    }
    
}


/*
function update_no_of_price($ldtb,$ldctb,$stb,$conn)
{
    
    $num_of_price = mysql_num_rows(mysql_query("SELECT * FROM ".$ldtb, $conn));

//echo 999;
    $new_num_of_price = $_POST['num_of_price'];

    $sql = "UPDATE ".$ldctb." SET no_of_price=$new_num_of_price";
//    echo $sql;
    mysql_query($sql) or die(mysql_error());
 
    if($new_num_of_price>$num_of_price)
    {
         $diff =$new_num_of_price-$num_of_price;
    
        $from = $num_of_price+1;
        for($i=$from;$i<=$new_num_of_price;$i++)
        {
            $sql = "INSERT INTO ".$ldtb." (price_idx) VALUES (".$i.")";
            mysql_query($sql) or die(mysql_error());
        }
        
        
    }
    
    echo 'success';
    
    
        
}*/
/*
function update_price_record($ldtb,$ldctb,$stb)
{
        $price_idx = $_POST['price_idx'];
        $staff_id = $_POST['staff_id'];
        $price_status = $_POST['price_status'];

    $sql = "UPDATE ".$ldtb." SET 
    staff_id='$staff_id',
    price_status=$price_status,
    last_update_by='admin name',
    last_update_time=NOW()    
    WHERE price_idx=$price_idx";

    mysql_query($sql) or die(mysql_error());

//    echo $price_idx; //succeed
    
    $data =  json_encode(array("price_idx"=>$price_idx,"staff_name"=>get_staff_name($stb,$staff_id)));
    
    //    $data .= "{price_idx: '".$price_idx."', staff_name: '".$staff_name."'}";
    echo $data;

    
    
    
    

}*/

/*function get_staff_name($stb,$staff_id)
{
      $row = mysql_fetch_array(mysql_query("SELECT staff_name FROM ". $stb." WHERE staff_no='".$staff_id."'"), MYSQL_ASSOC);
    return $row['staff_name'];    
}
*/
function get_staff_info($stb)
{
    $rfid_code=$_POST['rfid_code'];
    $rfid_code = str_replace('<br />', '', $rfid_code);
    
    $staff_no=$_POST['staff_no'];

    
    $row = !$staff_no ? mysql_fetch_array(mysql_query("SELECT * FROM ". $stb." WHERE rfid_code='".$rfid_code."'"), MYSQL_ASSOC) :
                                  mysql_fetch_array(mysql_query("SELECT * FROM ". $stb." WHERE staff_no='".$staff_no."'"), MYSQL_ASSOC) ;
    
    //$text = str_replace(' ', '_', $text);

//0000323278

    
    
    $data =  json_encode(array("staff_name"=>$row['staff_name'],
                                             "staff_no"=>$row['staff_no'],
                                             "department"=>$row['dept_code'],
                                             "center"=>$row['center_code'],
                                             "table"=>$row['table_no']
                                            ));
//    echo $row['dept_code']. ' ' . $row['center_code']; 
    
    
    if($row['dept_code'] !='' && $row['center_code'] !='') 
    {
        $staff_no=$row['staff_no'];
//        echo "UPDATE ".$stb." SET arrive=1,arrive_time=NOW() WHERE staff_no ='$staff_no'";
        mysql_query("UPDATE ".$stb." SET arrive=1,arrive_time=NOW() WHERE staff_no ='$staff_no'") or die(mysql_error());
    }
    
    echo $data;
    //echo $row['staff_name'].' '.$row['staff_no'];
    
}


mysql_close($conn);

?>