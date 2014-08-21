<div id="mycontainer">
<div id="exp">
	<div id="thistitle">
		<a href="share.php?type=1" target="_blank">
		经验
		</a>
	</div>
	<div id="listshare">
		最新推荐
	</div>
	<ul>
	<?php
	$sql="select * from share where type = '1' order by id limit 5";
	$result=mysql_query($sql);
	while($row=mysql_fetch_array($result)){
	?>
		<a href="article.php?id=<?php echo $row['id']?>" target="_blank">
			<li>
			<?php
			echo $row['title'];
			?>
			</li>
		</a>
	<?php
	}
	?>
		<a href="share.php?type=1" target="_blank">
		<li>
				更多...
		</li>
		</a>
	</ul>
	<div id="listshare">
		功能应用
	</div>
	<ul>
	<?php
	if(!isset($_SESSION['username'])){
	?>
		<a onclick="LogFloat()"><li>登录以分享经验</li></a>
	<?php
	}else{
	?>
		<a href="post.php?post=1" target="_blank"><li>分享我的经验</li></a>
	<?php
	}
	?>
	</ul>
</div>

<div id="res">
	<div id="thistitle">
		<a href="share.php?type=2" target="_blank">
		资源
		</a>
	</div>
	<div id="listshare">
		最新推荐
	</div>
	<ul>
	<?php
	$sql="select * from share where type = '2' order by id limit 4";
	$result=mysql_query($sql);
	while($row=mysql_fetch_array($result)){
	?>
		<a href="article.php?id=<?php echo $row['id']?>" target="_blank">
			<li>
			<?php
			echo $row['title'];
			?>
			</li>
		</a>
	<?php
	}
	?>
		<a href="share.php?type=2" target="_blank">
		<li>
				更多...
		</li>
		</a>
	</ul>
	<div id="listshare">
		功能应用
	</div>
	<ul>
	<?php
	if(!isset($_SESSION['username'])){
	?>
		<a onclick="LogFloat()"><li>登录以分享经验</li></a>
	<?php
	}else{
	?>
		<a href="post.php?post=2" target="_blank"><li>分享我的资源</li></a>
	<?php
	}
	?>
	</ul>
</div>

<div id="fun">
	<div id="thistitle">
		<a href="share.php?type=3" target="_blank">
		趣事
		</a>
	</div>
	<div id="listshare">
		最新推荐
	</div>
	<ul>
	<?php
	$sql="select * from share where type = '3' order by id limit 5";
	$result=mysql_query($sql);
	while($row=mysql_fetch_array($result)){
	?>
		<a href="article.php?id=<?php echo $row['id']?>" target="_blank">
			<li>
			<?php
			echo $row['title'];
			?>
			</li>
		</a>
	<?php
	}
	?>
		<a href="share.php?type=3" target="_blank">
		<li>
				更多...
		</li>
		</a>
	</ul>
	<div id="listshare">
		功能应用
	</div>
	<ul>
	<?php
	if(!isset($_SESSION['username'])){
	?>
		<a onclick="LogFloat()"><li>登录以分享经验</li></a>
	<?php
	}else{
	?>
		<a href="post.php?post=3" target="_blank"><li>分享我的趣事</li></a>
	<?php
	}
	?>
	</ul>
</div>
</div>
<style>
	#exp,#res,#fun{
	width:250px;
	height:450px;
	float:left;
	margin:5px;
	position:relative;
	}
	#exp{background:#6FB4E7}
	#res{background:#F75A6F}
	#fun{background:#FBFBA3}
	#thistitle{margin:15px}
	#exp a,#res a,#fun a{
	color:#000;
	text-decoration:none;
	cursor:Pointer;
	}
	#thistitle a{font:30px 微软雅黑;}
	#listshare{font:20px 微软雅黑;margin:8px 30px;}
	#exp li,#res li,#fun li{
	font:16px 微软雅黑;
	margin:8px 60px;
	}
</style>
	<style>
	#mycontainer{
	position:relative;
	margin:0px;
	top:0px;
	width:
	}
	</style>

	<script>
	(function($){ 
	$.fn.newscenter = function(){ 
	this.css("position","absolute");  
	this.css("top", (($(window).height())/2 -(this.height())/2+30) + "px");  
	this.css("left", ( $(window).width() - this.width()) / 2 + "px");  
	return this;  
	} 
	})(jQuery) 
	$('#mycontainer').newscenter();
	</script>