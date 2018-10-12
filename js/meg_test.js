var images = ['bg011.jpg', 'bg022.jpg', 'bg033.jpg'];
$('#player-over').css({'background-image': 'url(./images/' + images[Math.floor(Math.random() * images.length)] + ')'});



opening_animation();

function opening_animation() {
	//$('#start').fadeOut(500, 'easeInQuad');
	//$('#player-black').fadeOut(500, 'easeInQuad');
	$('#top').delay(500).animate({opacity: '1'}, 1000 , 'easeOutQuad');
	$('#banner').animate({opacity: '1'}, 500 , 'easeOutQuad');
}

//animation
var target_aboutMain = '#about__main';
var target_course01Id = '#course__01-content';
var target_course02Id = '#course__02-content';
var target_course03Id = '#course__03-content';
var target_course04Id = '#course__04-content';
var target_course05Id = '#course__05-content';
var target_info01Id = '#info__01-content';
var target_info02Id = '#info__02-content';
var target_info03Id = '#info__03-content';
var target_info04Id = '#info__04-content';
var target_contactMain = '#contact__main';
var target_partnerMain = '#partner__main';

function Animation() {
	//show target contents
	this.show_contents = function($target){
		if($target.find('.view').is(':hidden')) {
			$target.find('.view').stop().fadeIn(150, 'easeOutQuad');
		}
	}
	this.hide_contents = function($target){
		if($target.find('.view').is(':visible')) {
			$target.find('.view').stop().fadeOut(150, 'easeInQuad');
		}
	}

	//about
	this.about = function(_id) {
		switch(_id) {
			case '#about__main':
				show_main_about();
				break;
			case '#course__01-content':
				show_course01();
				break;
			case '#course__02-content':
				show_course02();
				break;
			case '#course__03-content':
				show_course03();
				break;
			case '#course__04-content':
				show_course04();
				break;
			case '#course__05-content':
				show_course05();
				break;
			case '#info__01-content':
				show_info01();
				break;
			case '#info__02-content':
				show_info02();
				break;
			case '#info__03-content':
				show_info03();
				break;
			case '#info__04-content':
				show_info04();
				break;
			case '#contact__main':
				show_main_contact();
				break;
			case '#partner__main':
				show_main_partner();
				break;
			
		}
	}
	this.hide_main_about = function(_callback) {
		$('#about__main').find("div[id^='about__main-']:visible").each(function() {
			$(this).stop().fadeOut(150, 'easeInQuad', _callback);
		});
	}

	this.hide_course01 = function(_callback) {
		$('#course__01').find("div[id^='course__01-']:visible").each(function() {
			$(this).stop().fadeOut(150, 'easeInQuad', _callback);
		});
	}
	this.hide_course02 = function(_callback) {
		$('#course__02').find("div[id^='course__02-']:visible").each(function() {
			$(this).stop().fadeOut(150, 'easeInQuad', _callback);
		});
	}
	this.hide_course03 = function(_callback) {
		$('#course__03').find("div[id^='course__03-']:visible").each(function() {
			$(this).stop().fadeOut(150, 'easeInQuad', _callback);
		});
	}
	this.hide_course04 = function(_callback) {
		$('#course__04').find("div[id^='course__04-']:visible").each(function() {
			$(this).stop().fadeOut(150, 'easeInQuad', _callback);
		});
	}
	this.hide_course05 = function(_callback) {
		$('#course__05').find("div[id^='course__05-']:visible").each(function() {
			$(this).stop().fadeOut(150, 'easeInQuad', _callback);
		});
	}
	this.hide_info01 = function(_callback) {
		$('#info__01').find("div[id^='info__01-']:visible").each(function() {
			$(this).stop().fadeOut(150, 'easeInQuad', _callback);
		});
	}
	this.hide_info02 = function(_callback) {
		$('#info__02').find("div[id^='info__02-']:visible").each(function() {
			$(this).stop().fadeOut(150, 'easeInQuad', _callback);
		});
	}
	this.hide_info03 = function(_callback) {
		$('#info__03').find("div[id^='info__03-']:visible").each(function() {
			$(this).stop().fadeOut(150, 'easeInQuad', _callback);
		});
	}
	this.hide_info04 = function(_callback) {
		$('#info__04').find("div[id^='info__04-']:visible").each(function() {
			$(this).stop().fadeOut(150, 'easeInQuad', _callback);
		});
	}
	this.hide_contact = function(_callback) {
		$('#contact__main').find("div[id^='contact__main-']:visible").each(function() {
			$(this).stop().fadeOut(150, 'easeInQuad', _callback);
		});
	}
	this.hide_partner = function(_callback) {
		$('#partner__main').find("div[id^='partner__main-']:visible").each(function() {
			$(this).stop().fadeOut(150, 'easeInQuad', _callback);
		});
	}

	
	function show_main_about() {
		var $about_main_about = $('#about__main-content');
		if($about_main_about.is(':hidden')) {
			var duration = 500;
			var $image_01 = $about_main_about.find('.image_01');
			var $text_01 = $about_main_about.find('.text_01');
			var $btn_01 = $about_main_about.find('.btn');
			var imageLeft = $image_01.css('left');
			var textLeft = $text_01.css('left');
			var btnTop = $btn_01.css('top');
			$image_01.css({left:parseInt(imageLeft) - 100}).animate({left:imageLeft}, duration, 'easeOutQuad');
			$text_01.css({left:parseInt(textLeft) + 100}).animate({left:textLeft}, duration);
			$btn_01.css({top:parseInt(btnTop) + 30}).animate({top:btnTop}, duration);
			$about_main_about.stop().fadeIn(duration, 'easeOutQuad');
		}
	}
/*	function show_npc01() {
		var $about_npc_01 = $('#about__npc-01');
		if($about_npc_01.is(':hidden')) {
			var duration = 500;
			var $image_01 = $about_npc_01.find('.image_01');
			var $text_01 = $about_npc_01.find('.text_01');
			var imageLeft = $image_01.css('left');
			var textLeft = $text_01.css('left');
			$image_01.css({left:parseInt(imageLeft) - 100}).animate({left:imageLeft}, duration, 'easeOutQuad');
			$text_01.css({left:parseInt(textLeft) + 100}).animate({left:textLeft}, duration, 'easeOutQuad');
			$about_npc_01.stop().fadeIn(duration, 'easeOutQuad');
		}
	}
	function show_npc02() {
		var $about_npc_02 = $('#about__npc-02');
		if($about_npc_02.is(':hidden')) {
			var duration = 500;
			var $image_01 = $about_npc_02.find('.image_01');
			var $text_01 = $about_npc_02.find('.text_01');
			var imageLeft = $image_01.css('left');
			var textLeft = $text_01.css('left');
			$image_01.css({left:parseInt(imageLeft) - 100}).animate({left:imageLeft}, duration, 'easeOutQuad');
			$text_01.css({left:parseInt(textLeft) + 100}).animate({left:textLeft}, duration, 'easeOutQuad');
			$about_npc_02.stop().fadeIn(duration, 'easeOutQuad');
		}
	}
	function show_npc03() {
		var $about_npc_03 = $('#about__npc-03');
		if($about_npc_03.is(':hidden')) {
			var duration = 500;
			var $image_01 = $about_npc_03.find('.image_01');
			var $text_01 = $about_npc_03.find('.text_01');
			var imageLeft = $image_01.css('left');
			var textLeft = $text_01.css('left');
			$image_01.css({left:parseInt(imageLeft) - 100}).animate({left:imageLeft}, duration, 'easeOutQuad');
			$text_01.css({left:parseInt(textLeft) + 100}).animate({left:textLeft}, duration, 'easeOutQuad');
			$about_npc_03.stop().fadeIn(duration, 'easeOutQuad');
		}
	}
	function show_npc04() {
		var $about_npc_04 = $('#about__npc-04');
		if($about_npc_04.is(':hidden')) {
			var duration = 500;
			var $image_01 = $about_npc_04.find('.image_01');
			var $text_01 = $about_npc_04.find('.text_01');
			var imageLeft = $image_01.css('left');
			var textLeft = $text_01.css('left');
			$image_01.css({left:parseInt(imageLeft) - 100}).animate({left:imageLeft}, duration, 'easeOutQuad');
			$text_01.css({left:parseInt(textLeft) + 100}).animate({left:textLeft}, duration, 'easeOutQuad');
			$about_npc_04.stop().fadeIn(duration, 'easeOutQuad');
		}
	}
	function show_npc05() {
		var $about_npc_05 = $('#about__npc-05');
		if($about_npc_05.is(':hidden')) {
			var duration = 500;
			var $image_01 = $about_npc_05.find('.image_01');
			var $text_01 = $about_npc_05.find('.text_01');
			var imageLeft = $image_01.css('left');
			var textLeft = $text_01.css('left');
			$image_01.css({left:parseInt(imageLeft) - 100}).animate({left:imageLeft}, duration, 'easeOutQuad');
			$text_01.css({left:parseInt(textLeft) + 100}).animate({left:textLeft}, duration, 'easeOutQuad');
			$about_npc_05.stop().fadeIn(duration, 'easeOutQuad');
		}
	}
	function show_map01() {
		var $about_map_01 = $('#about__map-01');
		if($about_map_01.is(':hidden')) {
			var duration = 500;
			var $image_01 = $about_map_01.find('.image_01');
			var $text_01 = $about_map_01.find('.text_01');
			var image01Left = $image_01.css('left');
			var textLeft = $text_01.css('left');
			$text_01.css({left:parseInt(textLeft) + 100}).animate({left:textLeft}, duration);
			$about_map_01.stop().fadeIn(duration, 'easeOutQuad');
		}
	}
	function show_map02() {
		var $about_map_02 = $('#about__map-02');
		if($about_map_02.is(':hidden')) {
			var duration = 500;
			var $image_01 = $about_map_02.find('.image_01');
			var $text_01 = $about_map_02.find('.text_01');
			var image01Left = $image_01.css('left');
			var textLeft = $text_01.css('left');
			$text_01.css({left:parseInt(textLeft) + 100}).animate({left:textLeft}, duration);
			$about_map_02.stop().fadeIn(duration, 'easeOutQuad');
		}
	}
	function show_map03() {
		var $about_map_03 = $('#about__map-03');
		if($about_map_03.is(':hidden')) {
			var duration = 500;
			var $image_01 = $about_map_03.find('.image_01');
			var $text_01 = $about_map_03.find('.text_01');
			var image01Left = $image_01.css('left');
			var textLeft = $text_01.css('left');
			$text_01.css({left:parseInt(textLeft) + 100}).animate({left:textLeft}, duration);
			$about_map_03.stop().fadeIn(duration, 'easeOutQuad');
		}
	}
	function show_pab01() {
		var $about_pab_01 = $('#about__pab-01');
		if($about_pab_01.is(':hidden')) {
			var duration = 500;
			var $image_01 = $about_pab_01.find('.image_01');
			var $text_01 = $about_pab_01.find('.text_01');
			var image01Left = $image_01.css('left');
			var textLeft = $text_01.css('left');
			$text_01.css({left:parseInt(textLeft) + 100}).animate({left:textLeft}, duration);
			$about_pab_01.stop().fadeIn(duration, 'easeOutQuad');
		}
	}
	function show_pab02() {
		var $about_pab_02 = $('#about__pab-02');
		if($about_pab_02.is(':hidden')) {
			var duration = 500;
			var $image_01 = $about_pab_02.find('.image_01');
			var $text_01 = $about_pab_02.find('.text_01');
			var imageLeft = $image_01.css('left');
			var textLeft = $text_01.css('left');
			$image_01.css({left:parseInt(imageLeft) - 100}).animate({left:imageLeft}, duration, 'easeOutQuad');
			$text_01.css({left:parseInt(textLeft) + 100}).animate({left:textLeft}, duration, 'easeOutQuad');
			$about_pab_02.stop().fadeIn(duration, 'easeOutQuad');
		}
	}
	function show_pab03() {
		var $about_pab_03 = $('#about__pab-03');
		if($about_pab_03.is(':hidden')) {
			var duration = 500;
			var $image_01 = $about_pab_03.find('.image_01');
			var $text_01 = $about_pab_03.find('.text_01');
			var imageLeft = $image_01.css('left');
			var textLeft = $text_01.css('left');
			$image_01.css({left:parseInt(imageLeft) - 100}).animate({left:imageLeft}, duration, 'easeOutQuad');
			$text_01.css({left:parseInt(textLeft) + 100}).animate({left:textLeft}, duration, 'easeOutQuad');
			$about_pab_03.stop().fadeIn(duration, 'easeOutQuad');
		}
	}
	function show_pab04() {
		var $about_pab_04 = $('#about__pab-04');
		if($about_pab_04.is(':hidden')) {
			var duration = 500;
			var $image_01 = $about_pab_04.find('.image_01');
			var $text_01 = $about_pab_04.find('.text_01');
			var imageLeft = $image_01.css('left');
			var textLeft = $text_01.css('left');
			$image_01.css({left:parseInt(imageLeft) - 100}).animate({left:imageLeft}, duration, 'easeOutQuad');
			$text_01.css({left:parseInt(textLeft) + 100}).animate({left:textLeft}, duration, 'easeOutQuad');
			$about_pab_04.stop().fadeIn(duration, 'easeOutQuad');
		}
	}
	function show_firstbrood01() {
		var $about_first_brood_01 = $('#about__first-brood-01');
		if($about_first_brood_01.is(':hidden')) {
			var duration = 500;
			var $image_01 = $about_first_brood_01.find('.image_01');
			var $text_01 = $about_first_brood_01.find('.text_01');
			var imageLeft = $image_01.css('left');
			var textLeft = $text_01.css('left');
			$image_01.css({left:parseInt(imageLeft) - 100}).animate({left:imageLeft}, duration, 'easeOutQuad');
			$text_01.css({left:parseInt(textLeft) + 100}).animate({left:textLeft}, duration, 'easeOutQuad');
			$about_first_brood_01.stop().fadeIn(duration, 'easeOutQuad');
		}
	}
	function show_firstbrood02() {
		var $about_first_brood_02 = $('#about__first-brood-02');
		if($about_first_brood_02.is(':hidden')) {
			var duration = 500;
			var $image_01 = $about_first_brood_02.find('.image_01');
			var $text_01 = $about_first_brood_02.find('.text_01');
			var imageLeft = $image_01.css('left');
			var textLeft = $text_01.css('left');
			$image_01.css({left:parseInt(imageLeft) - 100}).animate({left:imageLeft}, duration, 'easeOutQuad');
			$text_01.css({left:parseInt(textLeft) + 100}).animate({left:textLeft}, duration, 'easeOutQuad');
			$about_first_brood_02.stop().fadeIn(duration, 'easeOutQuad');
		}
	}
	function show_bestiary() {
		var $about_bestiary_content = $('#about__bestiary-content');
		if($about_bestiary_content.is(':hidden')) {
			var duration = 500;
			var $image_01 = $about_bestiary_content.find('.image_01');
			var $text_01 = $about_bestiary_content.find('.text_01');
			var image01Left = $image_01.css('left');
			var textLeft = $text_01.css('left');
			$text_01.css({left:parseInt(textLeft) + 100}).animate({left:textLeft}, duration);
			$about_bestiary_content.stop().fadeIn(duration, 'easeOutQuad');
		}
	}
	function show_jobMachinist() {
		var $about_job_machinist = $('#about__job-machinist');
		if($about_job_machinist.is(':hidden')) {
			var duration = 500;
			var $image_01 = $about_job_machinist.find('.image_01');
			var $image_02 = $about_job_machinist.find('.image_02');
			var $text_01 = $about_job_machinist.find('.text_01');
			var image01Left = $image_01.css('left');
			var image02Top = $image_02.css('top');
			var textLeft = $text_01.css('left');
			$image_01.css({left:parseInt(image01Left) - 100}).animate({left:image01Left}, duration, 'easeOutQuad');
			$image_02.css({top:parseInt(image02Top) + 20}).animate({top:image02Top}, duration, 'easeOutQuad');
			$text_01.css({left:parseInt(textLeft) + 100}).animate({left:textLeft}, duration, 'easeOutQuad');
			$about_job_machinist.stop().fadeIn(duration, 'easeOutQuad');
		}
	}
	function show_raceAurarean() {
		var $about_race_aurarean = $('#about__race-aurarean');
		if($about_race_aurarean.is(':hidden')) {
			var duration = 500;
			var $image_01 = $about_race_aurarean.find('.image_01');
			var $image_02 = $about_race_aurarean.find('.image_02');
			var $text_01 = $about_race_aurarean.find('.text_01');
			var image01Left = $image_01.css('left');
			var image02Left = $image_02.css('left');
			var textLeft = $text_01.css('left');
			$image_01.css({left:parseInt(image01Left) - 100}).animate({left:image01Left}, duration, 'easeOutQuad');
			$image_02.css({left:parseInt(image02Left) - 50}).animate({left:image02Left}, duration, 'easeOutQuad');
			$text_01.css({left:parseInt(textLeft) + 100}).animate({left:textLeft}, duration, 'easeOutQuad');
			$about_race_aurarean.stop().fadeIn(duration, 'easeOutQuad');
		}
	}
	function show_raceAuraxaela() {
		var $about_race_auraxaela = $('#about__race-auraxaela');
		if($about_race_auraxaela.is(':hidden')) {
			var duration = 500;
			var $image_01 = $about_race_auraxaela.find('.image_01');
			var $image_02 = $about_race_auraxaela.find('.image_02');
			var $text_01 = $about_race_auraxaela.find('.text_01');
			var image01Left = $image_01.css('left');
			var image02Left = $image_02.css('left');
			var textLeft = $text_01.css('left');
			$image_01.css({left:parseInt(image01Left) - 50}).animate({left:image01Left}, duration, 'easeOutQuad');
			$image_02.css({left:parseInt(image02Left) - 100}).animate({left:image02Left}, duration, 'easeOutQuad');
			$text_01.css({left:parseInt(textLeft) + 100}).animate({left:textLeft}, duration);
			$about_race_auraxaela.stop().fadeIn(duration, 'easeOutQuad');
		}
	}
	function show_jobDarkknight() {
		var $about_job_darkknight = $('#about__job-darkknight');
		if($about_job_darkknight.is(':hidden')) {
			var duration = 500;
			var $image_01 = $about_job_darkknight.find('.image_01');
			var $text_01 = $about_job_darkknight.find('.text_01');
			var imageLeft = $image_01.css('left');
			var textLeft = $text_01.css('left');
			$image_01.css({left:parseInt(imageLeft) - 100}).animate({left:imageLeft}, duration, 'easeOutQuad');
			$text_01.css({left:parseInt(textLeft) + 100}).animate({left:textLeft}, duration, 'easeOutQuad');
			$about_job_darkknight.stop().fadeIn(duration, 'easeOutQuad');
		}
	}
	function show_jobAstrologian() {
		var $about_job_astrologian = $('#about__job-astrologian');
		if($about_job_astrologian.is(':hidden')) {
			var duration = 500;
			var $image_01 = $about_job_astrologian.find('.image_01');
			var $text_01 = $about_job_astrologian.find('.text_01');
			var imageLeft = $image_01.css('left');
			var textLeft = $text_01.css('left');
			$image_01.css({left:parseInt(imageLeft) - 100}).animate({left:imageLeft}, duration, 'easeOutQuad');
			$text_01.css({left:parseInt(textLeft) + 100}).animate({left:textLeft}, duration, 'easeOutQuad');
			$about_job_astrologian.stop().fadeIn(duration, 'easeOutQuad');
		}
	}*/
	
	function show_course01() {
		var $course_01_content = $('#course__01-content');
		if($course_01_content.is(':hidden')) {
			var duration = 500;
			var $image_01 = $course_01_content.find('.image_01');
			var $text_01 = $course_01_content.find('.text_01');
			var $btn_01 = $course_01_content.find('.btn');
			var imageLeft = $image_01.css('left');
			var textLeft = $text_01.css('left');
			var btnTop = $btn_01.css('top');
			$image_01.css({left:parseInt(imageLeft) - 100}).animate({left:imageLeft}, duration, 'easeOutQuad');
			$text_01.css({left:parseInt(textLeft) + 100}).animate({left:textLeft}, duration);
			$btn_01.css({top:parseInt(btnTop) + 30}).animate({top:btnTop}, duration);
			$course_01_content.stop().fadeIn(duration, 'easeOutQuad');
		}
	}
	function show_course02() {
		var $course_02_content = $('#course__02-content');
		if($course_02_content.is(':hidden')) {
			var duration = 500;
			var $image_01 = $course_02_content.find('.image_01');
			var $text_01 = $course_02_content.find('.text_01');
			var $btn_01 = $course_02_content.find('.btn');
			var imageLeft = $image_01.css('left');
			var textLeft = $text_01.css('left');
			var btnTop = $btn_01.css('top');
			$image_01.css({left:parseInt(imageLeft) + 100}).animate({left:imageLeft}, duration, 'easeOutQuad');
			$text_01.css({left:parseInt(textLeft) - 100}).animate({left:textLeft}, duration);
			$btn_01.css({top:parseInt(btnTop) + 30}).animate({top:btnTop}, duration);
			$course_02_content.stop().fadeIn(duration, 'easeOutQuad');
		}
	}
	function show_course03() {
		var $course_03_content = $('#course__03-content');
		if($course_03_content.is(':hidden')) {
			var duration = 500;
			var $image_01 = $course_03_content.find('.image_01');
			var $text_01 = $course_03_content.find('.text_01');
			var $btn_01 = $course_03_content.find('.btn');
			var imageLeft = $image_01.css('left');
			var textLeft = $text_01.css('left');
			var btnTop = $btn_01.css('top');
			$image_01.css({left:parseInt(imageLeft) - 100}).animate({left:imageLeft}, duration, 'easeOutQuad');
			$text_01.css({left:parseInt(textLeft) + 100}).animate({left:textLeft}, duration);
			$btn_01.css({top:parseInt(btnTop) + 30}).animate({top:btnTop}, duration);
			$course_03_content.stop().fadeIn(duration, 'easeOutQuad');
		}
	}
	function show_course04() {
		var $course_04_content = $('#course__04-content');
		if($course_04_content.is(':hidden')) {
			var duration = 500;
			var $image_01 = $course_04_content.find('.image_01');
			var $text_01 = $course_04_content.find('.text_01');
			var $btn_01 = $course_04_content.find('.btn');
			var imageLeft = $image_01.css('left');
			var textLeft = $text_01.css('left');
			var btnTop = $btn_01.css('top');
			$image_01.css({left:parseInt(imageLeft) + 100}).animate({left:imageLeft}, duration, 'easeOutQuad');
			$text_01.css({left:parseInt(textLeft) - 100}).animate({left:textLeft}, duration);
			$btn_01.css({top:parseInt(btnTop) + 30}).animate({top:btnTop}, duration);
			$course_04_content.stop().fadeIn(duration, 'easeOutQuad');
		}
	}
	function show_course05() {
		var $course_05_content = $('#course__05-content');
		if($course_05_content.is(':hidden')) {
			var duration = 500;
			var $image_01 = $course_05_content.find('.image_01');
			var $text_01 = $course_05_content.find('.text_01');
			var $btn_01 = $course_05_content.find('.btn');
			var imageLeft = $image_01.css('left');
			var textLeft = $text_01.css('left');
			var btnTop = $btn_01.css('top');
			$image_01.css({left:parseInt(imageLeft) - 100}).animate({left:imageLeft}, duration, 'easeOutQuad');
			$text_01.css({left:parseInt(textLeft) + 100}).animate({left:textLeft}, duration);
			$btn_01.css({top:parseInt(btnTop) + 30}).animate({top:btnTop}, duration);
			$course_05_content.stop().fadeIn(duration, 'easeOutQuad');
		}
	}
	function show_info01() {
		var $info_01_content = $('#info__01-content');
		if($info_01_content.is(':hidden')) {
			var duration = 500;
			var $image_01 = $info_01_content.find('.image_01');
			var $text_01 = $info_01_content.find('.text_01');
			var imageLeft = $image_01.css('left');
			var textLeft = $text_01.css('left');
			$image_01.css({left:parseInt(imageLeft) - 100}).animate({left:imageLeft}, duration, 'easeOutQuad');
			$text_01.css({left:parseInt(textLeft) + 100}).animate({left:textLeft}, duration);
			$info_01_content.stop().fadeIn(duration, 'easeOutQuad');
		}
	}
	
	function show_info02() {
		var $info_02_content = $('#info__02-content');
		if($info_02_content.is(':hidden')) {
			var duration = 500;
			var $text_01 = $info_02_content.find('.text_01');
			var $text_02 = $info_02_content.find('.text_02');
			var $btn_01 = $info_02_content.find('.btn');
			var text01Left = $text_01.css('left');
			var text02Left = $text_02.css('left');
			var btnTop = $btn_01.css('top');
			
			$text_01.css({left:parseInt(text01Left) - 100}).animate({left:text01Left}, duration);
			$text_02.css({left:parseInt(text02Left) - 100}).animate({left:text02Left}, duration);
			$btn_01.css({top:parseInt(btnTop) + 30}).animate({top:btnTop}, duration);
			$info_02_content.stop().fadeIn(duration, 'easeOutQuad');
		}
	}
	
	function show_info03() {
		var $info_03_content = $('#info__03-content');
		if($info_03_content.is(':hidden')) {
			var duration = 500;
			var $image_01 = $info_03_content.find('.image_01');
			var $image_02 = $info_03_content.find('.image_02');
			var image01Left = $image_01.css('left');
			var image02Left = $image_02.css('left');
			
			$image_01.css({left:parseInt(image01Left) - 100}).animate({left:image01Left}, duration);
			$image_02.css({left:parseInt(image02Left) + 100}).animate({left:image02Left}, duration);
			$info_03_content.stop().fadeIn(duration, 'easeOutQuad');
		}
	}
	
	function show_info04() {
		var $info_04_content = $('#info__04-content');
		if($info_04_content.is(':hidden')) {
			var duration = 500;
			var $image_01 = $info_04_content.find('.image_01');
			var image01Left = $image_01.css('left');
			
			$image_01.css({left:parseInt(image01Left) - 100}).animate({left:image01Left}, duration);
			$info_04_content.stop().fadeIn(duration, 'easeOutQuad');
		}
	}
	
	function show_main_contact() {
		var $contact_main_contact = $('#contact__main-content');
		if($contact_main_contact.is(':hidden')) {
			var duration = 500;
			var $image_01 = $contact_main_contact.find('.image_01');
			var $text_01 = $contact_main_contact.find('.text_01');
			var imageLeft = $image_01.css('left');
			var textLeft = $text_01.css('left');
			$image_01.css({left:parseInt(imageLeft) - 100}).animate({left:imageLeft}, duration, 'easeOutQuad');
			$text_01.css({left:parseInt(textLeft) + 100}).animate({left:textLeft}, duration);
			$contact_main_contact.stop().fadeIn(duration, 'easeOutQuad');
		}
	}
	
	function show_main_partner() {
		var $partner_main_partner = $('#partner__main-content');
		if($partner_main_partner.is(':hidden')) {
			var duration = 500;
			var $image_01 = $partner_main_partner.find('.image_01');
			var $text_01 = $partner_main_partner.find('.text_01');
			var imageLeft = $image_01.css('left');
			var textLeft = $text_01.css('left');
			$image_01.css({left:parseInt(imageLeft) - 100}).animate({left:imageLeft}, duration, 'easeOutQuad');
			$text_01.css({left:parseInt(textLeft) + 100}).animate({left:textLeft}, duration);
			$partner_main_partner.stop().fadeIn(duration, 'easeOutQuad');
		}
	}
}
var animation = new Animation();

