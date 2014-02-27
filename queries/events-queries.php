<?php
include('sqli.php');
include('lib.php');

$query1 = "SELECT information_schema.TABLES.UPDATE_TIME FROM information_schema.TABLES WHERE
         information_schema.TABLES.TABLE_SCHEMA LIKE '$sql_db' ORDER BY information_schema.TABLES.UPDATE_TIME DESC
          LIMIT 0,1 ";
$result1 = mysqli_query($connect, $query1) or die(mysqli_error());
$qrow = mysqli_fetch_array($result1); 
$last_db = $qrow['UPDATE_TIME'];

$rep = array(" ", ":");
$per = array("-", "");

$last_file = str_replace($rep, $per, $last_db); 
$cachefile = 'cache/events-cache-'.$last_file.'.html';

if(!file_exists($cachefile)) {
   $results = mysqli_query($connect, "SELECT AdsDesc, Content FROM ads_list WHERE (AdsDesc='nba_Events_top_leaderboard' or AdsDesc='nba_Events_bottom_leaderboard') AND Status='s'");

   $ads_list = array();

   while ($row = mysqli_fetch_array($results)) {
      $ads_list[$row['AdsDesc']]['Content'] = $row['Content'];
   }

   $results = mysqli_query($connect, "SELECT * FROM events ORDER by DatePosted DESC, EventID DESC LIMIT 0, 1");
   $events_row = mysqli_fetch_array($results);

   $results = mysqli_query($connect, "select * from eventsvideos order by SortOrder DESC, DatePosted DESC limit 0, 1");
   $video_row = mysqli_fetch_array($results);

   $results = mysqli_query($connect, "SELECT a.* FROM eventsphotos AS a LEFT JOIN eventsalbum AS b ON a.AlbumID=b.AlbumID WHERE b.Status='s' GROUP BY a.AlbumID ORDER BY a.SortOrder DESC, a.PhotoID DESC LIMIT 0, 6");

   $photo_array = array();
   $count = 0;

   while($row = mysqli_fetch_array($results)) {
      $photo_array[$count]['ImageThumb'] = $row['ImageThumb'];
      $photo_array[$count]['AlbumID'] = $row['AlbumID'];
      $photo_array[$count]['PhotoID'] = $row['PhotoID'];
      $photo_array[$count]['Caption'] = $row['Caption'];
      $count += 1;
   }

   $grounded = 1;
   $query_bgads = "SELECT AdsID, Title, Link, Image, BgColor FROM background_ads WHERE Status='s' AND Page='".mysqli_real_escape_string($connect, trim($part_page))."' ORDER BY DateUpdated DESC, DateAdded DESC LIMIT 0, 1 ";
   $result_bgads = mysqli_query($connect, $query_bgads) or die(mysqli_error());
   $found_bgads = mysqli_num_rows($result_bgads);
}
?>