<?php
include('sqli.php');

$results = mysqli_query($connect, "select * from events where EventID = '" . mysqli_real_escape_string($connect, $event_id) . "'");

$event = mysqli_fetch_array($results);

if(mysqli_num_rows($results) <= 0) {
   header("location: ".$base."local-events");
}

$query1 = "SELECT information_schema.TABLES.UPDATE_TIME FROM information_schema.TABLES WHERE
         information_schema.TABLES.TABLE_SCHEMA LIKE '$sql_db' ORDER BY information_schema.TABLES.UPDATE_TIME DESC
          LIMIT 0,1 ";
$result1 = mysqli_query($connect, $query1) or die(mysqli_error());
$qrow = mysqli_fetch_array($result1); 
$last_db = $qrow['UPDATE_TIME'];

$rep = array(" ", ":");
$per = array("-", "");

$last_file = str_replace($rep, $per, $last_db); 
$cachefile = 'cache/events_article-' . $event_id . '-cache-'.$last_file.'.html';

if(!file_exists($cachefile)) {
   $results = mysqli_query($connect, "SELECT AdsDesc, Content FROM ads_list WHERE (AdsDesc='nba_LocalEvents_top_leaderboard' or AdsDesc='nba_LocalEvents_bottom_leaderboard') AND Status='s'");

   $ads_list = array();

   while ($row = mysqli_fetch_array($results)) {
      $ads_list[$row['AdsDesc']]['Content'] = $row['Content'];
   }

   $grounded = 1;
   $query_bgads = "SELECT AdsID, Title, Link, Image, BgColor FROM background_ads WHERE Status='s' AND Page='".mysqli_real_escape_string($connect, trim($part_page))."' ORDER BY DateUpdated DESC, DateAdded DESC LIMIT 0, 1 ";
   $result_bgads = mysqli_query($connect, $query_bgads) or die(mysqli_error());
   $found_bgads = mysqli_num_rows($result_bgads);
}
?>