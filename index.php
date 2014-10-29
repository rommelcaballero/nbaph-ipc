<?php
include('./sql.php');

/*
swiping plugins:
http://labs.rampinteractive.co.uk/touchSwipe/demos/

http://ph.glob-prev2.nba.com/articles/licensee_widget_all_iframes.html
*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
<?php
include('head.php');
?>
</head>

<body>
<?php
include('header.php');
?>

<div style="max-width: 993px; margin: 10px auto">

<div style="margin: 10px 0">
   <iframe src="http://ph.glob-prev2.nba.com/articles/licensee_widget_scoreboard.html" style="width: 100%; height: 100%" frameBorder="0" scrolling="no" > </iframe>
</div>

<?php
include('article_headline.php');

include('mrec.php');

include('article_video.php');
?>
   <div class="nbaph_margin nbaph_standard_only">&nbsp;</div>
<?php
include('article_news.php');
?>
   <div class="nbaph_margin nbaph_mobile_only">&nbsp;</div>
<?php
include('article_standard_mobile.php');

//include('article_nbastore.php');
?>
   <!-- div class="nbaph_margin nbaph_standard_only">&nbsp;</div -->
<?php
//include('article_standard.php');
?>
<div id="nbaph_prestream">
<?php
include('article_poll.php');
?>
   <div class="nbaph_margin" style="width: 3.04%">&nbsp;</div>
<?php
include('article_gallery.php');

include('article_wide.php');
?>
</div>

   <div class="clear nbaph_mobile_only"></div>
   <div class="nbaph_margin nbaph_standard_only">&nbsp;</div>
<?php
$spec_id = "nbaph_standard_only";
include('article_stream.php');
?>
   <div class="nbaph_margin nbaph_standard_only">&nbsp;</div>
<?php
include('article_events.php');
?>
   <div class="clear nbaph_standard_only"></div>
<?php
include('article_bench.php');
?>
   <div class="nbaph_margin">&nbsp;</div>
<?php
include('article_features.php');
?>
   <div class="clear nbaph_mobile_only"></div>
   <div class="nbaph_margin nbaph_standard_only">&nbsp;</div>
<?php
$spec_id = "nbaph_mobile_only";
include('article_stream.php');

include('article_bench.php');
?>
   <div class="nbaph_margin nbaph_mobile_only">&nbsp;</div>
<?php
include('article_around.php');
?>
   <div class="clear"></div>
<?php
include('article_standard.php');
?>
   <div class="nbaph_margin nbaph_standard_only">&nbsp;</div>

   <div class="nbaph_article_standard">
      <iframe src="http://ph.glob-prev2.nba.com/articles/licensee_widget_leaders.html" frameBorder="0" style="width: 100%; height: 600px" scrolling="no"  > </iframe>
   </div>

   <div class="nbaph_margin nbaph_standard_only">&nbsp;</div>

   <div class="nbaph_article_standard">
      <iframe src="http://ph.glob-prev2.nba.com/articles/licensee_widget_standings.html" frameBorder="0" style="width: 100%; height: 650px" scrolling="no" > </iframe>
   </div>

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
<script type="text/javascript">
<!--
$("#nbaph_poll_submit").click(function() {
   if ($('[name="poll"]').is(':checked')) {
      var dat = $("#nbaph_poll_form").serialize();

      $.post("poll_vote.php", dat, function(msg) {
         $("#nbaph_poll_answers").html(msg);
         $("#nbaph_poll_submit").css({display: "none"});
      });
   }
   else {
      alert("poll");
   }
});
-->
</script>
</body>
</html>
<?php
$connect->close();
?>