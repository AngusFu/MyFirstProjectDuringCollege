<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>    
<head>
	<?php 
	session_start();
	?>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>完善个人信息</title>
    <!--链接css&js-->  	
    <?php require_once("../php/cssjslink2.php");
	?> 
	
	<!--Kissy-->
	<script src="http://a.tbcdn.cn/s/kissy/1.3.0/kissy-min.js" charset="utf-8"></script>
    <script type="text/javascript">
        var S = KISSY;
        if (S.Config.debug) {
            var srcPath = "../../../";
            S.config({
                packages: [
                    {
                        name:"gallery",
                        path:srcPath,
                        charset:"utf-8",
                        ignorePackageNameInUri:true
                    }
                ]
            });
        }
    </script>
	
	
</head>

<body onload="detectBrowser()">

<!--HEADER-->  	
    <?php require_once("../php/header3.php");
	?>  
	
	<?php
	//检测是否登录，若没登录则自动返回
	if(!isset($_SESSION['userid'])){
	echo "<script>history.back(-1)</script>";
	exit();
	}
	
	//包含数据库连接文件
	include('conn.php');
	$userid = $_SESSION['userid'];
	$username = $_SESSION['username'];
	$user_query = mysql_query("select * from user where uid= '$userid' limit 1");
	$row = mysql_fetch_array($user_query);
	$file=$row['pic'];//头像
	?>
	
	<!--更改信息-->
    	<form id="EditForm" action="edit_check.php" enctype="multipart/form-data" method="POST" onSubmit="return InputCheck(this.name)" autocomplete="on">
		    <div>
				<img <?php 
					 if($file!=NULL){echo "src='../img/mypic/$file' id='editpic'";}
					 else{echo "src='../img/defaultpic.png' id='editpic'";}
					?>/>	
					
				<div>
				    <input type="hidden" name="max_file_size" value="200000" />
					<input  id="fileup" type="file" name="userfile" value="更换头像"/>	
				</div>
				
				<div id="editpictxt">点击图片以更换头像</div>
				
			</div>
			
			<div id="myinfo">	 
				请输入您的性别：
				<input type="radio" id="gender" name="gender" value="男">男&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="radio" id="gender" name="gender" value="女">女&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="radio" id="gender" name="gender" value="无">暂不填写
				<p> &nbsp;<p>	
				
				<div id="lianxi">
				请填写联系方式： 
				<input type="text" id="tel" name="contact" placeholder="如email123@sj.com">
				<p> &nbsp;<p>	
				</div>
				
				<div>
				请选择所在学校： 	
				<select id="school" name="school" placeholder="请您选择所在学校"> 
					<option value="<?php if($row['school']!=""){echo $row['school'];}else{echo "暂不填写";}?>">
						<?php
						if($row['school']!=""){
							echo $row['school'];
						}else{
						echo "暂不公开";
						}
						?>
					</option>
					<option value="华中科技大学">华中科技大学</option>
					<option value="华中农业大学">华中农业大学</option>
					<option value="华中师范大学">华中师范大学</option>
					<option value="武汉大学">武汉大学</option>
					<option value="武汉理工大学">武汉理工大学</option>
					<option value="中国地质大学（武汉）">中国地质大学（武汉）</option>
					<option value="中南财经政法大学">中南财经政法大学</option>
				</select>
				<p> &nbsp;<p>
				</div>
				
				<div>
				双学位所属学校： 	
				<select id="school2" name="school2" placeholder="选择双学位学校"> 
					<option value="<?php if($row['school2']!=""){echo $row['school2'];}else{echo "暂不填写";}?>">
						<?php
						if($row['school2']!=""){
							echo $row['school2'];
						}else{
						echo "暂不公开";
						}
						?>
					</option>
					<option value="华中科技大学">华中科技大学</option>
					<option value="华中农业大学">华中农业大学</option>
					<option value="华中师范大学">华中师范大学</option>
					<option value="武汉大学">武汉大学</option>
					<option value="武汉理工大学">武汉理工大学</option>
					<option value="中国地质大学（武汉）">中国地质大学（武汉）</option>
					<option value="中南财经政法大学">中南财经政法大学</option>
				</select>
				<p> &nbsp;<p>
				</div>
				
				<div>
				请输入主修专业：
				<input type="text" id="major"  name="major" placeholder="选择您主修专业">
				<p> &nbsp;<p>
				</div>
				
				<div>
				请输入第二专业：
				<input type="text"  id="major2" name="major2" placeholder="填写您所修双学位专业">
				<p> &nbsp;<p>
				</div>			
				<input type="hidden" name="username" value="<?php echo $_SESSION['username'];?>" /><!--记录用户名-->
				
				<input type="submit" id="InputSubmit4" name="submit" value="" title="提交"/>
				
			</div>
			   
		</form>
	
        <style>
			form div {font-family:微软雅黑;color:#fff}
			#tel,#major,#major2{
				height:20px;
				width:160px;
				}	
			#tel::-webkit-input-placeholder,
			#major::-webkit-input-placeholder,
			#major2::-webkit-input-placeholder, 
			#picbutton::-webkit-input-placeholder,{
				font-family:微软雅黑;
				color:#000; 
				font-size:small;
				}
			 		
			#tel::-moz-placeholder,	
			#major::-moz-placeholder,
			#major2::-moz-placeholder, 
			#picbutton::-moz-placeholder {
				font-family:微软雅黑;
				color:#000;
				font-size:small;
				text-align:center;
				}
			#InputSubmit4{
				position:absolute;
				right:10%;
				top:100%;
				width:48px;
				height:48px;
				cursor:pointer;
				background:url(../img/go2.png)
				}
			#InputSubmit4:hover{
				background:url(../img/go.png)
				}
 
			#EditForm div div input,form div select{
				padding:10px;
				background:#FC9; 
				-moz-border-radius:10px;
				-webkit-border-radius:10px;
				border-radius:10px;
			   }
		    #tel,#school,#school2,#major,#major2{
				font-family:微软雅黑;
				color:#755e46;
				font-size:small;
			   }
			#school,#school2{
			   width:180px;
			   }
			#myinfo{
			   position:absolute;
			   left:50%;
			   top:25%;
			   }		
			#editpic{
				position:absolute;
				right:55%;
				top:26%;
				width:280px;
				height:280px;
				border:2px solid black;
				cursor:pointer;
				}	
			#editpictxt{
				position:absolute;
				right:59%;
				top:78%;
				font-family:微软雅黑;
				font-size:x-large;
				}	
			#fileup{
			    position:absolute;
				right:55%;
				top:26%;
				width:280px;
				height:280px;
				cursor:pointer;
				opacity:0;
				}		
		</style>
 
		<script>
			S.use('gallery/autocomplete/1.2/multiple', function (S, Multiple) {
			
				var unis = {
					unis: [{
						name: '法学',
					},{
						name: '经济学',
					},{
						name: '市场营销',
					},{
						name: '工商管理',
					},{
						name: '国际经济与贸易',
					},{
						name: '工程管理',
					},{
						name: '会计学',
					},{
						name: '金融学',
					},{
						name: '新闻学',
					},{
						name: '广告学',
					},{
						name: '计算机科学与技术',
					},{
						name: '药学',
					},{
						name: '法语',
					},{
						name: '英语',
					},{
						name: '日语',
					},{
						name: '德语',
					},{
						name: '翻译',
					},{
						name: '编辑出版学',
					},{
						name: '图书馆学',
					},{
						name: '电子商务',
					},{
						name: '信息管理与信息系统',
					},]
				};

				var node = '#major';
				var multipleComp = new Multiple(node, {
					source: unis,
					resultTextLocator: 'name',//指定文本内容
					activeFirstItem  : false,
					inputLimit: true,       //指定是否限制只能输入下拉列表中的项
					resultListLocator: function(results){
						var ret = [];
						var query = S.trim(this.get('value'));
						var reg = new RegExp(query, 'gi');
						S.each(results['unis'], function(_item){
							if(_item.name.match(reg)){
								ret.push(S.clone(_item));
							}
						});
						return ret;
					},//过滤结果
					resultFormatter  : function (query, results) {//对下拉展示进行格式化
						var result = [];
						var tpl = '<span class="ks-ac-name">{name}</span>';
						S.each(results, function(_item){
							result.push(S.substitute(tpl, {
								name: _item.raw.name,
							}));
						});
						return result;
					},
					insertFormatter: function(results){
						var result = [];
						S.each(results, function(_item){
							result.push(S.substitute(tpl, {
								name: _item.raw.name,
							}));
						});
						return result;
					}
				});
				
				var node2 = '#major2';
				var multipleComp = new Multiple(node2, {
					source: unis,
					resultTextLocator: 'name',//指定文本内容
					activeFirstItem  : false,
					inputLimit: true,       //指定是否限制只能输入下拉列表中的项
					resultListLocator: function(results){
						var ret = [];
						var query = S.trim(this.get('value'));
						var reg = new RegExp(query, 'gi');
						S.each(results['unis'], function(_item){
							if(_item.name.match(reg)){
								ret.push(S.clone(_item));
							}
						});
						return ret;
					},//过滤结果
					resultFormatter  : function (query, results) {//对下拉展示进行格式化
						var result = [];
						var tpl = '<span class="ks-ac-name">{name}</span>';
						S.each(results, function(_item){
							result.push(S.substitute(tpl, {
								name: _item.raw.name,
							}));
						});
						return result;
					},
					insertFormatter: function(results){
						var result = [];
						S.each(results, function(_item){
							result.push(S.substitute(tpl, {
								name: _item.raw.name,
							}));
						});
						return result;
					}
				});
			});
		</script>
 
<!--背景工具-->  	
    <?php require_once("../php/bgtools2.php");
	?>   
<!--右侧浮动菜单-->  	
    <?php require_once("../php/menu2.php");
	?>   
<!--隐藏的登录注册页面-->  	
	<?php require_once("../php/reg&log2.php");
	?>   
<!--隐藏的分享-->  	
	<?php require_once("../php/share2.php");
	?>   	
</body>
</html>    
