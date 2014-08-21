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
		decoration:none;
		color:white;
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
	?>
	
	<?php
	//发表类型判断
	if(@$_REQUEST['post']!=""){//@很重要
	$post=$_REQUEST['post'];
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
			<?php
			if($post=="1"){
				echo "分享我的经验";
				}
			if($post=="2"){
				echo "分享我的资源";
				}
			if($post=="3"){
				echo "分享双学位趣事";
				}
			?>
		</a>
	</div> 
	
	<!--back-->
	<a href="index.php">
		<div id="newsback" title="返回分享区主页">
		</div>
	</a>
 
	<?php
	//如果登陆
	if(isset($_SESSION['username'])){
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
	}else{//游客身份显示
	?>				
	<script>history.back(-1);</script>
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


<!--post1-->
		<?php
		if($post=="1"){
		?>
		<form method="post" action="post_check.php?action=1" enctype="multipart/form-data" autocomplete="on">

			<div id="textarea" name="content">
				<textarea class="xheditor {tools:'full',skin:'o2007blue',width:'600',height:'400',hoverExecDelay:100,layerShadow:3}" name="content">
				</textarea>
			</div>	
			<div id="leftinput">		
				<input type="text" name="title" id="title" placeholder="请输入标题" required="required">
				<input type="button" id="postuploadbg" value="请选择要上传的图片">
				<input type="file" name="a_file" id="postupload" style="opacity:0">
				<div id="notice">请在右侧编辑您要发表的经验</div>
			</div>
			<div id="textsubmit">
				<input id="txtsub" type="submit" value="&nbsp;" name="submit" title="提交">
			</div>
			
		</form>
		<style>
		#textarea{position:absolute;top:130px;right:220px;width:550px;height:500px}
		#textsubmit{position:absolute;bottom:150px;right:120px}
		
		#leftinput{width:350px;height:450px;background:#6FB4E7;position:absolute;left:220px;top:130px}
		#postuploadbg{position:absolute;top:160px;left:15px;background:#fff;height:60px; width:320px;}
		#postupload{position:absolute;top:160px;left:15px;background:#05b5da;height:40px; width:300px;}
		
		#notice{position:absolute;left:75px;top:300px;width:200px;text-align:center;font:20px 微软雅黑}
		#title{position:absolute;top:40px;left:15px;height:20px; width:300px;}
		#title,#postupload,#postuploadbg{
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
		<?php
		}
		?>
		
<!--post2-->		
		<?php
		if($post=="2"){
		?>
		<form method="post" action="post_check.php?action=2" enctype="multipart/form-data" autocomplete="on">

			<div id="textarea" name="content">
				<textarea class="xheditor {tools:'full',skin:'o2007blue',width:'600',height:'400',hoverExecDelay:100,layerShadow:3}" name="content">
				</textarea>
			</div>	
			<div id="leftinput">		
				<input type="text" name="title" id="title" placeholder="请输入标题" required="required">
			
				<input type="button" id="postuploadbg" value="请选择要上传的文件">
				<input type="hidden" name="max_file_size" value="900000000" />
				<input type="file" name="a_file" id="postupload" style="opacity:0">
				<div id="filenotice">提醒：您能选择的文件类型为ppt,pptx,doc,docs,xls,xlsx,rar,zip</div>
				<div id="notice">请在右侧编辑共享文件说明</div>
			</div>
			<div id="textsubmit">
				<input id="txtsub" type="submit" value="&nbsp;" name="submit" title="提交">
			</div>
			
		</form>
		<style>
		#textarea{position:absolute;top:130px;right:220px;width:550px;height:500px}
		#textsubmit{position:absolute;bottom:150px;right:120px}
		
		#leftinput{width:350px;height:450px;background:#f75a6f;position:absolute;left:220px;top:130px}
		#postuploadbg{position:absolute;top:160px;left:15px;background:#fff;height:60px; width:320px;}
		#postupload{position:absolute;top:160px;left:15px;background:#05b5da;height:40px; width:300px;}
		
		#filenotice{position:absolute;left:75px;top:230px;width:200px;text-align:center;font:15px 微软雅黑}
		#notice{position:absolute;left:75px;top:300px;width:200px;text-align:center;font:20px 微软雅黑}
		#title{position:absolute;top:40px;left:15px;height:20px; width:300px;}
		#title,#postupload,#postuploadbg{
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
		<?php
			}
		?>

<!--post3-->		
		<?php
		if($post=="3"){
		?>
		<form method="post" action="post_check.php?action=3" enctype="multipart/form-data" autocomplete="on">

			<div id="textarea" name="content">
				<textarea class="xheditor {tools:'full',skin:'o2007blue',width:'600',height:'400',hoverExecDelay:100,layerShadow:3}" name="content">
				</textarea>
			</div>	
			<div id="leftinput">		
				<input type="text" name="title" id="title" placeholder="请输入标题" required="required">
				<input type="button" id="postuploadbg" value="请选择要上传的图片">
				<input type="file" name="a_file" id="postupload" style="opacity:0">
				<div id="notice">请在右侧编辑您要发表的内容</div>
			</div>
			<div id="textsubmit">
				<input id="txtsub" type="submit" value="&nbsp;" name="submit" title="提交">
			</div>
			
		</form>
		<style>
		#textarea{position:absolute;top:130px;right:220px;width:550px;height:500px}
		#textsubmit{position:absolute;bottom:150px;right:120px}
		
		#leftinput{width:350px;height:450px;background:#fbfba3;position:absolute;left:220px;top:130px}
		#postuploadbg{position:absolute;top:160px;left:15px;background:#fff;height:60px; width:320px;}
		#postupload{position:absolute;top:160px;left:15px;background:#f5e143;height:40px; width:300px;}
		
		#notice{position:absolute;left:75px;top:300px;width:200px;text-align:center;font:20px 微软雅黑}
		#title{position:absolute;top:40px;left:15px;height:20px; width:300px;}
		#title,#postupload,#postuploadbg{
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
		<?php
			}
		?>
<!--如果没有？psot= 后缀则自动返回-->
	<?php
	}else{
		echo "<script>history.back(-1);</script>";
		}
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

