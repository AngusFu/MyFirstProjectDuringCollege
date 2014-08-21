<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 
	<script>
		function detectBrowser(){
		var browser=navigator.appName
		if ( browser=="Microsoft Internet Explorer")
		  {alert("提示：建议您使用Firefox或Chrome浏览器浏览本网页！")}
		}
	</script>
    <style>
		@keyframes spin {
			to { transform: rotate(1turn); }
		}
		
		.progress {
			position: relative;
			display: inline-block;
			width: 5em;
			height: 5em;
			margin: 0 .5em;
			font-size: 12px;
			overflow: hidden;
			animation: spin 1s infinite steps(8);
		}
		 
		.large.progress {
			font-size: 32px;
		}

		.progress:before,
		.progress:after,
		.progress > div:before,
		.progress > div:after {
			content: '';
			position: absolute;
			top: 0;
			left: 2.25em; /* (container width - part width)/2  */
			width: .5em;
			height: 1.5em;
			border-radius: .2em;
			background: #05b5da;
			box-shadow: 0 3.5em #eee; /* container height - part height */
			transform-origin: 50% 2.5em; /* container height / 2 */
		}

		.progress:before {
			background: #151515;
		}

		.progress:after {
			transform: rotate(-45deg);
			background: #202020;
		}

		.progress > div:before {
			transform: rotate(-90deg);
			background: #05b5da;
		}
		.progress > div:after {
			transform: rotate(-135deg);
			background: #4dd586;
		}
		#loading{
			position:absolute;
			left:40%;
			top:340px;
			z-index:5
		}
		body{background-image:url(../img/bg.jpg)}
	</style>
	
</head>

<body onload="detectBrowser()">
<!--session start-->
	<?php
	 session_start();
    ?>
<!--登录验证------> 
	<?php
	//注销登录
 	if(@$_GET['action'] == "logout"){
		unset($_SESSION['userid']);
		unset($_SESSION['username']);
	?>
		<div class='progress large' id='loading'>
		</div>
		<div style='position:absolute;left:36%;top:45%;z-index:7;'>
			<a style='color:white;font-size:30px;font-family:微软雅黑'>
				已成功退出！正在返回。。。
			</a>
		</div>
	<?php
		echo "<script>location.href='../index.php'</script>";
		exit;
	}
	?>
	
	<?php
	//非法登录
	if(!isset($_POST['submit'])){
	?>
		<div class='progress large' id='loading'>
		</div> 
		<div style='position:absolute;left:32%;top:45%;z-index:7;color:white;font-size:30px;font-family:微软雅黑'> 
			o(╯□╰)o 你这非法登录呀孩纸~~~ <p>所以返回原来页面吧还是。。。
		</div> 
	<?php
		echo "<script>history.go(-1);</script>";
		exit;
	}
	?>
	
	<?php
	//验证
	$username = htmlspecialchars($_POST['username']);
	$password = MD5($_POST['password']);
	//包含数据库连接文件
	include('conn.php');
	//检测用户名及密码是否正确
	$check_query = mysql_query("select uid from user where username='$username' and password='$password' 
	limit 1");
	if($result = mysql_fetch_array($check_query)){
	    //登录成功	
		$_SESSION['username'] = $username;
		$_SESSION['userid'] = $result['uid'];
	?>
	
		<div class='progress large' id='loading'>
		</div>
		<div style='position:absolute;left:25%;top:45%;z-index:7;color:white;font-size:30px;font-family:微软雅黑'>
		<center>
		<?php
		echo $username
		?>
		欢迎你！
		</center>
		<p>		 
		O(∩_∩)O哈哈~登录成功~~~正在返回原来页面~~~</div>
		<?php
		echo "<script>history.go(-1);</script>";
		exit;
		?>
	<?php	
	} else {
	?>
	    <div class='progress large' id='loading'>
		</div>
		<div style='position:absolute;left:28%;top:45%;z-index:7;color:white;font-size:30px;font-family:微软雅黑'>
		好吧~~我们很遗憾的告诉，登录失败了~~~
		</div>
	<?php
		echo "<script>history.go(-1);</script>";
		exit;
		}
	?>
</body>
</html>

