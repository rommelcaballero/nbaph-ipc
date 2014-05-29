<?php
include('sqli.php');

if(isset($_SESSION['voteStatus'])){
   header("Location: starting-five");
}
$success="";

if(isset($_POST['vote_sub'])){
   if(!isset($_SESSION['voteStatus'])){
      $votes=array($_POST['option_c'], $_POST['option_pf'], $_POST['option_sf'], $_POST['option_sg'], $_POST['option_pg']);

      //print_r($votes);

      foreach($votes as $key){
         $key = mysqli_real_escape_string($connect, $key);
         $q = "SELECT Votes FROM startingfive WHERE StartingfiveID='$key'";
         $query=mysqli_query($connect, $q) or die ("select error: ".mysqli_error());
         $r = mysqli_fetch_array($query);
         $result= intval($r['Votes']);
         //echo $q . "<br>" . $r['Votes'] . " | " . intval($r['Votes']) . "<br>";
         //echo $key." -- ".$result;
         $result++;
         //echo " -- ".$result."<br />";
         if(mysqli_query($connect, "UPDATE startingfive SET Votes='$result' WHERE StartingfiveID='$key'")){
            $success="Thank you for voting!";
            //setcookie("voteStatus",'T', time()+3600*24);
            $_SESSION['voteStatus'] = "T";
         }else{
            die ("update error: ".mysqli_error());
         }
      }
   }else{
      $success= "It seems you have already voted.";
   }
//$success=$vote_c." -- ".$vote_pf." -- ".$vote_sf." -- ".$vote_sg." -- ".$vote_pg;
header("Location: ".$base."starting-five");
}

   $results = mysqli_query($connect, "SELECT AdsDesc, Content FROM ads_list WHERE (AdsDesc='nba_Vote_top_leaderboard' or AdsDesc='nba_Vote_bottom_leaderboard') AND Status='s' ");

   $ads_list = array();

   while ($row = mysqli_fetch_array($results)) {
      $ads_list[$row['AdsDesc']]['Content'] = $row['Content'];
   }

   $ads3 = mysqli_query($connect, "SELECT Content FROM ads_list WHERE AdsDesc='nba_Vote_medallion1' OR AdsDesc='nba_Vote_medallion2' OR AdsDesc='nba_Vote_medallion3' AND Status='s' LIMIT 0,3 ") or die(mysqli_error());

   $ads_array = array();
   $count = 0;

   while ($row = mysqli_fetch_array($ads3)) {
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

   $options=mysqli_query($connect, "SELECT StartingfiveID, PlayerName,Position,Filename FROM startingfive ORDER BY StartingfiveID DESC;") or die ("select center:".mysqli_error());

   $starting_array = array();

   while ($row = mysqli_fetch_array($options)) {
      $temp_array = array("StartingfiveID" => $row['StartingfiveID'],
                          "PlayerName" => $row['PlayerName'],
                          "Position" => $row['Position'],
                          "Filename" => $row['Filename']);
      $starting_array[$row['Position']][] = $temp_array;
   }

   $grounded = 1;
   $query_bgads = "SELECT AdsID, Title, Link, Image, BgColor FROM background_ads WHERE Status='s' AND Page='".mysqli_real_escape_string($connect, trim($part_page))."' ORDER BY DateUpdated DESC, DateAdded DESC LIMIT 0, 1 ";
   $result_bgads = mysqli_query($connect, $query_bgads) or die(mysqli_error());
   $found_bgads = mysqli_num_rows($result_bgads);
mysqli_close($connect);
?>
