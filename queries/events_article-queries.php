<?php
include('sqli.php');

$results = mysqli_query($connect, "select * from events where EventID = '" . mysqli_real_escape_string($connect, $event_id) . "'");

$event = mysqli_fetch_array($results);

if(mysqli_num_rows($results) <= 0) {
   header("location: ".$base."local-events");
}

   $results = mysqli_query($connect, "SELECT AdsDesc, Content FROM ads_list WHERE (AdsDesc='nba_LocalEvents_top_leaderboard' or AdsDesc='nba_LocalEvents_bottom_leaderboard') AND Status='s'");

   $ads_list = array();

   while ($row = mysqli_fetch_array($results)) {
      $ads_list[$row['AdsDesc']]['Content'] = $row['Content'];
   }

   $grounded = 1;
   $query_bgads = "SELECT AdsID, Title, Link, Image, BgColor FROM background_ads WHERE Status='s' AND Page='".mysqli_real_escape_string($connect, trim($part_page))."' ORDER BY DateUpdated DESC, DateAdded DESC LIMIT 0, 1 ";
   $result_bgads = mysqli_query($connect, $query_bgads) or die(mysqli_error());
   $found_bgads = mysqli_num_rows($result_bgads);

?>