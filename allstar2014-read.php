<?php	
	
	$part_page = "allstar2014";
	
	include('queries/allstar-read.php');	
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US" xmlns:fb="http://ogp.me/ns/fb#">	  
<head>
	
	<title>NBA Philippines | All Star 2014</title>
	
	<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1" /> 	
	<META http-equiv="X-UA-Compatible" content="IE=9" />
	<link type="image/x-icon" href="favicon16.ico" rel="icon">
	<link rel="stylesheet" type="text/css" href="/css/style.css">
	<link rel="stylesheet" type="text/css" href="/css/style-index.css">
	<link rel="stylesheet" type="text/css" href="/css/style-new.css">
	
	<link rel="stylesheet" href="/css/jquery-ui.css" />
	<script type="text/javascript" src="jquery-1.9.1.js"></script>
	<script type="text/javascript" src="jquery-ui.js"></script>
	<!--script type="text/javascript" src="carousel-index.js"></script-->

	<link href="/css/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<!--link href="calendar.css" rel="stylesheet" media="screen"-->	
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<style>
		body{background:#161616 !important;}
		#wrapper{background:#000;}
		.main-content{			
			color:#fff;		
			background-color:#000 !important;
		}
		
		blockquote > small{color:#fff;}
		.content-container{					
			min-height: 100px;
			padding:20px;			
		}
		.content-left{			
			float:left;					
		}
		.content-left{					
			width: 630px;
			margin-right:20px;
			/*border:1px solid #f6f6f6;*/
			
		}
		.content-right{	
			float:right;
			width: 300px;
		}		
		.content-right-data h3{margin:0;}
		div.carousel[id=myCarousel]{
			background: none repeat scroll 0 0 #FFFFFF;
			height: 365px !important;			
			width: 630px !important;
		}
		#myCarousel > .carousel-inner > .item > img, .carousel-inner > .item > a > img{width: 595px !important; height:365px !important;}

		div.carousel[id=myCarouselImages]{
			width:300px !important;
			height:260px !important;
		}
		#myCarouselImages > .carousel-inner > .item > img, .carousel-inner > .item > a > img{width: 300px !important; height:260px !important;}

		.related-article{padding:0 20px;}
		.popover{color:#444 !important; min-width: 300px !important;}
		.bottom-space2{margin-bottom: 20px;}
		.top-space5{margin-top:50px;}
		#myTab{
			width: 600px;
			margin-bottom: 0;
		}
		hr{border-top:1px solid #A90B33; border-bottom:none;}
		#myTab h3{
			float:left;
			margin:0;
			padding:0;
			line-height: 35px;

		}
		#myTab li{
			float:right;
			margin-left:10px !important;
			margin-right:0 !important;
			
		}
		#twitter-widget-2 {
			width:596px !important;
		}
		/*#header{background:url(/media/2.0/global-games/header-v3.jpg);}*/
		.social-like-fb{
			position: absolute;
			bottom: 0;
			right: 0;
		}
		.sponsors{
			position: absolute;
			width: 670px;
			bottom: 65px;
			left:175px;				
			height: 40px;
		}
		.sponsors div{width: 670px;}
		.sponsors span.sponsor-title{display: block; float:left; width:335px; text-align: center; color:#fff;}
		.sponsor-official, .sponsor-promotional{display: block; float:left; width: 335px; text-align: center}
		.sponsor-details{display: block; font-size:18px; font-weight: bold; width: 250px; text-align: center; color:#fff; margin:0 auto; padding-top:10px;}		
		.adslot-750x180{height: 180px; float: left; line-height:180px; margin-top:5px;}
		.adslot-960x50{width: 960px;}		
		.adslot-300x250{width: 300px; height: 250px; line-height:250px;}		
		.adslot-300x250, .adslot-960x50, .adslot-750x180{text-align: center; vertical-align: middle; }
		.spacer-20{height:20px;}
		.sched span{font-style:italic;}
		.sched h4{padding:10px 0 2px; margin:0; cursor:pointer}
		.sched h4:hover{color:#0088CC;}
		.sched ul li{font-size:12px; line-height:15px;}
		.sched ul{display:none;}
		
		.active ul{display:block !important; }
		.active h4{color:#0088CC; cursor:default !important;}
		.feed-read, .feed-photo{position:relative;}
		.feed-short-story h3{margin:0;}
		.feed-short-story{
			bottom: 0;
			padding: 10px;
			position: absolute;
			width: 610px;
			background:none repeat scroll 0 0 rgba(0, 0, 0, 0.75);
		}	
		.articles ul li{font-size:14px;}
		.articles ul li span{font-size:12px; color:gray;}
		.articles, .feed{border-bottom: 1px dashed #808080; padding-bottom: 20px;}
		.all-star-gallery{text-align:center;}
		.feed-photo span{display:block; width:630px; background:#1E1E1E; text-align:center;}
	</style>
	<link rel="stylesheet" type="text/css" href="/media/2.0/allstar/2014/default.css"/>
	<link rel="stylesheet" type="text/css" href="/media/2.0/allstar/2014/jcarousel-skin.css" />
	<script type="text/javascript" src="/media/2.0/allstar/2014/jquery.jcarousel.min.js"></script>
	
	</head>
	<body>			
		<div id="wrapper">
			<?php include('layouts/header.php'); ?>
			
			<div id="main_content" class='main-content'> 
				<div id='header'>
					<div style="height: 200px; background:#06396A">
						<div style='float:left;'>
							<img src='/media/2.0/allstar/2014/logo-allstar2014.png' style='margin:10px 30px;' />
						</div>
						<div class='adslot-750x180'>
							<script type='text/javascript'>
								var googletag = googletag || {};
								googletag.cmd = googletag.cmd || [];
								(function() {
								var gads = document.createElement('script');
								gads.async = true;
								gads.type = 'text/javascript';
								var useSSL = 'https:' == document.location.protocol;
								gads.src = (useSSL ? 'https:' : 'http:') +
								'//www.googletagservices.com/tag/js/gpt.js';
								var node = document.getElementsByTagName('script')[0];
								node.parentNode.insertBefore(gads, node);
								})();
								</script>

								<script type='text/javascript'>
								googletag.cmd.push(function() {
								googletag.defineSlot('/7741304/Special_Leaderboard_1_728x90', [728, 90], 'div-gpt-ad-1392357082821-0').addService(googletag.pubads());
								googletag.pubads().enableSingleRequest();
								googletag.enableServices();
								});
							</script>

							<!-- Special_Leaderboard_1_728x90 -->
							<div id='div-gpt-ad-1392357082821-0' style=''>
							<script type='text/javascript'>
							googletag.cmd.push(function() { googletag.display('div-gpt-ad-1392357082821-0'); });
							</script>
							</div>
						</div>
						<div class='clear'></div>
					</div>		
					<div style="padding:20px; background:#000">		
						<div class="adslot-960x50">
								<script type='text/javascript'>
								var googletag = googletag || {};
								googletag.cmd = googletag.cmd || [];
								(function() {
								var gads = document.createElement('script');
								gads.async = true;
								gads.type = 'text/javascript';
								var useSSL = 'https:' == document.location.protocol;
								gads.src = (useSSL ? 'https:' : 'http:') +
								'//www.googletagservices.com/tag/js/gpt.js';
								var node = document.getElementsByTagName('script')[0];
								node.parentNode.insertBefore(gads, node);
								})();
								</script>

								<script type='text/javascript'>
								googletag.cmd.push(function() {
								googletag.defineSlot('/7741304/Special_Leaderboard_2_728x90', [728, 90], 'div-gpt-ad-1392357151633-0').addService(googletag.pubads());
								googletag.pubads().enableSingleRequest();
								googletag.enableServices();
								});
							</script>

							<!-- Special_Leaderboard_2_728x90 -->
							<div id='div-gpt-ad-1392357151633-0' style='margin:0 auto;'>
							<script type='text/javascript'>
							googletag.cmd.push(function() { googletag.display('div-gpt-ad-1392357151633-0'); });
							</script>
							</div>
						</div>					
					</div>
				</div>
			</div>	
			<div id="main_content" class='main-content border-leftright'> 			
				<div style='height:30px; padding-left:30px;'><img src='/media/2.0/allstar/2014/allstar-newsfeed.png' /></div>
				<div class='content-container'>		
					<div class='content-left'>
						<div class='feed-read'>
							<div class='feed-photo'>
								<span><img src='<?php echo $allstar[0]['Photo']; ?>' /></span>
							</div>
							<h3><?php echo $allstar[0]['Title']; ?></h3>
							<span><?php echo $allstar[0]['Body']; ?></span>
						</div>
						<!--div class="addthis_div" >
                              <div class="addthis_position" style='padding:10px;'>
                              
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
							var disqus_url = '<?php echo $base; ?>allstar2014/<?php echo $search_allstar_id; ?>/<?php  echo seoUrl($allstar[0]['Title']); ?>';
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
					<div class='content-right'>
						<div class='content-right-data adslot-300x250'>
							<script type='text/javascript'>
								var googletag = googletag || {};
								googletag.cmd = googletag.cmd || [];
								(function() {
								var gads = document.createElement('script');
								gads.async = true;
								gads.type = 'text/javascript';
								var useSSL = 'https:' == document.location.protocol;
								gads.src = (useSSL ? 'https:' : 'http:') +
								'//www.googletagservices.com/tag/js/gpt.js';
								var node = document.getElementsByTagName('script')[0];
								node.parentNode.insertBefore(gads, node);
								})();
								</script>

								<script type='text/javascript'>
								googletag.cmd.push(function() {
								googletag.defineSlot('/7741304/Special_MRec_1_300x250', [300, 250], 'div-gpt-ad-1392357194016-0').addService(googletag.pubads());
								googletag.pubads().enableSingleRequest();
								googletag.enableServices();
								});
							</script>

							<!-- Special_MRec_1_300x250 -->
							<div id='div-gpt-ad-1392357194016-0' style='width:300px; height:250px;'>
							<script type='text/javascript'>
							googletag.cmd.push(function() { googletag.display('div-gpt-ad-1392357194016-0'); });
							</script>
							</div>
						</div>
						<div class='spacer-20'></div>
						<div class='content-right-data'>
							<div style='height:30px; text-align:center;'>
								<img src='/media/2.0/allstar/2014/allstar-sched.png' />
							</div>
							
							<div class='schedules'>
								<div class='sched active'>
									<h4>THURSDAY, FEB. 13</h4>
									<span>ALL TIMES EASTERN (ET)</span>
									<ul>
										<li><b>10 a.m. - 5 p.m.</b> | All Day Dunk-A-Thon | <a href='http://watch.nba.com/nba/live'>NBA TV</a></li>
										<li><b>5 p.m.</b> | The Starters | <a href='http://watch.nba.com/nba/live'>NBA TV</a></li>
										<li><b>6 p.m.</b> | NBA GameTime | <a href='http://watch.nba.com/nba/live'>NBA TV</a></li>
										<li><b>7 p.m. - 2 a.m.</b> | All Day Dunk-A-Thon | <a href='http://watch.nba.com/nba/live'>NBA TV</a></li>
									</ul>	
								</div>
								<div class='sched'>
									<h4>FRIDAY, FEB. 14</h4>
									<span>ALL TIMES EASTERN (ET)</span>
									<ul>
										<li><b>10:30 a.m.</b> | BBVA Compass Rising Stars Challenge Practice | <a href='http://watch.nba.com/nba/live'>NBA TV</a></li>
										<li><b>Noon</b> | Basketball Hall of Fame announcement | <a href='http://watch.nba.com/nba/live'>NBA TV</a></li>
										<li><b>12:30 p.m.</b> | NBA All-Star 2014 Media Day | <a href='http://watch.nba.com/nba/live'>NBA TV</a></li>
										<li><b>5 p.m.</b> | The Beat | <a href='http://watch.nba.com/nba/live'>NBA TV</a> </li>
										<li><b>6 p.m.</b> | The Starters | <a href='http://watch.nba.com/nba/live'>NBA TV</a></li>
										<li><b>7 p.m.</b> | Sprint NBA All-Star Celebrity Game | ESPN</li>
										<li><b>12 a.m.</b> | NBA GameTime | <a href='http://watch.nba.com/nba/live'>NBA TV</a></li>
									</ul>	
								</div>
								<div class='sched'>
									<h4>SATURDAY, FEB. 15</h4>
									<span>ALL TIMES EASTERN (ET)</span>
									<ul>
										<li><b>11:30 a.m.</b> | NBA Inside Stuff | <a href='http://watch.nba.com/nba/live'>NBA TV</a></li>
										<li><b>Noon</b> | East/West Practice & player interviews | <a href='http://watch.nba.com/nba/live'>NBA TV</a></li>
										<li><b>3 p.m.</b> | 2014 NBA D-League All Star Game | <a href='http://watch.nba.com/nba/live'>NBA TV</a> </li>
										<li><b>7 p.m.</b> | Adam Silver news conference | <a href='http://watch.nba.com/nba/live'>NBA TV</a> </li>
										<li><b>12 a.m.</b> | NBA GameTime | <a href='http://watch.nba.com/nba/live'>NBA TV</a> </li>
									</ul>	
								</div>
								<div class='sched'>
									<h4>SUNDAY, FEB. 16</h4>
									<span>ALL TIMES EASTERN (ET)</span>
									<ul>
										<li><b>1 p.m.</b> | Legends Brunch | <a href='http://watch.nba.com/nba/live'>NBA TV</a> </li>
										<li><b>5 p.m.</b> | NBA GameTime | <a href='http://watch.nba.com/nba/live'>NBA TV</a></li>
										<li><b>6 p.m.</b> | Sprint Pregame Concert | <a href='http://watch.nba.com/nba/live'>NBA TV</a></li>
										<li><b>11:30 p.m.</b> | Inside the NBA | <a href='http://watch.nba.com/nba/live'>NBA TV</a></li>									
									</ul>	
								</div>	
							</div>
							
						</div>
						<div class='spacer-20'></div>
						<div class="vote content-right-data" style='text-align:center;'> 
							<span><img src="/media/2.0/allstar/2014/vote2.jpg"></span>
							
							<object allowscriptaccess="always" type="application/x-shockwave-flash" data="http://plugin.control.objectembed.info/mac.swf?id=400464:1&lang=en" bgcolor="#FFFFFF" width="300" height="162" wmode="transparent"><param name="allowscriptaccess" value="always" /><param name="movie" value="http://plugin.control.objectembed.info/mac.swf?id=400464:1&lang=en" /><param name="bgcolor" value="#FFFFFF" /><embed src="http://plugin.control.objectembed.info/mac.swf?id=400464:1&lang=en" type="application/x-shockwave-flash" allowscriptaccess="always" wmode="transparent" bgcolor="#FFFFFF" width="300" height="162" /><video width="300" height="162"><a title="FX知恵袋" style="font-style:italic;font-size:120%" href="http://www.forex-kaigai.com/3shurui.html">www.forex-kaigai.com</a></video></object>							
						</div>
						<div class='spacer-20'></div>
						<div class='content-right-data'>
							<div class="tab-pane active" id="twitter" style='background:#333;'>								
								<a class="twitter-timeline" href="https://twitter.com/AllStar2014" data-widget-id="431365991860158464">Tweets by @AllStar2014</a>
								<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
							</div>
						</div>
					</div>
					<div class='clear'></div>
				</div>
	          	<script>
					$(document).ready(function(){
						$('.sched').click(function(){
							if(!$(this).hasClass('active')){
								$('.sched').each(function(){
									$(this).removeClass('active');
								});
								$(this).addClass('active');
							}	
						});
						$('#mycarousel').jcarousel({
							start: 1,
							scroll:3
						});
						$("#mycarousel li img").click(function(){
							var imgA = $(this).attr("src");
							//alert(img);
							$(".large-image .img-wrap").attr("style","background-image: url("+imgA+")");
						});
					});
				</script>
	          	<div style='background:#fff;'>
		          	<?php 
		          	//$footer_ads = $ads_list['nba_homepage_bottom_leaderboard']; 
		          	include('layouts/links.php'); 
		          	include('layouts/footer.php');
		          	?>
		          	<div class='clear'></div>
	          	</div>
          	</div><!-- main_content -->   
          	
		</div><!-- wrapper -->		
		<?php //include("layouts/background_ads.php"); ?>		
					
	</body>
	
</html>

