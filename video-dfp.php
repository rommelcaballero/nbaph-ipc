<!DOCTYPE html> 
<html class="devsite" lang="en">
	<?php
	$part_page = "videos";
	include('queries/video-queries.php');
	?>
	<head>
	<meta charset="utf-8">
	
	<?php
		
		header("Access-Control-Allow-Credentials: false");
		
	?>	
	<title>NBA Philippines | Videos</title>	
	<!--script src="http://apis.google.com/_/scs/apps-static/_/js/k=oz.gapi.en.mMZgig4ibk0.O/m=auth/exm=plusone/rt=j/sv=1/d=1/ed=1/am=EQ/rs=AItRSTNZBJcXGialq7mfSUkqsE3kvYwkpQ/cb=gapi.loaded_1" async=""></script>
	<script src="http://apis.google.com/_/scs/apps-static/_/js/k=oz.gapi.en.mMZgig4ibk0.O/m=plusone/rt=j/sv=1/d=1/ed=1/am=EQ/rs=AItRSTNZBJcXGialq7mfSUkqsE3kvYwkpQ/cb=gapi.loaded_0" async=""></script>
	<script type="text/javascript" async="" src="http://apis.google.com/js/plusone.js?onload=devsite_plusoneLoaded" gapi_processed="true"></script>
	<script type="text/javascript" async="" src="http://ssl.google-analytics.com/ga.js"></script-->
	
	<script type="text/javascript" src="jquery-1.7.1.min.js"></script>	

	</head>
	<body>
		

		<div id="mainContainer">
		  <div id="content">
			<video id="contentElement" style="width:640px; height:480px;" src="http://s0.2mdn.net/instream/videoplayer/media/android.webm"/>
		  </div>
		  
		  <div id="adContainer">
		  </div>
		  
		</div>
		
		<script src="http://s0.2mdn.net/instream/html5/ima3.js" type="text/javascript"></script>
		
		<script type="text/javascript">
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
				adsRequest.adTagUrl =  "<?php echo $default_adtagurl; ?>";	
				
				// Specify the linear and nonlinear slot sizes. This helps the SDK to
				// select the correct creative if multiple are returned.
				adsRequest.linearAdSlotWidth = 640;
				adsRequest.linearAdSlotHeight = 480;

				adsRequest.nonLinearAdSlotWidth = 640;
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

				try {
					// Initialize the ads manager. Ad rules playlist will start at this time.
					adsManager.init(640, 480, google.ima.ViewMode.NORMAL);
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
				switch (adEvent.type) {
					case google.ima.AdEvent.Type.LOADED:
						// This is the first event sent for an ad - it is possible to
						// determine whether the ad is a video ad or an overlay.
						if (!ad.isLinear()) {
						// Position AdDisplayContainer correctly for overlay.
						// Use ad.width and ad.height.
						}
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
				}
			}

			function onAdError(adErrorEvent) {
				// Handle the error logging.
				//console.log(adErrorEvent.getError());
				try{
					adsManager.destroy();
				}catch(e){
					console.log(adErrorEvent.getError());
				}
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
		</script>
	</body>
</html>