//navigation
function Navigation() {
	//set move
	this.set_move = function() {
		$('#global_nav-top a, #global_nav-conts a, #header-conts .logo a, #button-buynow a, #news a').on('click', function() {
			var targetId = $(this).attr('href');
			set_scroll_top(targetId);
			return false;
		});
	}

	//show header-conts
	var flg_headerConts = true;
	this.show_headerConts = function() {
		if(flg_headerConts) {
			flg_headerConts = false;
			$('#header-conts').stop().animate({top: 0}, 400, 'easeOutQuad');
		}
	}
	this.hide_headerConts = function() {
		if(!flg_headerConts) {
			flg_headerConts = true;
			$('#header-conts').stop().animate({top: '-100px'}, 400, 'easeInQuad');
		}
	}

	this.trigger_contsNav = function() {
		$('.conts_nav ul li a').on('click', function() {
			$(this).closest('ul').find('a').removeClass('active');
			$(this).addClass('active');
			animation.about($(this).attr("href"));

			var targetId = '#' + $(this).parents('section.conts').attr('id');
			set_scroll_top(targetId);

			return false;
		});
	}

	// header_conts indicator
	var indicator_position = 'course';
	var subnav_visible = true;
	this.set_indicator_position = function(position_class_name) {
		if (indicator_position === position_class_name) {
			return;
		}
		indicator_position = position_class_name;

		var $header_conts = $('#header-conts');
		var $subnav = $header_conts.find('.subnav');
		var $indicator = $header_conts.find('.indicate');
		var $target_li = $header_conts.find('li.' + position_class_name);
		var left_position = $target_li.css('left');
		var duration = 400;
		if (position_class_name === 'top') {
			$indicator.stop().animate({'opacity': 0, 'left': 0}, duration, 'easeInQuad');
		} else {
			$indicator.stop().animate({'opacity': 1, 'left': left_position}, duration, 'easeOutQuad');
		}
		if (( position_class_name === 'top')) {
			subnav_visible = false;
			$subnav.css({'margin-top': '-32px'});
		} else
		if (( position_class_name === 'about' || position_class_name === 'contact') && subnav_visible) {
			subnav_visible = false;
			$subnav.stop().animate({'margin-top': '-32px'}, duration, 'easeInQuad');
		} else
		 if ((  position_class_name === 'about' || position_class_name === 'contact' || position_class_name === 'reserve' ) && !subnav_visible) {
			$subnav.stop().animate({'margin-top': '-32px'}, duration, 'easeInQuad');
			subnav_visible = false;
		} else {
			if (!subnav_visible) {
				$subnav.stop().animate({'margin-top': '-4px'}, duration, 'easeOutQuad');
				subnav_visible = true;
			} 
			
			//var $subnav_ul = $subnav.find('.' + position_class_name);
			var subnav_position;
			
			if(position_class_name == 'course'){subnav_position = '0px'};
			if(position_class_name == 'info'){subnav_position = '-28px'};
			$header_conts.find('.subnav .subnav__inner').stop().animate({'margin-top': subnav_position}, duration, 'easeOutQuad');
		}
	};

	this.adjust_scroll_position = function(scroll_position) {
		$('.scroll_manage').each(function() {
			var targetId = '#' + $(this).attr('id');
			/*if (targetId === '#top') {
				return;
			}*/
			var pos = $(this).offset().top;
			if (targetId === '#about_area' ||targetId === '#contact_area' || targetId === '#reserve') {
				pos -= 72;
			} else {
				pos -= 100;
			}

			if (Math.floor(scroll_position) === Math.floor(pos)) {
				return false;
			}
			if (scroll_position < pos + 150 && scroll_position > pos - 150) {
				set_scroll_top(targetId);
				return false;
			}
		});
	}

	function set_scroll_top(targetId) {
		var pos = $(targetId).offset().top;
		if (targetId === '#about_area' ||targetId === '#contact_area' || targetId === '#reserve') {
			pos -= 72;
		} else {
			pos -= 100;
		}
		$('body,html').stop().animate({scrollTop: pos}, 600, 'swing');
	}
}
var navigation = new Navigation();

