<?php
$part_page = "finals";
include('queries/finals-queries.php');


if(!function_exists('getGameFinalStandings')){
	function getGameFinalStandings(){
		require_once $_SERVER['DOCUMENT_ROOT'] . '/lib/xls_reader.php';
		$data = new Spreadsheet_Excel_Reader();

		// Set output Encoding.
		$data->setOutputEncoding('CP1251');
		
		$data->read($_SERVER['DOCUMENT_ROOT'] . '/data/finals-2013.xls');

		//error_reporting(E_ALL);
		
		$game_data = array();
		$game_data['game_id'] = 1; //default
		$latest_game_id = $data->sheets[2]['cells'][1][2];
		if(!is_null($latest_game_id)){
			$game_data['game_id'] = $latest_game_id;
		}
		for($a=2; $a<=$data->sheets[0]['numRows']; $a++){

			if($data->sheets[0]['cells'][$a][1] == $game_data['game_id']){
				$game_data["miami-data"] = array(
					"score" => $data->sheets[0]['cells'][$a][2],
					"field-goal-percentage" => $data->sheets[0]['cells'][$a][3],
					"team-rebound" => $data->sheets[0]['cells'][$a][4],
					"turn-over" => $data->sheets[0]['cells'][$a][5]						
					);

				$b=$a;

				while($data->sheets[0]['cells'][$b][6] != "end"){
					$game_data["miami-data"]["players"][trim($data->sheets[0]['cells'][$b][6])] = array(						
						"points" => $data->sheets[0]['cells'][$b][7],
						"rebound" => $data->sheets[0]['cells'][$b][8],
						"assist" => $data->sheets[0]['cells'][$b][9],
						"block" => $data->sheets[0]['cells'][$b][10],
						"steal" => $data->sheets[0]['cells'][$b][11]
					);	
					$b++;										
				}
				break;
			}
		} // for			
			
		for($a=2; $a<=$data->sheets[1]['numRows']; $a++){

			if($data->sheets[1]['cells'][$a][1] == $game_data['game_id']){
				$game_data["spurs-data"] = array(
					"score" => $data->sheets[1]['cells'][$a][2],
					"field-goal-percentage" => $data->sheets[1]['cells'][$a][3],
					"team-rebound" => $data->sheets[1]['cells'][$a][4],
					"turn-over" => $data->sheets[1]['cells'][$a][5]						
					);
				$b=$a;
				while(trim($data->sheets[1]['cells'][$b][6]) != "end"){
					$game_data["spurs-data"]["players"][trim($data->sheets[1]['cells'][$b][6])] = array(						
						"points" => $data->sheets[1]['cells'][$b][7],
						"rebound" => $data->sheets[1]['cells'][$b][8],
						"assist" => $data->sheets[1]['cells'][$b][9],
						"block" => $data->sheets[1]['cells'][$b][10],
						"steal" => $data->sheets[1]['cells'][$b][11]
					);							
					$b++;
				}
				break;
			}
		} // for
		return $game_data;		
	}

}

