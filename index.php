<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <!--链接基本css、js-->  	
    <?php require_once("php/cssjslink.php");
	?>   
</head>
<body onload="detectBrowser()">

<!--顶部header&登陆-->  	
	<?php require_once("php/header.php");
	?>   
<!--主要部分-->  	  
	<?php require_once("php/home_body.php");
	?>   	
<!--右侧浮动菜单-->  	
	<?php require_once("php/menu.php");
	?>   
<!--隐藏的登录注册页面-->  	
	<?php require_once("php/reg&log.php");
	?>   
<!--隐藏的分享页面-->  	
	<?php require_once("php/share.php");
	?>   
	
	
</body>
</html>
