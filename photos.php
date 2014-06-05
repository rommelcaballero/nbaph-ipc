<?php

$part_page = "photos";

include('queries/photos-queries.php');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>NBA Philippines</title>

<link rel="stylesheet" type="text/css" href="/style.css">
<link rel="stylesheet" type="text/css" href="/style-photos.css">
<link rel="stylesheet" type="text/css" href="/jscal2.css" />
<link rel="stylesheet" type="text/css" href="/border-radius.css" />
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

      <div style="width: 958px; min-height: 90px; margin: 0 auto; text-align: center">
      <?php
      echo $ads_list['nba_Photos_top_leaderboard']['Content'];
      ?>
      </div>

      <div style="height: 10px"></div>

      <div style="font-size: 20px; width: 940px; margin: 0 auto; padding: 10px 0 0; color: #002954">
         <b>Photos</b>
      </div>

      <div style="height: 20px"></div>

      <!-- top half start -->
      <div style="width: 958px; margin: 0 auto; padding-bottom: 15px; ">

         <!-- left start -->
         <div class="lfloat" style="width: 632px; ">

            <div class="events_subsection_header">

               <div class="tab_wtitle" >Recent Galleries</div>

            </div>

            <div id="PhotoAlbum" >

            <?php
         if($found_pho > 0)
          {

             if($gallery_id)
              {
         ?>
               <!-- album id -->
               <div >

                    <div >

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

                       <div class="lfloat"  style="width: 483px; " >

                            <span class="blue" id="AlbumTitle" ><?php echo ucwords($disp['GalleryName']); ?></span> &nbsp;&nbsp; <?php //echo date("F j, Y", strtotime($disp['DateAdded));?>

                        </div>

                        <div class="rfloat" id="CountPhoto" style="width: 114px; margin-right: 10px; text-align: right;  " >
                           <span id="ChangeCount" >1</span> of <?php echo $found_pho; ?>
                        </div>

                        <div class="clear_both" ></div>

                    </div>

                    <!-- buttons -->
                    <div style="padding: 15px 0px 0px 24px; text-align: left; " >

                        <div style="width: 570px;  " >

                            <div class="lfloat" ><input type="button" class="mybtn" value="prev" id="PrevPhoto"   /></div>
                            <div class="lfloat" style="margin-left: 12px; " ><input type="button" class="mybtn" value="next" id="NextPhoto"  /></div>
                            <div class="rfloat"  ><input type="button" class="mybtn" value="back to album list" id="BackAlbum" style="padding: 5px 5px 6px 5px; " /></div>
                            <div class="clear_both" ></div>

                        </div>

                    </div>
                    <!-- end buttons -->

                </div>

                <!-- Image info -->
                <div style="padding: 20px 5px 0px 5px; " >

                    <!-- scroll -->
                   <div class="scroll" id="gallery_pics" style="width: 600px; height: 700px;  ">

                        <div class="pics" >

                            <!-- Image 1 -->
                            <div id="PhotoHolder1" class="photo_holder" style="display: block; " photo="1" >

                                <?php
                              $img_arr = array();
                              //image

                              $phoimg = $disp['Filename'];
                              $img_arr[] = $phoimg;
                              ?>

                                <div class="EventImage image1"><img src="<?php echo $phoimg; ?>" alt="<?php echo ucwords(stripslashes($disp['Caption'])); ?>" width="600" height="600"></div>
                                <div class="EventCaption" style="width: 590px; " ><?php echo $disp['Caption']; ?></div>
                                <div class="EventCredits" style="width: 590px; " ><?php echo $disp['Credits']; ?></div>

                            </div>
                            <!-- end Image 1 -->

                    <?php
                             $ctr = 2;
                             for ($count = 0; $count < count($gallery_array); $count += 1)
                              {

                                 $galleryid = $gallery_array[$count]['GalleryID'];
                                 $photoid = $gallery_array[$count]['PhotoID'];
                                 $caption = $gallery_array[$count]['Caption'];
                                 $image = $gallery_array[$count]['Filename'];
                                 $credits = $gallery_array[$count]['Credits'];
                                 $galleryname = $gallery_array[$count]['GalleryName'];
                                 $date = date("F j, Y", strtotime($gallery_array[$count]['DateAdded']));

                         //image
                         //if($row->Filename)
                         //{
                            //$phoimg = "images/gallery/".$galleryid."/".$image;
                            $img_arr[] = $image;
                            echo "<!-- image arr: $image -->\n";
                         /*}
                        else
                         {
                            $phoimg = "images/gallery/".$galleryid."/".$photoid."_photos.jpg";
                         } */

                    ?>
                            <!-- Image <?php echo $ctr; ?> -->
                           <div id="PhotoHolder<?php echo $ctr; ?>" class="photo_holder" photo="<?php echo $ctr; ?>">
                              <div class="EventImage image<?php echo $ctr; ?>"><!--img src="<?php echo $phoimg; ?>" alt="<?php echo ucwords(stripslashes($caption)); ?>" width="600" height="600"--></div>
                              <div class="EventCaption" style="width: 590px; "><?php echo $caption; ?></div>
                              <div class="EventCredits" style="width: 590px; " ><?php  echo $credits; ?></div>
                           </div>
                           <!-- end Image <?php echo $ctr; ?> -->
                    <?php
                                $ctr++;
                              }//end while
                    ?>

                        </div>

                    </div>
                    <!-- end scroll -->

                    <div class="clear_left" ></div>

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
                        <div class="fb-comments" data-href="<?php echo $base; ?>photo-gallery/<?php echo $gallery_id; ?>/<?php  echo seoUrl($disp['GalleryName']); ?>/<?php echo trim(urlencode($blog_postedby)); ?>" data-num-posts="2" data-width="612"></div>
               </div>
               <!-- Image info -->
               <!-- end album id -->

            <?php
              }//end if $gallery_id
             else
              {
         ?>

                 <table class="centered" cellspacing="0" cellpadding="0" style="width: 100%; " >

               <?php
                    for ($count = 0; $count < count($gallery_array); $count += 1) {

                  //image
                     $phoimg = $gallery_array[$count]['ImageSecond'];

                       if ($count % 2 == 0 && $count > 0) {
                          echo '<tr><td style="height: 5px"></td></tr>';
                       }

                       if ($count % 2 == 0) {
                          echo '<tr>';
                       }
                    ?>
                         <td style="padding-bottom: 30px; " >
                            <div id="<?php echo $count; ?>"><a href="photo-gallery/<?php echo $gallery_array[$count]['GalleryID']; ?>/<?php echo seoUrl(stripslashes($gallery_array[$count]['GalleryName'])); ?>" title="<?php echo $gallery_array[$count]['Caption']; ?>"><img src="<?php echo $phoimg; ?>" width="301" height="200" alt="<?php echo ucwords(stripslashes($gallery_array[$count]['GalleryName'])); ?>" ></a></div>

                            <div style="padding-top: 10px; font-size: 10pt;  " >
                                <span class="blue"><a href="photo-gallery/<?php echo $gallery_array[$count]['GalleryID']; ?>/<?php echo seoUrl(stripslashes($gallery_array[$count]['GalleryName'])); ?>" ><?php echo ucwords(stripslashes($gallery_array[$count]['GalleryName'])); ?></a></span>
                                <?php
                                 $ex = explode("-", $gallery_array[$count]['DateAdded']);
                                 //echo date("F j, Y", mktime(0, 0, 0, $ex[1], $ex[2], $ex[0]));

                                ?>
                            </div>
                         </td>
                    <?php
                       if ($count % 2 == 0) {
                          echo '<td style="width: 12px; "></td>';
                       }

                       if ($count % 2 == 1) {
                          echo '</tr>';
                       }
                    }
                    ?>

                </table>

            <?php
              }// end else

          }//end if
         ?>

            </div>

         </div>
         <!-- left end -->

         <!-- right start -->
         <div class="lfloat" style="width: 300px; margin-left: 25px; ">

