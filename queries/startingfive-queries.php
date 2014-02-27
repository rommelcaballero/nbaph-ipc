<?php
include('sqli.php');

$query1 = "SELECT information_schema.TABLES.UPDATE_TIME FROM information_schema.TABLES WHERE
         information_schema.TABLES.TABLE_SCHEMA LIKE '$sql_db' ORDER BY information_schema.TABLES.UPDATE_TIME DESC
          LIMIT 0,1 ";
$result1 = mysqli_query($connect, $query1) or die(mysqli_error());
$qrow = mysqli_fetch_array($result1); 
$last_db = $qrow['UPDATE_TIME'];

$rep = array(" ", ":");
$per = array("-", "");

$last_file = str_replace($rep, $per, $last_db); 
$cachefile = 'cache/startingfive-cache-'.$last_file.'.html';

if(!file_exists($cachefile)) {
   $results = mysqli_query($connect, "SELECT AdsDesc, Content FROM ads_list WHERE (AdsDesc='nba_StartingFive_top_leaderboard' or AdsDesc='nba_StartingFive_bottom_leaderboard') AND Status='s' ");

   $ads_list = array();

   while($row = mysqli_fetch_array($results)) {
      $ads_list[$row['AdsDesc']]['Content'] = $row['Content'];
   }

   $ads3=mysqli_query($connect, "SELECT Content FROM ads_list WHERE AdsDesc='nba_StartingFive_medallion1' OR AdsDesc='nba_StartingFive_medallion2' OR AdsDesc='nba_StartingFive_medallion3' AND Status='s' LIMIT 0,3 ") or die(mysqli_error());

   $ads_array = array();
   $count = 0;

   while($row = mysqli_fetch_array($ads3)) {
      $ads_array[$count]['Content'] = $row['Content'];
      $count += 1;
   }

   $results = mysqli_query($connect, "select BlogID, Blogger, BlogTitle, BlogLink, BlogExcerpt from personalities order by Blogger,DatePosted desc limit 0, 100");
   $last_blogger = "";
   $write_array = array();
   $count = 0;

   while($row = mysqli_fetch_array($results)) {
      if ($last_blogger != $row['Blogger']) {
         $write_array[$count]['BlogID'] = $row['BlogID'];
         $write_array[$count]['Blogger'] = $row['Blogger'];
         $write_array[$count]['BlogTitle'] = $row['BlogTitle'];
         $write_array[$count]['BlogLink'] = $row['BlogLink'];
         $write_array[$count]['BlogExcerpt'] = $row['BlogExcerpt'];
         $count += 1;
         $last_blogger = $row['Blogger'];
      }

      if ($count == 3) {
         break;
      }
   }

   $results = mysqli_query($connect, "select BlogID, Blogger, BlogTitle, BlogLink, BlogExcerpt from blog order by Blogger,DatePosted desc limit 0, 100");
   $last_blogger = "";
   $blog_array = array();
   $count = 0;

   while($row = mysqli_fetch_array($results)) {
      if ($last_blogger != $row['Blogger']) {
         $blog_array[$count]['BlogID'] = $row['BlogID'];
         $blog_array[$count]['Blogger'] = $row['Blogger'];
         $blog_array[$count]['BlogTitle'] = $row['BlogTitle'];
         $blog_array[$count]['BlogLink'] = $row['BlogLink'];
         $blog_array[$count]['BlogExcerpt'] = $row['BlogExcerpt'];
         $count += 1;
         $last_blogger = $row['Blogger'];
      }

      if ($count == 3) {
         break;
      }
   }

   $results = mysqli_query($connect, "select * from gallery order by DateAdded desc limit 0, 1");
   $gallery = mysqli_fetch_array($results);

   $results = mysqli_query($connect, "select * from galleryphotos where GalleryID = '" . $gallery['GalleryID'] . "'");

   $gallery_total = mysqli_num_rows($results);
   $gallery_array = array();
   $count = 0;

   while($row = mysqli_fetch_array($results)) {
      $gallery_array[$count]['GalleryID'] = $row['GalleryID'];
      $gallery_array[$count]['Filename'] = $row['ImageThumb'];
      $gallery_array[$count]['Caption'] = $row['Caption'];
      $count += 1;
   }

   $grounded = 1;
   $query_bgads = "SELECT AdsID, Title, Link, Image, BgColor FROM background_ads WHERE Status='s' AND Page='".mysqli_real_escape_string($connect, trim($part_page))."' ORDER BY DateUpdated DESC, DateAdded DESC LIMIT 0, 1 ";
   $result_bgads = mysqli_query($connect, $query_bgads) or die(mysqli_error());
   $found_bgads = mysqli_num_rows($result_bgads);
}

mysql_close($connect);
?>