function scroll_manager() {
	var $w = $(window);

	// header_conts left position adjust
	var $header_conts = $('#header-conts');
	var $header_conts_width = $header_conts.find('.nav__inner').width();
	if ($w.width() < $header_conts_width) {
		$header_conts.css('left', - $w.scrollLeft());
	} else {
		$header_conts.css('left', '');
	}

	// header_conts indicator
	$($header_conts.find('.nav ul li a').get().reverse()).each(function() {
		var $this = $(this);
		var targetId = $this.attr('href');
		var targetTop = $(targetId).offset().top;
		var nav_height;
		if (targetId === '#contact_area'||targetId === '#about_area'||targetId === '#top') {
			nav_height = 72;
		} else {
			nav_height = 100;
		}

		if (targetId === '#top' || $w.scrollTop() < targetTop - nav_height) {
			// loop continue
			return;
		}

		var $target_li = $this.parent('li');
		var target_class_name = $target_li.attr('class');
		navigation.set_indicator_position(target_class_name);

		return false;
	});

	// subnav active control
	$($header_conts.find('.subnav ul li a').get().reverse()).each(function() {
		var $this = $(this);
		var targetId = $this.attr('href');
		var targetTop = $(targetId).offset().top;
		var nav_height = 100;

		if ($w.scrollTop() < targetTop - nav_height) {
			// loop continue
			return;
		}
		if (!$this.hasClass('active')) {
			$header_conts.find('.subnav ul li a.active').removeClass('active');
			$this.addClass('active');
		}

		return false;
	});

	var global_nav_height = 100;
	$('.scroll_manage').each(function()　{
		var $this = $(this);
		var offset = $this.offset();

		// 固定メニュー出現判定
		if($this.attr('id') == 'top') {
			var $nav_top = $('#global_nav-top li');
			var nav_top_offset = $nav_top.offset();
			var nav_top_height = $nav_top.height();
			if($w.scrollTop() >= nav_top_offset.top + nav_top_height) {
				navigation.show_headerConts();
			} else {
				navigation.hide_headerConts();
			}
		}
		// 固定メニュー出現〜コンテンツトップまでの表示制御
		if($this.attr('id') == 'contents') {
			if ($w.scrollTop() < offset.top - global_nav_height) {
				navigation.set_indicator_position('top');
			}
		}

		//view: window top & bottom
		if (($w.scrollTop() + $w.height()*0.6) > offset.top && ((offset.top + $this.height()*0.4) >= $w.scrollTop())) {
			switch ($this.attr('id')) {
				//section
				//about
				case 'about__main':
					animation.show_contents($this);
					animation.about(target_aboutMain);
					break;
				case 'about__npc':
					animation.show_contents($this);
					animation.about(target_aboutNpcId);
					break;
				case 'about__job':
					//console.log('show about__job');	
					animation.show_contents($this);
					animation.about(target_aboutJobId);
					break;
				case 'about__race':
					//console.log('show about__race');
					animation.show_contents($this);
					animation.about(target_aboutRaceId);
					break;
				case 'about__map':
					animation.show_contents($this);
					animation.about(target_aboutMapId);
					break;
				case 'about__pab':
					animation.show_contents($this);
					animation.about(target_aboutPabId);
					break;
				case 'about__first-brood':
					animation.show_contents($this);
					animation.about(target_aboutFirstbroodId);
					break;
				case 'about__bestiary':
					animation.show_contents($this);
					animation.about(target_aboutBestiaryId);
					break;

				//course
				case 'course__01':
					animation.show_contents($this);
					animation.about(target_course01Id);
					break;
				case 'course__02':
					animation.show_contents($this);
					animation.about(target_course02Id);
					break;
				case 'course__03':
					animation.show_contents($this);
					animation.about(target_course03Id);
					break;
				case 'course__04':
					animation.show_contents($this);
					animation.about(target_course04Id);
					break;
				case 'course__05':
					animation.show_contents($this);
					animation.about(target_course05Id);
					break;
				

				//info
				case 'info__01':
					animation.show_contents($this);
					animation.about(target_info01Id);
					break;
				case 'info__02':
					animation.show_contents($this);
					animation.about(target_info02Id);
					break;
				case 'info__03':
					animation.show_contents($this);
					animation.about(target_info03Id);
					break;
				case 'info__04':
					animation.show_contents($this);
					animation.about(target_info04Id);
					break;
				
				// contact	
				case 'contact__main':
					animation.show_contents($this);
					animation.about(target_contactMain);
					break;
					
				// partner
				case 'partner__main':
					animation.show_contents($this);
					animation.about(target_partnerMain);
					break;
			}
		}
	});
}

