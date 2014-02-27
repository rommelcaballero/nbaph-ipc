<?php
include('sqli.php');
include('lib.php');

/*
//for caching
$query1 = "SELECT information_schema.TABLES.UPDATE_TIME FROM information_schema.TABLES WHERE
         information_schema.TABLES.TABLE_SCHEMA LIKE '$sql_db' ORDER BY information_schema.TABLES.UPDATE_TIME DESC
          LIMIT 0,1 ";
$result1 = mysqli_query($connect, $query1) or die(mysqli_error());
$qrow = mysqli_fetch_array($result1); 
$last_db = $qrow['UPDATE_TIME'];

$rep = array(" ", ":");
$per = array("-", "");

$last_file = str_replace($rep, $per, $last_db); 
$cachefile = 'cache/videos-cache-'.$last_file.'.html';

if(!file_exists($cachefile)) {
*/	
	//query ads here
	//$video_ads = mysqli_query($connect, "SELECT Content, AdsDesc FROM ads_list WHERE (AdsDesc='nba_videopage_top_leaderboard' or AdsDesc='nba_videopage_top_medallion' or AdsDesc='nba_videopage_middle_leaderboard' or AdsDesc='nba_videopage_middle_medallion1' or AdsDesc='nba_videopage_middle_medallion2' or AdsDesc='nba_videopage_bottom_leaderboard') AND Status='s' ");
	$result = mysqli_query($connect, "SELECT Content, AdsDesc FROM ads_list WHERE (AdsDesc='nba_homepage_top_leaderboard' or AdsDesc='nba_homepage_top_medallion' or AdsDesc='nba_homepage_middle_leaderboard' or AdsDesc='nba_homepage_middle_medallion1' or AdsDesc='nba_homepage_middle_medallion2' or AdsDesc='nba_homepage_bottom_leaderboard') AND Status='s' ");
	while($row = mysqli_fetch_array($result)){
		$ads_list[$row['AdsDesc']] = $row['Content'];
	}	

	// query selected video
	$id = isset($_GET['id'])?filter_var($_GET['id'],FILTER_VALIDATE_INT):0;
	if($id > 0){
		$result = mysqli_query($connect, "SELECT id,filename,description,title,media_game_date,duration,player,large_image,format FROM new_videos WHERE id=". $id);
		while($row = mysqli_fetch_array($result)){
			$current_video = array(
				'id' => $row['id'],
				'filename' => $row['filename'],
				'description' => $row['description'],
				'title' => $row['title'],
				'media_game_date' => $row['media_game_date'],
				'duration' => $row['duration'],
				'player' => $row['player'],
				'large_image' => $row['large_image'],
				'format' => $row['format']
				);
		}
	}else{
		$result = mysqli_query($connect, "SELECT id,filename,description,title,media_game_date,duration,player,large_image,format FROM new_videos Order by date_created desc limit 1");
		while($row = mysqli_fetch_array($result)){
			$current_video = array(
				'id' => $row['id'],
				'filename' => $row['filename'],
				'description' => $row['description'],
				'title' => $row['title'],
				'media_game_date' => $row['media_game_date'],
				'duration' => $row['duration'],
				'player' => $row['player'],
				'large_image' => $row['large_image'],
				'format' => $row['format']
				);
		}
		//$current_video = false;
	}	
	
	//$autoplay = isset($_GET['autoplay'])?filter_var($_GET['autoplay'],FILTER_VALIDATE_BOOLEAN):true;
	$page = isset($_GET['page'])?filter_var($_GET['page'],FILTER_VALIDATE_INT):1;

	// query video list here
	$result = mysqli_query($connect, "SELECT id,filename,description,title,media_game_date,duration,player,small_image FROM new_videos where v_upload_complete=1 and s_img_upload_complete=1 order by date_created desc, likes desc limit ".(($page-1)*12).", 12");	
	while($row = mysqli_fetch_array($result)){
		$playlist_video[] = array(
			'id' => $row['id'],
			'filename' => $row['filename'],
			'description' => $row['description'],
			'title' => $row['title'],
			'media_game_date' => $row['media_game_date'],
			'duration' => $row['duration'],
			'player' => $row['player'],
			'small_image' => $row['small_image'],
			'format' => $row['format']
			);
	}
	
	//3 most new
	$result = mysqli_query($connect, "SELECT id,filename,description,title,media_game_date,duration,player,small_image FROM new_videos where v_upload_complete=1 and s_img_upload_complete=1 order by date_created desc, id desc, media_game_date desc limit 0, 3");	
	while($row = mysqli_fetch_array($result)){
		$most_recent_video[] = array(
			'id' => $row['id'],
			'filename' => $row['filename'],
			'description' => $row['description'],
			'title' => $row['title'],
			'media_game_date' => $row['media_game_date'],
			'duration' => $row['duration'],
			'player' => $row['player'],
			'small_image' => $row['small_image'],
			'format' => $row['format']
			);
	}
	//most like
	$result = mysqli_query($connect,"SELECT id,filename,description,title,media_game_date,duration,player, small_image FROM new_videos where v_upload_complete=1 and s_img_upload_complete=1 and likes > 0 order by date_format(date_created,'%m-%d-%Y') desc, likes desc limit 0, 3");	
	while($row = mysqli_fetch_array($result)){
		$most_likes[] = array(
			'id' => $row['id'],
			'filename' => $row['filename'],
			'description' => $row['description'],
			'title' => $row['title'],
			'media_game_date' => $row['media_game_date'],
			'duration' => $row['duration'],
			'player' => $row['player'],
			'small_image' => $row['small_image'],
			'format' => $row['format']
			);	
	}

	// count all videos
	$result = mysqli_query($connect,"SELECT count(*) from new_videos where v_upload_complete=1 and s_img_upload_complete=1");	
	while($row = mysqli_fetch_array($result)){
		$row_count = $row[0];
	}
	
	// video preroll counting
	$v_client_result = mysqli_query($connect,"SELECT * from videos_ads_clients where status =1 and impressions > used_impressions;");
	if($v_client_result->num_rows > 0){
		if($v_client_result->num_rows > 1){
			$random_client_index = rand(1,$v_client_result->num_rows);
			while($row = mysqli_fetch_array($v_client_result)){
				$v_client_all[] = $row;
			}
			//$v_client_all = mysqli_fetch_all($v_client_result,MYSQLI_ASSOC);
			$v_client_id = $v_client_all[$random_client_index-1]['id'];
		}else{
			$v_client_fetch = mysqli_fetch_array($v_client_result);
			$v_client_id = $v_client_fetch['id'];
		}	
		$v_ads_result = mysqli_query($connect,"SELECT * from videos_ads where status =1 and client_id=".$v_client_id." and impressions > used_impressions;");
		if($v_ads_result->num_rows == 0){
			$v_ads = null;
		}elseif($v_ads_result->num_rows > 1){
			$random_ads_index = rand(1, $v_ads_result->num_rows);
			while($row = mysqli_fetch_array($v_ads_result)){
				$v_ads_all[] = $row;
			}
			//$v_ads_all = mysqli_fetch_all($v_ads_result,MYSQLI_ASSOC);	
			$v_ads = $v_ads_all[$random_ads_index-1];
		}else{
			$v_ads = mysqli_fetch_array($v_ads_result);
		}
		
		if(!is_null($v_ads)){
			mysqli_query($connect,"UPDATE videos_ads_clients set used_impressions=(used_impressions+1) where id=".$v_ads['client_id']);
			mysqli_query($connect,"UPDATE videos_ads set used_impressions=(used_impressions+1) where id=".$v_ads['id']);
		}		
	}else{
		//get Default adtagurl 
		$v_default_dfp_result = mysqli_query($connect,"SELECT * FROM videos_ads_dfp");
		
		while($row = mysqli_fetch_array($v_default_dfp_result)){
			$default_adtagurl = array($row['adtagurl'],$row['adtagurl2']);
		}
	}
	$query_bgads = "SELECT AdsID, Title, Link, Image, BgColor FROM background_ads WHERE Status='s' AND Page='".mysqli_real_escape_string($connect, trim($part_page))."' ORDER BY DateUpdated DESC, DateAdded DESC LIMIT 0, 1 ";
   	$result_bgads = mysqli_query($connect, $query_bgads) or die(mysqli_error());
   	$found_bgads = mysqli_num_rows($result_bgads);
//}
?>	