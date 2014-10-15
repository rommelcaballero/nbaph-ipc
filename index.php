<?php
	$www = @$_GET['www'];
	
        $part_page = "index";
        $beta = false;
        include('queries/index-queries-new.php');

                if($num_wall_videos > 0){
                        $csrf = md5("nbaph-".@date("Y-m-d")."-".@$_SERVER['HTTP_X_FORWARDED_FOR']."-".@$_SERVER['REMOTE_ADDR']);
                        $_SESSION['_csrf'] = $csrf;
                        $up = '1';
                }
?>
<!DOCTYPE html>
<html>
<head>
	<title>NBA Philippines</title>
	<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1" /> 	
	
	<META http-equiv="X-UA-Compatible" content="IE=9" />
	<meta http-equiv="Cache-control" content="public">
	<link rel="stylesheet" href="https://s3-ap-southeast-1.amazonaws.com/nbaphfiles/sib2/style2.css">

	<?php include('static_nav1.php');?>

	<link rel="stylesheet" type="text/css" href="/css/style.css">
	<link rel="stylesheet" type="text/css" href="/css/style-index.css">
	<link rel="stylesheet" type="text/css" href="/css/style-new.css">
	
	<link rel="stylesheet" href="jquery-ui.css" />
	<!--<script type="text/javascript" src="jquery-1.9.1.js"></script>-->
	<script type="text/javascript" src="jquery-ui.js"></script>
	<script type="text/javascript" src="carousel-index.js"></script>
	   
	</script>
	<?php //include('leaderboards_js.php'); ?>
	<?php //include('sibhead1.php');?>
	</head>
	<body>


<?php
if($up=='1' & $www==''){
//include('wall.php');
//$go ='';
$start='';
}

if($www!=="ph"){
//exit();
}

?>


		<?php //include('layouts/popups.php'); ?>
		<div id="wrapper">
		<?php include('static_nav.php');?>
		<?php include('nbaph_header.php');?>

			<div id="main_content" > 
				<div id='header'>
	      	  		<div style="height: 10px"></div>
	          		<div style="width: 958px; min-height: 90px; margin: 0 auto; text-align: center;">
						<?php echo $ads_list['nba_homepage_top_leaderboard'];?>
	          		</div>    	          		
					<div style="width: 995px;  margin: 0 auto; text-align: center; background: #fff; padding-left:5px;height: 163px;">
						
						<!-- old scoreboard -->
						<!--<iframe src="http://ph.global.nba.com/hpscoreboardiframe.html" align="center" frameborder="0" width="1000" height="143" scrolling="no" marginwidth="0" marginheight="0" style="text-align:center; align: center; margin: 0; padding: 0; marginwidth:0"></iframe>-->

						<!-- new scoreboard> -->
						<iframe src="http://ph.glob-prev2.nba.com/articles/licensee_widget_scoreboard.html" width="940px" frameBorder="0" height="160px" scrolling="no" > </iframe>
						
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
				
				<!-- widgets -->
				<div align="center" style="display: inline;padding-left: 200px;">				
		
				<div style="display: inline-flex;height: 100%;vertical-align: top;padding-left: 10px;">
				<div style="display:inline;padding-right:12px">
				<iframe src="http://ph.glob-prev2.nba.com/articles/licensee_widget_leaders.html" width="300px" frameborder="0" height="600px" scrolling="no" style=""> </iframe>
				</div>
				<div style="display:inline">
				<iframe src="http://ph.glob-prev2.nba.com/articles/licensee_widget_standings.html" width="300px" frameborder="0" height="680px" scrolling="no"> </iframe>
				</div>
				</div>			

				</div>

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
            
                <?php //if(count($wall_videos) > 0) include("wall.php"); ?>  	
<?php 
//		if($go == '1'){
//			if($num_wall_videos > 0) {
  //                      	include("wall.php");
//				$go ='';
//				$start = '';
  //                      }
//		}

?>


     <script type='text/javascript'>
(function() {
var useSSL = 'https:' == document.location.protocol;
var src = (useSSL ? 'https:' : 'http:') +
'//www.googletagservices.com/tag/js/gpt.js';
document.write('<scr' + 'ipt src="' + src + '"></scr' + 'ipt>');
})();
</script>

<script type='text/javascript'>
googletag.defineSlot('/7741304/Interstitial_NBA_Homepage', [1, 1], 'div-gpt-ad-1401002731227-0').addService(googletag.pubads());
googletag.pubads().enableSyncRendering();
googletag.enableServices();
</script>

<!-- Interstitial_NBA_Homepage -->
<div id='div-gpt-ad-1401002731227-0' style='width:1px; height:1px;'>
<script type='text/javascript'>
googletag.display('div-gpt-ad-1401002731227-0');
</script>
</div>
	
	</body>

</html>