<?php
if ($ad['Link']) {
?>
            <div style="width: 300px; height: 100px">
               <a href="<?php echo $ad['Link']; ?>"><img src="/ads/<?php echo $ad['Image']; ?>"></a>
            </div>
<?php
}
?>

            <div style="height: 20px; "></div>

             <!-- html ads -->
            <?php include("layouts/html-ads.php"); ?>
            <!-- end html ads -->

         </div>
         <!-- right end -->

         <div class="clear_left"></div>

      </div>
      <!-- top half end -->
    <div>      
    <?php
    $footer_ads = $ads_list['nba_Photos_bottom_leaderboard']['Content'];
    include('layouts/links.php');
    ?>
    <?php include('layouts/footer.php'); ?>
    </div>
   </div>
</div>

<script type="text/javascript">
<!--

var gallery_count = 0;
var gallery_array = new Array(<?php
for ($i = 0; $i < count($img_arr); $i += 1) {
   if ($i > 0)
      echo ",";
   echo "'" . $img_arr[$i] . "'";
}
?>);

$(".scroll").scrollable({ circular: true });

 $(function() {

   $("#PrevPhoto").click(function() {
      $("#gallery_pics").data("scrollable").prev();

      gallery_count -= 1;
      if (gallery_count < 0)
        gallery_count = <?php echo ($found_pho - 1); ?>;

      $("[class$=image" + (gallery_count + 1) + "]").html('<img src="' + gallery_array[gallery_count] + '" alt="">');
      $("#ChangeCount").html(gallery_count + 1);
   });

   $("#NextPhoto").click(function() {

      $("#gallery_pics").data("scrollable").next();

      gallery_count += 1;
      if (gallery_count > <?php echo ($found_pho - 1); ?>)
        gallery_count = 0;

      $("[class$=image" + (gallery_count + 1) + "]").html('<img src="' + gallery_array[gallery_count] + '" alt="">');
      $("#ChangeCount").html(gallery_count + 1);
   });

   $("#BackAlbum").click(function() {

      window.location = "<?php echo $base.'photo-gallery'; ?>";
   });

});

