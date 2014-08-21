

<!--下面是隐藏的登录注册界面-------------------------------------------------->   

	<!--隐藏的登录-->
	<div id="floatlog" style="display:block;">

		<div id="trans" onclick="CancelLog()">
		</div>
		
		<div id="logwrapper"  >
			<form id="LogForm" action="../reg/log.php" method="post" onSubmit="return InputCheck(this.name)" autocomplete="on" >
			
				<input id="username" name="username" required="required" type="text" placeholder="请输入您的昵称" />
				<p> &nbsp;<p>&nbsp; <p>

				<input id="password" name="password" required="required" type="password" placeholder="请输入您的密码"/> 
				
				<input id="InputSubmit" type="submit" value="&nbsp;" name="submit" >
				
			</form>
				
			<a id="CancelLog" title="取消" onclick="CancelLog()"/></a>
			<img id="face" src="../img/face.png">
		</div>
		
	</div>

    <!--隐藏的注册-->
	<div id="floatreg" style="display:block;">

		<div id="trans2"  onclick="CancelReg()">
		</div>
		
		<div id="regwrapper"  >
			<form id="RegForm" action="../reg/reg.php" method="post" onSubmit="return InputCheck(this.name)" autocomplete="on" >
			
				<input id="username2" name="username" required="required" type="text" placeholder="请输入昵称（3个字符以上）" />
				<p> &nbsp;<p>&nbsp; <p>
				
				<input id="email" name="email" required="required" type="email" placeholder="请输入您的邮箱地址"/>
				<p> &nbsp;<p>&nbsp; <p>
				
				<input id="password2" name="password" required="required" type="password" placeholder=" 请输入6位以上的密码"/> 
				<p> &nbsp;<p>&nbsp; <p>
				
				<input id="password_confirm" name="repass" required="required" type="password" placeholder="请重新输入密码"/>
				
				<input id="InputSubmit2" type="submit" value="&nbsp;" name="submit" >
				
			</form>
			<a id="CancelReg" title="取消" onclick="CancelReg()"/></a>                        
			               <!--为方便直接使用注册中的cancellog函数-->
			<img id="face2" src="../img/face.png">
		</div>
		
	</div>
	
    <!--下面是修饰注册登录部分的css。经检验，必须以<style>标记的形式反正<head></head>之间或置于正文中。原因不详。-->	
	<style>
    /*下面是log部分*/
		#floatlog{
		   position:absolute;
		   width:100%;
		   height:100%;
		   top:0px;
		   z-index:-8;
		   }	   
		#trans{
			position:absolute;
			top:0%;
			left:0%;
			width:100%;
			height:100%;
			background:#000;
			opacity:0.8;
			}
		#logwrapper{
			position:absolute;
			top:20%;left:10%;width:80%;height:60%;background:#05b5da;
			}
		#InputSubmit{
			position:absolute;
			right:-50%;
			top:32%;
			width:48px;
			height:48px;
			cursor:pointer;
			background:url(../img/go.png)
			}
		#InputSubmit:hover{
			background:url(../img/gohover.png)
			}
		#username,#password{
			width:240px;
			height:35px;
			}
		#username::-webkit-input-placeholder {
			font-family:微软雅黑;
			color:#000; 
			font-size:small;
			}
		#username::-moz-placeholder {
			font-family:微软雅黑;
			color:#000;
			font-size:small;
			}
		#password::-webkit-input-placeholder {
			font-family:微软雅黑;
			color:#000; 
			font-size:small;
			}
		#password::-moz-placeholder {
			font-family:微软雅黑;
			color:#000; 
			font-size:small;
			}
		#CancelLog{
			cursor:pointer;
			position:absolute;
			right:-5px;
			top:-10px;
			width:24px;
			height:24px;
			background:url(../img/cancel.png);
			}
		#CancelLog:hover{
			background:url(../img/cancelhover.png)
			}
		#face{
			position:absolute;
			left:24%;
			top:28%;
			width:160px;
			height:160px;
			border:3px solid #fff
			}
			
     /*下面是reg部分*/
	       #floatreg{
		   position:absolute;
		   width:100%;
		   height:100%;
		   top:0px;
		   z-index:-9;
		   }	   
		#trans2{
			position:absolute;
			top:0%;
			left:0%;
			width:100%;
			height:100%;
			background:#000;
			opacity:0.8;
			}
        #regwrapper{
			position:absolute;
			top:20%;
			left:10%;
			width:80%;
			height:60%;
			background:#05b5da;
			}
		#InputSubmit2{
			position:absolute;
			right:-50%;
			top:32%;
			width:48px;
			height:48px;
			cursor:pointer;
			background:url(../img/go.png)
			}
		#InputSubmit2:hover{
			background:url(../img/gohover.png)
			}
		#username2,#password2,#email,#password_confirm{
			width:240px;
			height:35px;
			}
		#username2::-webkit-input-placeholder {
			font-family:微软雅黑;
			color:#000; 
			font-size:small;
			}
		#username2::-moz-placeholder {
			font-family:微软雅黑;
			color:#000;
			font-size:small;
			}
		#email::-webkit-input-placeholder {
			font-family:微软雅黑;
			color:#000; 
			font-size:small;
			}
		#email::-moz-placeholder {
			font-family:微软雅黑;
			color:#000;
			font-size:small;
			}
		#password2::-webkit-input-placeholder {
			font-family:微软雅黑;
			color:#000; 
			font-size:small;
			}
		#password2::-moz-placeholder {
			font-family:微软雅黑;
			color:#000; 
			font-size:small;
			}
		#password_confirm::-webkit-input-placeholder {
			font-family:微软雅黑;
			color:#000; 
			font-size:small;
			}
		#password_confirm::-moz-placeholder {
			font-family:微软雅黑;
			color:#000; 
			font-size:small;
			}
		#CancelReg{
			cursor:pointer;
			position:absolute;
			right:-5px;
			top:-10px;
			width:24px;
			height:24px;
			background:url(../img/cancel.png);
			}
		#CancelReg:hover{
			background:url(../img/cancelhover.png)
			}
		#face2{
			position:absolute;
			left:24%;
			top:28%;
			width:160px;
			height:160px;
			border:3px solid #fff
			}
	</style>
	
	<!--用来保证上面表单位置的jquery代码-->
	<script>
	(function($){ 
	$.fn.center = function(){ 
	var top = ($(window).height() - this.height())/4; 
	var left = ($(window).width() - this.width())*1.8; 
	var scrollTop = $(document).scrollTop(); 
	var scrollLeft = $(document).scrollLeft(); 
	return this.css( { position : 'absolute', 'top' : top + scrollTop, left : left + scrollLeft } ).show(); 
	} 
	})(jQuery) 
	$('#LogForm').center();
	
	(function($){ 
	$.fn.center2 = function(){ 
	var top2 = ($(window).height() - this.height())/6; 
	var left2 = ($(window).width() - this.width())*1.8; 
	var scrollTop2 = $(document).scrollTop(); 
	var scrollLeft2 = $(document).scrollLeft(); 
	return this.css( { position : 'absolute', 'top' : top2 + scrollTop2, left : left2 + scrollLeft2 } ).show(); 
	} 
	})(jQuery) 
	$('#RegForm').center2();
	</script>
