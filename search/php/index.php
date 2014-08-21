 
<form action="search.php" method="post" id="searchform" onclick="clickToHide()">
	<input type="text" name="search" id="inputwords" placeholder="请在此输入关键词">
	<input type="image" id="mysearch" name="submit" src="img/search.png" title="搜索" onmouseover="Over()" onmouseout="Out()">
	<div id="notice">
	亲，在我们的网站中将鼠标指到右侧也能找到搜索框哦~~~~
	</div>
</form>

<script>
function Over(){
document.getElementById('mysearch').src ="img/searchhover.png";
}	
function Out(){
document.getElementById('mysearch').src ="img/search.png"
}			
</script>
<style>
#searchform{
position:relative;
float:left;
width:550px;
height:100px;
}
#inputwords{
width:500px;
height:50px;
position:relative;
float:left;
}
#mysearch{
width:50px;
position:relative;
float:left;
height:50px;
}

#inputwords::-webkit-input-placeholder,{
font-family:微软雅黑;
color:#000; 
font-size:18px;
}
#inputwords::-moz-placeholder {
font-family:微软雅黑;
color:#000;
font-size:18px;
text-align:left;
}

#notice{
font:20px 微软雅黑;
color:white;
float:right;
position:relative;
top:30px;
}
</style>
<script>
(function($){ 
$.fn.newscenter = function(){ 
this.css("position","absolute");  
this.css("top", (($(window).height())/2 -(this.height())/2)+100 + "px");  
this.css("left", ( $(window).width() - this.width()) / 2 + "px");  
return this;  
} 
})(jQuery) 
$('#searchform').newscenter();
</script>

	