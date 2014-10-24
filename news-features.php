<?php
include('sql.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
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
$results = $connect->query("select * from features order by FeatureID desc limit 0, 11");

include('news-features_headline.php');

include('mrec.php');
?>
   <div style="clear: both"></div>

<?php
include('news-features_more.php');
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
</body>
</html>
<?php
$connect->close();
?>