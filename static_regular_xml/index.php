<?php
include('../sql.php');
/*$xml = simplexml_load_file("nba_season_team_info.xml");

echo $xml->getName() . "<br />";

/*foreach($xml->children() as $child)
{
   echo $child->getName() . ": " . $child . "<br />";

   foreach($child->children() as $kids) {
      echo $kids->getName() . ": " . $kids . "<br />";
   }
}*/

//echo $xml['League'] . "<br>";

/*for ($i = 0; $i < count($xml->Teams[0]->Team); $i += 1) {
   echo $xml->Teams[0]->Team[$i]['Team_name'] . "<br>";

   $q = "insert into teams (TeamID, TeamName, TeamCity, TeamShort, TeamAbr, TeamCode, Conference, Division, State, Country, HomeArena) values ('" . $xml->Teams[0]->Team[$i]['TeamID'] . "', '" . $xml->Teams[0]->Team[$i]['Team_name'] . "', '" . $xml->Teams[0]->Team[$i]['Team_city'] . "', '" . $xml->Teams[0]->Team[$i]['Short_name'] . "', '" . $xml->Teams[0]->Team[$i]['Abbreviation'] . "', '" . $xml->Teams[0]->Team[$i]['Team_Code'] . "', '" . $xml->Teams[0]->Team[$i]['Conference'] . "', '" . $xml->Teams[0]->Team[$i]['Division'] . "', '" . $xml->Teams[0]->Team[$i]['State'] . "', '" . $xml->Teams[0]->Team[$i]['Country'] . "', '" . $xml->Teams[0]->Team[$i]['Home_Arena'] . "')";
   mysql_query($q);
   echo "$q<br>\n";
}*/

