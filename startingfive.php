<?php

$part_page = "starting five";

include('queries/startingfive-queries.php');
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>NBA Philippines</title>

<base href="<?php  echo $base; ?>">
<link rel="stylesheet" href="https://s3-ap-southeast-1.amazonaws.com/nbaphfiles/sib2/style2.css">
<?php include('static_nav2.php');?>
<link rel="stylesheet" type="text/css" href="/style.css">
<link rel="stylesheet" type="text/css" href="/style-vote.css">
<link rel="stylesheet" type="text/css" href="/colorbox/colorbox.css">
<!--[if IE]>
<link rel="stylesheet" type="text/css" href="/ie_style.css">
<![endif]-->
<!--[if IE 7]>
<link rel="stylesheet" type="text/css" href="/ie7_style.css">
<![endif]-->
<!--<script type="text/javascript" src="/jquery-1.7.1.min.js"></script>-->
<script src="http://code.jquery.com/jquery-migrate-1.0.0.js"></script>
<script type="text/javascript" src="/jquery.tools.min.js"></script>
<script type="text/javascript" src="/jquery.imgpreload.js"></script>
<script type="text/javascript" src="/colorbox/jquery.colorbox.js"></script>
<script type="text/javascript" src="/java.js"></script>
<script>
function view_comments(id){
   var selected_id = "#content_" + id;
   var selector_id = "#selector_" + id;
   var height = $(selected_id).css('height');
   if(height == "250px"){
      $(selected_id).animate({ height : "0" }, 'slow',function() {
         $(selected_id).html("");
      });
      $(selector_id).html("<img src=\"/images/arrow_down.png\">");
   } else {
      $(selected_id).animate({ height : "250" }, 'slow');
      $(selected_id).html('<table><tr><td><img src="/images/270x240n_sfive.png" width="30" height="30"></td><td style="background: #ececec;"><span style="font-size: 14px;">Chris Ituah</span> <span style="font-size: 12px;">posted about 4 hours ago</span></td></tr><tr><td></td><td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque id nulla eu risus vestibulum dapibus. Nunc at augue est, ut scelerisque tellus. Maecenas quis turpis enim. Suspendisse accumsan euismod ultricies. Fusce tristique auctor tristique. Phasellus et orci egestas tortor commodo scelerisque. Quisque ornare dictum augue eu rhoncus. Nam suscipit nibh ut metus faucibus sodales. Nulla sit amet lorem eleifend libero mattis dictum vitae at lacus. Maecenas eu auctor felis. Donec interdum lobortis vehicula. Vivamus non ipsum nec mi tempus ullamcorper. Fusce purus tellus, convallis ac elementum elementum, vehicula a velit. Vivamus condimentum placerat nisi id lobortis. Fusce adipiscing mattis justo, et tempus quam fringilla euismod. Donec vestibulum nunc tincidunt quam iaculis quis aliquet purus tincidunt. Fusce quis dui a nisi consequat ornare sit amet eget augue. Mauris fringilla accumsan nibh et rhoncus. Nulla quis velit sed mi vehicula rhoncus ac ac elit. Duis nibh quam, accumsan eu pharetra ac, volutpat ac metus. Phasellus eget mauris erat, eget dictum quam. Aliquam nec lorem elit, eget porttitor ante. Integer nec enim sapien.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque id nulla eu risus vestibulum dapibus. Nunc at augue est, ut scelerisque tellus. Maecenas quis turpis enim. Suspendisse accumsan euismod ultricies. Fusce tristique auctor tristique. Phasellus et orci egestas tortor commodo scelerisque. Quisque ornare dictum augue eu rhoncus. Nam suscipit nibh ut metus faucibus sodales. Nulla sit amet lorem eleifend libero mattis dictum vitae at lacus. Maecenas eu auctor felis. Donec interdum lobortis vehicula. Vivamus non ipsum nec mi tempus ullamcorper. Fusce purus tellus, convallis ac elementum elementum, vehicula a velit. Vivamus condimentum placerat nisi id lobortis. Fusce adipiscing mattis justo, et tempus quam fringilla euismod. Donec vestibulum nunc tincidunt quam iaculis quis aliquet purus tincidunt. Fusce quis dui a nisi consequat ornare sit amet eget augue. Mauris fringilla accumsan nibh et rhoncus. Nulla quis velit sed mi vehicula rhoncus ac ac elit. Duis nibh quam, accumsan eu pharetra ac, volutpat ac metus. Phasellus eget mauris erat, eget dictum quam. Aliquam nec lorem elit, eget porttitor ante. Integer nec enim sapien.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque id nulla eu risus vestibulum dapibus. Nunc at augue est, ut scelerisque tellus. Maecenas quis turpis enim. Suspendisse accumsan euismod ultricies. Fusce tristique auctor tristique. Phasellus et orci egestas tortor commodo scelerisque. Quisque ornare dictum augue eu rhoncus. Nam suscipit nibh ut metus faucibus sodales. Nulla sit amet lorem eleifend libero mattis dictum vitae at lacus. Maecenas eu auctor felis. Donec interdum lobortis vehicula. Vivamus non ipsum nec mi tempus ullamcorper. Fusce purus tellus, convallis ac elementum elementum, vehicula a velit. Vivamus condimentum placerat nisi id lobortis. Fusce adipiscing mattis justo, et tempus quam fringilla euismod. Donec vestibulum nunc tincidunt quam iaculis quis aliquet purus tincidunt. Fusce quis dui a nisi consequat ornare sit amet eget augue. Mauris fringilla accumsan nibh et rhoncus. Nulla quis velit sed mi vehicula rhoncus ac ac elit. Duis nibh quam, accumsan eu pharetra ac, volutpat ac metus. Phasellus eget mauris erat, eget dictum quam. Aliquam nec lorem elit, eget porttitor ante. Integer nec enim sapien.</td></tr></table>'); // Comments should be here...
      $(selector_id).html("<img src=\"/images/arrow_up.png\">");
   }
}

