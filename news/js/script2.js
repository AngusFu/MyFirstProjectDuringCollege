 
var numberOfScreens =1; // set number of screens 

$(document).ready(function(){
	var num = numberOfScreens;
	var windowWidth = $(window).width();
	var windowHeight = $(window).height();
	var left1 = Math.floor((windowWidth - 975)/2)+40;
	var left2 = left1 - 1200;
	var wrapperTop = Math.floor((windowHeight - 480)/2)-100;
 
	$('#place').css({'left':left1,'top':wrapperTop});
	var wrapperPos = 1;
	$('#wrapper1 input:text').focus();
	var animDone = true;
	function anim1to2(){
		$('#wrapper1 input:text').focusout();
		animDone = false;
		$('#place').animate({
			left: left2,
		},1000,'circEaseOut',function() {
			$('#wrapper2 input:text').focus();
			animDone = true;
			wrapperPos = 2;
		});
		$('#button1to2').show();			
		$('#button2to1').show();
		 
	};
	
	 

	 

//键盘动作
	$(document).bind('keydown',function(event){ 
		if( event.keyCode == '38' || event.keyCode == '40'|| event.keyCode == '35'|| event.keyCode == '34'|| event.keyCode == '32'){
			event.preventDefault();
		}	//禁止上下键
		if(event.keyCode == '39' || event.keyCode == '37'){
			event.preventDefault();
		}
		if(event.which=='39' && animDone){
			
			if(wrapperPos==1 && num>1){
				anim1to2();
			};
			if(wrapperPos==2 && num>2){
				anim2to3();
			};
		};
		if(event.which=='37' && animDone){
			
			if(wrapperPos==3){
				anim3to2();
			};
			if(wrapperPos==2){
				anim2to1();
			};			
		};
	}); 

//鼠标滑动动作
	$(document).mousewheel(function(event, delta) {
		if (delta > 0 && animDone){
			if(wrapperPos==3){
				anim3to2();
			};
			if(wrapperPos==2){
				anim2to1();
			};
		}
		else if (delta < 0 && animDone){
			if(wrapperPos==1 && num>1){
				anim1to2();
			};
			if(wrapperPos==2 && num>2){
				anim2to3();
			};
		};		
		event.preventDefault();		
	});


	
});