var shift = false;

$("#guestbook").keydown(function(event) {
   if (event.which == 16)
      shift = true;
});

$("#guestbook").keyup(function(event) {
   if (event.which == 16)
      shift = false;
});

$("#guestbook").keypress(function(event) {
   if (event.which == 13 && shift == false) {
      event.preventDefault();
<?php
if ($_SESSION['userid']) {
?>
      $("#guestbook").prop("disabled", "disabled");
      $("#guestbook").css({background: "#ccc"});

      var dat = $("#guestbook_form").serialize();

      $.post("guestbook.php", "message=" + $("#guestbook").val(), function(msg) {
         $("#guestbook").prop("disabled", "");
         $("#guestbook").css({background: "#fff"});

         $("#guestbook_messages").html(msg + $("#guestbook_messages").html());
      });
<?php
}else {
?>
      alert("Please log in to post.");
<?php
}?>
   }
});

$("#guestbook").focus(function() {
   if ($(this).val() == "Write your comment here") {
      $(this).val("");
   }
});

$("#guestbook").blur(function() {
   if ($(this).val() == "") {
      $(this).val("Write your comment here");
   }
});

jQuery.fn.limitMaxlength = function(options){

   var settings = jQuery.extend({
      attribute: "maxlength",
      onLimit: function(){},
      onEdit: function(){}
   }, options);

   // Event handler to limit the textarea
   var onEdit = function(){
      var textarea = jQuery(this);
      var maxlength = parseInt(textarea.attr(settings.attribute));

      if(textarea.val().length > maxlength){
         textarea.val(textarea.val().substr(0, maxlength));

         // Call the onlimit handler within the scope of the textarea
         jQuery.proxy(settings.onLimit, this)();
      }

      // Call the onEdit handler within the scope of the textarea
      jQuery.proxy(settings.onEdit, this)(maxlength - textarea.val().length);
   }

   this.each(onEdit);

   return this.keyup(onEdit)
            .keydown(onEdit)
            .focus(onEdit)
            .live('input paste', onEdit);
}

$(function() {

   var onEditCallback = function(remaining){
      //$(this).siblings('.charsRemaining').text("Characters remaining: " + remaining);

      if(remaining > 0){
         $(this).css('background-color', 'white');
      }
      else {
         $(this).css('background-color', 'red');
      }
   }

   var onLimitCallback = function(){
      $(this).css('background-color', 'red');
   }

   $('textarea[maxlength]').limitMaxlength({
      onEdit: onEditCallback,
      onLimit: onLimitCallback
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
<?php include('google_dfp.php'); ?>
</body>
</html>
