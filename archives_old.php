<?php
include('sql.php');

if ($_GET['start_date']) {
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
<link rel="stylesheet" type="text/css" href="style.css">
<script type="text/javascript" src="jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="jquery.tools.min.js"></script>
<script type="text/javascript" src="jquery.imgpreload.js"></script>
<script type="text/javascript" src="java.js"></script>
<!--[if IE]>
<link rel="stylesheet" type="text/css" href="ie_style.css">
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
include('popups.php');
?>

<div id="wrapper">
<?php
include('header.php');
?>

   <div id="main_content">
      <div style="height: 10px"></div>

      <div style="width: 958px; height: 90px; margin: 0 auto; text-align: center; background: #ccc">
         Google ads
      </div>

      <div style="height: 10px"></div>

      <div class="blue" style="font-size: 17px; border-bottom: 1px solid #d8d8d8; width: 920px; margin: 0 auto; padding: 10px 0 0">
         <b>NBA NEWS ARCHIVES</b>
      </div>

      <div style="height: 20px"></div>

      <!-- top half start -->
      <div style="width: 920px; margin: 0 auto">
         <!-- left start -->
         <div style="float: left; width: 185px; height: 500px; background: #ccc">
            
         </div>
         <!-- left end -->

         <!-- center start -->
         <div id="archive_center" style="float: left; width: 415px; margin-left: 10px; font-size: 12px; color: #444">
            <b>News Archives</b><br>
            <b>NBA News Archives:</b>
            <?php echo date("m|d|y", mktime(0, 0, 0, $start_date[1], $start_date[2], $start_date[0])); ?> to
            <?php echo date("m|d|y", mktime(0, 0, 0, $start_date[1], $start_date[2] + 6, $start_date[0])); ?><br>
            <a href="archives.php?start_date=<?php echo date("Y-m-d", mktime(0, 0, 0, $start_date[1], $start_date[2] - 7, $start_date[0])); ?>"><img src="images/left.png"> Previous Week</a> |
            <a href="archives.php?start_date=<?php echo date("Y-m-d", mktime(0, 0, 0, $start_date[1], $start_date[2] + 7, $start_date[0])); ?>">Next Week <img src="images/right.png"></a>

<?php
$results = mysql_query("select * from news where DatePosted >= '" . implode("-", $start_date) . " 00:00:00' and DatePosted <= '" . date("Y-m-d", mktime(0, 0, 0, $start_date[1], $start_date[2] + 6, $start_date[0])) . " 23:59:59' order by DatePosted desc");

$date = "";

while ($row = mysql_fetch_array($results)) {
   $current = explode(" ", $row['DatePosted']);

   if ($date != $current[0]) {
      if ($date != "")
         echo "</div>";
      echo '<div class="archive_section">';
      $ex = explode("-", $current[0]);
      echo date("l F d, Y", mktime(0, 0, 0, $ex[1], $ex[2], $ex[0]));
      $date = $current[0];
   }

?>
               <div><a href="<?php
               if ($row['Link'])
                  echo $row['Link'];
               else
                  echo "news_article.php?newsid=" . $row['NewsID'];
               ?>"><?php echo stripslashes($row['Title']); ?></a></div>
<?php
}
?>
            </div>
         </div>
         <!-- center end -->

         <!-- right start -->
         <div style="float: left; width: 300px; margin-left: 10px">
            <div style="width: 300px; height: 250px; background: #ccc">Ad</div>

            <div style="height: 10px"></div>

            <div style="width: 300px; height: 100px; background: #ccc">Ad</div>
         </div>
         <!-- right end -->

         <div class="clear"></div>
      </div>
      <!-- top half end -->

<?php
include('links.php');
?>

   </div>
</div>
<?php
include('footer.php');
?>
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
</body>
</html>
<?php
mysql_close($connect);
?>