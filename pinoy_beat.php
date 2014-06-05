<?php

$part_page = "pinoy beat";

include('queries/pinoy_beat-queries.php');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>NBA Philippines</title>

<link rel="stylesheet" type="text/css" href="/css/style.css">
<link rel="stylesheet" type="text/css" href="/css/colorbox/colorbox.css">
<!--[if IE]>
<link rel="stylesheet" type="text/css" href="/css/ie_style.css">
<![endif]-->
<!--[if IE 7]>
<link rel="stylesheet" type="text/css" href="/css/ie7_style.css">
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

   <div id="main_content" style="" >

       <div style="width: 958px; margin: 0 auto; padding: 30px 0px 20px 0px; text-align: center; ">
      <?php
      echo $ads_list['nba_PinoyBeatWriter_top_leaderboard']['Content'];
      ?>
      </div>

       <!-- pb_main_content -->
       <div id="pb_main_content" style="background-color: #000000; "  >

          <div style="height: 10px"></div>

          <div style="height: 20px"></div>

          <!-- top half start -->
          <div style="width: 950px; margin: 0 auto;  ">

             <div class="lfloat" style="width: 610px">

                 <?php
              if(count($beat_array) > 0)
              {

              $ctr = 1;
                 for ($count = 0; $count < count($beat_array); $count += 1)
                  {

                    $pinoy_id = $beat_array[$count]['BlogID'];
                    $pinoy_title = ucfirst(trim(stripslashes($beat_array[$count]['Title'])));
                    $pinoy_content = ucfirst(trim(stripslashes($beat_array[$count]['Content'])));
                    $pinoy_intro = ucfirst(trim(stripslashes($beat_array[$count]['Intro'])));
                    $pinoy_postedby = strtolower(trim(stripslashes($beat_array[$count]['PostedBy'])));
                    $pinoy_date = date("l / F d / Y", strtotime($beat_array[$count]['DateInserted']));
                    $photo = trim(stripslashes($beat_array[$count]['Image']));

                     $blog_content = $pinoy_content;
                    if($pinoybeat_id)
                     {
                        $link = "";
                     }
                    else
                     {
                        $link = $pinoy_id;
                     }

                    /*$photo = "images/pinoy_beat/" .$pinoy_id .".jpg";

                    if (file_exists($photo)) {*/
                    if ($photo) {
                       $blog_content ="<img src=\"$photo\"  />" . $blog_content;
                    }
                    $blog_content .= "
                    <br><br>";
                    //$blog_content";
//}

                    ?>

                <!-- pb writer < ?php echo $ctr; ?> -->
                 <div class="pb_item" >

                    <div class="pb_date" ><?php echo $pinoy_date; ?>
               <div class="addthis_position">
                  <!-- AddThis Button BEGIN -->
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
                  <!-- AddThis Button END -->
               </div>

                    </div>

                    <div class="pb_title" ><?php echo $pinoy_title; ?></div>

                    <div class="pb_posted" >Posted by <?php echo $pinoy_postedby; ?> in Blog<!--, October 29, 2007 1 comment to this post--></div>

                    <div class="pb_content" >

                       <?php echo $blog_content; ?>
                       <div class="clear_both" ></div>

            <div class="addthis_div">
               <div class="addthis_position">
                  <!-- AddThis Button BEGIN -->
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
                  <!-- AddThis Button END -->
               </div>
            </div>
                    </div>

                    <?php  if($link !="" && $link == ""){ ?><div class="pb_readfull" ><a href="pinoy-beat-writer/<?php echo $pinoy_id; ?>/<?php echo seoUrl($pinoy_title); ?>" >Read full article</a></div><?php } ?>

                 </div>
                 <!-- end pb writer <?php echo $ctr; ?> -->

                <?php
                     $ctr++;

                  }//end while

              }//end if
             ?>

               <div style="text-align: center; font-size: 12px; color: #fff">
<?php
for ($i = 0; $i < $total_entries; $i += 1) {
   if ($i * $page_max == $page) {
      echo ($i + 1);
   }
   else {
      echo '<a href="pinoy_beat.php?page=' . $i . '" style="color: #666">' . ($i + 1) . '</a>';
   }

   if ($i + 1 < $total_entries)
      echo " | ";
}?>
               </div>
             </div>

             <div class="lfloat" style="width: 300px; margin-left: 30px; " >

                <div style="width: 300px; height: 250px">
            <?php
            echo $ads_list['nba_PinoyBeatWriter_top_medallion']['Content'];
            ?>
                </div>

                <div style="height: 20px; " ></div>

                <!-- more pinoy beat -->
                <?php
            if($pinoybeat_id && true == false)
             {
            ?>
                <div id="MorePinoybeat" >

                   <div class="morepinoy_head" >
                         <div style="padding: 2px 10px 0px 10px; " >More Pinoy Beat Writer</div>
                   </div>

                   <!-- end column content -->
                   <div class="morepinoy_content" >

                      <?php
                  if(count($other_array) > 0)
                   {
                     for ($count = 0; $count < count($other_array); $count += 1)
                      {

                         $mpinoy_id = $other_array[$count]['BlogID'];
                         $mpinoy_title = ucfirst(trim(stripslashes($other_array[$count]['Title'])));
                         $mpinoy_posted = ucfirst(trim(stripslashes($other_array[$count]['PostedBy'])));

                 ?>
                         <div class="morepinoy_item" >

                            <div class="morepinoy_title" ><a href="pinoy-beat-writer/<?php echo $mpinoy_id; ?>/<?php echo seoUrl($mpinoy_title); ?>"  ><?php echo $mpinoy_title; ?></a></div>
                            <div class="morepinoy_posted" >Posted by: <?php echo $mpinoy_posted. " on " .date("l F d, Y", strtotime($other_array[$count]['DateInserted'])); ?></div>

                        </div>

                      <?php
                      }//end while

                  }//end if

                 ?>

                   </div>
                   <!-- column content -->

                </div>
                <?php
             }//end if
            ?>
                <!-- more pinoy beat -->

             </div>

             <div class="clear_both" ></div>

          </div>
          <!-- top half end -->

       </div>
        <!-- end pb_main_content -->
    <div>    
    <?php
    $footer_ads = $ads_list['nba_PinoyBeatWriter_bottom_leaderboard']['Content'];
    include('layouts/links.php');
    ?>
    <?php include('layouts/footer.php'); ?>
    </div>
   </div>
</div>

<script type="text/javascript">
<!--
$(".cheer_subheadline").hover(function() {
   $("#cheer_" + $(this).prop("id")).css({display: "table"});
   }, function() {
   $("#cheer_" + $(this).prop("id")).css({display: "none"});
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

