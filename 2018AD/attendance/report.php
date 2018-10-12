<?php

header('Location: https://www.hksm.com.hk/2018AD/attendance/report.php');


require_once( 'connection.php' );
require_once( 'func.php' );


$conn = mysql_connect( $dbhost, $dbuser, $dbpass, $dbname )or die( 'Error connecting to mysql' );
mysql_select_db( $dbname, $conn );


//$result = mysql_query( "SELECT * FROM " . $lucky_draw_config_tbname );
//$row = mysql_fetch_array( $result, MYSQL_ASSOC );
//$total_price = $row[ 'no_of_price' ];


?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>2018 香港駕駛學院 週年晚宴 出席報告</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
    <!--<script type="text/javascript" src="all.js"></script>
-->

    <script type="text/javascript" src="moment.js"></script>
    <script type="text/javascript" src="moment-with-locales.js"></script>
            <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />

</head>

<body>

  <!--  <a href="javascript:void(0);" class="enable-input">enable key input</a>
    <input type="text" class="staff-no-input" placeholder="input the staff no...">-->

    <input type="text" class="staff-rfid-code">
    <img class="hksm-logo" src="https://www.hksm.com.hk/eng/images/hksm_logo.png">

    <h1 class="heading-title">- 2018週年晚宴報到系統 出席報告 -</h1>

    <div class="container">

        <div id="time"></div>

        <?php
        $dpt_total_staff = mysql_num_rows( mysql_query( "SELECT * FROM $staff_info_tbname WHERE dept_code ='CCD' " ) );
         $dpt_staff_arive = mysql_num_rows( mysql_query( "SELECT * FROM $staff_info_tbname WHERE dept_code ='CCD' AND arrive=1 " ) );
         $dpt_staff_not_arrive = mysql_num_rows( mysql_query( "SELECT * FROM $staff_info_tbname WHERE dept_code ='CCD' AND arrive=0 " ) );

        ?>
        <a class="table-a" href="javascript:void(0);">CCD　(人數：<?php echo $dpt_total_staff;?> 出席：<?php echo $dpt_staff_arive;?> 未出席：<?php echo $dpt_staff_not_arrive;?>)</a>

        <div class="list-table-div">
        <table class="list-table">

    <tr>
<th style="background-color: #595959;width: 62px;"><span style="color: #ffffff;">員工號碼</span></th>
<th style="background-color: #595959;width: 175px;"><span style="color: #ffffff;">員工姓名</span></th>
<th style="background-color: #595959;width: 50px;"><span style="color: #ffffff;">部門</span></th>
<th style="background-color:#595959;"><span style="color: #ffffff;">地區</span></th>
<!--<th style="background-color: #595959;"><span style="color: #ffffff;">枱號</span></th>
--><th style="background-color: #595959;"><span style="color: #ffffff;">出席</span></th>
</tr>

            <?php
            $result = mysql_query("SELECT * FROM $staff_info_tbname WHERE dept_code = 'CCD' ORDER BY arrive ASC");
                while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
            ?>
             <tr>
            <td><?php echo $row['staff_no'];?></td>
            <td><?php echo $row['staff_name'];?></td>
            <td><?php echo $row['dept_code'];?></td>
            <td><?php echo $row['center_code'];?></td>
<!--            <td><?php echo $row['table_no'];?></td>
-->            <td class="<?php echo ( $row['arrive']=='0') ? 'red' : ''; ?>"><?php echo $row['arrive'];?></td>
            </tr>
            <?php
                    }
            ?>
    
        </table>
            </div>
        
            <?php
        $dpt_total_staff = mysql_num_rows( mysql_query( "SELECT * FROM $staff_info_tbname WHERE dept_code ='CP' " ) );
         $dpt_staff_arive = mysql_num_rows( mysql_query( "SELECT * FROM $staff_info_tbname WHERE dept_code ='CP' AND arrive=1 " ) );
        ?>
        <a class="table-a" href="javascript:void(0);">CP:(人數:<?php echo $dpt_total_staff;?> 出席:<?php echo $dpt_staff_arive;?>)</a>

        
                <div class="list-table-div">

          <table class="list-table">

    <tr>
