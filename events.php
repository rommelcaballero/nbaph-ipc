<?php
$part_page = "events";

include('queries/events-queries.php');
include('queries/events-general-queries.php');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>NBA Philippines</title>

<link rel="stylesheet" type="text/css" href="/style.css">
<link rel="stylesheet" type="text/css" href="/style-events.css">
<link rel="stylesheet" type="text/css" href="/colorbox/colorbox.css">
<!--[if IE]>
<link rel="stylesheet" type="text/css" href="/ie_style.css">
<![endif]-->
<!--[if IE 7]>
<link rel="stylesheet" type="text/css" href="/ie7_style.css">
<![endif]-->
<script type="text/javascript" src="jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="jquery.tools.min.js"></script>
<script type="text/javascript" src="jquery.imgpreload.js"></script>
<script type="text/javascript" src="colorbox/jquery.colorbox.js"></script>
<script type="text/javascript" src="java.js"></script>
</head>

<body>
<?php
//include('layouts/popups.php');
?>

<div id="wrapper">
<?php
include('layouts/header.php');
?>

   <div id="main_content">

      <div style="height: 10px"></div>

      <div style="width: 975px; min-height: 90px; margin: 0 auto; text-align: center; ">
      <?php
      echo $ads_list['nba_Events_top_leaderboard']['Content'];
      ?>
      </div>

      <div style="height: 10px"></div>

      <div style="font-size: 20px; width: 940px; margin: 0 auto; padding: 10px 0 0; color: #002954">
         <b>Events</b>
      </div>

      <div style="height: 20px"></div>

      <!-- top half start -->
      <div style="width: 958px; margin: 0 auto; padding-bottom: 15px; ">

          <!-- left start -->
          <div class="lfloat" style="width: 632px; ">

            <!-- main event -->
            <div id="MainEvent" >
               <?php
               $event_image = $events_row['Image'];
               $current_eventid = $events_row['EventID'];
               ?>

                <div style="width: 630px; text-align: center; background-color: #fef5f5; " >
                   <center><div ><a href="/local-events/<?php echo $events_row['EventID']; ?>/<?php echo seoUrl($events_row['Title']); ?>"><img src="<?php
                  echo $event_image;
                  ?>"></a></div></center>
                </div>

                <div class="blue" style="padding: 5px 0px 0px 0px; font-weight: bold; " >
                   <a href="/local-events/<?php echo $events_row['EventID']; ?>/<?php echo seoUrl($events_row['Title']); ?>" ><?php echo $events_row['Title']; ?></a>
                </div>

                <div style="font-size: 12px; ">
               <?php
                   echo substr(stripslashes($events_row['Intro']), 0, 200);

                   if (strlen(stripslashes($events_row['Intro'])) > 200)
                      echo "...";
                   ?>
                   <span class="blue" ><a href="/local-events/<?php echo $events_row['EventID']; ?>/<?php echo seoUrl($events_row['Title']); ?>" >Read full article.</a></span>

                </div>

                <!-- table not exists -->
            </div>
            <!-- main event -->

            <div style="height: 15px; ">&nbsp;</div>

            <div style="width: 620px; ">

               <div style="float: left; width: 300px; ">

                  <!-- VIDEOS -->
                  <div class="events_subsection">

                      <div class="events_subsection_header" style="width: 300px; " >
                        <div class="tab_wtitle" >Videos</div>
                      </div>

                      <div class="section_holder" >

                          <div style="margin: 0px; padding: 9px 11px 0px 11px; font-size: 9pt; " >
                              <div>
                              <?php
                              $preg = array('/width=\"[\d]{1,4}\"/i', '/height=\"[\d]{1,4}\"/i');
                              $with = array('width="277"', 'height="159"');
				echo preg_replace($preg, $with, $video_row['EmbedCode']);
                              ?>
                              </div>

                                <div style="padding: 10px 0; font-size: 14px; ">
                                    <b><?php echo stripslashes($video_row['Title']); ?></b>
                                </div>

                                <div ><?php echo stripslashes($video_row['Caption']); ?></div>

                          </div>

                          <div class="more_abs"  >
                            <a href="events-videos" >More Videos</a>
                          </div>

                      </div>

                  </div>
              <!-- END VIDEOS -->
               </div>

               <div style="float: left; width: 300px; margin-left: 20px; ">

                  <!-- PHOTOS -->
                  <div class="events_subsection">

                      <div class="events_subsection_header" style="width: 300px; " >
                        <div class="tab_wtitle" >Photos</div>
                      </div>

                      <div class="section_holder" >

                          <div style="margin: 0px; padding: 9px 11px 0px 6px; font-size: 9pt; " >

                               <div >

                                    <table id="eventsphotos" class="centered" cellspacing="0" cellpadding="3" style="width: 279px; text-align: center">
                                    <?php
                                       for ($count = 0; $count < count($photo_array); $count += 1) {
                                          //image
                                          $phoimg = $photo_array[$count]['ImageThumb'];

                                          if ($count % 2 == 0 && $count > 0) {
                                             echo '<tr><td style="height: 5px"></td></tr>';
                                          }

                                          if ($count % 2 == 0) {
                                             echo '<tr>';
                                          }
                                        ?>
                                                 <td><a href="/events-photos/<?php echo $photo_array[$count]['AlbumID']; ?>/<?php echo $photo_array[$count]['PhotoID']; ?>/<?php echo seoUrl($photo_array[$count]['Caption']); ?>" title="<?php echo $photo_array[$count]['Caption']; ?>"><img src="<?php echo $phoimg; ?>" width="160" height="90"></a></td>

                                        <?php
                                          if ($count % 2 == 0) {
                                             echo '<td style="width: 9px"></td>';
                                          }

                                          if ($count % 2 == 1) {
                                             echo '</tr>';
                                          }
                                       }
                                       ?>
                                    </table>
                              </div>
                          </div>

                          <div class="more_abs"  >
                            <a href="events-photos" >More Photos</a>
                          </div>

                      </div>

                  </div>
              <!-- END PHOTOS -->
               </div>

            </div>

          </div>
          <!-- left end -->

          <!-- right start -->
         <div class="lfloat" style="width: 300px; margin-left: 25px; ">
            <?php include('layouts/events_sidebar.php'); ?>
         </div>
         <!-- right end -->

         <div class="clear_left" > </div>

     </div>
     <!-- top half end  -->
     <div>    
      <?php
      $footer_ads = $ads_list['nba_Events_bottom_leaderboard']['Content'];
      include('layouts/links.php');
      ?>
      <?php include('layouts/footer.php');?>
      </div>
   </div>

</div>

<script type="text/javascript">
<!--
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
