
<!--blocks--->
<?php
include("../reg/conn.php");
?>
		<div id="mycontainer">
			<!--1-->
            <div class="demo">
                <div id="capslide_img_cont6" class="ic_container">
                    <img src="img/1.png" width="190" height="190" alt=""/>
                    <a href="<?php echo "news.php?school=1"?>" target="_blank">
						<div class="overlay" style="display:none;"></div>
					</a>
                    <div class="ic_caption">
						<?php
						$sql = "SELECT title,time,content,id FROM news WHERE school ='1' ORDER BY id DESC LIMIT 0,1 "; 
						$result=mysql_query($sql);
						$num=mysql_num_rows($result);
						if($num!=0){
						while($row=mysql_fetch_array($result)){
						?>
                        <p class="ic_category">华科</p>
 
                        <p class="ic_text">
							<a href="article.php?id=<?php echo $row['id']; ?>" id="huanong" target="_blank">
								<?php echo $row['title'];?>
							</a>
                        </p>
						<?php
						}
						}
						?>
                    </div>
                </div>
            </div> 
			<!--2-->
            <div class="demo">
                <div id="capslide_img_cont3" class="ic_container">
                    <img src="img/2.png" width="190" height="190" alt=""/>
                    <a href="<?php echo "news.php?school=2"?>" target="_blank">
						<div class="overlay" style="display:none;"></div>
					</a>
                    <div class="ic_caption">
						<?php
						$sql = "SELECT title,time,content,id FROM news WHERE school ='2' ORDER BY id DESC LIMIT 0,1 "; 
						$result=mysql_query($sql);
						$num=mysql_num_rows($result);
						 
						if($num!=0){
						while($row=mysql_fetch_array($result)){
						?>
                        <p class="ic_category">华科</p>
 
                        <p class="ic_text">
							<a href="article.php?id=<?php echo $row['id']; ?>" id="huake" target="_blank">
								<?php echo $row['title'];?>
							</a>
                        </p>
						<?php
						}
						}
						?>
                    </div>
                </div>
            </div> 
  
			<!--3-->           
			<div class="demo">
                <div id="capslide_img_cont9" class="ic_container">
					<img src="img/3.png" width="410" height="190" alt=""/>
                    <a href="<?php echo "news.php?school=3"?>" target="_blank">
						<div class="overlay" style="display:none;"></div>
					</a>
                    <div class="ic_caption">
						<?php
						$sql = "SELECT title,time,content,id FROM news WHERE school ='3' ORDER BY id DESC LIMIT 0,1 "; 
						$result=mysql_query($sql);
						$num=mysql_num_rows($result);
						$id=$row['id'];
						if($num!=0){
						while($row=mysql_fetch_array($result)){
						?>
                        <p class="ic_category">武大</p>
						
                        <p class="ic_text">
							<a href="article.php?id=<?php echo $row['id']; ?>" id="wuda" target="_blank">
								<?php echo $row['title'];?>
							</a>
                        </p>
						<?php
						}
						}
						?>
                    </div>
                </div>
            </div> 

			<!--4-->
            <div class="demo">
                <div id="capslide_img_cont11" class="ic_container">
					<img src="img/4.png" width="190" height="190" alt=""/>
                    <a href="<?php echo "news.php?school=4"?>" target="_blank">
						<div class="overlay" style="display:none;"></div>
					</a>
                    <div class="ic_caption">
						<?php
						$sql = "SELECT title,time,content,id FROM news WHERE school ='4' ORDER BY id DESC LIMIT 0,1 "; 
						$result=mysql_query($sql);
						$num=mysql_num_rows($result);
						$id=$row['id'];
						if($num!=0){
						while($row=mysql_fetch_array($result)){
						?>
                        <p class="ic_category">华师</p>

                        <p class="ic_text">
							<a href="article.php?id=<?php echo $row['id']; ?>" target="_blank" id="huashi">
								<?php echo $row['title'];?>
							</a>
                        </p>
						<?php
						}
						}
						?>
                    </div>
                </div>
            </div> 

			<!--5-->
            <div class="demo">
                <div id="capslide_img_cont7" class="ic_container">
					<img src="img/5.png" width="190" height="190" alt=""/>
                    <a href="<?php echo "news.php?school=5"?>" target="_blank">
						<div class="overlay" style="display:none;"></div>
					</a>
                    <div class="ic_caption">
						<?php
						$sql = "SELECT title,time,content,id FROM news WHERE school ='5' ORDER BY id DESC LIMIT 0,1 "; 
						$result=mysql_query($sql);
						$num=mysql_num_rows($result);
						$id=$row['id'];
						if($num!=0){
						while($row=mysql_fetch_array($result)){
						?>
                        <p class="ic_category">理工大</p>

                        <p class="ic_text">
							<a href="article.php?id=<?php echo $row['id']; ?>" target="_blank" id="ligongda">
								<?php echo $row['title'];?>
							</a>
                        </p>
						<?php
						}
						}
						?>
                    </div>
                </div>
            </div> 
			
			<!--6-->
            <div class="demo">
                <div id="capslide_img_cont8" class="ic_container">
					<img src="img/6.png" width="190" height="190" alt=""/>
                    <a href="<?php echo "news.php?school=6"?>" target="_blank">
						<div class="overlay" style="display:none;"></div>
					</a>
                    <div class="ic_caption">
						<?php
						$sql = "SELECT title,time,content,id FROM news WHERE school ='6' ORDER BY id DESC LIMIT 0,1 "; 
						$result=mysql_query($sql);
						$num=mysql_num_rows($result);
						$id=$row['id'];
						if($num!=0){
						while($row=mysql_fetch_array($result)){
						?>
                        <p class="ic_category">地大</p>

                        <p class="ic_text">
							<a href="article.php?id=<?php echo $row['id']; ?>" target="_blank" id="dida">
								<?php echo $row['title'];?>
							</a>
                        </p>
						<?php
						}
						}
						?>
                    </div>
                </div>
            </div> 

			<!--7-->
            <div class="demo">
                <div id="capslide_img_cont10" class="ic_container">
                    <img src="img/7.png" width="190" height="190" alt=""/>
                    <a href="<?php echo "news.php?school=7"?>" target="_blank">
						<div class="overlay" style="display:none;"></div>
					</a>
                    <div class="ic_caption">
						<?php
						$sql = "SELECT title,time,content,id FROM news WHERE school ='7' ORDER BY id DESC LIMIT 0,1 "; 
						$result=mysql_query($sql);
						$num=mysql_num_rows($result);
						$id=$row['id'];
						if($num!=0){
						while($row=mysql_fetch_array($result)){
						?>
                        <p class="ic_category">财大</p>

                        <p class="ic_text">
							<a href="article.php?id=<?php echo $row['id']; ?>" target="_blank" id="caida">
								<?php echo $row['title'];?>
							</a>
                        </p>
						<?php
						}
						}
						?>
                    </div>
                </div>
            </div> 
			
		</div> 
			
