<?php
include('sql.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
<title>NBA Philippines | Event Videos</title>
<?php
include('head.php');
?>
<link rel="stylesheet" href="videos.css" />
</head>

<body>
<?php
include('header.php');
?>

<div style="max-width: 993px; margin: 10px auto">
   <div id="nbaph_video_top">
<?php
$results = $connect->query("select * from eventsvideos order by DatePosted desc limit 0, 1");

$row = $results->fetch_array();
?>
      <div id="nbaph_video_headliner">
         <div class="nbaph_video_top_padding">
            <div id="nbaph_video_headliner_preview">
               <a href="#"><img src="<?php echo $row['Image']; ?>" alt="<?php echo $row['Title']; ?>" /></a>
            </div>

            <div id="nbaph_video_headliner_description">
               <a href="#"><?php echo stripslashes($row['Title']); ?></a>

               <div style="margin-top: 5px">
                  <?php echo stripslashes($row['Caption']); ?>
               </div>
            </div>
         </div>
      </div>

      <div id="nbaph_video_rated">
         <div class="nbaph_video_top_padding">
            <table style="width: 100%; border-collapse: collapse">
               <tr>
                  <td style="border-right: 1px solid #fff; width: 50%; vertical-align: middle">
                     <div class="nbaph_video_others_header active" section="hl">
                        DAILY MOST LIKED
                     </div>
                  </td>
                  <td style="border-left: 1px solid #fff; width: 50%; vertical-align: middle">
                     <div class="nbaph_video_others_header" section="tp">
                        MOST RECENT
                     </div>
                  </td>
               </tr>
            </table>

            <div class="nbaph_hl">
<?php
//$results = $connect->query("select * from new_videos order by likes desc limit 0, 3");
$results = $connect->query("select * from eventsvideos where VideoID = 1");

while($row = $results->fetch_array()) {
?>
               <table class="nbaph_video_rated_cells">
                  <tr>
                     <td class="nbaph_video_rated_thumbnail">
                        <a href="#"><img src="http://ph.nba.com/ftp-web/<?php echo $row['small_image']; ?>" alt="<?php echo $row['title']; ?>" /></a>
                     </td>
                     <td class="nbaph_video_rated_description">
                        <a href="#"><?php echo stripslashes($row['title']); ?></a>

                        <div>
                           <?php echo stripslashes($row['description']); ?>
                        </div>
                     </td>
                  </tr>
               </table>
<?php
}
?>
            </div>

            <div class="nbaph_tp">
<?php
$results = $connect->query("select * from eventsvideos order by DatePosted desc limit 1, 3");

while($row = $results->fetch_array()) {
?>
               <table class="nbaph_video_rated_cells">
                  <tr>
                     <td class="nbaph_video_rated_thumbnail">
                        <a href="#"><img src="<?php echo $row['Image']; ?>" alt="<?php echo $row['Title']; ?>" /></a>
                     </td>
                     <td class="nbaph_video_rated_description">
                        <a href="#"><?php echo stripslashes($row['Title']); ?></a>

                        <div>
                           <?php echo stripslashes($row['Caption']); ?>
                        </div>
                     </td>
                  </tr>
               </table>
<?php
}
?>
            </div>
         </div>
      </div>

      <div class="clear"></div>
   </div>

   <div class="nbaph_article_wide">
      <div class="nbaph_video_top_padding" style="height: 100%; overflow: hidden">
         <table id="nbaph_video_list_max" class="nbaph_video_list">
            <tr>
<?php
$results = $connect->query("select * from eventsvideos where Image != '' order by DatePosted desc limit 0, 40");

while($row = $results->fetch_array()) {
?>
               <td>
                  <div class="nbaph_video_thumbnail">
                     <img src="<?php echo $row['Image']; ?>" alt="highlight <?php echo $i; ?>" />
                  </div>

                  <div class="nbaph_video_title">
                     <a href="#"><?php echo $row['title']; ?></a>
                  </div>
               </td>
<?php
}
?>
            </tr>
         </table>

         <table id="nbaph_video_list_mid" class="nbaph_video_list">
            <tr>
<?php
$results = $connect->query("select * from eventsvideos where Image != '' order by DatePosted desc limit 0, 50");

while($row = $results->fetch_array()) {
?>
               <td>
                  <div class="nbaph_video_thumbnail">
                     <img src="<?php echo $row['Image']; ?>" alt="highlight <?php echo $i; ?>" />
                  </div>

                  <div class="nbaph_video_title">
                     <a href="#"><?php echo $row['Title']; ?></a>
                  </div>
               </td>
<?php
}
?>
            </tr>
         </table>

         <table id="nbaph_video_list_min" class="nbaph_video_list">
            <tr>
<?php
$results = $connect->query("select * from eventsvideos where Image != '' order by DatePosted desc limit 0, 20");

while($row = $results->fetch_array()) {
?>
               <td>
                  <div class="nbaph_video_thumbnail">
                     <img src="<?php echo $row['Image']; ?>" alt="highlight <?php echo $i; ?>" />
                  </div>

                  <div class="nbaph_video_title">
                     <a href="#"><?php echo $row['Title']; ?></a>
                  </div>
               </td>
<?php
}
?>
            </tr>
         </table>

         <div class="nbaph_article_pages_video">
            <img src="imagesph/article_page_active.png" class="nbaph_entry_page_video" alt="page 1" entry="1" />
<?php
for ($i = 2; $i <= 10; $i += 1) {
?>
            <img src="imagesph/article_page_dormant.png" class="nbaph_entry_page_video" alt="page <?php echo $i; ?>" entry="<?php echo $i; ?>" />
<?php
}
?>
         </div>
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
</body>
</html>
<?php
$connect->close();
?>