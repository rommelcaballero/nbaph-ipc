<?php
include ('lib.php');
include ('sqli.php');

$query1 = "SELECT information_schema.TABLES.UPDATE_TIME FROM information_schema.TABLES WHERE
          information_schema.TABLES.TABLE_SCHEMA LIKE '$sql_db' and information_schema.TABLES.TABLE_NAME in
		  ('news','galleryphotos','gallery') ORDER BY information_schema.TABLES.UPDATE_TIME DESC
          LIMIT 0,1 ";
$result1 = mysqli_query($connect, $query1) or die(mysqli_error());
$qrow = mysqli_fetch_array($result1); 
$last_db = $qrow['UPDATE_TIME'];

$rep = array(" ", ":");
$per = array("-", "");

$last_file = str_replace($rep, $per, $last_db); 
$cachefile = 'cached/allstar-cache-'.$last_file.'.html';

if(!file_exists($cachefile)) {
	$query_pho = "SELECT a.*, b.GalleryName, b.DateAdded 
	FROM galleryphotos AS a 
	LEFT JOIN gallery AS b ON a.GalleryID=b.GalleryID 
	WHERE (Filename <> '' || ImageThumb <> '') 
	and GalleryName = '2014 NBA All-Star Starters'
	ORDER BY b.DateAdded DESC, a.PhotoID ASC limit 0, 20";
	$results = mysqli_query($connect,$query_pho);
	$gallery_photos = array();
	while($row = mysqli_fetch_array($results)){
		$gallery_photos[] = $row;
	}   
	
	$results = mysqli_query($connect, "select * from news where category ='".$part_page."' order by DatePosted Desc limit
	5;");
	
	//$row = mysqli_fetch_array($results);
	$allstar = array();
	while($row = mysqli_fetch_assoc($results)){
		$allstar[] = $row;
	}	
	$grounded = 1;
	$query_bgads = "SELECT AdsID, Title, Link, Image, BgColor FROM background_ads WHERE Status='s' AND Page='".mysqli_real_escape_string($connect, trim($part_page))."' ORDER BY DateUpdated DESC, DateAdded DESC LIMIT 0, 1 ";
	$result_bgads = mysqli_query($connect, $query_bgads) or die(mysqli_error());
	$found_bgads = mysqli_num_rows($result_bgads);
	
}

mysqli_close($connect);
?>