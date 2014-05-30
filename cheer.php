<?php
$part_page = "cheerdancers";

include('queries/cheer-queries.php');
include('queries/cheer-general-queries.php');


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>NBA Philippines</title>

<link rel="stylesheet" type="text/css" href="/css/style.css">
<link rel="stylesheet" type="text/css" href="/css/style-cheer.css">
<link rel="stylesheet" type="text/css" href="/css/colorbox/colorbox.css">
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

      <div style="width: 958px; min-height: 90px; margin: 0 auto; text-align: center; ">
      <?php
      echo $ads_list['nba_Cheerdancers_top_leaderboard']['Content'];
      ?>
      </div>

      <div style="height: 10px"></div>

      <div class="gray" style="font-size: 17px; width: 940px; margin: 0 auto; padding: 10px 0 0">
         <b>CHEERDANCER PHOTOS</b>
      </div>

      <div style="height: 20px"></div>

      <!-- top half start -->
      <div style="width: 958px; margin: 0 auto">
         <!-- left start -->
         <div style="float: left; width: 622px; ">
            <div style="width: 620px; height: 450px; text-align: center; position: relative; ">
                <!-- big image -->
                <?php
            for($i=0; $i<count($photos); $i++)
             {
               $file_img = $photos[$i]['Filename'];
            ?>
                <div class="main_cheerp" id="MainCheerp<?php echo $i; ?>" style=" <?php if($i == 0)echo "display: block;"; ?>" >

                   <div style="width: 620px; height: 450px"><a href="cheerdancers-photos/<?php echo $photos[$i]['AlbumID']; ?>/<?php echo seoUrl($photos[$i]['AlbumName']); ?>"><img src="<?php
                   echo $file_img;
                   ?>" width="620" height="450"></a></div>

                   <div class="maincheer_txtbg" >
                      <a href="cheerdancers-photos/<?php echo $photos[$i]['AlbumID']; ?>/<?php echo seoUrl($photos[$i]['AlbumName']); ?>" ><?php echo stripslashes(str_replace("\n", "<br>", $photos[$i]['AlbumName'])); ?></a>
                   </div>

            </div>
                <?php
             }//end for
            ?>
                <!-- big image -->

            </div>

            <div style="height: 5px"></div>

            <div style="width: 100%; height: 100px">
         <?php

            for($i=0; $i<count($photos); $i++) {
               $imgbg = $photos[$i]['ImageThumb'];
               ?>
              <div style="background-image: url('<?php echo $imgbg; ?>')" class="cheer_subheadline" id="subheadline<?php echo $i; ?>" style="margin: 0px;" main="<?php echo $i; ?>" >
                  <div class="cheer_subheadline_text" id="cheer_subheadline<?php echo $i; ?>" >
                       <table cellspacing="0"   height="100%" width="100%" >
                         <tr>
                            <td>
                              <div class="cheer_subheadline_bg" >
                               <?php echo $photos[$i]['AlbumName']; ?>
                               </div>
                            </td>
                         </tr>
                      </table>
                   </div>
               </div>
            <?php
                   if ($i < (count($photos) - 1)) {
                ?>
                      <div style="float: left; width: 5px; height: 100px"></div>
                <?php
                   }

            }//end for
                ?>
            </div>

            <div class="clear_left" ></div>

            <div class="pb_readfull" style="margin: 0px; padding: 5px 10px 10px 0px; " ><a href="cheerdancers-photos" >More Photos</a></div>

            <div style="width: 620px; ">

               <div style="float: left; width: 305px">
                  <div class="cheer_subsection">

                     <div class="cheer_subsection_header"><img src="images/cheer_videos.png"></div>

                     <!-- column videos -->
                     <div style="margin: 0px; padding: 5px 5px 0px 5px; " >

                        <?php
                  if($found_video > 0)
                   {

                      $ctr = 1;
                      for ($count = 0; $count < count($video_array); $count += 1)
                       {
                          $video_id = $video_array[$count]['VideoID'];
                          $video_title = trim($video_array[$count]['Title']);
                          $video_caption = trim($video_array[$count]['Caption']);
                          $video_youtube = trim($video_array[$count]['YouTubeLink']);
                          $video_thumb = trim($video_array[$count]['ImageThumb']);

                          $video_caption = myTruncate($video_caption, 150, " ", "...");

                            if ($video_youtube)
                           {
                             $feedURL = 'http://gdata.youtube.com/feeds/api/videos/'. $video_youtube;

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
                        <!-- video <?php echo $ctr; ?> -->
                        <div class="cheervid_item" >

                           <div class="cheervid_title" ><a href="cheerdancers-videos/<?php echo $video_id; ?>/<?php echo seoUrl($video_title); ?>" ><?php echo strtoupper($video_title); ?></a></div>

                            <div class="lfloat" ><a href="cheerdancers-videos/<?php echo $video_id; ?>/<?php echo $video_id; ?>" ><img src="<?php
                            if ($video_thumb)
                              echo $video_thumb;
                            else
                              echo resizeCrop("images/cheer_videos/".$video_id.".jpg", 142, 100, '');
                            ?>" alt="<?php echo strtoupper($video_title); ?>" title="<?php echo strtoupper($video_title); ?>" class="btnimg" /></a></div>

                            <div class="lfloat" style="width: 133px; margin-left: 8px; " >

                                <div class="cheervid_caption" >
                                    <?php echo ucfirst($video_caption); ?>
                                </div>

                                <div class="cheervid_time" >
                                    <?php echo $video_length; ?>
                                </div>

                            </div>

                            <div class="clear_both" ></div>

                        </div>
                        <!-- end video 1 <?php echo $ctr; ?> -->

                        <?php
                        $ctr++;

                       }//end while

                   }//end if
                  ?>

                     </div>
                     <!-- end column videos -->

                     <div class="column_more" ><a href="cheerdancers-videos">More Videos</a></div>

                  </div>

                  <!--div style="height: 10px"></div>

                  <div style="width: 100%; height: 400px; background: #ccc">
                     Twitter widget
                  </div-->
               </div>

               <div style="float: left; width: 305px; margin-left: 10px">

                  <div class="cheer_subsection">

                     <div class="cheer_subsection_header"><img src="images/cheer_featured.png"></div>

                     <div class="cheer_featcon" style="margin: 0px; padding: 5px; " >

                        <!-- FEATURED CONTENT -->
                        <?php
                  if($found_fd > 0)
                   {
                          echo trim($fdancer->Content);
                   }//end if
                  ?>
                        <div class="clear_both" ></div>
                        <!-- FEATURED CONTENT -->

                     </div>

                  </div>

                  <!--div style="height: 10px"></div>

                  <div style="width: 100%; height: 400px; background: #ccc">
                     Facebook widget
                  </div-->
               </div>
            </div>
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
