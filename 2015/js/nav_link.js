// JavaScript Document

<!--nav link-->

$(document).ready(function(){
		loop();  <!--car-->
	 
		   $("#index, #to_index").click(function(){
		   	window.location.href = "http://meg.com.hk/index.html";
			
		   }); 
		   
 		   $("#course_1, #course_1a").click(function(){
		   	window.location.href = "http://meg.com.hk/course_1.html";
		    
		   });
		   
		   $("#course_2, #course_2a").click(function(){
		   	window.location.href = "http://meg.com.hk/course_2.html";
		    
		   });
		   
		   $("#course_3, #course_3a").click(function(){
		   	window.location.href = "http://meg.com.hk/course_3.html";
		    
		   });
		   
		   $("#course_4, #course_4a").click(function(){
		   	window.location.href = "http://meg.com.hk/course_4.html";
		    
		   });
		   
		   $("#course_5, #course_5a").click(function(){
		   	window.location.href = "http://meg.com.hk/course_5.html";
		    
		   });
		   
		   $("#info_1, #info_1a, #info_back").click(function(){
		   	window.location.href = "http://meg.com.hk/info_1.html";
		    
		   });
		   
		   $("#info_2, #info_2a").click(function(){
		   	window.location.href = "http://meg.com.hk/info_2.html";
		    
		   });
		   
		   $("#info_3, #info_3a").click(function(){
		   	window.location.href = "http://meg.com.hk/info_3.html";
		    
		   });
		   
		   $("#info_4, #info_4a").click(function(){
		   	window.location.href = "http://meg.com.hk/info_4.html";
		    
		   });
		   
		   $("#info_5, #info_5a").click(function(){
		   	window.location.href = "http://meg.com.hk/info_5.html";
		    
		   });
		   
		   $("#latest_news, #latest_back, #latest_news_1a").click(function(){
		   	window.location.href = "http://meg.com.hk/latest_news.html";
		    
		   });
		   
		   $("#other_news, #other_back, #other_news_1a").click(function(){
		   	window.location.href = "http://meg.com.hk/other_news.html";
		    
		   });
		   
		   $("#company").click(function(){
		   	window.location.href = "http://meg.com.hk/company.html";
		    
		   });
		   
		   $("#hksm, #hksm_logo, #hksm_s").click(function(){
			window.open('http://www.hksm.com.hk/tc/index.html');
		    
		   });
		   
		   $("#freeway, #freeway_logo, #freeway_s").click(function(){
			window.open('http://freewaydriving.com.hk/catalog/index.php');
		    
		   });
		   
		   $("#A1, #A1_logo, #A1_s").click(function(){
			window.open('http://a1driving.com.hk/main-page.html');
		    
		   });
		   
		   $("#location, #location_1a").click(function(){
			window.location.href = "http://meg.com.hk/map.html";
		    
		   });
		   
		   $("#enquiry, #enquiry_1a").click(function(){
			window.location.href = "http://meg.com.hk/enquiry.html";
		    
		   });
		   
		   $("#terms, #terms_1a").click(function(){
			window.location.href = "http://meg.com.hk/terms.html";
		    
		   });
		   
		   $("#appstore").click(function(){
			window.open('https://itunes.apple.com/hk/app/xue-cheno.1/id416072313?mt=8');
		   });
		   
		   $("#googleplay").click(function(){
			window.open('https://play.google.com/store/apps/details?id=hk.meg.android');
		   });
		   
		   $("#slide_1").click(function(){
			//window.open('http://www.hksm.com.hk/tc/index.html');
		    
		   });
		   
		   $("#slide_2").click(function(){
			//window.open('http://freewaydriving.com.hk/catalog/index.php');
		    
		   });
		   
		   $("#slide_3").click(function(){
			//window.open('http://a1driving.com.hk/main-page.html');
		    
		   });
		   
		   $("#slide_4").click(function(){
			//window.open('http://meghongkong.com/promotion/meg.html');
		    
		   });
		   
		   $("#float_banner").click(function(){
			//window.open('http://www.facebook.com/meglimited');
		    
		   });
		   
		   
		   $('a.eng').click(function() {
            document.location.href = document.location.href.replace('/tc/','/eng/');
      });
  		   
	  	   $('a.sc').click(function() {
            document.location.href = document.location.href.replace('/tc/','/sc/');
      });
		  
		   
});

$(function(){
	if (navigator.appName == 'Netscape')
    var lang = navigator.language;
  else
    var lang = navigator.browserLanguage;
	
	var relang=lang.toLowerCase();
	switch (relang){
		case "zh-cn":
		document.getElementById("ktcopy").innerHTML='Copyright © 2015 MEG Ltd. All Rights Reserved<br />建议使用 Microsoft Internet Explorer 8.0以上或Google Chrome浏览本网站';	<!--copyright-->
		break;
 
		case "zh-hk":
		document.getElementById("ktcopy").innerHTML='Copyright © 2015 MEG Ltd. All Rights Reserved<br />建議使用M icrosoft Internet Explorer 8.0以上或Google Chrome瀏覽本網站';	<!--copyright-->
		break;
		
		case "en":
		document.getElementById("ktcopy").innerHTML='Copyright © 2015 MEG Ltd. All Rights Reserved<br />To browse our site, Microsoft Internet Explorer 8.0(or above) or Google Chrome is recommended.';	<!--copyright-->
		break;
 
                default:
		document.getElementById("ktcopy").innerHTML='Copyright © 2015 MEG Ltd. All Rights Reserved<br />建議使用 Microsoft Internet Explorer 8.0以上或Google Chrome瀏覽本網站';	<!--copyright-->
	}			
});
		   

function loop() {
		if(screen.width>640){
        $('#car').css({right:-500});
		$('#car01').css({right:-1500});
		$('#car02').css({right:-2500});
        $('#car, #car01, #car02').animate ({
            right: '+=4000',
        }, 20000, 'linear', function() {
            loop();
        });
		
		
		} else {
			document.getElementById('car').style.display = "none";
			document.getElementById('car01').style.display = "none";
			document.getElementById('car02').style.display = "none";
		}
    }