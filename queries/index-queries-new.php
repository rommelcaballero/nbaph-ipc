<?php
include('sqli.php');
include('lib.php');
 
   $results = mysqli_query($connect, "SELECT Content, AdsDesc FROM ads_list WHERE (AdsDesc='nba_homepage_top_leaderboard' or AdsDesc='nba_homepage_top_medallion' or AdsDesc='nba_homepage_middle_leaderboard' or AdsDesc='nba_homepage_middle_medallion1' or AdsDesc='nba_homepage_middle_medallion2' or AdsDesc='nba_homepage_bottom_leaderboard') AND Status='s' ");

   $ads_list = array();

   while($row = mysqli_fetch_array($results)) {
      $ads_list[$row['AdsDesc']] = $row['Content'];
   }

   $results = mysqli_query($connect, "SELECT CarouselID, Title, Image, Link, Source, Intro, ImageThumb, Video FROM carousel ORDER BY DatePosted DESC LIMIT 0, 12");
   
   $carousel = "";
   $carousel_array = array();
   $count = 0;

   while($row = mysqli_fetch_array($results)) {
      $carousel_array[$count]['CarouselID'] = $row['CarouselID'];
      $carousel_array[$count]['Title'] = $row['Title'];
      $carousel_array[$count]['Image'] = $row['Image'];
      $carousel_array[$count]['Link'] = $row['Link'];
      $carousel_array[$count]['Source'] = $row['Source'];
      $carousel_array[$count]['Intro'] = $row['Intro'];
      $carousel_array[$count]['ImageThumb'] = $row['ImageThumb'];
      $carousel_array[$count]['Video'] = $row['Video'];
      $count += 1;
   }

   /*-
   $results = mysqli_query($connect, "SELECT VideoID, Thumbnail, Title, Link FROM videos where Section = 'Highlights' and Thumbnail <>'' ORDER BY SortOrder DESC, DatePosted DESC LIMIT 0, 12");

   $vid_total = mysqli_num_rows($results);
   $vid_array = array();
   $count = 0;

   while($row = mysqli_fetch_array($results)) {
      $vid_array[$count]['VideoID'] = $row['VideoID'];
      $vid_array[$count]['Thumbnail'] = $row['Thumbnail'];
      $vid_array[$count]['Title'] = $row['Title'];
      $vid_array[$count]['Link'] = $row['Link'];
      $count += 1;
   }
   */
   $new_vid_array = mysqli_query($connect, "Select id, filename, description, title, small_image from new_videos where categorization='HL' and v_upload_complete=1 and s_img_upload_complete=1 order by  date_created desc, media_game_date desc limit 0, 12");

   $results = mysqli_query($connect, "select NewsID, Title, Link, Source from news order by DatePosted desc limit 0, 10");

   $news_array = array();
   $count = 0;

   while($row = mysqli_fetch_array($results)) {
      $news_array[$count]['NewsID'] = $row['NewsID'];
      $news_array[$count]['Title'] = $row['Title'];
      $news_array[$count]['Link'] = $row['Link'];
      $news_array[$count]['Source'] = $row['Source'];
      $count += 1;
   }

   $results = mysqli_query($connect, "select EventID, Title, Intro, Image, ImageThumb from events order by DatePosted desc limit 0, 1");
   $row = mysqli_fetch_array($results);

   $events_array = array("EventID" => $row['EventID'], "Title" => $row['Title'], "Intro" => $row['Intro'], "Image" => $row['Image'], "ImageThumb" => $row['ImageThumb']);

   $results = mysqli_query($connect, "select * from features order by FeatureID DESC limit 0, 13");

   $features_array = array();
   $count = 0;

   while($row = mysqli_fetch_array($results)) {
      $features_array[$count]['Link'] = $row['Link'];
      $features_array[$count]['Title'] = $row['Title'];
      $count += 1;
   }

   //$results = mysqli_query($connect, "select GalleryID, GalleryName from gallery order by SortOrder DESC, DateAdded desc limit 0, 10");
   //$results = mysqli_query($connect, "select PhotoID, GalleryID, Filename, Caption, ImageThumb from galleryphotos WHERE Filename <> ''  || ImageThumb <> '' order by SortOrder DESC limit 0, 20");
   $query_pho = "SELECT a.*, b.GalleryName, b.DateAdded FROM galleryphotos AS a LEFT JOIN gallery AS b ON a.GalleryID=b.GalleryID WHERE Filename <> ''  || ImageThumb <> '' ORDER BY b.DateAdded DESC, a.PhotoID ASC limit 0, 20";
   $results = mysqli_query($connect,$query_pho);
   $gallery_photos = array();
   while($row = mysqli_fetch_array($results)){
      $gallery_photos[] = $row;
      
   }      

   $results = mysqli_query($connect, "select * from nbaaction order by DatePosted desc limit 0, 1");
   $row = mysqli_fetch_array($results);

   $nbaaction_array = array("Heading" => $row['Heading'], "Content" => $row['Content']);

   $results = mysqli_query($connect, "select AroundID, Content from aroundnba order by DatePosted desc limit 0, 1");
   $row = mysqli_fetch_array($results);

   $around_array = array("AroundID" => $row['AroundID'], "Content" => $row['Content']);

   $results = mysqli_query($connect, "select StartingfiveID, Position, PlayerName, Votes, PlayerNumber, Filename from startingfive order by Votes");
    
   $names = array();
   $votes = array();
    
   while($row = mysqli_fetch_array($results)) {
      //if ($votes[$row['Position']] < $row['Votes']) {
         $names[$row['Position']] = stripslashes($row['PlayerName']);
         $votes[$row['Position']] = $row['Votes'];
      //}
   }

   //$results = mysqli_query($connect, "select BlogID, Blogger, BlogTitle, BlogLink, BlogExcerpt from writers left join writers_stories using (Blogger) group by Blogger order by Position, DatePosted desc limit 0, 20");
   
   $sql_string = "(SELECT  'blog' tablename, b.DatePosted, bo.Position, b.DisplayOn, b.BlogID, b.Blogger, b.BlogTitle, b.BlogLink, b.BlogExcerpt, bo.aws_photo_name 
   FROM blog b JOIN blogorder bo ON bo.Blogger = b.Blogger ORDER BY b.DisplayOn DESC LIMIT 5)
   UNION
   (SELECT  'personalities' tablename, p.DatePosted, po.Position, p.DisplayOn, p.BlogID, p.Blogger, p.BlogTitle, p.BlogLink, p.BlogExcerpt, po.aws_photo_name
   FROM personalities p JOIN personalitiesorder po ON po.Blogger = p.Blogger ORDER BY p.DisplayOn DESC LIMIT 5)
   ORDER BY DisplayOn DESC;";

   $results = mysqli_query($connect,$sql_string);
   $last_blogger = "";
   $person_array = array();
   $blog_cnt = 0;

   while($row = mysqli_fetch_array($results)) {
         $person_array[$blog_cnt]['tablename'] = $row['tablename'];
         $person_array[$blog_cnt]['BlogID'] = $row['BlogID'];
         $person_array[$blog_cnt]['Blogger'] = $row['Blogger'];
         $person_array[$blog_cnt]['BlogTitle'] = $row['BlogTitle'];
         $person_array[$blog_cnt]['BlogLink'] = $row['BlogLink'];
         $person_array[$blog_cnt]['BlogExcerpt'] = $row['BlogExcerpt'];
         $person_array[$blog_cnt]['aws_photo_name'] = $row['aws_photo_name'];		 
         $blog_cnt += 1;
         $last_blogger = $row['Blogger'];
      
   }

   /*$results = mysqli_query($connect, "select BlogID, Blogger, BlogTitle, BlogLink, BlogExcerpt from blogorder left join blog using (Blogger) order by Position, DatePosted desc limit 0, 12");
   $last_blogger = "";
   $blogger_array = array();
   $blog_cnt = 0;

   while($row = mysqli_fetch_array($results)) {
      if ($blog_cnt == 2)
         break;

      if ($last_blogger != $row['Blogger']) {
         $blogger_array[$blog_cnt]['BlogID'] = $row['BlogID'];
         $blogger_array[$blog_cnt]['Blogger'] = $row['Blogger'];
         $blogger_array[$blog_cnt]['BlogTitle'] = $row['BlogTitle'];
         $blogger_array[$blog_cnt]['BlogLink'] = $row['BlogLink'];
         $blogger_array[$blog_cnt]['BlogExcerpt'] = $row['BlogExcerpt'];
         $blog_cnt += 1;
         $last_blogger = $row['Blogger'];
      }
   }*/

   $results = mysqli_query($connect, "select AdID, Image, Link from ads where Dimensions = '300x100' order by RAND() limit 0, 2");

   $ads_array = array();
   $count = 0;

   while($row = mysqli_fetch_array($results)) {
      $ads_array[$count]['AdID'] = $row['AdID'];
      $ads_array[$count]['Image'] = $row['Image'];
      $ads_array[$count]['Link'] = $row['Link'];
      $count += 1;
   }

   $results = mysqli_query($connect, "select PollID, Question, Image from polls order by DatePosted desc limit 0, 1");
   $poll = mysqli_fetch_array($results);

   if(isset($_SESSION['userid'])){
      //$q = "select * from pollvote where PollID = " . $poll['PollID'] . " and UserID = " . mysqli_real_escape_string($connect, $_SESSION['userid']);
      //$latest = mysqli_query($connect, $q);
      //$voted = mysqli_num_rows($latest);
      $voted = 0;
   }

   $results = mysqli_query($connect, "select * from pollquestions where PollID = '" . $poll['PollID'] . "' order by PollID desc");
   $totalquery = mysqli_query($connect, "select SUM(Answers) as Total from pollquestions where PollID = '" . $poll['PollID'] . "' GROUP BY PollID");
   $polltotal = mysqli_fetch_array($totalquery);

   $poll_array = array();
   $count = 0;

	while($row = mysqli_fetch_array($results)) {
	  $poll_array[$count]['Selection'] = $row['Selection'];
	  $poll_array[$count]['Choice'] = $row['Choice'];
	  $poll_array[$count]['Answers'] = $row['Answers'];
	  $count += 1;
	}
	$grounded = 1;
	$query_bgads = "SELECT AdsID, Title, Link, Image, BgColor FROM background_ads WHERE Status='s' AND Page='".mysqli_real_escape_string($connect, trim($part_page))."' ORDER BY DateUpdated DESC, DateAdded DESC LIMIT 0, 1 ";
	$result_bgads = mysqli_query($connect, $query_bgads) or die(mysqli_error());
	$found_bgads = mysqli_num_rows($result_bgads);

	$result = mysqli_query($connect,"select * from wall_videos where status=1");
	$wall_videos_count = mysqli_num_rows($result);
	$wall_videos = array();
	while($row = mysqli_fetch_array($result)){
	  $wall_videos[] = $row;
	}
	//if(count($wall_videos)>0){
	if($wall_videos_count > 0){
	   if((strtotime(date("H:i")) >= strtotime($wall_videos[0]['start_time'])) &&
		(strtotime(date("H:i")) <= strtotime($wall_videos[0]['end_time']))){
			
		}else{
			$wall_videos = array();
		}
	}	



mysqli_close($connect);
?>
