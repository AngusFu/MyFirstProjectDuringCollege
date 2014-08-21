<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php session_start();
	?>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>
		“双”骄
    </title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>“双”骄</title>
	<!--链接css&js-->  		
	<!--below status icon-->
		<link rel="shortcut icon" href="../img/favicon.png"/>
	<!--below basic js&css-->	
		<link rel="stylesheet" type="text/css" href="../css/style.css"/>
		<script type="text/javascript" src="../js/jquery-1.6.1.min.js"></script>
		<script type="text/javascript" src="../js/script2.js"></script>
	
	<!--以下为fj溢出代码-->	
		<link rel="stylesheet" type="text/css" href="../css/fj-css.css">	
		<script type="text/javascript" src="../js/fj-js2.js"></script>
 
	<style>
	#touxiangmy{
		position:relative;
		float:left;
		margin:5px;
		}
	#mypost1{
		position:relative;
		float:left;
	    width:380px;
		height:160px;
		background:#F77F29;	
		margin:5px;		
		}
	ul li{
		margin:10px 15px;
		float:left;
		}
	ul li a{
		font:15px 微软雅黑;
		color:#000;
		}
	#mypost3{
		position:relative;
		width:270px;
		height:290px;
		float:left;
		background:#EDA470;
		margin:5px;
		}	
	#mypost4{
		position:relative;
		float:left;
		height:290px;
		width:270px;
		background:#F8E493;
		margin:5px;
		}	
	#mypost4 ul li{
		margin:8px 15px;
		float:left;
		}
	#mypost4 ul li a{
		font:15px 微软雅黑;
		color:#000;
		}
		
	#mycontainer{
		position: relative;
		height:450px;
		width:560px;
		float:left;
		}
	#all{
		position:relative;
		height:460px;
		width:850px;
		float:left;
		margin:0px;
		}	
 
	#userinfomation{
		position:relative;
		float:left;
		width:280px;
		height:460px;
		background:#C2D0AB;
		margin:5px;
		}
	#infotable{
		position:absolute;
		left:40px;
		top:90px;
		text-align:center;
		}
	#infotable tr{
		width:30px;
		height:20px;
		}			
	#nick,#gender,#contact,#school,#school2,#major{
		font-size:16px;
		weight:bolder;
		font-family:微软雅黑
	   }
	#usnm,#gd,#cont,#uni,#uni2,#maj{
		font-size:12px;
		font-family:微软雅黑
	   }
	#toedit{
		position:absolute;
		left:200px;
		top:15px;
		width:48px;
		height:48px;
		cursor:pointer;
		background:url(../img/edithover.png)
		}
	#toedit:hover{
		background:url(../img/edit.png)
		}
		
</style>

</head>

<body>
<!--HEADER-->  	
    <?php require_once("../php/header3.php");
	?>   	


