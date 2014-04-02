<?php
include('sqli.php');
include('lib.php');

   $results = mysqli_query($connect, "SELECT Content, AdsDesc FROM ads_list WHERE (AdsDesc='nba_homepage_top_leaderboard' or AdsDesc='nba_homepage_top_medallion' or AdsDesc='nba_homepage_middle_leaderboard' or AdsDesc='nba_homepage_middle_medallion1' or AdsDesc='nba_homepage_middle_medallion2' or AdsDesc='nba_homepage_bottom_leaderboard' or AdsDesc='nba_global_games_2013') AND Status='s' ");

   $ads_list = array();

   while($row = mysqli_fetch_array($results)) {
      $ads_list[$row['AdsDesc']] = $row['Content'];
   }

   $results = mysqli_query($connect, "select AdID, Image, Link from ads where Dimensions = '300x100' order by RAND() limit 0, 2");

   $ads_array = array();
   $count = 0;

   while($row = mysqli_fetch_array($results)) {
      $ads_array[$count]['AdID'] = $row['AdID'];
      $ads_array[$count]['Image'] = $row['Image'];
      $ads_array[$count]['Link'] = $row['Link'];
      $count += 1;
   }

   $grounded = 1;
   $query_bgads = "SELECT AdsID, Title, Link, Image, BgColor FROM background_ads WHERE Status='s' AND Page='".mysqli_real_escape_string($connect, trim($part_page))."' ORDER BY DateUpdated DESC, DateAdded DESC LIMIT 0, 1 ";
   $result_bgads = mysqli_query($connect, $query_bgads) or die(mysqli_error());
   $found_bgads = mysqli_num_rows($result_bgads);

   $result = mysqli_query($connect,"select * from global_games_stories where show_on_calendar = 'enabled'");
   while($row = mysqli_fetch_assoc($result)){
      $calendar[] = $row; 
   }  

   $result = mysqli_query($connect,"select * from global_games_stories where status = 'show' and featured='enabled' order by position_order desc;");
   while($row = mysqli_fetch_assoc($result)){
      $featured[] = $row; 
   }  
   
   $result = mysqli_query($connect,"select * from global_games_stories where status = 'show' and featured <> 'enabled' order by date_created desc;");
   while($row = mysqli_fetch_assoc($result)){
      $related_article[] = $row; 
   }  
     
   $result = mysqli_query($connect,"select * from global_games_videos where status = 'live' order by date_created desc limit 1;");
   $video = mysqli_fetch_assoc($result);

   $result = mysqli_query($connect,"select * from global_games_images where status = 'live';");
   while($row = mysqli_fetch_assoc($result)){
      $images[] = $row; 
   } 
   mysqli_close($connect);
?>