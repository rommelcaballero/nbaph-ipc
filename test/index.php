<!DOCTYPE html>
<html>
  <head>
	<?php
	$base = 'http://nba.local/';
	$part_page = "videos";
	include '../sqli.php';
	include '../lib.php';
	include '../queries/video-queries.php';	
	?>
    <link rel="stylesheet" type="text/css" href="style.css"/>

    <script type="text/javascript" src="//s0.2mdn.net/instream/html5/ima3.js"></script>
    <script type="text/javascript" src="/test/main_controller.js"></script>
    <script type="text/javascript" src="/test/ads_controller.js"></script>
    <script type="text/javascript" src="/test/player_controller.js"></script>

    <!-- GPT Companion Code -->
    <!-- Initialize the tagging library -->
     <script type='text/javascript'>
       var googletag = googletag || {};
       googletag.cmd = googletag.cmd || [];
       (function() {
         var gads = document.createElement('script');
         gads.async = true;
         gads.type = 'text/javascript';
         gads.src = '//www.googletagservices.com/tag/js/gpt.js';
         var node = document.getElementsByTagName('script')[0];
         node.parentNode.insertBefore(gads, node);
       })();
     </script>

     <!-- Register your companion slots -->
     <script type='text/javascript'>
       googletag.cmd.push(function() {
         // Supply YOUR_NETWORK/YOUR_UNIT_PATH in place of 6062/iab_vast_samples.
         googletag.defineSlot('/6062/iab_vast_samples', [728, 90], 'companionDiv')
             .addService(googletag.companionAds())
             .addService(googletag.pubads());
         googletag.companionAds().setRefreshUnfilledSlots(true);
         googletag.pubads().enableVideoAds();
         googletag.enableServices();
       });
     </script>

    <title>IMA HTML5 SDK Demo</title>
  </head>
  <body>
  <div id="container">
    <header>IMA HTML5 SDK Demo</header>
	<p>Default adTagUrl is : <a href="http://ph.nba.com/test/?default">http://ph.nba.com/test/?default</a></p>
	<span>http://pubads.g.doubleclick.net/gampad/ads?sz=400x300&iu=%2F6062%2Fiab_vast_samples&ciu_szs=300x250%2C728x90&gdfp_req=1&env=vp&output=xml_vast2&unviewed_position_start=1&url=[referrer_url]&correlator=[timestamp]&cust_params=iab_vast_samples%3Dlinear</span>
    <div id="videoplayer">
      <video id="content">
        <!--source src="http://rmcdn.2mdn.net/Demo/vast_inspector/android.webm"></source-->
        <!--source src="http://rmcdn.2mdn.net/Demo/vast_inspector/android.mp4"></source-->
		<source type="video/mp4" src="<?php echo $base; ?>ftp-web/<?php echo $current_video['filename'].".".strtolower($current_video['format']); ?>"></source>											
      </video>
      <div id="adcontainer">
      </div>
      <button  id="playpause">&#9654;</button>
      <button  id="fullscreen">[&nbsp;&nbsp;]</button>
    </div>
	
    <!-- Declare a div where you want the companion to appear. Use
          googletag.display() to make sure the ad is displayed. -->
    <div id="companionDiv">
      <script type="text/javascript">
        // Using the command queue to enable asynchronous loading.
        // The unit will not actually display now - it will display when
        // the video player is displaying the ads.
        googletag.cmd.push(function() { googletag.display('companionDiv'); });
      </script>
    </div>

    <div id="console">
    Welcome to IMA HTML5 SDK Demo!
    </div>

    <footer>Copyright (C) 2013 Google Inc.</footer>
	<br />
	<br />
  </div>
  <script type="text/javascript">
  var mainController = null;

  window.onload = function() {
    mainController = new MainController(new PlayerController(),"<?php echo (isset($_GET['default'])?"http://pubads.g.doubleclick.net/gampad/ads?sz=400x300&iu=%2F6062%2Fiab_vast_samples&ciu_szs=300x250%2C728x90&gdfp_req=1&env=vp&output=xml_vast2&unviewed_position_start=1&url=[referrer_url]&correlator=[timestamp]&cust_params=iab_vast_samples%3Dlinear":$default_adtagurl[0]); ?>");
  };
  </script>
  <?php var_dump($default_adtagurl[0]); ?>
  </body>
</html>
