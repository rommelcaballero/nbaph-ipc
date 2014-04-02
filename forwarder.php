<?php
	include_once("sqli.php");	
	$preroll_ads = mysqli_query($connect,"select link from videos_ads where id = " .$preroll_id .";");

	if($preroll_ads->num_rows > 0){
		$result = mysqli_fetch_array($preroll_ads);

		$link = $result['link'];

		$ret = mysqli_query($connect,"UPDATE videos_ads set link_impressions=(link_impressions+1) where id=".$preroll_id.";");

		header("Location: ".$link);
	}else{
		echo "Error forwarding";
	}	
	
?>