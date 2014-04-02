<?php
$part_page = "videos";

include('queries/video-queries.php');
?>

<!DOCTYPE html> 
<html dir="ltr" lang="en-US" xmlns:fb="http://ogp.me/ns/fb#">	  
<head>
	<title>NBA Philippines | Social Stream</title>
	<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1" /> 

	<!--meta property="og:title" content="< ?php echo stripslashes($current_video['title']); ?>"/>
	<meta property="og:type" content="article"/>
	<meta property="og:description" content="< ?php echo stripslashes($current_video['description']); ?>"/>
	<meta property="og:site_name" content="NBA Philippines"/>
	<meta property="og:url" content="< ?php echo $base."videos/?id=".$id; ?>"/>	
	<meta property="og:image:url" content="< ?php echo $base; ?>ftp-web/<?php echo $current_video['large_image'] ?>"/>	
	<meta property="og:image" content="< ?php echo $base; ?>ftp-web/<?php echo $current_video['large_image'] ?>"/>	
	<meta property="fb:admins" content="668328204" /-->

	<link rel="stylesheet" type="text/css" href="style.css">	
	<link rel="stylesheet" type="text/css" href="style-new.css">
	<link rel="stylesheet" type="text/css" href="videos.css">
	<!--[if IE]>
	<link rel="stylesheet" type="text/css" href="ie_style.css">
	<![endif]-->
	<!--[if IE 7]>
	<link rel="stylesheet" type="text/css" href="ie7_style.css">
	<![endif]-->

	<script type="text/javascript" src="jquery-1.7.1.min.js"></script>	
	<script src="/js/flowplayer-3.2.11.min.js"></script>
	<script type="text/javascript" src="/pagination/jquery.simplePagination.js"></script>
	<link rel="stylesheet" type='text/css' href="/pagination/simplePagination.css">	
	<script src="//connect.facebook.net/en_US/all.js"></script>

	</head>
	<body>
		<div id="fb-root"></div>						
		<!--script>
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
							'data' : {id : "< ?php echo $id; ?>"},
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
		</script-->
	
		<?php include('layouts/popups.php'); ?>
		<div id="wrapper">
			<?php include('layouts/header.php'); ?>
			<div id="main_content" > 	
				<!--http://widget.breakingburner.com/firehose.html?customer=NBAPhilippines&widget=nba-breaking-burner -->			
				<div style="width: 958px; height: 85px; text-align: center; margin: 0 auto;  ">
					<?php 
		          	echo $ads_list['nba_homepage_bottom_leaderboard']; 
		          	?>		          
				</div>
				<div style="min-height:800px; padding:10px;">
					<iframe width="100%" height="800" id="breakingburner-iframe" frameborder="no" scrolling="no"></iframe>
					<script src="http://widget.breakingburner.com/loader/firehose/NBAPhilippines/nba-breaking-burner"></script>
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
	</body>

</html>
