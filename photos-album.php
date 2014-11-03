<?php
include('sql.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
<title>NBA Philippines | Photos</title>
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
      <div class="nbaph_article_content" style="height: 100%; overflow: hidden">
<?php
$results = $connect->query("select * from gallery where GalleryID = '" . $connect->real_escape_string($_GET['album']) . "'");
$row = $results->fetch_array();
$album = stripslashes($row['GalleryName']);
$ex = explode("-", $row['DateAdded']);
$date = date("M j, Y", mktime(0, 0, 0, $ex[1], $ex[2], $ex[0]));

$results = $connect->query("select * from galleryphotos where GalleryID = '" . $connect->real_escape_string($_GET['album']) . "'");

$total_album = $results->num_rows;
?>
         <div id="nbaph_photo_slideshow" style="width: <?php echo (100 * $total_album); ?>%">
<?php
$count = 0;

while($row = $results->fetch_array()) {
?>
            <div class="nbaph_photo_slide" style="width: <?php
            echo (100 / $total_album);
            ?>%">
               <div class="nbaph_photo_album_padding">
                  <div class="nbaph_photo_album_frame">
                     <div class="nbaph_photo_album_picture">
                        <img src="<?php echo $row['Filename']; ?>" alt="<?php echo $row['Caption']; ?>" />
                     </div>
                  </div>

                  <div class="nbaph_photo_album_title">
                     <?php echo $album; ?>
                  </div>

                  <div class="nbaph_photo_album_caption">
                     <?php echo stripslashes($row['Caption']); ?>
                  </div>

                  <div class="nbaph_photo_album_details">
                     Credit: <?php echo stripslashes($row['Credits']); ?><br>
                     Date: <?php echo $date; ?>
                  </div>
               </div>
            </div>
<?php
   $count += 1;
}
?>
            <div style="clear: both"></div>
         </div>

         <div id="nbaph_photo_album_left"></div>
         <div id="nbaph_photo_album_right"></div>

         <div class="nbaph_article_pages_album">
            <img src="imagesph/article_page_active.png" class="nbaph_entry_page_album" alt="page 1" targ="photo_slideshow" entry="1" />
<?php
for ($i = 2; $i <= $total_album; $i += 1) {
?>
            <img src="imagesph/article_page_dormant.png" class="nbaph_entry_page_album" alt="page <?php echo $i; ?>" targ="photo_slideshow" entry="<?php echo $i; ?>" />
<?php
}
?>
         </div>
      </div>

      <div class="nbaph_article_more_link"></div>
   </div>
<?php
include('mrec.php');
?>
   <div style="clear: both"></div>
</div>

<?php
include('footer.php');
?>

<script type="text/javascript">
<!--
var page = 1;

$(".nbaph_entry_page_album").click(function() {
   page = $(this).attr('entry');

   $(".nbaph_entry_page_album").each(function() {
      if ($(this).attr('entry') == page) {
         $(this).attr('src', 'imagesph/article_page_active.png');
      }
      else {
         $(this).attr('src', 'imagesph/article_page_dormant.png');
      }
   });

   $("#nbaph_photo_slideshow").animate({marginLeft: "-" + ((page - 1) * 100) + "%"});
});

$(function() {
   $("#nbaph_photo_slideshow").swipe({
      swipeLeft:function(event, direction, distance, duration, fingerCount) {
         var par = $("#nbaph_photo_slideshow").parent().width();
         var est = parseInt($("#nbaph_photo_slideshow").css('margin-left'));

         if (page + 1 <= <?php echo $total_album; ?>) {
            page += 1;

            swiping(page, 'photo_slideshow', 'left', <?php echo intval($total_album); ?>, '_album');
         }
      },
      swipeRight:function(event, direction, distance, duration, fingerCount) {
         var par = $("#nbaph_photo_slideshow").parent().width();
         var est = parseInt($("#nbaph_photo_slideshow").css('margin-left'));

         if (page - 1 >= 1) {
            page -= 1;

            swiping(page, 'photo_slideshow', 'right', <?php echo intval($total_album); ?>, '_album');
         }
      },
      //Default is 75px, set to 0 for demo so any distance triggers swipe
      threshold:0
   });
});

$("#nbaph_photo_album_left").click(function() {
   var par = $("#nbaph_photo_slideshow").parent().width();
   var est = parseInt($("#nbaph_photo_slideshow").css('margin-left'));

   if (page - 1 >= 1) {
      page -= 1;

      swiping(page, 'photo_slideshow', 'right', <?php echo intval($total_album); ?>, '_album');
   }
});

$("#nbaph_photo_album_right").click(function() {
   var par = $("#nbaph_photo_slideshow").parent().width();
   var est = parseInt($("#nbaph_photo_slideshow").css('margin-left'));

   if (page + 1 <= <?php echo $total_album; ?>) {
      page += 1;

      swiping(page, 'photo_slideshow', 'left', <?php echo intval($total_album); ?>, '_album');
   }
});
-->
</script>
</body>
</html>
<?php
$connect->close();
?>