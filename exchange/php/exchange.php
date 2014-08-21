	<?php
	include("../reg/conn.php");
	?>

	<?php
	$sqla = "SELECT * FROM exchange WHERE type='$_REQUEST[type]' ORDER BY id DESC"; 
	$resulta=mysql_query($sqla);
	$num=mysql_num_rows($resulta);
	$row=mysql_fetch_array($resulta);
	$x= ceil($num/4);//进1法。用来判断屏幕数的。。。
	?>
	
    <div id="place"  onclick="clickToHide()"> 
		<div id="wrapper1">
			<div id="layout-fj">
			<?php
			$sql = "SELECT * FROM exchange WHERE type='$_REQUEST[type]' ORDER BY id DESC limit 0,4"; 
			$result=mysql_query($sql);
			$num=mysql_num_rows($result);
			if($num!=0){
			$i=1;
			while($row=mysql_fetch_array($result)){
				$abstract=mb_substr($row['content'],0,40,'utf-8');//摘要
				$atime=mb_substr($row['time'],5,6,'utf-8');//时间摘要
			?>
				<div id="a<?php echo $i;?>"  onmouseover="C<?php echo $i;?>()" onmouseout="H<?php echo $i;?>()" style="opacity:0.9">
				
					<img src="img/book/<?php echo $row['file'];?>" id="imga<?php echo $i;?>">
			
					<div id="bookname">书名：</div>
					<div id="title"><a><?php echo $row['title'];?></a></div>

					<div id="desc">说明：</div>
					<div id="content"><a title="<?php  echo $row['content'];?>"><?php echo $abstract;?></a></div>	

					<div id="post">发布：</div>
					<div id="postname"><a><?php echo $row['username'],"&nbsp;&nbsp;&nbsp;(",$atime,")";?></a></div>	
				<?php
				if(isset($_SESSION['username'])){
				?>
					<a id="contact" href="my.php?id=<?php echo $row['id'];?>" target="_blank">点击查看联系方式</a>
				<?php
				}else{
				?>				
					<div id="contact" onclick="javascript:alert('请先登录')">登录后查看联系方式</div>
				<?php
				}
				?>
				</div>
				<script>
				function C<?php echo $i;?>(){
				a<?php echo $i;?>.style.opacity="1";
				}
				function H<?php echo $i;?>(){
				a<?php echo $i;?>.style.opacity="0.9"; 
				}
				</script>
			<?php
				$i++;//循环一次则i加1
				}
			}//endif
			?>
			</div>
		</div>
		<?php
		if($x>=2){
		?>
		<div id="button1to2"></div>
		<?php
		}
		?>
		
        <div id="button2to1"></div>
		<div id="wrapper2">
			<div id="layout-fj">
			<?php
			$sql = "SELECT * FROM exchange WHERE type='$_REQUEST[type]' ORDER BY id DESC limit 4,4"; 
			$result=mysql_query($sql);
			$num=mysql_num_rows($result);
			if($num!=0){
			$i=1;
			while($row=mysql_fetch_array($result)){
				$abstract=mb_substr($row['content'],0,40,'utf-8');//摘要
				$atime=mb_substr($row['time'],5,6,'utf-8');//时间摘要
			?>
				<div id="b<?php echo $i;?>"  onmouseover="C2<?php echo $i;?>()" onmouseout="H2<?php echo $i;?>()" style="opacity:0.9">
				
					<img src="img/book/<?php echo $row['file'];?>" id="imga<?php echo $i;?>">
			
					<div id="bookname">书名：</div>
					<div id="title"><a><?php echo $row['title'];?></a></div>

					<div id="desc">说明：</div>
					<div id="content"><a title="<?php  echo $row['content'];?>"><?php echo $abstract;?></a></div>	

					<div id="post">发布：</div>
					<div id="postname"><a><?php echo $row['username'],"&nbsp;&nbsp;&nbsp;(",$atime,")";?></a></div>	
				<?php
				if(isset($_SESSION['username'])){
				?>
					<a id="contact" href="my.php?id=<?php echo $row['id'];?>" target="_blank">点击查看联系方式</a>
				<?php
				}else{
				?>				
					<div id="contact" onclick="javascript:alert('请先登录')">登录后查看联系方式</div>
				<?php
				}
				?>
				</div>
				<script>
				function C2<?php echo $i;?>(){
				b<?php echo $i;?>.style.opacity="1";
				}
				function H2<?php echo $i;?>(){
				b<?php echo $i;?>.style.opacity="0.9"; 
				}
				</script>
			<?php
				$i++;//循环一次则i加1
				}
			}//endif
			?>			 
			</div>
		</div>
		<div id="button2to3"></div>
		
		
        <div id="button3to2"></div>
        <div id="wrapper3">
			<div id="layout-fj">
			<?php
			$sql = "SELECT * FROM exchange WHERE type='$_REQUEST[type]' ORDER BY id DESC limit 8,4"; 
			$result=mysql_query($sql);
			$num=mysql_num_rows($result);
			if($num!=0){
			$i=1;
			while($row=mysql_fetch_array($result)){
				$abstract=mb_substr($row['content'],0,40,'utf-8');//摘要
				$atime=mb_substr($row['time'],5,6,'utf-8');//时间摘要
			?>
				<div id="c<?php echo $i;?>"  onmouseover="C3<?php echo $i;?>()" onmouseout="H3<?php echo $i;?>()" style="opacity:0.9">
				
					<img src="img/book/<?php echo $row['file'];?>" id="imga<?php echo $i;?>">
			
					<div id="bookname">书名：</div>
					<div id="title"><a><?php echo $row['title'];?></a></div>

					<div id="desc">说明：</div>
					<div id="content"><a title="<?php  echo $row['content'];?>"><?php echo $abstract;?></a></div>	

					<div id="post">发布：</div>
					<div id="postname"><a><?php echo $row['username'],"&nbsp;&nbsp;&nbsp;(",$atime,")";?></a></div>	
				<?php
				if(isset($_SESSION['username'])){
				?>
					<a id="contact" href="my.php?id=<?php echo $row['id'];?>" target="_blank">点击查看联系方式</a>
				<?php
				}else{
				?>				
					<div id="contact" onclick="javascript:alert('请先登录')">登录后查看联系方式</div>
				<?php
				}
				?>
				</div>
				<script>
				function C3<?php echo $i;?>(){
				c<?php echo $i;?>.style.opacity="1";
				}
				function H3<?php echo $i;?>(){
				c<?php echo $i;?>.style.opacity="0.9"; 
				}
				</script>
			<?php
				$i++;//循环一次则i加1
				}
			}//endif
			?>
			</div>
	    </div>
		<div id="button3to4"></div>

        <div id="button4to3"></div>
        <div id="wrapper4">
			<div id="layout-fj">
			<?php
			$sql = "SELECT * FROM exchange WHERE type='$_REQUEST[type]' ORDER BY id DESC limit 12,4"; 
			$result=mysql_query($sql);
			$num=mysql_num_rows($result);
			if($num!=0){
			$i=1;
			while($row=mysql_fetch_array($result)){
				$abstract=mb_substr($row['content'],0,40,'utf-8');//摘要
				$atime=mb_substr($row['time'],5,6,'utf-8');//时间摘要
			?>
				<div id="d<?php echo $i;?>"  onmouseover="C4<?php echo $i;?>()" onmouseout="H4<?php echo $i;?>()" style="opacity:0.9">
				
					<img src="img/book/<?php echo $row['file'];?>" id="imga<?php echo $i;?>">
			
					<div id="bookname">书名：</div>
					<div id="title"><a><?php echo $row['title'];?></a></div>

					<div id="desc">说明：</div>
					<div id="content"><a title="<?php  echo $row['content'];?>"><?php echo $abstract;?></a></div>	

					<div id="post">发布：</div>
					<div id="postname"><a><?php echo $row['username'],"&nbsp;&nbsp;&nbsp;(",$atime,")";?></a></div>	
				<?php
				if(isset($_SESSION['username'])){
				?>
					<a id="contact" href="my.php?id=<?php echo $row['id'];?>" target="_blank">点击查看联系方式</a>
				<?php
				}else{
				?>				
					<div id="contact" onclick="javascript:alert('请先登录')">登录后查看联系方式</div>
				<?php
				}
				?>
				</div>
				<script>
				function C4<?php echo $i;?>(){
				d<?php echo $i;?>.style.opacity="1";
				}
				function H4<?php echo $i;?>(){
				d<?php echo $i;?>.style.opacity="0.9"; 
				}
				</script>
			<?php
				$i++;//循环一次则i加1
				}
			}//endif
			?>
			</div>
	    </div>
		<div id="button4to5"></div>
 
		<div id="button5to4"></div>
        <div id="wrapper5">
			<div id="layout-fj">
			<?php
			$sql = "SELECT * FROM exchange WHERE type='$_REQUEST[type]' ORDER BY id DESC limit 16,4"; 
			$result=mysql_query($sql);
			$num=mysql_num_rows($result);
			if($num!=0){
			$i=1;
			while($row=mysql_fetch_array($result)){
				$abstract=mb_substr($row['content'],0,40,'utf-8');//摘要
				$atime=mb_substr($row['time'],5,6,'utf-8');//时间摘要
			?>
				<div id="e<?php echo $i;?>"  onmouseover="C5<?php echo $i;?>()" onmouseout="H5<?php echo $i;?>()" style="opacity:0.9">
				
					<img src="img/book/<?php echo $row['file'];?>" id="imga<?php echo $i;?>">
			
					<div id="bookname">书名：</div>
					<div id="title"><a><?php echo $row['title'];?></a></div>

					<div id="desc">说明：</div>
					<div id="content"><a title="<?php  echo $row['content'];?>"><?php echo $abstract;?></a></div>	

					<div id="post">发布：</div>
					<div id="postname"><a><?php echo $row['username'],"&nbsp;&nbsp;&nbsp;(",$atime,")";?></a></div>	
				<?php
				if(isset($_SESSION['username'])){
				?>
					<a id="contact" href="my.php?id=<?php echo $row['id'];?>" target="_blank">点击查看联系方式</a>
				<?php
				}else{
				?>				
					<div id="contact" onclick="javascript:alert('请先登录')">登录后查看联系方式</div>
				<?php
				}
				?>
				</div>
				<script>
				function C5<?php echo $i;?>(){
				e<?php echo $i;?>.style.opacity="1";
				}
				function H5<?php echo $i;?>(){
				e<?php echo $i;?>.style.opacity="0.9"; 
				}
				</script>
			<?php
				$i++;//循环一次则i加1
				}
			}//endif
			?>
			</div>
	    </div>
	
	<?php
	if(isset($_SESSION['username'])){
	if($_REQUEST['type']=='2'){
	?>
		<div id="NS" onmouseover="N()" onmouseout="N2()" style="position:fixed;right:130px;bottom:40px;">
		<a href="need.php">
		<img src="img/c1.png" id="topostN"/>
		</a>
		</div>
	<?php
	}
	if($_REQUEST['type']=='1'){
	?>
		<div id="NS" onmouseover="N3()" onmouseout="N4()" style="position:fixed;right:130px;bottom:40px;">
		<a href="supply.php">
		<img src="img/d1.png" id="topostS"/>
		</a>
		</div>
	<?php
	}
	}
	?>
 		
		
	</div><!-- end place -->
	
	<script>
		var numberOfScreens = <?php echo $x;?> //number of screens 
		
		function N(){
		document.getElementById('topostN').src ="img/c2.png";
		}	
		function N2(){
		document.getElementById('topostN').src ="img/c1.png";
		}	
		function N3(){
		document.getElementById('topostS').src ="img/d2.png";
		}	
		function N4(){
		document.getElementById('topostS').src ="img/d1.png";
		}	
	</script>
	<script type="text/javascript" src="js/script3.js"></script>
 