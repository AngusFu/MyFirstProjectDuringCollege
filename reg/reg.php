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
	</style>
	
</head>

<body onload="detectBrowser()" style="background-image:url(../img/bg.jpg)">
<!--session start-->
	<?php
	 session_start();
    ?>
	<?php
	if(!isset($_POST['submit'])){
	?>
	    <div class='progress large' id='loading'></div>
	    <div style='position:absolute;left:32%;top:45%;z-index:7;color:white;font-size:30px;font-family:微软雅黑'>
		 o(╯□╰)o 你这非法登录呀孩纸~~~ <p>所以返回原来页面吧还是。。。
		</div>
	
	<?php
		echo "<script>history.go(-1);</script>";
		exit;
		}
	?>
	
	<?php
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	?>
	
	<?php
	//用户名判断
	if(!preg_match('/^[\w\x80-\xff]{3,15}$/', $username)){
	?>
			<div class='progress large' id='loading'></div>";
			<div style='position:absolute;left:33%;top:35%;z-index:7;color:white;font-size:30px;font-family:微软雅黑'>
				<center>亲，你的用户名不符合规定哦!</center>
				<p>
				<center>请返回后重新操作吧！</center>
			</div>
	<?php
		echo "<script>history.go(-1);</script>";
		exit;
		}
	?>
	
	<?php
	// 密码长度判断
	if(strlen($password) < 6){
	?>
			<div class='progress large' id='loading'></div>
			<div style='position:absolute;left:30%;top:35%;z-index:7;color:white;font-size:30px;font-family:微软雅黑'>
				<center>亲，密码短了容易被盗号呀！</center><p>
				<center>您啊还是返回再来一次吧！Good Luck！</center>
			</div>
	<?php
		echo "<script>history.go(-1);</script>";
		exit;
		}
	?>
	
	<?php
	//邮箱格式判断
	if(!preg_match("/\w+([-+.]w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/", $email)){
	?>
			<div class='progress large' id='loading'></div>
			<div style='position:absolute;left:28%;top:35%;z-index:7;color:white;font-size:30px;font-family:微软雅黑'>
				<center>亲，你的邮箱格式是输错了吧？</center><p>
				<center>哈哈仔细想想再返回重新操作吧！</center>
				<center>Good Luck！</center>
			</div>
	<?php
		echo "<script>history.go(-1);</script>";
		exit;
		}
	?>
	

	<?php
	//包含数据库连接文件
	include('conn.php');
	//检测用户名是否已经存在
	$check_query = mysql_query("select uid from user where username='$username' limit 1");
	if(mysql_fetch_array($check_query)){
	?>
			<div class='progress large' id='loading'></div>	
			<div style='position:absolute;left:26%;top:35%;z-index:7;color:white;font-size:30px;font-family:微软雅黑'>	
				<center>亲，你的名字已经有人使用了哦！</center><p>
				<center>返回去换个与众不同的名字吧！Good Luck！</center>
			</div>
	<?php
		echo "<script>history.go(-1);</script>";
		exit;
		}
	?>
	<?php
	//写入数据
	$password = MD5($password);
	$regdate = time();
	$sql = "INSERT INTO user(username,password,email,regdate)VALUES('$username','$password','$email',$regdate)";
	if(mysql_query($sql,$conn)){
	?>
			<div class='progress large' id='loading'></div>
			<div style='position:absolute;left:32%;top:35%;z-index:7;color:white;font-size:30px;font-family:微软雅黑'>
				<center>哈哈，祝贺你注册成功了！</center><p>
				<center>等待返回后登录继续浏览吧！</center>
			</div>
	<?php
		echo "<script>history.go(-1);</script>";
		exit;
	?>
	
	<?php
	} else {
	?>
			<div class='progress large' id='loading'></div>
			<div style='position:absolute;left:30%;top:45%;z-index:7;color:white;font-size:30px;font-family:微软雅黑'>	
				<center>Oh no!数据添加失败。。。返回原来页面再试试吧。。。</center>
			</div>
	<?php
		echo "<script>history.go(-1);</script>";
		exit;
		}
	?>
</body>
</html>