$game_data = getGameFinalStandings();

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>NBA Philippines | Finals</title>
	<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1" /> 
	<META HTTP-EQUIV="Cache-control" content="public" />

	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="style-index.css">
	<script type="text/javascript" src="jquery-1.7.1.min.js"></script>
	<!--link rel="stylesheet" type="text/css" href="colorbox/colorbox.css"-->
	<!--link href="fbfeed/jquery.neosmart.fb.wall.css" rel="stylesheet" type="text/css"/-->	
	<link rel="stylesheet" type="text/css" href="/style-new.css">
	
	<!--link rel="stylesheet" type="text/css" href="/pkg-desktop-bracket-min.css" >
	<link rel="stylesheet" type="text/css" href="/pkg-theme-default-min.css" -->

	<!--[if IE]>
	<link rel="stylesheet" type="text/css" href="ie_style.css">
	<![endif]-->
	<!--[if IE 7]>
	<link rel="stylesheet" type="text/css" href="ie7_style.css">
	<![endif]-->

	<style>
		.finals-title{
			width: 100%;
			height: 40px;
			text-align: center;
			background: url("/media/2.0/title-background.jpg") repeat;
			padding-top: 5px;
		}
		.finals-title span{	
			color:#fff;
			font-size:30px;
			font-family: helvetica;
		}
		.finals-body{
			background: url(/media/2.0/finals-bg-body.jpg) no-repeat;
			min-height: 799px;
		}
		.top-left, .top-middle, .top-right{display: block; float:left; min-height: 100px; }
		.finals-top{padding-top:25px;}
		.top-left{width: 335px; margin: 30px 4px 0 0; text-align: right;}
		.top-left .title{font-size: 12px; font-weight: bold; font-family: Arial,Tahoma,Serif; display: block;}
		.top-left .data{font-size: 25px; font-weight: bold; font-family: Arial,Tahoma,Serif; display: block;}
		.top-middle{width: 318px; margin:2px 0 0 0 ; text-align: center;}
		.top-middle .title{ color:#fff; font-family: Arial,Tahoma,Serif; font-weight: bold; font-size: 18px;}
		.top-middle .data { display: block; margin-top: 25px; vertical-align: top;}
		.top-middle .data .score-left{font-size: 80px; float: left; display: block; color:#c3252e; width: 160px; text-align:center; /*padding-right:20px; text-align: right;*/ }
		.top-middle .data .score-right{font-size: 80px; float: left; display: block; color:#2caadf; width: 158px; text-align:center; /*text-align: left; padding-left: 20px; */}
		
		.top-right{width: 335px;   margin: 30px 0 0 4px;}
		.top-right .title{font-size: 12px; font-weight: bold; font-family: Arial,Tahoma,Serif; display: block;}
		.top-right .data{font-size: 25px; font-weight: bold; font-family: Arial,Tahoma,Serif; display: block;}
		.finals-players{margin-top: 40px; min-height: 100px; padding-bottom: 20px;}
		.players-miami, .players-spurs{display: inline-block; width: 495px;}
		.players-row{text-align: center; margin-bottom: 8px;}
		.player-details{display: inline-block;}
		.player-details .photo{padding:2px; background: #fff;}
		.player-details .name{text-align: left; color:#ffff03; font-size:12px; font-weight: bold;}
		.player-details .stats{padding:5px;}
		.player-details .stats .stats-row{text-align: left; color:#fff; font-size:12px;}
		.player-details .stats .stats-row .data{float:right;}
		.players-spurs, .players-miami{vertical-align: top};
	</style>

	</head>
	<body>

		<?php include('layouts/popups.php'); ?>
		<div id="wrapper">
			<?php include('layouts/header.php'); ?>
			<div id="main_content" > 
				<div id='header'>
	      	  		<div style="height: 10px"></div>
	          		<div style="width: 958px; height: 90px; margin: 0 auto; text-align: center; ">
						<?php //echo $ads_list['nba_homepage_top_leaderboard']; ?>
						<span><a href='http://www.phoenixfuels.ph/2013/05/collect-limited-edition-nba-bottles-at-phoenix-stations/' style='border:none; margin:0;' target="_blank"><img src="/media/2.0/pheonix_bottom-v3.jpg" /></a></span>
	          		</div>    
	          		<div style="height: 10px"></div>
				</div>
				<div class='finals-title'>
					<span>NBA FINALS</span>
				</div>

				<div class='finals-body'>
					<div class='finals-top'>
						<span class='top-left'>
							<span class='title'>Field Goal Percentage :</span>
							<span class='data'><?php echo $game_data['miami-data']['field-goal-percentage']; ?></span>
							<span class='title'>Team Rebounds :</span>
							<span class='data'><?php echo $game_data['miami-data']['team-rebound']; ?></span>
							<span class='title'>Turnovers :</span>
							<span class='data'><?php echo $game_data['miami-data']['turn-over']; ?></span>							
						</span>
						<span class='top-middle'>
							<span class='title'>GAME <?php echo $game_data['game_id']; ?></span>
							<span class='data'>
								<span class='score-left'><?php echo $game_data['miami-data']['score']; ?></span>								
								<span class='score-right'><?php echo $game_data['spurs-data']['score']; ?></span>
							</span>
						</span>
						<span class='top-right'>
							<span class='title'>Field Goal Percentage :</span>
							<span class='data'><?php echo $game_data['spurs-data']['field-goal-percentage']; ?></span>
							<span class='title'>Team Rebounds :</span>
							<span class='data'><?php echo $game_data['spurs-data']['team-rebound']; ?></span>
							<span class='title'>Turnovers :</span>
							<span class='data'><?php echo $game_data['spurs-data']['turn-over']; ?></span>	
						</span>
						<div class='clear'></div>
					</div>
					<div class='finals-players'>
						<div class='players-miami'>
							<div class='players-row'>
								<span id='ray-allen' class='player-details'>
									<div class='photo'><img src='/media/2.0/players/miami/ray_allen.jpg'/></div>
									<div class='name'>RAY ALLEN</div>				
									<div class='stats'>
										<div class='stats-row'>
											<span class='title'>POINTS</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['ray-allen']['points']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>REBOUND</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['ray-allen']['rebound']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>ASSIST</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['ray-allen']['assist']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>BLOCK</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['ray-allen']['block']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>STEAL</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['ray-allen']['steal']; ?></span>
										</div>
									</div>					
								</span>
								<span id='chris-andersen' class='player-details'>
									<div class='photo'><img src='/media/2.0/players/miami/chris_andersen.jpg'/></div>
									<div class='name'>CHRIS ANDERSEN</div>				
									<div class='stats'>
										<div class='stats-row'>
											<span class='title'>POINTS</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['chris-andersen']['points']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>REBOUND</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['chris-andersen']['rebound']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>ASSIST</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['chris-andersen']['assist']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>BLOCK</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['chris-andersen']['block']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>STEAL</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['chris-andersen']['steal']; ?></span>
										</div>
									</div>		
								</span>
								<span id='joel-anthony' class='player-details'>
									<div class='photo'><img src='/media/2.0/players/miami/joel_anthony.jpg'/></div>
									<div class='name'>JOEL ANTHONY</div>				
									<div class='stats'>
										<div class='stats-row'>
											<span class='title'>POINTS</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['joel-anthony']['points']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>REBOUND</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['joel-anthony']['rebound']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>ASSIST</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['joel-anthony']['assist']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>BLOCK</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['joel-anthony']['block']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>STEAL</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['joel-anthony']['steal']; ?></span>
										</div>
									</div>		
								</span>
								<span id='shane-battier' class='player-details'>
									<div class='photo'><img src='/media/2.0/players/miami/shane_battier.jpg'/></div>
									<div class='name'>SHANE BATTIER</div>				
									<div class='stats'>
										<div class='stats-row'>
											<span class='title'>POINTS</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['shane-battier']['points']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>REBOUND</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['shane-battier']['rebound']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>ASSIST</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['shane-battier']['assist']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>BLOCK</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['shane-battier']['block']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>STEAL</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['shane-battier']['steal']; ?></span>
										</div>
									</div>		
								</span>								
							</div>
							<div class='players-row'>
								<span id='chris-bosh' class='player-details'>
									<div class='photo'><img src='/media/2.0/players/miami/chris_bosh.jpg'/></div>
									<div class='name'>CHRIS BOSH</div>				
									<div class='stats'>
										<div class='stats-row'>
											<span class='title'>POINTS</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['chris-bosh']['points']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>REBOUND</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['chris-bosh']['rebound']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>ASSIST</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['chris-bosh']['assist']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>BLOCK</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['chris-bosh']['block']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>STEAL</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['chris-bosh']['steal']; ?></span>
										</div>
									</div>
								</span>
								<span id='mario-chalmers' class='player-details'>
									<div class='photo'><img src='/media/2.0/players/miami/mario_chalmers.jpg'/></div>
									<div class='name'>MARIO CHALMERS</div>				
									<div class='stats'>
										<div class='stats-row'>
											<span class='title'>POINTS</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['mario-chalmers']['points']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>REBOUND</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['mario-chalmers']['rebound']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>ASSIST</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['mario-chalmers']['assist']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>BLOCK</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['mario-chalmers']['block']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>STEAL</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['mario-chalmers']['steal']; ?></span>
										</div>
									</div>
								</span>
								<span id='norris-cole' class='player-details'>
									<div class='photo'><img src='/media/2.0/players/miami/norris_cole.jpg'/></div>
									<div class='name'>NORRIS COLE</div>				
									<div class='stats'>
										<div class='stats-row'>
											<span class='title'>POINTS</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['norris-cole']['points']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>REBOUND</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['norris-cole']['rebound']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>ASSIST</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['norris-cole']['assist']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>BLOCK</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['norris-cole']['block']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>STEAL</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['norris-cole']['steal']; ?></span>
										</div>
									</div>
								</span>
								<span id='udonis-haslem' class='player-details'>
									<div class='photo'><img src='/media/2.0/players/miami/udonis_haslem.jpg'/></div>
									<div class='name'>UDONIS HASLEM</div>				
									<div class='stats'>
										<div class='stats-row'>
											<span class='title'>POINTS</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['udonis-haslem']['points']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>REBOUND</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['udonis-haslem']['rebound']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>ASSIST</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['udonis-haslem']['assist']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>BLOCK</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['udonis-haslem']['block']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>STEAL</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['udonis-haslem']['steal']; ?></span>
										</div>
									</div>
								</span>								
							</div>
							<div class='players-row'>
								<span id='juwan-howard' class='player-details'>
									<div class='photo'><img src='/media/2.0/players/miami/juwan_howard.jpg'/></div>
									<div class='name'>JUWAN HOWARD</div>				
									<div class='stats'>
										<div class='stats-row'>
											<span class='title'>POINTS</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['juwan-howard']['points']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>REBOUND</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['juwan-howard']['rebound']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>ASSIST</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['juwan-howard']['assist']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>BLOCK</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['juwan-howard']['block']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>STEAL</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['juwan-howard']['steal']; ?></span>
										</div>
									</div>
								</span>
								<span id='lebron-james' class='player-details'>
									<div class='photo'><img src='/media/2.0/players/miami/lebron_james.jpg'/></div>
									<div class='name'>LEBRON JAMES</div>				
									<div class='stats'>
										<div class='stats-row'>
											<span class='title'>POINTS</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['lebron-james']['points']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>REBOUND</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['lebron-james']['rebound']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>ASSIST</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['lebron-james']['assist']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>BLOCK</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['lebron-james']['block']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>STEAL</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['lebron-james']['steal']; ?></span>
										</div>
									</div>
								</span>
								<span id='james-jones' class='player-details'>
									<div class='photo'><img src='/media/2.0/players/miami/james_jones.jpg'/></div>
									<div class='name'>JAMES JONES</div>				
									<div class='stats'>
										<div class='stats-row'>
											<span class='title'>POINTS</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['james-jones']['points']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>REBOUND</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['james-jones']['rebound']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>ASSIST</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['james-jones']['assist']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>BLOCK</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['james-jones']['block']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>STEAL</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['james-jones']['steal']; ?></span>
										</div>
									</div>
								</span>
								<span id='rashard-lewis' class='player-details'>
									<div class='photo'><img src='/media/2.0/players/miami/rashard_lewis.jpg'/></div>
									<div class='name'>RASHARD LEWIS</div>				
									<div class='stats'>
										<div class='stats-row'>
											<span class='title'>POINTS</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['rashard-lewis']['points']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>REBOUND</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['rashard-lewis']['rebound']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>ASSIST</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['rashard-lewis']['assist']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>BLOCK</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['rashard-lewis']['block']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>STEAL</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['rashard-lewis']['steal']; ?></span>
										</div>
									</div>
								</span>								
							</div>
							<div class='players-row'>
								<span id='mike-miller' class='player-details'>
									<div class='photo'><img src='/media/2.0/players/miami/mike_miller.jpg'/></div>
									<div class='name'>MIKE MILLER</div>				
									<div class='stats'>
										<div class='stats-row'>
											<span class='title'>POINTS</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['mike-miller']['points']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>REBOUND</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['mike-miller']['rebound']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>ASSIST</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['mike-miller']['assist']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>BLOCK</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['mike-miller']['block']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>STEAL</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['mike-miller']['steal']; ?></span>
										</div>
									</div>
								</span>
								<span id='jarvis-varnado' class='player-details'>
									<div class='photo'><img src='/media/2.0/players/miami/jarvis_varnado.jpg'/></div>
									<div class='name'>JARVIS VARNADO</div>				
									<div class='stats'>
										<div class='stats-row'>
											<span class='title'>POINTS</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['jarvis-varnado']['points']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>REBOUND</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['jarvis-varnado']['rebound']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>ASSIST</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['jarvis-varnado']['assist']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>BLOCK</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['jarvis-varnado']['block']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>STEAL</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['jarvis-varnado']['steal']; ?></span>
										</div>
									</div>
								</span>
								<span id='dwyane-wade' class='player-details'>
									<div class='photo'><img src='/media/2.0/players/miami/dwyane_wade.jpg'/></div>
									<div class='name'>DWYANE WADE</div>				
									<div class='stats'>
										<div class='stats-row'>
											<span class='title'>POINTS</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['dwyane-wade']['points']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>REBOUND</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['dwyane-wade']['rebound']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>ASSIST</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['dwyane-wade']['assist']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>BLOCK</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['dwyane-wade']['block']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>STEAL</span>
											<span class='data'><?php echo $game_data["miami-data"]["players"]['dwyane-wade']['steal']; ?></span>
										</div>
									</div>
								</span>								
							</div>
						</div>
						<div class='players-spurs'>
							<div class='players-row'>
								<span id='aron-baynes' class='player-details'>
									<div class='photo'><img src='/media/2.0/players/spurs/aron_baynes.jpg'/></div>
									<div class='name'>ARON BAYNES</div>				
									<div class='stats'>
										<div class='stats-row'>
											<span class='title'>POINTS</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['aron-baynes']['points']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>REBOUND</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['aron-baynes']['rebound']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>ASSIST</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['aron-baynes']['assist']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>BLOCK</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['aron-baynes']['block']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>STEAL</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['aron-baynes']['steal']; ?></span>
										</div>
									</div>					
								</span>
								<span id='dejuan-blair' class='player-details'>
									<div class='photo'><img src='/media/2.0/players/spurs/dejuan_blair.jpg'/></div>
									<div class='name'>DEJUAN BLAIR</div>				
									<div class='stats'>
										<div class='stats-row'>
											<span class='title'>POINTS</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['dejuan-blair']['points']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>REBOUND</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['dejuan-blair']['rebound']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>ASSIST</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['dejuan-blair']['assist']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>BLOCK</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['dejuan-blair']['block']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>STEAL</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['dejuan-blair']['steal']; ?></span>
										</div>
									</div>		
								</span>
								<span id='matt-bonner' class='player-details'>
									<div class='photo'><img src='/media/2.0/players/spurs/matt_bonner.jpg'/></div>
									<div class='name'>MATT BONNER</div>				
									<div class='stats'>
										<div class='stats-row'>
											<span class='title'>POINTS</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['matt-bonner']['points']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>REBOUND</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['matt-bonner']['rebound']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>ASSIST</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['matt-bonner']['assist']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>BLOCK</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['matt-bonner']['block']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>STEAL</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['matt-bonner']['steal']; ?></span>
										</div>
									</div>		
								</span>
								<span id='nando-de-colo' class='player-details'>
									<div class='photo'><img src='/media/2.0/players/spurs/nando_de_colo.jpg'/></div>
									<div class='name'>NANDO DE COLO</div>				
									<div class='stats'>
										<div class='stats-row'>
											<span class='title'>POINTS</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['nando-de-colo']['points']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>REBOUND</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['nando-de-colo']['rebound']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>ASSIST</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['nando-de-colo']['assist']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>BLOCK</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['nando-de-colo']['block']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>STEAL</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['nando-de-colo']['steal']; ?></span>
										</div>
									</div>		
								</span>								
							</div>
							<div class='players-row'>
								<span id='boris-diaw' class='player-details'>
									<div class='photo'><img src='/media/2.0/players/spurs/boris_diaw.jpg'/></div>
									<div class='name'>BORIS DIAW</div>				
									<div class='stats'>
										<div class='stats-row'>
											<span class='title'>POINTS</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['boris-diaw']['points']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>REBOUND</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['boris-diaw']['rebound']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>ASSIST</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['boris-diaw']['assist']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>BLOCK</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['boris-diaw']['block']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>STEAL</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['boris-diaw']['steal']; ?></span>
										</div>
									</div>
								</span>
								<span id='tim-duncan' class='player-details'>
									<div class='photo'><img src='/media/2.0/players/spurs/tim_duncan.jpg'/></div>
									<div class='name'>TIM_DUNCAN</div>				
									<div class='stats'>
										<div class='stats-row'>
											<span class='title'>POINTS</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['tim-duncan']['points']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>REBOUND</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['tim-duncan']['rebound']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>ASSIST</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['tim-duncan']['assist']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>BLOCK</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['tim-duncan']['block']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>STEAL</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['tim-duncan']['steal']; ?></span>
										</div>
									</div>
								</span>
								<span id='manu-ginobili' class='player-details'>
									<div class='photo'><img src='/media/2.0/players/spurs/manu_ginobili.jpg'/></div>
									<div class='name'>MANU GINOBILI</div>				
									<div class='stats'>
										<div class='stats-row'>
											<span class='title'>POINTS</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['manu-ginobili']['points']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>REBOUND</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['manu-ginobili']['rebound']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>ASSIST</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['manu-ginobili']['assist']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>BLOCK</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['manu-ginobili']['block']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>STEAL</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['manu-ginobili']['steal']; ?></span>
										</div>
									</div>
								</span>
								<span id='danny-green' class='player-details'>
									<div class='photo'><img src='/media/2.0/players/spurs/danny_green.jpg'/></div>
									<div class='name'>DANNY GREEN</div>				
									<div class='stats'>
										<div class='stats-row'>
											<span class='title'>POINTS</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['danny-green']['points']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>REBOUND</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['danny-green']['rebound']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>ASSIST</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['danny-green']['assist']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>BLOCK</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['danny-green']['block']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>STEAL</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['danny-green']['steal']; ?></span>
										</div>
									</div>
								</span>								
							</div>
							<div class='players-row'>
								<span id='cory-joseph' class='player-details'>
									<div class='photo'><img src='/media/2.0/players/spurs/cory_joseph.jpg'/></div>
									<div class='name'>CORY JOSEPH</div>				
									<div class='stats'>
										<div class='stats-row'>
											<span class='title'>POINTS</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['cory-joseph']['points']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>REBOUND</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['cory-joseph']['rebound']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>ASSIST</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['cory-joseph']['assist']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>BLOCK</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['cory-joseph']['block']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>STEAL</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['cory-joseph']['steal']; ?></span>
										</div>
									</div>
								</span>
								<span id='kawhi-leonard' class='player-details'>
									<div class='photo'><img src='/media/2.0/players/spurs/kawhi_leonard.jpg'/></div>
									<div class='name'>KAWHI LEONARD</div>				
									<div class='stats'>
										<div class='stats-row'>
											<span class='title'>POINTS</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['kawhi-leonard']['points']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>REBOUND</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['kawhi-leonard']['rebound']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>ASSIST</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['kawhi-leonard']['assist']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>BLOCK</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['kawhi-leonard']['block']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>STEAL</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['kawhi-leonard']['steal']; ?></span>
										</div>
									</div>
								</span>
								<span id='tracy-mcgrady' class='player-details'>
									<div class='photo'><img src='/media/2.0/players/spurs/tracy_mcgrady.jpg'/></div>
									<div class='name'>TRACY MCGRADY</div>				
									<div class='stats'>
										<div class='stats-row'>
											<span class='title'>POINTS</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['tracy-mcgrady']['points']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>REBOUND</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['tracy-mcgrady']['rebound']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>ASSIST</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['tracy-mcgrady']['assist']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>BLOCK</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['tracy-mcgrady']['block']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>STEAL</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['tracy-mcgrady']['steal']; ?></span>
										</div>
									</div>
								</span>
								<span id='patty-mills' class='player-details'>
									<div class='photo'><img src='/media/2.0/players/spurs/patty_mills.jpg'/></div>
									<div class='name'>PATTY MILLS</div>				
									<div class='stats'>
										<div class='stats-row'>
											<span class='title'>POINTS</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['patty-mills']['points']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>REBOUND</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['patty-mills']['rebound']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>ASSIST</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['patty-mills']['assist']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>BLOCK</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['patty-mills']['block']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>STEAL</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['patty-mills']['steal']; ?></span>
										</div>
									</div>
								</span>								
							</div>
							<div class='players-row'>
								<span id='gary-neal' class='player-details'>
									<div class='photo'><img src='/media/2.0/players/spurs/gary_neal.jpg'/></div>
									<div class='name'>GARY NEAL</div>				
									<div class='stats'>
										<div class='stats-row'>
											<span class='title'>POINTS</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['gary-neal']['points']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>REBOUND</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['gary-neal']['rebound']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>ASSIST</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['gary-neal']['assist']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>BLOCK</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['gary-neal']['block']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>STEAL</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['gary-neal']['steal']; ?></span>
										</div>
									</div>
								</span>
								<span id='tony-parker' class='player-details'>
									<div class='photo'><img src='/media/2.0/players/spurs/tony_parker.jpg'/></div>
									<div class='name'>TONY PARKER</div>				
									<div class='stats'>
										<div class='stats-row'>
											<span class='title'>POINTS</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['tony-parker']['points']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>REBOUND</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['tony-parker']['rebound']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>ASSIST</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['tony-parker']['assist']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>BLOCK</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['tony-parker']['block']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>STEAL</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['tony-parker']['steal']; ?></span>
										</div>
									</div>
								</span>
								<span id='tiago-splitter' class='player-details'>
									<div class='photo'><img src='/media/2.0/players/spurs/tiago_splitter.jpg'/></div>
									<div class='name'>TIAGO SPLITTER</div>				
									<div class='stats'>
										<div class='stats-row'>
											<span class='title'>POINTS</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['tiago-splitter']['points']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>REBOUND</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['tiago-splitter']['rebound']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>ASSIST</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['tiago-splitter']['assist']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>BLOCK</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['tiago-splitter']['block']; ?></span>
										</div>
										<div class='stats-row'>
											<span class='title'>STEAL</span>
											<span class='data'><?php echo $game_data["spurs-data"]["players"]['tiago-splitter']['steal']; ?></span>
										</div>
									</div>
								</span>								
							</div>
						</div>
					</div>

				</div>
				<script>
					$(document).ready(function(){
						$(".player-details .stats").css({"display":"none"});
						$(".players-row").hover(
							function(){
								$(this).find("div.stats").css({"display":"block"});
							},
							function(){
								$(this).find("div.stats").css({"display":"none"});
							}
						);
					});
				</script>
				<div style="width: 958px; height: 90px; margin: 0 auto; text-align: center; margin-top:10px; ">
					<span><a href='http://www.phoenixfuels.ph/2013/05/collect-limited-edition-nba-bottles-at-phoenix-stations/' style='border:none; margin:0;' target="_blank"><img src='/media/2.0/pheonix_bottom-v3.jpg' /><a/></span>
				</div>

	          	<div>
		          	<?php 
		          	//$footer_ads = $ads_list['nba_homepage_bottom_leaderboard']; 
		          	$found_bgads = 0;
		          	//include('layouts/links.php'); 
		          	include('layouts/footer.php');
		          	?>
		          	<div class='clear'></div>
	          	</div>
          	</div><!-- main_content -->   
          	    
		</div><!-- wrapper -->
		<!--script type="text/javascript" src="java-index.js"></script-->		
		<?php include("layouts/background_ads.php"); ?>
	</body>

</html>
