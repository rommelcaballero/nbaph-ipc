<?php
$part_page = "draft13";
include('sqli.php');
include('lib.php');
?>

<!DOCTYPE">
<html>
<head>
	<title>NBA Draft Board 2013</title>
	<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1" /> 

	<base href="<?php echo $base; ?>">

	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="style-index.css">
	<!--link rel="stylesheet" type="text/css" href="colorbox/colorbox.css"-->
	<!--link href="fbfeed/jquery.neosmart.fb.wall.css" rel="stylesheet" type="text/css"/-->	
	<link rel="stylesheet" type="text/css" href="style-new.css">
	<!--[if IE]>
	<link rel="stylesheet" type="text/css" href="ie_style.css">
	<![endif]-->
	<!--[if IE 7]>
	<link rel="stylesheet" type="text/css" href="ie7_style.css">
	<![endif]-->

	</head>
	<body>

		<?php include('layouts/popups.php'); ?>
		<div id="wrapper">
			<?php include('layouts/header.php'); ?>
			<div id="main_content" > 
				
				<div>
					<p><iframe style="width: 1000px; height: 400%; overflow: hidden;" src="http://up.massrelevance.com/nba/draft-2013/index.html?mode=intl" 
						frameborder="0" scrolling="no"></iframe></p>
				</div>
	          	<div>
		          	<?php 
		          	$footer_ads = "";//$ads_list['nba_homepage_bottom_leaderboard']; 
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