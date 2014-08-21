
	$(window).load(function(){
	//flip mode simple
	//using data attributes
	$(".live-tile").liveTile();
	// jQuery UI 
	// http://jqueryui.com/sortable/#display-grid
	$( ".tiles" ).sortable();
	$( ".tiles" ).disableSelection();
	});//]]>  
	
/*以上和主页色块拖动（Draggable）相关代码*/


	function detectBrowser(){
	var browser=navigator.appName
	if ( browser=="Microsoft Internet Explorer"){
		alert("提示：建议您使用Firefox或Chrome浏览器浏览本网页！");
		location.href="http://www.firefox.com.cn/";
		}
	}

/*以上浏览器检测*/

	
/*以下右侧menuHover动作（鼠标指上去之后图片替换）*/
	function mouseOver1()
	{
	document.getElementById('se').src ="img/rightmenu/_search.png"
	}
	function mouseOut1()
	{
	document.getElementById('se').src ="img/rightmenu/search.png"
	}

	function mouseOver2()
	{
	document.getElementById('ho').src ="img/rightmenu/_home.png"
	}
	function mouseOut2()
	{
	document.getElementById('ho').src ="img/rightmenu/home.png"
	}

	function mouseOver3()
	{
	document.getElementById('re').src ="img/rightmenu/_news.png"
	}
	function mouseOut3()
	{
	document.getElementById('re').src ="img/rightmenu/news.png"
	}

	function mouseOver4()
	{
	document.getElementById('sh').src ="img/rightmenu/_share.png"
	}
	function mouseOut4()
	{
	document.getElementById('sh').src ="img/rightmenu/share.png"
	}

	function mouseOver5()
	{
	document.getElementById('sets').src ="img/rightmenu/_sharing.png"
	}
	function mouseOut5()
	{
	document.getElementById('sets').src ="img/rightmenu/sharing.png"
	}


	function mouseOver6()
	{
	document.getElementById('ex').src ="img/rightmenu/_exchange.png"
	}
	function mouseOut6()
	{
	document.getElementById('ex').src ="img/rightmenu/exchange.png"
	}

/*以上右侧menuHover动作（鼠标指上去之后图片替换）*/


/*以下右侧menuClick动作（鼠标点击弹出或跳转）*/
	function Click1()
	{
	document.getElementById('se2').style.display ="block"
	}
    function Cancel(){
	document.getElementById('se2').style.display ="none"
	}

	function Click5(){	
	document.getElementById('sets2').style.display ="block"
	}
    function Cancel5(){
	document.getElementById('sets2').style.display ="none"
	}	
	
	function Mover(){
	document.getElementById('searchCancel').src ="img/scancelhover.png";
	}	
	function Mout(){
	document.getElementById('searchCancel').src ="img/scancel.png"
	}	
	
	function Mover2(){
	document.getElementById('searchSubmit').src ="img/searchButtonHover.png";
	}	
	function Mout2(){
	document.getElementById('searchSubmit').src ="img/searchButton.png"
	}	

/*以上右侧menuClick动作（鼠标点击弹出或跳转）*/

/*以上右侧各种弹出效果*/
	function show(){
	document.getElementById("sch").style.zIndex="4";
	document.getElementById("home").style.zIndex="4";
	document.getElementById("reg").style.zIndex="4";
	document.getElementById("share").style.zIndex="4";
	document.getElementById("set").style.zIndex="4";
    document.getElementById("blank1").style.zIndex="3";
    document.getElementById("exchange").style.zIndex="4";
	}
	function hide(){
    document.getElementById("sch").style.zIndex="-4";
	document.getElementById("home").style.zIndex="-4";
	document.getElementById("reg").style.zIndex="-4";
	document.getElementById("share").style.zIndex="-4";
	document.getElementById("set").style.zIndex="-4";
	document.getElementById("blank1").style.zIndex="-4";
	document.getElementById("exchange").style.zIndex="-4";
	}
	function clickToHide(){
	document.getElementById("sets2").style.display ="none";
	document.getElementById("se2").style.display ="none";
	/*上两个隐藏弹出的搜索或改色*/
	document.getElementById("userinfomenu").style.display ="none";
	document.getElementById("userinfobg").style.display ="none";
	    //控制header.php中用户点击图像之后弹出菜单的消失隐藏。。。
	}
	
/*以上右侧浮动菜单代码(和下面的并用)*/



/*	function menu(){
		if(document.getElementById("bar1").style.left < "0px"){
		document.getElementById("bar1").style.left= "0px";
		document.getElementById("bar2").style.left= "180px";
		}else{
		document.getElementById("bar1").style.left= "-180px";
		document.getElementById("bar2").style.left= "0px";
		}
	}

/*以上和左侧点击弹出菜单相关代码*/


	function chg(col){
	document.getElementById("beijingse").style.background = col ;
	}

	function CBG(){
	document.getElementById("beijingse").style.background = "url(img/bg.jpg)" ;
	}

	function CBG2(){
	document.getElementById("beijingse").style.background = "url(img/bg2.jpg)" ;
	}
	
	function CBG3(){
	document.getElementById("beijingse").style.background = "url(img/bg3.jpg)" ;
	}

	function CBG4(){
	document.getElementById("beijingse").style.background = "url(img/bg4.jpg)" ;
	}
	
	function CBG5(){
	document.getElementById("beijingse").style.background = "url(img/bg5.jpg)" ;
	}

	function CBG6(){
	document.getElementById("beijingse").style.background = "url(img/bg6.jpg)" ;
	}
	
	function CBG7(){
	document.getElementById("beijingse").style.background = "url(img/bg7.jpg)" ;
	}
	
	function CBG8(){
	document.getElementById("beijingse").style.background = "url(img/bg8.jpg)" ;
	}
	
	function CBG9(){
	document.getElementById("beijingse").style.background = "url(img/bg9.jpg)" ;
	}

	function CBG10(){
	document.getElementById("beijingse").style.background = "url(img/bg10.jpg)" ;
	}
	
 	function CBG11(){
	document.getElementById("beijingse").style.background  = "url(img/bg11.jpg)" ;
	}

	function CBG12(){
	document.getElementById("beijingse").style.background = "url(img/bg12.jpg)" ;
	}
 
/*以上和改变背景色相关代码*/	

/*以下和注册、登陆界面弹出相关代码*/	

function LogFloat(){
	document.getElementById("floatlog").style.zIndex ="8";
	document.getElementById("floatlog").style.display ="block";
    }
function CancelLog(){
	document.getElementById("floatlog").style.zIndex ="-8";
	}

function RegFloat(){
	document.getElementById("floatreg").style.zIndex ="9";
	document.getElementById("floatreg").style.display ="block";
    }	
function CancelReg(){
	document.getElementById("floatreg").style.zIndex ="-9";
	}
	
function ShareFloat(){
	document.getElementById("floatshare").style.zIndex ="8";
	document.getElementById("floatshare").style.display ="block";
    }
function CancelShare(){
	document.getElementById("floatshare").style.zIndex ="-8";
	}

/*以下和注册、登陆界面弹出相关代码*/	
	
function userinfoMdown(){
	document.getElementById("userinfobg").style.display ="block";
    }
function floatuserinfomenu(){
    document.getElementById("userinfomenu").style.display ="block";
    }
