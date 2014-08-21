
	
	<!---site name-->
	<div>
		<a id='sitename'>
		<?php
		if(@$_REQUEST['type']=="2"){
		echo "众里寻书";
		}else if(@$_REQUEST['type']=="1"){
		echo "他人需求";
		}else{
		echo "<script>location.href='index.php'</script>";		
		}
		?>
		</a>
	</div>
	
	<!---logo-->
	<div>
		<a href='../index.php'>
			<img src='../img/logo.png' id='headerlogo'>
		</a> 
	</div>   
	
	<!--back-->
	<a href="index.php">
		<div id="newsback" title="返回">
		</div>
	</a>	
	
	<?php
	session_start();
	//包含数据库连接文件
	include('../reg/conn.php');
//如果登陆
	if(isset($_SESSION['username'])){
		$userid = $_SESSION['userid'];
		$username = $_SESSION['username'];
		$user_query = mysql_query("select * from user where uid= '$userid' limit 1");
		$row = mysql_fetch_array($user_query);
		$file=$row['pic'];//头像
	?>
		<!---myinfo-->
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
					<img id='userpic' <?php echo "src='../img/mypic/$file'";?>>
				<?php	   
				}else{//如果图片记录为空
				?>
					<img id='defaultimg' <?php echo "src='../img/defaultpic.png'";?>>
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
	}else{//如果没登陆
	?>
		<div id="headerreg">
			 <a title='注册' onclick='RegFloat()'>
			 注册
			 </a>
			 &nbsp;&nbsp;&nbsp;
			 <a title='登录' onclick='LogFloat()'>
			 登录
			 </a>
		</div>
	<?php
	}
	?>
<!--
	<div id="copy">
		<span id="copyright" style="font:20px 微软雅黑;">
		“双”骄小组&nbsp;&nbsp;2013 WHU&copy;版权所有
		</span>
	</div>
 
	<script>
	(function($){ 
	$.fn.copycenter = function(){ 
	this.css("position","absolute");  
	this.css("bottom",10+ "px");  
	this.css("left", ( $(window).width() - this.width())/2 + "px");  
	return this;  
	} 
	})(jQuery) 
	$('#copy').copycenter();
	</script>	
-->
	<style>
		#headerlogo{
			width:130px;
			position:absolute;
			left:8%;
			z-index:4;
			top:4%;
			}
		#sitename{
			font-size:250%;
			font-family:微软雅黑;
			color:white;
			position:absolute;
			left:20%;
			top:7%;
			z-index:4;
			}
		#newsback{
			width:48px;
			height:48px;
			position:absolute;
			left:100px;
			top:180px;
			z-index:8;
			background:url(../img/back.png) no-repeat;
			}
		#newsback:hover{
			background:url(../img/backhover.png);
			}
		#userinfo{ 
			position:absolute;
			right:190px;
			top:60px;
			z-index:4;
			font-family:黑体;
			font-size:30px;
			text-decoration:none;
			color:#000;
			}
		#userpic,#defaultimg{
			position:absolute;
			right:100px;
			top:50px;
			z-index:4;
			width:60px;
			height:60px;
			border:1px solid white
			}
		#userinfobg{
			position:absolute;
			right:90px;
			top:40px;
			z-index:3;
			width:200px;
			height:80px;
			background:url(../img/lakeblue.png);
			display:none;
			}	
		#userinfomenu{
			background:white;
			width:194px;
			height:120px;
			font-size:16px;
			position:absolute;
			right:200px;
			top:120px;
			display:none;
			}	
		#headerlogout{
			height:40px;
			position:absolute;
			left:50px;
			bottom:15px;
			}
		#headermy{
			height:40px;
			position:absolute;
			left:50px;
			top:25px;
			}
		#headerlogout a ,#headermy a{
			font-family:微软雅黑;
			}
		#headerreg{
			position:absolute;
			right:16%;
			top:6%;
			z-index:5;
			}
		#headerreg a{
			cursor:pointer;
			font-family:微软雅黑;
			font-size:20px;
			color:#000
			}
	</style>