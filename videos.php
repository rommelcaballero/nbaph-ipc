<?php
include('sql.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
<title>NBA Philippines | Videos</title>
<?php
include('head.php');
?>
<link rel="stylesheet" href="videos.css" />
<link rel="stylesheet" href="//releases.flowplayer.org/5.5.0/skin/minimalist.css">
<script type="text/javascript" src="//releases.flowplayer.org/5.5.0/flowplayer.min.js"></script>
</head>

<body>
<?php
include('header.php');
?>

<div style="max-width: 993px; margin: 10px auto">
   <div id="nbaph_video_top">
<?php
if ($_REQUEST['video']) {
   $q = "select * from new_videos where id = '" . $connect->real_escape_string($_REQUEST['video']) . "'";
}
else {
   $q = "select * from new_videos order by date_created desc limit 0, 1";
}

$results = $connect->query($q);
$row = $results->fetch_array();
?>
      <div id="nbaph_video_headliner">
         <div class="nbaph_video_top_padding">
            <div id="nbaph_video_headliner_preview" class="flowplayer">
               <!-- a href="#"><img src="http://ph.nba.com/ftp-web/<?php echo $row['large_image']; ?>" alt="<?php echo $row['title']; ?>" /></a -->
               <!-- video id='contentElement' width="630" height="360" controls -->
               <video id='contentElement' style="width: 100%; height: 100%" controls>
                  <source type="video/quicktime" src="/ftp-web/<?php echo $row['filename']; ?>.mov">
                  <source type="video/mp4" src="/ftp-web/<?php echo $row['filename']; ?>.mov">
               </video>
            </div>

            <div id="nbaph_video_headliner_description">
               <a href="#"><?php echo stripslashes($row['title']); ?></a>

               <div style="margin-top: 5px">
                  <?php echo stripslashes($row['description']); ?>
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
$results = $connect->query("select * from new_videos order by likes desc limit 0, 3");

while($row = $results->fetch_array()) {
?>
               <table class="nbaph_video_rated_cells">
                  <tr>
                     <td class="nbaph_video_rated_thumbnail">
                        <a href="videos.php?video=<?php echo $row['id']; ?>"><img src="http://ph.nba.com/ftp-web/<?php echo $row['small_image']; ?>" alt="<?php echo $row['title']; ?>" /></a>
                     </td>
                     <td class="nbaph_video_rated_description">
                        <a href="videos.php?video=<?php echo $row['id']; ?>"><?php echo stripslashes($row['title']); ?></a>

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
$results = $connect->query("select * from new_videos order by date_created desc limit 1, 3");

while($row = $results->fetch_array()) {
?>
               <table class="nbaph_video_rated_cells">
                  <tr>
                     <td class="nbaph_video_rated_thumbnail">
                        <a href="videos.php?video=<?php echo $row['id']; ?>"><img src="http://ph.nba.com/ftp-web/<?php echo $row['small_image']; ?>" alt="<?php echo $row['title']; ?>" /></a>
                     </td>
                     <td class="nbaph_video_rated_description">
                        <a href="videos.php?video=<?php echo $row['id']; ?>"><?php echo stripslashes($row['title']); ?></a>

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
         </div>
      </div>

      <div class="clear"></div>
   </div>

   <div class="nbaph_article_wide">
      <div class="nbaph_video_top_padding" style="height: 100%; overflow: hidden">
         <table id="nbaph_video_list_max" class="nbaph_video_list">
            <tr>
<?php
$i = 1;

$results = $connect->query("select * from new_videos where small_image != '' order by date_created desc limit 0, 40");

while($row = $results->fetch_array()) {
?>
               <td>
                  <div class="nbaph_video_thumbnail">
                     <img src="http://ph.nba.com/ftp-web/<?php echo $row['small_image']; ?>" alt="highlight <?php echo $i; ?>" />
                  </div>

                  <div class="nbaph_video_title">
                     <a href="videos.php?video=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a>
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
$i = 1;

$results = $connect->query("select * from new_videos where small_image != '' order by date_created desc limit 0, 50");

while($row = $results->fetch_array()) {
?>
               <td>
                  <div class="nbaph_video_thumbnail">
                     <img src="http://ph.nba.com/ftp-web/<?php echo $row['small_image']; ?>" alt="highlight <?php echo $i; ?>" />
                  </div>

                  <div class="nbaph_video_title">
                     <a href="videos.php?video=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a>
                  </div>
               </td>
<?php
   $i += 1;
}
?>
            </tr>
         </table>

         <table id="nbaph_video_list_min" class="nbaph_video_list">
            <tr>
<?php
$i = 1;

$results = $connect->query("select * from new_videos where small_image != '' order by date_created desc limit 0, 20");

while($row = $results->fetch_array()) {
?>
               <td>
                  <div class="nbaph_video_thumbnail">
                     <img src="http://ph.nba.com/ftp-web/<?php echo $row['small_image']; ?>" alt="highlight <?php echo $i; ?>" />
                  </div>

                  <div class="nbaph_video_title">
                     <a href="videos.php?video=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a>
                  </div>
               </td>
<?php
   $i += 1;
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