<th style="background-color: #595959;width: 62px;"><span style="color: #ffffff;">員工號碼</span></th>
<th style="background-color: #595959;width: 175px;"><span style="color: #ffffff;">員工姓名</span></th>
<th style="background-color: #595959;width: 50px;"><span style="color: #ffffff;">部門</span></th>
<th style="background-color:#595959;"><span style="color: #ffffff;">地區</span></th>
<!--<th style="background-color: #595959;"><span style="color: #ffffff;">枱號</span></th>
--><th style="background-color: #595959;"><span style="color: #ffffff;">出席</span></th>
</tr>
         <?php
            $result = mysql_query("SELECT * FROM $staff_info_tbname WHERE dept_code = 'CP' ORDER BY arrive ASC");
                while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
            ?>
             <tr>
            <td><?php echo $row['staff_no'];?></td>
            <td><?php echo $row['staff_name'];?></td>
            <td><?php echo $row['dept_code'];?></td>
            <td><?php echo $row['center_code'];?></td>
<!--            <td><?php echo $row['table_no'];?></td>
-->            <td class="<?php echo ( $row['arrive']=='0') ? 'red' : ''; ?>"><?php echo $row['arrive'];?></td>
            </tr>
            <?php
                    }
            ?>
        
              </table>
      </div>
           <?php
        $dpt_total_staff = mysql_num_rows( mysql_query( "SELECT * FROM $staff_info_tbname WHERE dept_code ='ED' " ) );
         $dpt_staff_arive = mysql_num_rows( mysql_query( "SELECT * FROM $staff_info_tbname WHERE dept_code ='ED' AND arrive=1 " ) );
        ?>
        <a class="table-a" href="javascript:void(0);">ED:(人數:<?php echo $dpt_total_staff;?> 出席:<?php echo $dpt_staff_arive;?>)</a>

        
        
                <div class="list-table-div">

          <table class="list-table">

    <tr>
<th style="background-color: #595959;width: 62px;"><span style="color: #ffffff;">員工號碼</span></th>
<th style="background-color: #595959;width: 175px;"><span style="color: #ffffff;">員工姓名</span></th>
<th style="background-color: #595959;width: 50px;"><span style="color: #ffffff;">部門</span></th>
<th style="background-color:#595959;"><span style="color: #ffffff;">地區</span></th>
<!--<th style="background-color: #595959;"><span style="color: #ffffff;">枱號</span></th>
--><th style="background-color: #595959;"><span style="color: #ffffff;">出席</span></th>
</tr>
         <?php
            $result = mysql_query("SELECT * FROM $staff_info_tbname WHERE dept_code = 'ED' ORDER BY arrive ASC");
                while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
            ?>
             <tr>
            <td><?php echo $row['staff_no'];?></td>
            <td><?php echo $row['staff_name'];?></td>
            <td><?php echo $row['dept_code'];?></td>
            <td><?php echo $row['center_code'];?></td>
<!--            <td><?php echo $row['table_no'];?></td>
-->            <td class="<?php echo ( $row['arrive']=='0') ? 'red' : ''; ?>"><?php echo $row['arrive'];?></td>
            </tr>
            <?php
                    }
            ?>
        
              </table>
        </div>
   
        
             <?php
        $dpt_total_staff = mysql_num_rows( mysql_query( "SELECT * FROM $staff_info_tbname WHERE dept_code ='FAD' " ) );
         $dpt_staff_arive = mysql_num_rows( mysql_query( "SELECT * FROM $staff_info_tbname WHERE dept_code ='FAD' AND arrive=1 " ) );
        ?>
        <a class="table-a" href="javascript:void(0);">FAD:(人數:<?php echo $dpt_total_staff;?> 出席:<?php echo $dpt_staff_arive;?>)</a>

                <div class="list-table-div">

          <table class="list-table">

    <tr>
