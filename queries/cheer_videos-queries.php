<?php
include('sqli.php');
include("lib.php");

   if($video_id) {
      $query_vid = "SELECT * FROM cheervideos WHERE VideoID='".mysqli_real_escape_string($connect, $video_id)."' ";
   }
   else {
      $query_vid = "SELECT * FROM cheervideos ORDER BY SortOrder DESC, DatePosted DESC LIMIT 0,1 ";
   }

   $result_vid = mysqli_query($connect, $query_vid) or die(mysqli_error());
   $found_vid = mysqli_num_rows($result_vid);

   if($found_vid > 0) {
      $video = mysqli_fetch_object($result_vid);
      $video_id = $video->VideoID;
      $video_title = ucfirst(trim($video->Title));
      $video_caption = ucfirst(trim($video->Caption));
      $video_embed = trim($video->EmbedCode);
   }
   else {
      header("location: ".$base."cheerdancers-videos");
   }

   $results = mysqli_query($connect, "SELECT AdsDesc, Content FROM ads_list WHERE (AdsDesc='nba_CheerVideos_top_leaderboard' or AdsDesc='nba_CheerVideos_bottom_leaderboard' or AdsDesc = 'nba_Cheerdancers_medallion1') AND Status='s' ");

   $ads_list = array();

   while($row = mysqli_fetch_array($results)) {
      $ads_list[$row['AdsDesc']]['Content'] = $row['Content'];
   }

   $query_others = "SELECT VideoID, Title, Caption, YouTubeLink, VimeoLink, ImageSecond FROM cheervideos
                            WHERE VideoID<>'".mysqli_real_escape_string($connect, $video_id)."' ORDER BY SortOrder DESC, DatePosted DESC ";
   $result_others = mysqli_query($connect, $query_others) or die(mysqli_error());
   $found_others = mysqli_num_rows($result_others);

   $video_array = array();
   $count = 0;

   while($row = mysqli_fetch_array($result_others)) {
      $video_array[$count]['VideoID'] = $row['VideoID'];
      $video_array[$count]['Title'] = $row['Title'];
      $video_array[$count]['Caption'] = $row['Caption'];
      $video_array[$count]['YouTubeLink'] = $row['YouTubeLink'];
      $video_array[$count]['ImageSecond'] = $row['ImageSecond'];
      $count += 1;
   }

   $grounded = 1;
   $query_bgads = "SELECT AdsID, Title, Link, Image, BgColor FROM background_ads WHERE Status='s' AND Page='".mysqli_real_escape_string($connect, trim($part_page))."' ORDER BY DateUpdated DESC, DateAdded DESC LIMIT 0, 1 ";
   $result_bgads = mysqli_query($connect, $query_bgads) or die(mysqli_error());
   $found_bgads = mysqli_num_rows($result_bgads);

?>