<?php
require_once( 'connection.php' );
require_once( 'func.php' );


$conn = mysql_connect( $dbhost, $dbuser, $dbpass, $dbname )or die( 'Error connecting to mysql' );
mysql_select_db( $dbname, $conn );


$result = mysql_query( "SELECT * FROM " . $lucky_draw_config_tbname );
$row = mysql_fetch_array( $result, MYSQL_ASSOC );
$total_price = $row[ 'no_of_price' ];

$tb_num_rows = mysql_num_rows( mysql_query( "SELECT * FROM " . $lucky_draw_tbname ) );

?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>2018 香港駕駛學院 週年晚宴 報到系統 </title>
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
    <!--<script type="text/javascript" src="all.js"></script>
-->

    <script type="text/javascript" src="moment.js"></script>
    <script type="text/javascript" src="moment-with-locales.js"></script>
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />

</head>

<body>

    <a href="javascript:void(0);" class="enable-input">enable key input</a>
    <input type="text" class="staff-no-input" placeholder="input the staff no...">

    <input type="text" class="staff-rfid-code">
    <img class="hksm-logo" src="https://www.hksm.com.hk/eng/images/hksm_logo.png">

    <h1 class="heading-title">- 2018週年晚宴報到系統 -</h1>

    <div class="container">

        <div id="time"></div>


        <!--    <input type="text" placeholder="搜尋中獎結果 . . ." class="search">
-->

        <div class="rfid-icon-div"><img class="rfid-icon" src="image/rfid-icon.png">
        </div>

        <div class="pls-card-txt">請拍員工證</div>
        <div class="confirm-card-txt">已報到</div>
        <div class="error-card-txt">確認失敗</div>
        

        <table class="rfid-staff-info-table" style="opacity: 1;">
            <tbody>
                <tr>
                    <td class="rfid-col-1">員工編號:</td>
                    <td class="rfid-staff-no-td">fdasf</td>
                </tr>
                <tr>
                    <td class="rfid-col-1">員工姓名:</td>
                    <td class="rfid-staff-name-td">fdasf</td>
                </tr>
                <tr>
                    <td class="rfid-col-1">部門:</td>
                    <td class="rfid-staff-dept-td">fdasf</td>
                </tr>
                <tr>
                    <td class="rfid-col-1">地區:</td>
                    <td class="rfid-staff-center-td">fdasf</td>
                </tr>
            <tr>
                    <td class="rfid-col-1">枱號:</td>
                    <td class="rfid-staff-table-td">fdasf</td>
                </tr>

            </tbody>
        </table>

        <div>
            <table>

            </table>
        </div>

    </div>


    <script type="text/javascript">
        
        
        $( function () {


            $( '.staff-rfid-code' ).focus().val( '' );



            var datetime = null,
                date = null;
            var idle_idx = 0;
            var max_idle_idx = 20;

            var update = function () {
                date = moment( new Date() );
                $( '#time' ).html( date.format( 'h:mm:ss a' ) );
                idle_idx++;

                if ( idle_idx >= max_idle_idx ) {
                    idle_idx = 0;
                    $( '.rfid-staff-info-table,.confirm-card-txt,.error-card-txt' ).fadeOut( 0 );
                    $( '.pls-card-txt' ).fadeIn( 200 );

                }


                console.log( idle_idx );
                //  console.log(date.format('h:mm:ss a'));
                //  datetime.html(date.format('dddd, MMMM Do YYYY, h:mm:ss a'));
            };

            datetime = $( '#datetime' )
            update();
            setInterval( update, 1000 );

            $( '.confirm-card-txt,.rfid-staff-info-table,.staff-no-input,.error-card-txt' ).fadeOut( 0 );

            $( '.staff-rfid-code' ).keyup( function ( e ) {

                if ( e.keyCode == 13 ) {
                    show_staff_info_table();
                }
                        idle_idx = 0;
            } );
            
            
            $('.staff-no-input').keyup( function ( e ) {

                if ( e.keyCode == 13 ) {
                    
                    var staff_no = $(this).val();
                
                    show_staff_info_table();
        
                    idle_idx = 0;

                }
                
            }
                                       )


            $(window).bind("click",function(){$( '.staff-rfid-code' ).focus();})
                
          
            $( '.enable-input' ).click( function ( e ) {
                e.preventDefault();
                
                $(this).toggleClass('appear');
                
                if($(this).hasClass('appear'))
                    {
                        $(window).unbind('click');
                        $('.staff-no-input').fadeIn(0).focus();
                        $('.enable-input').html('disable key input');
                    }
                else{
                          $('.staff-no-input').fadeOut(0);
                        $('.staff-no-input').val('');
                          $(window).bind("click",function(){$( '.staff-rfid-code' ).focus();})
                        $('.enable-input').html('enable key input');
                }                

            } )


        } )
        
        function show_staff_info_table()
        {
             var rfid_code = $( '.staff-rfid-code' ).val();
                    var staff_no =  $('.staff-no-input').val().replace(' ','');
    
                    $( '.staff-rfid-code' ).val( '' );

                    $.post( 'func.php', {
                            func: "get_staff_info",
                            rfid_code: rfid_code,
                            staff_no: staff_no
                        },
                        function ( data ) {

//                        alert(data);
                            data = $.parseJSON( data );

                            //                    alert(data);
                            var staff_no = data.staff_no;
                            var staff_name = data.staff_name;
                            var department = data.department;
                            var center = data.center;
                            var table_no = data.table;
                        

                        
                        if(!department && !center) {
                            $( '.pls-card-txt,.confirm-card-txt' ).fadeOut( 0 );
                            $('.error-card-txt').fadeIn(200);
                        }
                        else{
                            $( '.rfid-staff-no-td' ).html( staff_no );
                            $( '.rfid-staff-name-td' ).html( staff_name );
                            $( '.rfid-staff-dept-td' ).html( department );
                            $( '.rfid-staff-center-td' ).html( center );
                            $( '.rfid-staff-table-td' ).html( table_no );
                            
                            $( '.pls-card-txt,.error-card-txt ').fadeOut( 0 );
                            $( '.confirm-card-txt,.rfid-staff-info-table' ).fadeIn( 200 );
                        }
                        
                          idle_idx = 0;
                          
                        
                        
                        
                        } );

        }
    </script>

    <style type="text/css">
    
    </style>
</body>

</html>