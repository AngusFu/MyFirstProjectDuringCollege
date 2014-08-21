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
	$title=$_REQUEST['title'];//标题
	$content=$_REQUEST['content'];//正文
	$type=$_REQUEST['type'];//信息类型
	$username=$_SESSION['username'];//当前用户名
	$scl=$_REQUEST['scltype'];//学校
	
	$pictype=array("jpg","gif","bmp","jpeg","png"); //文件类型
	$uploaddir = "../img/post/"; //上传文件夹
	
	//先判断内容是否都填写了。。。（不含图片）
	if($username==""){
		echo "<script>alert('请登录！');history.go(-1);</script>";
		exit;
		}	
	if($title==""){
		echo "<script>alert('请输入标题！');history.go(-1);</script>";
		exit;
		}
	if($content==""){
		echo "<script>alert('请输入正文！');history.go(-1);</script>";
		exit;
		}
	if($type==""){
		echo "<script>alert('请选择文章类型！');history.go(-1);</script>";
		exit;
		}
	if($scl==""){
		echo "<script>alert('请选择相关学校！');history.go(-1);</script>";
		exit;
		}
		
	//上传文件
	if(isset($_POST['submit'])){
		function texttype($name){ 
			return substr(strrchr($name,'.'),1); 
			} 
		if(!in_array(strtolower(texttype($_FILES['a_file']['name'])),$pictype)){ 
				$text=implode(".",$pictype); 
				echo "只能上传以下类型的文件: ",$text,"<br>"; 
			}else{ 
			if($_FILES['a_file']['size']<="200000") { 
				$filename=explode(".",$_FILES['a_file']['name']); //把上传的文件名以“.”好为准做一个数组。 
				$time=date("m-d-H-i-s"); //当前上传的时间 
				$filename[0]=$time; //取文件名t替换 
				$name=implode(".",$filename); //上传后的文件名 
				$uploadfile=$uploaddir.$name; //上传后的文件名地址 
				if(move_uploaded_file($_FILES['a_file']['tmp_name'],$uploadfile)) { 
				 // echo"<script>alert('上传完毕!');</script>";
				}else{ 
					echo"<script>alert('图片传输失败!');history.go(-1);"; 
					} 
				}else{ 
				echo "<script>alert('图片太大!');history.go(-1);"; 
				} 
			} 
		}  	
	
	//判断信息类型,据此填入不同表
	if($type == "1" ){
		$sql="insert into news(username,title,content,time,school,file) values('$_SESSION[username]','{$title}','{$content}',now(),'{$scl}','{$name}')";
		}
	if($type == "2" ){
		$sql="insert into share(username,title,content,time,school,file) values('$_SESSION[username]','{$title}','{$content}',now(),'{$scl}','{$name}')";
		}
	if($type == "3" ){
		$sql="insert into exchange(username,title,content,time,school,file) values('$_SESSION[username]','{$title}','{$content}',now(),'{$scl}','{$name}')";
		}
		
	/////////////////
	$result=mysql_query($sql);//数据库查询的结果存入到变量$result中
	$rc = mysql_affected_rows();
	if($result && $rc){
	?>
		<div class='progress large' id='loading'></div>
		<div style='position:absolute;left:30%;top:45%;z-index:7;'>
			<a style='color:white;font-size:30px;font-family:微软雅黑'>
				哈哈日志成功啦！正在回个人主页~~~
			</a>
		</div>
		<?php 
		echo "<script>location.href='../reg/my.php?username=$username';</script>";		 
		exit;
		?>
		<?php
		}else{
		?>
			<div class='progress large' id='loading'></div>
			<div style='position:absolute;left:32%;top:45%;z-index:7;'>
				<a style='color:white;font-size:30px;font-family:微软雅黑'>
					好吧，日志发表失败！请返回重新输入。。。	
				</a>
			</div>

			<?php
			echo "<script>location.href='index.php?username=$username';</script>";
			exit;
		}	
		?>	
</body>
</html>
 