<?php
	$part_page = "global_games2013";
	//$part_page = "index";

	$beta = false;
	include('queries/global-queries-new.php');
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US" xmlns:fb="http://ogp.me/ns/fb#">	  
<head>

	<title>NBA Philippines | Global Games 2013</title>

	<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1" /> 	
	<META http-equiv="X-UA-Compatible" content="IE=9" />

	<meta property="og:title" content="NBA Global Games Philippines 2013"/>
	<meta property="og:type" content="article"/>
	<meta property="og:description" content="NBA Global Games Philippines 2013"/>
	<meta property="og:site_name" content="NBA Global Games Philippines 2013"/>
	<meta property="og:url" content="<?php echo $base."nbaglobalgamesphilippines2013/"; ?>/"/>	
	
	<meta property="og:image:url" content="<?php echo $base; ?>media/2.0/global-games/fb_image_default.jpg"/>	
	<meta property="og:image" content="<?php echo $base; ?>media/2.0/global-games/fb_image_default.jpg"/>	
	
	<meta property="fb:admins" content="668328204" />

	<link rel="stylesheet" type="text/css" href="/css/style.css">
	<link rel="stylesheet" type="text/css" href="/css/style-index.css">
	<link rel="stylesheet" type="text/css" href="/css/style-new.css">	
	<link rel="stylesheet" href="/css/jquery-ui.css" />
	
	<script type="text/javascript" src="jquery-1.9.1.js"></script>
	<script type="text/javascript" src="jquery-ui.js"></script>
	<!--script type="text/javascript" src="carousel-index.js"></script-->

	<link href="/css/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="/css/calendar.css" rel="stylesheet" media="screen">	
	<script type="text/javascript" src="/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/calendar.js"></script>
	</head>
	<body>
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=131694290309870";
		fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>

		<div id="wrapper">
			<?php include('layouts/header.php'); ?>
			<style>
				.main-content{
					background:#EC003D !important;
					color:#ffe463;
				}
				blockquote > small{color:#fff;}
				.content-container{					
					min-height: 100px;
					margin:20px;
				}
				.content-left, .content-right{					
					min-height: 100px;
					float:left;					
				}
				.content-left{					
					width: 595px;
					margin-right:20px;
					/*border:1px solid #f6f6f6;*/
					
				}
				.content-right{					
					width: 340px;
				}
				.content-right-data{
					background:#a90b33;
					padding:20px;
					border:1px solid #a90b33;
					border-radius: 2px;
					min-height: 324px;
				}
				.content-right-data h3{margin:0;}
				div.carousel[id=myCarousel]{
					width:595px !important;
					height:325px !important;
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
			</style>
			<div id="main_content" class='main-content'> 
				<div id='header'>
					<div style="height: 358px">
						<img src='/media/2.0/global-games/header-v2.jpg' width="1000" height="358">
					</div>
					<div class='sponsors'>
						<div>
							<span class='sponsor-title'>OFFICIAL PARTNERS</span>
							<span class='sponsor-title'>PROMOTIONAL PARTNERS</span>							
						</div>
						<div>
							<span class='sponsor-official'>
								<span class='sponsor-official-icon'><a href="http://www.facebook.com/GatoradePH"><img src='/media/2.0/global-games/gatorade.png' /></a></span>
								<span class='sponsor-official-icon'><a href="http://www.facebook.com/phoenixpetroleum"><img src='/media/2.0/global-games/phoenix.png' /></a></span>
								<span class='sponsor-official-icon'><a href="http://www.brighterlife.com.ph/"><img src='/media/2.0/global-games/sunlife.png' /></a></span>
							</span>
							<span class='sponsor-promotional'>
								<span class='sponsor-official-icon'><a href="https://www.facebook.com/adidasPH/"><img src='/media/2.0/global-games/addidas.png' /></a></span>
								<span class='sponsor-official-icon'><a href="http://www.sprite.com/"><img src='/media/2.0/global-games/sprite.png' /></a></span>
								<span class='sponsor-official-icon'><a href="http://on.fb.me/15ougIF/"><img src='/media/2.0/global-games/NBA2k14.png' /></a></span>
							</span>
						</div>
						<div class='clear'></div>
						<div>
							<span class='sponsor-details'>
								7:00PM - OCTOBER 10, 2013 MALL OF ASIA ARENA
							</span>
						</div>
					</div>
					<div class='social-like-fb'>
						<div class="fb-like" data-href="<?php echo $base; ?>nbaglobalgamesphilippines2013/" data-width="100" data-show-faces="false" data-send="true"></div>
						<div>
							<a href="https://twitter.com/NBA_Philippines" class="twitter-follow-button" data-show-count="false">Follow @NBA_Philippines</a>
							<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
							<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://ph.nba.com/nbaglobalgamesphilippines2013" data-via="NBA_Philippines" data-size="small">Tweet</a>
							<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>							
						</div>
					</div>	      	  			          		
				</div>
				<div class='content-container'>
					<!--script type="text/javascript" src="carousel-index.js"></script-->
					<div class='content-left'>
						<div id="myCarousel" class="carousel slide">
							<ol class="carousel-indicators">
								<?php foreach($featured as $k=>$v): ?>
								<li data-target="#myCarousel" data-slide-to="<?php echo $k; ?>" <?php echo ($k==0)?"class='active'":"";?>></li>								
								<?php endforeach; ?>
							</ol>
							<!-- Carousel items -->
							<div class="carousel-inner">
								<?php foreach($featured as $k=>$v): ?>
									<div class="item<?php echo ($k==0)?' active':''; ?>">
										<img src='<?php echo $v['carousel_link']; ?>' width='595' height='420' alt/>
										<div class='carousel-caption'>
											<h4><?php echo $v['title']; ?></h4>
											<p><?php echo $v['excerpt']; ?></p>
										</div>
									</div>
								<?php endforeach; ?>								
							</div>
							<!-- Carousel nav -->
							<a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
							<a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
						</div>
					</div>
					<div class='content-right'>
						<div class='content-right-data'>
							<h3 style='color:#fff;'>Calendar Events</h3>
							<div class='calendar' id='calendar'></div>							
						</div>
					</div>
					<div class='clear'></div>
				</div><!-- content-container -->
				
				<div class='content-container'>
	          		<div style="width: 960px; height: 90px; margin: 0 auto; text-align: center; ">
						<?php echo $ads_list['nba_global_games_2013'];?>						
						<!--nba_homepage_top_leaderboard-->
		          	</div>    
	          	</div>
	          	<div class='content-container'>
	          		<div class='content-left'>
	          			<div class='social-media' style='width:600px;'>		          			
		          			<ul class="nav nav-tabs" id="myTab">
		          				<h3>Social Media</h3>
								<li><a href="#facebook" data-toggle='tab'>Facebook</a></li>
								<li class="active"><a href="#twitter" data-toggle='tab'>Twitter</a></li>								
							</ul>
							<div class="tab-content" style='border:2px solid #fff; overflow-x:hidden; border-radius:0 0 2px 2px;'>
								<div class="tab-pane" id="facebook" style='background:#333333;' >									
									<div class="fb-like-box" data-href="https://www.facebook.com/philsnba" data-width="596" data-colorscheme="dark" data-show-faces="true" data-header="false" data-stream="true" data-show-border="false"></div>
								</div>
								<div class="tab-pane active" id="twitter" style='background:#333;'>
									<a class="twitter-timeline"  href="https://twitter.com/search?q=%40NBA_Philippines%2BOR%2BNBAGlobalGames%2BOR%2B%40Pacers%2BOR%2B%40HoustonRockets"  data-widget-id="382793238425268224">Tweets about "@NBA_Philippines+OR+NBAGlobalGames+OR+@Pacers+OR+@HoustonRockets"</a>
									<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
								</div>
								
							</div>
		          		</div>
		          		<hr/>
	          			<h3>Related Articles</h3>
	          			<div class='related-article'>
		          			<?php foreach($related_article as $k=>$v): ?>
		          			<blockquote>
		          				<p><?php echo $v['title']; ?></p>
		          				<small><?php echo $v['excerpt']; ?></small>
		          			</blockquote>	
		          			<?php endforeach; ?>
		          		</div>			          		
	          		</div>
	          		<div class='content-right'>	
	          			<div class='content-right-data bottom-space2'>
	          				<h3 style='color:#fff;'>Videos</h3>
	          				<?php echo html_entity_decode($video['embedded_code']); ?>
	          				<a href="/nbaglobalgamesphilippines2013/videos">More Videos</a>
	          			</div>
	          			<div class='content-right-data'>
	          				<h3 style='color:#fff;'	>Photo Gallery</h3>
	          				<div id="myCarouselImages" class="carousel slide">
								<ol class="carousel-indicators">
									<?php foreach($images as $k=>$v): ?>
									<li data-target="#myCarouselImages" data-slide-to="<?php echo $k; ?>" <?php echo ($k==0)?"class='active'":"";?>></li>								
									<?php endforeach; ?>
								</ol>
								<!-- Carousel items -->
								<div class="carousel-inner">
									<?php foreach($images as $k=>$v): ?>
										<div class="item<?php echo ($k==0)?' active':''; ?>">
											<img src='<?php echo $v['image_link']; ?>' width='300' height='260' alt/>
											<?php if($v['title'] !== ''): ?>
											<div class='carousel-caption'>												
												<p><?php echo $v['title']; ?></p>
											</div>
											<?php endif; ?>
										</div>
									<?php endforeach; ?>								
								</div>
								<!-- Carousel nav -->
								<!--a class="carousel-control left" href="#myCarouselImages" data-slide="prev">&lsaquo;</a>
								<a class="carousel-control right" href="#myCarouselImages" data-slide="next">&rsaquo;</a-->
							</div>
	          			</div>

	          		</div>
	          		<div class='clear'></div>
	          	</div>
	          	<script>
					$(document).ready(function(){
						$("#myCarousel").carousel();
						$("#myCarouselImages").carousel();
						
						$('#calendar').calendar({
							today:(new Date().getTime()), 
							data:[<?php foreach($calendar as $k=>$v){		
							echo "{title:'".$v['title']."',event_date:'".$v['date_of_event']."',click_through:'". ((isset($v['click_through']) && trim($v['click_through'])!="")?$v['click_through']:""). "'},";
							} ?>],
							connection:'/ajax.global.php'
						});	
						$('#myTab a:last').tab('show');
						/*$(".my-pop").popover({trigger:'hover',placement:'top'});*/
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
		<?php include("layouts/background_ads.php"); ?>		
				
	</body>

</html>
