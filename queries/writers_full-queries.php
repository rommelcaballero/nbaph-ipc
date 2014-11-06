<?php
include('sqli.php');

if ($sblog_id) {
   $query = "SELECT * FROM personalities WHERE BlogID='".mysqli_real_escape_string($connect, $sblog_id)."'";
}
else {
   $query = "SELECT * FROM personalities WHERE Blogger='".mysqli_real_escape_string($connect, $blogger)."' ORDER BY DatePosted DESC LIMIT 0, 4";
}

$result = mysqli_query($connect, $query) or die(mysqli_error());
$found = mysqli_num_rows($result); 

if($found <= 0) {
	 header("location: ".$base."nba-writers");
}

   $blog_array = array();
   $count = 0;

   while($row = mysqli_fetch_array($result)) {
      $blog_array[$count]['BlogID'] = $row['BlogID'];
      $blog_array[$count]['BlogTitle'] = ucfirst(trim(stripslashes($row['BlogTitle'])));
      $blog_array[$count]['BlogBody'] = ucfirst(trim(stripslashes($row['BlogBody'])));
      $blog_array[$count]['BlogExcerpt'] = ucfirst(trim(stripslashes($row['BlogExcerpt'])));
      $blog_array[$count]['Blogger'] = strtolower(trim(stripslashes($row['Blogger'])));
      $blog_array[$count]['DatePosted'] = date("l / F d / Y", strtotime($row['DatePosted'])); 
	  $blog_array[$count]['metadesc'] = ucfirst(trim(stripslashes($row['metadesc'])));
	  $blog_array[$count]['metakey'] = ucfirst(trim(stripslashes($row['metakey'])));
      $count += 1;
   }

   $query_more = "SELECT * FROM personalities WHERE Blogger='".mysqli_real_escape_string($connect, $blog_array[0]['Blogger'])."' and DisplayOn <= NOW() ORDER BY DatePosted DESC LIMIT 0, 20";
   $result_more = mysqli_query($connect, $query_more) or die(mysqli_error()); 

   $cnt_more_array = mysqli_num_rows($result_more);
   $more_array = array();
   $count = 0;

   while($row = mysqli_fetch_array($result_more)) {
	
      $more_array[$count]['BlogID'] = $row['BlogID'];
      $more_array[$count]['BlogTitle'] = $row['BlogTitle'];
      $more_array[$count]['Blogger'] = $row['Blogger'];
      $more_array[$count]['DatePosted'] = $row['DatePosted'];
      $count += 1;
   }

   $results = mysqli_query($connect, "SELECT AdsDesc, Content FROM ads_list WHERE (AdsDesc='nba_WritersFull_top_leaderboard' or AdsDesc='nba_WritersFull_medallion1' or AdsDesc='nba_WritersFull_bottom_leaderboard') AND Status='s' ");

   $ads_list = array();

   while($row = mysqli_fetch_array($results)) {
      $ads_list[$row['AdsDesc']]['Content'] = $row['Content'];
   }

   $grounded = 1;
   $query_bgads = "SELECT AdsID, Title, Link, Image, BgColor FROM background_ads WHERE Status='s' AND Page='".mysqli_real_escape_string($connect, trim($part_page))."' ORDER BY DateUpdated DESC, DateAdded DESC LIMIT 0, 1 ";
   $result_bgads = mysqli_query($connect, $query_bgads) or die(mysqli_error());
   $found_bgads = mysqli_num_rows($result_bgads);


mysqli_close($connect);
?>