/*$results = mysql_query("select TeamName from teams");

while($row = mysql_fetch_array($results)) {
   $xml = simplexml_load_file("nba_team_season_stats_" . strtolower(str_replace(" ", "", $row['TeamName'])) . ".xml");

   if ($xml == false)
      continue;

   echo $row['TeamName'] . "<br>";

   $q = "insert into teamstats (TeamID, GameSeason, SeasonType, GamesPlayed, Points, PointsPG, FieldGoals, FieldGoalAttempts, ThreePointers, ThreePointerAttempts, FreeThrows, FreeThrowAttempts, OffensiveRebounds, OffensiveReboundsPG, DefensiveRebounds, DefensiveReboundsPG, TotalRebounds, TotalReboundsPG, Assists, AssistsPG, PersonalFouls, FoulsPG, Steals, StealsPG, Turnovers, TurnoversPG, Blocks, BlocksPG, DQ, DQPG) values ('" . $xml['Team_id'] . "', '" . $xml['Season'] . "', '" . $xml['SeasonType'] . "', '" . $xml['Games_Played'] . "', '" . $xml['Points'] . "', '" . $xml['Points_PG'] . "', '" . $xml['Field_Goals'] . "', '" . $xml['Field_Goals_Attempted'] . "', '" . $xml['Three_Pointers'] . "', '" . $xml['Three_Pointers_Attempted'] . "', '" . $xml['Free_Throws'] . "', '" . $xml['Free_Throws_Attempted'] . "', '" . $xml['Offensive_Rebounds'] . "', '" . $xml['Offensive_Rebounds_PG'] . "', '" . $xml['Defensive_Rebounds'] . "', '" . $xml['Defensive_Rebounds_PG'] . "', '" . $xml['Total_Rebounds'] . "', '" . $xml['Total_Rebounds_PG'] . "', '" . $xml['Assists'] . "', '" . $xml['Assists_PG'] . "', '" . $xml['Personal_Fouls'] . "', '" . $xml['Fouls_PG'] . "', '" . $xml['Steals'] . "', '" . $xml['Steals_PG'] . "', '" . $xml['Turnovers'] . "', '" . $xml['Turnovers_PG'] . "', '" . $xml['Blocks'] . "', '" . $xml['Blocks_PG'] . "', '" . $xml['DQ'] . "', '" . $xml['DQ_PG'] . "')";
   mysql_query($q);
   echo "$q<br>";

   $q = "insert into opponentstats (TeamID, GameSeason, SeasonType, GamesPlayed, Points, PointsPG, FieldGoals, FieldGoalAttempts, ThreePointers, ThreePointerAttempts, FreeThrows, FreeThrowAttempts, OffensiveRebounds, OffensiveReboundsPG, DefensiveRebounds, DefensiveReboundsPG, TotalRebounds, TotalReboundsPG, Assists, AssistsPG, PersonalFouls, FoulsPG, Steals, StealsPG, Turnovers, TurnoversPG, Blocks, BlocksPG, DQ, DQPG) values ('" . $xml['Team_id'] . "', '" . $xml['Season'] . "', '" . $xml['SeasonType'] . "', '" . $xml->Opponent['Games_Played'] . "', '" . $xml->Opponent['Points'] . "', '" . $xml->Opponent['Points_PG'] . "', '" . $xml->Opponent['Field_Goals'] . "', '" . $xml->Opponent['Field_Goals_Attempted'] . "', '" . $xml->Opponent['Three_Pointers'] . "', '" . $xml->Opponent['Three_Pointers_Attempted'] . "', '" . $xml->Opponent['Free_Throws'] . "', '" . $xml->Opponent['Free_Throws_Attempted'] . "', '" . $xml->Opponent['Offensive_Rebounds'] . "', '" . $xml->Opponent['Offensive_Rebounds_PG'] . "', '" . $xml->Opponent['Defensive_Rebounds'] . "', '" . $xml->Opponent['Defensive_Rebounds_PG'] . "', '" . $xml->Opponent['Total_Rebounds'] . "', '" . $xml->Opponent['Total_Rebounds_PG'] . "', '" . $xml->Opponent['Assists'] . "', '" . $xml->Opponent['Assists_PG'] . "', '" . $xml->Opponent['Personal_Fouls'] . "', '" . $xml->Opponent['Fouls_PG'] . "', '" . $xml->Opponent['Steals'] . "', '" . $xml->Opponent['Steals_PG'] . "', '" . $xml->Opponent['Turnovers'] . "', '" . $xml->Opponent['Turnovers_PG'] . "', '" . $xml->Opponent['Blocks'] . "', '" . $xml->Opponent['Blocks_PG'] . "', '" . $xml->Opponent['DQ'] . "', '" . $xml->Opponent['DQ_PG'] . "')";
   mysql_query($q);
   echo "$q<br>";

   for ($i = 0; $i < count($xml->PlayerStats); $i += 1) {
      echo $xml->PlayerStats[$i]['First_Name'] . " " . $xml->PlayerStats[$i]['Last_Name'] . "<br>";

      $q = "insert into playerseasonalstats (PlayerID, GameSeason, SeasonType, TeamID, FirstName, LastName, GamesPlayed, GamesStarted, Minutes, MinutesPerGame, Active, Points, PointsPG, FieldGoals, FieldGoalAttempts, ThreePointers, ThreePointerAttempts, FreeThrows, FreeThrowAttempts, OffensiveRebounds, OffensiveReboundsPG, DefensiveRebounds, DefensiveReboundsPG, TotalRebounds, TotalReboundsPG, Assists, AssistsPG, PersonalFouls, FoulsPG, Steals, StealsPG, Turnovers, TurnoversPG, Blocks, BlocksPG) values ('" . $xml->PlayerStats[$i]['Person_ID'] . "', '" . $xml['Season'] . "', '" . $xml['SeasonType'] . "', '" . $xml['Team_id'] . "', '" . $xml->PlayerStats[$i]['First_Name'] . "', '" . $xml->PlayerStats[$i]['Last_Name'] . "', '" . $xml->PlayerStats[$i]['Games_Played'] . "', '" . $xml->PlayerStats[$i]['Games_Started'] . "', '" . $xml->PlayerStats[$i]['Minutes'] . "', '" . $xml->PlayerStats[$i]['Min_Per_Game'] . "', '" . $xml->PlayerStats[$i]['IsActive'] . "', '" . $xml->PlayerStats[$i]['Points'] . "', '" . $xml->PlayerStats[$i]['Points_PG'] . "', '" . $xml->PlayerStats[$i]['Field_Goals'] . "', '" . $xml->PlayerStats[$i]['Field_Goals_Attempted'] . "', '" . $xml->PlayerStats[$i]['Three_Pointers'] . "', '" . $xml->PlayerStats[$i]['Three_Pointers_Attempted'] . "', '" . $xml->PlayerStats[$i]['Free_Throws'] . "', '" . $xml->PlayerStats[$i]['Free_Throws_Attempted'] . "', '" . $xml->PlayerStats[$i]['Offensive_Rebounds'] . "', '" . $xml->PlayerStats[$i]['Offensive_Rebounds_PG'] . "', '" . $xml->PlayerStats[$i]['Defensive_Rebounds'] . "', '" . $xml->PlayerStats[$i]['Defensive_Rebounds_PG'] . "', '" . $xml->PlayerStats[$i]['Total_Rebounds'] . "', '" . $xml->PlayerStats[$i]['Total_Rebounds_PG'] . "', '" . $xml->PlayerStats[$i]['Assists'] . "', '" . $xml->PlayerStats[$i]['Assists_PG'] . "', '" . $xml->PlayerStats[$i]['Personal_Fouls'] . "', '" . $xml->PlayerStats[$i]['Fouls_PG'] . "', '" . $xml->PlayerStats[$i]['Steals'] . "', '" . $xml->PlayerStats[$i]['Steals_PG'] . "', '" . $xml->PlayerStats[$i]['Turnovers'] . "', '" . $xml->PlayerStats[$i]['Turnovers_PG'] . "', '" . $xml->PlayerStats[$i]['Blocks'] . "', '" . $xml->PlayerStats[$i]['Blocks_PG'] . "')";
      mysql_query($q);
      echo "$q<br>\n";
   }
}*/

