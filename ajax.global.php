<?php

	//ajax.global.php
	include "sqli.php";
	
	$month = $_POST['month'];
	$year = $_POST['year'];
	
	$days_in_month = cal_days_in_month(CAL_GREGORIAN, $month, $year);
	$result = mysqli_query($connect,"select * from global_games_stories where show_on_calendar = 'enabled' and date_of_event >='{$year}-{$month}-1' and date_of_event <='{$year}-{$month}-{$days_in_month}';");
	if($result->num_rows > 0){
		$global_lives = array();
		while($row = mysqli_fetch_assoc($result)){
			$global_lives[] = $row;	
		}
		echo json_encode($global_lives);
	}else{ echo json_encode(array());}	