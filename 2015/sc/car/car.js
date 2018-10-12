
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
			stop();
		}
    }


