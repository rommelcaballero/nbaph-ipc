<?php

	$part_page = "index";

	include('queries/index-queries.php');
	
	if($cache_found){ 	
		echo "<!-- Cached File -->\n";	

		include($_SERVER["DOCUMENT_ROOT"]."/cached/".$cache_filename); 
		die;
	}

	ob_start();
/*
	$dir = $_SERVER["DOCUMENT_ROOT"];
	$output = array();
	chdir($dir);
	//putenv('PATH='. getenv('PATH') .";C:\Users\Paulon\Documents\Aptana Studio 3 Workspace\.metadata\.plugins\com.aptana.portablegit.win32\bin\\");
	exec("git log --date=iso",$output);

	if(isset($output[8])){
		echo "<!-- ". $output[8] . " -->\n";	
	}
	if(isset($output[9])){
		echo "<!-- last update - ". $output[9] . " -->\n";	
	}
*/
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>NBA Philippines</title>
	<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1" /> 
	<META http-equiv="X-UA-Compatible" content="IE=9" />
	
	<base href="<?php echo $base; ?>">

	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="style-index.css">
	<link rel="stylesheet" type="text/css" href="colorbox/colorbox.css">
	<!--link href="fbfeed/jquery.neosmart.fb.wall.css" rel="stylesheet" type="text/css"/-->	
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

	<!--script type="text/javascript" src="fbfeed/jquery.neosmart.fb.wall.js"></script-->
	<script type="text/javascript" src="java.js"></script>
	<script type="text/javascript" >
		var base = "<?php echo $base; ?>";

		var photo_array = Array(<?php
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
	          		<div style="height: 50px"></div>
					<!--div style="width: 995px;  margin: 0 auto; text-align: center; background: #fff; padding-left:5px;">
						<iframe src="http://ph.global.nba.com/hpscoreboardiframe.html" align="center" frameborder="0" width="1000" height="143" scrolling="no" marginwidth="0" marginheight="0" style="text-align:center; align: center; margin: 0; padding: 0; marginwidth:0"></iframe>
					</div-->
				</div>

				<div id='section1'>					
					<?php include("layouts/section1.php"); ?>
				</div><!-- section 1 -->
				<div id='section2'>
					<?php include("layouts/section2.php"); ?>
				</div>
				<div style="width: 958px; height: 100px; margin: 0 auto; text-align: center; ">
		     		<?php echo $ads_list['nba_homepage_middle_leaderboard']; ?>
	          	</div>
	          	<div id='section3'>
	          		<?php include("layouts/section3.php"); ?>
	          	</div>
	          	<div id='section4'>
	          		<?php include("layouts/section4.php"); ?>
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
		<script type="text/javascript" src="java-index.js"></script>		
		<?php include("layouts/background_ads.php"); ?>
				
	</body>

</html>

<?php
	$fp = fopen($_SERVER["DOCUMENT_ROOT"]."/cached/".$cache_filename, 'w');
	fwrite($fp, ob_get_contents());
	fclose($fp);
	ob_end_flush(); // Send the output to the browser
	if(!$cache_found){
        unlink($_SERVER["DOCUMENT_ROOT"]."/cached/".$last_index_cached);
    }


?>