<?php
	include ('lib.php');
	include ('sqli.php');


	$results = mysqli_query($connect, "select * from news where NewsID = '".$search_allstar_id."' and category ='".$part_page."';");
	
	//$row = mysqli_fetch_array($results);
	$allstar = array();
	while($row = mysqli_fetch_assoc($results)){
		$allstar[] = $row;
	}	
	$grounded = 1;
	$query_bgads = "SELECT AdsID, Title, Link, Image, BgColor FROM background_ads WHERE Status='s' AND Page='".mysqli_real_escape_string($connect, trim($part_page))."' ORDER BY DateUpdated DESC, DateAdded DESC LIMIT 0, 1 ";
	$result_bgads = mysqli_query($connect, $query_bgads) or die(mysqli_error());
	$found_bgads = mysqli_num_rows($result_bgads);


	mysqli_close($connect);
?>