	<?php
	if(@$_REQUEST['search']!=""){
	?>
	<?php
	$search=@$_REQUEST['search'];
	$sqla="select * from exchange WHERE title LIKE '%{$search}%' OR content LIKE '%{$search}%'ORDER BY id DESC ";
	$resulta=mysql_query($sqla);
	$numa=mysql_num_rows($resulta);

	$sqlb="select * from news WHERE title LIKE '%{$search}%' OR content LIKE '%{$search}%'ORDER BY id DESC ";
	$resultb=mysql_query($sqlb);
	$numb=mysql_num_rows($resultb);	

	$sqlc="select * from share WHERE title LIKE '%{$search}%' OR content LIKE '%{$search}%'ORDER BY id DESC ";
	$resultc=mysql_query($sqlc);
	$numc=mysql_num_rows($resultc);		
	
	$x= ceil(($numa+$numb+$numc)/8);//进1法。用来判断屏幕数的。。。
	$total= $numa+$numb+$numc;
	$i=1;
	?>
	<!-----以上根据搜索所得的记录数量算出屏幕数量------->
	<div id="menucontainer">
		<div id="se2"><div></div></div>
		<div id="ho2"></div>
		<div id="re2"></div>
		<div id="sh2"></div>
		<div id="sets2"></div>			
	</div>
	<div id="clicktohide" style="position:absolute;z-index:-4;width:80%;height:100%;opacity:0" onclick="clickToHide()"></div>
 
 
 	
    <div id="place"  onclick="clickToHide()"> 
		<?php
		$sql="select * from exchange WHERE title LIKE '%{$search}%' OR content LIKE '%{$search}%' ORDER BY id DESC ";
		$result=mysql_query($sql);
		$num=mysql_num_rows($result);
		$y=$num;
		if($num!=0){
		while($row=mysql_fetch_array($result)){
			$abstract=mb_substr($row['content'],0,40,'utf-8');//摘要
			$atime=mb_substr($row['time'],5,6,'utf-8');//时间摘要
			$atitle=mb_substr($row['title'],0,5,'utf-8');//题目摘要
		?>
			
			<?php
			if($i%8==1){//8个一组分屏幕，取mod
			?>
			<div id="button<?php echo ceil($i/8);?>to<?php echo floor($i/8);?>"></div><!--button-->
			<div id="wrapper<?php echo ceil($i/8);?>">
				<div id="layout-fj">
			<?php
			}
			?>
 
				<a href="../exchange/my.php?id=<?php echo $row['id'];?>" target="_blank">
 				
					<div id="a<?php echo $i;?>">
						<img src="../exchange/img/book/<?php echo $row['file'];?>" id="imga">
						<div id="touming<?php echo $i;?>"  onmouseover="C<?php echo $i;?>()" onmouseout="H<?php echo $i;?>()">
							<a id="txt"><?php if($row['type']=="1"){echo "【我有】",$atitle;}else{echo "【我要】",$atitle;}?></a>
						</div>
					</div>
				</a>
				<script>
				function C<?php echo $i;?>(){
				touming<?php echo $i;?>.innerHTML="<a id='txt2'><?php echo $abstract,"<br>",$atime,"<br>",$row['contact'];?></a>";
				touming<?php echo $i;?>.style.opacity="0.8";
				touming<?php echo $i;?>.style.height="190px";
				touming<?php echo $i;?>.style.bottom="200px";
				}
				function H<?php echo $i;?>(){
				touming<?php echo $i;?>.innerHTML="<a id='txt'><?php if($row['type']=="1"){ echo '【我有】',$atitle;}else{echo '【我要】',$atitle;}?></a>"
				touming<?php echo $i;?>.style.opacity="0.5"; 
				touming<?php echo $i;?>.style.height="40px";
				touming<?php echo $i;?>.style.bottom="40px";
				}
				</script> 
					
			<?php
			if($i%8==0){//8个一组分屏幕，到第8、16个时候结束
			?>
				</div><!--end layout-->
			</div><!--end wrapper-->
			<div id="button<?php echo ceil($i/8);?>to<?php echo ceil($i/8)+1;?>"></div><!--button-->
			<?php
			}
			?>
		<?php
			$i++;
			//循环一次则i加1
			} 
		}//endif
		?>
		
		
		<?php
		$sql="select * from news WHERE title LIKE '%{$search}%' OR content LIKE '%{$search}%' ORDER BY id DESC ";
		$result=mysql_query($sql);
		$num=mysql_num_rows($result);
		$z=$num;
		if($num!=0){
		while($row=mysql_fetch_array($result)){
			$abstract=mb_substr($row['content'],0,40,'utf-8');//摘要
			$atime=mb_substr($row['time'],5,6,'utf-8');//时间摘要
			$atitle=mb_substr($row['title'],0,5,'utf-8');//题目摘要
		?>
			
			<?php
			if($i%8==1){//8个一组分屏幕，取mod
			?>
			<div id="button<?php echo ceil($i/8);?>to<?php echo floor($i/8);?>"></div><!--button-->
			<div id="wrapper<?php echo ceil($i/8);?>">
				<div id="layout-fj">
			<?php
			} 
			?>		
				<a href="../news/article.php?id=<?php echo $row['id'];?>" target="_blank">
					<div id="a<?php echo $i;?>">
						<img src="../img/post/<?php echo $row['file'];?>" id="imga">
						<div id="touming<?php echo $i;?>"  onmouseover="C<?php echo $i;?>()" onmouseout="H<?php echo $i;?>()">
							<a id="txt">
								<?php
								if($row['school']=="1"){echo "【华农】";}elseif($row['school']=="2"){echo "【华科】";}elseif($row['school']=="3"){echo "【武大】";}elseif($row['school']=="4"){echo "【华师】";}elseif($row['school']=="5"){echo "【理工】";}elseif($row['school']=="6"){echo "【理工】";}elseif($row['school']=="7"){echo "【财大】";}else{} 
								echo $atitle;
								?>
							</a>
						</div>
					
					</div>
				</a>	
				<script>
				function C<?php echo $i;?>(){
				touming<?php echo $i;?>.innerHTML="<a id='txt2'><?php echo $abstract,"<br>",$atime,"<br>";?></a>";
				touming<?php echo $i;?>.style.opacity="0.8";
				touming<?php echo $i;?>.style.height="190px";
				touming<?php echo $i;?>.style.bottom="200px";
				}
				function H<?php echo $i;?>(){
				touming<?php echo $i;?>.innerHTML="<a id='txt'>	<?php if($row['school']=='1'){echo '【华农】';}elseif($row['school']=='2'){echo '【华科】';}elseif($row['school']=='3'){echo '【武大】';}elseif($row['school']=='4'){echo '【华师】';}elseif($row['school']=='5'){echo '【理工】';}elseif($row['school']=='6'){echo '【理工】';}elseif($row['school']=='7'){echo '【财大】';}else{} echo $atitle;?></a>"
				
			
				touming<?php echo $i;?>.style.opacity="0.5"; 
				touming<?php echo $i;?>.style.height="40px";
				touming<?php echo $i;?>.style.bottom="40px";
				}
				</script> 
					
			<?php
			if($i%8==0){//8个一组分屏幕，到第8、16。。。个时候结束
			?>
				</div><!--end layout-->
			</div><!--end wrapper-->
			<div id="button<?php echo ceil($i/8);?>to<?php echo ceil($i/8)+1;?>"></div><!--button-->
			<?php
			}
			?>
		<?php
			$i++;
			//循环一次则i加1
			} 
		}//endif
		?>



		<?php
		$sql="select * from share WHERE title LIKE '%{$search}%' OR content LIKE '%{$search}%' ORDER BY id DESC ";
		$result=mysql_query($sql);
		$num=mysql_num_rows($result);
		$z=$num;
		if($num!=0){
		while($row=mysql_fetch_array($result)){
			$abstract=mb_substr($row['content'],0,40,'utf-8');//摘要
			$atime=mb_substr($row['time'],5,6,'utf-8');//时间摘要
			$atitle=mb_substr($row['title'],0,5,'utf-8');//题目摘要
			$path_parts = pathinfo($row['file']);//文件信息
		?>
			
			<?php
			if($i%8==1){//8个一组分屏幕，取mod
			?>
			<div id="button<?php echo ceil($i/8);?>to<?php echo floor($i/8);?>"></div><!--button-->
			<div id="wrapper<?php echo ceil($i/8);?>">
				<div id="layout-fj">
			<?php
			}
			?>
				<a href="../sharing/article.php?id=<?php echo $row['id'];?>" target="_blank">
					<div id="a<?php echo $i;?>">
						<?php
						if($row['type']==2){
						?>
							<?php
							//下面根据文件类型确定显示
							if($path_parts['extension']=="doc"||$path_parts['extension']=="docs"){
							?>
								<img src="../sharing/img/w.png" id="imga">
							<?php
							}
							?>
							
							<?php
							if($path_parts['extension']=="ppt"||$path_parts['extension']=="pptx"){
							?>
								<img src="../sharing/img/p.png" id="imga">
							<?php
							}
							?>
							
							<?php
							if($path_parts['extension']=="xls"||$path_parts['extension']=="xlsx"){
							?>
								<img src="../sharing/img/e.png" id="imga">
							<?php
							}
							?>

							<?php
							if($path_parts['extension']=="rar"||$path_parts['extension']=="zip"){
							?>
								<img src="../sharing/img/z.png" id="imga">
							<?php
							}
							?>				
						<?php
						}else{
						?>
						<img src="../img/post/<?php echo $row['file'];?>" id="imga">
						<?php
						}
						?>
						
						<div id="touming<?php echo $i;?>" onmouseover="C<?php echo $i;?>()" onmouseout="H<?php echo $i;?>()">
							<a id='txt'><?php if($row['type']=='1'){echo '【经验】';}elseif($row['type']=='2'){echo '【资源】';}elseif($row['type']=='3'){echo '【趣事】';}else{} echo $atitle;?></a>
						</div>
					</div>
				</a>
				<script>
				function C<?php echo $i;?>(){
				touming<?php echo $i;?>.innerHTML="<a id='txt2'><?php echo $abstract,"<br>",$atime,"<br>";?></a>";
				touming<?php echo $i;?>.style.opacity="0.8";
				touming<?php echo $i;?>.style.height="190px";
				touming<?php echo $i;?>.style.bottom="200px";
				}
				function H<?php echo $i;?>(){
				touming<?php echo $i;?>.innerHTML="	<a id='txt'><?php if($row['type']=='1'){echo '【经验】';}elseif($row['type']=='2'){echo '【资源】';}elseif($row['type']=='3'){echo '【趣事】';}else{} echo $atitle;?></a>"
				touming<?php echo $i;?>.style.opacity="0.5"; 
				touming<?php echo $i;?>.style.height="40px";
				touming<?php echo $i;?>.style.bottom="40px";
				}
				</script> 
					
			<?php
			if($i%8==0){//8个一组分屏幕，到第8、16。。。个时候结束
			?>
				</div><!--end layout-->
			</div><!--end wrapper-->
			<div id="button<?php echo ceil($i/8);?>to<?php echo ceil($i/8)+1;?>"></div><!--button-->
			<?php
			}
			?>
		<?php
			$i++;
			//循环一次则i加1
			} 
		}//endif
		?>

	</div><!-- end place -->
		
		<?php
		if($x==0){
		?>
		<div style="position:relative;left:500px;bottom:300px;font:30px 微软雅黑;color:white">没有您要找的内容~~~~</div>
		<?php
		}
		?>
	<?php
	}else{
	?>
	<script>
	alert('关键词为空！');location.href="index.php";
	</script>
	<?php
	}
	?>