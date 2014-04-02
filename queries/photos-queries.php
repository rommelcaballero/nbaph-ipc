<?php
include('sqli.php');

if($gallery_id)
{
   $query_pho = "SELECT a.*, b.GalleryName, b.DateAdded FROM galleryphotos AS a LEFT JOIN gallery AS b ON a.GalleryID=b.GalleryID WHERE a.GalleryID=".mysqli_real_escape_string($connect, $gallery_id)." ORDER BY a.SortOrder DESC, a.PhotoID ASC ";
   $result_pho = mysqli_query($connect, $query_pho) or die(mysqli_error());
   $found_pho = mysqli_num_rows($result_pho);

   $disp = mysqli_fetch_array($result_pho);
}
else
{
   $query_pho = "SELECT a.*, b.PhotoID, b.Filename, b.Caption, b.ImageSecond FROM gallery AS a LEFT JOIN galleryphotos AS b ON a.GalleryID=b.GalleryID WHERE (a.GalleryID >= 50) GROUP BY a.GalleryID ORDER BY a.SortOrder DESC, a.DateAdded DESC LIMIT 0, 20 ";
   $result_pho = mysqli_query($connect, $query_pho) or die(mysqli_error());
   $found_pho = mysqli_num_rows($result_pho);

}

if(($found_pho <= 0) && ($gallery_id))
{
   header("location: ".$base."photos");
}

   $gallery_array = array();

   if ($gallery_id) {
      $count = 0;
      while($row = mysqli_fetch_array($result_pho)) {
         $gallery_array[$count]['GalleryID'] = $row['GalleryID'];
         $gallery_array[$count]['PhotoID'] = $row['PhotoID'];
         $gallery_array[$count]['Caption'] = $row['Caption'];
         $gallery_array[$count]['Filename'] = $row['Filename'];
         $gallery_array[$count]['Credits'] = $row['Credits'];
         $gallery_array[$count]['GalleryName'] = $row['GalleryName'];
         $gallery_array[$count]['DateAdded'] = $row['DateAdded'];
         $count += 1;
      }
   }
   else {
      $count = 0;
      while($row = mysqli_fetch_array($result_pho)) {
         $gallery_array[$count]['ImageSecond'] = $row['ImageSecond'];
         $gallery_array[$count]['GalleryID'] = $row['GalleryID'];
         $gallery_array[$count]['GalleryName'] = $row['GalleryName'];
         $gallery_array[$count]['Caption'] = $row['Caption'];
         $gallery_array[$count]['DateAdded'] = $row['DateAdded'];
         $count += 1;
      }
   }

   $results = mysqli_query($connect, "SELECT AdsDesc, Content FROM ads_list WHERE (AdsDesc='nba_Photos_top_leaderboard' or AdsDesc='nba_Photos_bottom_leaderboard') AND Status='s' ");

   $ads_list = array();

   while($row = mysqli_fetch_array($results)) {
      $ads_list[$row['AdsDesc']]['Content'] = $row['Content'];
   }

   $results = mysqli_query($connect, "select * from ads where Dimensions = '300x100' order by RAND() limit 0, 1");
   $row = mysqli_fetch_array($results);

   $ad = array("Link" => $row['Link'], "Image" => $row['Image']);

   $results = mysqli_query($connect, "select * from ad_block");
   $row = mysqli_fetch_array($results);
   $adblock = $row['Text'];

   $grounded = 1;
   $query_bgads = "SELECT AdsID, Title, Link, Image, BgColor FROM background_ads WHERE Status='s' AND Page='".mysqli_real_escape_string($connect, trim($part_page))."' ORDER BY DateUpdated DESC, DateAdded DESC LIMIT 0, 1 ";
   $result_bgads = mysqli_query($connect, $query_bgads) or die(mysqli_error());
   $found_bgads = mysqli_num_rows($result_bgads);


mysqli_close($connect);
?>