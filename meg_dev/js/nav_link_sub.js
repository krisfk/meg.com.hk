// JavaScript Document

<!--nav link-->

$(document).ready(function(){
		<!--loop();  car-->
	 		$('#subpage_bg').css({'background-image': 'url(../images/bg_sub.jpg)'});
		   $("#index, #index_s ").click(function(){
		   	window.location.href = "../index.html";
		    
		   }); 
		   		   
 
		   $("#latest_news, #notices, #type_latest_news, #back_notices, #latest_news_2016,#back_btn").click(function(){
		   	window.location.href = "../latest_news.html";
		    
		   });
		   
		   $("#type_other_news").click(function(){
		   	window.location.href = "../other_news.html";
		    
		   });
		   
		   $("#latest_news_2016_2").click(function(){
		   	window.location.href = "../latest_news_2016_2.html";
		    
		   });
		   
		   $("#latest_news_2015").click(function(){
		   	window.location.href = "../latest_news_2015.html";
		    
		   });
		   
		   $("#latest_news_2015_2").click(function(){
		   	window.location.href = "../latest_news_2015_2.html";
		    
		   });
		   
		   $("#hksm, #hksm_logo, #hksm_s").click(function(){
			window.open('https://www.hksm.com.hk/tc/index.html');
		    
		   });
		   
		   $("#freeway, #freeway_logo, #freeway_s").click(function(){
			window.open('https://freewaydriving.com.hk/catalog/index.php');
		    
		   });
		   
		   $("#A1, #A1_logo, #A1_s").click(function(){
			window.open('https://a1driving.com.hk/main-page.html');
		    
		   });
		   
		   $("#A1, #A1_logo, #A1_s").click(function(){
			window.open('https://a1driving.com.hk/main-page.html');
		    
		   });
		   
		   $("#leinam").click(function(){
			window.open('https://www.leinam.com.hk/site/index.php');
		    
		   });
		   
		   $("#tctc").click(function(){
			window.open('https://www.tctc.com.hk/chi/home/index.html');
		    
		   });
		   
		   $("#autotoll").click(function(){
			window.open('https://www.autotoll.com.hk/');
		    
		   });
		   
		   $("#cart").click(function(){
			window.open('https://www.autotoll.com.hk/');
		    
		   });
		   
		   $("#price").click(function(){
			window.location.href = "../index.html#info__01";
		    
		   });
		   
		   
		   $("#enquiry, #enquiry_1a").click(function(){
			window.location.href = "../enquiry.html";
		    
		   });
		   
		   $("#terms, #terms_1a").click(function(){
			window.location.href = "../terms.html";
		    
		   });
		   
		   $("#appstore").click(function(){
			   window.open('https://itunes.apple.com/hk/app/xue-cheno.1/id416072313?mt=8');
		   });
		   
		   $("#googleplay").click(function(){
			   window.open('https://play.google.com/store/apps/details?id=hk.meg.android');
		   });
		   
		   
		   
		   $('a.eng').click(function() {
            /*document.location.href = document.location.href.replace('/tc/','/eng/');*/
			window.open('https://www.hksm.com.hk/eng/');
      });
  		   
	  	   $('a.sc').click(function() {
            document.location.href = document.location.href.replace('/tc/','/sc/');
      });
	  	   $('a.tc').click(function() {
            document.location.href = document.location.href.replace('/sc/','/tc/');
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
		document.getElementById("meg_copy").innerHTML='Copyright © 2016 MEG Ltd. All Rights Reserved. 建议使用Microsoft Internet Explorer 8.0以上或Google Chrome浏览本网站';	<!--copyright-->
		break;
 
		case "zh-hk":
		document.getElementById("meg_copy").innerHTML='Copyright © 2016 MEG Ltd. All Rights Reserved. 建議使用Microsoft Internet Explorer 8.0以上或Google Chrome瀏覽本網站';	<!--copyright-->
		break;
		
		case "en":
		document.getElementById("meg_copy").innerHTML='Copyright © 2016 MEG Ltd. All Rights Reserved.';	<!--copyright-->
		break;
 
                default:
		document.getElementById("meg_copy").innerHTML='Copyright © 2016 MEG Ltd. All Rights Reserved.';	<!--copyright-->
	}			
});
		   
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}

/*function loop() {
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
    }*/
	
/*-------------------------------------
  rollover2
-------------------------------------*/
(function($) {
	
	$.fn.opOver = function(op,oa,durationp,durationa){
		
		var c = {
			op:op? op:1.0,
			oa:oa? oa:0.6,
			durationp:durationp? durationp:'fast',
			durationa:durationa? durationa:'fast'
		};
		

		$(this).each(function(){
			$(this).css({
					opacity: c.op,
					filter: "alpha(opacity="+c.op*100+")"
				}).hover(function(){
					$(this).fadeTo(c.durationp,c.oa);
				},function(){
					$(this).fadeTo(c.durationa,c.op);
				})
		});
	},
	
	$.fn.wink = function(durationp,op,oa){

		var c = {
			durationp:durationp? durationp:'slow',
			op:op? op:1.0,
			oa:oa? oa:0.2
		};
		
		$(this).each(function(){
			$(this)	.css({
					opacity: c.op,
					filter: "alpha(opacity="+c.op*100+")"
				}).hover(function(){
				$(this).css({
					opacity: c.oa,
					filter: "alpha(opacity="+c.oa*100+")"
				});
				$(this).fadeTo(c.durationp,c.op);
			},function(){
				$(this).css({
					opacity: c.op,
					filter: "alpha(opacity="+c.op*100+")"
				});
			})
		});
	}
	
})(jQuery);	




(function($) {
$(function() {

  $('.over1').opOver();
  $('.over2').wink();
  $('.over3').opOver(0.6,1.0);
  $('.over4').opOver(1.0,0.6,200,500);
  $('.over5').wink(200);
  $('.over6').wink('slow',0.2,1.0);
  $('.over7').opOver(0.1,1.0);
  $('.test1 .over ').opOver();

});
})(jQuery);


