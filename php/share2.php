	<!--隐藏的分享-->
	<div id="floatshare" style="display:block;">
		<div id="trans3" onclick="CancelShare()">
		</div>
	    <div id="sharewrapper">
			<div id="myshare">
				<div class="bdsharebuttonbox">
					<a title="分享到QQ空间" href="#" class="bds_qzone" data-cmd="qzone"></a>
					<a title="分享到新浪微博" href="#" class="bds_tsina" data-cmd="tsina"></a>
					<a title="分享到腾讯微博" href="#" class="bds_tqq" data-cmd="tqq"></a>
					<a title="分享到人人网" href="#" class="bds_renren" data-cmd="renren"></a>
					<a title="分享到网易微博" href="#" class="bds_t163" data-cmd="t163"></a>
					<a title="分享到豆瓣网" href="#" class="bds_douban" data-cmd="douban"></a>
					<a title="分享到QQ好友" href="#" class="bds_sqq" data-cmd="sqq"></a>
					<a title="分享到打印" href="#" class="bds_print" data-cmd="print"></a>
					<a title="分享到花瓣" href="#" class="bds_huaban" data-cmd="huaban"></a>
					<a title="分享到腾讯朋友" href="#" class="bds_tqf" data-cmd="tqf"></a>
					<a title="分享到百度贴吧" href="#" class="bds_tieba" data-cmd="tieba"></a>
					<a href="#" class="bds_more" data-cmd="more"></a>
				</div>
			</div>
			<div id="shareto">分享到</div>
			<a id="CancelShare" title="取消" onclick="CancelShare()"/></a>
		</div>
		<style>
			#floatshare{
			   position:absolute;
			   width:100%;
			   height:100%;
			   top:0px;
			   z-index:-8;
			   }	   
			#trans3{
				position:absolute;
				width:100%;
				height:100%;
				background:#000;
				opacity:0.8;
				}
			#sharewrapper{
				position:absolute;
				top:20%;
				left:28%;
				width:600px;
				height:371px;
				background:#05b5da;
				}
			#myshare{
				position:absolute;
				left:30%;
				top:40%;
				width:40%;
				height:50%;
				}
			#CancelShare{
				cursor:pointer;
				position:absolute;
				right:-5px;
				top:-10px;
				width:24px;
				height:24px;
				background:url(../img/cancel.png);
				}
			#CancelShare:hover{
				background:url(../img/cancelhover.png)
				}
			#shareto{
				position:absolute;
				left:15%;
				top:12%;
				color:white;
				font-size:30px;
				font-family:微软雅黑;
				}
		</style>
		<script>
		window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"32"},"share":{},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","t163","douban","sqq","print","huaban","bdysc","tqf","tieba"]}};
		with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=86835285.js?cdnversion='+~(-new Date()/36e5)];
		</script>
		<script>
		(function($){ 
		$.fn.sharewrappercenter = function(){ 
		this.css("position","absolute");  
		this.css("bottom",( $(window).height() - this.height())/2 + "px");  
		this.css("left", ( $(window).width() - this.width())/2 + "px");  
		return this;  
		} 
		})(jQuery) 
		$('#sharewrapper').sharewrappercenter();
		</script>
</div>