<th style="background-color: #595959;width: 62px;"><span style="color: #ffffff;">員工號碼</span></th>
<th style="background-color: #595959;width: 175px;"><span style="color: #ffffff;">員工姓名</span></th>
<th style="background-color: #595959;width: 50px;"><span style="color: #ffffff;">部門</span></th>
<th style="background-color:#595959;"><span style="color: #ffffff;">地區</span></th>
<!--<th style="background-color: #595959;"><span style="color: #ffffff;">枱號</span></th>
--><th style="background-color: #595959;"><span style="color: #ffffff;">出席</span></th>
</tr>
              
         <?php
            $result = mysql_query("SELECT * FROM $staff_info_tbname WHERE dept_code = 'FAD' ORDER BY arrive ASC");
                while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
            ?>
             <tr>
            <td><?php echo $row['staff_no'];?></td>
            <td><?php echo $row['staff_name'];?></td>
            <td><?php echo $row['dept_code'];?></td>
            <td><?php echo $row['center_code'];?></td>
<!--            <td><?php echo $row['table_no'];?></td>
-->            <td class="<?php echo ( $row['arrive']=='0') ? 'red' : ''; ?>"><?php echo $row['arrive'];?></td>
            </tr>
            <?php
                    }
            ?>
        
              </table>
        </div>
        
        
             <?php
        $dpt_total_staff = mysql_num_rows( mysql_query( "SELECT * FROM $staff_info_tbname WHERE dept_code ='FTD' " ) );
         $dpt_staff_arive = mysql_num_rows( mysql_query( "SELECT * FROM $staff_info_tbname WHERE dept_code ='FTD' AND arrive=1 " ) );
        ?>
        <a class="table-a" href="javascript:void(0);">FTD:(人數:<?php echo $dpt_total_staff;?> 出席:<?php echo $dpt_staff_arive;?>)</a>

        
                <div class="list-table-div">

          <table class="list-table">

    <tr>
<th style="background-color: #595959;width: 62px;"><span style="color: #ffffff;">員工號碼</span></th>
<th style="background-color: #595959;width: 175px;"><span style="color: #ffffff;">員工姓名</span></th>
<th style="background-color: #595959;width: 50px;"><span style="color: #ffffff;">部門</span></th>
<th style="background-color:#595959;"><span style="color: #ffffff;">地區</span></th>
<!--<th style="background-color: #595959;"><span style="color: #ffffff;">枱號</span></th>
--><th style="background-color: #595959;"><span style="color: #ffffff;">出席</span></th>
</tr>
              
         <?php
            $result = mysql_query("SELECT * FROM $staff_info_tbname WHERE dept_code = 'FTD' ORDER BY arrive ASC");
                while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
            ?>
             <tr>
            <td><?php echo $row['staff_no'];?></td>
            <td><?php echo $row['staff_name'];?></td>
            <td><?php echo $row['dept_code'];?></td>
            <td><?php echo $row['center_code'];?></td>
<!--            <td><?php echo $row['table_no'];?></td>
-->            <td class="<?php echo ( $row['arrive']=='0') ? 'red' : ''; ?>"><?php echo $row['arrive'];?></td>
            </tr>
            <?php
                    }
            ?>
        </table>
        </div>
        
             <?php
        $dpt_total_staff = mysql_num_rows( mysql_query( "SELECT * FROM $staff_info_tbname WHERE dept_code ='HRD' " ) );
         $dpt_staff_arive = mysql_num_rows( mysql_query( "SELECT * FROM $staff_info_tbname WHERE dept_code ='HRD' AND arrive=1 " ) );
        ?>
        <a class="table-a" href="javascript:void(0);">HRD:(人數:<?php echo $dpt_total_staff;?> 出席:<?php echo $dpt_staff_arive;?>)</a>
        
                <div class="list-table-div">

          <table class="list-table">

    <tr>
