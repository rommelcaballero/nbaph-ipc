<?php
include('sqli.php');
include("lib.php");

if($pinoybeat_id) {
   $query_pb = "SELECT BlogID, PostedBy, Title, Intro, Content, DateInserted, Views FROM pinoy_beat WHERE Status='O' AND BlogID='".mysqli_real_escape_string($connect, $pinoybeat_id)."'";
}
else {
   $page_max = 3;
   $page = 0;

   if ($_GET['page'])
      $page = $_GET['page'] * $page_max;

   $q = "SELECT BlogID, PostedBy, Title, Intro, Content, DateInserted, Views, Image FROM pinoy_beat WHERE Status='O' ORDER BY DateInserted DESC, Views DESC";
   $results = mysqli_query($connect, $q);
   $total_entries = mysqli_num_rows($results) / $page_max;

   $query_pb = "SELECT BlogID, PostedBy, Title, Intro, Content, DateInserted, Views, Image FROM pinoy_beat WHERE Status='O' ORDER BY DateInserted DESC, Views DESC LIMIT $page, $page_max";
}

$result_pb = mysqli_query($connect, $query_pb) or die(mysqli_error());
$found_pb = mysqli_num_rows($result_pb);

if(($found_pb <= 0) && ($pinoybeat_id)) {
   header("location: ".$base."pinoy-beat-writer");
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

if ($pinoybeat_id)
   $cachefile = 'cache/pinoy_beat-' . $pinoybeat_id . '-cache-'.$last_file.'.html';
else
   $cachefile = 'cache/pinoy_beat-page-' . $page . '-cache-'.$last_file.'.html';

if(!file_exists($cachefile)) {
   $beat_array = array();
   $count = 0;

   while($row = mysqli_fetch_array($result_pb)) {
      $beat_array[$count]['BlogID'] = $row['BlogID'];
      $beat_array[$count]['PostedBy'] = $row['PostedBy'];
      $beat_array[$count]['Title'] = $row['Title'];
      $beat_array[$count]['Intro'] = $row['Intro'];
      $beat_array[$count]['Content'] = $row['Content'];
      $beat_array[$count]['DateInserted'] = $row['DateInserted'];
      $beat_array[$count]['Views'] = $row['Views'];
      $beat_array[$count]['Image'] = $row['Image'];
      $count += 1;
   }

   $results = mysqli_query($connect, "SELECT AdsDesc, Content FROM ads_list WHERE (AdsDesc='nba_PinoyBeatWriter_top_leaderboard' or AdsDesc='nba_PinoyBeatWriter_top_medallion' or AdsDesc='nba_PinoyBeatWriter_bottom_leaderboard') AND Status='s'");

   $ads_list = array();

   while($row = mysqli_fetch_array($results)) {
      $ads_list[$row['AdsDesc']]['Content'] = $row['Content'];
   }

   $query_more = "SELECT BlogID, PostedBy, Title, DateInserted FROM pinoy_beat WHERE BlogID != '".mysqli_real_escape_string($connect, $pinoybeat_id)."' ORDER BY DateInserted DESC LIMIT 0, 20";
   $result_more = mysqli_query($connect, $query_more) or die(mysqli_error());

   $other_array = array();
   $count = 0;

   while($row = mysqli_fetch_array($results)) {
      $other_array[$count]['BlogID'] = $row['BlogID'];
      $other_array[$count]['PostedBy'] = $row['PostedBy'];
      $other_array[$count]['Title'] = $row['Title'];
      $other_array[$count]['DateInserted'] = $row['DateInserted'];
      $count += 1;
   }

   $grounded = 1;
   $query_bgads = "SELECT AdsID, Title, Link, Image, BgColor FROM background_ads WHERE Status='s' AND Page='".mysqli_real_escape_string($connect, trim($part_page))."' ORDER BY DateUpdated DESC, DateAdded DESC LIMIT 0, 1 ";
   $result_bgads = mysqli_query($connect, $query_bgads) or die(mysqli_error());
   $found_bgads = mysqli_num_rows($result_bgads);
}

mysqli_close($connect);
?>