<!--登录验证及个人信息--> 
	<?php
	//检测是否登录，若没登录则返回首页
	if(!isset($_SESSION['userid'])){
	?>
	<script>location.href="../index.php"</script>
	<?php
	exit();
	}
	?>
	<div id="all">
		<div id="mycontainer">
			<?php
			//包含数据库连接文件
			include('conn.php');
			$userid = $_SESSION['userid'];
			$username = $_SESSION['username'];
			$sql= "select pic from user where uid= '$userid'";
			$result= mysql_query($sql);
			$row = mysql_fetch_array($result);
			$file=$row['pic'];//头像
			?>
			<?php
			if($file!=''){
			?>
			<div id='touxiangmy'><img src='../img/mypic/<?php echo $file;?>' style='width:160px;height:160px;'/></div>
			<?php
			}else{
			?>
			<div id="touxiangmy"><img src='../img/defaultpic.png' style='width:160px;height:160px;'/></div>
			<?php
			}
			?>	
			
			<div id="mypost1">
				<div style="margin:15px;font:20px 微软雅黑;color:#fff">最近的需求</div>
				<?php
				$username = $_SESSION['username'];
				$sql = "select * from exchange where username = '{$username}' and type='1' order by id desc limit 5";
				$result=mysql_query($sql);
				$num=mysql_num_rows($result);
				if($num!=""){
				?>
				<ul style="margin:10px 20px">
				<?php
				while($row=mysql_fetch_array($result)){
				?>
				<a href="../exchange/my.php?id=<?php echo $row['id'];?>" target="_blank">
				<li><?php echo $row['title'];?>
				</a>
				<?php
				}
				?>
				<a href="../exchange/bookcard2.php" target="_blank">
				<li>查看所有
				</a>
				</ul>
				<?php
				}else{
				?>
				<ul style="margin:10px 20px">
				<li><a href="../exchange/need.php" target="_blank">还没有发布过</a>
				</ul>
				<?php
				}
				?>
			</div>
			
			<div id="mypost3">
				<div style="margin:15px;font:20px 微软雅黑;color:#fff">最近贴出的书</div>
				<?php
				$username = $_SESSION['username'];
				$sql="SELECT * FROM exchange WHERE username = '{$username}' and type = '2' order by id desc limit 10";
				$result=mysql_query($sql);
				$num=mysql_num_rows($result);
				if($num!=""){
				?>
				<ul style="margin:10px 20px">
				<?php
				while($row=mysql_fetch_array($result)){
				?>
				<li>
				<a href="../exchange/my.php?id=<?php echo $row['id'];?>" target="_blank">
				<?php echo $row['title'];?>
				</a>
				<?php
				}
				?>
				<a href="../exchange/bookcard.php" target="_blank">
				<li>查看所有
				</a>
				</ul>	
				<?php
				}else{
				?>
				<ul style="margin:10px 20px">
				<li><a href="../exchange/exchange.php?type=1" target="_blank">还没有找到</a>
				</ul>
				<?php
				}
				?>		
			</div>
			
			
			<div id="mypost4">
				<div style="margin:15px;font:20px 微软雅黑;color:#444">最近分享的内容</div>
				<?php
				$username = $_SESSION['username'];
				$sql = "select * from share where username = '{$username}' order by id desc limit 6";
				$result=mysql_query($sql);
				$num=mysql_num_rows($result);
				if($num!=""){
				?>
				<ul style="margin:10px 20px">
				<?php
				while($row = mysql_fetch_array($result)){
				?>
				<a href="../sharing/article.php?id=<?php echo $row['id'];?>" target="_blank">
				<li><?php echo $row['title'];?>
				</a>
				<?php
				}
				?>
				<li><a href="../sharing/index.php" target="_blank">查看更多...</a>
				</ul>	
				<?php
				}else{
				?>
				<ul style="margin:10px 20px">
				<li><a href="../sharing/index.php" target="_blank">还没有分享过</a>
				</ul>
				<?php
				}
				?>
			</div>
		</div>
	
		<div id="userinfomation">	
			<div style="margin:15px;font:20px 微软雅黑;color:#fff">我的资料</div>
			<?php
			//包含数据库连接文件
			$userid = $_SESSION['userid'];
			$username = $_SESSION['username'];
			$sql= "select * from user where uid= '$userid'";
			$result= mysql_query($sql);
			$row = mysql_fetch_array($result);
			$file=$row['pic'];//头像
			$sch = $row['school'];//UNIVERSITY
			$major=$row['major'];//major
			$major2=$row['major2'];//major2
			?>
			<table id="infotable">
				<tr>
					<th>
						<div id="nick">
							昵&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;称 
						</div>
					</th>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td>
						<a id="usnm">
						<?php 
							echo $row['username'];
						?>
						</a>
					</td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				
				<tr>
					<th>
						<div id="gender">
							性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别 
						</div>				
					</th>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td>
						<a id="gd">
						<?php 
						 if($row['gender']!=null){
						 echo $row['gender'];
						 }else{
						 echo "未填";
						 }
						?>
						</a>
					</td>
				</tr>
				
				<tr><td>&nbsp;</td></tr>
				
				<tr>
					<th>
						<div id="school">
							学&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;校  
						</div>
					</th>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td>
						<a id="uni">
							<?php 
							if($row['school']!=null){
							echo $row['school'];
							}else{
							echo "尚未添加";
							}
							?>
						</a>
					</td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				
				
				<tr>
					<th>
						<div id="major">
							专&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;业 
						</div>
					</th>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td>
					<a id="maj">
						<?php 
						if($row['major']!=null){
						echo $row['major'];
						}else{
						echo "尚未添加";
						}
						?>
					</a>
					</td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<th>
						<div id="school2">
							双学位学校    
						</div>
					</th>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td>
						<a id="uni2">
							<?php 
							if($row['school2']!=null){
							echo $row['school2'];
							}else{
							echo "尚未添加";
							}
							?>
						</a>
					</td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				
				<tr>
					<th>
						<div id="major">
							双学位专业
						</div>
					</th>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td>
						<a id  ="maj">
						<?php
						if($row['major2']!=null){
						echo $row['major2'];
						}else{
						echo "尚未添加";
						}
						?>
						</a>
					</td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				
				<tr>
					<th>
						<div id="contact">
							联系方式
						</div>
					</th>
					<td>&nbsp;</td>
					<td  colspan="3">
						<a id="cont">
							<?php 
							if($row['contact']!=NULL){
								echo $row['contact'];
							}else{
								echo "尚未添加";
							}
							?>
						</a>
					</td>
				</tr>
			</table>
			
			<div>
				 <form action='edit.php'><input type='submit' id='toedit' value='' title="编辑"/></form> 
				<!--实际上投机取巧。为了实现简便达到hover效果，用submitButton代替了麻烦-->
			</div>
		</div>
	</div>
	
	<script>
	(function($){ 
	$.fn.newscenter = function(){ 
	this.css("position","absolute");  
	this.css("top", (($(window).height() -this.height())/2+40)+ "px");  
	this.css("left", ( $(window).width() - this.width())/2 + "px");  
	return this;  
	} 
	})(jQuery) 
	$('#all').newscenter();
	</script>
	
<!--背景工具-->  	
    <?php require_once("../php/bgtools2.php");
	?>   
<!--右侧浮动菜单-->  	
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
