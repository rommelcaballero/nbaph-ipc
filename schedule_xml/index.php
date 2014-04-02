<?php
include('../sql.php');
$xml = simplexml_load_file("nba_season_schedule.xml");

echo $xml->getName() . "<br />";

/*foreach($xml->children() as $child)
{
   echo $child->getName() . ": " . $child . "<br />";

   foreach($child->children() as $kids) {
      echo $kids->getName() . ": " . $kids . "<br />";
   }
}*/

//echo $xml['League'] . "<br>";

for ($i = 0; $i < count($xml->Game[0]->Msg_game_info); $i += 1) {
   echo $xml->Game[0]->Msg_game_info[$i]->Game_info['Game_id'] . "<br>";

   if ($xml->Game[0]->Msg_game_info[$i]->Game_info['PPD_Status'] == "A") {
      echo $xml->Game[0]->Msg_game_info[$i]->PPD_Info['New_Date_EST'] . ", " . $xml->Game[0]->Msg_game_info[$i]->PPD_Info['New_Time_EST'] . "<br>";
      $ex = explode("/", $xml->Game[0]->Msg_game_info[$i]->PPD_Info['New_Date_EST']);
      $time = substr($xml->Game[0]->Msg_game_info[$i]->PPD_Info['New_Time_EST'], 0, -2);
   }
   else {
      echo $xml->Game[0]->Msg_game_info[$i]->Game_info['Game_date'] . ", " . $xml->Game[0]->Msg_game_info[$i]->Game_info['Game_time'] . "<br>";
      $ex = explode("/", $xml->Game[0]->Msg_game_info[$i]->Game_info['Game_date']);
      $time = substr($xml->Game[0]->Msg_game_info[$i]->Game_info['Game_time'], 0, -2);
   }

   $xe = explode(":", $time);
   $sched = trim($ex[2] . "-" . $ex[0] . "-" . $ex[1] . " " . ($xe[0] + 12) . ":" . $xe[1]);

   $q = "insert into schedule (GameID, GameSeason, GameDate, Arena, Location, HomeTeam, AwayTeam) values ('" . $xml->Game[0]->Msg_game_info[$i]->Game_info['Game_id'] . "', '" . $xml['Season'] . "', '$sched', '" . $xml->Game[0]->Msg_game_info[$i]->Game_info['Arena_name'] . "', '" . $xml->Game[0]->Msg_game_info[$i]->Game_info['Location'] . "', '" . $xml->Game[0]->Msg_game_info[$i]->Home_team['Team_id'] . "', '" . $xml->Game[0]->Msg_game_info[$i]->Visitor_team['Team_id'] . "')";
   mysql_query($q);
   echo "$q<br>\n";
}

mysql_close($connect);
?> 