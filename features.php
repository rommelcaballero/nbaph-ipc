<?php
include('sqli2.php');

if (@$_GET['start_date']) {
   $start_date = explode("-", $_GET['start_date']);
}
else {
   $start_date = array(date("Y"), date("m"), date("d") - date("w"));
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>NBA Philippines</title> 

<link rel="stylesheet" type="text/css" href="/css/style.css">
<link rel="stylesheet" type="text/css" href="/css/style-index.css">
<link rel="stylesheet" type="text/css" href="/css/style-new.css">
<script type="text/javascript" src="jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="jquery.tools.min.js"></script>
<script type="text/javascript" src="jquery.imgpreload.js"></script>

<script type="text/javascript" src="java.js"></script>
<!--[if IE]>
<link rel="stylesheet" type="text/css" href="/css/ie_style.css">
<![endif]-->
<style type="text/css">
<!--
#archive_center a, .archive_section a {
color: #0054af;
}

#archive_center img {
vertical-align: -4px;
}

.archive_section {
padding-bottom: 20px;
}
-->
</style>
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
		$results = mysqli_query($connect,"SELECT Content FROM ads_list WHERE AdsDesc='nba_Features_top_leaderboard' AND Status='s' ");
		$num = mysqli_num_rows($results);
		$row = mysqli_fetch_array($results);
		if($num>0){
		echo $row['Content'];
		}
		?>
        
      </div>

      <div style="height: 10px"></div>

      <div class="blue" style="font-size: 17px; border-bottom: 1px solid #d8d8d8; width: 920px; margin: 0 auto; padding: 10px 0px 0px 0px; ">
         <b>NBA FEATURES ARCHIVES</b>
      </div>

      <div style="height: 20px"></div>

      <!-- top half start -->
      <div style="width: 920px; margin: 0 auto; ">
         
         <!-- left start -->
         <div class="lfloat" style=" width: 185px; height: 600px; background: #fff">
		<?php
		$results = mysqli_query($connect,"SELECT Content FROM ads_list WHERE AdsDesc='nba_Features_skyscraper' AND Status='s' ");
		$num = mysqli_num_rows($results);
		while($row=mysqli_fetch_array($results)){
		if($num>0){
                echo $row['Content'] . '<br>';
                }
		}
		?>
         </div>
         <!-- left end -->
 
         <!-- center start -->
         <div class="lfloat" id="archive_center" style="width: 415px; margin-left: 10px; font-size: 12px; color: #444">
           		
              	<b>Features Archives</b><br>
<?php
$page_max = 30;
$page = 0;
if ($current_page)
   $page = $current_page * $page_max;

$results = mysqli_query($connect,"select * from features");
$total = mysqli_num_rows($results) / $page_max;

if ($page > 0) {
?>               
            	<a href="/nba-features/<?php echo ($current_page - 1); ?>"><img src="/images/left.png"> Previous</a>
<?php
}

if ($page > 0 || $current_page + 1 < $total) {
?>
               |
<?php
}

if ($current_page + 1 < $total) {
?>
            	<a href="/nba-features/<?php echo ($current_page + 1); ?>">Next <img src="/images/right.png"></a>
<?php
}

$results = mysqli_query($connect,"select * from features order by Title limit $page, $page_max");
$count = 0;

 				while ($row = mysqli_fetch_array($results)) {
				?>
               
               <div>
                   <a href="<?php echo $row['Link']; ?>"><?php echo stripslashes($row['Title']); ?></a>
               </div>
               
				<?php
               $count += 1;
            }//end while
            ?>
         </div>
         <!-- center end -->
         
         
         <!-- right start -->
         <div style="float: left; width: 300px; margin-left: 10px">
            <div style="width: 300px;">
				<?php
				$results = mysqli_query($connect,"SELECT Content FROM ads_list WHERE AdsDesc='nba_Features_medallion1' AND Status='s' ");
				$row = mysqli_fetch_array($results);
				echo $row['Content'];
				?>
            </div>

            <div style="height: 10px"></div>

            <div style="width: 300px; height: 100px">
<?php
$results = mysqli_query($connect,"select * from ads where Dimensions = '300x100' order by RAND() limit 0, 1");
$row = mysqli_fetch_array($results);
?>
               <a href="<?php echo $row['Link']; ?>"><img src="/ads/<?php echo $row['Image']; ?>"></a>
            </div>
         </div>
         <!-- right end -->
         
         
         <div class="clear_left" ></div>
         
      </div>
      <!-- top half end -->
      <div style="background:#252525; margin-top:10px;">
		<?php
		$results = mysqli_query($connect,"SELECT Content FROM ads_list WHERE AdsDesc='nba_Features_bottom_leaderboard' AND Status='s' ");
		$row = mysqli_fetch_array($results);
		$footer_ads = $row['Content'];
        include('layouts/links.php');
        include('layouts/footer.php');
        ?>
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
</body>
</html>
<?php
//mysql_close($connect);
?>