<th style="background-color: #595959;width: 62px;"><span style="color: #ffffff;">員工號碼</span></th>
<th style="background-color: #595959;width: 175px;"><span style="color: #ffffff;">員工姓名</span></th>
<th style="background-color: #595959;width: 50px;"><span style="color: #ffffff;">部門</span></th>
<th style="background-color:#595959;"><span style="color: #ffffff;">地區</span></th>
<!--<th style="background-color: #595959;"><span style="color: #ffffff;">枱號</span></th>
--><th style="background-color: #595959;"><span style="color: #ffffff;">出席</span></th>
</tr>
              
         <?php
            $result = mysql_query("SELECT * FROM $staff_info_tbname WHERE dept_code = 'HRD' ORDER BY arrive ASC");
                while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
            ?>
             <tr>
            <td><?php echo $row['staff_no'];?></td>
            <td><?php echo $row['staff_name'];?></td>
            <td><?php echo $row['dept_code'];?></td>
            <td><?php echo $row['center_code'];?></td>
<!--            <td><?php echo $row['table_no'];?></td>
-->            <td class="<?php echo ( $row['arrive']=='0') ? 'red' : ''; ?>"><?php echo $row['arrive'];?></td>
            </tr>
            <?php
                    }
            ?>
        </table>
</div>

        
               <?php
        $dpt_total_staff = mysql_num_rows( mysql_query( "SELECT * FROM $staff_info_tbname WHERE dept_code ='ISD' " ) );
         $dpt_staff_arive = mysql_num_rows( mysql_query( "SELECT * FROM $staff_info_tbname WHERE dept_code ='ISD' AND arrive=1 " ) );
        ?>
        <a class="table-a" href="javascript:void(0);">ISD:(人數:<?php echo $dpt_total_staff;?> 出席:<?php echo $dpt_staff_arive;?>)</a>
        
        
        
               <div class="list-table-div">
 
          <table class="list-table">

    <tr>
<th style="background-color: #595959;width: 62px;"><span style="color: #ffffff;">員工號碼</span></th>
<th style="background-color: #595959;width: 175px;"><span style="color: #ffffff;">員工姓名</span></th>
<th style="background-color: #595959;width: 50px;"><span style="color: #ffffff;">部門</span></th>
<th style="background-color:#595959;"><span style="color: #ffffff;">地區</span></th>
<!--<th style="background-color: #595959;"><span style="color: #ffffff;">枱號</span></th>
--><th style="background-color: #595959;"><span style="color: #ffffff;">出席</span></th>
</tr>
              
         <?php
            $result = mysql_query("SELECT * FROM $staff_info_tbname WHERE dept_code = 'ISD' ORDER BY arrive ASC");
                while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
            ?>
             <tr>
            <td><?php echo $row['staff_no'];?></td>
            <td><?php echo $row['staff_name'];?></td>
            <td><?php echo $row['dept_code'];?></td>
            <td><?php echo $row['center_code'];?></td>
<!--            <td><?php echo $row['table_no'];?></td>
-->            <td class="<?php echo ( $row['arrive']=='0') ? 'red' : ''; ?>"><?php echo $row['arrive'];?></td>
            </tr>
            <?php
                    }
            ?>
        
              </table>
        </div>
        
        
        
               <?php
        $dpt_total_staff = mysql_num_rows( mysql_query( "SELECT * FROM $staff_info_tbname WHERE dept_code ='MGR' " ) );
         $dpt_staff_arive = mysql_num_rows( mysql_query( "SELECT * FROM $staff_info_tbname WHERE dept_code ='MGR' AND arrive=1 " ) );
        ?>
        <a class="table-a" href="javascript:void(0);">MGR:(人數:<?php echo $dpt_total_staff;?> 出席:<?php echo $dpt_staff_arive;?>)</a>
        
        
        
                <div class="list-table-div">

        <table class="list-table">

    <tr>
