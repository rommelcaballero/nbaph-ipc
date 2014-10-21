<?php
$part_page = "archives";

include('queries/archives-queries.php');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>NBA Philippines</title>
<link rel="stylesheet" href="https://s3-ap-southeast-1.amazonaws.com/nbaphfiles/sib2/style2.css">
<?php include('static_nav2.php');?>

<link rel="stylesheet" type="text/css" href="/style.css">
<link rel="stylesheet" type="text/css" href="/style-archives.css">
<link rel="stylesheet" type="text/css" href="/colorbox/colorbox.css">
<!--[if IE]>
<link rel="stylesheet" type="text/css" href="/ie_style.css">
<![endif]-->
<!--[if IE 7]>
<link rel="stylesheet" type="text/css" href="/ie7_style.css">
<![endif]-->

<script src="http://code.jquery.com/jquery-migrate-1.0.0.js"></script>
<!--<script type="text/javascript" src="/jquery-1.7.1.min.js"></script>-->
<script type="text/javascript" src="/jquery.tools.min.js"></script>
<script type="text/javascript" src="/jquery.imgpreload.js"></script>
<script type="text/javascript" src="/colorbox/jquery.colorbox.js"></script>
<script type="text/javascript" src="/java.js"></script>
</head>

<body>
<?php
include('layouts/popups.php');
?>

<div id="wrapper">
<?php include('static_nav.php');?>
<?php include('nbaph_header.php');?>
<?php
//include('layouts/header.php');
?>

   <div id="main_content">

      <div style="height: 10px"></div>

      <div style="width: 958px; min-height: 90px; margin: 0 auto; text-align: center">
		<?php
		echo $ads_list['nba_archives_top_leaderboard']['Content'];
		?>
      </div>

      <div style="height: 10px"></div>

      <div class="blue" style="font-size: 17px; border-bottom: 1px solid #d8d8d8; width: 920px; margin: 0 auto; padding: 10px 0px 0px 0px; ">
         <b>NBA NEWS ARCHIVES</b>
      </div>

      <div style="height: 20px"></div>

      <!-- top half start -->
      <div style="width: 920px; margin: 0 auto; ">

         <!-- left start -->
         <div class="lfloat" style=" width: 185px; height: 600px; background: #fff">

		<?php
		echo $ads_list['nba_Archivevs_skyscraper']['Content'];
		?>	
         </div>
         <!-- left end -->

         <!-- center start -->
         <div class="lfloat" id="archive_center" style="width: 415px; margin-left: 10px; font-size: 12px; color: #444">
           		
              	<b>News Archives</b><br>

		<a href="/news-archives/<?php echo date("Y-m-d", mktime(0, 0, 0, $start_date[1], $start_date[2] - 7, $start_date[0])); ?>"><img src="/images/left.png"> Previous Week</a> |
            	<?php if (($start_date) && (time() > strtotime(date("Y-m-d", mktime(0, 0, 0, $start_date[1], $start_date[2] + 7, $start_date[0]))))) { ?>
            	<a href="/news-archives/<?php echo date("Y-m-d", mktime(0, 0, 0, $start_date[1], $start_date[2] + 7, $start_date[0])); ?>">Next Week <img src="/images/right.png"></a>
            	<?php } ?>

		<br>
                <?php
$date = "";

 				for ($count = 0; $count < $news_total; $count += 1) {
				   $current = explode(" ", $news_array[$count]['DatePosted']);
				
				   if ($news_array[$count]['Source'] == 'PH') {
						$link_3 = "/news-article/".$news_array[$count]['NewsID']."/".seoUrl(strtolower($news_array[$count]['Title']));
					} else {
						$link_3 = $news_array[$count]['Link'];
					}
				
				   if ($date != $current[0]) {
					  if ($date != "") {
						 echo "</div>\n";
                   echo "<!-- close div -->\n";
                  }
                  echo "<!-- open div -->\n";
				          echo '<br>';
					  echo '<div class="archive_section">' . "\n";
					  $ex = explode("-", $current[0]);
					  echo date("l F d, Y", mktime(0, 0, 0, $ex[1], $ex[2], $ex[0]));
					  $date = $current[0];
				   }
				
				?>

               <div>
                   <a href="<?php echo $link_3; ?>"><?php echo stripslashes($news_array[$count]['Title']); ?></a>
               </div>

				<?php
               if ($count + 1 >= $news_total) {
                  echo "</div>\n";
                  echo "<!-- close div -->\n";
               }

               //$count += 1;
            }//end while
            ?>
         </div>
         <!-- center end -->

         <!-- right start -->
         <div style="float: left; width: 300px; margin-left: 10px">
            <div style="width: 300px; height: 250px">
			<?php
			echo $ads_list['nba_archives_top_medallion']['Content'];
			?>	
            </div>

            <div style="height: 10px"></div>

            <div style="width: 300px; height: 100px">
               <a href="<?php echo $ad['Link']; ?>"><img src="/ads/<?php echo $ad['Image']; ?>"></a>
            </div>
         </div>
         <!-- right end -->

         <div class="clear_left" ></div>

     </div>
      <!-- top half end -->
     <div>
     	<?php
     	$footer_ads = $ads_list['nba_archives_bottom_leaderboard']['Content'];
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

   $("#headline_circle_" + headline_count).prop("src", "/images/circle_empty.png");

   headline_count -= 1;
   if (headline_count < 0)
      headline_count = 2;

   $("#headline_circle_" + headline_count).prop("src", "/images/circle_filled.png");
});

$("#headline_right").click(function() {
   $("#headline_pics").data("scrollable").next();

   $("#headline_circle_" + headline_count).prop("src", "/images/circle_empty.png");

   headline_count += 1;
   if (headline_count > 2)
      headline_count = 0;

   $("#headline_circle_" + headline_count).prop("src", "/images/circle_filled.png");
});

$("#video_left").click(function() {
   $("#" + video_section).data("scrollable").prev();

   $("#video_circle_" + video_count).prop("src", "/images/circle_empty.png");

   video_count -= 1;
   if (video_count < 0)
      video_count = 2;

   $("#video_circle_" + video_count).prop("src", "/images/circle_filled.png");
});

$("#video_right").click(function() {
   $("#" + video_section).data("scrollable").next();

   $("#video_circle_" + video_count).prop("src", "/images/circle_empty.png");

   video_count += 1;
   if (video_count > 2)
      video_count = 0;

   $("#video_circle_" + video_count).prop("src", "/images/circle_filled.png");
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
<?php include('google_dfp.php'); ?>
</body>
</html>