function showVotes(divid,sfid){

   var divname='';

   if(divid==1)
   {
      divname='c';
   }
   else if(divid==2)
   {
      divname='pf';
   }
   else if(divid==3)
   {
      divname='sf';
   }
   else if(divid==4)
   {
      divname='sg';
   }
   else if(divid==5)
   {
      divname='pg';
   }

   $("#content_" + divname).html('<img src="/images/loader.gif" width="110" height="80">');

   $.ajax({
      url: "votes_content.php?posid="+divid+"&sfid="+sfid,
      cache: false,
      success: function(upInfo){
      $('#pos_'+divname).html(upInfo);
      //alert(divid+" " + divname);
      //$('#error').html(upCap);
         //window.location.href='gallery.php';
      },
   });

}
</script>
</head>

<body>

<?php
include('layouts/popups.php');
?>

<div id="wrapper" >
		<?php include('static_nav.php');?>
		<?php include('nbaph_header.php');?>

<?php
//include('layouts/header.php');
?>

   <!-- main_content -->
   <div id="main_content"  >

           <div style="height: 10px"></div>

          <div style="width: 958px; min-height: 90px; text-align: center; margin: 0 auto; ">
         <?php
         echo $ads_list['nba_StartingFive_top_leaderboard']['Content'];
         ?>
          </div>

          <div style="height: 10px"></div>

        <div style="height: 10px"></div>

          <!-- top half container start -->
          <div class="container"  >

             <!-- top left start  -->
             <div style="float: left; width: 672px; margin-left: 10px; ">
                <!-- headlines start -->
            <span style="color:#0e4b8d; font-size: 26px; font-weight: bold;">Who's your starting 5?</span>
            <!-- top 5 block start -->

            <!--start position containter CENTER-->
                <div style="width: 672px; height: 250px; margin: 15px 0px;" id="pos_c">

                </div>
            <!-- end position containter-->
            <!-- start position comments-->
            <div style="width: 662px; border: 1px solid #999; font-size: 13px; font-weight: bold; padding: 5px; margin-bottom: 30px; display: none;" id="pos_c_comment">
               <div style="float: left;">Latest Comments</div>
               <div style="float: right; cursor: pointer;" onClick="view_comments(1);"><div style="float: left;">Show / Hide</div>
                  <div style="float: left;" id="selector_1"><img src="images/arrow_down.png" style="margin: 0px;"></div>
               </div>
               <div style="clear: both;"></div>
               <div id="content_1" style="overflow: auto;"></div>
            </div>
            <!-- end position comments-->

            <!--start position containter POWER FORWARD-->
                <div style="width: 672px; height: 250px; margin: 25px 0px;" id="pos_pf">

                </div>
            <!-- end position containter-->
            <!-- start position comments-->
            <div style="width: 662px; border: 1px solid #999; font-size: 13px; font-weight: bold; padding: 5px; margin-bottom: 30px; display: none;" id="pos_pf_comment">
               <div style="float: left;">Latest Comments</div>
               <div style="float: right; cursor: pointer;" onClick="view_comments(2);"><div style="float: left;">Show / Hide</div>
                  <div style="float: left;" id="selector_2"><img src="images/arrow_down.png" style="margin: 0px;"></div>
               </div>
               <div style="clear: both;"></div>
               <div id="content_2" style="overflow: auto;"></div>
            </div>
            <!-- end position comments-->

            <!--start position containter SMALL FORWARD-->
                <div style="width: 672px; height: 250px; margin: 25px 0px;" id="pos_sf">

                </div>
            <!-- end position containter-->
            <!-- start position comments-->
            <div style="width: 662px; border: 1px solid #999; font-size: 13px; font-weight: bold; padding: 5px; margin-bottom: 30px; display: none;" id="pos_sf_comment">
               <div style="float: left;">Latest Comments</div>
               <div style="float: right; cursor: pointer;" onClick="view_comments(3);"><div style="float: left;">Show / Hide</div>
                  <div style="float: left;" id="selector_3"><img src="images/arrow_down.png" style="margin: 0px;"></div>
               </div>
               <div style="clear: both;"></div>
               <div id="content_3" style="overflow: auto;"></div>
            </div>
            <!-- end position comments-->

            <!--start position containter SHOOTING GUARD-->
                <div style="width: 672px; height: 250px; margin: 25px 0px;" id="pos_sg">

                </div>
            <!-- end position containter-->
            <!-- start position comments-->
            <div style="width: 662px; border: 1px solid #999; font-size: 13px; font-weight: bold; padding: 5px; margin-bottom: 30px; display: none;" id="pos_sg_comment">
               <div style="float: left;">Latest Comments</div>
               <div style="float: right; cursor: pointer;" onClick="view_comments(4);"><div style="float: left;">Show / Hide</div>
                  <div style="float: left;" id="selector_4"><img src="images/arrow_down.png" style="margin: 0px;"></div>
               </div>
               <div style="clear: both;"></div>
               <div id="content_4" style="overflow: auto;"></div>
            </div>
            <!-- end position comments-->

            <!--start position containter POINT GUARD-->
                <div style="width: 672px; height: 250px; margin: 25px 0px;" id="pos_pg">

                </div>
            <!-- end position containter-->
            <!-- start position comments-->
            <div style="width: 662px; border: 1px solid #999; font-size: 13px; font-weight: bold; padding: 5px; margin-bottom: 30px; display: none;" id="pos_pg_comment">
               <div style="float: left;">Latest Comments</div>
               <div style="float: right; cursor: pointer;" onClick="view_comments(5);"><div style="float: left;">Show / Hide</div>
                  <div style="float: left;" id="selector_5"><img src="images/arrow_down.png" style="margin: 0px;"></div>
               </div>
               <div style="clear: both;"></div>
               <div id="content_5" style="overflow: auto;"></div>
            </div>
            <!-- end position comments-->

            <!-- top 5 block end -->
                <!-- headlines end -->
             <div>
             <?php
             if (!isset($_SESSION['voteStatus'])){
             ?>
               <h1 style="text-align: center; color: #F00;">Who's your starting 5?<br>Vote Now!<br>
               <a href="vote" style="text-decoration: none;"><span style="text-align: center; font-size: 18px; color: #2b75c2; margin: 0px; padding: 0px;">Click Here</span></a></h1>
            <?php
            }
            ?>
            </div>
             </div>

             <!-- top left end  -->

             <!-- top right start -->
             <div style="float: left; width: 300px; margin-left: 10px; margin-top: 35px;">
          <!-- ADS 300x250 -->
            <?php
            for ($count = 0; $count < count($ads_array); $count += 1){
            ?>
                <div style="width: 300px; height: 250px;">
               <?php echo $ads_array[$count]['Content'];?>
            </div>
            <div style="height: 10px"></div>
            <?php
            }
            ?>

                <!-- writers start -->
                <div style="width: 300px; padding: 5px 0 2px 0; background: url('images/rounded_bottom_300.png') bottom center no-repeat">
                   <div class="article_header" style="background: url('images/rounded_top_300.png'); width: 270px; height: 15px">
                      NBA WRITERS
                   </div>

                   <!-- writers content start -->
                   <div style="width: 298px; border: 1px solid #d8d8d8">
                      <div style="width: 298px; border-bottom: 1px solid #d8d8d8">
                         <div style="width: 260px; padding-top: 5px; margin: 0 auto">
                            <ul class="video_list">
                               <li style="background-position: 0 33px; color: #444" class="writer_element" id="writer_personality">
                                  Personalities
                               </li>
                               <li class="writer_element" id="writer_blogger">
                                  Bloggers
                               </li>
                            </ul>

                            <div class="clear"></div>
                         </div>
                      </div>

                      <!-- writers lists start -->
                      <div class="clear" style="padding: 10px">
                         <!-- writers personalities start -->
                         <div id="writer_personality_list">
                            <table>
    <?php
   for ($count = 0; $count < 3; $count += 1) {
      $blogger_pic = strtolower(urlencode(str_replace(" ", "", $write_array[$count]['Blogger'])));
    ?>
                               <tr>
                                  <td style="width: 55px; vertical-align: top; padding-top: 10px; " >
                                     <div style="width: 45px; height: 75px;"><img src="/images/personalities/<?php echo $blogger_pic; ?>.jpg" border="0"></div>
                                  </td>
                                  <td style="vertical-align: top;  padding-top: 10px;  " >
                                     <div class="writer_title">
                                        <?php
         if ($write_array[$count]['BlogLink']) {
?>
                                        <a href="<?php echo stripslashes($write_array[$count]['BlogLink']); ?>" target="_blank"><?php echo stripslashes($write_array[$count]['BlogTitle']); ?></a>
<?php } else { ?>
               <a href="/writers-content/<?php echo $write_array[$count]['BlogID']; ?>/<?php echo seoUrl($write_array[$count]['BlogTitle']); ?>"><?php echo stripslashes($write_array[$count]['BlogTitle']); ?></a>
<?php }  ?>
                                     </div>

                                     <div class="writer_content">
                                        <b><?php echo stripslashes(strtoupper(str_replace(" ", "", $write_array[$count]['Blogger']))); ?></b>

                                        <div style="padding-top: 5px">
                                           <?php echo stripslashes($write_array[$count]['BlogExcerpt']); ?>
                                        </div>
                                     </div>
                                  </td>
                               </tr>
    <?php
   }
    ?>
                            </table>

                            <div class="more_link">
                               <a href="writers.php">More NBA.com Writers</a>
                            </div>
                         </div>
                         <!-- writers personalities end -->

                         <!-- writers bloggers start -->
                         <div id="writer_blogger_list" style="display: none">
                            <table>
    <?php
   for ($count = 0; $count < 3; $count += 1) {
      $blogger_pic = strtolower(urlencode(str_replace(" ", "", $blog_array[$count]['Blogger'])));
    ?>
                               <tr>
                                  <td style="width: 55px; vertical-align: top; padding-top: 10px; " >
                                     <div style="width: 45px; height: 75px;"><img src="/images/blogs/<?php echo $blogger_pic; ?>.jpg" border="0"></div>
                                  </td>
                                  <td>
                                     <div class="writer_title">
<?php
         if ($blog_array[$count]['BlogLink']) {
?>
                                        <a href="<?php echo stripslashes($blog_array[$count]['BlogLink']); ?>" target="_blank"><?php echo stripslashes($blog_array[$count]['BlogTitle']); ?></a>
<?php } else { ?>
               <a href="/bloggers/<?php echo $blog_array[$count]['BlogID']; ?>/<?php echo seoUrl(stripslashes($blog_array[$count]['BlogTitle'])); ?>"><?php echo stripslashes($blog_array[$count]['BlogTitle']); ?></a>
<?php }  ?>
                                     </div>

                                     <div class="writer_content">
                                        <b><?php echo stripslashes(strtoupper(str_replace(" ", "", $blog_array[$count]['Blogger']))); ?></b>

                                        <div style="padding-top: 5px">
                                           <?php echo stripslashes($blog_array[$count]['BlogExcerpt']); ?>
                                        </div>
                                     </div>
                                  </td>
                               </tr>
    <?php
    }
    ?>
                            </table>
            <div class="more_link">
                               <a href="blogs.php">More Bloggers</a>
                            </div>
                         </div>
                         <!-- writers bloggers end -->
                      </div>
                      <!-- writers lists end -->
                   </div>
                   <!-- writers content end -->
                </div>
                <!-- writers end -->
            <div style="width: 300px; padding: 5px 0 2px 0; background: url('/images/rounded_bottom_330.png') bottom center no-repeat">
                   <div class="article_header" style="background: url('/images/rounded_top_300.png') no-repeat; width: 300px; height: 15px;">
                      PHOTO GALLERY
                   </div>

                   <!-- Headlines content start -->
                   <div class="cell_300">
                      <table cellspacing="0" cellpadding="0">
                         <tr>
                            <td style="width: 13px">
                               <img src="/images/left_btn_small.png" id="gallery_left" class="pointer">
                            </td>
                            <td style="width: 255px; padding: 0 5px">
                               <div class="scroll" id="gallery_pics" style="width: 255px; height: 255px; ">

                                  <div class="pics">

                        <?php
                                $strip = array(" ", ",", "'", "\"", "!", "?");
                                 for ($count = 0; $count < $gallery_total; $count += 1) {
                                    $filename = $gallery_array[$count]['Filename'];
                                 ?>
                                     <div class="gallery_content">
                                        <table cellspacing="0" cellpadding="0" style="width: 255px; height: 255px">
                                           <tr>
                                              <td style="text-align: center">
                                                 <a title="<?php echo stripslashes($gallery_array[$count]['Caption']); ?>" href="/photos.php?gallery_id=<?php echo $gallery_array[$count]['GalleryID']; ?>"><img src="<?php echo $filename; ?>" width="255" height="255"></a>
                                              </td>
                                           </tr>
                                        </table>
                                     </div>
                                 <?php
                                 }
                                 ?>
                                  </div>
                               </div>
                            </td>
                            <td style="width: 13px; text-align: right">
                               <img src="/images/right_btn_small.png" id="gallery_right" class="pointer">
                            </td>
                         </tr>
                         <tr>
                            <td>&nbsp;</td>
                            <td>
                               <div style="font-size: 10px; color: #444; padding: 5px 0">
                                  <span id="gallery_count">1</span> of <?php echo $gallery_total; ?>

                                  <div style="position: absolute; top: 5px; right: 0" class="blue">
                                     <?php echo stripslashes($gallery['GalleryName']); ?>
                                  </div>
                               </div>
                            </td>
                            <td>&nbsp;</td>
                         </tr>
                      </table>
                   </div>
                   <!-- Headlines content end -->
                </div>
             </div>
             <!-- top right end -->

             <div class="clear"></div>

          </div>
          <!-- top half container end -->

          <div style="height: 10px"></div>

          <div style="width: 980px; height: 90px; margin: 0 auto; text-align: center;">
        <!-- ADS 728 x 90 | 210x90 -->
         <?php
         echo $ads_list['nba_StartingFive_bottom_leaderboard']['Content'];
         ?>
          </div>
          <div style="height: 10px"></div>

          <!-- three columns start -->

    </div>
    <!-- end main_content -->

