<!-- top half container start -->
<script src="/js/flowplayer-3.2.11.min.js"></script>
<div class="container"  style='margin-top:-30px; width:1000px;'>       					
	<div class='section-container' style="float: left; width: 672px; margin-left: 10px; "><!-- top left start  -->                		
		<div style="width: 672px;"><!-- headlines start -->                
			<div style="width: 672px; height: 376px; overflow: hidden">
				<?php
					$cthumbs = array(); 
					for ($count = 1; $count <= count($carousel_array); $count++): 						
						$cthumbs[$count-1]['Title'] = stripslashes($carousel_array[$count - 1]['Title']);
						$cthumbs[$count-1]['Main'] = stripslashes($carousel_array[$count - 1]['Image']); 
						$cthumbs[$count-1]['Image'] = stripslashes($carousel_array[$count - 1]['ImageThumb']); 
				?>
					<?php if(!is_null($carousel_array[$count-1]['Video']) && $carousel_array[$count-1]['Video'] != ''): ?>
					<div id="carousel<?php echo $count; ?>" class="carousel" style=" <?php if ($count > 1) echo "display: none"; ?>">
						<div id='player<?php echo $count; ?>' class="player" style="width: 622; height: 375px"></div>						
						<div id="playerContent<?php echo $count; ?>" style="display:none; ">
						    <p>
						    	<span class='title'><?php echo stripslashes($carousel_array[$count - 1]['Title']); ?></span>
						    	<?php 
						    		$u_agent = $_SERVER['HTTP_USER_AGENT'];
						    		 if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)){
						    		 	echo "<br/>";		
						    		 } 
    							?>						    	
						    	<span class='intro'><?php echo stripslashes($carousel_array[$count - 1]['Intro']); ?><a class='readmore' href='<?php echo stripslashes($carousel_array[$count - 1]['Link']); ?>'>Read More</a></span>
						    </p>	
						</div>
						<script>							
							flowplayer("player<?php echo $count; ?>", {							    
							    src: "/js/flowplayer-3.2.15.swf",
							    version: [10, 1],	
							    onFail: function ()  {
									document.getElementById("player<?php echo $count; ?>").innerHTML =
									"You need at least Flash version 10.1 to play the movie. " +
									"Your version is " + this.getVersion(); 										
									}	
								},						    
					      		{
									clip:{
										url:"/movie/<?php echo $carousel_array[$count - 1]['Video']; ?>",	
										autoPlay: false,
          								autoBuffering: true,
          								onResume: function(){
          									this.getPlugin("content").hide();
          								},
          								onPause: function(){
          									this.getPlugin("content").show();	
          								}          								
									},
									//playlist:["<?php echo $carousel_array[$count - 1]['Link']; ?>"],
									plugins:{
									    content: {          
								        	// the only required property
								         	url: '/js/flowplayer.content-3.2.8.swf',								            
								          	// some display properties	
								          	bottom: 30,							          	
								            height: 82,
								            padding:10,
								            width: 640,
								         	//backgroundColor: '#000',
								         	//opacity: 0.9,			
								         	backgroundImage:'images/topstory_overlay.png',
								          	// one styling property 
								          	//backgroundGradient: [0.1, 0.1, 1.0],								           
								          	// content plugin specific properties
								         	html: document.getElementById("playerContent<?php echo $count; ?>").innerHTML,
							            	style: {
							            		".title": {fontSize: 20, color: '#ffffff'},
							            		".intro": {fontSize: 14, color: '#ffffff'},
							            		".readmore":{color:'#18B6F2'}							            		
							            	}
							            }	
						      		}
									
								});							
						</script>						
					</div>	
					<?php else: ?>				
					<div id="carousel<?php echo $count; ?>" class="carousel" style=" <?php if ($count > 1) echo "display: none"; ?>">
					 	<a href="<?php echo $carousel_array[$count - 1]['Link']; ?>" <?php if ($carousel_array[$count - 1]['Source'] == "US") echo ' target="_blank"'; ?>>
				 			<span id="icarousel<?php echo $count; ?>">
				 				<?php if ($count == 1): ?>
				 				<img src="<?php echo $carousel_array[$count - 1]['Image']; ?>" width="672" height="376">
				 				<?php endif; ?>
				 			</span>
				 		</a>
						<div class="carousel_text">
							<div style="font-family: arial; font-size: 20px; color: #fff; margin: 4px 15px; width: 622px; height: 24px; overflow: hidden">
								<b><a href="<?php echo $carousel_array[$count - 1]['Link']; ?>" style="color: #fff"<?php
								   if ($carousel_array[$count - 1]['Source'] == "US")
									  echo ' target="_blank"';?>><?php echo stripslashes($carousel_array[$count - 1]['Title']); ?></a>
								</b>
							</div>					
							<div id="carousel_intro" style="font-size: 12px; color: #fff; margin: 4px 15px; width: 622px; height: 46px; overflow: hidden">
							   <b><?php echo stripslashes($carousel_array[$count - 1]['Intro']); ?></b>
							</div>
					 	</div>
				  	</div>
				  	<?php endif; ?>
					<?php
   					endfor;					
					$carousel .= '<div class="clear"></div>';
					?>
				</div>    
				
				<div style="width: 650px; border-left: 1px solid #d8d8d8; border-right: 1px solid #d8d8d8; padding: 5px 10px">
					<table cellspacing="0" cellpadding="0" style="width: 650px; padding-top: 10px">
	     			<tr>
	        			<td style="width: 25px">
	           				<img src="images/left_btn.png" id="headline_left" class="pointer">
	        			</td>
	        			<td style="width: 600px; background: #ccc">
	           				<div class="scroll" id="headline_pics">
	              				<div class="pics">
									<?php $count = 0; ?>
									<?php for($i=0; $i<count($cthumbs); $i++): ?>
				   						<?php if ($count % 4 == 0): ?>
										<div class="pics_content">
										<?php endif; ?>
											<div class="pics_details pointer" onclick="carousel(<?php echo ($count + 1); ?>, '<?php echo $cthumbs[$i]['Main']; ?>')">
												<div class="pics_actual">
													<img src="<?php echo $cthumbs[$i]['Image']; ?>" width="132" height="70">
												</div>								
												<?php echo stripslashes($cthumbs[$i]['Title']); ?>
											</div>
										<?php if ($count % 4 == 3 || $count + 1 == $total): ?>												
											<div class="clear"></div>
										</div>
										<?php endif; ?>										   														
										<?php $count += 1; ?>
									<?php endfor; ?>		
	              				</div>
	           				</div>
	        			</td>
	                    <td style="width: 25px; text-align: right">
	                       <img src="images/right_btn.png" id="headline_right" class="pointer">
	                    </td>
	     			</tr>
	     			<tr>
	        			<td colspan="3" style="height: 25px; text-align: center">
	                       <img src="images/circle_filled.png" id="headline_circle_0" class="headline_circle">
	                       <img src="images/circle_empty.png" id="headline_circle_1" class="headline_circle">
	                       <img src="images/circle_empty.png" id="headline_circle_2" class="headline_circle">
	        			</td>
	     			</tr>
	  			</table>
				</div>

				<div class="clear"></div>
		</div> <!-- headlines end -->                
		</div><!-- vtop left end -->            
		
		<div class='section-container' style="float: left; width: 300px; margin-left: 10px"><!-- top right start -->           
			<div style="width: 300px; height: 250px">
		 	<?php 
		 		if(true){
		 			echo $ads_list['nba_homepage_top_medallion']; 
		 		}else{
		 			?>
		 			<div>
		 				<a href="/pre-season.php?channel=live"><img src="media/2.0/medallion-banner-1-to-2pm.jpg" /></a>
		 			</div>	
		 			<?php
		 		}

		 	?>
			</div>    
			<div style="height: 10px"></div>
			<?php if ($ads_array[0]['Link']): ?>                
			<div style="width: 300px; height: 100px">
					<!--a href="<?php echo $ads_array[0]['Link']; ?>"><img src="ads/<?php echo $ads_array[0]['Image']; ?>"></a-->
					<a href="/pre-season.php?register=1"><img src="media/2.0/300x100-banner-3.jpg"></a>					
			</div>
			<?php endif; ?>
			<div style="height: 10px"></div>
			<div style="width: 300px; padding: 5px 0 0px 0;">
				<div class="article_header" style="background: url('images/rounded_top_300.png'); width: 270px; height: 15px">
		          	Social Connection 
		       	</div>
		       	<div class='box-container-110' style='height:110px; border-left: 1px solid #d8d8d8; border-right: 1px solid #F2F2F2;'>
		       		<ul class='social-icons'>
		       			<li><a href="http://www.facebook.com/philsnba?ref=hl" target="_blank"><img src="/media/2.0/icon_fb.gif"/></a></li>
		       			<li><a href="https://twitter.com/NBA_Philippines" target="_blank"><img src="/media/2.0/icon_twitter.gif"/></a></li>
		       			<li><a href="http://www.youtube.com/nba" target="_blank"><img src="/media/2.0/icon_youtube.gif"/></a></li>
		       			<li><a href="http://pinterest.com/nba/" target="_blank"><img src="/media/2.0/icon_pintrest.gif"/></a></li>
		       			<li><a href="http://nba.tumblr.com/" target="_blank"><img src="/media/2.0/icon_tumblr.gif"/></a></li>
		       		</ul>	
		       	</div>
			</div>
		</div><!-- top right end -->    
	<div class="clear"></div>             
</div><!-- container -->