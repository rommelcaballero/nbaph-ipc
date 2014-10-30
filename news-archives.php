<?php
include('sql.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
<title>NBA Philippines | News Archives</title>
<?php
include('head.php');
?>
<link rel="stylesheet" href="news.css" />
</head>

<body>
<?php
include('header.php');
?>

<div style="max-width: 993px; margin: 10px auto">
   <div id="nbaph_news-archives">
      <div id="nbaph_news-archives_weeks">
         <div id="nbaph_news-archives_weeks_back"><img src="imagesph/arrow_left.png" alt="previous week" style="margin-right: 10px" /> Previous Week</div>
         <div id="nbaph_news-archives_weeks_next">Next Week <img src="imagesph/arrow_right.png" alt="next week" style="margin-left: 10px" /></div>
      </div>

      <div id="nbaph_news_archives_cells">
<?php
//$week_start = date("Y-m-d 00:00:00", mktime(0, 0, 0, date("n"), date("j") - date("w")));
//$week_end = date("Y-m-d 23:59:59", mktime(0, 0, 0, date("n"), date("j") + (6 - date("w"))));

$week_start = '2014-08-31 00:00:00';
$week_end = '2014-09-06 23:59:59';
?>
         <input type="hidden" id="nbaph_week_pre" value="2014-08-24 00:00:00">
         <input type="hidden" id="nbaph_week_nex" value="2014-09-07 00:00:00">
<?php
$results = $connect->query("select * from news where DatePosted >= '$week_start' and DatePosted <= '$week_end' order by DatePosted desc");

$i = 0;
$date = "";

while($row = $results->fetch_array()) {
   $xe = explode(" ", $row['DatePosted']);

   if ($date != $xe[0]) {
      if ($date != "") {
?>
            </ul>
         </div>
<?php
         if ($i % 2 == 1) {
            echo '<div class="nbaph_news-archives_margin">&nbsp;</div>' . "\n";
         }
         else {
            echo '<div class="clear"></div>';
         }
      }

      $date = $xe[0];

      $i += 1;
?>
         <div class="nbaph_news-archives_cell">
            <div class="nbaph_news-archives_cell_date">
               <a href="#"><?php
               $ex = explode("-", $xe[0]);

               echo date("l F d, Y", mktime(0, 0, 0, $ex[1], $ex[2], $ex[0]));
               ?></a>
            </div>

            <ul class="nbaph_news-archives_cell_list">
<?php
   }
?>
               <li class="entry"><a href="news-article.php?id=<?php echo $row['NewsID']; ?>"><?php echo stripslashes($row['Title']); ?></a></li>
               <li class="margin"></li>
<?php
   echo "\n";
}
?>
            </ul>
         </div>

         <div class="clear"></div>
      </div>
   </div>

<?php
include('mrec.php');
?>
   <div class="clear"></div>
</div>

<div style="padding: 10px; max-width: 993px; margin:0 auto">                            
   <div class="OUTBRAIN" data-src="http://ph.nba.com/news-article/3024/wolves-gm-optimistic-wont-rush-rubio-extension" data-widget-id="AR_1" data-ob-template="NBAPH" ></div>
   <div class="OUTBRAIN" data-src="http://ph.nba.com/news-article/3024/wolves-gm-optimistic-wont-rush-rubio-extension" data-widget-id="AR_2" data-ob-template="NBAPH" ></div>
   <script type="text/javascript" async="async" src="http://widgets.outbrain.com/outbrain.js"></script> 
</div>

<?php
include('footer.php');
?>
<script type="text/javascript">
<!--
$("#nbaph_news-archives_weeks_back").click(function() {
   var start = $("#nbaph_week_pre").val();

   $("#nbaph_news_archives_cells").html("Loading...");

   $.post("news-archives_page.php", "start=" + start, function(msg) {
      $("#nbaph_news_archives_cells").html(msg);
   });
});

$("#nbaph_news-archives_weeks_next").click(function() {
   var start = $("#nbaph_week_nex").val();

   $("#nbaph_news_archives_cells").html("Loading...");

   $.post("news-archives_page.php", "start=" + start, function(msg) {
      $("#nbaph_news_archives_cells").html(msg);
   });
});
-->
</script>
</body>
</html>
<?php
$connect->close();
?>