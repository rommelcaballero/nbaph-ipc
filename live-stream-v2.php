<?php
ob_start();

$part_page = "live-stream";

include('queries/live-stream-queries.php');

if(file_exists($cachefile))
{ 
	$cache_this = 0;
	//echo "<!-- Cached Copy ".$last_db." -->\n";
	include($cachefile); 
	exit;
}
else
{
	$cache_this = 1; 	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>NBA Philippines</title>

<base href="<?php echo $base; ?>">

<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="style-news.css">
<link rel="stylesheet" type="text/css" href="colorbox/colorbox.css">
<!--[if IE]>
<link rel="stylesheet" type="text/css" href="ie_style.css">
<![endif]-->
<!--[if IE 7]>
<link rel="stylesheet" type="text/css" href="ie7_style.css">
<![endif]-->
<script type="text/javascript" src="jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="jquery.tools.min.js"></script>
<script type="text/javascript" src="jquery.imgpreload.js"></script>
<script type="text/javascript" src="colorbox/jquery.colorbox.js"></script>
<script type="text/javascript" src="java.js"></script>
</head>

<body>
<?php
include('layouts/popups.php');
?>

<div id="wrapper">
<?php
include('layouts/header.php');
?>

   <div id="main_content">
      <div style="height: 10px"></div>

      <div style="width: 958px; height: 90px; text-align: center; ">
		<?php
		echo $ads_list['nba_homepage_top_leaderboard'];
		?>
      </div>

      <div style="height: 10px"></div>

      <div class="blue" style="font-size: 17px; border-bottom: 1px solid #d8d8d8; width: 920px; margin: 0 auto; padding: 10px 0 0">
         <b>Live Stream - Interview with Brook Lopez</b>
      </div>

      <div style="height: 20px"></div>

      <!-- top half start -->
      <div style="width: 920px; margin: 0 auto">
         <!-- left start -->
         <div style="float: left; width: 608px; font-size: 12px">
            <style>
               .span-left, .span-right{
                  display: inline-block;
                  vertical-align: top;
               }
            </style>
            <div>
               <span class='span-left'>
                  <div style='padding-left:10px;'>                      
                     <iframe height="360" width="600" frameborder="0" src="http://www.own3d.tv/liveembed/421060?autoPlay=true"></iframe><br />
                     <iframe height="360" width="600" scrolling="no" frameborder="0" src="http://www.own3d.tv/chatembed/nba-philippines_421060"></iframe>
                  </div>                  
               </span>
            </div>

            <div class="clear" style="height: 10px"></div>

            <div class="fb-comments" data-href="<?php echo $base; ?>live-stream" data-num-posts="2" data-width="608"></div>
         </div>
         <!-- left end -->

         <!-- right start -->
         <div style="float: left; width: 300px; margin-left: 10px">
            <div style="width: 300px; height: 250px">
			   <?php	echo $ads_list['nba_homepage_top_medallion']; ?>
            </div>
            <?php if ($ads_array[0]['Link']): ?>                
            <div style="width: 300px; height: 100px">
                  <a href="<?php echo $ads_array[0]['Link']; ?>"><img src="ads/<?php echo $ads_array[0]['Image']; ?>"></a>
            </div>
            <?php endif; ?>

            <div style="height: 10px"></div>

<?php
if ($ad['Link']) {
?>
            <div style="width: 300px; height: 100px">
               <a href="<?php echo $ad['Link']; ?>"><img src="ads/<?php echo $ad['Image']; ?>"></a>
            </div>
<?php
}
?>
         </div>
         <!-- right end -->

         <div class="clear"></div>
      </div>
      <!-- top half end -->

<?php
$footer_ads = $ads_list['nba_NewsArticle_bottom_leaderboard']['Content'];
include('layouts/links.php');
?>

   </div>
</div>
<?php
include('layouts/footer.php');
?>
<script type="text/javascript">
<!--
var news_tab = "news_list_highlights";

$(".news_element").hover(function() {
   $(this).css({backgroundPosition: "0 29px"});
   }, function() {
   if ($(this).prop("id") != news_tab) {
      $(this).css({backgroundPosition: "0 0"});
   }
});

$(".news_element").click(function() {
   $("#" + news_tab).css({backgroundPosition: "0 0"});

   news_tab = $(this).prop("id");
   
   $("#" + news_tab).css({backgroundPosition: "0 29px"});
});

<?php
include('nav_js.php');
?>
-->
</script> 

<?php
include("layouts/background_ads.php");
?>

</body>
</html>
<?php
$cachetime = 5 * 60;
// Serve from the cache if it is younger than $cachetime
/*if (file_exists($cachefile) && time() - $cachetime < filemtime($cachefile)) {
    include($cachefile);
    echo "<!-- Cached copy, generated ".date('H:i', filemtime($cachefile))." -->\n";
    exit ;
}*/

if(($cache_this == 1)) // put && ($base == "http://ph.nba.com/")
 {
	 
	// Start the output buffer
	
	/* The code to dynamically generate the page goes here */
	
	// Cache the output to a file
	$fp = fopen($cachefile, 'w');
	fwrite($fp, ob_get_contents());
	fclose($fp);

 }//end cache this
ob_end_flush(); // Send the output to the browser
}//end else cache
?>