<th style="background-color: #595959;width: 62px;"><span style="color: #ffffff;">員工號碼</span></th>
<th style="background-color: #595959;width: 175px;"><span style="color: #ffffff;">員工姓名</span></th>
<th style="background-color: #595959;width: 50px;"><span style="color: #ffffff;">部門</span></th>
<th style="background-color:#595959;"><span style="color: #ffffff;">地區</span></th>
<!--<th style="background-color: #595959;"><span style="color: #ffffff;">枱號</span></th>
--><th style="background-color: #595959;"><span style="color: #ffffff;">出席</span></th>
</tr>
              
         <?php
            $result = mysql_query("SELECT * FROM $staff_info_tbname WHERE dept_code = 'MGR' ORDER BY arrive ASC");
                while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
            ?>
             <tr>
            <td><?php echo $row['staff_no'];?></td>
            <td><?php echo $row['staff_name'];?></td>
            <td><?php echo $row['dept_code'];?></td>
            <td><?php echo $row['center_code'];?></td>
<!--            <td><?php echo $row['table_no'];?></td>
-->            <td class="<?php echo ( $row['arrive']=='0') ? 'red' : ''; ?>"><?php echo $row['arrive'];?></td>
            </tr>
            <?php
                    }
            ?>
        
              </table>
   </div>
          
               <?php
        $dpt_total_staff = mysql_num_rows( mysql_query( "SELECT * FROM $staff_info_tbname WHERE dept_code ='MO' " ) );
         $dpt_staff_arive = mysql_num_rows( mysql_query( "SELECT * FROM $staff_info_tbname WHERE dept_code ='MO' AND arrive=1 " ) );
        ?>
        <a class="table-a" href="javascript:void(0);">MO:(人數:<?php echo $dpt_total_staff;?> 出席:<?php echo $dpt_staff_arive;?>)</a>
        
        
        
                <div class="list-table-div">

          <table class="list-table">

    <tr>
<th style="background-color: #595959;width: 62px;"><span style="color: #ffffff;">員工號碼</span></th>
<th style="background-color: #595959;width: 175px;"><span style="color: #ffffff;">員工姓名</span></th>
<th style="background-color: #595959;width: 50px;"><span style="color: #ffffff;">部門</span></th>
<th style="background-color:#595959;"><span style="color: #ffffff;">地區</span></th>
<!--<th style="background-color: #595959;"><span style="color: #ffffff;">枱號</span></th>
--><th style="background-color: #595959;"><span style="color: #ffffff;">出席</span></th>
</tr>
              
         <?php
            $result = mysql_query("SELECT * FROM $staff_info_tbname WHERE dept_code = 'MO' ORDER BY arrive ASC");
                while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
            ?>
             <tr>
            <td><?php echo $row['staff_no'];?></td>
            <td><?php echo $row['staff_name'];?></td>
            <td><?php echo $row['dept_code'];?></td>
            <td><?php echo $row['center_code'];?></td>
<!--            <td><?php echo $row['table_no'];?></td>
-->            <td class="<?php echo ( $row['arrive']=='0') ? 'red' : ''; ?>"><?php echo $row['arrive'];?></td>
            </tr>
            <?php
                    }
            ?>
        
              </table>
        </div>
        
          
               <?php
        $dpt_total_staff = mysql_num_rows( mysql_query( "SELECT * FROM $staff_info_tbname WHERE dept_code ='ODD' " ) );
         $dpt_staff_arive = mysql_num_rows( mysql_query( "SELECT * FROM $staff_info_tbname WHERE dept_code ='ODD' AND arrive=1 " ) );
        ?>
        <a class="table-a" href="javascript:void(0);">ODD:(人數:<?php echo $dpt_total_staff;?> 出席:<?php echo $dpt_staff_arive;?>)</a>
        
        
    
                <div class="list-table-div">

          <table class="list-table">

    <tr>
