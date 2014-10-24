<?php
include('sql.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
<?php
include('head.php');
?>
<link rel="stylesheet" href="scores.css" />
</head>

<body>
<?php
include('header.php');
?>

<div style="max-width: 993px; margin: 10px auto">
   <div id="nbaph_scores_header">
      <div style="padding: 20px 15px">
         <div id="nbaph_scores_header_date">
            <img src="imagesph/arrow_left.png" id="nbaph_scores_header_date_back" alt="previous day" />
            <span style="padding: 0 15px"><?php echo date("M j, Y"); ?></span>
            <img src="imagesph/arrow_right.png" id="nbaph_scores_header_date_next" alt="next day" />
         </div>

         <div id="nbaph_scores_calendar_button"></div>
      </div>
   </div>

   <div id="nbaph_scores_current"><?php echo date("M j, Y"); ?></div>
<?php
$results = $connect->query("select GameDate, HomeTeam, AwayTeam from schedule order by GameDate desc limit 0, 2");
$row = $results->fetch_array();

$ex = explode(" ", $row['GameDate']);
$time = explode(":", $ex[1]);
?>
   <div class="nbaph_scores_upcoming">
      <div class="nbaph_scores_upcoming_header">
         <p class="nbaph_scores_upcoming_time"><?php echo date("g:i A"); ?></p>
      </div>

      <table>
         <tr>
<?php
$teams = $connect->query("select * from teams where TeamID = '" . $row['HomeTeam'] . "'");
$t = $teams->fetch_array();
?>
            <td class="nbaph_scores_20" style="text-align: right">
               <div class="nbaph_scores_team_abr"><?php echo $t['TeamAbr']; ?></div>
               <div class="nbaph_scores_zero">0-0</div>
            </td>
            <td class="nbaph_scores_25"><img src="http://ph.global.nba.com/media/teamLogos/large/<?php echo $t['TeamAbr']; ?>.png"></td>
            <td class="nbaph_scores_vs">VS</td>
<?php
$teams = $connect->query("select * from teams where TeamID = '" . $row['AwayTeam'] . "'");
$t = $teams->fetch_array();
?>
            <td class="nbaph_scores_25"><img src="http://ph.global.nba.com/media/teamLogos/large/<?php echo $t['TeamAbr']; ?>.png"></td>
            <td class="nbaph_scores_20">
               <div class="nbaph_scores_team_abr"><?php echo $t['TeamAbr']; ?></div>
               <div class="nbaph_scores_zero">0-0</div>
            </td>
         </tr>
      </table>
   </div>

   <div class="nbaph_scores_margin">&nbsp;</div>
<?php
$row = $results->fetch_array();

$teams = $connect->query("select * from teams where TeamID = '" . $row['HomeTeam'] . "'");
?>

<?php
$teams = $connect->query("select * from teams where TeamID = '" . $row['AwayTeam'] . "'");
?>
   <div class="nbaph_scores_finished">
      <div class="nbaph_scores_finished_header">
         <p class="nbaph_scores_finished_time">FINAL</p>
      </div>

      <table>
         <tr>
<?php
$teams = $connect->query("select * from teams where TeamID = '" . $row['HomeTeam'] . "'");
$t = $teams->fetch_array();
?>
            <td class="nbaph_scores_20" style="text-align: right">
               <div class="nbaph_scores_team_abr"><?php echo $t['TeamAbr']; ?></div>
               <div class="nbaph_scores_zero">0-0</div>
            </td>
            <td class="nbaph_scores_25"><img src="http://ph.global.nba.com/media/teamLogos/large/<?php echo $t['TeamAbr']; ?>.png"></td>
            <td class="nbaph_scores_vs">VS</td>
<?php
$teams = $connect->query("select * from teams where TeamID = '" . $row['AwayTeam'] . "'");
$t = $teams->fetch_array();
?>
            <td class="nbaph_scores_25"><img src="http://ph.global.nba.com/media/teamLogos/large/<?php echo $t['TeamAbr']; ?>.png"></td>
            <td class="nbaph_scores_20">
               <div class="nbaph_scores_team_abr"><?php echo $t['TeamAbr']; ?></div>
               <div class="nbaph_scores_zero">0-0</div>
            </td>
         </tr>
      </table>
   </div>

   <div class="clear"></div>
</div>

<div style="padding: 10px; max-width: 993px; margin:0 auto">                            
   <div class="OUTBRAIN" data-src="http://ph.nba.com/news-article/3024/wolves-gm-optimistic-wont-rush-rubio-extension" data-widget-id="AR_1" data-ob-template="NBAPH" ></div>
   <div class="OUTBRAIN" data-src="http://ph.nba.com/news-article/3024/wolves-gm-optimistic-wont-rush-rubio-extension" data-widget-id="AR_2" data-ob-template="NBAPH" ></div>
   <script type="text/javascript" async="async" src="http://widgets.outbrain.com/outbrain.js"></script> 
</div>

<script type="text/javascript">
<!--
var calendar = 0;
-->
</script>
<?php
include('footer.php');
?>
</body>
</html>
<?php
$connect->close();
?>