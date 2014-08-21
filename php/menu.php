
<!--below rightMenu-->
    <!--id命名规则说明：div主要取缩写（css用），img主要取两字母（js使用）-->
    <!--NAV部分-->

	    <div onmouseout="hide()" id="rm">
	   
			<div id="blank1">
			    &nbsp;
			</div>
			
		    <div id="sch" onmouseover="mouseOver1()" onmouseout="mouseOut1()" onClick="Click1()">
			    <a>
				    <img src="img/rightmenu/search.png"  id="se" title="搜索">
				</a>
			</div>
			
			<div id="home" onmouseover="mouseOver2()" onmouseout="mouseOut2()">
			    <a href="index.php">
				    <img src="img/rightmenu/home.png" id="ho" title="首页">
		        </a>
		    </div>
			
			<div id="reg" onmouseover="mouseOver3()" onmouseout="mouseOut3()">
			    <a href="news/index.php">
				    <img src="img/rightmenu/news.png" id="re" title="新闻">
				</a>
			</div>
	
			<div id="set" onmouseover="mouseOver5()" onmouseout="mouseOut5()">
			    <a href="sharing/index.php">
				    <img src="img/rightmenu/sharing.png" id="sets" title="分享区">
				</a>
		    </div>
			
			<div id="exchange" onmouseover="mouseOver6()" onmouseout="mouseOut6()">
			    <a href="exchange/index.php">
				    <img src="img/rightmenu/exchange.png" id="ex" title="互助捷">
				</a>
		    </div>		
			
			<div id="share" onmouseover="mouseOver4()" onmouseout="mouseOut4()">
			    <a  onclick="ShareFloat()"><!--点击浮出分享界面-->
				    <img src="img/rightmenu/share.png" id="sh" title="分享给朋友">
				</a>
			</div>			
        </div>
		
	<!--NAV部分结束-->
	
	<!--MenuContainer 部分-->
	    <div id="menucontainer">
		    <div id="se2">
			    <div>
				    <div id="searchName">搜索</div>
					<form method="post" id="searchInput" action="search/search.php"><p>
						<input type="text" id="sInput" name="search" title="站内搜索" placeholder="请输入关键词">
						<div onmouseover="Mover2()" onmouseout="Mout2()">
						    <input type="image" id="searchSubmit" src="img/searchButton.png" title="搜索">
						</div>
						</p>
					</form>
					<div onmouseover="Mover()" onmouseout="Mout()">	
						<img src="img/scancel.png" id="searchCancel" onClick="Cancel()" title="取消">
					</div>
				</div>
		    </div>
			
		    <div id="ho2">
		    </div>
			
		    <div id="re2">
		    </div>
			
		    <div id="sh2">
		    </div>
			
        <!--下面是颜色&背景改变工具-->
		    <div id="sets2">
			    <div id="chgimg">
				<!--<img src="img/red.png" type="button" id="#E51400" onclick="chg(this.id);" title="红色">
					<img src="img/green.png" type="button" id="#339933" onclick="chg(this.id);" title="绿色">
					<img src="img/blue.png" type="button" id="#1BA1E2" onclick="chg(this.id);" title="蓝色">
					<img src="img/orange.png" type="button" id="#F09609" onclick="chg(this.id);" title="橙色">    
					<img src="img/grassgreen.png" type="button" id="#8CBF26" onclick="chg(this.id);" title="草绿">    
					<img src="img/lakeblue.png" type="button" id="#00ABA9" onclick="chg(this.id);" title="湖蓝">
					<img src="img/carmine.png" type="button" id="#FF0097" onclick="chg(this.id);" title="洋红">
					<img src="img/pink.png" type="button" id="#E671B8" onclick="chg(this.id);" title="粉红">
					<img src="img/brown.png" type="button" id="#996600" onclick="chg(this.id);" title="棕色">
					<img src="img/purple.png" type="button" id="#A200FF" onclick="chg(this.id);" title="紫色"> 

					<img src="img/bg.jpg" type="button" onclick="CBG();" title="图1"> 
					<img src="img/bg2.jpg" type="button" onclick="CBG2();" title="图2"> 
					<img src="img/bg3.jpg" type="button" onclick="CBG3();" title="图3"> 
					<img src="img/bg4.jpg" type="button" onclick="CBG4();" title="图4"> 	       
					<img src="img/bg5.jpg" type="button" onclick="CBG5();" title="图5"> 
					<img src="img/bg6.jpg" type="button" onclick="CBG6();" title="图6"> 
					<img src="img/bg7.jpg" type="button" onclick="CBG7();" title="图7"> 
					<img src="img/bg8.jpg" type="button" onclick="CBG8();" title="图8"> 
					<img src="img/bg9.jpg" type="button" onclick="CBG9();" title="图9"> 
					<img src="img/bg10.jpg" type="button" onclick="CBG10();" title="图10"> 
				    <img src="img/bg11.jpg" type="button" onclick="CBG11();" title="图11"> 
				    <img src="img/bg12.jpg" type="button" onclick="CBG12();" title="图12">	 
              	
					<div onmouseover="Mover()" onmouseout="Mout()">				
						<a>
						   <img src="img/cancel.png" id="settingCancel" onClick="Cancel5()" style="border:0px" title="退出">	
						</a>
					</div>	-->		
				</div>
		    </div>	
        <!--上面是颜色&背景改变工具-->			
		
	    </div>
	<!--Container 部分结束-->	
	
	<!--以下辅助工具-->	
	
		<div id="onpic" onmouseover="show()" onClick="Click()" style="background:#fff;opacity:0">
		</div><!--辅助板块-->
		     <!--上面是右侧浮动透明部分，mouseOver之后菜单出现-->

			 
	<!--辅助工具结束-->
	
<!--above rightMenu-->
	