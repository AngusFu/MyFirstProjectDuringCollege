
	<?php
	session_start();
	include('../reg/conn.php');
	if(@$_REQUEST['type']=="1"||@$_REQUEST['type']=="2"||@$_REQUEST['type']=="3"){//@很重要
		$type=$_REQUEST['type'];
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
				if($type=="1"){
					echo "经验";
					}
				if($type=="2"){
					echo "资源";
					}
				if($type=="3"){
					echo "趣事";
					}
			?>
			</a>
		</div>		
		
		<?php
	//如果登陆
		if(isset($_SESSION['username'])){
			$userid = $_SESSION['userid'];
			$username = $_SESSION['username'];
			$sql="select * from user where uid= '$userid' limit 1";
			$result = mysql_query($sql);
			$row = mysql_fetch_array($result);
			$file=$row['pic'];//头像
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

	<?php
	}else{//如果type不符合要求则返回
		echo "<script>location.href='index.php'</script>";
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

<!--back（返回按钮）-->
	<a href="index.php">
		<div id="backtolist">
		</div>
	</a>
	
<!--经验or趣事分享显示-->
	<?php
	if($type=="1"||$type=="3"){
	?>
	<div id="mycontainer">
		<div id="newsbody">
			<div id="left">	
				<?php
				$sql="select * from share WHERE type='{$type}' order by id desc limit 0,1";
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
				
				<a href="article.php?id=<?php echo $id;?>">
				<?php
				if($file!=""){
				?>
					<img src='../img/post/<?php echo $file ?>' id="leftpic">
				<?php
				}else{
				?>
					<img src='../img/post/df.jpg' id="leftpic">
				<?php
				}
				?>
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
					<img src="../img/post/df.jpg" id="leftpic">
					<br/>
					<span id="lefttitle">
					暂时还什么都木有呢。。。
					</span>
				</a>				
				
				<?php
					}
				?>
			 </div>
			 
			 <div id="a1">
				<?php
				$sql="select * from share WHERE type='{$type}' order by id desc limit 1,1" ;
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
				
				<a href="article.php?id=<?php echo $id;?>">
				<?php
				if($file!=""){
				?>
					<img src='../img/post/<?php echo $file ?>' id="rightpic">
				<?php
				}else{
				?>
					<img src='../img/post/df.jpg' id="rightpic">
				<?php
				}
				?>
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
					<img src="../img/post/df.jpg" id="rightpic">
					<br/>
					<span id="righttitle">
					暂时还什么都木有呢。。。
					</span>
				</a>				
				
				<?php
					}
				?>
			 </div>
			 
			 <div id="a2">
				<?php
				$sql="select * from share WHERE type='{$type}' order by id desc limit 2,1" ;
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
				
				<a href="article.php?id=<?php echo $id;?>">
				<?php
				if($file!=""){
				?>
					<img src='../img/post/<?php echo $file ?>' id="rightpic">
				<?php
				}else{
				?>
					<img src='../img/post/df.jpg' id="rightpic">
				<?php
				}
				?>
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
					<img src="../img/post/df.jpg" id="rightpic">
					<br/>
					<span id="righttitle">
					暂时还什么都木有呢。。。
					</span>
				</a>				
				
				<?php
					}
				?>
			 </div>
			 
			 <div id="a3">
				<?php
				$sql="select * from share WHERE type='{$type}' order by id desc limit 3,1" ;
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
				
				<a href="article.php?id=<?php echo $id;?>">
				<?php
				if($file!=""){
				?>
					<img src='../img/post/<?php echo $file ?>' id="rightpic">
				<?php
				}else{
				?>
					<img src='../img/post/df.jpg' id="rightpic">
				<?php
				}
				?>
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
					<img src="../img/post/df.jpg" id="rightpic">
					<br/>
					<span id="righttitle">
					暂时还什么都木有呢。。。
					</span>
				</a>				
				
				<?php
					}
				?>
			 </div>
			 
			 <div id="b1">
				<?php
				$sql="select * from share WHERE type='{$type}' order by id desc limit 4,1" ;
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
				
				<a href="article.php?id=<?php echo $id;?>">
				<?php
				if($file!=""){
				?>
					<img src='../img/post/<?php echo $file ?>' id="rightpic">
				<?php
				}else{
				?>
					<img src='../img/post/df.jpg' id="rightpic">
				<?php
				}
				?>
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
					<img src="../img/post/df.jpg" id="rightpic">
					<br/>
					<span id="righttitle">
					暂时还什么都木有呢。。。
					</span>
				</a>				
				
				<?php
					}
				?>
			 </div>
			 
			 <div id="b2">
				<?php
				$sql="select * from share WHERE type='{$type}' order by id desc limit 5,1" ;
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
				
				<a href="article.php?id=<?php echo $id;?>">
				<?php
				if($file!=""){
				?>
					<img src='../img/post/<?php echo $file ?>' id="rightpic">
				<?php
				}else{
				?>
					<img src='../img/post/df.jpg' id="rightpic">
				<?php
				}
				?>
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
					<img src="../img/post/df.jpg" id="rightpic">
					<br/>
					<span id="righttitle">
					暂时还什么都木有呢。。。
					</span>
				</a>				
				
				<?php
					}
				?>
			 </div>
			 
			 <div id="b3">
				<?php
				$sql="select * from share WHERE type='{$type}' order by id desc limit 6,1" ;
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
				
				<a href="article.php?id=<?php echo $id;?>">
				<?php
				if($file!=""){
				?>
					<img src='../img/post/<?php echo $file ?>' id="rightpic">
				<?php
				}else{
				?>
					<img src='../img/post/df.jpg' id="rightpic">
				<?php
				}
				?>
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
					<img src="../img/post/df.jpg" id="rightpic">
					<br/>
					<span id="righttitle">
					暂时还什么都木有呢。。。
					</span>
				</a>				
				
				<?php
					}
				?>
			 </div>
		</div>
	</div>
	<?php
	}elseif($type=="2"){//资源共享有所不同、、、、
	?>
	<div id="mycontainer">
		<div id="newsbody">
			<div id="left">	
				<?php
				$sql="select * from share WHERE type='{$type}' order by id desc limit 0,1";
				$result = mysql_query($sql);
				$num=mysql_num_rows($result);
				if($num!=0){
					while($row=mysql_fetch_assoc($result)){
					$id=$row['id'];
					$username=$row['username'];
					$title=$row['title'];
					$time=$row['time'];
					$content=$row['content'];
					$f=$row['file'];
					$path_parts = pathinfo($f);
				?>	
				<a href="article.php?id=<?php echo $id;?>">
				
					<?php
					if($path_parts['extension']=="doc"||$path_parts['extension']=="docs"){
					?>
						<img src="img/w.png" id="leftpic">
					<?php
					}
					?>
					
					<?php
					if($path_parts['extension']=="ppt"||$path_parts['extension']=="pptx"){
					?>
						<img src="img/p.png" id="leftpic">
					<?php
					}
					?>
					
					<?php
					if($path_parts['extension']=="xls"||$path_parts['extension']=="xlsx"){
					?>
						<img src="img/e.png" id="leftpic">
					<?php
					}
					?>

					<?php
					if($path_parts['extension']=="rar"||$path_parts['extension']=="zip"){
					?>
						<img src="img/z.png" id="leftpic">
					<?php
					}
					?>					
					<br/>
					<span id="lefttitle"><?php echo $title;?></span>
				</a>
				<?php
					}
			   }else{
				?>
				<a href="#">
					<img src="img/df.png" id="leftpic">
					<br/>
					<span id="lefttitle">
					暂时还什么都木有呢。。。
					</span>
				</a>				
				
				<?php
				}
				?>
			 </div>
			 
			 <div id="a1">
				<?php
				$sql="select * from share WHERE type='{$type}' order by id desc limit 1,1" ;
				$result = mysql_query($sql);
				$num=mysql_num_rows($result);
				if($num!=0){
					while($row=mysql_fetch_assoc($result)){
					$id=$row['id'];
					$username=$row['username'];
					$title=$row['title'];
					$time=$row['time'];
					$content=$row['content'];
					$f2=$row['file'];
					$path_parts = pathinfo($f2);
				?>	
				
				<a href="article.php?id=<?php echo $id;?>">
					<?php
					if($path_parts['extension']=="doc"||$path_parts['extension']=="docs"){
					?>
						<img src="img/w.png" id="rightpic">
					<?php
					}
					?>
					
					<?php
					if($path_parts['extension']=="ppt"||$path_parts['extension']=="pptx"){
					?>
						<img src="img/p.png" id="rightpic">
					<?php
					}
					?>
					
					<?php
					if($path_parts['extension']=="xls"||$path_parts['extension']=="xlsx"){
					?>
						<img src="img/e.png" id="rightpic">
					<?php
					}
					?>

					<?php
					if($path_parts['extension']=="rar"||$path_parts['extension']=="zip"){
					?>
						<img src="img/z.png" id="rightpic">
					<?php
					}
					?>		
					
					<br/>
					<span id="righttitle"><?php echo $title;?></span>
				</a>
				<?php
						}
				   }else{
				?>
				<a href="#">
					<img src="img/df.png" id="rightpic">
					<br/>
					<span id="righttitle">暂时还什么都木有呢。。</span>
				</a>				
				
				<?php
					}
				?>
			 </div>
			 
			 <div id="a2">
				<?php
				$sql="select * from share WHERE type='{$type}' order by id desc limit 2,1" ;
				$result = mysql_query($sql);
				$num=mysql_num_rows($result);
				if($num!=0){
					while($row=mysql_fetch_assoc($result)){
					$id=$row['id'];
					$username=$row['username'];
					$title=$row['title'];
					$time=$row['time'];
					$content=$row['content'];
					$f3=$row['file'];
					$path_parts = pathinfo($f3);
				?>	
				
				<a href="article.php?id=<?php echo $id;?>">
					<?php
					if($path_parts['extension']=="doc"||$path_parts['extension']=="docs"){
					?>
						<img src="img/w.png" id="rightpic">
					<?php
					}
					?>				
					<?php
					if($path_parts['extension']=="ppt"||$path_parts['extension']=="pptx"){
					?>
						<img src="img/p.png" id="rightpic">
					<?php
					}
					?>
					<?php
					if($path_parts['extension']=="xls"||$path_parts['extension']=="xlsx"){
					?>
						<img src="img/e.png" id="rightpic">
					<?php
					}
					?>
					<?php
					if($path_parts['extension']=="rar"||$path_parts['extension']=="zip"){
					?>
						<img src="img/z.png" id="rightpic">
					<?php
					}
					?>		
					
					<br/>
					<span id="righttitle"><?php echo $title;?></span>
				</a>
				<?php
						}
				   }else{
				?>
				<a href="#">
					<img src="img/df.png" id="rightpic">
					<br/>
					<span id="righttitle">暂时还什么都木有呢。。</span>
				</a>				
				
				<?php
					}
				?>
			 </div>
			 
			 <div id="a3">
				<?php
				$sql="select * from share WHERE type='{$type}' order by id desc limit 3,1" ;
				$result = mysql_query($sql);
				$num=mysql_num_rows($result);
				if($num!=0){
					while($row=mysql_fetch_assoc($result)){
					$id=$row['id'];
					$username=$row['username'];
					$title=$row['title'];
					$time=$row['time'];
					$content=$row['content'];
					$f4=$row['file'];
					$path_parts = pathinfo($f4);
				?>	
				
				<a href="article.php?id=<?php echo $id;?>">
					<?php
					if($path_parts['extension']=="doc"||$path_parts['extension']=="docs"){
					?>
						<img src="img/w.png" id="rightpic">
					<?php
					}
					?>
					
					<?php
					if($path_parts['extension']=="ppt"||$path_parts['extension']=="pptx"){
					?>
						<img src="img/p.png" id="rightpic">
					<?php
					}
					?>
					
					<?php
					if($path_parts['extension']=="xls"||$path_parts['extension']=="xlsx"){
					?>
						<img src="img/e.png" id="rightpic">
					<?php
					}
					?>
					<?php
					if($path_parts['extension']=="rar"||$path_parts['extension']=="zip"){
					?>
						<img src="img/z.png" id="rightpic">
					<?php
					}
					?>		
					
					<br/>
					<span id="righttitle"><?php echo $title;?></span>
				</a>
				<?php
						}
				   }else{
				?>
				<a href="#">
					<img src="img/df.png" id="rightpic">
					<br/>
					<span id="righttitle">暂时还什么都木有呢。。</span>
				</a>				
				
				<?php
					}
				?>
			 </div>
			 
			 <div id="b1">
				<?php
				$sql="select * from share WHERE type='{$type}' order by id desc limit 4,1" ;
				$result = mysql_query($sql);
				$num=mysql_num_rows($result);
				if($num!=0){
					while($row=mysql_fetch_assoc($result)){
					$id=$row['id'];
					$username=$row['username'];
					$title=$row['title'];
					$time=$row['time'];
					$content=$row['content'];
					$f5=$row['file'];
					$path_parts = pathinfo($f5);
				?>	
				
				<a href="article.php?id=<?php echo $id;?>">
					<?php
					if($path_parts['extension']=="doc"||$path_parts['extension']=="docs"){
					?>
						<img src="img/w.png" id="rightpic">
					<?php
					}
					?>
					
					<?php
					if($path_parts['extension']=="ppt"||$path_parts['extension']=="pptx"){
					?>
						<img src="img/p.png" id="rightpic">
					<?php
					}
					?>
					
					<?php
					if($path_parts['extension']=="xls"||$path_parts['extension']=="xlsx"){
					?>
						<img src="img/e.png" id="rightpic">
					<?php
					}
					?>
					<?php
					if($path_parts['extension']=="rar"||$path_parts['extension']=="zip"){
					?>
						<img src="img/z.png" id="rightpic">
					<?php
					}
					?>		
					
					<br/>
					<span id="righttitle"><?php echo $title;?></span>
				</a>
				<?php
						}
				   }else{
				?>
				<a href="#">
					<img src="img/df.png" id="rightpic">
					<br/>
					<span id="righttitle">暂时还什么都木有呢。。</span>
				</a>				
				
				<?php
					}
				?>
			 </div>

			 
			 <div id="b2">
				<?php
				$sql="select * from share WHERE type='{$type}' order by id desc limit 5,1" ;
				$result = mysql_query($sql);
				$num=mysql_num_rows($result);
				if($num!=0){
					while($row=mysql_fetch_assoc($result)){
					$id=$row['id'];
					$username=$row['username'];
					$title=$row['title'];
					$time=$row['time'];
					$content=$row['content'];
					$f6=$row['file'];
					$path_parts = pathinfo($f6);
				?>	
				
				<a href="article.php?id=<?php echo $id;?>">
					<?php
					if($path_parts['extension']=="doc"||$path_parts['extension']=="docs"){
					?>
						<img src="img/w.png" id="rightpic">
					<?php
					}
					?>
					
					<?php
					if($path_parts['extension']=="ppt"||$path_parts['extension']=="pptx"){
					?>
						<img src="img/p.png" id="rightpic">
					<?php
					}
					?>
					
					<?php
					if($path_parts['extension']=="xls"||$path_parts['extension']=="xlsx"){
					?>
						<img src="img/e.png" id="rightpic">
					<?php
					}
					?>
					<?php
					if($path_parts['extension']=="rar"||$path_parts['extension']=="zip"){
					?>
						<img src="img/z.png" id="rightpic">
					<?php
					}
					?>		
					
					<br/>
					<span id="righttitle"><?php echo $title;?></span>
				</a>
				<?php
						}
				   }else{
				?>
				<a href="#">
					<img src="img/df.png" id="rightpic">
					<br/>
					<span id="righttitle">暂时还什么都木有呢。。</span>
				</a>				
				
				<?php
					}
				?>
			 </div>
			 			 
			 <div id="b3">
				<?php
				$sql="select * from share WHERE type='{$type}' order by id desc limit 6,1" ;
				$result = mysql_query($sql);
				$num=mysql_num_rows($result);
				if($num!=0){
					while($row=mysql_fetch_assoc($result)){
					$id=$row['id'];
					$username=$row['username'];
					$title=$row['title'];
					$time=$row['time'];
					$content=$row['content'];
					$f7=$row['file'];
					$path_parts = pathinfo($f7);
				?>	
				
				<a href="article.php?id=<?php echo $id;?>">
					<?php
					if($path_parts['extension']=="doc"||$path_parts['extension']=="docs"){
					?>
						<img src="img/w.png" id="rightpic">
					<?php
					}
					?>
					
					<?php
					if($path_parts['extension']=="ppt"||$path_parts['extension']=="pptx"){
					?>
						<img src="img/p.png" id="rightpic">
					<?php
					}
					?>
					
					<?php
					if($path_parts['extension']=="xls"||$path_parts['extension']=="xlsx"){
					?>
						<img src="img/e.png" id="rightpic">
					<?php
					}
					?>
					<?php
					if($path_parts['extension']=="rar"||$path_parts['extension']=="zip"){
					?>
						<img src="img/z.png" id="rightpic">
					<?php
					}
					?>		
					
					<br/>
					<span id="righttitle"><?php echo $title;?></span>
				</a>
				<?php
						}
				   }else{
				?>
				<a href="#">
					<img src="img/df.png" id="rightpic">
					<br/>
					<span id="righttitle">暂时还什么都木有呢。。</span>
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
	
	
	<?php
	if(isset($_SESSION['username'])){
	?>
	<div onmouseover="N()" onmouseout="N2()" style="position:fixed;right:100px;bottom:20px;">
		<a href="post.php?post=<?php echo $type;?>">
		<img src="img/a<?php echo $type;?>.png" id="topostN"/>
		</a>
	</div>
	<?php
	}
	?>
	<script>
		function N(){
		document.getElementById('topostN').src ="img/b<?php echo $type;?>.png";
		}	
		function N2(){
		document.getElementById('topostN').src ="img/a<?php echo $type;?>.png";
		}	
	</script>
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