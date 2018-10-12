<?php
require_once('connection.php');
require_once('func.php');

require_once('setting.php');

$conn = mysql_connect($dbhost, $dbuser, $dbpass,$dbname) or die ('Error connecting to mysql');
mysql_select_db($dbname,$conn);
//$result = mysql_query("SELECT * FROM ".$lucky_draw_config_tbname, $conn);
//$num_of_price = mysql_num_rows($result);


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
<script type="text/javascript">

    var price_status_arr = Array();
    <?php
           for($i=0;$i<sizeof($_LANG['price_status']);$i++)
                {
    ?>
            price_status_arr.push("<?php echo $_LANG['price_status'][$i]?>");
    <?php
           }
    ?>
//    console.log(price_status);
    </script>
    <?php ?>
<script type="text/javascript" src="all.js"></script>
    
<!-- Magnific Popup core CSS file -->
<link rel="stylesheet" href="magnific-popup.css">
<!-- Magnific Popup core JS file -->
<script src="jquery.magnific-popup.js"></script>
    
</head>

<body>
    
 
    
    <div class="container">
    <ul class="h_menu">
<li>
    <a href="./">中獎結果</a>
    </li>
<li>
    <a href="javascript:void(0);" class="active">管理</a>
    
    </li>
</ul>

    
    <input type="text" placeholder="Search..." class="search">
        
     <!--   <a href="javascript:void(0);">抽獎狀況</a>
        <a href="javascript:void(0);">領獎</a>-->
        
        <br/>
        
        
        <div class="price-no-div"><span class="no-price-txt">獎品數目：</span><span class="price-span-value"><?php echo $total_price;?></span>
            <input  onkeypress='return event.charCode >= 48 && event.charCode <= 57'  type="text" class="price-input-value" value="<?php echo $total_price;?>">
            <a href="javascript:void(0);" class="edit-price-no-btn">更改</a>
            <a href="javascript:void(0);" class="save-price-no-btn">儲存</a>
        
        </div>
        
<table class="admin-table">

<tr>
<th style="background-color: #595959; width: 100px"><span style="color: #ffffff;">獎號</span></th>
<th style="background-color: #595959; width: 150px;"><span style="color: #ffffff;">中獎員工</span></th>
<th style="background-color: #595959; width: 150px;"><span style="color: #ffffff;">姓名</span></th>
<th style="background-color: #595959; width: 150px;"><span style="color: #ffffff;">取獎</span></th>
<th style="background-color: #595959; width: 150px;"><span style="color: #ffffff;"></span></th>

    </tr>
    
    <!-- 未抽/已取獎 -->
    
    <?php
    

    
//    echo $total_price;
    
   //SELECT * FROM 2018ad_luckydraw ORDER BY price_idx DESC LIMIT 300,10
    $diff = $tb_num_rows - $total_price;

    $result = mysql_query("SELECT * FROM ".$lucky_draw_tbname." ORDER BY price_idx DESC LIMIT $diff,$total_price");

                          
    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
   
   ?>
    
     <tr class="result-tr result-tr-<?php echo $row["price_idx"];?>">
    <td class="price_idx_td"><?php echo $row["price_idx"];?></td>
    <td class="staff_id_td"><?php echo $row["staff_id"];?></td>
    <td class="staff_name_td"><?php echo get_staff_name($stb,$row["staff_id"]);?></td>
    <td class="price_status_td"><?php echo $_LANG['price_status'][$row["price_status"]]; ?></td>
    <td><a href="#form-blk"  class="edit-result-btn" data-staff-id="<?php echo $row["staff_id"];?>" data-price-status="<?php echo $row["price_status"]; ?>" data-staff-name="name" data-price-idx="<?php echo $row["price_idx"]; ?>">輸入</a></td>
        
    </tr>
    
    <?php
    }
    ?>
   

    
    <?php
    ?>
    
    
</table>
    
        
        <div class="form-blk white-popup mfp-hide" id="form-blk">
        
            <div class="rfid-statement" >
                
                <div class="txt">請拍咭員工證</div>
                <div><img class="rfid-icon" src="image/rfid-icon.png"></div>
                <div>
                    
                    <table class="rfid-staff-info-table">
                        <tr><td class="rfid-col-1">Staff No:</td><td class="rfid-staff-no-td"></td></tr>
                        <tr><td class="rfid-col-1">Staff Name:</td><td class="rfid-staff-name-td"></td></tr>
                        </table>
                 
                    
                <a href="javascript:void(0);" class="rfid-back-button">返回</a>
                    
                    <a href="javascript:void(0);" class="rfid-input-confirm-button">確定</a>
                
                    
                    <div class="rfid-code-div"><input type="text" class="rfid-code"></div>
                
                </div>
            </div>
<!--    <h2>更改結果：</h2>
-->        <table>
            <tr><td class="col-1">獎號</td><td><span class="price-idx-val"></span></td>	</tr>
            <tr><td class="col-1">中獎員工 (staff no.)</td>	<td>
                <input type="text" class="staff-id-val">            
                </td></tr>
<!--            <tr><td class="col-1">姓名</td>	<td><span class="staff-name-val"></span></td></tr>
-->            <tr><td class="col-1">取獎</td><td>

            <?php
         
            ?>
            <select class="price-status-val">
                <?php
                for($i=0;$i<sizeof($_LANG['price_status']);$i++)
                {
                    ?>
                              <option value="<?php echo $i;?>"><?php echo $_LANG['price_status'][$i];?></option>
                <?php
                }
                ?>
            </select>
            
            </td>	</tr>
            
            
            </table>
        
            
<a href="javascript:void(0);" class="rfid-input-btn">拍咭</a>     
            
<a href="javascript:void(0);" class="edit-form-save-btn">更新</a>        
            <a href="javascript:void(0);" class="edit-form-cancel-btn">  取消</a>        

            
        </div>
        
        </div>
    

    <script type="text/javascript">
         var $rows = $('.result-tr');
$('.search').keyup(function() {
   
    var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
    
    $rows.show().filter(function() {
        var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
        return !~text.indexOf(val);
    }).hide();
    

});
        
        </script>
    
</body>
</html>


