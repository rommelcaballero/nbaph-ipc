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
                                         echo $base . "news-article/".$news_array[$count]['NewsID']."/".seoUrl(trim($news_array[$count]['NewsTitle']));
			
                           	?>"><?php echo stripslashes($news_array[$count]['Title']); ?></a>
                          </td>
                     </tr>
                     <?php
   				    //$count += 1;
                          } //=end for loop
                     ?>
                </table>

                <div class="section-more_link">
                     <a href="news-article">More ph.nba.com Headlines</a>
                </div>
            </div>
            <!-- Headlines content end -->
        </div>

    <div class='section-container' style="width: 330px; height:313px; padding: 5px 0px 0; border-bottom: 4px solid #2363BE;">
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

				<div class="section-more_link" >
		 			<a href="local-events">More ph.nba.com Events</a>
				</div>
			</div>
			<!-- Headlines content end -->
		</div>
	</li>
	<li class='spacer'></li>
	<li id='column2'>
    <div class='section-container' style="width: 330px; border-bottom: 4px solid #2363BE;">
        <div class="article_header" style="background: url('images/rounded_top_330.png'); width: 300px; height: 15px">
            SOCIAL STREAM
        </div> 
        <?php if(isset($_GET['test']) && $_GET['test'] =='disqus'): ?>        
        <div class="cell_330" style="height:520px;"> 
            <div id="disqus_thread"></div>
            <script type="text/javascript">
                /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
                var disqus_shortname = 'nbaphilippines'; // required: replace example with your forum shortname

                /* * * DON'T EDIT BELOW THIS LINE * * */
                (function() {
                    var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                    dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                })();
            </script>
            <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
            <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
        </div>
        <?php else: ?>
        <div class="cell_330" style="height:520px;">                
            <div style="width: 320px; height: 270px;" breakingburner-widget="NBAPhilippines/nba-inline-home-page">
                <script src="http://widget.breakingburner.com/js/jwidget.js"></script>
            </div>
            <iframe src="http://our.glossip.nl/ad2/5188c18f17de85ad47000000" height="250" width="300" id="breakingburner-iframe" frameborder="no" scrolling="no"></iframe>
        </div>
        <?php endif; ?>
    </div>
          
	</li>
	<li class='spacer'></li>
	<li id='column3'>
		<div style="width: 300px; height: 250px">
			<?php echo $ads_list['nba_homepage_middle_medallion1']; ?>
        </div>
        <div class='section-container' style="width: 300px; padding: 5px 0 0px 0; height:317px; border-bottom: 4px solid #2363BE;">
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
		                	<a href="<?php echo str_replace('/news-archives','',$features_array[$count]['Link']); ?>"><?php echo stripslashes($features_array[$count]['Title']); ?></a>
		                </td>
	             	</tr>
	          	<?php endfor; ?>
		        </table>

		        <div class="section-more_link">
		        	<a href="nba-features">More ph.nba.com Features</a><br>
		        </div>
	       </div>		       
    	</div>
	</li>
</ul>
