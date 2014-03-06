<!DOCTYPE html>
<html dir="ltr" lang="en-US" xmlns:fb="http://ogp.me/ns/fb#">	  
<head>
	<?php
	$part_page = "videos";
	include('queries/video-queries.php');
	$remote_addr = $_SERVER['REMOTE_ADDR'];
	$geo_data = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip={$remote_addr}"));	
	$geoLocBlocked = ($geo_data['geoplugin_countryCode'] != 'PH');
	
	$bypass_geoblock = isset($_GET['bypass-geoblock'])?$_GET['bypass-geoblock']:'000';
	?>
	<title>NBA Philippines | Videos</title>
	<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1" /> 
	<META name='description' content='<?php echo stripslashes($current_video['title']); ?>' />
	<META name="keywords" content='<?php echo $current_video['tags']; ?>' />
	
	<meta property="og:title" content="<?php echo stripslashes($current_video['title']); ?>"/>
	<meta property="og:type" content="article"/>
	<meta property="og:description" content="<?php echo stripslashes($current_video['description']); ?>"/>
	<meta property="og:site_name" content="NBA Philippines"/>
	<meta property="og:url" content="<?php echo $base."videos/?id=".$id; ?>"/>	
	<meta property="og:image:url" content="<?php echo $base; ?>ftp-web/<?php echo $current_video['large_image'] ?>"/>	
	<meta property="og:image" content="<?php echo $base; ?>ftp-web/<?php echo $current_video['large_image'] ?>"/>	
	<meta property="fb:admins" content="668328204" />

	<link rel="stylesheet" type="text/css" href="/css/style.css">	
	<link rel="stylesheet" type="text/css" href="/css/style-new.css">
	<link rel="stylesheet" type="text/css" href="/css/videos.css">
	<!--[if IE]>
	<link rel="stylesheet" type="text/css" href="ie_style.css">
	<![endif]-->
	<!--[if IE 7]>
	<link rel="stylesheet" type="text/css" href="ie7_style.css">
	<![endif]-->
	
	<script type="text/javascript" src="jquery-1.7.1.min.js"></script>	
	<!-- 1. skin -->
	<link rel="stylesheet" href="//releases.flowplayer.org/5.4.4/skin/minimalist.css">
	 
	<!-- 2. jquery library -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	 
	<!-- 3. flowplayer -->
	<script src="//releases.flowplayer.org/5.4.4/flowplayer.min.js"></script>

	
	<?php if(!is_null($v_ads)): ?>
	<!--script src="/js/flowplayer-3.2.11.min.js"></script-->
	<?php endif; ?>

	<script type="text/javascript" src="/pagination/jquery.simplePagination.js"></script>
	<link rel="stylesheet" type='text/css' href="/pagination/simplePagination.css">	
	<script src="//connect.facebook.net/en_US/all.js"></script>


	</head>
	<body>
		<div id="fb-root"></div>						
		<script>

		 	window.fbAsyncInit = function() {
			    // init the FB JS SDK
			    FB.init({
			      	appId      : '131694290309870', // App ID from the App Dashboard
			      	channelUrl : '//connect.facebook.net/en_US/all.js', // Channel File for x-domain communication
			      	status     : true, // check the login status upon init?
			      	cookie     : true, // set sessions cookies to allow your server to access the session?
			      	xfbml      : true  // parse XFBML tags on this page?
			    });
			    // Additional initialization code such as adding Event Listeners goes here

			    FB.Event.subscribe('edge.create',			    	
				    function(response) {				    	
				        $.ajax({
							'url' : '/ajax-videos.php?action=liked',
							'type' : 'POST',
							'dataType' : 'json',
							'data' : {id : "<?php echo $current_video['id']; ?>"},
							success:function(data){
								
							}
						});
				    }
				);
			};
			(function(d, debug){
		     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
		     if (d.getElementById(id)) {return;}
		     js = d.createElement('script'); js.id = id; js.async = true;
		     js.src = "//connect.facebook.net/en_US/all" + (debug ? "/debug" : "") + ".js";
		     ref.parentNode.insertBefore(js, ref);
		   }(document,  false));
		</script>
	
		<?php include('layouts/popups.php'); ?>
		<div id="wrapper">
			<?php include('layouts/header.php'); ?>
			<div id="main_content" > 				
				<div class='video-display' >
					<div class='main-video'>						
						<?php if(is_null($v_ads)): ?>
						<!--div class="player-box" style="width:630px; height:360px;">
							<script src="//embed.flowplayer.org/5.4.2/embed.min.js">							
								<div class="flowplayer" style="width: 630px; height: 360px">
							      	<video>
							         	<source type="video/mp4" src="< ?php echo $base; ?>ftp-web/< ?php echo $current_video['filename'].".".strtolower($current_video['format']); ?>">						         
							      	</video>
								</div>
							</script>
						</div-->							
						<div class="player-box" style="width:630px; height:360px;" data-engine="flash">
							<?php if(($geoLocBlocked == true) && ($bypass_geoblock != '123')): ?>	
								<div style="width:100%; height:100%; background:#000;">
									<span style='display:block; width:60%; padding-top:150px; margin:0 auto; color:#fff; text-transform:uppercase; text-align:center;'>The video you were trying to watch cannot be viewed from your current country or location</span>
								</div>
							<?php else: ?>
								<video id='contentElement' width="630" height="360" controls>
									<source type="video/mp4" src="<?php echo $base; ?>ftp-web/<?php echo $current_video['filename'].".".strtolower($current_video['format']); ?>"></source>								
									<source type="video/mov" src="<?php echo $base; ?>ftp-web/<?php echo $current_video['filename'].".".strtolower($current_video['format']); ?>"></source>								
								</video>									
								<div id='adContainer' style='
									position: absolute;								
									top: 0px;
									left: 0px;
									width: 630px;				
									height: 360px;'></div>								
							<?php endif; ?>								
						</div>		
						<?php else: ?>
						<div class='player-vid' id='player-vid' style="width: 630px; height: 360px"></div>												
						<?php endif; ?>	
						<div id="ads-tip-content" style="display:none; ">
							<p>Tap the video ads for more info</p>
						</div>
						<div id='ads-skip-content' style='display:none;'> 							
						</div>
						<div class='vid-details'>
							<span class='title'><?php echo stripslashes($current_video['title']); ?></span>
							<?php 
					    		$u_agent = $_SERVER['HTTP_USER_AGENT'];
					    		 if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)){
					    		 	echo "<br/>";		
					    		 } 
							?>						    	
							<span class='intro'><?php echo stripslashes($current_video['description']); ?></span>
							<span class='duration'><?php echo $current_video['duration']; ?></span>
						</div>

					</div>
					<div class='mostlikes-video'>						
						<div style="padding:0px 5px; height:29px;" class="fb-like" data-href="<?php echo $base; ?>videos/?id=<?php echo $current_video['id']; ?>" data-send="false" data-width="305" data-show-faces="false" data-colorscheme="dark"></div>
						

						<div class='sns-title'>Daily Most Liked</div>
						<?php foreach($most_likes as $likes): ?>
							<div class='top-playlist'>
								<div class='top-playlist-col top-playlist-image'>
									<a href='/videos/?id=<?php echo $likes['id']; ?>'>
									<?php //if(file_exists("./ftp-web/".$likes['small_image']) && trim($likes['small_image'])!=""):?>	
									<img src="/ftp-web/<?php echo $likes['small_image']; ?>" title='<?php echo $likes['description']; ?>' width="150" height="84"/>
									<?php //else: ?>
									<!--img src='/ftp-web/default.jpg' title='<?php echo $likes['description']; ?>' /-->
									<?php //endif; ?>
									</a>
								</div>
								<div class='top-playlist-col top-playlist-content'>
									<a href='/videos/?id=<?php echo $likes['id']; ?>'>
									<span class='title'><?php echo myTruncate($likes['title'],20); ?></span>
									<span class='description'><?php echo $likes['description']; ?></span>
									</a>
								</div>
								<div class='clear'></div>
							</div>	
						<?php endforeach; ?>	
						
					</div>
					<div class='clear'></div>
				</div> 
				
				<script type="text/javascript">	
					<?php if(!is_null($v_ads)): ?>
					flowplayer("player-vid","<?php echo $base; ?>js/flowplayer-3.2.15.swf",						
						{
							clip:{
								baseUrl:"<?php echo $base; ?>ftp-web/"								    							
								
							},		
							plugins:{								
					            controls:{display:"none"},
						        tip_content: {          
						        	// the only required property
						         	url: '<?php echo $base; ?>js/flowplayer.content-3.2.8.swf',
						          	bottom:140,
						          	left:200,	
						          	height: 30,
						            width: 200,						         	
						         	opacity: 0.8,			
						         	textAlign: 'center',
						         	border:"none",
						         	borderRadius:5,						         	
						         	html: document.getElementById("ads-tip-content").innerHTML					            	
					            },
					            skip_content:{
					            	// the only required property
						         	url: '<?php echo $base; ?>js/flowplayer.content-3.2.8.swf',								            						          	
						          	bottom:5,
						          	right:0,	
						            height: 25,
						            borderRadius:0,
						            border:0,
						            skip:false,						            
						            width: 0,
						         	/*backgroundImage:'url(/media/2.0/skip-ads.png) transparent',
						         	fontStyle:'Tahoma,Arial',
						         	opacity: 0.9,									         							         	
						         	border:0,
						         	borderRadius:0,*/
						         	html: document.getElementById("ads-skip-content").innerHTML,					            	
					            	onClick:function(){	
					            		if(this.skip){
						            		this.getPlayer().play(1);					            		
						            		this.fadeOut(2000);					            		
						            	}
					            	}
					            }					            
							},
							onLoad:function(){
				            	//this.getPlugin("skip_content").fadeOut();
				            },		
							onMouseOver:function(){
								if(this.getClip().index == 0 && this.getPlugin("skip_content").skip){									
									this.getPlugin("skip_content").animate({width:40});									        		
								}
							},
							onMouseOut:function(){
								if(this.getClip().index == 0 && this.getPlugin("skip_content").skip){
									this.getPlugin("skip_content").animate({width:0});									        		
								}
							},					
							playlist:[
								{								
						           	url: "ads/<?php echo $v_ads['filename']; ?>",
						 			linkUrl:"<?php echo $base.'link-forwarder/preroll/'. $v_ads['id']; ?>", // create a redirect link
									linkWindow:"_blank",						            
						            onBeforePause: function() {
						                return false;
						            },
						            onCuepoint: [
								        // set up last two cuepoints with custom properties
								        [1000,2000,3000,4000,5000,6000,10000], 
								        function(clip,cuepoint){
								        	switch(cuepoint){
								        		case 1000:

								        			this.getPlugin("skip_content").animate({width:70});
								        			this.getPlugin("skip_content").setHtml("Wait in 5");
								        			break;
								        		case 2000:
								        			this.getPlugin("skip_content").setHtml("Wait in 4");
								        			break;
								        		case 3000:
								        			this.getPlugin("skip_content").setHtml("Wait in 3");
									        		this.getPlugin("tip_content").fadeOut(2000);
									        		break;
									        	case 4000:
									        		this.getPlugin("skip_content").setHtml("Wait in 2");
									        		break;
									        	case 5000:
									        		this.getPlugin("skip_content").setHtml("Wait in 1");
									        		break;
									        	case 6000:
									        		this.getPlugin("skip_content").setHtml("Skip");
									        		this.getPlugin("skip_content").animate({width:40});
									        		this.getPlugin("skip_content").skip = true;
									        		break;
									        	case 10000:
									        		this.getPlugin("skip_content").animate({width:0});									        		
									        	default:
									        		break;
									        }		

								        }
								    ]						            						            
								},
								{
									url: '<?php echo $current_video['filename'].".".strtolower($current_video['format']); ?>',
									
						            onStart: function() {						            	
						            	this.getPlugin("tip_content").hide();
						            	this.getPlugin("skip_content").hide();
						                this.getControls().show();
						            },
						 
						            // when playback finishes player is resumed back to its original state
						            onFinish: function() {
						                this.unload();
						            }
								}
							]
						});					
					<?php endif; ?>			
				</script>						
				
				<div class='more-playlist' id='more-playlist'>
					<div class='more-playlist-col1'>
						<div id='playlist-container'>
						<?php for($b=0; $b<=count($playlist_video); $b++): ?>
						<?php if($playlist_video[$b]['id']!=""): ?>
						<div class='more-thumbs'>
							<a href='/videos/?id=<?php echo $playlist_video[$b]['id']; ?>'>
							<?php //if(file_exists("./ftp-web/".$playlist_video[$b]['small_image']) && trim($playlist_video[$b]['small_image'])!= ""):?>	
							<span class='img'><img src='/ftp-web/<?php echo $playlist_video[$b]['small_image']; ?>' title='<?php echo $playlist_video[$b]['description']; ?>' width='150' height='84' /></span>
							<?php //else: ?>
							<!--span class='img'><img src='/ftp-web/default.jpg' title='<?php echo $playlist_video[$b]['description']; ?>' width='150' height='84'/></span-->
							<?php //endif; ?>
							<span class='title'><?php echo $playlist_video[$b]['title']; ?></span>
							<span class='duration'><?php echo $playlist_video[$b]['duration']; ?></span>							
							</a>
						</div>
						<?php endif; ?>
						<?php endfor; ?>
						</div>
						<div class='clear'></div>						
						<div class='paginator' id='paginator'>
							<script>
							$(function() {
								console.log(<?php echo $row_count; ?>);
							    $("#paginator").pagination({
							        items: <?php echo $row_count; ?>,
							        itemsOnPage: 10,
							        cssStyle: 'light-theme',
							        hrefTextPrefix: '/videos/?id=<?php echo $id; ?>&page=',							        
							        currentPage: <?php echo isset($page)?$page:1; ?>,
							        onPageClick:function(pageNumber){							        	
							        	document.getElementById("playlist-container").innerHTML = "Retrieving data...";	
							        	$.ajax({
											'url' : '/ajax-videos.php?action=pagechange',
											'type' : 'POST',
											'dataType' : 'json',
											'data' : {page : pageNumber},
											success:function(response){
												//console.log(response.message);
												var html_result="";												
												if(response.success){
													html_result = "<div id='playlist-container'>";
													for(var a in response.data){							
														html_result += "<div class='more-thumbs'>";
														html_result += "	<a href='/videos/?id=" + response.data[a]['id']+ "'>";
														if(response.data[a]['small_image'] !== ""){
															html_result += "		<span class='img'><img src='/ftp-web/" + response.data[a]['small_image'] + "' title='" + response.data[a]['description'] +"' style='width:150px; height:84px;'/></span>";
														}else{
															html_result += "		<span class='img'><img src='/ftp-web/default.jpg' title='" + response.data[a]['description'] +"' style='width:150px; height:84px;'/></span>";	
														}	
														html_result += "		<span class='title'>" + response.data[a]['title'] + "</span>";
														html_result += "		<span class='duration'>" + response.data[a]['duration'] + "</span>";							
														html_result += "	</a>";
														html_result += "</div>";
													}	
													html_result += "</div>";
													document.getElementById("playlist-container").innerHTML = html_result;									
													
												}else{
													document.getElementById("playlist-container").innerHTML = response.message;
												}													
											}
										});							        	
							        	return false;
							        },
							        onInit:function(){
							        

							        }
							    });
							});
							</script>							
						</div>
					</div>
					<div class='more-playlist-col2'>
						<div class='top-playlist-title'>
							<span>Most Recent</span>
						</div>
						<?php for($a=0; $a<count($most_recent_video); $a++): ?>
							<div class='top-playlist'>
								<div class='top-playlist-col top-playlist-image'>
									<a href='/videos/?id=<?php echo $most_recent_video[$a]['id']; ?>'>
									<?php //if(file_exists("./ftp-web/".$most_recent_video[$a]['small_image']) && trim($most_recent_video[$a]['small_image']) != "" ): ?>
									<img src="/ftp-web/<?php echo $most_recent_video[$a]['small_image']; ?>" title="<?php echo $most_recent_video[$a]['description']; ?>" width='150' height='84'/>
									<?php //else: ?>
									<!--img src="/ftp-web/default.jpg" title="<?php echo $most_recent_video[$a]['description']; ?>" width='150' height='84'/-->	
									<?php //endif; ?>
									</a>
								</div>
								<div class='top-playlist-col top-playlist-content'>
									<a href='/videos/?id=<?php echo $most_recent_video[$a]['id']; ?>'>
									<span class='title'><?php echo myTruncate($most_recent_video[$a]['title'],20); ?></span>
									<span class='description'><?php echo $most_recent_video[$a]['description']; ?></span>
									</a>
								</div>
								<div class='clear'></div>
							</div>
						<?php endfor; ?>
						<!--div style="height:117px;">
			            	<a href="http://store.nba.com/home/index.jsp" target="_blank"><img src='/media/2.0/nba-store.jpg' /></a>
			          	</div-->  
			          	
					</div>	
					<div class='clear'></div>
					
				</div>
				
	          	<div>
		          	<?php 
		          	$footer_ads = $ads_list['nba_homepage_bottom_leaderboard']; 
		          	include('layouts/links.php'); 
		          	include('layouts/footer.php');
		          	?>
		          	<div class='clear'></div>
	          	</div>
          	</div><!-- main_content -->   
          	    
		</div><!-- wrapper -->
		<!--script type="text/javascript" src="java-index.js"></script-->		
		<?php include("layouts/background_ads.php"); ?>
		
		<script>
		// run script after document is ready
		$(document).ready(function () {	
			// install flowplayer to an element with CSS class "player"
			//$(".player-box").flowplayer({ swf: "/flowplayer5.4.4/flowplayer.swf" });		
		});
		</script>
		<script type="text/javascript" src="http://s0.2mdn.net/instream/html5/ima3.js"></script>				
		<script type="text/javascript">
		$(document).ready(function(){
			var adsManager;
			var adsLoader;
			var adDisplayContainer;
			var intervalTimer;

			var videoContent = document.getElementById('contentElement');

			function createAdDisplayContainer() {
				// We assume the adContainer is the DOM id of the element that will house
				// the ads.
				adDisplayContainer =
				new google.ima.AdDisplayContainer(document.getElementById('adContainer'));
			}

			function requestAds() {
				// Create the ad display container.
				createAdDisplayContainer();
				// Initialize the container, if requestAds is invoked in a user action.
				// This is only needed on iOS/Android devices.
				adDisplayContainer.initialize();
				// Create ads loader.
				adsLoader = new google.ima.AdsLoader(adDisplayContainer);
				// Listen and respond to ads loaded and error events.
				adsLoader.addEventListener(
					google.ima.AdsManagerLoadedEvent.Type.ADS_MANAGER_LOADED,
					onAdsManagerLoaded,
					false);
				adsLoader.addEventListener(
					google.ima.AdErrorEvent.Type.AD_ERROR,
					onAdError,
					false);

				// Request video ads.
				var adsRequest = new google.ima.AdsRequest();				
				
				adsRequest = {
					adTagUrl : "<?php 
						if(isset($_GET['link']) && $_GET['link'] == '2'){
							echo $default_adtagurl[1]; 
						}else{	
							echo $default_adtagurl[0]; 
						}	
					?>"
					};	
				
				
				// Specify the linear and nonlinear slot sizes. This helps the SDK to
				// select the correct creative if multiple are returned.
				adsRequest.linearAdSlotWidth = 630;
				adsRequest.linearAdSlotHeight = 360;

				adsRequest.nonLinearAdSlotWidth = 630;
				adsRequest.nonLinearAdSlotHeight = 150;

				adsLoader.requestAds(adsRequest);
			}

			function onAdsManagerLoaded(adsManagerLoadedEvent) {
				// Get the ads manager.
				adsManager = adsManagerLoadedEvent.getAdsManager(
					videoContent);  // should be set to the content video element

				// Add listeners to the required events.
				adsManager.addEventListener(
					google.ima.AdErrorEvent.Type.AD_ERROR,
					onAdError);
				adsManager.addEventListener(
					google.ima.AdEvent.Type.CONTENT_PAUSE_REQUESTED,
					onContentPauseRequested);
				adsManager.addEventListener(
					google.ima.AdEvent.Type.CONTENT_RESUME_REQUESTED,
					onContentResumeRequested);
				adsManager.addEventListener(
					google.ima.AdEvent.Type.ALL_ADS_COMPLETED,
					onAdEvent);

				// Listen to any additional events, if necessary.
				adsManager.addEventListener(
					google.ima.AdEvent.Type.LOADED,
					onAdEvent);
				adsManager.addEventListener(
					google.ima.AdEvent.Type.STARTED,
					onAdEvent);
				adsManager.addEventListener(
					google.ima.AdEvent.Type.COMPLETE,
					onAdEvent);
				adsManager.addEventListener(
					google.ima.AdEvent.Type.USER_CLOSE,
					onAdEvent);
				adsManager.addEventListener(
					google.ima.AdEvent.Type.RESUMED,
					onAdEvent);

				try {
					// Initialize the ads manager. Ad rules playlist will start at this time.
					adsManager.init(630,360, google.ima.ViewMode.NORMAL);					
					// Call play to start showing the ad. Single video and overlay ads will
					// start at this time; the call will be ignored for ad rules.
					adsManager.start();
				} catch (adError) {
					// An error may be thrown if there was a problem with the VAST response.
				}
			}

			function onAdEvent(adEvent) {
				// Retrieve the ad from the event. Some events (e.g. ALL_ADS_COMPLETED)
				// don't have ad object associated.
				var ad = adEvent.getAd();
				console.log('-> ' + adEvent.type);
				switch (adEvent.type) {
					case google.ima.AdEvent.Type.LOADED:
						// This is the first event sent for an ad - it is possible to
						// determine whether the ad is a video ad or an overlay.
						if (!ad.isLinear()) {
						// Position AdDisplayContainer correctly for overlay.
						// Use ad.width and ad.height.						
							var el = document.getElementById('adContainer');
							el.style.bottom = '0';
							el.style.height = ad.getHeight()+'px';
							el.style.width = ad.getWidth()+'px';
							el.style.margin = '0 auto';	
							ad.a.width = ad.getWidth()+'px';	
							ad.a.height = ad.getHeight()+'px';	
							console.log('first');
						}else{
							console.log('second');								
						}
						console.log(ad.getWidth() + "x" + ad.getHeight());
						break;
					case google.ima.AdEvent.Type.STARTED:
						// This event indicates the ad has started - the video player
						// can adjust the UI, for example display a pause button and
						// remaining time.
						if (ad.isLinear()) {
							// For a linear ad, a timer can be started to poll for
							// the remaining time.
							intervalTimer = setInterval(
							function() {
							var remainingTime = adsManager.getRemainingTime();
							},
							1000); // every 300ms
						}
						break;
					case google.ima.AdEvent.Type.COMPLETE:
						// This event indicates the ad has finished - the video player
						// can perform appropriate UI actions, such as removing the timer for
						// remaining time detection.
						if (ad.isLinear()) {
							clearInterval(intervalTimer);
						}
						var el = document.getElementById('adContainer');
						el.style.display = "none";
						break;
					default:
						var el = document.getElementById('adContainer');
						el.style.display = 'none';
						videoContent.play();
						break;
				}
			}

			function onAdError(adErrorEvent) {
				// Handle the error logging.
				//console.log(adErrorEvent.getError());
				//adsManager.destroy();
				console.log(adErrorEvent);
				document.getElementById('adContainer').style.display = "none";	
			}

			function onContentPauseRequested() {
				videoContent.pause();
				// This function is where you should setup UI for showing ads (e.g.
				// display ad timer countdown, disable seeking etc.)
				// setupUIForAds();
			}

			function onContentResumeRequested() {
				videoContent.play();
				// This function is where you should ensure that your UI is ready
				// to play content. It is the responsibility of the Publisher to
				// implement this function when necessary.
				// setupUIForContent();

			}

			//Kick off the ads request
			requestAds();
		});	
		</script>
		
	</body>

</html>