<th style="background-color: #595959;width: 62px;"><span style="color: #ffffff;">員工號碼</span></th>
<th style="background-color: #595959;width: 175px;"><span style="color: #ffffff;">員工姓名</span></th>
<th style="background-color: #595959;width: 50px;"><span style="color: #ffffff;">部門</span></th>
<th style="background-color:#595959;"><span style="color: #ffffff;">地區</span></th>
<!--<th style="background-color: #595959;"><span style="color: #ffffff;">枱號</span></th>
--><th style="background-color: #595959;"><span style="color: #ffffff;">出席</span></th>
</tr>
              
         <?php
            $result = mysql_query("SELECT * FROM $staff_info_tbname WHERE dept_code = 'ODD' ORDER BY arrive ASC");
                while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
            ?>
             <tr>
            <td><?php echo $row['staff_no'];?></td>
            <td><?php echo $row['staff_name'];?></td>
            <td><?php echo $row['dept_code'];?></td>
            <td><?php echo $row['center_code'];?></td>
<!--            <td><?php echo $row['table_no'];?></td>
-->            <td class="<?php echo ( $row['arrive']=='0') ? 'red' : ''; ?>"><?php echo $row['arrive'];?></td>
            </tr>
            <?php
                    }
            ?>
        
              </table>
        
  </div>
        
          
               <?php
        $dpt_total_staff = mysql_num_rows( mysql_query( "SELECT * FROM $staff_info_tbname WHERE dept_code ='OPS' " ) );
         $dpt_staff_arive = mysql_num_rows( mysql_query( "SELECT * FROM $staff_info_tbname WHERE dept_code ='OPS' AND arrive=1 " ) );
        ?>
        <a class="table-a" href="javascript:void(0);">OPS:(人數:<?php echo $dpt_total_staff;?> 出席:<?php echo $dpt_staff_arive;?>)</a>
        
        
    
                <div class="list-table-div">

          <table class="list-table">

    <tr>
<th style="background-color: #595959;width: 62px;"><span style="color: #ffffff;">員工號碼</span></th>
<th style="background-color: #595959;width: 175px;"><span style="color: #ffffff;">員工姓名</span></th>
<th style="background-color: #595959;width: 50px;"><span style="color: #ffffff;">部門</span></th>
<th style="background-color:#595959;"><span style="color: #ffffff;">地區</span></th>
<!--<th style="background-color: #595959;"><span style="color: #ffffff;">枱號</span></th>
--><th style="background-color: #595959;"><span style="color: #ffffff;">出席</span></th>
</tr>
              
         <?php
            $result = mysql_query("SELECT * FROM $staff_info_tbname WHERE dept_code = 'OPS' ORDER BY arrive ASC");
                while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
            ?>
             <tr>
            <td><?php echo $row['staff_no'];?></td>
            <td><?php echo $row['staff_name'];?></td>
            <td><?php echo $row['dept_code'];?></td>
            <td><?php echo $row['center_code'];?></td>
<!--            <td><?php echo $row['table_no'];?></td>
-->            <td class="<?php echo ( $row['arrive']=='0') ? 'red' : ''; ?>"><?php echo $row['arrive'];?></td>
            </tr>
            <?php
                    }
            ?>
        
              </table>
        </div>
    
          
               <?php
        $dpt_total_staff = mysql_num_rows( mysql_query( "SELECT * FROM $staff_info_tbname WHERE dept_code ='OPSGO' " ) );
         $dpt_staff_arive = mysql_num_rows( mysql_query( "SELECT * FROM $staff_info_tbname WHERE dept_code ='OPSGO' AND arrive=1 " ) );
        ?>
        <a class="table-a" href="javascript:void(0);">OPSGO:(人數:<?php echo $dpt_total_staff;?> 出席:<?php echo $dpt_staff_arive;?>)</a>
        
                <div class="list-table-div">

          <table class="list-table">

    <tr>
