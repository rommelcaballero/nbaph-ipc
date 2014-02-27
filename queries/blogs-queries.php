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
$cachefile = 'cache/blogs-cache-'.$last_file.'.html';

if(!file_exists($cachefile)) {
   $results = mysqli_query($connect, "SELECT AdsDesc, Content FROM ads_list WHERE (AdsDesc='nba_Blogs_top_leaderboard' or AdsDesc='nba_Blogs_top_medallion' or AdsDesc='nba_Blogs_bottom_leaderboard') AND Status='s' ");

   $ads_list = array();

   while($row = mysqli_fetch_array($results)) {
      $ads_list[$row['AdsDesc']]['Content'] = $row['Content'];
   }

   $results = mysqli_query($connect, "select * from blogorder left join blog using (Blogger) where DisplayOn <= NOW() order by Position asc,DatePosted desc limit 0, 2000");

   $i = 0;
   $blog_array = array();
   $count = mysqli_num_rows($results);
   $last_blogger = "";

   while($row = mysqli_fetch_array($results)) {
      if ($last_blogger != $row['Blogger']) {
         $blog_array[$i]['Blogger'] = $row['Blogger'];
         $blog_array[$i]['BlogAffiliation'] = $row['BlogAffiliation'];
         $blog_array[$i]['BlogLink'] = $row['BlogLink'];
         $blog_array[$i]['BlogTitle'] = $row['BlogTitle'];
         $blog_array[$i]['BlogExcerpt'] = $row['BlogExcerpt'];
         $blog_array[$i]['BlogID'] = $row['BlogID'];
         $last_blogger = $row['Blogger'];
         $i += 1;
      }
   }

   $results = mysqli_query($connect, "select * from ads where Dimensions = '300x100' order by RAND() limit 0, 1");
   $row = mysqli_fetch_array($results);

   $ad = array("Link" => $row['Link'], "Image" => $row['Image']);

   $grounded = 1;
   $query_bgads = "SELECT AdsID, Title, Link, Image, BgColor FROM background_ads WHERE Status='s' AND Page='".mysqli_real_escape_string($connect, trim($part_page))."' ORDER BY DateUpdated DESC, DateAdded DESC LIMIT 0, 1 ";
   $result_bgads = mysqli_query($connect, $query_bgads) or die(mysqli_error());
   $found_bgads = mysqli_num_rows($result_bgads);
}

mysqli_close($connect);
?>