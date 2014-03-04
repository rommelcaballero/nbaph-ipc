<?php
include('sqli.php');
	
	$results = mysqli_query($connect, "SELECT AdsDesc, Content FROM ads_list WHERE (AdsDesc='nba_NewsArticle_top_leaderboard' or AdsDesc='nba_NewsArticle_medallion1' or AdsDesc='nba_NewsArticle_bottom_leaderboard') AND Status='s'");

	$ads_list = array();

	while($row = mysqli_fetch_array($results)) {
		$ads_list[$row['AdsDesc']]['Content'] = $row['Content'];
	}

	$results = mysqli_query($connect, "select * from news where NewsID = '" . mysqli_real_escape_string($connect, $newsid) . "'");
	$row = mysqli_fetch_array($results);

	$article = array("Photo" => $row['Photo'],
                    "PhotoCredit" => $row['PhotoCredit'],
                    "Title" => $row['Title'],
                    "Body" => $row['Body']);

	$results = mysqli_query($connect, "select * from ads where Dimensions = '300x100' order by RAND() limit 0, 1");
	$row = mysqli_fetch_array($results);

	$ad = array("Link" => $row['Link'], "Image" => $row['Image']);

	$grounded = 1;
	$query_bgads = "SELECT AdsID, Title, Link, Image, BgColor FROM background_ads WHERE Status='s' AND Page='".mysqli_real_escape_string($connect, trim($part_page))."' ORDER BY DateUpdated DESC, DateAdded DESC LIMIT 0, 1 ";
	$result_bgads = mysqli_query($connect, $query_bgads) or die(mysqli_error());
	$found_bgads = mysqli_num_rows($result_bgads);

mysqli_close($connect);
?>