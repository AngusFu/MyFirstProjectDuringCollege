<?php
OB_START();//开启缓冲区。。。很重要啊 。。。。
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <!--链接基本css、js-->  	
    <?php require_once("../php/cssjslink2.php");
	?>  
	<link rel="stylesheet" type="text/css" href="css/baraja.css" />
	<link rel="stylesheet" type="text/css" href="css/demo.css" />
	<link rel="stylesheet" type="text/css" href="css/custom.css" />
	<script type="text/javascript" src="js/modernizr.custom.79639.js"></script>
 
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
		left:240px;
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
		right:50px;
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

<!--main-->  	
    <?php require_once("php/my.php");
	?>   
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



