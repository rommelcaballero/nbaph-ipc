<?php
	// podcast query
	include_once "sqli.php";

	$results = mysqli_query($connect, "SELECT AdsDesc, Content FROM ads_list WHERE (AdsDesc='nba_BlogsFull_top_leaderboard' or AdsDesc='nba_BlogsFull_top_medallion' or AdsDesc='nba_BlogsFull_bottom_leaderboard') AND Status='s' ");

   	$ads_list = array();

   	while($row = mysqli_fetch_array($results)) {
      	$ads_list[$row['AdsDesc']]['Content'] = $row['Content'];
   	}

	if(isset($search_title)){
		$query = mysqli_query($connect,"select * from around_nba_stories where status = 1 and title ='" . $search_title . "';");		
		if($query->num_rows > 0){

			$full_story = mysqli_fetch_assoc($query);	
			$query = mysqli_query($connect,"select * from authors where id =".$full_story['writer_id']);
			$author = mysqli_fetch_assoc($query);
			$full_story['Author'] = $author;

		}else{
			$notice = array(
				"type" => "notice",
				"message" => "Unable to file Title :" .$search_title
			);
			unset($search_title);
		}
	}

	if(!isset($search_title)){
		$page = isset($_GET['page'])?filter_var($_GET['page'],FILTER_VALIDATE_INT):1;
		$query = mysqli_query($connect,"select * from around_nba_stories where status =1 order by date_created desc limit ".(($page-1)*2).", 2;");
		//$stories = mysqli_fetch_all($query,MYSQLI_ASSOC);
		while($row = mysqli_fetch_assoc($query)){
			$stories[] = array(
				"id" => $row['id'],
				"title" => $row['title'],
				"excerpt" => $row['excerpt'],
				"content" => $row['content'],
				"image" => $row['image'],
				"writer" => $row['writer'],
				"writer_id" => $row['writer_id'],
				"date_created" => $row['date_created'],
				"status" => $row['status'],
				"tags" => $row['tags']
				);
		}
		$query = mysqli_query($connect,"Select count(*)row_count from around_nba_stories where status=1;");
		$rows = mysqli_fetch_assoc($query);		
		$row_count = $rows["row_count"];
		
		
	}
	

?>