
	<?php
	session_start();
	include('../reg/conn.php');
	//游客身份显示
	if(!isset($_SESSION['username'])){
	echo "<script>history.back(-1);</script>";
	}else{
	?>

<!--header-->	
	<!---logo-->
	<div>
		<a href='../index.php'>
			<img src='../img/logo.png' id='headerlogo'>
		</a> 
	</div>   
	<!--title-->
	<div style="position:relative;left:30px;bottom:20px">
		<a id='newsname'>
			我的需求
		</a>
	</div> 
	
	<!--back-->
	<a href="index.php">
		<div id="newsback" title="返回">
		</div>
	</a>
 
	<?php
		$userid = $_SESSION['userid'];
		$username = $_SESSION['username'];
		$sql2 = "select pic from user where uid= '$userid'";
		$result2 = mysql_query($sql2);
		$row = mysql_fetch_array($result2);
		$file = $row['pic'];//头像
	?>		
		<!--UG-->
		<a style='cursor:pointer;' onmousedown='userinfoMdown()' onclick='floatuserinfomenu()'>      
			<!--onclick——弹出内容。至于关闭则放在bgtools.php中，函数为clickToHide（见fj-js2.js）-->
			<div>
				<div id='userinfo'> 
					<?php
					echo $_SESSION['username'];
					?>
				</div>
				
				<?php
				if($file!=''){//如果图片记录不为空
				?>
					<img id='userpic' src='../img/mypic/<?php echo "$file";?> '/>
				<?php	   
				}else{//如果图片记录为空
				?>
					<img id='defaultimg' src='../img/defaultpic.png'/>
				<?php } ?>
				
			</div>
        </a> 	
		
		
		<!--hover effect-->
		<div id='userinfobg'></div>
			  
		<!--弹出菜单-->
		<div id='userinfomenu'>
			<div id="headermy">
			        <a href='../reg/my.php'>个人中心</a>
			</div>
			<div id="headerlogout">
			        <a href='../reg/log.php?action=logout'>退出登录</a>
			</div>
		</div>
	<?php
	}
	?>

	<div id="copy">
		<span id="copyright" style="font:20px 微软雅黑;">
		“双”骄小组&nbsp;&nbsp;2013 WHU&copy;版权所有
		</span>
	</div>
 
	<script>
	(function($){ 
	$.fn.copycenter = function(){ 
	this.css("position","absolute");  
	this.css("bottom",20+ "px");  
	this.css("left", ( $(window).width() - this.width())/2 + "px");  
	return this;  
	} 
	})(jQuery) 
	$('#copy').copycenter();
	</script>

<!--header end-->

<!--main-->

		<div class="baraja-demo" onclick="clickToHide()">
			<ul id="baraja-el" class="baraja-container">
			<?php
			$sql="select * from exchange where username='$_SESSION[username]' and type='1' order by id desc"; 
			$result=mysql_query($sql);
			$num=mysql_num_rows($result);
			$i=1;
			if($num!=0){
			while($row = mysql_fetch_array($result)){
			$content=mb_substr($row['content'],0,50,'utf-8');//题目摘要
			?>
			<li id="libg<?php echo $i;?>">
			
				<?php
				if($row['file']!=""){
				?>
				<img src="img/book/<?php echo $row['file'];?>"/>
				<?php
				}else{
				?>
				<img src="img/book/df.jpg">			
				<?php
				}
				?>

				<a><?php echo $row['title'];?></a>
				<div id="shuoming">说&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;明</div>
				<div id="bookdesc"><?php echo $content;?></div>
				
				<div id="shuoming">联系方式</div>
				<div id="bookdesc"><?php echo $row['contact'];?></div>
			</li>			
			<?php			
				if($i==5){
				$i=0;//5个一循环
				}
			$i++;
				}
			}else{
			?>
				<li id="libg<?php echo $i;?>">
					<img src="img/book/df.jpg"/>		
					<a></a>
					<div id="bookdesc2">
						您还没有贴过书哦<p>
						<a href="supply.php" target="_blank">
							去贴出空闲课本
						</a>
					</div>
				</li>
			<?php
				} 
			?>
 
			</ul>
		</div>
		<nav class="actions">
			<span id="nav-prev">&lt;</span>
			<span id="nav-next">&gt;</span>
		</nav>
		
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script type="text/javascript" src="js/jquery.baraja.js"></script>
        <script type="text/javascript">	
			$(function() {
				var $el = $( '#baraja-el' ),
					baraja = $el.baraja();
				// navigation
				$( '#nav-prev' ).on( 'click', function( event ) {
					baraja.previous();
				} );

				$( '#nav-next' ).on( 'click', function( event ) {
					baraja.next();
				} );

				// playing with different origins and ranges	
				$( '#nav-fan5' ).on( 'click', function( event ) {

					baraja.fan( {
						speed : 500,
						easing : 'ease-out',
						range : 100,
						direction : 'right',
						origin : { x : 50, y : 150 },
						center : true
					} );
				
				} );
 
				// close the baraja
				$( '#close' ).on( 'click', function( event ) {
					baraja.close();
				} );
			});
		</script>
		 <script>
		(function($){ 
		$.fn.newscenter = function(){ 
		this.css("position","absolute");  
		this.css("top", (($(window).height())/2 -(this.height())/2) + "px");  
		this.css("left", ( $(window).width() - this.width()) / 2 + "px");  
		return this;  
		} 
		})(jQuery) 
		$('#baraja-demo').newscenter();
		</script>