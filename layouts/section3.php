<ul class='three-column'>
	<li id='column1'>
		<div style="height:254px; width: 330px; padding: 0px 0 0px 0; background: url('images/rounded_bottom_330.png') bottom center no-repeat">
           	<div class="article_header" style="background: url('images/rounded_top_330.png'); width: 300px; height: 15px">
                    HEADLINES
               </div>    
               <!-- Headlines content start -->
               <div class="cell_330" style="height:201px;">
                    <table style="width: 100%">
                         <?php 
                         for($count = 0; $count < 9; $count += 1) {
                              $style = "";
                              if ($count % 2 == 1)
                                   $style = "background: #ccc";
                         ?>
                         <tr style="<?php echo $style; ?>">
                    	    <td>
                              <a href="<?php if ($news_array[$count]['Link'])
                                  	          echo $news_array[$count]['Link'];
                                        else
                                  	          //echo "news_article.php?newsid=" . $row['NewsID'];
                                             echo "news-article/".$news_array[$count]['NewsID']."/".seoUrl(trim($news_array[$count]['NewsTitle']));
                               	?>"><?php echo stripslashes($news_array[$count]['Title']); ?></a>
                              </td>
                         </tr>
                         <?php
       				    //$count += 1;
                              } //=end for loop
                         ?>
                    </table>
    
                    <div class="more_link">
                         <a href="news-article">More Headlines</a>
                    </div>
               </div>
               <!-- Headlines content end -->
    </div>
    <div class='section-container' style="width: 330px; height:313px; padding: 5px 0px 0;">
			<div class="article_header" style="background: url('images/rounded_top_330.png'); width: 300px; height: 15px">
				EVENTS
			</div>

			<!-- Headlines content start -->
			<div class="cell_330" style="height:261px;">
				<div style="width: 318px; ">
			  		<img src="<?php echo $events_array['ImageThumb']?>" width="318" height="159">
			  		<!-- img src="resize_pic.php?file=<?php echo $events_array['Image']?>&w=318&h=159" -->
				</div>

				<div style="padding: 5px 0; font-size: 14px">
			 		<b><?php echo stripslashes($events_array['Title']); ?></b>
				</div>
				<?php echo stripslashes($events_array['Intro']); ?>

				<div class="more_link" style="position:relative; bottom:12px;">
		 			<a href="local-events">More Events</a>
				</div>
			</div>
			<!-- Headlines content end -->
		</div>
	</li>
	<li class='spacer'></li>
	<li id='column2'>
    <div class='section-container' style="width: 330px; ">
            <div class="article_header" style="background: url('images/rounded_top_330.png'); width: 300px; height: 15px">
                SOCIAL STREAM
            </div> 
            <div class="cell_330" style="height:519px;">
                <div style="width: 320px; height: 270px;" breakingburner-widget="NBAPhilippines/nba-inline-home-page">
                    <script src="http://widget.breakingburner.com/js/jwidget.js"></script>
                </div>
                <iframe src="http://widget.breakingburner.com/ad/5188c18f17de85ad47000000" height="250" width="325" id="breakingburner-iframe" frameborder="no" scrolling="no"></iframe>
            </div>
        </div>
          <!--div style="height:117px;">
               <a href="http://store.nba.com/home/index.jsp" target="_blank"><img src='/media/2.0/nba-store.jpg' /></a>
          </div>   
		      <div class='section-container' style="width: 330px; padding: 0px 0 0px 0; height:455px;">                
      

			<div style="width: 328px; text-align: left; ">
                 	<div style="width: 327px;">
                     	<ul class="video_list">
                         	<li style="background-position: 0 33px; color: #444; " class="share_element" id="facebook_tab">
                             	     <span style="background-image: url(images/fb_share1.png); background-repeat: no-repeat; text-align: left; padding-left: 19px; " >Facebook</span> 
                         	</li>
                              <li class="share_element" id="twitter_tab">
                             	     <span style="background-image: url(images/twit_share1.png); background-repeat: no-repeat; text-align: left; padding-left: 18px; " >Twitter</span> 
                            	</li>
                              <li style="cursor: default; height: 22px; width: 66px; border-bottom: 1px solid #e6e6e6; background-image: none; " >
                             	     &nbsp;
                              </li>
                         </ul>                        
                         <div class="clear"></div>                        
                   	</div>                     
               </div>
      
               <div id="twitter_tab_list" class="cell_330" style="display:none; height: 420px;padding-bottom: 0px; padding-top: 0px;  margin-bottom: 0px; margin-top: 0px;  " >
            	<script>
                	new TWTR.Widget({
	                    	version: 2,
	                        type: 'profile',
	                        rpp: 4,
                            interval: 30000,
	                        width: 318,
	                        height: 320,
	                        theme: {
	                        	shell: {
	                        		background: '#ffffff',
	                               	color: '#0055af'
	                         	},
	                            tweets: {
	                            	background: '#ffffff',
	                               	color: '#444444',
	                               	links: '#0055af'
	                         	}
	                       	},
	                        features: {
	                            scrollbar: true,
	                            loop: false,
	                            live: false,
	                            behavior: 'default'
	                       	}
                        }).render().setUser('NBA_Philippines').start();
             	</script>
           	</div>
      
                   
			
        	<div id="facebook_tab_list" class="cell_330"   style="height: 420px; padding-bottom: 0px; padding-top: 0px;  margin-bottom: 0px; margin-top: 0px;  " >
            	<div class="blue" style="padding: 5px 5px 5px 0px; " ><a href="http://www.facebook.com/philsnba" target="_blank" >Become a fan</a></div> 
            
                <div id="fb-root"></div>
                <script>(function(d, s, id) {
                  var js, fjs = d.getElementsByTagName(s)[0];
                  if (d.getElementById(id)) return;
                  js = d.createElement(s); js.id = id;
                  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=131694290309870";
                  fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));</script>
                <div class="fb-like-box" data-href="http://www.facebook.com/philsnba" data-width="318" data-show-faces="false" data-stream="true" data-header="false" data-border-color="#ffffff" ></div>
          	</div>
            
        </div-->
	</li>
	<li class='spacer'></li>
	<li id='column3'>
		<div style="width: 300px; height: 250px">
			<?php echo $ads_list['nba_homepage_middle_medallion1']; ?>
        </div>
        <div class='section-container' style="width: 300px; padding: 5px 0 0px 0; height:317px;">
	       	<div class="article_header" style="background: url('images/rounded_top_300.png'); width: 270px; height: 15px">
	          	FEATURES
	       	</div>

	       	<!-- Headlines content start -->
	       	<div class="cell_288" style="height: 265px;">
	          	<table style="width: 100%">
		        <?php for ($count = 0; $count < 13; $count++):
            			$style = "";
		            	if ($count % 2 == 1)
		                	$style = "background: #ccc";
	          	?>
		        	<tr style="<?php echo $style; ?>">
		            	<td>
		                	<a href="<?php echo $features_array[$count]['Link']; ?>"><?php echo stripslashes($features_array[$count]['Title']); ?></a>
		                </td>
	             	</tr>
	          	<?php endfor; ?>
		        </table>

		        <div class="more_link">
		        	<a href="nba-features">More Features</a><br>
		        </div>
	       </div>		       
    	</div>
	</li>
</ul>
