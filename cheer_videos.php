<?php
$part_page = "cheerdancers videos";

include('queries/cheer_videos-queries.php');
include('queries/cheer-general-queries.php');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>NBA Philippines</title>

<link rel="stylesheet" type="text/css" href="/style.css">
<link rel="stylesheet" type="text/css" href="/style-cheer_videos.css">
<link rel="stylesheet" type="text/css" href="/colorbox/colorbox.css">
<!--[if IE]>
<link rel="stylesheet" type="text/css" href="/ie_style.css">
<![endif]-->
<!--[if IE 7]>
<link rel="stylesheet" type="text/css" href="/ie7_style.css">
<![endif]-->
<script type="text/javascript" src="/jquery-1.7.1.min.js"></script>
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
<?php
include('layouts/header.php');
?>

   <div id="main_content">
      <div style="height: 10px"></div>

      <div style="width: 958px; min-height: 90px; margin: 0 auto; text-align: center; ">
          <?php
         echo $ads_list['nba_CheerVideos_top_leaderboard']['Content'];
         ?>
      </div>

      <div style="height: 10px"></div>

      <div class="gray" style="font-size: 17px; width: 940px; margin: 0 auto; padding: 10px 0 0">
         <b>CHEERDANCER VIDEOS</b>
      </div>

      <div style="height: 20px"></div>

      <!-- top half start -->
      <div style="width: 958px; margin: 0 auto">

         <!-- left start -->
         <div style="float: left; width: 622px; ">

          <div style="width: 622px; background-color: #27aae2; " ><img src="/images/cheer_videos.png" border="0"  /></div>

             <div style="margin: 0px; padding: 15px 5px 10px 5px; " >

            <div class="addthis_div" style="padding-bottom: 5px">
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

                <!-- main video -->
                <div>
                <?php
                $preg = array('/width=\"[\d]{1,4}\"/i', '/height=\"[\d]{1,4}\"/i');
                $with = array('width="610"', 'height="343"');
                echo preg_replace($preg, $with, $video_embed);
                ?>
                </div>

                <div class="cheervid_title" style="padding: 10px 3px 15px 3px; font-size: 12pt; "  >
                   <?php echo $video_title; ?>
                </div>

                <div class="cheervid_caption" >
                   <?php //echo $video_caption; ?>
                </div>

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
                        <div class="fb-comments" data-href="<?php echo $base; ?>cheerdancers-videos/<?php echo $video_id; ?>/<?php  echo seoUrl($video_title); ?>/<?php echo trim(urlencode($blog_postedby)); ?>" data-num-posts="2" data-width="612"></div>
             </div>
             <!-- end main video -->

             <!-- other videos -->
             <div style="margin: 30px 0px 0px 0px; padding: 0px; " >

                <div class="gray" style="font-size: 17px; font-weight: bold; ">OTHER VIDEOS</div>

                <div style="margin: 0px; padding: 15px 0px 0px 0px; " >

                    <div >
                     <!--    <object width="610" height="458" type="application/x-shockwave-flash" id="W49290f811b4e129a" data="http://video.msg.com/flash/player.swf" allowScriptAccess="always" allowNetworking="all" allowFullScreen="true">
                        <param name="movie" value="http://video.msg.com/flash/player.swf" />
                        <param name="wmode" value="transparent"/>
                        <param name="allowScriptAccess" value="always"/>
                        <param name="allowNetworking" value="all"/>
                        <param name="allowFullScreen" value="true"/>
                        <param name="flashvars" value="servicebaseurl=http://video.msg.com/services&channel=All&pid=l8EtnuVp_6ZzpqK_nEKrJcUP_59t_aFc"/>
                        </object>-->
                        <!--<iframe src="http://www.msg.com/swf/tpPlayer/player.html?mediaId=2223181506" width="610" height="458" frameborder="0" scrolling="no"></iframe>-->

                     </div>

                    <?php
               if($found_others > 0)
                {
                   for ($count = 0; $count < $found_others; $count += 1)
                    {

                      $other_id = $video_array[$count]['VideoID'];
                      $other_title = ucfirst(trim($video_array[$count]['Title']));
                      $other_caption = ucfirst(trim($video_array[$count]['Caption']));
                      $other_caption = myTruncate($other_caption, 50, " ", "...");
                      $other_youtube = trim($video_array[$count]['YouTubeLink']);
                      $other_image = trim($video_array[$count]['ImageSecond']);

                      if ($other_youtube)
                        {
                          $feedURL = 'http://gdata.youtube.com/feeds/api/videos/'. $other_youtube;

                          // read feed into SimpleXML object
                          $entry = simplexml_load_file($feedURL);
                          $vid = parseVideoEntry($entry);
                          $video_duration = mysql_real_escape_string(stripslashes($vid->length));

                          $dur_min = intval($video_duration / 60);
                          $dur_sec = $video_duration % 60;

                          if($dur_min < 10)
                           {
                             $dur_min = '0'.$dur_min;
                           }

                          if($dur_sec < 10)
                           {
                             $dur_sec = '0'.$dur_sec;
                           }

                          $video_length = $dur_min.":".$dur_sec;

                        }
               ?>

                    <div class="lfloat" style="width: 185px; margin: 0px 0px 20px 10px; height:200px;"  >

                        <div><a href="/cheerdancers-videos/<?php echo $other_id; ?>/<?php echo seoUrl($other_title); ?>" ><img src="<?php
                           echo $other_image;
                           //echo resizeCrop("/images/cheer_videos/".$other_id.".jpg", 185, 137, '');
                        ?>" alt="<?php echo strtoupper($other_title); ?>" title="<?php echo strtoupper($other_title); ?>" class="btnimg" /></a></div>

                        <div style="margin: 0px; padding: 2px 5px 0px 5px; line-height: normal; " >

                           <span class="cheervid_title" style="font-size: 8pt; font-weight: normal;" ><a href="/cheerdancers-videos/<?php echo $other_id; ?>/<?php echo seoUrl($other_title); ?>" ><?php echo strtoupper($other_title); ?></a></span>

                            <span class="cheervid_caption" >
                               - <?php echo ucfirst($other_title); ?>
                            </span>

                            <div class="cheervid_time" style="text-align: left; " ><?php echo $video_length; ?></div>

                        </div>

                    </div>

                    <?php

                    }//end while

                }//end if
               ?>

                </div>

                <div class="clear_both" ></div>

             </div>
             <!-- other videos -->

         </div>
         <!-- left end -->

         <!-- right start -->
         <div style="float: left; width: 300px; margin-left: 25px; ">

            <?php include("layouts/cheer-right.php"); ?>

         </div>
         <!-- right end -->

         <div class="clear" ></div>

      </div>
      <!-- top half end -->
      <div>    
    <?php
    $footer_ads = $ads_list['nba_CheerVideos_bottom_leaderboard']['Content'];
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

</body>
</html>
