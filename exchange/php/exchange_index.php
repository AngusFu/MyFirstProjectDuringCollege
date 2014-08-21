<div id="mycontainer">
	<div id="indexbook">
		<img src="img/book.png" id="book">
	</div><!--book-->

	<div id="toneed" onmouseover="Need()" onmouseout="Need2()">
		<a href="exchange.php?type=2"><img src="img/a1.png" id="needbook"></a>
	</div><!--to need-->

	<div id="tosupply" onmouseover="Supply()" onmouseout="Supply2()">
		<a href="exchange.php?type=1"><img src="img/b1.png" id="supplybook"></a>
	</div><!--to supply-->

	
	<form action="BookSearch.php" method="post">
			<input type="text" name="BookSearch" id="inputwords" placeholder="请在此输入您要找的书名或关键词">
			<input type="image" id="mysearch" name="submit" src="img/search.png" title="搜索" onmouseover="Over()" onmouseout="Out()">
	</form>
	
	
</div>

<script>
function Over(){
document.getElementById('mysearch').src ="img/searchhover.png";
}	
function Out(){
document.getElementById('mysearch').src ="img/search.png"
}	
function Need(){
document.getElementById('needbook').src ="img/a2.png"
}	
function Need2(){
document.getElementById('needbook').src ="img/a1.png"
}	
function Supply(){
document.getElementById('supplybook').src ="img/b2.png"
}	
function Supply2(){
document.getElementById('supplybook').src ="img/b1.png"
}			
</script>
<style>
#indexbook{
float:left;
position:relative;
}
#toneed,#tosupply{
float:left;
position:relative;
cursor:pointer;
top:100px;
}

#inputwords{
width:500px;
height:50px;
position:relative;
top:60px;
left:80px;
}
 
#mysearch{
width:50px;
position:relative;
top:80px;
left:60px;
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
</style>
<script>
(function($){ 
$.fn.newscenter = function(){ 
this.css("position","absolute");  
this.css("top", (($(window).height())/2 -(this.height())/2) + "px");  
this.css("left", ( $(window).width() - this.width()) / 2 + "px");  
return this;  
} 
})(jQuery) 
$('#mycontainer').newscenter();
</script>

	