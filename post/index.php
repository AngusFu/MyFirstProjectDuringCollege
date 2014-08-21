<?php
OB_START();//开启缓冲区。。。很重要啊 。。。。
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <!--链接基本css、js-->  	
    <?php require_once("../php/cssjslink2.php");
	?>   
	<script type="text/javascript" src="xheditor/xheditor.js">
	</script>
	
	<style>
	#textarea{position:absolute;top:130px;right:220px;width:550px;height:500px}
	#textsubmit{position:absolute;bottom:150px;right:120px}
	
	#selecttype{position:absolute;top:270px;left:220px;background:#4dd586;height:120px; width:300px;}
	#selecttype,#selecttype a{font-family:微软雅黑;font-size:larg;}
	
	#scltype{position:absolute;top:430px;left:220px;background:#4dd586;height:140px; width:300px;}
	#scltype,#scltype a{font-family:微软雅黑;font-size:large}
	
	#postuploadbg{position:absolute;top:190px;left:220px;background:#4dd586;height:60px; width:320px;}
	#postupload{position:absolute;top:200px;left:220px;background:#4dd586;height:40px; width:300px;}

	#title{position:absolute;top:130px;left:220px;height:20px; width:300px;}
	#title,#selecttype,#scltype,#postupload,#postuploadbg{
		padding:10px; 
		border:1px solid #ccc; 
		-moz-border-radius:3px;
		-webkit-border-radius:3px;
		border-radius:3px;
	   }
    #title::-webkit-input-placeholder,{
		font-family:微软雅黑;
		color:#000; 
		font-size:small;
		}
	#title::-moz-placeholder {
		font-family:微软雅黑;
		color:#000;
		font-size:small;
		text-align:center;
		}
	#txtsub{
	    cursor:pointer;
		position:absolute;
		right:-50%;
		top:32%;
		width:48px;
		height:48px;
		cursor:pointer;
		background:url(../img/go.png)
		}
	#txtsub:hover{
		background:url(../img/go2.png)
		}
	</style>
	  
</head>

<body onload="detectBrowser()">
	
<!------------------------------->	
	<form method="post" action="article_check.php" enctype="multipart/form-data" autocomplete="on">
	    <input type="text" name="title" id="title" placeholder="请输入标题" required="required">
		
		<input type="button" id="postuploadbg" value="请选择要上传的图片">
		<input type="file" name="a_file" id="postupload" style="opacity:0">
		<div id="selecttype">
		请选择发布类型：<p>
		<input type="radio" id="type" name="type" value="1"><a>新闻</a><p>
		<input type="radio" id="type" name="type" value="2"><a>分享</a><p>
		<input type="radio" id="type" name="type" value="3"><a>交换</a><p>
		</div>
		
		<div id="scltype">
		请选择内容相关学校：<p>
		<input type="radio" id="type" name="scltype" value="1"><a>华农</a> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  
		<input type="radio" id="type" name="scltype" value="2"><a>华科</a><p>
		<input type="radio" id="type" name="scltype" value="3"><a>武大</a> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  
		<input type="radio" id="type" name="scltype" value="4"><a>华师</a><p>
		<input type="radio" id="type" name="scltype" value="5"><a>理工大</a> &nbsp; &nbsp; &nbsp; &nbsp; 
		<input type="radio" id="type" name="scltype" value="6"><a>地大</a><p>
		<input type="radio" id="type" name="scltype" value="7"><a>财大</a><p>
		</div>

		<div id="textarea" name="content">
			<textarea class="xheditor {tools:'full',skin:'o2007blue',width:'400',height:'400',hoverExecDelay:100,layerShadow:3}" name="content">
			</textarea>
		</div>	
		<div id="textsubmit">
		    <input id="txtsub" type="submit" value="&nbsp;" name="submit">
		</div>
	</form>
<!------------------------------->	
	
<!--顶部登陆-->  	
    <?php require_once("../php/header2.php");
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

