
	<?php
	session_start();
	include('../reg/conn.php');
	if(@$_REQUEST['id']!=""){//@很重要
	?>
<!--header-->	
	<!--title-->
	<div>
		<a id='newsname'>
			<?php
			$sql = "select * from share where id={$_REQUEST['id']}";
			$result=mysql_query($sql);
			$num=mysql_num_rows($result);
			if($num!=0){
			while($row=mysql_fetch_array($result)){
				echo $row['title'],"<p>"; 
			?>
		</a>
		<div id="newstime">
			<?php echo "发布时间：&nbsp;",$row['time'];?>
			<?php echo "作者：&nbsp;",$row['username'];?>
		</div>
	</div> 
	
	<!--back-->
	<a href="share.php?type=<?php echo $row['type'];?>">
		<div id="newsback">
		</div>
	</a>
			<?php
				}
			}
			?>	
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


<!--content-->	
	<div id="content">
		<?php
		$sql = "select * from share where id={$_REQUEST['id']} limit 1";
		$result=mysql_query($sql);
		$num=mysql_num_rows($result);
		if($num!=0){
			while($row=mysql_fetch_assoc($result)){
				$username=$row['username'];
				$title=$row['title'];
				$time=$row['time'];
				$content=$row['content'];
				$file=$row['file'];
				$path_parts = pathinfo($row['file']);//文件信息
		?>
		<div id="container">
				<?php
				if($row['type']=="2"){
				?>
						<div style="font:18px 微软雅黑;color:white">
							<?php
							echo $content;//输出正文
							?>
							<p>
							<div>
								点击图标下载
								<a href="file/<?php echo $file;?>">
									<?php
									//下面根据文件类型确定显示
									if($path_parts['extension']=="doc"||$path_parts['extension']=="docs"){
									?>
										<img src="img/w.png" id="typepic">
									<?php
									}
									?>
									
									<?php
									if($path_parts['extension']=="ppt"||$path_parts['extension']=="pptx"){
									?>
										<img src="img/p.png" id="typepic">
									<?php
									}
									?>
									
									<?php
									if($path_parts['extension']=="xls"||$path_parts['extension']=="xlsx"){
									?>
										<img src="img/e.png" id="typepic">
									<?php
									}
									?>

									<?php
									if($path_parts['extension']=="rar"||$path_parts['extension']=="zip"){
									?>
										<img src="img/z.png" id="typepic">
									<?php
									}
									?>					
								</a>
							</div>
						</div>
					<?php
					}else if($row['type']=="1"||$row['type']="3"){
					?>
							<div style="font:18px 微软雅黑;color:white">
								<img src="../img/post/<?php echo $file;?>" style="width:400px;height:200px;padding:20px">
								<?php
								echo $content;//输出正文
								?>
							</div>
						<?php
						}else{
							echo "无内容";
							}
						?>	

			<?php	
				}//while结束
			}else{//end if...(无对应id结果的情况)
				echo "无结果";
				}
			?>
			
		</div><!--container end-->

		
	</div>
	
	<?php 
	}else{//非法进入（without submiting id）
	echo "<script>location.href='index.php'</script>";
	}
	?>
<!--end content-->