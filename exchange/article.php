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
	<div>
		<a id='newsname'>
			贴书
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

<!--header end-->
<?php
include('../reg/conn.php');
if(@$_REQUEST['id']!=""){
$sql="select * from exchange where id='$_REQUEST[id]'"; 
$result=mysql_query($sql);
$row = mysql_fetch_array($result);
?>
<div style="width:300px;height:450px;position:absolute;top:140px;left:540px;background:#e2b83d">

<?php echo $row['content'];?>
</div>

<?php
}else{
echo "...";
}
?>
<!--背景工具-->  
<div id="beijingse" style="background:url(../img/lakeblue.png)" onclick="clickToHide()"><!--为调用背景色备用-->

</div>
<!--背景工具结束-->  

<!--右侧菜单-->  	
    <?php require_once("../php/menu2.php");
	?>   
<!--隐藏的登录注册页面-->  	
	<?php require_once("../php/reg&log2.php");
	?>   
<!--隐藏的分享-->  	
	<?php require_once("../php/share2.php");
	?>  
	<?php
	}
	?>
</body>

</html>



