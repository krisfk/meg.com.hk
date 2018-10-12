/*-------------------------------------
  top animation
-------------------------------------*/

  $(document).ready(function(){
    
    // Using multiple unit types within one animation.
      $("#aboutcatch").stop(true, false)
	.animate({marginLeft:'0px',marginTop:'0px',opacity: 0}, 0)
	.animate({marginLeft:'0px',marginTop:'0px',opacity: 0}, 1000)
	.animate({marginLeft:'0px',marginTop:'0px',opacity: 1}, 1200);
  }); 

/*-------------------------------------
  gotop
-------------------------------------*/
jQuery.easing.quart = function (x, t, b, c, d) {
    return -c * ((t=t/d-1)*t*t*t - 1) + b;
};
 
jQuery(document).ready(function() {
	 //まずトップに戻るを消しておきます。
	jQuery("#pagetop").hide();

	 //スクロールされたら	
	jQuery(window).scroll(function () {
		//100pxいったら
		if (jQuery(this).scrollTop() > 150) {
			//トップに戻るをフェードイン
			jQuery('#pagetop').fadeIn();
		//100pxいかなかったら
		} else {
			//隠す
			jQuery('#pagetop').fadeOut();
		}
	});

	 //トップに戻るをクリックしたら	
	jQuery('#pagetop a').click(function () {
		//スムーズに上に戻る
		jQuery('body,html').animate({
			scrollTop: 0
		}, 1000, 'quart');
		return false;
	});
});


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


