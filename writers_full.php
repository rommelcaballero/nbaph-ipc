<?php

$part_page = "writers full";
include('queries/writers_full-queries.php');


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<title>NBA Philippines</title> 
		
		<link rel="stylesheet" type="text/css" href="/css/style.css">
		<link rel="stylesheet" type="text/css" href="/css/style-writers_full.css">
		<link rel="stylesheet" type="text/css" href="/css/colorbox/colorbox.css">
		<!--[if IE]>
		<link rel="stylesheet" type="text/css" href="/css/ie_style.css">
		<![endif]-->
		<!--[if IE 7]>
		<link rel="stylesheet" type="text/css" href="/css/ie7_style.css">
		<![endif]-->
		<script type="text/javascript" src="/jquery-1.7.1.min.js"></script>
		<script type="text/javascript" src="/jquery.tools.min.js"></script>
		<script type="text/javascript" src="/jquery.imgpreload.js"></script>
		<script type="text/javascript" src="/colorbox/jquery.colorbox.js"></script>
		<script type="text/javascript" src="/java.js"></script>
	</head>
	<body>
		
		<?php include('layouts/popups.php');?>
		<div id="wrapper">
			<?php include('layouts/header.php'); ?>

			<div id="main_content">
				<div style="height: 10px"></div>
				<div style="width: 980px; height: 90px; padding:10px; margin: 0 auto; text-align: center">
					<?php echo $ads_list['nba_WritersFull_top_leaderboard']['Content'];	?>
				</div>
				<div style="height: 10px"></div>

				<div style="font-size: 25px; width: 980px; margin: 0 auto; padding: 10px">
					<b>Personalities</b>
				</div>

				<!-- top half start -->
				<div style="width: 980px; padding:10px; margin: 0 auto">
					<div class="lfloat" style="width: 67%; " >
            	
                 <?php
 				 if($found > 0){					
					$ctr = 1;
					for ($i = 0; $i < count($blog_array); $i += 1){						
						$blog_id = $blog_array[$i]['BlogID'];
						$blog_title = $blog_array[$i]['BlogTitle'];
						$blog_content = $blog_array[$i]['BlogBody'];
						$blog_intro = $blog_array[$i]['BlogExcerpt'];
						$blog_postedby = $blog_array[$i]['Blogger'];
						$blog_date = $blog_array[$i]['DatePosted'];
						$b_title = $blog_title;
						//$blog_title = "<a href=\"writers-content/$blog_id/".seoUrl(strtolower($blog_title))."\" class=\"blog_title_link\">$blog_title</a>";
						
						if($sblog_id){
							$blog_content = $blog_content;
							$link = "";
						}else{
							$blog_content = $blog_intro;
							$blog_content .= "<br><a href=\"writers-content/$blog_id/".seoUrl(strtolower($blog_title))."\" class=\"blog_title_link\">read more</a>";
							$link = $blog_id;
						}
					?>

						<!-- pb writer <?php echo $ctr; ?> -->
						<div class="blog_item" style='padding:10px;'>                 	
							<div class="blog_date" ><?php echo $blog_date; ?>
								<!--div class="addthis_position">									
									<div class="addthis_toolbox addthis_default_style ">
										<a class="addthis_button_preferred_1"></a>
										<a class="addthis_button_preferred_2"></a>
										<a class="addthis_button_preferred_3"></a>
										<a class="addthis_button_preferred_4"></a>
										<a class="addthis_button_compact"></a>
										<a class="addthis_counter addthis_bubble_style"></a>
									</div>
									<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
									<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-503c81d36918b206"></script>
									
								</div-->
							</div>
							<div class="blog_title"><?php echo $blog_title; ?></div>
							<div class="blog_posted" ><?php echo $blog_postedby; ?></div>
							<div class="blog_content" >                    	
								<?php 
								$remote_addr = $_SERVER['REMOTE_ADDR'];
								$test_geoip_none_ph = isset($_GET['test-geoip'])?true:false;
								
								$geo_data = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip={$remote_addr}"));

								$geoLocBlocked = ($geo_data['geoplugin_countryCode'] != 'PH' || $test_geoip_none_ph);
								 
								if($geoLocBlocked){
									$reg = '/^\r+|\n+/';
									$out = "";
									$blog_content = preg_replace($reg, $out, $blog_content);
									
									$reg = '#\<video (.*?)\</video\>#i';
									$out = "<div style='width:630px; height:360px; background:#000;'><span style='display:block; width:60%; padding-top:150px; margin:0 auto; color:#fff; text-transform:uppercase; text-align:center;'>The video you were trying to watch cannot be viewed from your current country or location</span></div>";	
									$blog_content = preg_replace($reg, $out, $blog_content);							
								}
								echo $blog_content; 						
								?>
							   <div class="clear_both" ></div>
								
							</div>
							<div>                            
								<div class="OUTBRAIN" data-src="<?php echo $base; ?>writers-content/<?php echo $blog_id . "/" . seoUrl(strtolower($b_title)); ?>" data-widget-id="AR_1" data-ob-template="NBAPH" ></div>
								<div class="OUTBRAIN" data-src="<?php echo $base; ?>writers-content/<?php echo $blog_id . "/" . seoUrl(strtolower($b_title)); ?>" data-widget-id="AR_2" data-ob-template="NBAPH" ></div>
								<script type="text/javascript" async="async" src="http://widgets.outbrain.com/outbrain.js"></script> 
							</div>
							<div class="clear" style="height: 10px"></div>
							<!--div class="addthis_div">
							   <div class="addthis_position">
								 
								  <div class="addthis_toolbox addthis_default_style ">
								  <a class="addthis_button_preferred_1"></a>
								  <a class="addthis_button_preferred_2"></a>
								  <a class="addthis_button_preferred_3"></a>
								  <a class="addthis_button_preferred_4"></a>
								  <a class="addthis_button_compact"></a>
								  <a class="addthis_counter addthis_bubble_style"></a>
								  </div>
								  <script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
								  <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-503c81d36918b206"></script>
								 
							   </div>
							</div-->
							<div id="disqus_thread" style='padding:10px;'></div>
							<script type="text/javascript">
								/* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
								var disqus_shortname = 'ph-nba-com'; // required: replace example with your forum shortname	
								<?php $xbase = 'http://ph.nba.com/'; ?>
				 var disqus_url = '<?php echo $xbase; ?>writers-content/<?php echo $sblog_id; ?>/<?php  echo seoUrl($blog_title); ?>/<?php echo trim(urlencode($blog_postedby)); ?>';
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
						 <!-- end pb writer <?php echo $ctr; ?> -->

					<?php		
						$ctr++;
						}//end for loop					
					}//end if
					?>

					</div>

					<div class="lfloat" style="width: 32%;" >
							
							<div style="width: 300px; padding: 10px; height: 250px; background: #ccc">
								<?php
							echo $ads_list['nba_WritersFull_medallion1']['Content'];
							?>
							</div>

							<div style="height: 20px; " ></div>

							<!-- more blogs -->
							<?php
							if($blog_id)
							 {
							?>
							<div id="MoreBlogs" >
							
							  <div style="width: 300px; padding: 5px 0 2px 0; background: url('/images/rounded_bottom_300.png') bottom center no-repeat">
							   <div class="article_header" style="background: url('/images/rounded_top_300.png'); width: 270px; height: 15px">
								  More from <?php echo ucwords($blog_postedby); ?>
							   </div>

							   <!-- Headlines content start -->
							   <div class="cell_300">

								
							   <!-- end column content -->
							   <div class="moreblogs_content" >



								  <?php
				   				   //if(count($more_array) > 0)
								   if($cnt_more_array > 0)
							  {
										for ($i = 0; $i < count($more_array); $i += 1)
								 {
											 $mpinoy_id = $more_array[$i]['BlogID'];
											 $mpinoy_title = ucfirst(trim(stripslashes($more_array[$i]['BlogTitle'])));
											 $mpinoy_posted = ucfirst(trim(stripslashes($more_array[$i]['Blogger'])));
									if ($blog_id == $mpinoy_id && $_GET['id']) {		
								 ?>
									<div class="moreblog_item" >
										
										<div class="moreblog_title" style="color: #666666"><?php echo $mpinoy_title; ?></div>
										<div class="moreblog_posted"  style="color: #999999"><?php echo date("l F d, Y", strtotime($more_array[$i]['DatePosted'])); ?></div>

									</div>

								 <?php
									} else {
								 ?>
									<div class="moreblog_item" >
										
<div class="moreblog_title" ><a href="<?php echo $base; ?>writers-content/<?php echo $mpinoy_id; ?>/<?php echo seoUrl(strtolower($mpinoy_title)); ?>"  ><?php echo $mpinoy_title; ?></a></div>
										<div class="moreblog_posted" ><?php echo date("l F d, Y", strtotime($more_array[$i]['DatePosted'])); ?></div>

									</div>

								  <?php
									}
								 }//end while
									
									}//end if
							  ?>

							   </div>
							   <!-- column content -->

							</div>
							   <!-- Headlines content end -->
							</div>

							</div>
							<?php
							 }//end if
							?>
							<!-- more blogs -->

					</div>
					<div class="clear"></div>
				</div>
				<!-- top half end -->
				<div>
				<?php
					$footer_ads = $ads_list['nba_WritersFull_bottom_leaderboard']['Content'];
					include('layouts/links.php');
				?>
				<?php include('layouts/footer.php'); ?>
				</div>
			</div>
		</div>
		
		<script type="text/javascript">
			<!--
			$(".scroll").scrollable({ circular: true });

			var video_section = "video_list_highlights_gallery";

			var headline_count = 0;
			var video_count = 0;

			$("#headline_left").click(function() {
			$("#headline_pics").data("scrollable").prev();

			$("#headline_circle_" + headline_count).prop("src", "/images/circle_empty.png");

			headline_count -= 1;
			if (headline_count < 0)
			headline_count = 2;

			$("#headline_circle_" + headline_count).prop("src", "images/circle_filled.png");
			});

			$("#headline_right").click(function() {
			$("#headline_pics").data("scrollable").next();

			$("#headline_circle_" + headline_count).prop("src", "/images/circle_empty.png");

			headline_count += 1;
			if (headline_count > 2)
			headline_count = 0;

			$("#headline_circle_" + headline_count).prop("src", "/images/circle_filled.png");
			});

			$("#video_left").click(function() {
			$("#" + video_section).data("scrollable").prev();

			$("#video_circle_" + video_count).prop("src", "/images/circle_empty.png");

			video_count -= 1;
			if (video_count < 0)
			video_count = 2;

			$("#video_circle_" + video_count).prop("src", "/images/circle_filled.png");
			});

			$("#video_right").click(function() {
			$("#" + video_section).data("scrollable").next();

			$("#video_circle_" + video_count).prop("src", "/images/circle_empty.png");

			video_count += 1;
			if (video_count > 2)
			video_count = 0;

			$("#video_circle_" + video_count).prop("src", "/images/circle_filled.png");
			});

			var video_tab = "video_list_highlights";

			$(".video_element").hover(function() {
			$(this).css({backgroundPosition: "0 33px", color: "#444"});
			}, function() {
			if ($(this).prop("id") != video_tab) {
			$(this).css({backgroundPosition: "0 0", color: "#0054af"});
			}
			});

			$(".video_element").click(function() {
			$("#" + video_tab).css({backgroundPosition: "0 0", color: "#0054af"});

			video_tab = $(this).prop("id");

			$("#" + video_tab).css({backgroundPosition: "0 33px", color: "#444"});
			});

			var writer_tab = "writer_personality";

			$(".writer_element").hover(function() {
			$(this).css({backgroundPosition: "0 33px", color: "#444"});
			}, function() {
			if ($(this).prop("id") != writer_tab) {
			$(this).css({backgroundPosition: "0 0", color: "#0054af"});
			}
			});

			$(".writer_element").click(function() {
			$("#" + writer_tab).css({backgroundPosition: "0 0", color: "#0054af"});
			$("#" + writer_tab + "_list").css({display: "none"});

			writer_tab = $(this).prop("id");

			$("#" + writer_tab).css({backgroundPosition: "0 33px", color: "#444"});
			$("#" + writer_tab + "_list").css({display: "block"});
			});
			<?php include('nav_js.php'); ?>
			-->
		</script>	
		
		<?php include("layouts/background_ads.php"); ?>
	</body>
</html>

?>

