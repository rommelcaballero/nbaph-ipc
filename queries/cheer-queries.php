<?php
include('sqli.php');
include("lib.php");

   $results = mysqli_query($connect, "SELECT AdsDesc, Content FROM ads_list WHERE (AdsDesc='nba_Cheerdancers_top_leaderboard' or AdsDesc='nba_Cheerdancers_bottom_leaderboard' or AdsDesc='nba_Cheerdancers_medallion1') AND Status='s' ");

   $ads_list = array();

   while ($row = mysqli_fetch_array($results)) {
      $ads_list[$row['AdsDesc']]['Content'] = $row['Content'];
   }

   $query_photos = "SELECT a.*, b.PhotoID, b.Caption, b.ImageThumb, b.Filename FROM cheeralbums AS a
                LEFT JOIN cheerphotos AS b ON a.AlbumID=b.AlbumID
                WHERE a.Status='s'
                GROUP BY a.AlbumID ORDER BY a.SortOrder DESC, a.DateAdded DESC, b.SortOrder DESC  LIMIT 0,4
                ";

   $result_photos = mysqli_query($connect, $query_photos) or die(mysqli_error());
   $found_photos = mysqli_num_rows($result_photos);

   if($found_photos > 0) {
      $photos = array();

      $ctr = 0;
      while($cphotos = mysqli_fetch_object($result_photos)) {
         $photos[$ctr]['AlbumID'] = $cphotos->AlbumID;
         $photos[$ctr]['AlbumName'] = $cphotos->AlbumName;
         $photos[$ctr]['PhotoID'] = $cphotos->PhotoID;
         $photos[$ctr]['ImageThumb'] = $cphotos->ImageThumb;
         $photos[$ctr]['Filename'] = $cphotos->Filename;

         $ctr++;
      }//end while
   }

   $query_video = "SELECT VideoID, Title, Caption, YouTubeLink, VimeoLink, ImageThumb FROM cheervideos ORDER BY SortOrder DESC, DatePosted DESC LIMIT 0, 3 ";
   $result_video = mysqli_query($connect, $query_video) or die(mysqli_error());
   $found_video = mysqli_num_rows($result_video);

   $video_array = array();
   $count = 0;

   while ($row = mysqli_fetch_array($result_video)) {
      $video_array[$count]['VideoID'] = $row['VideoID'];
      $video_array[$count]['Title'] = $row['Title'];
      $video_array[$count]['Caption'] = $row['Caption'];
      $video_array[$count]['YouTubeLink'] = $row['YouTubeLink'];
      $video_array[$count]['ImageThumb'] = $row['ImageThumb'];
      $count += 1;
   }

   $query_fd = "SELECT Title, Content FROM cheerfeature WHERE Status='O' ORDER BY DatePosted DESC LIMIT 0,1 ";
   $result_fd = mysqli_query($connect, $query_fd) or die(mysqli_error());
   $found_fd = mysqli_num_rows($result_fd);
   $fdancer = mysqli_fetch_object($result_fd);

   $grounded = 1;
   $query_bgads = "SELECT AdsID, Title, Link, Image, BgColor FROM background_ads WHERE Status='s' AND Page='".mysqli_real_escape_string($connect, trim($part_page))."' ORDER BY DateUpdated DESC, DateAdded DESC LIMIT 0, 1 ";
   $result_bgads = mysqli_query($connect, $query_bgads) or die(mysqli_error());
   $found_bgads = mysqli_num_rows($result_bgads);

?>