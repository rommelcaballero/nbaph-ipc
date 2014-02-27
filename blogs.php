<?php
ob_start();

$part_page = "blogs";

include('queries/blogs-queries.php');

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
<link rel="stylesheet" type="text/css" href="style-writers.css">
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

      <div style="width: 958px; height: 90px; margin: 0 auto; text-align: center">
		<?php
		echo $ads_list['nba_Blogs_top_leaderboard']['Content'];
		?>
      </div>

      <div style="height: 10px"></div>

      <div style="font-size: 25px; width: 920px; margin: 0 auto; padding: 10px 0 15px">
         <b>Bloggers</b>
      </div>

      <!-- top half start -->
      <div style="width: 920px; margin: 0 auto">
         <!-- top left start -->
         <div style="float: left; width: 610px">
            <!-- headlines start -->
            <div style="width: 610px; padding-bottom: 2px; background: url('images/rounded_bottom_610.png') bottom center no-repeat">
               <div class="article_header" style="background: url('images/rounded_top_610.png'); width: 580px; height: 15px">
                  RECENT CONTENT
               </div>

               <div style="width: 588px; border-left: 1px solid #d8d8d8; border-right: 1px solid #d8d8d8; padding: 5px 10px">
                  <table cellspacing="0" style="width: 100%">
<?php
$count = count($blog_array);

for ($i = 0; $i < $count; $i += 1) {

$blogger_pic = strtolower(urlencode(str_replace("ñ", "n", $blog_array[$i]['Blogger'])));

   if ($i > 0 && $i % 2 == 0) {
?>
                     <tr>
                        <td class="writer_divider"></td>
                        <td class="writer_space">&nbsp;</td>
                        <td class="writer_divider"></td>
                     </tr>
<?php
   }

   if ($i % 2 == 0) {
?>
                     <tr>
<?php
   }
?>
                        <td class="writer_cell">
                           <table cellspacing="0" class="writer_table">
                              <tr>
                                 <td class="writer_picture">
                                    <div class="writer_pic">
                                       <img src="images/blogs/<?php echo $blogger_pic; ?>.jpg" border="0">
                                    </div>
                                 </td>
                                 <td class="writer_entry">
                                    <div class="writer_name"><?php echo stripslashes($blog_array[$i]['Blogger']); ?></div>
                                    <div class="writer_affiliation"><?php echo stripslashes($blog_array[$i]['BlogAffiliation']); ?></div>
                                    <div class="writer_title">
<?php
	if ($blog_array[$i]['BlogLink']) {
?>
                                       <a href="<?php echo stripslashes($blog_array[$i]['BlogLink']); ?>" target="_blank"><?php echo stripslashes($blog_array[$i]['BlogTitle']); ?></a>
<?php
	} else {
?>
                                       <a href="bloggers/<?php echo $blog_array[$i]['BlogID']; ?>/<?php echo seoUrl(strtolower($blog_array[$i]['BlogTitle'])); ?>"><?php echo stripslashes($blog_array[$i]['BlogTitle']); ?></a>
<?php
	}
?>
                                    </div>
                                    <div class="writer_excerpt">
                                       <?php
                                       echo stripslashes($blog_array[$i]['BlogExcerpt']);

                                       if (strlen($blog_array[$i]['BlogExcerpt']) == 100)
                                          echo "...";
                                       ?>
                                    </div>
<?php
	if ($blog_array[$i]['BlogLink']) {
?>
                                    <div class="writer_links">
                                       <a href="<?php echo stripslashes($blog_array[$i]['BlogLink']); ?>" target="_blank">Full Story</a>
                                    </div>
<?php
	} else {
?>
				    <div class="writer_links">
                                       <a href="bloggers/<?php echo $blog_array[$i]['BlogID']; ?>/<?php echo seoUrl(strtolower($blog_array[$i]['BlogTitle'])); ?>">Full Story</a> | <a href="bloggers/<?php echo urlencode($blog_array[$i]['Blogger']); ?>">Archive</a>
                                    </div>
<?php
	}
?>
                                 </td>
                              </tr>
                           </table>
                        </td>
<?php
   if ($i % 2 == 0) {
?>
                        <td class="writer_space">&nbsp;</td>
<?php
   }

   if ($i % 2 == 1 || $i + 1 > $count) {
?>
                     </tr>
<?php
   }

}
?>
                  </table>
               </div>

               <div class="clear"></div>
            </div>
            <!-- headlines end -->
         </div>
         <!-- top left end -->

         <!-- top right start -->
         <div style="float: left; width: 300px; margin-left: 10px">
            <div style="width: 300px; height: 250px">
			<?php
			echo $ads_list['nba_Blogs_top_medallion']['Content'];
			?>	
            </div>

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
         <!-- top right end -->

         <div class="clear"></div>
      </div>
      <!-- top half end -->
