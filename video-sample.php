<!DOCTYPE html>
<html>
<head>
	<?php
	$part_page = "videos";
	include('queries/video-queries.php');	
	?>
	<base href="<?php echo $base; ?>">
	<title>Video ad flowplayer</title>	
	<meta charset='utf-8' />
	<!-- 1. skin -->
	<link rel="stylesheet" href="//releases.flowplayer.org/5.4.4/skin/minimalist.css">	 
	<!-- 2. jquery library -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>	 
	<!-- 3. flowplayer -->
	<script src="/flowplayer5.4.4/flowplayer.min.js"></script>
	
	<!-- load the AdSense assets after the Flowplayer assets -->
	<link rel="stylesheet"	href="//releases.flowplayer.org/asf/1.0.0/asf.min.css" media="screen">
	<script	src="//s0.2mdn.net/instream/html5/ima3.js"></script>
	<script	src="//releases.flowplayer.org/asf/flowplayer.org/1.0.0/asf.min.js"></script>
</head>
<body >
	
	<!--div 	style='width:630px; height:360px; border:1px solid #888;' 
			class="flowplayer minimalist"
			data-rtmp="rtmp://s3b78u0kbtx79q.cloudfront.net/cfx/st" data-ratio="0.4167">>
		 <script>
			flowplayer_ima.conf({
			  // adsense configuration - required even if empty!
			  adsense: {
				  request: {
					  // this should be defined when you are
					  // testing your installation
					 // adtest: "on"
					  	
				  }
			  },

			  // adverts configuration
			  ads: [{
				  // 3 seconds into the video ...
				time: 3,

				  // ... now request an advert of our desired type...
				  // ... in this case image or text type
				request: {
					ad_type: "image_text",
					//client: "ca-video-pub-4968145218643279",
					//discription_url: "< ?php echo urlencode("http://www.youtube.com"); ?>",					
					//videoad_start_delay:0,
					//max_ad_duration:30000						
				}
			  }]
			});
		</script-->
	<div>	
		<video>
			<source type="video/mp4" src="<?php echo $base; ?>ftp-web/<?php echo $current_video['filename'].".".strtolower($current_video['format']); ?>"></source>											
		</video>
	</div>
  	
</body>
</html>