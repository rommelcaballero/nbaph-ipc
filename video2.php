<html>
<head>
</head>
<body>
	<script type="text/javascript" src="http://www.google.com/jsapi"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script type="text/javascript" src="http://www.google.com/uds?file=ima&v=1&nodependencyload=true"></script>
	<script type="text/javascript">
        $(document).ready(function(){
           
			var adsManager;
			var clickTrackingOverlay = document.getElementById('clickTrackingOverlay');
			var videoElement = document.getElementById('videohtml5');   
			var adsLoader = new google.ima.AdsLoader();

			  // Add event listeners
			adsLoader.addEventListener(
				google.ima.AdsLoadedEvent.Type.ADS_LOADED,
				onAdsLoaded,
				false);
			adsLoader.addEventListener(
				google.ima.AdErrorEvent.Type.AD_ERROR,
				onAdError,
				false);

		   // Create request object
		   var adsRequest = {
			adTagUrl: "http://pubads.g.doubleclick.net/gampad/ads?sz=640x480&iu=/7741304/Video_640x480&ciu_szs&impl=s&gdfp_req=1&env=vp&output=xml_vast2&unviewed_position_start=1&url=http://ph.nba.com/?gr=www&correlator=[timestamp]",
adType:["video","image","flash"]};

		  // Make request

		  adsLoader.requestAds(adsRequest);


		  function onAdsLoaded(adsLoadedEvent) {
			// Get the ads manager
			adsManager = adsLoadedEvent.getAdsManager();
			adsManager.addEventListener(google.ima.AdErrorEvent.Type.AD_ERROR, onAdError);

			// Listen and respond to events which require you to pause/resume content
			adsManager.addEventListener(
				google.ima.AdEvent.Type.CONTENT_PAUSE_REQUESTED,
				onPauseRequested);
			adsManager.addEventListener(
				google.ima.AdEvent.Type.CONTENT_RESUME_REQUESTED,
				onResumeRequested);

			// Set a visual element on which clicks should be tracked for video ads
			adsManager.setClickTrackingElement(clickTrackingOverlay);
			try {
			  // Call play to start showing the ad.
			  adsManager.play(videoElement);
			} catch (adError) {
			  // An error may be thrown if there was a problem with the VAST response.
			}
		  }

		  function onAdError(adErrorEvent) {
			// Handle the error logging.
			console.log(adErrorEvent.getError());
		  }

		  function onPauseRequested() {
			videoElement.pause();
			// Setup UI for showing ads (e.g. display ad timer countdown,
			// disable seeking, etc.)
			// setupUIForAd();
		  }

		  function onResumeRequested() {
			// Setup UI back for showing content.
			// setupUIForContent();
			videoElement.play();
		  }


			
        });



	</script>
	<video id="videohtml5" width="720" height="405" controls="controls" onclick="">
	<source src="http://ph.nba.com/ftp-web/zap_highlights_131129.mov" type="video/mp4">
		  Your browser does not support the video tag.
	</video>
</body>
</html>
