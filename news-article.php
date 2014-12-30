<?php
include('sql.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
<title>NBA Philippines | News</title>
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
if ($_GET['id'] == "") {
   include('news-article_header.php');

   include('news-article_sample.php');
}
else {
   $results = $connect->query("select * from news where NewsID = '" . $connect->real_escape_string($_GET['id']) . "'");
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

         <?php 
		 //echo stripslashes($row['Body']);
	     $content = $row['Body'];
		 $content_table = explode("<p>", $content);
		 $count = count ($content_table);
		 $mrec11 = '
		 <div id="mrec11" style="float:left;>
		<script type=;padding-right: 10px;padding-top: 15px;padding-bottom: 4px;" text/javascript" src="http://partner.googleadservices.com/gampad/google_service.js">
</script>
<script type="text/javascript">
GS_googleAddAdSenseService("ca-pub-7046465195803313");
GS_googleEnableAllServices();
</script>
<script type="text/javascript">
GA_googleAddSlot("ca-pub-7046465195803313", "NBA_Mobile_300x250_2");
</script>
<script type="text/javascript">
GA_googleFetchAds();
</script>
<script type="text/javascript">
     GA_googleFillSlot("NBA_Mobile_300x250_2");
</script></div>
		 ';

         ?>
         <script type="text/javascript">
		 console.log(total lines: <?php echo $count; ?>)
		 </script>
		 
		 <?php
         for($i=1;$i<$count;$i++){
         echo '<p>'.$content_table[$i];
	     if($i==2){
			 //$newtext= str_replace("<p>", $mrec11, $content_table[$i]);
			 echo $mrec11;
		 //echo $content_table[$i]; 
		 //echo '<div id= "mrec">'; 
		 //include('MREC2.php');
		 //echo '</div>';
        }
}
		 
		 ?>
      </div>
   </div>
<?php
}

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