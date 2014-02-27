<?php
	ob_start();
	//replace access token for FB app from here:
	//http://www.neosmart.de/social-media/facebook-wall/

	$part_page = "live-stream";

	include('queries/live-stream-queries.php');

	//if(file_exists($cachefile) && !isset($user_id))
	//{ 
	//	$cache_this = 0;
		//echo "<!-- Cached Copy ".$last_db." -->\n";
	//	include($cachefile); 
	//	exit;
	//}else{
	if(true){
		$cache_this = 1; 	  
  		if (isset($_SESSION['pollvoter'])){
    		if($_SESSION['pollvoter'] != "" || isset($user_id)) $cache_this = 0;
  		}
  
 ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>NBA Philippines | Live Stream</title>
	<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1" /> 

	<base href="<?php echo $base; ?>">

	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="style-index.css">
	<link rel="stylesheet" type="text/css" href="colorbox/colorbox.css">
	<link href="fbfeed/jquery.neosmart.fb.wall.css" rel="stylesheet" type="text/css"/>	
	<link rel="stylesheet" type="text/css" href="style-new.css">
	<!--[if IE]>
	<link rel="stylesheet" type="text/css" href="ie_style.css">
	<![endif]-->
	<!--[if IE 7]>
	<link rel="stylesheet" type="text/css" href="ie7_style.css">
	<![endif]-->

	<script type="text/javascript" src="jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="jquery.tools.min.js"></script>
	<script type="text/javascript" src="jquery.imgpreload.js"></script>
	<script type="text/javascript" src="colorbox/jquery.colorbox.js"></script>
	<script type="text/javascript" src="http://widgets.twimg.com/j/2/widget.js" charset="utf-8"></script>
	<script type="text/javascript" src="fbfeed/jquery.neosmart.fb.wall.js"></script>
	<script type="text/javascript" src="java.js"></script>
	<script type="text/javascript" >
		var base = "< ?php echo $base; ?>";

		var photo_array = Array(< ?php
		for ($i = 0; $i < $gallery_total; $i += 1) {
		   if ($i > 0)
		      echo ",";
			echo "'" . $_SESSION['photos'][$i]['Filename'] . "'";
		}
		?>);
	</script>
<?php //include('leaderboards_js.php'); ?>
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

		<?php include('layouts/popups.php'); ?>
		<div id="wrapper">
			<?php include('layouts/header.php'); ?>
			<div id="main_content" > 
				<div id='header'>
	      	  		<div style="height: 10px"></div>
	          		<div style="width: 958px; height: 90px; margin: 0 auto; text-align: center; ">
						<?php echo $ads_list['nba_homepage_top_leaderboard'];
						    //include('layouts/leaderboard_top.php');
		            	?>
	          		</div>    	          			
	          		<div style="height: 10px"></div>			
				</div>

				<!--div id='section1'>					
					< ?php include("layouts/section1.php"); ?>
				</div><!-- section 1 -->
				<!--div id='section2'>
					< ?php include("layouts/section2.php"); ?>
				</div>
				<div style="width: 958px; height: 100px; margin: 0 auto; text-align: center; ">
		     		< ?php echo $ads_list['nba_homepage_middle_leaderboard']; ?>
	          	</div>
	          	<div id='section3'>
	          		< ?php include("layouts/section3.php"); ?>
	          	</div>
	          	<div id='section4'>
	          		< ?php include("layouts/section4.php"); ?>
	          	</div>
	          	<div id="starting-five">
	          		< ?php include("layouts/starting5.php"); ?>
	          	</div-->
	          	<style>
	          		.span-left, .span-right{
	          			display: inline-block;
	          			vertical-align: top;
	          		}
	          	</style>
	          	<div>
	          		<span class='span-left'>
			          	<div style='padding-left:20px;'>			          		
			          		<!--iframe height="360" width="640" frameborder="0" src="http://www.own3d.tv/liveembed/421060?autoPlay=true"></iframe><br />
			          		<iframe height="360" width="640" scrolling="no" frameborder="0" src="http://www.own3d.tv/chatembed/nba-philippines_421060"></iframe-->
			          		<script type="text/javascript">fid="nbalivestreamsample";v_width="600";v_height="450";</script><script type="text/javascript" src="http://veemi.com/javascript/embedPlayer.js"></script>	
			          	</div>
			          	<div style='padding-left:20px; padding-top:10px;'>
			          		<div class="fb-comments" data-href="http://ph.nba.com/live-stream.php?live=solar" data-num-posts="2" data-width="640"></div>
			          	</div>
			        </span>
			        <span class='span-right'>
			        	<div style="padding-left:10px;">
			        		<div style="width: 300px; height: 250px">
						 	<?php echo $ads_list['nba_homepage_top_medallion']; ?>
							</div>    
							<div style="height: 10px"></div>
							<?php if ($ads_array[0]['Link']): ?>                
							<div style="width: 300px; height: 100px">
									<a href="<?php echo $ads_array[0]['Link']; ?>"><img src="ads/<?php echo $ads_array[0]['Image']; ?>"></a>
							</div>
							<?php endif; ?>
			        	</div>
			        </span> 	
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
		<script type="text/javascript" src="java-index.js"></script>
		<?php include("layouts/background_ads.php"); ?>
	</body>

</html>

<?php
	$cachetime = 5 * 60;
	// Serve from the cache if it is younger than $cachetime
	/*if (file_exists($cachefile) && time() - $cachetime < filemtime($cachefile)) {
	    include($cachefile);
	    echo "<!-- Cached copy, generated ".date('H:i', filemtime($cachefile))." -->\n";
	    exit ;
	}*/

	if(($cache_this == 1)) // put && ($base == "http://ph.nba.com/")
	{	 
		// Start the output buffer	
		/* The code to dynamically generate the page goes here */	
		// Cache the output to a file
		$fp = fopen($cachefile, 'w');
		fwrite($fp, ob_get_contents());
		fclose($fp);

	}//end cache this
	ob_end_flush(); // Send the output to the browser
}//end else cache
?>