<!--end block-->

<!--js--->
        <script type="text/javascript" src="js/jquery-1.3.2.js"></script>
        <script src="js/jquery.capSlide.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(function() {
                $("#capslide_img_cont").capslide({
                    caption_color	: 'white',
                    caption_bgcolor	: 'black',
                    overlay_bgcolor : 'black',
                    border			: '10px solid #f8f5c8',
                    showcaption	    : false
                });
                $("#capslide_img_cont2").capslide({
                    caption_color	: 'black',
                    caption_bgcolor	: '#E6E79C',
                    overlay_bgcolor : '#E6E79C',
                    border			: '10px solid #f8f5c8',
                    showcaption	    : true
                });
                $("#capslide_img_cont3").capslide({
                    caption_color	: '#fff',
                    caption_bgcolor	: '#000',
                    overlay_bgcolor : '#05b5da',
                    border			: '10px solid #f8f5c8',
                    showcaption	    : true
                });
                $("#capslide_img_cont4").capslide({
                    caption_color	: 'black',
                    caption_bgcolor	: '#f68a21',
                    overlay_bgcolor : '#f68a21',
                    border			: '10px solid #e2b83d',
                    showcaption	    : false
                });
                $("#capslide_img_cont5").capslide({
                    caption_color	: 'black',
                    caption_bgcolor	: 'white',
                    overlay_bgcolor : '#CE9B9B',
                    border			: '10px solid #f8f5c8',
                    showcaption	    : true
                });
                $("#capslide_img_cont6").capslide({
                    caption_color	: 'black',
                    caption_bgcolor	: 'white',
                    overlay_bgcolor : '#832EA5',
                    border			: '10px solid #f8f5c8',
                    showcaption	    : true
                });
                $("#capslide_img_cont7").capslide({
                    caption_color	: '#fff',
                    caption_bgcolor	: '#549360',
                    overlay_bgcolor : '#549360',
                    border			: '10px solid #f8f5c8',
                    showcaption	    : true
                });
                $("#capslide_img_cont8").capslide({
                    caption_color	: '#fff',
                    caption_bgcolor	: '#d13f68',
                    overlay_bgcolor : '#d13f68',
                    border			: '10px solid #f8f5c8',
                    showcaption	    : true
                });
                $("#capslide_img_cont9").capslide({
                    caption_color	: '#000',
                    caption_bgcolor	: '#fff',
                    overlay_bgcolor : '#3fa6d1',
                    border			: '10px solid #f8f5c8',
                    showcaption	    : true
                });
                $("#capslide_img_cont10").capslide({
                    caption_color	: '#fff',
                    caption_bgcolor	: '#660e3a',
                    overlay_bgcolor : '#549360',
                    border			: '10px solid #f8f5c8',
                    showcaption	    : true
                });
                $("#capslide_img_cont11").capslide({
                    caption_color	: '#fff',
                    caption_bgcolor	: '#05b5da',
                    overlay_bgcolor : '#f9ca8d',
                    border			: '10px solid #f8f5c8',
                    showcaption	    : true
                });
                $("#capslide_img_cont12").capslide({
                    caption_color	: '#bfedfa',
                    caption_bgcolor	: '#000',
                    overlay_bgcolor : '#000',
                    border			: '10px solid #f8f5c8',
                    showcaption	    : false
                });
                $("#capslide_img_cont13").capslide({
                    caption_color	: '#000',
                    caption_bgcolor	: '#efa609',
                    overlay_bgcolor : '#efa609',
                    border			: '10px solid #f8f5c8',
                    showcaption	    : true
                });

            });
        </script>
		<script>
		(function($){ 
		$.fn.newscenter = function(){ 
		this.css("position","absolute");  
		this.css("top", (($(window).height())/2 -(this.height())/2+20) + "px");  
		this.css("left", ( $(window).width() - this.width() ) / 2 + "px");  
		return this;  
		} 
		})(jQuery) 
		$('#mycontainer').newscenter();
		</script>
<!--//js--->