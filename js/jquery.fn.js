;(function($){
	$.fn.serializeObject = function() {
		return this.serializeArray().serializeObject();
	};

	/*-------------------------------------------------------------------------
	 * dropdown
	 * ------------------------------------------------------------------------ */
	$.fn.dropdown=function(options){
		var options=$.extend({mouse_click:false},options);
		return this.each(function(){
			var elem=$(this),option=options,target=elem.find('.dropdown'),_trigger,originalPos,onFlg=true,tooltipInit=true;
			target.css({opacity:0});
			originalPos=target.css('top').replace('px','');
			/* Animation
			 ---------------------------------------- */
			function animateTo(onFlg){
				if(onFlg){
					elem.find('a').addClass('press');
					target.css({display:'block',top:originalPos-5+'px'});
					target.stop().animate({'top':originalPos+'px','opacity':1},200,'linear');
				}else{
					elem.find('a').removeClass('press');
					target.stop().animate({'top':originalPos-5+'px','opacity':0},200,'linear',function(){
						target.css({display:'none'});
					});
				}
			}
			/*ie10 Handler
			 ---------------------------------------- */
			 if( navigator.msMaxTouchPoints && navigator.msMaxTouchPoints > 1 && f_pass){
				 if(option.mouse_click){
					_trigger=elem.find('.dropdown_trigger');
					_trigger.bind("MSPointerDown", function(){PointerDown()});
				 }else{
					 this.addEventListener("MSPointerDown", PointerDown, false);
				 }
				function PointerDown(){
					if(onFlg){
						animateTo(onFlg);
						onFlg=false;
					}else{
						animateTo(onFlg);
						onFlg=true;
					}
				};
			}
			/* Hover Handler 
			 ---------------------------------------- */
			else if(!option.mouse_click){
				elem.hover(function(){
					animateTo(onFlg);
					onFlg=false;
				},function(){
					animateTo(onFlg);
					onFlg=true;
				});
			/* Click Handler
			 ---------------------------------------- */
			}else{
				_trigger=elem.find('.dropdown_trigger');
				_trigger.unbind("MSPointerDown");
				_trigger.click(function(){
					if(onFlg){
						animateTo(onFlg);
						onFlg=false;
					}else{
						animateTo(onFlg);
						onFlg=true;
					}
				});
			}
		});
	};
	
	/*-------------------------------------------------------------------------
	 * pagetop
	 * ------------------------------------------------------------------------ */
	var btn_totop = $('.bt_pagetop');
	var showFlag = false;
	var topBtn = $('.bt_pagetop');	
	topBtn.css({'right':'-100px','opacity':'0'});
	var showFlag = false;
	topBtn.hover(
		function(){
			$(this).css({'background-position':'left bottom'});
		},
		function(){
			$(this).css({'background-position':'left top'});
		}
	);
	//スクロールが100に達したらボタン表示
	$(window).scroll(function () {
		if ($(this).scrollTop() > 100) {
			if (showFlag == false) {
				showFlag = true;
				topBtn.stop().animate({'right' : '0px','opacity':'1'}, 400); 
			}
		} else {
			if (showFlag) {
				showFlag = false;
				topBtn.stop().animate({'right' : '-100px','opacity':'0'}, 400);
			}
		}
	});
	//スクロールしてトップ
    topBtn.click(function () {
		$('body,html').animate({
			scrollTop: 0
		}, 500);
		return false;
    });

})(jQuery);
