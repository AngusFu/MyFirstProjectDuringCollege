	<?php
	include("../reg/conn.php");
	$search=$_REQUEST['BookSearch'];
	$sqla="select * from exchange WHERE title LIKE '%{$search}%' OR content LIKE '%{$search}%'ORDER BY id DESC ";
	$resulta=mysql_query($sqla);
	$num=mysql_num_rows($resulta);
	$row=mysql_fetch_array($resulta);
	$x= ceil($num/8);//进1法。用来判断屏幕数的。。。
	?>
	
    <div id="place"  onclick="clickToHide()"> 
		<div id="wrapper1">
			<div id="layout-fj">
			<?php
			$sql="select * from exchange WHERE title LIKE '%{$search}%' OR content LIKE '%{$search}%' ORDER BY id DESC limit 0,8 ";
			$result=mysql_query($sql);
			$num=mysql_num_rows($result);
			if($num!=0){
			$i=1;
			while($row=mysql_fetch_array($result)){
				$abstract=mb_substr($row['content'],0,40,'utf-8');//摘要
				$atime=mb_substr($row['time'],5,6,'utf-8');//时间摘要
				$atitle=mb_substr($row['title'],0,5,'utf-8');//题目摘要
			?>
				<div id="a<?php echo $i;?>" onmouseover="C<?php echo $i;?>()" onmouseout="H<?php echo $i;?>()">
					<img src="img/book/<?php echo $row['file'];?>" id="imga">
					<div id="touming<?php echo $i;?>">
						<a id="txt"><?php if($row['type']=="1"){echo "【我有】",$atitle;}else{echo "【我要】",$atitle;}?></a>
					</div>
				</div>
				<script>
				function C<?php echo $i;?>(){
				touming<?php echo $i;?>.innerHTML="<a id='txt2'><?php echo $abstract,"<br>",$atime,"<br>",$row['contact'];?></a>";
				touming<?php echo $i;?>.style.opacity="0.8";
				touming<?php echo $i;?>.style.height="180px";
				}
				function H<?php echo $i;?>(){
				touming<?php echo $i;?>.innerHTML="<a id='txt'><?php if($row['type']=="1"){ echo '【我有】',$atitle;}else{echo '【我要】',$atitle;}?></a>"
				touming<?php echo $i;?>.style.opacity="0.5"; 
				touming<?php echo $i;?>.style.height="40px";
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
			$sql="select * from exchange WHERE title LIKE '%{$search}%' OR content LIKE '%{$search}%'ORDER BY id DESC limit 8,8"; 
			$result=mysql_query($sql);
			$num=mysql_num_rows($result);
			if($num!=0){
			$i=1;
			while($row=mysql_fetch_array($result)){
				$abstract=mb_substr($row['content'],0,40,'utf-8');//摘要
				$atime=mb_substr($row['time'],5,6,'utf-8');//时间摘要
				$atitle=mb_substr($row['title'],0,5,'utf-8');//题目摘要
			?>
				<div id="a<?php echo $i;?>" onmouseover="C2<?php echo $i;?>()" onmouseout="H2<?php echo $i;?>()">
					<img src="img/book/<?php echo $row['file'];?>" id="imga">
					<div id="touming2<?php echo $i;?>">
						<a id="txt"><?php if($row['type']=="1"){echo "【我有】",$atitle;}else{echo "【我要】",$atitle;}?></a>
					</div>
				</div>
				<script>
				function C2<?php echo $i;?>(){
				touming2<?php echo $i;?>.innerHTML="<a id='txt2'><?php echo $abstract,"<br>",$atime,"<br>",$row['contact'];?></a>";
				touming2<?php echo $i;?>.style.opacity="0.8";
				touming2<?php echo $i;?>.style.height="180px";
				}
				function H2<?php echo $i;?>(){
				touming2<?php echo $i;?>.innerHTML="<a id='txt'><?php if($row['type']=="1"){ echo '【我有】',$atitle;}else{echo '【我要】',$atitle;}?></a>"
				touming2<?php echo $i;?>.style.opacity="0.5"; 
				touming2<?php echo $i;?>.style.height="40px";
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
			$sql="select * from exchange WHERE title LIKE '%{$search}%' OR content LIKE '%{$search}%'ORDER BY id DESC limit 16,8"; 
			$result=mysql_query($sql);
			$num=mysql_num_rows($result);
			if($num!=0){
			$i=1;
			while($row=mysql_fetch_array($result)){
				$abstract=mb_substr($row['content'],0,40,'utf-8');//摘要
				$atime=mb_substr($row['time'],5,6,'utf-8');//时间摘要
				$atitle=mb_substr($row['title'],0,5,'utf-8');//题目摘要
			?>
				<div id="a<?php echo $i;?>" onmouseover="C3<?php echo $i;?>()" onmouseout="H3<?php echo $i;?>()">
					<img src="img/book/<?php echo $row['file'];?>" id="imga">
					<div id="touming3<?php echo $i;?>">
						<a id="txt"><?php if($row['type']=="1"){echo "【我有】",$atitle;}else{echo "【我要】",$atitle;}?></a>
					</div>
				</div>
				<script>
				function C3<?php echo $i;?>(){
				touming3<?php echo $i;?>.innerHTML="<a id='txt2'><?php echo $abstract,"<br>",$atime,"<br>",$row['contact'];?></a>";
				touming3<?php echo $i;?>.style.opacity="0.8";
				touming3<?php echo $i;?>.style.height="180px";
				}
				function H3<?php echo $i;?>(){
				touming3<?php echo $i;?>.innerHTML="<a id='txt'><?php if($row['type']=="1"){ echo '【我有】',$atitle;}else{echo '【我要】',$atitle;}?></a>"
				touming3<?php echo $i;?>.style.opacity="0.5"; 
				touming3<?php echo $i;?>.style.height="40px";
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
			$sql="select * from exchange WHERE title LIKE '%{$search}%' OR content LIKE '%{$search}%'ORDER BY id DESC limit 24,8"; 
			$result=mysql_query($sql);
			$num=mysql_num_rows($result);
			if($num!=0){
			$i=1;
			while($row=mysql_fetch_array($result)){
				$abstract=mb_substr($row['content'],0,40,'utf-8');//摘要
				$atime=mb_substr($row['time'],5,6,'utf-8');//时间摘要
				$atitle=mb_substr($row['title'],0,5,'utf-8');//题目摘要
			?>
				<div id="a<?php echo $i;?>" onmouseover="C4<?php echo $i;?>()" onmouseout="H4<?php echo $i;?>()">
					<img src="img/book/<?php echo $row['file'];?>" id="imga">
					<div id="touming4<?php echo $i;?>">
						<a id="txt"><?php if($row['type']=="1"){echo "【我有】",$atitle;}else{echo "【我要】",$atitle;}?></a>
					</div>
				</div>
				<script>
				function C4<?php echo $i;?>(){
				touming4<?php echo $i;?>.innerHTML="<a id='txt2'><?php echo $abstract,"<br>",$atime,"<br>",$row['contact'];?></a>";
				touming4<?php echo $i;?>.style.opacity="0.8";
				touming4<?php echo $i;?>.style.height="180px";
				}
				function H4<?php echo $i;?>(){
				touming4<?php echo $i;?>.innerHTML="<a id='txt'><?php if($row['type']=="1"){ echo '【我有】',$atitle;}else{echo '【我要】',$atitle;}?></a>"
				touming4<?php echo $i;?>.style.opacity="0.5"; 
				touming4<?php echo $i;?>.style.height="40px";
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
			$sql="select * from exchange WHERE title LIKE '%{$search}%' OR content LIKE '%{$search}%'ORDER BY id DESC limit 32,8"; 
			$result=mysql_query($sql);
			$num=mysql_num_rows($result);
			if($num!=0){
			$i=1;
			while($row=mysql_fetch_array($result)){
				$abstract=mb_substr($row['content'],0,40,'utf-8');//摘要
				$atime=mb_substr($row['time'],5,6,'utf-8');//时间摘要
				$atitle=mb_substr($row['title'],0,5,'utf-8');//题目摘要
			?>
				<div id="a<?php echo $i;?>" onmouseover="C5<?php echo $i;?>()" onmouseout="H5<?php echo $i;?>()">
					<img src="img/book/<?php echo $row['file'];?>" id="imga">
					<div id="touming5<?php echo $i;?>">
						<a id="txt"><?php if($row['type']=="1"){echo "【我有】",$atitle;}else{echo "【我要】",$atitle;}?></a>
					</div>
				</div>
				<script>
				function C5<?php echo $i;?>(){
				touming5<?php echo $i;?>.innerHTML="<a id='txt2'><?php echo $abstract,"<br>",$atime,"<br>",$row['contact'];?></a>";
				touming5<?php echo $i;?>.style.opacity="0.8";
				touming5<?php echo $i;?>.style.height="180px";
				}
				function H5<?php echo $i;?>(){
				touming5<?php echo $i;?>.innerHTML="<a id='txt'><?php if($row['type']=="1"){ echo '【我有】',$atitle;}else{echo '【我要】',$atitle;}?></a>"
				touming5<?php echo $i;?>.style.opacity="0.5"; 
				touming5<?php echo $i;?>.style.height="40px";
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
		?>
		<div id="NS" onmouseover="N()" onmouseout="N2()" style="position:fixed;right:70px;bottom:40px;">
		<a href="need.php">
		<img src="img/c1.png" id="topostN"/>
		</a>
		</div>
 
		<div id="NS" onmouseover="N3()" onmouseout="N4()" style="position:fixed;right:150px;bottom:40px;">
		<a href="supply.php">
		<img src="img/d1.png" id="topostS"/>
		</a>
		</div>
		<?php
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

	<?php
	if($x==0){
	?>
	<div style="position:relative;left:500px;bottom:250px;font:30px 微软雅黑;color:white">没有您要找的内容~~~~</div>
	<div style="position:absolute;right:500px;top:300px;z-index:8" id="fjsearch">
		<form method="post"  action="BookSearch.php">
			<p>
			<input type="text" id="sInput" name="BookSearch" title="搜索" placeholder="搜索" style="width:400px;height:40px">
			<div onmouseover="Mover2()" onmouseout="Mout2()">
				<input type="image" id="searchSubmit" name="submit" src="../img/searchButton.png" title="搜索"  style="width:40px;height:40px">
			</div>
			</p>
		</form>
	</div>
	<?php
	}
	?>