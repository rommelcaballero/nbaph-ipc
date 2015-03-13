<?php
include('sql.php');

if ($_GET['blog'] == "") {
   header("Location: bloggers.php");
   exit(0);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
<title>NBA Philippines | Writers Archive</title>
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
   <div style="padding: 5px">
      <div class="addthis_toolbox addthis_default_style " style="-ms-transform: scale(1,1.7); /* IE 9 */ -webkit-transform: scale(1,1.7); /* Safari */ transform: scale(1,1.7);">
         <a class="addthis_button_preferred_1"></a>
         <a class="addthis_button_preferred_2"></a>
         <a class="addthis_button_preferred_3"></a>
         <a class="addthis_button_preferred_4"></a>
         <a class="addthis_button_compact"></a>
         <a class="addthis_counter addthis_bubble_style"></a>
      </div>
      <script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
      <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-503c81d36918b206"></script>
   </div>

   <div class="nbaph_article_wide">
      <div class="nbaph_article_content">
<?php
$results = $connect->query("select * from blog where Blogger = '" . $connect->real_escape_string(urldecode($_GET['blog'])) . "' order by DisplayOn desc limit 0, 8");

while($row = $results->fetch_array()) {
?>
         <div class="nbaph_news-writers_cell" style="clear: both; width: 100%">
            <div class="nbaph_news-writers_padding">
               <div class="nbaph_news-writers_title">
                  <a href="<?php
                  if ($row['BlogLink']) {
                     echo $row['BlogLink'];
                  }
                  else {
                     echo 'bloggers_article.php?id=' . $row['BlogID'];
                  }
                  ?>" style="font-size: 18px"><?php echo stripslashes($row['BlogTitle']); ?></a>
               </div>

               <div class="nbaph_news-writers_summary" style="font-size: 15px">
                  <?php echo stripslashes($row['BlogExcerpt']); ?>
               </div>

               <div class="nbaph_news-writers_links">
                  <a href="<?php
                  if ($row['BlogLink']) {
                     echo $row['BlogLink'];
                  }
                  else {
                     echo 'bloggers_article.php?id=' . $row['BlogID'];
                  }
                  ?>" style="font-size: 15px">Full Story</a>
               </div>
            </div>
         </div>
<?php
}
?>

         <div style="clear: both"></div>
      </div>

      <div class="nbaph_article_more_link"></div>
   </div>

   <div class="nbaph_margin nbaph_standard_only">&nbsp;</div>

   <div class="nbaph_article_standard">
      <div class="nbaph_standard_only">
         <div id='div-gpt-ad-1410756752515-0' class="nbaph_mrec" style='width:300px; height:250px; margin: 0 auto'>
            <script type='text/javascript'>
            googletag.cmd.push(function() { googletag.display('div-gpt-ad-1410756752515-0'); });
            </script>
         </div>
      </div>

      <div id="nbaph_writers_more" style="margin-top: 10px">
         <div class="nbaph_recent_content">
            MORE FROM <?php echo strtoupper(urldecode($_GET['blog'])); ?>
         </div>

<?php
$results = $connect->query("select * from blog where Blogger = '" . $connect->real_escape_string(urldecode($_GET['blog'])) . "' order by DisplayOn desc limit 8, 100");

while($row = $results->fetch_array()) {
?>
         <div class="nbaph_writers_more_entry">
            <a href="<?php
            if ($row['BlogLink']) {
               echo $row['BlogLink'];
            }
            else {
               echo 'bloggers_article.php?id=' . $row['BlogID'];
            }
            ?>"><?php echo stripslashes($row['BlogTitle']); ?></a>
            <?php
            $ex = explode("-", $row['DatePosted']);
            echo date("l F d, Y", mktime(0, 0, 0, $ex[1], $ex[2], $ex[0]));
            ?>
         </div>
<?php
}
?>
      </div>
   </div>

   <div style="clear: both"></div>
</div>

<div id="nbaph_disqus" style="max-width: 993px; margin: 0 auto">
   <div id="disqus_thread" style='padding: 10px; width: 66%; padding:10px;'></div>
   <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
</div>

<script type="text/javascript">
   /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
   var disqus_shortname = 'ph-nba-com'; // required: replace example with your forum shortname		

   //next line needs to be replaced with current url
   var disqus_url = '<?php echo "http://" . $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]; ?>';
   /* * * DON'T EDIT BELOW THIS LINE * * */
   (function() {
      var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
      dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
      (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
   })();
</script>
<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

<?php
include('footer.php');
?>
</body>
</html>
<?php
$connect->close();
?>