<th style="background-color: #595959;width: 62px;"><span style="color: #ffffff;">員工號碼</span></th>
<th style="background-color: #595959;width: 175px;"><span style="color: #ffffff;">員工姓名</span></th>
<th style="background-color: #595959;width: 50px;"><span style="color: #ffffff;">部門</span></th>
<th style="background-color:#595959;"><span style="color: #ffffff;">地區</span></th>
<!--<th style="background-color: #595959;"><span style="color: #ffffff;">枱號</span></th>
--><th style="background-color: #595959;"><span style="color: #ffffff;">出席</span></th>
</tr>
              
         <?php
            $result = mysql_query("SELECT * FROM $staff_info_tbname WHERE dept_code = 'OPSGO' ORDER BY arrive ASC");
                while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
            ?>
             <tr>
            <td><?php echo $row['staff_no'];?></td>
            <td><?php echo $row['staff_name'];?></td>
            <td><?php echo $row['dept_code'];?></td>
            <td><?php echo $row['center_code'];?></td>
<!--            <td><?php echo $row['table_no'];?></td>
-->            <td class="<?php echo ( $row['arrive']=='0') ? 'red' : ''; ?>"><?php echo $row['arrive'];?></td>
            </tr>
            <?php
                    }
            ?>
        
              </table>
        </div>
        
        
          
               <?php
        $dpt_total_staff = mysql_num_rows( mysql_query( "SELECT * FROM $staff_info_tbname WHERE dept_code ='PROMO' " ) );
         $dpt_staff_arive = mysql_num_rows( mysql_query( "SELECT * FROM $staff_info_tbname WHERE dept_code ='PROMO' AND arrive=1 " ) );
        ?>
        <a class="table-a" href="javascript:void(0);">PROMO:(人數:<?php echo $dpt_total_staff;?> 出席:<?php echo $dpt_staff_arive;?>)</a>
        
        
                <div class="list-table-div">

          <table class="list-table">

    <tr>
<th style="background-color: #595959;width: 62px;"><span style="color: #ffffff;">員工號碼</span></th>
<th style="background-color: #595959;width: 175px;"><span style="color: #ffffff;">員工姓名</span></th>
<th style="background-color: #595959;width: 50px;"><span style="color: #ffffff;">部門</span></th>
<th style="background-color:#595959;"><span style="color: #ffffff;">地區</span></th>
<!--<th style="background-color: #595959;"><span style="color: #ffffff;">枱號</span></th>
--><th style="background-color: #595959;"><span style="color: #ffffff;">出席</span></th>
</tr>
              
         <?php
            $result = mysql_query("SELECT * FROM $staff_info_tbname WHERE dept_code = 'PROMO' ORDER BY arrive ASC");
                while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
            ?>
             <tr>
            <td><?php echo $row['staff_no'];?></td>
            <td><?php echo $row['staff_name'];?></td>
            <td><?php echo $row['dept_code'];?></td>
            <td><?php echo $row['center_code'];?></td>
<!--            <td><?php echo $row['table_no'];?></td>
-->            <td class="<?php echo ( $row['arrive']=='0') ? 'red' : ''; ?>"><?php echo $row['arrive'];?></td>
            </tr>
            <?php
                    }
            ?>
        
              </table>
        </div>
         
        
          
               <?php
        $dpt_total_staff = mysql_num_rows( mysql_query( "SELECT * FROM $staff_info_tbname WHERE dept_code ='SSD' " ) );
         $dpt_staff_arive = mysql_num_rows( mysql_query( "SELECT * FROM $staff_info_tbname WHERE dept_code ='SSD' AND arrive=1 " ) );
        ?>
        <a class="table-a" href="javascript:void(0);">SSD:(人數:<?php echo $dpt_total_staff;?> 出席:<?php echo $dpt_staff_arive;?>)</a>
        
        
        
                <div class="list-table-div">

          <table class="list-table">

    <tr>
