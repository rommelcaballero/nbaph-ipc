<?php
include("sql.php");

$ex = explode(" ", $_POST['start']);
$st = explode("-", $ex[0]);

$week_start = date("Y-m-d 00:00:00", mktime(0, 0, 0, $st[1], $st[2]));
$week_end = date("Y-m-d 23:59:59", mktime(0, 0, 0, $st[1], $st[2] + 6));
?>
         <input type="hidden" id="nbaph_week_pre" value="<?php echo $st[0] . "-" . $st[1] . "-" . ($st[2] - 7) . " 00:00:00"; ?>">
         <input type="hidden" id="nbaph_week_nex" value="<?php echo $st[0] . "-" . $st[1] . "-" . ($st[2] + 7) . " 00:00:00"; ?>">
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

$connect->close();
?>
         </ul>
      </div>
         <div class="clear"></div>
