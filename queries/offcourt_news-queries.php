<?php
include('sqli.php');
include("lib.php");

if($off_id)
{
   $query_off = "SELECT * FROM offcourt WHERE OffcourtID = '".mysqli_real_escape_string($connect, $off_id)."' ";
}
else
{
   $query_off = "SELECT * FROM offcourt ORDER BY DatePosted DESC LIMIT 0, 1 ";
}

$result_off = mysqli_query($connect, $query_off) or die(mysqli_error());
$found_off = mysqli_num_rows($result_off);

if ($found_off == 0)
 {
   header("location: ".$base."off-court-news");
 }

   $row = mysqli_fetch_array($result_off);

   $found_array = array("OffcourtID" => $row['OffcourtID'],
                        "Title" => $row['Title'],
                        "PhotoCredit" => $row['PhotoCredit'],
                        "Body" => $row['Body'],
                        "Intro" => $row['Intro'],
                        "Source" => $row['Source'],
                        "Link" => $row['Link'],
                        "Photo" => $row['Photo']);

   $results = mysqli_query($connect, "select * from offcourt WHERE OffcourtID<>'".mysqli_real_escape_string($connect, $row['OffcourtID'])."' ORDER BY DatePosted DESC LIMIT 0, 4");

   $offcourt_array = array();
   $count = 0;

   while($row = mysqli_fetch_array($results)) {
      $offcourt_array[$count]['Source'] = $row['Source'];
      $offcourt_array[$count]['Link'] = $row['Link'];
      $offcourt_array[$count]['OffcourtID'] = $row['OffcourtID'];
      $offcourt_array[$count]['Title'] = $row['Title'];
      $offcourt_array[$count]['ImageThumb'] = $row['ImageThumb'];
      $offcourt_array[$count]['Intro'] = $row['Intro'];
      $count += 1;
   }

   $results = mysqli_query($connect, "SELECT AdsDesc, Content FROM ads_list WHERE (AdsDesc='nba_OffCourtNews_top_leaderboard' or AdsDesc='nba_OffCourtNews_top_medallion' or AdsDesc='nba_OffCourtNews_bottom_leaderboard') AND Status='s' ");

   $ads_list = array();

   while($row = mysqli_fetch_array($results)) {
      $ads_list[$row['AdsDesc']]['Content'] = $row['Content'];
   }

   $results = mysqli_query($connect, "select Source, Link, OffcourtID, Title from offcourt ORDER BY DatePosted DESC, OffcourtID DESC LIMIT 0, 20 ");

   $other_array = array();
   $count = 0;

   while($row = mysqli_fetch_array($results)) {
      $other_array[$count]['Source'] = $row['Source'];
      $other_array[$count]['OffcourtID'] = $row['OffcourtID'];
      $other_array[$count]['Title'] = $row['Title'];
      $other_array[$count]['Link'] = $row['Link'];
      $count += 1;
   }

   $grounded = 1;
   $query_bgads = "SELECT AdsID, Title, Link, Image, BgColor FROM background_ads WHERE Status='s' AND Page='".mysqli_real_escape_string($connect, trim($part_page))."' ORDER BY DateUpdated DESC, DateAdded DESC LIMIT 0, 1 ";
   $result_bgads = mysqli_query($connect, $query_bgads) or die(mysqli_error());
   $found_bgads = mysqli_num_rows($result_bgads);


mysqli_close($connect);
?>