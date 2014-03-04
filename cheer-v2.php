<?php
$part_page = "cheerdancers";

include('queries/cheer-queries.php');
include('queries/cheer-general-queries.php');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>NBA Philippines</title>

<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="style-cheer.css">
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

          <div style="width: 958px; height: 90px; margin: 0 auto; text-align: center; ">
               <?php echo $ads_list['nba_Cheerdancers_top_leaderboard']['Content']; ?>
          </div>

          <div style="height: 10px"></div>

          <div class="gray" style="font-size: 17px; width: 940px; margin: 0 auto; padding: 10px;">
               <b>COLUMNS</b>
          </div>
          <?php include "cheerdancer/index-content.php"; ?>     

          <div style="height: 20px"></div>    
          <div style='background:#fff;'>    
               <?php
               $footer_ads = $ads_list['nba_Cheerdancers_bottom_leaderboard']['Content'];
               include('layouts/links.php');
               ?>  
               <?php include('layouts/footer.php'); ?>
          </div>
     </div>
</div>

<script type="text/javascript">
<!--

$(function() {

    var main_disp = 0;

   $(".cheer_subheadline").hover(
      function() {
         $("#cheer_" + $(this).prop("id")).css({display: "block"});
        },
      function() {
         $("#cheer_" + $(this).prop("id")).css({display: "none"});
     });

   $(".cheer_subheadline").click(function(){

      var main = $(this).attr("main");

         $("#MainCheerp" + main_disp).fadeOut("fast");
      $("#MainCheerp" + main).fadeIn("fast");
      main_disp = main;

   });

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
