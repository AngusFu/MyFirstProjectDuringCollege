<?php
OB_START();//开启缓冲区。。。很重要啊 。。。。
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <!--链接基本css、js-->  	
    <?php require_once("../php/cssjslink2.php");
	?>   
 
	<!--CSS FOR Header-->
	<style>
	#headerlogo{
		width:130px;
		position:absolute;
		left:8%
		}
	#newsback{
		width:48px;
		height:48px;
		position:absolute;
		left:100px;
		top:180px;
		z-index:7;
		background:url(../img/back.png) no-repeat;
		}
	#newsback:hover{
		background:url(../img/backhover.png);
		}
	#newsname{
		font-size:250%;
		font-family:微软雅黑;
		color:white;
		position:absolute;
		left:260px;
		top:40px;
		width:600px
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
		text-decoration:none;
		}		
	#headerreg{
		position:absolute;
		right:220px;
		top:40px;
		}
	#headerreg a{
		cursor:pointer;
		font-family:微软雅黑;
		font-size:20px;
		color:white;
		}
	</style>	  
	
</head>

<body onload="detectBrowser()">

	<?php
	session_start();
	include('../reg/conn.php');
	//如没有登陆
	if(!isset($_SESSION['username'])){
	?>
	<script>history.back(-1);</script>
	<?php
	}else{//登录
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
			我有
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
	this.css("bottom",20+ "px");  
	this.css("left", ( $(window).width() - this.width())/2 + "px");  
	return this;  
	} 
	})(jQuery) 
	$('#copy').copycenter();
	</script>
-->
<!--header end-->
		<form method="post" action="check2.php" enctype="multipart/form-data" autocomplete="on" id="postform">
			<div id="inputa">	
				<span id="num">1</span>
				<input type="text" name="book" id="book" placeholder="请输入书名"> 
				<textarea rows="6" type="text" name="description" id="description" placeholder="请输入相关说明"></textarea>
				<input type="button" id="bookpic" value="请选择相关图片">
				<input type="file" name="a_file" id="a_file" style="opacity:0">			
				<input type="text" name="contact" id="contact" placeholder="请提供联系方式">
			</div>
			
 			<div id="inputb">	
				<span id="num">2</span>
				<input type="text" name="book1" id="book" placeholder="请输入书名"> 
				<textarea rows="6" type="text" name="description1" id="description" placeholder="请输入相关说明"></textarea>
				<input type="button" id="bookpic" value="请选择相关图片">
				<input type="file" name="a_file1" id="a_file" style="opacity:0">			
				<input type="text" name="contact1" id="contact" placeholder="请提供联系方式">
			</div>
			
			<div id="inputc">	
				<span id="num">3</span>
				<input type="text" name="book2" id="book" placeholder="请输入书名"> 
				<textarea rows="6" type="text" name="description2" id="description" placeholder="请输入相关说明"></textarea>
				<input type="button" id="bookpic" value="请选择相关图片">
				<input type="file" name="a_file2" id="a_file" style="opacity:0">			
				<input type="text" name="contact2" id="contact" placeholder="请提供联系方式">
			</div>
				
			<div id="textsubmit">
				<input id="txtsub" type="submit" value="&nbsp;" name="submit" title="提交">
			</div>
			
		</form>
		<script>
		(function($){ 
		$.fn.newscenter = function(){ 
		this.css("position","absolute");  
		this.css("top", (($(window).height() -this.height())/2+40)+ "px");  
		this.css("left", ( $(window).width() - this.width())/2 + "px");  
		return this;  
		} 
		})(jQuery) 
		$('#postform').newscenter();
		</script>
		<style>
		#inputa{width:300px;height:450px;position:relative;float:left;margin:20px;background:#05b5da}
		#inputb{width:300px;height:450px;position:relative;float:left;margin:20px;background:#e2b83d}
		#inputc{width:300px;height:450px;position:relative;float:left;margin:20px;background:#4dd586}
		#textsubmit{position:relative;float:left;top:400px}
		#num{font:50px 微软雅黑;position:absolute;top:10px;left:10px;color:white}
		#book{width:200px;height:20px;position:absolute;top:40px;left:40px; }
		#description{width:200px;position:absolute;top:100px;left:40px;font:16px 微软雅黑}
		#bookpic{width:220px;height:40px;position:absolute;top:290px;left:40px;font:16px 微软雅黑;color:#999}
		#a_file{width:200px;height:20px;position:absolute;top:290px;left:40px; }
		#contact{width:200px;height:20px;position:absolute;top:350px;left:40px; }
		
		#book,#description,#bookpic,#a_file,#contact{
			padding:10px; 
			border:1px solid #fff; 
			/*-moz-border-radius:6px;
			-webkit-border-radius:6px;
			border-radius:6px;*/
		   }
		#book::-webkit-input-placeholder,
		#contact::-webkit-input-placeholder,
		#description::-webkit-input-placeholder{
		font-family:微软雅黑;
			color:#000; 
			font-size:16px;
			}
		#book::-moz-placeholder,
		#contact::-moz-placeholder,
		#description::-moz-placeholder{
			font-family:微软雅黑;
			color:#000;
			font-size:16px;
			text-align:center;
			}
		#txtsub{
			cursor:pointer;
			float:left;
			width:48px;
			height:48px;
			cursor:pointer;
			background:url(../img/go.png)
			}
		#txtsub:hover{
			background:url(../img/go3.png)
			}		
		</style>
 
<!--背景工具-->  	
    <?php require_once("../php/bgtools2.php");
	?>   
<!--右侧菜单-->  	
    <?php require_once("../php/menu2.php");
	?>   
<!--隐藏的登录注册页面-->  	
	<?php require_once("../php/reg&log2.php");
	?>   
<!--隐藏的分享-->  	
	<?php require_once("../php/share2.php");
	?>  

</body>

</html>

