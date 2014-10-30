<?php
include('sql.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
<title>NBA Philippines | Event Photos</title>
<?php
include('head.php');
?>
<link rel="stylesheet" href="photos.css" />
</head>

<body>
<?php
include('header.php');
?>

<div style="max-width: 993px; margin: 10px auto">
   <div class="nbaph_article_wide">
      <div class="nbaph_article_content">
<?php
$results = $connect->query("select * from eventsalbum order by SortOrder desc limit 0, 10");

$count = 0;

while($row = $results->fetch_array()) {
   $res = $connect->query("select * from eventsphotos where AlbumID = '" . $row['AlbumID'] . "' limit 0, 1");
   $ph = $res->fetch_array();
?>
         <div class="nbaph_photos_more <?php
         if ($count % 2 == 0) {
            echo 'left';
         }
         ?>">
            <a href="events-album.php?album=<?php echo $row['AlbumID']; ?>">
               <img src="<?php echo $ph['ImageSecond']; ?>" alt="<?php echo $ph['Caption']; ?>" />
            </a>

            <ul class="nbaph_photos_title">
               <li><a href="events-album.php?album=<?php echo $row['AlbumID']; ?>"><?php echo stripslashes($row['AlbumName']); ?></a></li>
            </ul>
         </div>
<?php
   $count += 1;
}
?>

         <div style="clear: both"></div>

         <div id="nbaph_photos_view_more">
            View More
         </div>
      </div>

      <div class="nbaph_article_more_link"></div>
   </div>
<?php
include('mrec.php');
?>
   <div style="clear: both"></div>
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
var last = 1;

$("#nbaph_photos_view_more").click(function() {
   $.post("view_more_events.php", "last=" + last, function(msg) {
      if (msg == "none") {
         $("#nbaph_photos_view_more").css({display: "none"});
      }
      else {
         $("#nbaph_photo_galleries").append(msg);
         last += 1;
      }
   });
});
-->
</script>
</body>
</html>
<?php
$connect->close();
?>