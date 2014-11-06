<?php
include('sqli2.php');

   $results = mysqli_query($connect, "SELECT AdsDesc, Content FROM ads_list WHERE (AdsDesc='nba_writers_top_leaderboard' or AdsDesc='nba_writers_top_medallion' or AdsDesc='nba_writers_bottom_leaderboard') AND Status='s' ");

   $ads_list = array();

   while($row = mysqli_fetch_array($results)) {
      $ads_list[$row['AdsDesc']]['Content'] = $row['Content'];
   }

   $results2 = mysqli_query($connect,"select * from personalitiesorder left join personalities using (Blogger) where DisplayOn <= NOW() order by Position asc,DatePosted desc limit 0, 1000");

   $i = 0;
   $blog_array = array();
//   $count2 = mysqli_num_rows($results2);
//	if(!$count2){
//	$count2='nothing';
//	}
   $last_blogger = "";

   while($row = mysqli_fetch_array($results2)) {
      if ($last_blogger != $row['Blogger']) {
         $blog_array[$i]['Blogger'] = $row['Blogger'];
         $blog_array[$i]['BlogAffiliation'] = $row['BlogAffiliation'];
         $blog_array[$i]['BlogLink'] = $row['BlogLink'];
         $blog_array[$i]['BlogTitle'] = $row['BlogTitle'];
         $blog_array[$i]['BlogExcerpt'] = $row['BlogExcerpt'];
         $blog_array[$i]['BlogID'] = $row['BlogID'];
         $blog_array[$i]['aws_photo_name'] = $row['aws_photo_name'];
		 
         $last_blogger = $row['Blogger'];
         $i += 1;
      }
   }

   $results3 = mysqli_query($connect, "select * from ads where Dimensions = '300x100' order by RAND() limit 0, 1");
   $row = mysqli_fetch_array($results3);

   $ad = array("Link" => $row['Link'], "Image" => $row['Image']);

   $grounded = 1;
   $query_bgads = "SELECT AdsID, Title, Link, Image, BgColor FROM background_ads WHERE Status='s' AND Page='".mysqli_real_escape_string($connect, trim($part_page))."' ORDER BY DateUpdated DESC, DateAdded DESC LIMIT 0, 1 ";
   $result_bgads = mysqli_query($connect, $query_bgads) or die(mysqli_error());
   $found_bgads = mysqli_num_rows($result_bgads);


mysqli_close($connect);
?>
