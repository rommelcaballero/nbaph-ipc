<?php
include('sqli.php');
include("lib.php");

   $results = mysqli_query($connect, "SELECT AdsDesc, Content FROM ads_list WHERE (AdsDesc='nba_CheerColumns_top_leaderboard' or AdsDesc='nba_CheerColumns_bottom_leaderboard' or AdsDesc='nba_Cheerdancers_medallion1') AND Status='s' ");

   $ads_list = array();

   while ($row = mysqli_fetch_array($results)) {
      $ads_list[$row['AdsDesc']]['Content'] = $row['Content'];
   }

   if ($sblog_id) {
      $query = "SELECT * FROM cheercolumn WHERE ColumnID='".mysqli_real_escape_string($connect, $sblog_id)."'";
   } else if ($blogger) {
      $query = "SELECT * FROM cheercolumn WHERE Writer='".mysqli_real_escape_string($connect, $blogger)."' ORDER BY DatePosted DESC LIMIT 0, 4";
   } else {
      $query = "SELECT * FROM cheercolumn ORDER BY DatePosted DESC LIMIT 0, 4";
   }

   $result = mysqli_query($connect, $query) or die(mysqli_error());
   $found = mysqli_num_rows($result);

   $col_array = array();
   $count = 0;

   while($row = mysqli_fetch_array($result)) {
      $col_array[$count]['ColumnID'] = $row['ColumnID'];
      $col_array[$count]['Title'] = $row['Title'];
      $col_array[$count]['Content'] = $row['Content'];
      $col_array[$count]['Intro'] = $row['Intro'];
      $col_array[$count]['Writer'] = $row['Writer'];
      $col_array[$count]['DatePosted'] = $row['DatePosted'];
      $count += 1;
   }

   $grounded = 1;
   $query_bgads = "SELECT AdsID, Title, Link, Image, BgColor FROM background_ads WHERE Status='s' AND Page='".mysqli_real_escape_string($connect, trim($part_page))."' ORDER BY DateUpdated DESC, DateAdded DESC LIMIT 0, 1 ";
   $result_bgads = mysqli_query($connect, $query_bgads) or die(mysqli_error());
   $found_bgads = mysqli_num_rows($result_bgads);

?>