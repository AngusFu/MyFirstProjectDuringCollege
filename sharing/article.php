<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>“双”骄</title>
	<link rel="shortcut icon" href="../img/favicon.png"/>
	<script type="text/javascript" src="../js/jquery-1.6.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/fj-css.css">	
	<script type="text/javascript" src="../js/fj-js2.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style3.css"/><!-------记得是style3------->
	<link rel="stylesheet" type="text/css" href="css/article.css"/>
</head>

<body onload="detectBrowser()">


<!--顶部登陆&&主体部分-->  	
    <?php require_once("php/article.php");
	?>   
	
<!--右侧浮动菜单-->  	
    <?php require_once("../php/menu2.php");
	?>  
	
<!--背景工具-->  
<div id="beijingse" style="background:url(../img/lakeblue.png)" onclick="clickToHide()"><!--为调用背景色备用-->
</div>
<!--背景工具结束-->  

<!--隐藏的登录注册页面-->  	
	<?php require_once("../php/reg&log2.php");
	?>   
	
<!--隐藏的分享-->  	
	<?php require_once("../php/share2.php");
	?>   

</body>

</html>

