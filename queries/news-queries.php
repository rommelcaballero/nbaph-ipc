<?php
include('sqli.php');
include("lib.php"); 
$category = 'articles';
$query1 = "SELECT information_schema.TABLES.UPDATE_TIME FROM information_schema.TABLES WHERE
         information_schema.TABLES.TABLE_SCHEMA LIKE '$sql_db' and information_schema.TABLES.TABLE_NAME ='news' ORDER BY information_schema.TABLES.UPDATE_TIME DESC
          LIMIT 0,1 ";
$result1 = mysqli_query($connect, $query1) or die(mysqli_error());
$qrow = mysqli_fetch_array($result1); 
$last_db = $qrow['UPDATE_TIME'];

$rep = array(" ", ":");
$per = array("-", "");

$last_file = str_replace($rep, $per, $last_db); 
$cachefile = 'cache/news-cache-'.$last_file.'.html';

if(!file_exists($cachefile)) {
   $q = "SELECT AdsDesc, Content FROM ads_list WHERE (AdsDesc='nba_news_top_leaderboard' or AdsDesc='nba_news_top_medallion' or AdsDesc='nba_news_bottom_leaderboard') AND Status='s'";
   $results = mysqli_query($connect, $q);

   $ads_list = array();

   while($row = mysqli_fetch_array($results)) {
      $ads_list[$row['AdsDesc']]['Content'] = $row['Content'];
   }

   $results = mysqli_query($connect, "select * from news where category = '".$category."' order by DatePosted desc limit 0, 1");
   $row = mysqli_fetch_array($results);

   $main_article = array("Source" => $row['Source'],
                         "NewsID" => $row['NewsID'],
                         "Title" => $row['Title'],
                         "Link" => $row['Link'],
                         "Photo" => $row['Photo'],
                         "PhotoCredit" => $row['PhotoCredit'],
                         "Body" => $row['Body']);




    $news_array = array();
    $count = 0;

    if(isset($search) & count($search)>0){
      $query = "select * from news where ";
      $second_or = false;
      foreach($search as $k=>$v){
        if($second_or){
          $query .= " or title like '%" . mysqli_real_escape_string($connect,$v) . "%'";
        }else{  
          $query .= " title like '%" . mysqli_real_escape_string($connect,$v) . "%'";
          $second_or = true;
        }  
      }
      $query .= " order by DatePosted desc limit 1, 12";      
      $results = mysqli_query($connect, $query);
    }else{
      $results = mysqli_query($connect, "select * from news where category = '".$category."' order by DatePosted desc limit 1, 12");       
    }   
    while($row = mysqli_fetch_array($results)) {
      $news_array[$count]['Source'] = $row['Source'];
      $news_array[$count]['NewsID'] = $row['NewsID'];
      $news_array[$count]['Title'] = $row['Title'];
      $news_array[$count]['Link'] = $row['Link'];
      $news_array[$count]['ImageThumb'] = $row['ImageThumb'];
      $news_array[$count]['Body'] = $row['Body'];
      $news_array[$count]['DatePosted'] = $row['DatePosted'];
      $count += 1;
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