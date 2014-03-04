<?php
	$part_page = "index";
	$beta = false;
	include('queries/index-queries-new.php');
	if(count($wall_videos) > 0):
		session_start();
		$csrf = md5("nbaph-".@date("Y-m-d")."-".@$_SERVER['HTTP_X_FORWARDED_FOR']."-".@$_SERVER['REMOTE_ADDR']);
		$_SESSION['_csrf'] = $csrf;
	endif; 
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>NBA Philippines</title>
	<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1" /> 	
	
	<META http-equiv="X-UA-Compatible" content="IE=9" />
	<meta http-equiv="Cache-control" content="public">


	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="style-index.css">
	<link rel="stylesheet" type="text/css" href="style-new.css">
	
	<link rel="stylesheet" href="jquery-ui.css" />
	<script type="text/javascript" src="jquery-1.9.1.js"></script>
	<script type="text/javascript" src="jquery-ui.js"></script>
	<script type="text/javascript" src="carousel-index.js"></script>
	
<?php //include('leaderboards_js.php'); ?>
	</head>
	<body>

		<?php //include('layouts/popups.php'); ?>
		<div id="wrapper">
			<?php include('layouts/header.php'); ?>
			<div id="main_content" > 
				<div id='header'>
	      	  		<div style="height: 10px"></div>
	          		<div style="width: 958px; min-height: 90px; margin: 0 auto; text-align: center; ">
						<?php echo $ads_list['nba_homepage_top_leaderboard'];?>
	          		</div>    	          		
					<div style="width: 995px;  margin: 0 auto; text-align: center; background: #fff; padding-left:5px;">
						<iframe src="http://ph.global.nba.com/hpscoreboardiframe.html" align="center" frameborder="0" width="1000" height="143" scrolling="no" marginwidth="0" marginheight="0" style="text-align:center; align: center; margin: 0; padding: 0; marginwidth:0"></iframe>
					</div>
				</div>

				<div id='section1'>					
					<?php include("layouts/section1-new.php"); ?>
				</div>
				<div id='section2'>
					<?php  include("layouts/section2-new.php"); ?>
				</div>
				<div style="width: 958px; min-height: 100px; margin: 0 auto; text-align: center; ">
		     		<?php echo $ads_list['nba_homepage_middle_leaderboard']; ?>
	          	</div>
	          	<div id='section3'>
	          		<?php include("layouts/section3-new.php"); ?>
	          	</div>
	          	<div id='section4'>
	          		<?php include("layouts/section4-new.php"); ?>
	          	</div>
	          	<div id="starting-five">
	          		<?php include("layouts/starting5.php"); ?>
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
		<?php include("layouts/background_ads.php"); ?>
		
		<?php if(count($wall_videos) > 0) include("wall.php"); ?>
		
	</body>

</html>