</div>

   <?php
       include('layouts/footer.php');
    ?>
<script type="text/javascript">
<!--
$(function() {
});

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

$(".headline_circle").click(function() {
   $("#headline_circle_" + headline_count).prop("src", "/images/circle_empty.png");

   var num = parseInt($(this).prop("id").substring($(this).prop("id").length - 1));
   $("#headline_pics").data("scrollable").seekTo(num);
   headline_count = num;

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

$(".video_circle").click(function() {
   $("#video_circle_" + video_count).prop("src", "/images/circle_empty.png");

   var num = parseInt($(this).prop("id").substring($(this).prop("id").length - 1));
   $("#" + video_section).data("scrollable").seekTo(num);
   video_count = num;

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
   if ($(this).prop('id') != "video_list_live") {
      $("#" + video_tab).css({backgroundPosition: "0 0", color: "#0054af"});
      $("#" + video_section).css({display: "none"});

      video_tab = $(this).prop("id");
      video_section = video_tab + "_gallery";

      $("#" + video_tab).css({backgroundPosition: "0 33px", color: "#444"});
      $("#" + video_section).css({display: "block"});
      $("#" + video_section).data("scrollable").begin();

      $("#video_circle_" + video_count).prop("src", "/images/circle_empty.png");
      $("#video_circle_0").prop("src", "/images/circle_filled.png");

      video_count = 0;
   }
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

var gallery_count = 0;

$("#gallery_left").click(function() {
   $("#gallery_pics").data("scrollable").prev();

   gallery_count -= 1;
   if (gallery_count < 0)
      gallery_count = <?php echo ($gallery_total - 1); ?>;

   $("#gallery_count").html(gallery_count + 1);
});

$("#gallery_right").click(function() {
   $("#gallery_pics").data("scrollable").next();

   gallery_count += 1;
   if (gallery_count > <?php echo ($gallery_total - 1); ?>)
      gallery_count = 0;

   $("#gallery_count").html(gallery_count + 1);
});

function submit_poll() {
   var dat = $("#poll_form").serialize();

   $.post("submit_poll.php", dat, function(msg) {
      $("#poll_cell").html(msg);
   });
}

var p_top = 1;
var c_top = 1;

function carousel(targ) {
   if (c_top != targ) {
      $("#carousel" + c_top).css({zIndex: 0});

      p_top = c_top;
      c_top = targ;

      $("#carousel" + targ).css({zIndex: 10});
      $("#carousel" + targ).slideDown("fast", function() {
         $("#carousel" + p_top).css({display: "none"});
      });
   }
}

for(var votesctr=1;votesctr<=5;votesctr++)
   showVotes(votesctr);
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
