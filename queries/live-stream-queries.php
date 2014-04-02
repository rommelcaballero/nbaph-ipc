<?php
include('sqli.php');
include('lib.php');

	$results = mysqli_query($connect, "SELECT Content, AdsDesc FROM ads_list WHERE (AdsDesc='nba_homepage_top_leaderboard' or AdsDesc='nba_homepage_top_medallion' or AdsDesc='nba_homepage_middle_leaderboard' or AdsDesc='nba_homepage_middle_medallion1' or AdsDesc='nba_homepage_middle_medallion2' or AdsDesc='nba_homepage_bottom_leaderboard') AND Status='s' ");

   	$ads_list = array();

   	while($row = mysqli_fetch_array($results)) {
      	$ads_list[$row['AdsDesc']] = $row['Content'];
   	}

?>