/*$xml = simplexml_load_file("nba_rosters.xml");

$month = array("January" => "01",
               "February" => "02",
               "March" => "03",
               "April" => "04",
               "May" => "05",
               "June" => "06",
               "July" => "07",
               "August" => "08",
               "September" => "09",
               "October" => "10",
               "November" => "11",
               "December" => "12");

for ($i = 0; $i < count($xml->Game[0]->Msg_Roster[0]->Player_info); $i += 1) {
   echo $xml->Game[0]->Msg_Roster[0]->Player_info[$i]['First_name'] . " " . $xml->Game[0]->Msg_Roster[0]->Player_info[$i]['Last_name'] . "<br>";

   $ex = explode(" ", $xml->Game[0]->Msg_Roster[0]->Player_info[$i]['Birth_date']);
   $birthdate = $ex[2] . "-" . $month[$ex[0]] . "-" . rtrim($ex[1], ",");

   $q = "insert into playerroster (PlayerID, TeamID, PlayerStatus, FirstName, LastName, JerseyNumber, Birthdate, Height, Weight, Position, School, SchoolType, DraftYear, PlayerCode) values ('" . $xml->Game[0]->Msg_Roster[0]->Player_info[$i]['Person_id'] . "', '" . $xml->Game[0]->Msg_Roster[0]->Player_info[$i]['Team_id'] . "', '" . $xml->Game[0]->Msg_Roster[0]->Player_info[$i]['Player_status'] . "', '" . mysql_real_escape_string($xml->Game[0]->Msg_Roster[0]->Player_info[$i]['First_name']) . "', '" . mysql_real_escape_string($xml->Game[0]->Msg_Roster[0]->Player_info[$i]['Last_name']) . "', '" . $xml->Game[0]->Msg_Roster[0]->Player_info[$i]['Jersey_number'] . "', '$birthdate', '" . mysql_real_escape_string(htmlspecialchars_decode($xml->Game[0]->Msg_Roster[0]->Player_info[$i]['Height'])) . "', '" . $xml->Game[0]->Msg_Roster[0]->Player_info[$i]['Weight'] . "', '" . $xml->Game[0]->Msg_Roster[0]->Player_info[$i]['Position'] . "', '" . mysql_real_escape_string($xml->Game[0]->Msg_Roster[0]->Player_info[$i]['School']) . "', '" . $xml->Game[0]->Msg_Roster[0]->Player_info[$i]['SchoolType'] . "', '" . $xml->Game[0]->Msg_Roster[0]->Player_info[$i]['DraftYear'] . "', '" . $xml->Game[0]->Msg_Roster[0]->Player_info[$i]['PlayerCode'] . "')";
   $results = mysql_query($q);
   echo "$results : $q<br>\n";
}*/

