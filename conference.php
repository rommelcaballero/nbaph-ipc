<?php
$part_page = "conference";
include('queries/index-queries.php');

 ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>NBA Philippines | Conference Finals</title>
	<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1" /> 

	<base href="<?php echo $base; ?>">

	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="style-index.css">
	<link rel="stylesheet" type="text/css" href="colorbox/colorbox.css">
	<!--link href="fbfeed/jquery.neosmart.fb.wall.css" rel="stylesheet" type="text/css"/-->	
	<link rel="stylesheet" type="text/css" href="/style-new.css">
	
	<link rel="stylesheet" type="text/css" href="/pkg-desktop-bracket-min.css" >
	<link rel="stylesheet" type="text/css" href="/pkg-theme-default-min.css" >
	<!--[if IE]>
	<link rel="stylesheet" type="text/css" href="ie_style.css">
	<![endif]-->
	<!--[if IE 7]>
	<link rel="stylesheet" type="text/css" href="ie7_style.css">
	<![endif]-->

	<!--script type="text/javascript" src="jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="jquery.tools.min.js"></script>
	<script type="text/javascript" src="jquery.imgpreload.js"></script>
	<script type="text/javascript" src="colorbox/jquery.colorbox.js"></script>
	<script type="text/javascript" src="http://widgets.twimg.com/j/2/widget.js" charset="utf-8"></script>	
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
	</script-->

	</head>
	<body>

		<?php include('layouts/popups.php'); ?>
		<div id="wrapper">
			<?php include('layouts/header.php'); ?>
			<div id="main_content" > 
				<!--div id='header'>
	      	  		<div style="height: 10px"></div>
	          		<div style="width: 958px; height: 90px; margin: 0 auto; text-align: center; ">
						< ?php echo $ads_list['nba_homepage_top_leaderboard']; ?>
	          		</div>    
	          		<div style="height: 10px"></div>
				</div-->
				<div class='conference-title'>
					<span>CONFERENCE FINALS</span>
				</div>

				<div id='nbaTheme'>
					<div id="nbaGlanceLeftColumn"> 
						<div id="nbaWestColumn"> 
							<div style="margin-bottom: 30px; position: relative; text-align: center">
								<img src='/images/conference/western.jpg' />
							</div>
							<div>
								<img id="nbaCoastHeader" src="http://i.cdn.turner.com/nba/tmpl_asset/static/nba-cms3-section/872/elements/playoffs/2013/bracket/headerWest.gif" style="">
							</div>
							<div id="nbaWestContent" style="border:none;"> 								
								<div id="wR3" style="display: block;">
									<div class="seriesPod">
										<div id="nbaTeamCity">Memphis</div>
										<div id="nbaTeamWins">Final</div>
										<div id="nbaTeamSeed">5</div>
										<div id="nbaTeamName">Grizzlies</div>
										<div id="nbaTeamTotalWins" class="">0</div>
										<div id="nbaTeamCity">San Antonio</div>
										<div id="nbaTeamWins"></div>
										<div id="nbaTeamSeed">2</div>
										<div id="nbaTeamName">Spurs</div>
										<div id="nbaTeamTotalWins" class="lead">4</div>
										<img src="http://i.cdn.turner.com/nba/nba/.element/img/2.0/sect/playoffs/2012/seriesIndex/dottedLine.gif">
										<!--div id="seriesLwr">
											<div class="seriesTout">
												<span class="header">Parker keeps Finals promise to Duncan</span>
												<span class="headerLink">
													<a href="http://hangtime.blogs.nba.com/2013/05/28/parker-keeps-his-word-to-duncan/">Full Story</a>
												</span>
												<ul>
													<li>
														<a href="">Ageless Spurs advance</a>
													</li>
													<li>
														<a href="/video/channels/top_plays/2013/05/27/20130527-nightly-notable.nba/index.html">Parker dominates Game 4</a>
													</li>
												</ul>
											</div>

											<br>

											<a href="/playoffs/2013/westseries7">
												<img src="http://i.cdn.turner.com/nba/nba/.element/img/3.0/sect/playoffs/2013/bracket/seriesHubBtn.gif">
											</a>
										</div-->
									</div>
								</div>								
							</div> 
						</div> 					
						<div id="nbaEastColumn"> 
							<div style="margin-bottom: 30px; position: relative; text-align: center">
								<img src='/images/conference/eastern.jpg' />
							</div>
							<div>
								<img id="nbaCoastHeader2" src="http://i.cdn.turner.com/nba/tmpl_asset/static/nba-cms3-section/872/elements/playoffs/2013/bracket/headerEast.gif" style=""> 
							</div>
							<div id="nbaEastContent" style="border:none;"> 								
								<div id="eR3" style="display: block;">
									<div class="seriesPod">
										<div id="nbaTeamCity">Miami</div>
										<div id="nbaTeamWins"></div>
										<div id="nbaTeamSeed">1</div>
										<div id="nbaTeamName">Heat</div>
										<div id="nbaTeamTotalWins" class="lead">4</div>
										<div id="nbaTeamCity">Indiana</div>
										<div id="nbaTeamWins"></div>
										<div id="nbaTeamSeed">3</div>
										<div id="nbaTeamName">Pacers</div>
										<div id="nbaTeamTotalWins" class="">3</div>
										<img src="http://i.cdn.turner.com/nba/nba/.element/img/2.0/sect/playoffs/2012/seriesIndex/dottedLine.gif">
										<!--div id="seriesLwr">
											<div class="seriesTout">
												<span class="header">Now best-of-three series</span>
												<span class="headerLink">
													<a href="http://hangtime.blogs.nba.com/2013/05/29/pacers-get-encouraged-get-even/">Full Story</a>
												</span>
												<ul>
													<li>
														<a href="/video/channels/tnt_overtime/2013/05/29/20130528-inside-east-finals-breakdown.nba/index.html">Can Pacers win the series?</a>
													</li>
													<li>
														<a href="/video/channels/playoffs/2013/05/29/20130528-gametime-ind-mia-gm5-preview.nba/index.html">Game 5 preview</a>
													</li>
												</ul>
											</div>
											<br>
											<a href="/playoffs/2013/eastseries7">
												<img src="http://i.cdn.turner.com/nba/nba/.element/img/3.0/sect/playoffs/2013/bracket/seriesHubBtn.gif">
											</a>
										</div-->
									</div>
								</div>
								
							</div> 
						</div> 
						<div class='clear'></div>
					</div>				
				</div>

				<div style='height:170px;'>
					<img src='/images/conference/pheonix_bottom.jpg' />
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