var fade_time = 400;
$(function() {
	/* 背景動画のリサイズ */
	var rate = 1920/1080;
	function ysize() {
		var ww = $(window).width();
		var wh =  $(window).height() + 40;
		var lt = ((wh *rate) - ww) / 2;
		$('#heavensward_movie').css({
			height: wh + 'px',
			width: wh * rate + 'px',
			left: lt * -1 + 'px'
		});

		if (ww > (wh * rate)) {
			$('#heavensward_movie').css({
				height: ww / rate + 'px',
				width: ww + 'px',
				left: '0px'
			});
		}
	}

	$('#global_nav-top li,#global_nav-conts ul li').hover(
		function(){
			$(this).find('.over,ul').stop().fadeIn(fade_time, 'easeOutQuad');
			$(this).find('ul li').stop().animate({'margin-top':0,'opacity':1},fade_time, 'easeOutQuad');
		},
		function(){
			$(this).find('.over').stop().fadeOut(fade_time, 'easeInQuad');
			var mtTop = 0;
			$(this).find('ul li').each(function(){
				mtTop = mtTop+10;
				$(this).stop().animate({'margin-top':'-'+mtTop+'px','opacity':0},fade_time, 'easeInQuad');
			});
		}
	);
	$('.modal_list li a').hover(
		function(){
			$(this).find('.over').stop().animate({'opacity':1},fade_time, 'easeOutQuad');
		},
		function(){
			$(this).find('.over').stop().animate({'opacity':0},fade_time, 'easeInQuad');
		}
	);

	$('.trailer__button').hover(
		function(){
			$(this).find('.over').stop().animate({'opacity':1},fade_time, 'easeOutQuad');
			$(this).find('.normal').stop().animate({'opacity':0},fade_time, 'easeInQuad');
		},
		function(){
			$(this).find('.over').stop().animate({'opacity':0},fade_time, 'easeInQuad');
			$(this).find('.normal').stop().animate({'opacity':1},fade_time, 'easeOutQuad');
		}
	);

	/*var ua = navigator.userAgent;
	if (ua.indexOf('PLAYSTATION 3') != -1) {
		var isPS3 = true;
	}
	if (!isPS3) {
		
		var params = {allowScriptAccess: 'always', wmode: 'opaque'};
		var atts = {id: 'myytplayer'};
		swfobject.embedSWF(
			'http://www.youtube.com/apiplayer?enablejsapi=1&version=3&playerapiid=ytplayer',
			'ytapiplayer',
			'100%',
			'100%',
			'8',
			null,
			null,
			params,
			atts
		);
	}*/

	/* facybox */
	/*$('a.movie').fancybox({
		'transitionIn': 'none',
		'transitionOut': 'none',
		'type': 'iframe',
		'autoScale': true,
		'width': '1280',
		'height': '720',
		'padding': 0,
		'showClaseButton': false,
		'autoScale': false,
		'aspectRatio': true,
		'beforeLoad': function() {
			if (ytplayer) {
				ytplayer.pauseVideo();
			}
		},
		'beforeClose': function() {
			// $('#meg-title').addClass('meg-logo');
			if (ytplayer) {
				ytplayer.playVideo();
			}
		},
		'helpers' : {
			'overlay' : {
				'css' : {
					'background' : 'rgba(0, 0, 0, 0.9)'
				}
			}
		}
	});*/

	/* facybox */
	/*$('a.overlay').fancybox({
		'transitionIn' : 'none',
		'transitionOut' : 'none',
		'padding' : 0,
		'showClaseButton' : false,
		'autoScale' : false,
		'helpers' : {
			'overlay' : {
				'css' : {
					'background' : 'rgba(0, 0, 0, 0.6)'
				}
			}
		}
	});*/

	// $(window).bind('load', function() {
	jQuery.event.add(window, "load", function(){
		//movie
		/* player が準備出来なかった場合 */
		if ($('#bg').length > 0) {
			$('#player-over').css({'background-size': 'cover'});
			$('#bg').css({'background-size': 'cover'}); 

			setTimeout(function() {
				opening_animation();
			}, 2500);
		} else {
			$(window).bind('resize', function() {
				ysize();
			});
			ysize();
		}

		//scroll
		$(window).scroll(function() {
			scroll_manager();
		});
		scroll_manager();

		navigation.set_move();
		navigation.trigger_contsNav();
		$('#news').perfectScrollbar();

		$('.social_plugin_bt_box li').hover(
			function(){
				$(this).css({'opacity' : 1});
			},
			function(){
				$(this).css({'opacity' : 0.2});
			}
		);

		if($('#du').length){
			if(location.hash == '#du'){
				var anchor_pos=$('#du').offset().top - 72;
				$('html,body').stop().animate({scrollTop:anchor_pos},800,'easeInOutExpo');
			}
		}
	});
	$('.info__content').info__content();

	$('a[href="/meg/#du"]').click(function(){
		var anchor_pos=$('#du').offset().top - 72;
		$('html,body').stop().animate({scrollTop:anchor_pos},800,'easeInOutExpo');
	});
});

