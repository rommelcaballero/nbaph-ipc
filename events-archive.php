<?php
include('sql.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
<title>NBA Philippines | Features</title>
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
<?php
$results = $connect->query("select * from events order by DatePosted desc limit 0, 11");
?>
   <div class="nbaph_article_wide">
      <div class="nbaph_article_content" style="height: 100%; overflow: hidden; margin-top: 0">
         <div id="nbaph_news_image">
<?php
for ($i = 0; $i < 3; $i += 1) {
   $row = $results->fetch_array();
?>
            <div class="nbaph_news_image">
               <img src="<?php echo $row['Image']; ?>" alt="<?php echo $row['Title']; ?>" />

               <div class="nbaph_news_headline_title">
                  <?php echo stripslashes($row['Title']); ?>
               </div>

               <div class="nbaph_news_headline_summary">
                  <?php echo stripslashes($row['Intro']); ?>
               </div>

               <div class="nbaph_news_read">
                  <a href="events-article.php?id=<?php echo $row['EventID']; ?>">Read full article &gt;</a>
               </div>
            </div>
<?php
}
?>

            <div style="clear: both"></div>
         </div>

         <div class="nbaph_article_pages">
            <img src="imagesph/article_page_active.png" class="nbaph_entry_page" targ="news_image" entry="1">
            <img src="imagesph/article_page_dormant.png" class="nbaph_entry_page" targ="news_image" entry="2">
            <img src="imagesph/article_page_dormant.png" class="nbaph_entry_page" targ="news_image" entry="3">
         </div>

         <div style="border-bottom: 1px solid #bd9c54"></div>
      </div>
   </div>
<?php
include('mrec.php');
?>
   <div style="clear: both"></div>

   <div class="nbaph_article_wide">
      <div class="nbaph_article_title">
         MORE EVENTS
      </div>

      <div class="nbaph_article_content">
<?php
$count = 0;

while($row = $results->fetch_array()) {
?>
         <div class="nbaph_news_more <?php
         if ($count % 2 == 0) {
            echo 'left';
         }
         ?>">
            <a href="events-article.php?id=<?php echo $row['EventID']; ?>"><img src="<?php echo $row['Image']; ?>"></a>

            <ul class="nbaph_news_ul">
               <li><a href="events-article.php?id=<?php echo $row['EventID']; ?>"><?php echo $row['Title']; ?></a></li>
            </ul>
         </div>
<?php
   $count += 1;
}
?>

         <div style="clear: both"></div>
      </div>

      <div class="nbaph_article_more_link"></div>
   </div>

   <div style="clear: both"></div>
</div>

<?php
include('footer.php');
?>
</body>
</html>
<?php
$connect->close();
?>