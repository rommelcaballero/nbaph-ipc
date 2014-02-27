<?php

	// delete old videos
	include('sqli.php');
	mysqli_query($connect, "Flush Tables;");

	$files = scandir($_SERVER["DOCUMENT_ROOT"]."/ftp-web/");

	foreach($files as $k => $v){
		$exp = explode(".", $v);
		$extension = $exp[count($exp)-1];
		if($extension == "jpg"){
			$result = mysqli_query($connect, "select * from new_videos where small_image = '". $v ."' or large_image ='".$v."';");
			if($result->num_rows == 0){
				echo "Deleting : " . $v . "<br />";
				unlink($_SERVER['DOCUMENT_ROOT']."/ftp-web/".$v);	
			}			
		}elseif($extension == "mov"){
			$result = mysqli_query($connect, "select * from new_videos where filename = '". $exp[0] ."';");
			if($result->num_rows == 0){
				echo "Deleting : " . $v . "<br />";
				unlink($_SERVER['DOCUMENT_ROOT']."/ftp-web/".$v);	
			}			
		}	

	}
	