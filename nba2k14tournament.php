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
			<?php include('layouts/header.php'); ?>
			<div id="main_content" > 
				<div id='header'>
	      	  		<div style="height: 30px"></div>
	          		<div style="width: 958px; min-height: 20px; margin: 0 auto; text-align: center;">
						<?php //echo $ads_list['nba_homepage_top_leaderboard'];?>
	          		</div>    	          		
					<div style="width: 995px;  margin: 0 auto; text-align: center; background: #fff; padding-left:5px;">
						<!--
						<iframe src="http://ph.global.nba.com/hpscoreboardiframe.html" align="center" frameborder="0" width="1000" height="143" scrolling="no" marginwidth="0" marginheight="0" style="text-align:center; align: center; margin: 0; padding: 0; marginwidth:0"></iframe>
						-->
					</div>
				</div>

<div id="container" style="position:relative">
	<div id="img" style="width: 958px; min-height: 40px; margin: 0 auto; text-align: center;">
			<img src="/images/bannerlayout.jpg" style="width:450px">
		<div id="learnmore"  style="position:absolute;top:423px;left:604px;">
			<a href="/nba2k14tournament-learnmore.php"><img src="/images/learnmore.png" style="width:80px;"></a>
		</div>
	</div>
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
		<?php //include("layouts/background_ads.php"); ?>
            
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


	
	</body>

</html>
