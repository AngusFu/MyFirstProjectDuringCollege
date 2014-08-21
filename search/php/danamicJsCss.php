

<!--为方便用php动态生成，故将部分js和css置于下面-->
	<script>	 
	$(document).ready(function(){
		var num = <?php echo $x;?>;
		var windowWidth = $(window).width();
		var windowHeight = $(window).height();
		var left1 = Math.floor((windowWidth - 975)/2)+20;
		<?php
		for($i=2;$i<= $x;$i++){
		?>
		var left<?php echo $i;?> = left1 - <?php echo 1300*($i-1)-100?>;
		<?php
		}
		?>

		var wrapperTop = Math.floor((windowHeight - 480)/2)-150;
		
		$('#place').css({'left':left1,'top':wrapperTop});
		var wrapperPos = 1;
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
			$('#button1to2').hide();			
			$('#button2to1').show();
			if(num>2){
				$('#button2to3').show();
				$('#button3to2').hide();
			};
		};
		
		function anim2to1(){
			$('#wrapper2 input:text').focusout();
			animDone = false;
			$('#place').animate({
				left: left1
			},1000,'circEaseOut',function() {
				$('#wrapper1 input:text').focus();
				animDone = true;
				wrapperPos = 1;
			});
			<?php 
			if($x!=1){
			?>
			$('#button1to2').show();
			<?php
			}else{
			?>
			$('#button1to2').hide();
			<?php
			}
			?>
			$('#button2to1').hide();
			if(num>2){
				$('#button2to3').hide();
				$('#button3to2').hide();
			};		
		};
		
	<?php
	for($i=2;$i<=$x;$i++){
	?>
		function anim<?php echo $i;?>to<?php echo $i+1;?>(){
			$('#wrapper<?php echo $i;?> input:text').focusout();
			animDone = false;
			$('#place').animate({
				left: left<?php echo $i+1;?>,
			},1000,'circEaseOut',function() {
				$('#wrapper<?php echo $i+1;?> input:text').focus();
				animDone = true;
				wrapperPos = <?php echo $i+1;?>;
			});
			<?php
			for($j=1;$j<=$i+2;$j++){
			?>
				<?php
				if($j==$i){
				?>
					$('#button<?php echo $j+1;?>to<?php echo $j;?>').show();
					<?php
					if($x<$i+2){
					?>
					$('#button<?php echo $j+1;?>to<?php echo $j+2;?>').hide();
					<?php
					}else{
					?>
					$('#button<?php echo $j+1;?>to<?php echo $j+2;?>').show();
					<?php
					}
					?>
				<?php
				}else{
				?>
					$('#button<?php echo $j+1;?>to<?php echo $j;?>').hide();
					$('#button<?php echo $j+1;?>to<?php echo $j+2;?>').hide();
				<?php
				}
				?>
			<?php
			}
			?>
		};	
		
		function anim<?php echo $i+1;?>to<?php echo $i;?>(){
			$('#wrapper<?php echo $i+1;?> input:text').focusout();
			animDone = false;
			$('#place').animate({
				left: left<?php echo $i;?>,
			},1000,'circEaseOut',function() {
				$('#wrapper<?php echo $i;?> input:text').focus();
				animDone = true;
				wrapperPos = <?php echo $i;?>;
			});
			<?php
			for($j=1;$j<=$i+2;$j++){
			?>
				<?php
				if($j==$i){
				?>
				$('#button<?php echo $j;?>to<?php echo $j-1;?>').show();
				$('#button<?php echo $j;?>to<?php echo $j+1;?>').show();
				<?php
				}else{
				?>
				$('#button<?php echo $j;?>to<?php echo $j-1;?>').hide();
				$('#button<?php echo $j;?>to<?php echo $j+1;?>').hide();
				<?php
				}
				?>
			<?php
			} 
			?>
		};
	<?php
	}
	?>

		
	/*按钮操作*/
			
	<?php
	for($i=1;$i<$x;$i++){
	?>
		if(num><?php echo $i;?>){
			$('#button<?php echo $i;?>to<?php echo $i+1;?>').click(function(){
				anim<?php echo $i;?>to<?php echo $i+1;?>();
			});
			
			$('#button<?php echo $i+1;?>to<?php echo $i;?>').click(function(){
				anim<?php echo $i+1;?>to<?php echo $i;?>();
			});
	<?php
	}
	?>
	<?php
	for($i=1;$i<$x;$i++){
	?>
		};
	<?php
	}
	?>
	 
	/*键盘左右键操作*/	
		$(document).bind('keydown',function(event){ 
			if( event.keyCode == '38' || event.keyCode == '40'|| event.keyCode == '35'|| event.keyCode == '34'|| event.keyCode == '32'){
				event.preventDefault();
			}	//禁止上下键
			if(event.keyCode == '39' || event.keyCode == '37'){
				event.preventDefault();
			}
			if(event.which=='39' && animDone){
				<?php
				for($j=1;$j<$x;$j++){
				?>
				if(wrapperPos==<?php echo $j;?> && num>1){
					anim<?php echo $j;?>to<?php echo $j+1;?>();
				};	
				<?php
				}
				?>
			};
			if(event.which=='37' && animDone){
				<?php
				for($i=$x;$i>=2;$i--){
				?>
				if(wrapperPos==<?php echo $i;?>){
					anim<?php echo $i;?>to<?php echo $i-1;?>();
				};	
				<?php
				}
				?>		
			};
		}); 

	/*鼠标滚动键操作*/	
		$(document).mousewheel(function(event, delta) {
			if (delta > 0 && animDone){
				<?php
				for($i=$x;$i>=2;$i--){
				?>
				if(wrapperPos==<?php echo $i;?>){
					anim<?php echo $i;?>to<?php echo $i-1;?>();
				};	
				<?php
				}
				?>
			}
			else if (delta < 0 && animDone){
				<?php
				for($j=1;$j<$x;$j++){
				?>
				if(wrapperPos==<?php echo $j;?> && num>1){
					anim<?php echo $j;?>to<?php echo $j+1;?>();
				};	
				<?php
				}
				?>
			};		
			event.preventDefault();		
			
		});

		
	});//script end 
	</script>
	<style>
	* {   
	margin: 0;
	padding: 0;
	border: 0;
	font-family: sans-serif;
	font-size: 1em;
	font-weight: normal;
	font-style: normal;
	text-decoration: none;
	}

	body{
	overflow: hidden;
	}

	#bg{
	position:absolute;
	z-index:0;
	}

	#place{
	position:absolute;
	z-index:2;
	}

	#layout-fj{
	width:850px;
	position:absolute;
	top:0px;
	left:0px;
	}
	/*上面变动影响首页块状结构*/
	#place{
	position: relative;
	width:6000px;
	height:560px;
	margin:0px;
	}
	</style>	
	
	<style>
	<?php
	for($i=1;$i<=$x;$i++){
	?>
	#wrapper<?php echo $i;?>{
		width:975px;
		height:480px;
		position: absolute;
		top:30px;
		}
 
	#wrapper<?php echo $i;?>{
		left:<?php if($i<=2){echo 1200*($i-1);}else{echo 1300*($i-1)-100;}?>px;
		}
	#wrapper<?php echo $i;?> div{
		margin:5px;
		text-align:center;
		}

	#button<?php echo $i;?>to<?php echo $i+1;?>,
	#button<?php echo $i+1;?>to<?php echo $i;?>{
		position:absolute;
		width:30px;
		height:30px;
		top:50%;
		}

	#button<?php echo $i;?>to<?php echo $i+1;?>{
		background: url('img/toright.png') center center;
		left:<?php if($i<=2){echo 1200*($i-1)+990;}else{echo 1300*($i-1)+890;}?>px;
		}

	#button<?php echo $i+1;?>to<?php echo $i;?>{
		background: url('img/toleft.png') center center;
		display:none;
		left:<?php echo 1140+1300*($i-1);?>px;
		}

	#button<?php echo $i;?>to<?php echo $i+1;?>:hover{
		background: url('img/torighthover.png') center center;
		cursor: pointer;
		}
	 
	#button<?php echo $i+1;?>to<?php echo $i;?>:hover{
		background: url('img/tolefthover.png') center center;
		cursor: pointer;
		}
	<?php
	}
	?>
	</style>
	
	<style>
	<?php 
	for($i=1;$i<=$total;$i++){
	?>
	#a<?php echo $i;?>{
		opacity:0.9;
		width:150px;
		height:190px;
		cursor:pointer;
		position:relative;left:100px;top:120px;margin:10px;float:left;
		}
	<?php
	}
	?>

	<?php
	for($i=1;$i<=$total;$i++){
	?>
	#touming<?php echo $i;?>{
		width:150px;
		height:40px;
		background:#e2b83d;
		opacity:0.5;
		position:relative;right:5px;bottom:45px;
		}
	#a<?php echo $i;?>{border:10px solid #e2b83d;}
	<?php
	}
	?>

	#imga{
	width:140px;
	height:180px;
	border:5px solid #fff;
	}	
 
	#txt{
		width:140px;
		text-align:center;
		color:#000;
		font:14px 微软雅黑;
		position:relative;left:0px;top:10px; 
		}
	#txt2{
		width:140px;
		text-align:center;
		color:#000;
		font:14px 微软雅黑;
		}
	  
	#contact{
		position:absolute;
		right:0px;
		top:160px;
		font:13px 微软雅黑;
		color:white;
		cursor:pointer;
		}

	</style>

	
 