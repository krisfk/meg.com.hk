$(function(){
    
    
     
   
    
     $('.edit-price-no-btn').click(function(e){
         e.preventDefault();
        $(this).fadeOut(0);
         $('.price-span-value').fadeOut(0);
         $('.price-input-value').fadeIn(0);
         $('.save-price-no-btn').fadeIn(0);
         
    })
    
    $('.save-price-no-btn').click(function(e){
         e.preventDefault();
         var num_of_price = $('.price-input-value').val();
        
         $.post('func.php', { func: "update_no_of_price" ,num_of_price: num_of_price}, 
            
            function(data){
       //      alert(data);
                if(data==='success')
                    {
                        alert("獎品數目已更新！");
                        window.location='./admin.php';
                    }
         });
        
        
    })
    
    $('.rfid-input-btn').click(function(e){
        e.preventDefault();
        $('.rfid-statement').fadeIn(200);        
        $('.white-popup').height(400);
        $('.rfid-input-confirm-button').fadeOut(0);
        $('.rfid-staff-info-table').css({'opacity':'0'});
        $('.rfid-code').focus().val('');
        
    });
    
    /*
    $('.rfid-code').bind("enterKey",function(e){
        alert(5);
        //do stuff here
    });*/
    
    $('.rfid-code').keyup(function(e){
        if(e.keyCode == 13)
        {
            var rfid_code = $('.rfid-code').val();
            $('.rfid-code').val('');

                $.post('func.php', { func: "get_staff_info" ,rfid_code:rfid_code }, 
                function(data){
                    
                    data = $.parseJSON( data );
        
                   var staff_no = data.staff_no;
                   var staff_name = data.staff_name;
                    $('.rfid-staff-no-td').html(staff_no);
                    $('.rfid-staff-name-td').html(staff_name);
                    
                    $('.rfid-input-confirm-button').fadeIn(0);
                    
                    $('.rfid-staff-info-table').css({'opacity':'1'});
//             $('.result-tr-'+data.price_idx).find('.staff_id_td').html(staff_id);
   //          $('.result-tr-'+data.price_idx).find('.staff_name_td').html(data.staff_name);

                    
                    //ddalert(777);
                });


          //  $(this).trigger("enterKey");
        }
    
    });
    
    
    
    $('.edit-result-btn').magnificPopup({
      type:'inline',
      midClick: true, // Allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source in href.
    });
    
    $('.rfid-input-confirm-button').click(function(e){
        e.preventDefault();
        $('.rfid-statement').fadeOut(0);
         $('.white-popup').height(182);
    
        var staff_no = $('.rfid-staff-no-td').html();
        var staff_name =$('.rfid-staff-name-td').html();
    
        $('.staff-id-val').val(staff_no);
       
        $(".price-status-val").children().each(function(){
        if ($(this).text()==='已取獎'){$(this).attr("selected", "true"); this.selected = true; 
        }});
        //$('.staff-id-val').val();
    });
    
    
    $('.edit-result-btn').click(function(e){
        e.preventDefault();
        
        $('.rfid-statement').fadeOut(0);
        $('.white-popup').height(182);
        var data_price_idx  = $(this).attr('data-price-idx');
        var data_staff_id  = $(this).closest('.result-tr').find('.staff_id_td').html();
        var data_staff_name  = $(this).closest('.result-tr').find('.staff_name_td').html();
        var data_price_status=$(this).closest('.result-tr').find('.price_status_td').html();
        
        //data_price_status
        $('.price-idx-val').html(data_price_idx);
        $('.staff-id-val').val(data_staff_id);
        $('.staff-name-val').html(data_staff_name);
        $('.price-status-val').find('option:contains("已取獎")').val();
        
        $(".price-status-val").children().each(function(){
        if ($(this).text()===data_price_status){$(this).attr("selected", "true"); this.selected = true; 
        }
});
        
    });
    
    $('.rfid-back-button').click(function(e){
        e.preventDefault();
        
        $('.rfid-statement').fadeOut(0);
        $('.white-popup').height(182);
        
    });
    
   $('.edit-form-cancel-btn').click(function(e){
    //   var magnificPopup = $.magnificPopup.instance; 
       e.preventDefault();
        $.magnificPopup.close(); 
   });
    
    $('.edit-form-save-btn').click(function(e){
        e.preventDefault();
        
         //$(".price-status-val option:selected").index()

        var price_idx = $('.price-idx-val').html();
        var staff_id = $('.staff-id-val').val();
        var price_status=$(".price-status-val option:selected").index();
        
        
         $.post('func.php', { func: "update_price_record" ,price_idx:price_idx , staff_id:staff_id , price_status:price_status }, 
            function(data){

               data = $.parseJSON( data );
        
             
             $('.result-tr-'+data.price_idx).find('.staff_id_td').html(staff_id);
             $('.result-tr-'+data.price_idx).find('.staff_name_td').html(data.staff_name);

             
             $('.result-tr-'+data.price_idx).find('.price_status_td').html(price_status_arr[price_status]);
           
         
         
         });
        
        
      $.magnificPopup.close(); 

        
    });
    
 
});