$xml = simplexml_load_file("nba_season_fullplayerstats.xml");

for ($i = 0; $i < count($xml->Player); $i += 1) {
   echo $xml->Player[$i]['FirstName'] . " " . $xml->Player[$i]['LastName'] . "<br>";

   if (count($xml->Player[$i]->SeasonSplit) > 0) {
      $q = "insert into playerfullstats (PlayerID, GameSeason, SeasonType, TeamID, FirstName, LastName, GamesPlayed, GamesStarted, Minutes, MinutesPerGame, Points, PointsPG, FieldGoals, FieldGoalAttempts, ThreePointers, ThreePointerAttempts, FreeThrows, FreeThrowAttempts, OffensiveRebounds, OffensiveReboundsPG, DefensiveRebounds, DefensiveReboundsPG, TotalRebounds, TotalReboundsPG, Assists, AssistsPG, AssistsTurnoverRatio, FlagrantFouls, TechnicalFouls, PersonalFouls, PersonalFoulsPG, Steals, StealsPG, Turnovers, TurnoversPG, Blocks, BlocksPG, DoubleDoubles, TripleDoubles, EfficiencyPerGame) values ('" . $xml->Player[$i]['PersonID'] . "', '" . $xml['Season'] . "', '" . $xml['SeasonType'] . "', '0', '" . $xml->Player[$i]['FirstName'] . "', '" . $xml->Player[$i]['LastName'] . "', '" . $xml->Player[$i]['Games'] . "', '" . $xml->Player[$i]['GamesStarted'] . "', '" . $xml->Player[$i]['Minutes'] . "', '" . $xml->Player[$i]['MinutesPerGame'] . "', '" . $xml->Player[$i]['Points'] . "', '" . $xml->Player[$i]['PointsPerGame'] . "', '" . $xml->Player[$i]['FieldGoalsMade'] . "', '" . $xml->Player[$i]['FieldGoalsAttempted'] . "', '" . $xml->Player[$i]['ThreePointMade'] . "', '" . $xml->Player[$i]['ThreePointAttempted'] . "', '" . $xml->Player[$i]['FreeThrowsMade'] . "', '" . $xml->Player[$i]['FreeThrowsAttempted'] . "', '" . $xml->Player[$i]['OffensiveRebounds'] . "', '" . $xml->Player[$i]['OffensiveReboundsPerGame'] . "', '" . $xml->Player[$i]['DefensiveRebounds'] . "', '" . $xml->Player[$i]['DefensiveReboundsPerGame'] . "', '" . $xml->Player[$i]['TotalRebounds'] . "', '" . $xml->Player[$i]['TotalReboundsPerGame'] . "', '" . $xml->Player[$i]['Assists'] . "', '" . $xml->Player[$i]['AssistsPerGame'] . "', '" . $xml->Player[$i]['AssistsTurnoverRatio'] . "', '" . $xml->Player[$i]['FlagrantFouls'] . "', '" . $xml->Player[$i]['TechnicalFouls'] . "', '" . $xml->Player[$i]['PersonalFouls'] . "', '" . $xml->Player[$i]['PersonalFoulsPerGame'] . "', '" . $xml->Player[$i]['Steals'] . "', '" . $xml->Player[$i]['StealsPerGame'] . "', '" . $xml->Player[$i]['Turnovers'] . "', '" . $xml->Player[$i]['TurnoverPerGame'] . "', '" . $xml->Player[$i]['BlockedShots'] . "', '" . $xml->Player[$i]['BlockedShotsPerGame'] . "', '" . $xml->Player[$i]['DoubleDoubles'] . "', '" . $xml->Player[$i]['TripleDoubles'] . "', '" . $xml->Player[$i]['EfficiencyPerGame'] . "')";
      $results = mysql_query($q);
      echo "$results : $q<br>\n";

      for ($j = 0; $j < count($xml->Player[$i]->SeasonSplit); $j += 1) {
         $q = "insert into playerfullstats (PlayerID, GameSeason, SeasonType, TeamID, FirstName, LastName, GamesPlayed, GamesStarted, Minutes, MinutesPerGame, Points, PointsPG, FieldGoals, FieldGoalAttempts, ThreePointers, ThreePointerAttempts, FreeThrows, FreeThrowAttempts, OffensiveRebounds, OffensiveReboundsPG, DefensiveRebounds, DefensiveReboundsPG, TotalRebounds, TotalReboundsPG, Assists, AssistsPG, AssistsTurnoverRatio, FlagrantFouls, TechnicalFouls, PersonalFouls, PersonalFoulsPG, Steals, StealsPG, Turnovers, TurnoversPG, Blocks, BlocksPG, DoubleDoubles, TripleDoubles, EfficiencyPerGame) values ('" . $xml->Player[$i]['PersonID'] . "', '" . $xml['Season'] . "', '" . $xml['SeasonType'] . "', '" . $xml->Player[$i]->SeasonSplit[$j]['TeamID'] . "', '" . $xml->Player[$i]['FirstName'] . "', '" . $xml->Player[$i]['LastName'] . "', '" . $xml->Player[$i]->SeasonSplit[$j]['Games'] . "', '" . $xml->Player[$i]->SeasonSplit[$j]['GamesStarted'] . "', '" . $xml->Player[$i]->SeasonSplit[$j]['Minutes'] . "', '" . $xml->Player[$i]->SeasonSplit[$j]['MinutesPerGame'] . "', '" . $xml->Player[$i]->SeasonSplit[$j]['Points'] . "', '" . $xml->Player[$i]->SeasonSplit[$j]['PointsPerGame'] . "', '" . $xml->Player[$i]->SeasonSplit[$j]['FieldGoalsMade'] . "', '" . $xml->Player[$i]->SeasonSplit[$j]['FieldGoalsAttempted'] . "', '" . $xml->Player[$i]->SeasonSplit[$j]['ThreePointMade'] . "', '" . $xml->Player[$i]->SeasonSplit[$j]['ThreePointAttempted'] . "', '" . $xml->Player[$i]->SeasonSplit[$j]['FreeThrowsMade'] . "', '" . $xml->Player[$i]->SeasonSplit[$j]['FreeThrowsAttempted'] . "', '" . $xml->Player[$i]->SeasonSplit[$j]['OffensiveRebounds'] . "', '" . $xml->Player[$i]->SeasonSplit[$j]['OffensiveReboundsPerGame'] . "', '" . $xml->Player[$i]->SeasonSplit[$j]['DefensiveRebounds'] . "', '" . $xml->Player[$i]->SeasonSplit[$j]['DefensiveReboundsPerGame'] . "', '" . $xml->Player[$i]->SeasonSplit[$j]['TotalRebounds'] . "', '" . $xml->Player[$i]->SeasonSplit[$j]['TotalReboundsPerGame'] . "', '" . $xml->Player[$i]->SeasonSplit[$j]['Assists'] . "', '" . $xml->Player[$i]->SeasonSplit[$j]['AssistsPerGame'] . "', '" . $xml->Player[$i]->SeasonSplit[$j]['AssistsTurnoverRatio'] . "', '" . $xml->Player[$i]->SeasonSplit[$j]['FlagrantFouls'] . "', '" . $xml->Player[$i]->SeasonSplit[$j]['TechnicalFouls'] . "', '" . $xml->Player[$i]->SeasonSplit[$j]['PersonalFouls'] . "', '" . $xml->Player[$i]->SeasonSplit[$j]['PersonalFoulsPerGame'] . "', '" . $xml->Player[$i]->SeasonSplit[$j]['Steals'] . "', '" . $xml->Player[$i]->SeasonSplit[$j]['StealsPerGame'] . "', '" . $xml->Player[$i]->SeasonSplit[$j]['Turnovers'] . "', '" . $xml->Player[$i]->SeasonSplit[$j]['TurnoverPerGame'] . "', '" . $xml->Player[$i]->SeasonSplit[$j]['BlockedShots'] . "', '" . $xml->Player[$i]->SeasonSplit[$j]['BlockedShotsPerGame'] . "', '" . $xml->Player[$i]->SeasonSplit[$j]['DoubleDoubles'] . "', '" . $xml->Player[$i]->SeasonSplit[$j]['TripleDoubles'] . "', '" . $xml->Player[$i]->SeasonSplit[$j]['EfficiencyPerGame'] . "')";
         $results = mysql_query($q);
         echo "$results : $q<br>\n";
      }
   }  
   else {
      $q = "insert into playerfullstats (PlayerID, GameSeason, SeasonType, TeamID, FirstName, LastName, GamesPlayed, GamesStarted, Minutes, MinutesPerGame, Points, PointsPG, FieldGoals, FieldGoalAttempts, ThreePointers, ThreePointerAttempts, FreeThrows, FreeThrowAttempts, OffensiveRebounds, OffensiveReboundsPG, DefensiveRebounds, DefensiveReboundsPG, TotalRebounds, TotalReboundsPG, Assists, AssistsPG, AssistsTurnoverRatio, FlagrantFouls, TechnicalFouls, PersonalFouls, PersonalFoulsPG, Steals, StealsPG, Turnovers, TurnoversPG, Blocks, BlocksPG, DoubleDoubles, TripleDoubles, EfficiencyPerGame) values ('" . $xml->Player[$i]['PersonID'] . "', '" . $xml['Season'] . "', '" . $xml['SeasonType'] . "', '" . $xml->Player[$i]['TeamID'] . "', '" . $xml->Player[$i]['FirstName'] . "', '" . $xml->Player[$i]['LastName'] . "', '" . $xml->Player[$i]['Games'] . "', '" . $xml->Player[$i]['GamesStarted'] . "', '" . $xml->Player[$i]['Minutes'] . "', '" . $xml->Player[$i]['MinutesPerGame'] . "', '" . $xml->Player[$i]['Points'] . "', '" . $xml->Player[$i]['PointsPerGame'] . "', '" . $xml->Player[$i]['FieldGoalsMade'] . "', '" . $xml->Player[$i]['FieldGoalsAttempted'] . "', '" . $xml->Player[$i]['ThreePointMade'] . "', '" . $xml->Player[$i]['ThreePointAttempted'] . "', '" . $xml->Player[$i]['FreeThrowsMade'] . "', '" . $xml->Player[$i]['FreeThrowsAttempted'] . "', '" . $xml->Player[$i]['OffensiveRebounds'] . "', '" . $xml->Player[$i]['OffensiveReboundsPerGame'] . "', '" . $xml->Player[$i]['DefensiveRebounds'] . "', '" . $xml->Player[$i]['DefensiveReboundsPerGame'] . "', '" . $xml->Player[$i]['TotalRebounds'] . "', '" . $xml->Player[$i]['TotalReboundsPerGame'] . "', '" . $xml->Player[$i]['Assists'] . "', '" . $xml->Player[$i]['AssistsPerGame'] . "', '" . $xml->Player[$i]['AssistsTurnoverRatio'] . "', '" . $xml->Player[$i]['FlagrantFouls'] . "', '" . $xml->Player[$i]['TechnicalFouls'] . "', '" . $xml->Player[$i]['PersonalFouls'] . "', '" . $xml->Player[$i]['PersonalFoulsPerGame'] . "', '" . $xml->Player[$i]['Steals'] . "', '" . $xml->Player[$i]['StealsPerGame'] . "', '" . $xml->Player[$i]['Turnovers'] . "', '" . $xml->Player[$i]['TurnoverPerGame'] . "', '" . $xml->Player[$i]['BlockedShots'] . "', '" . $xml->Player[$i]['BlockedShotsPerGame'] . "', '" . $xml->Player[$i]['DoubleDoubles'] . "', '" . $xml->Player[$i]['TripleDoubles'] . "', '" . $xml->Player[$i]['EfficiencyPerGame'] . "')";
      $results = mysql_query($q);
      echo "$results : $q<br>\n";
   }
}

mysql_close($connect);
?> 