<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>编辑个人资料</title>
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
	include('conn.php');
	$username=$_SESSION['username'];
	$type=array("jpg","gif","bmp","jpeg","png"); 
	$uploaddir = "../img/mypic/"; 
	if(isset($_POST['submit'])){
		function texttype($name){ 
			return substr(strrchr($name,'.'),1); 
			} 
		if(in_array(strtolower(texttype($_FILES['userfile']['name'])),$type)){ 
				//$text=implode(".",$type); 
				//echo "您只能上传以下类型文件: ",$text,"<br>"; 
				//}else{ 
				if($_FILES['userfile']['size']<="200000") { 
					$filename=explode(".",$_FILES['userfile']['name']); //把上传的文件名以“.”好为准做一个数组。 
					$time=date("m-d-H-i-s"); //去当前上传的时间 
					$filename[0]=$time; //取文件名t替换 
					$name=implode(".",$filename); //上传后的文件名 
					$uploadfile=$uploaddir.$name; //上传后的文件名地址 
					if(move_uploaded_file($_FILES['userfile']['tmp_name'],$uploadfile)) { 
					$sql="UPDATE user SET  pic='{$name}' WHERE username='{$username}'";
					$result=mysql_query($sql);
					}else{ 
						echo"<script>alert('传输失败!');</script>"; 
						} 
				}else{ 
					echo "<script>alert('图片太大!');</script>"; 
				} 
			} 
		if(@$_REQUEST['gender']!=""){
			$sql2="UPDATE user SET gender = '$_REQUEST[gender]' WHERE username='{$username}'";	
			$result2=mysql_query($sql2);
		}
		if(@$_REQUEST['contact']!=""){
			$sql3="UPDATE user SET contact = '$_REQUEST[contact]' WHERE username='{$username}'";	
			$result3=mysql_query($sql3);
		}
		if(@$_REQUEST['school']!=""){
			$sql4="UPDATE user SET school = '$_REQUEST[school]' WHERE username='{$username}'";	
			$result4=mysql_query($sql4);
		}
		if(@$_REQUEST['school2']!=""){
			$sql="UPDATE user SET school2 = '$_REQUEST[school2]' WHERE username='{$username}'";	
			$result=mysql_query($sql);
		}
		if(@$_REQUEST['major']!=""){
			$sql6="UPDATE user SET major = '$_REQUEST[major]' WHERE username='{$username}'";	
			$result6=mysql_query($sql6);
		}
		if(@$_REQUEST['major2']!=""){
			$sql7="UPDATE user SET major2 = '$_REQUEST[major2]' WHERE username='{$username}'";	
			$result7=mysql_query($sql7);
		}

		?>
		
		<div class='progress large' id='loading'></div>
		<div style='position:absolute;left:30%;top:45%;z-index:7;'>
			<a style='color:white;font-size:30px;font-family:微软雅黑'>
				已成功修改资料！正在返回个人主页。。。
			</a>
		</div>
		<?php
			echo "<script>location.href='my.php?username=$username';</script>";
			exit;
		}
		?>

</body>
</html>


 