;(function($){
	/*-------------------------------------------------------------------------
	 * Media Player
	 * ------------------------------------------------------------------------ */
	$.fn.info__content=function(){
		return this.each(function(){
			var $this = $(this),
				$view = $this.find('.info_viewer'),
				$viewer_next = $this.find('.info_viewer_next'),
				$viewer_prev = $this.find('.info_viewer_prev'),
				$next = $this.find('.info_thumb_next'),
				$prev = $this.find('.info_thumb_prev'),
				$thumb_wrapper = $this.find('.info_thumb_cont ul'),
				$thumb = $this.find('.info_thumb_cont li'),
				$pager = $this.find('.info_thumb_pager'),
				$pagination,
				count = 0,
				box_length = 0,
				thumb_size = $thumb.length;
			
			box_length = Math.ceil(thumb_size/6);
			$view.hover(
				function(){
					$viewer_next.fadeIn(400,'easeOutQuad');
					$viewer_prev.fadeIn(400,'easeOutQuad');
				},
				function(){
					$viewer_next.fadeOut(400,'easeInQuad');
					$viewer_prev.fadeOut(400,'easeInQuad');
			});
			//pager
			for(var i=0; i<box_length; i++){
				$pager.append('<li></li>');
			}
			$pagination=$pager.find('li');
			if($thumb.length<6){
				$next.remove();
				$prev.remove();
				$pager.remove();
				$thumb_wrapper.width((106+8)*$thumb.length).css({'margin':'0 auto'});
			}
			var pager_w=($pagination.width()+4)*box_length;
			if(pager_w > 684){pager_w=684;}
			$pager.css({width:pager_w,marginLeft:-(pager_w/2)});
			
			function thumb_slide(){
				var interval=$thumb.outerWidth()*6, //1set size
						move_pos=-(interval*count),
						_length=$thumb.outerWidth()*$thumb.length;
				
				if(move_pos < (-(_length-interval))){ //last pos
					move_pos=-(_length-interval);
				}
				
				$thumb_wrapper.stop().animate({marginLeft:move_pos},800,'easeInOutExpo');
			}
			
			function pager_indicate(index){
				$pagination.removeClass('active');
				$pagination.eq(index).addClass('active');
			}

			var this_page = 0;

			$viewer_next.click(function(){
				var $active_thumb = $thumb_wrapper.find('.active'),
					this_num = $thumb.index($active_thumb),
					next_num = this_num+1;

				count=Math.floor(next_num/6);
				if(next_num == thumb_size){
					count=0;
					next_num=0;
				}
				var change_url = $thumb.eq(next_num).find('img.thamb').attr('data_url');
				$view.find('img').attr('src',change_url);
				$thumb.removeClass('active').find('.over').stop().animate({'opacity':0},400, 'easeInQuad');
				$thumb.eq(next_num).addClass('active').find('.over').stop().animate({'opacity':1},400, 'easeOutQuad');

				if(this_page === count){
					return;
				}
				this_page = count;
				thumb_slide();
				pager_indicate(count);
			});
			$viewer_prev.click(function(){
				var $active_thumb = $thumb_wrapper.find('.active'),
					this_num = $thumb.index($active_thumb),
					prev_num = this_num-1;

				if(prev_num < 0){prev_num=thumb_size-1}
				count=Math.floor(prev_num/6);
				if(count<0){count=box_length-1;}

				var change_url = $thumb.eq(prev_num).find('img.thamb').attr('data_url');
				$view.find('img').attr('src',change_url);
				$thumb.removeClass('active').find('.over').stop().animate({'opacity':0},400, 'easeInQuad');
				$thumb.eq(prev_num).addClass('active').find('.over').stop().animate({'opacity':1},400, 'easeOutQuad');

				if(this_page === count){
					return;
				}
				this_page = count;
				thumb_slide();
				pager_indicate(count);
			});
			$thumb.click(function(){
				if($this.find('.info_viewer').length != 0){
					if($view.find('img').length != 0){ //img
						var change_url=$(this).find('img.thamb').attr('data_url');
						$view.find('img').attr('src',change_url);
					
					}else{ //movie
						var basename=$(this).find('img.thamb').attr('data_url'),
								dirname=$view.find('iframe').attr('src').replace(/\\/g,'/').replace(/\/[^\/]*$/,''),
								change_url=dirname+'/'+basename+'?rel=0';
						$view.find('iframe').attr('src',change_url);
					}
				}
				
				$thumb.removeClass('active').find('.over').stop().animate({'opacity':0},400, 'easeInQuad');
				$(this).addClass('active').find('.over').stop().animate({'opacity':1},400, 'easeOutQuad');
			});
			$thumb.hover(
				function(){
					if($(this).hasClass('active')){
						return;
					}else{
						$(this).find('.over').stop().animate({'opacity':1},fade_time, 'easeOutQuad');
					}
				},
				function(){
					if($(this).hasClass('active')){
						return;
					}else{
						$(this).find('.over').stop().animate({'opacity':0},fade_time, 'easeInQuad');
					}
				}
			);
			$next.click(function(){
				count++;
				if(count>box_length-1){count=0;}
				this_page = count;
				thumb_slide();
				pager_indicate(count);
			});
			
			$prev.click(function(){
				count--;
				if(count<0){count=box_length-1;}
				this_page = count;
				thumb_slide();
				pager_indicate(count);
			});
			
			$pagination.click(function(){
				count=$(this).index();
				this_page = count;
				thumb_slide();
				pager_indicate($(this).index());
			});
			
			pager_indicate(0);
			
		});
	};
})(jQuery);


