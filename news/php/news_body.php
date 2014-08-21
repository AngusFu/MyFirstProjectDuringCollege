
	<?php
	if(@$_REQUEST['school']!=""){//@很重要
		$school=$_REQUEST['school'];//学校地址。。。
	?>
	<!--Header-->
		<!---logo-->
		<div>
			<a href='../index.php'>
				<img src='../img/logo.png' id='headerlogo'>
			</a> 
		</div>   	
		
		<!---site name-->
		<div>
			<a id='sitename'>
			<?php
				if($school=="1"){
					echo "华农";
					}
				if($school=="2"){
					echo "华科";
					}
				if($school=="3"){
					echo "武大";
					}				
				if($school=="4"){
					echo "华师";
					}				
				if($school=="5"){
					echo "理工";
					}
				if($school=="6"){
					echo "地大";
					}
				if($school=="7"){
					echo "财大";
					}
			?>
			消息
			</a>
		</div>		
		
		<?php
		session_start();
		//包含数据库连接文件
		include('../reg/conn.php');
	//如果登陆
		if(isset($_SESSION['username'])){
			$userid = $_SESSION['userid'];
			$username = $_SESSION['username'];
			$user_query = mysql_query("select * from user where uid= '$userid' limit 1");
			$row = mysql_fetch_array($user_query);
			$file=$row['pic'];//头像
			$scl=$row['school'];
		?>
			<!---myinfo-->
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
						<img id='userpic' <?php echo "src='../img/mypic/$file'";?>>
					<?php	   
					}else{//如果图片记录为空
					?>
						<img id='defaultimg' <?php echo "src='../img/defaultpic.png'";?>>
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
		}else{//如果没登陆
		?>
			<div id="headerreg">
				 <a title='注册' onclick='RegFloat()'>
				 注册
				 </a>
				 &nbsp;&nbsp;&nbsp;
				 <a title='登录' onclick='LogFloat()'>
				 登录
				 </a>
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
		
		
<!--newsbody-->
		
	<!--back-->
	<a href="index.php">
		<div id="backtolist">
		</div>
	</a>
	
	<div id="mycontainer">
		<div id="newsbody">
			<div id="left">	
				<?php
				$sql="select * from news WHERE school='{$school}' order by id desc limit 0,1";
				$result = mysql_query($sql);
				$num=mysql_num_rows($result);
				if($num!=0){
					while($row=mysql_fetch_assoc($result)){
					$id=$row['id'];
					$username=$row['username'];
					$title=$row['title'];
					$time=$row['time'];
					$content=$row['content'];
					$file=$row['file'];
					$abstract=mb_substr($content,0,40,'utf-8');//摘要
				?>	
				
				<a href="article.php?id=<?php echo $id;?>" target="_blank">
					<img src='../img/post/<?php echo $file ?>' id="leftpic">
					<br/>
					<span id="lefttitle">
					<?php
					echo $title;
					?>
					</span>
				</a>
				<?php
						}
				   }else{
				?>
				<a href="#">
					<img src="../img/bg.jpg" id="leftpic">
					<br/>
					<span id="lefttitle">
					暂时还木有新闻呢。。。
					</span>
				</a>				
				
				<?php
					}
				?>
			 </div>
			 
			 <div id="a1">
				<?php
				//$school=$REQUEST['school'];
				$sql="select * from news WHERE school='{$school}' order by id desc limit 1,1" ;
				$result = mysql_query($sql);
				$num=mysql_num_rows($result);
				if($num!=0){
					while($row=mysql_fetch_assoc($result)){
					$id=$row['id'];
					$username=$row['username'];
					$title=$row['title'];
					$time=$row['time'];
					$content=$row['content'];
					$file=$row['file'];
					$abstract=mb_substr($content,0,40,'utf-8');//摘要
				?>	
				
				<a href="article.php?id=<?php echo $id;?>" target="_blank">
					<img src='../img/post/<?php echo $file ?>' id="rightpic">
					<br/>
					<span id="righttitle">
					<?php
					echo $title;
					?>
					</span>
				</a>
				<?php
						}
				   }else{
				?>
				<a href="#">
					<img src="../img/bg.jpg" id="rightpic">
					<br/>
					<span id="righttitle">
					暂时还木有新闻呢。。。
					</span>
				</a>				
				
				<?php
					}
				?>
			 </div>
			 
			 <div id="a2">
				<?php
				//$school=$REQUEST['school'];
				$sql="select * from news WHERE school='{$school}' order by id desc limit 2,1" ;
				$result = mysql_query($sql);
				$num=mysql_num_rows($result);
				if($num!=0){
					while($row=mysql_fetch_assoc($result)){
					$id=$row['id'];
					$username=$row['username'];
					$title=$row['title'];
					$time=$row['time'];
					$content=$row['content'];
					$file=$row['file'];
					$abstract=mb_substr($title,0,15,'utf-8');//摘要
				?>	
				
				<a href="article.php?id=<?php echo $id;?>" target="_blank">
					<img src='../img/post/<?php echo $file ?>' id="rightpic">
					<br/>
					<span id="righttitle">
					<?php
					echo $abstract;
					?>
					</span>
				</a>
				<?php
						}
				   }else{
				?>
				<a href="#">
					<img src="../img/bg.jpg" id="rightpic">
					<br/>
					<span id="righttitle">
					暂时还木有新闻呢。。。
					</span>
				</a>				
				
				<?php
					}
				?>
			 </div>
			 
			 <div id="a3">
				<?php
				//$school=$REQUEST['school'];
				$sql="select * from news WHERE school='{$school}' order by id desc limit 3,1" ;
				$result = mysql_query($sql);
				$num=mysql_num_rows($result);
				if($num!=0){
					while($row=mysql_fetch_assoc($result)){
					$id=$row['id'];
					$username=$row['username'];
					$title=$row['title'];
					$time=$row['time'];
					$content=$row['content'];
					$file=$row['file'];
					$abstract=mb_substr($content,0,40,'utf-8');//摘要
				?>	
				
				<a href="article.php?id=<?php echo $id;?>" target="_blank">
					<img src='../img/post/<?php echo $file ?>' id="rightpic">
					<br/>
					<span id="righttitle">
					<?php
					echo $title;
					?>
					</span>
				</a>
				<?php
						}
				   }else{
				?>
				<a href="#">
					<img src="../img/bg.jpg" id="rightpic">
					<br/>
					<span id="righttitle">
					暂时还木有新闻呢。。。
					</span>
				</a>				
				
				<?php
					}
				?>
			 </div>
			 
			 <div id="b1">
				<?php
				//$school=$REQUEST['school'];
				$sql="select * from news WHERE school='{$school}' order by id desc limit 4,1" ;
				$result = mysql_query($sql);
				$num=mysql_num_rows($result);
				if($num!=0){
					while($row=mysql_fetch_assoc($result)){
					$id=$row['id'];
					$username=$row['username'];
					$title=$row['title'];
					$time=$row['time'];
					$content=$row['content'];
					$file=$row['file'];
					$abstract=mb_substr($content,0,40,'utf-8');//摘要
				?>	
				
				<a href="article.php?id=<?php echo $id;?>" target="_blank">
					<img src='../img/post/<?php echo $file ?>' id="rightpic">
					<br/>
					<span id="righttitle">
					<?php
					echo $title;
					?>
					</span>
				</a>
				<?php
						}
				   }else{
				?>
				<a href="#">
					<img src="../img/bg.jpg" id="rightpic">
					<br/>
					<span id="righttitle">
					暂时还木有新闻呢。。。
					</span>
				</a>				
				
				<?php
					}
				?>
			 </div>
			 
			 <div id="b2">
				<?php
				//$school=$REQUEST['school'];
				$sql="select * from news WHERE school='{$school}' order by id desc limit 5,1" ;
				$result = mysql_query($sql);
				$num=mysql_num_rows($result);
				if($num!=0){
					while($row=mysql_fetch_assoc($result)){
					$id=$row['id'];
					$username=$row['username'];
					$title=$row['title'];
					$time=$row['time'];
					$content=$row['content'];
					$file=$row['file'];
					$abstract=mb_substr($content,0,40,'utf-8');//摘要
				?>	
				
				<a href="article.php?id=<?php echo $id;?>" target="_blank">
					<img src='../img/post/<?php echo $file ?>' id="rightpic">
					<br/>
					<span id="righttitle">
					<?php
					echo $title;
					?>
					</span>
				</a>
				<?php
						}
				   }else{
				?>
				<a href="#">
					<img src="../img/bg.jpg" id="rightpic">
					<br/>
					<span id="righttitle">
					暂时还木有新闻呢。。。
					</span>
				</a>				
				
				<?php
					}
				?>
			 </div>
			 
			 <div id="b3">
				<?php
				//$school=$REQUEST['school'];
				$sql="select * from news WHERE school='{$school}' order by id desc limit 6,1" ;
				$result = mysql_query($sql);
				$num=mysql_num_rows($result);
				if($num!=0){
					while($row=mysql_fetch_assoc($result)){
					$id=$row['id'];
					$username=$row['username'];
					$title=$row['title'];
					$time=$row['time'];
					$content=$row['content'];
					$file=$row['file'];
					$abstract=mb_substr($content,0,40,'utf-8');//摘要
				?>	
				
				<a href="article.php?id=<?php echo $id;?>" target="_blank">
					<img src='../img/post/<?php echo $file ?>' id="rightpic">
					<br/>
					<span id="righttitle">
					<?php
					echo $title;
					?>
					</span>
				</a>
				<?php
						}
				   }else{
				?>
				<a href="#">
					<img src="../img/bg.jpg" id="rightpic">
					<br/>
					<span id="righttitle">
					暂时还木有新闻呢。。。
					</span>
				</a>				
				
				<?php
					}
				?>
			 </div>		 
		</div>
	</div>	
	<?php
	}else{
		echo "<script>location.href='index.php'</script>";
		}
	?>
	<style>
	#mycontainer{
	position: relative;
	height:500px;
	width:900px;
	margin:0px;
	top:0px;
	}
	#left,#a1,#a2,#a3,#b1,#b2,#b3{
	float:left;
	margin:5px;
	} 
	#left{
	float:left;
	margin:5px;
	} 
	</style>

	<script>
	(function($){ 
	$.fn.newscenter = function(){ 
	this.css("position","absolute");  
	this.css("top", (($(window).height())/2 -(this.height())/2+50) + "px");  
	this.css("left", ( $(window).width() - this.width()) / 2 + "px");  
	return this;  
	} 
	})(jQuery) 
	$('#mycontainer').newscenter();
	</script>