<th style="background-color: #595959;width: 62px;"><span style="color: #ffffff;">員工號碼</span></th>
<th style="background-color: #595959;width: 175px;"><span style="color: #ffffff;">員工姓名</span></th>
<th style="background-color: #595959;width: 50px;"><span style="color: #ffffff;">部門</span></th>
<th style="background-color:#595959;"><span style="color: #ffffff;">地區</span></th>
<!--<th style="background-color: #595959;"><span style="color: #ffffff;">枱號</span></th>
--><th style="background-color: #595959;"><span style="color: #ffffff;">出席</span></th>
</tr>
              
         <?php
            $result = mysql_query("SELECT * FROM $staff_info_tbname WHERE dept_code = 'SSD' ORDER BY arrive ASC");
                while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
            ?>
             <tr>
            <td><?php echo $row['staff_no'];?></td>
            <td><?php echo $row['staff_name'];?></td>
            <td><?php echo $row['dept_code'];?></td>
            <td><?php echo $row['center_code'];?></td>
<!--            <td><?php echo $row['table_no'];?></td>
-->            <td class="<?php echo ( $row['arrive']=='0') ? 'red' : ''; ?>"><?php echo $row['arrive'];?></td>
            </tr>
            <?php
                    }
            ?>
        
              </table>
        
        </div>

       


    </div>


    <script type="text/javascript">
        
        
        $( function () {

        $('.list-table-div').slideUp(0);
            $('.table-a').click(function(e){
                e.preventDefault();
                $('.list-table-div').slideUp(0);

                $(this).next('.list-table-div').slideToggle(200);
            })
        })

    </script>

    <style type="text/css">
        .red{
            color: #f00;
        }
        .pls-card-txt {
            text-align: center;
            font-size: 40px;
            font-weight: bold;
            margin: 40px 0 0 0;
            background: #f59d2d;
            color: #fff;
            padding: 15px;
            border-radius: 20px;
        }
        
        .confirm-card-txt {
            text-align: center;
            font-size: 40px;
            font-weight: bold;
            margin: 40px 0 0 0;
            background: #1a9e50;
            color: #fff;
            padding: 15px;
            border-radius: 20px;
        }
          .error-card-txt {
            text-align: center;
            font-size: 40px;
            font-weight: bold;
            margin: 40px 0 0 0;
            background: #F44336;
            color: #fff;
            padding: 15px;
            border-radius: 20px;
        }
        
        .rfid-staff-info-table {
            width: 100%;
            margin: 20px auto 0 auto;
            /* border: 1px solid; */
            /*    border: 1px solid #6c6e71;
*/
            border-radius: 10px;
            font-weight: bold;
        }
        
        .rfid-staff-info-table td {
            padding: 10px;
        }
        
        .rfid-col-1 {
            width: 160px;
        }
        
        .enable-input {
            position: absolute;
            top: 0;
            right: 0;
            display: block;
            background: #6c6e71;
            color: #fff;
            padding: 5px;
            font-size: 14px;
        }
        
        .staff-no-input {
            position: absolute;
            top: 25px;
            right: 0;
        }
        
        .staff-rfid-code {
            position: absolute;
            top: 80px;
            right: 0;
            opacity: 0;
        }
        
        #time {
            text-align: center;
            font-size: 18px;
        }
        
        .rfid-icon-div {
            margin: 20px 0 0 0;
        }
        
        .table-a{
    display: block;
    height: 26px;
    border: 1px solid;
    line-height: 26px;
    background: #888888;
    color: #fff;
    padding: 10px;
    text-align: left;            
    border-radius: 10px;
            margin: 20px 0 0 0 ;
        }
        
        .table-a:hover{
                background: #989898;
        }
        
        .list-table{
            width: 100%;
            font-size: 14px;
            margin: 20px 0 20px 0;
        }
        
        
        .list-table td,
                .list-table th
        {
    padding: 5px;
    line-height: 20px;        }
        
    </style>
</body>

</html>