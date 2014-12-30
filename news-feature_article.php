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
<?php
include('article_mrec.php');
?>
</head>

<body>
<?php
include('header.php');
?>

<div style="max-width: 993px; margin: 10px auto">
<?php
$results = $connect->query("select * from offcourt where OffcourtID = '" . $connect->real_escape_string($_GET['id']) . "'");
$row = $results->fetch_array();
?>
   <div id="nbaph_news-article_title" style="margin: 10px 0">
      <?php echo stripslashes($row['Title']); ?>
   </div>

   <div style="padding: 5px">
      <div class="addthis_toolbox addthis_default_style ">
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
      <div id="nbaph_news_body">
         <div>
            <img src="<?php echo $row['Photo']; ?>" alt="<?php echo stripslashes($row['Title']); ?>" />
         </div>

         <?php echo str_replace("<ads>", $art_rep, stripslashes($row['Body'])); ?>
      </div>
   </div>
<?php
include('mrec.php');
?>
   <div class="clear"></div>
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