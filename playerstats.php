<?php
$fname = strtolower($_GET['fullname']);
$n = explode(' ',$fname);
$fn = strtolower($n[0]);
$ln = strtolower($n[1]);
$fullname = $fn.'_'.$ln;
$json_url = file_get_contents("http://ph.global.nba.com/stats2/player/snapshot.json?ds=simpleProfile&playerCode=".$fullname);
$json = json_decode($json_url, true);
$name = $json['payload']['players'][0]['playerProfile']['displayName'];
$ppg = $json['payload']['players'][0]['stats']['currentSeasonTypeStat']['currentSeasonTypePlayerTeamStats'][0]['statAverage']['pointsPg'];
$rpg = $json['payload']['players'][0]['stats']['currentSeasonTypeStat']['currentSeasonTypePlayerTeamStats'][0]['statAverage']['rebsPg'];
$apg = $json['payload']['players'][0]['stats']['currentSeasonTypeStat']['currentSeasonTypePlayerTeamStats'][0]['statAverage']['assistsPg'];
$spg = $json['payload']['players'][0]['stats']['currentSeasonTypeStat']['currentSeasonTypePlayerTeamStats'][0]['statAverage']['stealsPg'];
$bpg = $json['payload']['players'][0]['stats']['currentSeasonTypeStat']['currentSeasonTypePlayerTeamStats'][0]['statAverage']['blocksPg'];
?>

 <!DOCTYPE html>
<html>
<head>
    <base target="_parent" />
<style>
  body{font-family:arial; font-size:12px; color:#5d5d5d; margin:0px;}
  ul,li{margin:0px; padding:0px; list-style:none;}
  h1{margin:5px 0; font-size:12px;}
  .widget_main{width:195px;}
  .seasonStatList{border:1px solid #e6e6e6;}
  .seasonStatList li{display:block; height:16px; line-height:15px; border-bottom:1px dashed #e6e6e6; padding:0 5px; 
font-size:12px;}
  .seasonStatList li:last-child{border-bottom:0px;}
  .seasonStatList li.name{display:none;}
  .seasonStatList li .type{float:left; font-weight:bold;}
  .seasonStatList li .value{float:right; width:145px; text-align:left;}
</style>
</head>
<body>
  <div id="stats_data">
    <h1>2014-2015 Statistics</h1>
    


   	      	
	   
  	

<div class="widget_main">
	<div class="playerFileSnapshot">
	     <div class="playerStats">
			<div class="seasonStats"> 
				
				
					<ul class="seasonStatList statList">
						
						
							
							
						
						<li class="name">
						    <a class="nameLink" href="">
						        
						        <?php echo $name; ?>
						    </a>
						</li>
                        
						
						
						
						
						
						
							<li class="ppg"><span class="value"><?php echo $ppg; ?></span><span class="type"> PPG</span></li>
						
						
							<li class="rpg"><span class="value"><?php echo $rpg; ?></span><span class="type"> RPG  </span></li>
						
						
							<li class="apg"><span class="value"><?php echo $apg; ?></span><span class="type"> APG  </span></li>
						
						
						
						
						
						
						
						
							<li class="stealsPg"><span class="value"><?php echo $spg; ?></span> <span class="type"> SPG  </span></li>
						
						
							<li class="blocksPg"><span class="value"><?php echo $bpg; ?></span><span class="type"> BPG </span> </li>
						
						
						
						
                        
                        
                          
                                                         
                        
                        
                                                
                        
                        
                        
                        
                                                                             
                        	
                        				
					</ul>
				
			</div>
		</div>		
</div>
</div>				

  </div>
</body>
</html>
