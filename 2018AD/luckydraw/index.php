<?php


header('Location: https://www.hksm.com.hk/2018AD/luckydraw/');


require_once('connection.php');
require_once('setting.php');
$conn = mysql_connect($dbhost, $dbuser, $dbpass,$dbname) or die ('Error connecting to mysql');
mysql_select_db($dbname,$conn);


$result = mysql_query("SELECT * FROM ".$lucky_draw_config_tbname);
$row = mysql_fetch_array($result, MYSQL_ASSOC);
$total_price = $row['no_of_price'];

$tb_num_rows = mysql_num_rows(mysql_query("SELECT * FROM ".$lucky_draw_tbname));

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>2018 香港駕駛學院 週年晚宴 幸運大抽獎</title>
<link rel="stylesheet" href="style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
<script type="text/javascript" src="all.js"></script>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />

    
</head>

<body>
   
       <img class="hksm-logo" src="https://www.hksm.com.hk/eng/images/hksm_logo.png">
    
    <h1 class="heading-title">2018週年晚宴<br/>幸運大抽獎中獎結果</h1>
    
    <a href="javascript:window.location.reload();"><img class="present-icon" src="present.png"></a>
    <div class="container">
   
    <?php if($_GET['a']==1) 
{?>
      <ul class="h_menu">
<li>
    <a href="javascript:void(0);" class="active">中獎結果</a>
    </li>

   
   <li>
    <a href="./admin.php">管理</a>
    
    </li>
</ul>
<?php
		
}?>
    
    <input type="text" placeholder="搜尋待領獎員工 . . ." class="search"><a href="javascript:window.location.reload();" class="refresh-btn">更新結果</a>
    
        
        
     
    <div style="margin: 20px 0 0 0;font-size: 14px;">Remark：已領取獎品的結果將不會再顯示</div>
        
<table class="result-table">

<tr>
<th class="col-1-th" ><span style="color: #ffffff;">獎號</span></th>
<th class="col-2-th" ><span style="color: #ffffff;">中獎員工(待領獎)</span></th>
</tr>
    
    
    <?php

     $diff = $tb_num_rows - $total_price;
    $result = mysql_query("SELECT * FROM ".$lucky_draw_tbname." WHERE price_status=0  ORDER BY price_idx DESC LIMIT $diff,$total_price");
    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
?>
     <tr class="<?php echo $row["staff_id"] =='' ? "hide" : "" ?> result-tr result-tr-<?php echo $row["price_idx"];?>">
    <td class="price_idx_td"><?php echo $row["price_idx"];?></td>
    <td class="staff_id_td"><?php echo $row["staff_id"];?></td>
        
    </tr>
    
    <?php
        
    }
    ?>
  
    
    
</table>
    
       <div class="no-result-blk">未有中獎記錄</div>
       
        </div>
    
    
    <script type="text/javascript">
         var $rows = $('.result-tr').not('.hide');
	
        				$('.no-result-blk').fadeOut(0);

		
	$('.search').keyup(function() {
   
    var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
    
 var result_size =   $rows.show().filter(function() {
        
        var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();

		return !~text.indexOf(val);
    }).hide().size();
		
		if(result_size==$rows.size())
			{
				$('.no-result-blk').fadeIn(0);
				$('.result-table').fadeOut(0);
			}
		else{
				$('.result-table').fadeIn(0);
				$('.no-result-blk').fadeOut(0);
		}
		//alert($rows.size());
//   alert($('.result-tr').not('.hide').size()+' '+$('.result-tr').not('.hide');
    
});
        
        </script>
    
    
</body>
</html>
