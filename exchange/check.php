<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
	<style>
		@keyframes spin {
			to { transform: rotate(1turn); }
			}
		.progress {
			position: relative;
			display: inline-block;
			width: 5em;
			height: 5em;
			margin: 0 .5em;
			font-size: 12px;
			overflow: hidden;
			animation: spin 1s infinite steps(8);
			}
		 
		.large.progress {
			font-size: 32px;
			}

		.progress:before,
		.progress:after,
		.progress > div:before,
		.progress > div:after {
			content: '';
			position: absolute;
			top: 0;
			left: 2.25em; /* (container width - part width)/2  */
			width: .5em;
			height: 1.5em;
			border-radius: .2em;
			background: #05b5da;
			box-shadow: 0 3.5em #eee; /* container height - part height */
			transform-origin: 50% 2.5em; /* container height / 2 */
			}

		.progress:before {
			background: #151515;
			}

		.progress:after {
			transform: rotate(-45deg);
			background: #202020;
			}

		.progress > div:before {
			transform: rotate(-90deg);
			background: #05b5da;
			}
		.progress > div:after {
			transform: rotate(-135deg);
			background: #4dd586;
			}
		#loading{
			position:absolute;
			left:40%;
			top:340px;
			z-index:5
			}
		body{background-image:url(../img/bg.jpg)}
	</style>
</head>
<body>

	<?php
	session_start();
	include('../reg/conn.php');
	if(isset($_POST['submit'])){
	?>
	<?php
	$book=$_REQUEST['book'];//标题
	$description=$_REQUEST['description'];//正文
	$contact=$_REQUEST['contact'];//联系
	
	$username=$_SESSION['username'];//当前用户名
	$filetype=array("jpg","gif","bmp","jpeg","png"); //文件类型
	$uploaddir = "img/book/"; //上传文件夹 
	//上传文件
	function texttype($name){ 
		return substr(strrchr($name,'.'),1); 
		} 
	if(in_array(strtolower(texttype($_FILES['a_file']['name'])),$filetype)){ 
		if($_FILES['a_file']['size']<="900000000") { 
			$filename=explode(".",$_FILES['a_file']['name']); //把上传的文件名以“.”好为准做一个数组。 
			$time=date("m-d-H-i-s"); //当前上传的时间 
			$filename[0]=$time; //取文件名t替换 
			$name=implode(".",$filename); //上传后的文件名 
			$uploadfile=$uploaddir.$name; //上传后的文件名地址 
			if(move_uploaded_file($_FILES['a_file']['tmp_name'],$uploadfile)){ 
			?>
			<?php	 
				$sql="insert into exchange(username,title,content,time,file,contact,type) values('$_SESSION[username]','{$book}','{$description}',now(),'{$name}','{$contact}','1')";
				$result=mysql_query($sql);//数据库查询的结果存入到变量$result中
				$rc = mysql_affected_rows();
				} 	 
			} 
		}
	?>	

 	<?php
	$book1=$_REQUEST['book1'];//标题
	$description1=$_REQUEST['description1'];//正文
	$contact1=$_REQUEST['contact1'];//联系
 
	$username=$_SESSION['username'];//当前用户名
	$filetype=array("jpg","gif","bmp","jpeg","png"); //文件类型
	$uploaddir = "img/book/"; //上传文件夹 
	//上传文件
	if(in_array(strtolower(texttype($_FILES['a_file1']['name'])),$filetype)){ 
		if($_FILES['a_file']['size']<="900000000") { 
			$filename=explode(".",$_FILES['a_file1']['name']); //把上传的文件名以“.”好为准做一个数组。 
			$time=date("m.d.H.i.s"); //当前上传的时间 
			$filename[0]=$time; //取文件名t替换 
			$name=implode(".",$filename); //上传后的文件名 
			$uploadfile=$uploaddir.$name; //上传后的文件名地址 
			if(move_uploaded_file($_FILES['a_file1']['tmp_name'],$uploadfile)){ 
			?>
			<?php	 
				$sql="insert into exchange(username,title,content,time,file,contact,type) values('$_SESSION[username]','{$book1}','{$description1}',now(),'{$name}','{$contact1}','1')";
				$result=mysql_query($sql);//数据库查询的结果存入到变量$result中
				$rc = mysql_affected_rows();
				} 
			} 	 
		} 
	?>	

	<?php
	$book2=$_REQUEST['book2'];//标题
	$description2=$_REQUEST['description2'];//正文
	$contact2=$_REQUEST['contact2'];//联系
 
	$username=$_SESSION['username'];//当前用户名
	$filetype=array("jpg","gif","bmp","jpeg","png"); //文件类型
	$uploaddir = "img/book/"; //上传文件夹 
	//上传文件
	if(in_array(strtolower(texttype($_FILES['a_file2']['name'])),$filetype)){ 
		if($_FILES['a_file']['size']<="900000000") { 
			$filename=explode(".",$_FILES['a_file2']['name']); //把上传的文件名以“.”好为准做一个数组。 
			$time=date("m-d-H-i.s"); //当前上传的时间 
			$filename[0]=$time; //取文件名t替换 
			$name=implode(".",$filename); //上传后的文件名 
			$uploadfile=$uploaddir.$name; //上传后的文件名地址 
			if(move_uploaded_file($_FILES['a_file2']['tmp_name'],$uploadfile)){ 
			?>
			<?php	 
				$sql="insert into exchange(username,title,content,time,file,contact,type) values('$_SESSION[username]','{$book2}','{$description2}',now(),'{$name}','{$contact2}','1')";
				$result=mysql_query($sql);//数据库查询的结果存入到变量$result中
				$rc = mysql_affected_rows();

				} 
			} 	 
		} 
	?>
	

	<div class='progress large' id='loading'></div>
	<div style='position:absolute;left:32%;top:45%;z-index:7;'>
		<a style='color:white;font-size:30px;font-family:微软雅黑'>
			正在返回原来页面。。。。	
		</a>
	</div>

	<?php
	echo "<script>history.back(-3);</script>";
	}else{
	?>
	<div class='progress large' id='loading'></div>
	<div style='position:absolute;left:32%;top:45%;z-index:7;'>
		<a style='color:white;font-size:30px;font-family:微软雅黑'>
			非法登录！！！！！！	
		</a>
	</div>
	<?php
	echo "<script>history.back(-3);</script>";
		}
	?>	
</body>
</html>
 