<div>
<?php
$footer_ads = $ads_list['nba_Blogs_bottom_leaderboard']['Content'];
include('layouts/links.php');
?>
<?php include('layouts/footer.php'); ?>
</div>
   </div>
</div>

<script type="text/javascript">
<!--
$(".scroll").scrollable({ circular: true });

var video_section = "video_list_highlights_gallery";

var headline_count = 0;
var video_count = 0;

$("#headline_left").click(function() {
   $("#headline_pics").data("scrollable").prev();

   $("#headline_circle_" + headline_count).prop("src", "images/circle_empty.png");

   headline_count -= 1;
   if (headline_count < 0)
      headline_count = 2;

   $("#headline_circle_" + headline_count).prop("src", "images/circle_filled.png");
});

$("#headline_right").click(function() {
   $("#headline_pics").data("scrollable").next();

   $("#headline_circle_" + headline_count).prop("src", "images/circle_empty.png");

   headline_count += 1;
   if (headline_count > 2)
      headline_count = 0;

   $("#headline_circle_" + headline_count).prop("src", "images/circle_filled.png");
});

$("#video_left").click(function() {
   $("#" + video_section).data("scrollable").prev();

   $("#video_circle_" + video_count).prop("src", "images/circle_empty.png");

   video_count -= 1;
   if (video_count < 0)
      video_count = 2;

   $("#video_circle_" + video_count).prop("src", "images/circle_filled.png");
});

$("#video_right").click(function() {
   $("#" + video_section).data("scrollable").next();

   $("#video_circle_" + video_count).prop("src", "images/circle_empty.png");

   video_count += 1;
   if (video_count > 2)
      video_count = 0;

   $("#video_circle_" + video_count).prop("src", "images/circle_filled.png");
});

var video_tab = "video_list_highlights";

$(".video_element").hover(function() {
   $(this).css({backgroundPosition: "0 33px", color: "#444"});
   }, function() {
   if ($(this).prop("id") != video_tab) {
      $(this).css({backgroundPosition: "0 0", color: "#0054af"});
   }
});

$(".video_element").click(function() {
   $("#" + video_tab).css({backgroundPosition: "0 0", color: "#0054af"});

   video_tab = $(this).prop("id");

   $("#" + video_tab).css({backgroundPosition: "0 33px", color: "#444"});
});

var writer_tab = "writer_personality";

$(".writer_element").hover(function() {
   $(this).css({backgroundPosition: "0 33px", color: "#444"});
   }, function() {
   if ($(this).prop("id") != writer_tab) {
      $(this).css({backgroundPosition: "0 0", color: "#0054af"});
   }
});

$(".writer_element").click(function() {
   $("#" + writer_tab).css({backgroundPosition: "0 0", color: "#0054af"});
   $("#" + writer_tab + "_list").css({display: "none"});

   writer_tab = $(this).prop("id");

   $("#" + writer_tab).css({backgroundPosition: "0 33px", color: "#444"});
   $("#" + writer_tab + "_list").css({display: "block"});
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
