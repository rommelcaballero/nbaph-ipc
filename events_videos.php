<?php
ob_start();

$part_page = "events videos";

include('queries/events_videos-queries.php');
include('queries/events-general-queries.php');

if(file_exists($cachefile))
{ 
	$cache_this = 0;
	//echo "<!-- Cached Copy ".$last_db." -->\n";
	include($cachefile); 
	exit;
}
else
{
	$cache_this = 1; 	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>NBA Philippines</title>

<base href="<?php echo $base; ?>">

<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="style-events.css">
<link rel="stylesheet" type="text/css" href="jscal2.css" />
<link rel="stylesheet" type="text/css" href="border-radius.css" />
<link rel="stylesheet" type="text/css" href="colorbox/colorbox.css">
<!--[if IE]>
<link rel="stylesheet" type="text/css" href="ie_style.css">
<![endif]-->
<!--[if IE 7]>
<link rel="stylesheet" type="text/css" href="ie7_style.css">
<![endif]-->
<style type="text/css">
<!--
.other_videos {
vertical-align: top;
}-->
</style>
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
      <?php
      echo $ads_list['Content'];
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

            <div class="events_subsection_header">

               <div class="tab_wtitle" >Videos</div>

            </div>

            <!-- LATEST video -->
            <div id="FetauredVideo" >

                <div class="blue" style="font-weight: bold; " >LATEST VIDEO</div>

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

                <div style="width: 100%; padding-top: 13px; ">
               <?php
                echo preg_replace($preg, $with, $video['EmbedCode']);
                ?>
                </div>

                <div style="padding: 5px 0; color: #999">
                   <b><?php echo $video['Title']; ?></b>

                   <div style="padding-top: 10px; font-size: 12px">
                      <?php echo stripslashes($video['Caption']); ?>
                   </div>
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

            <div class="fb-comments" data-href="<?php echo $base; ?>events-videos/<?php echo $video_id; ?>/<?php  echo seoUrl($video['Title']); ?>" data-num-posts="2" data-width="614"></div>
            </div>
            <!-- end LATEST video -->

            <!-- OTHER VIDEOS -->
            <div id="OtherVideos">

                <div class="blue"><b>OTHER VIDEOS</b></div>

                <div style="margin: 0px; padding: 16px 0px 0px 0px; " >

                    <table border="0" cellspacing="0" cellpadding="0" style="width: 100%">
                    <?php
                    for ($i = 0; $i < count($video_array); $i += 1) {
                       if ($i % 2 == 0)
                          echo "<tr>";
                    ?>
                          <td class="other_videos">
                             <div style="text-align: center"><img src="<?php
                             echo $video_array[$i]['Image'];
                             ?>" width="300" height="200"></div>

                             <div style="padding-top: 10px" >
                                <span class="blue"><a href="events-videos/<?php echo $video_array[$i]['VideoID']; ?>/<?php echo seoUrl($video_array[$i]['Title']); ?>" ><?php echo stripslashes($video_array[$i]['Title']); ?></a></span>
                                <?php
                                $ex = explode("-", $video_array[$i]['DatePosted']);
                                echo date("F j, Y", mktime(0, 0, 0, $ex[1], $ex[2], $ex[0]));
                                ?>
                             </div>
                          </td>
                    <?php
                       if ($i % 2 == 1)
                          echo "</tr>";
                    }
                    ?>
                    </table>

                </div>

             </div>
             <!-- end OTHER VIDEOS -->

         </div>
         <!-- left end -->

         <!-- right start -->
         <div class="lfloat" style="width: 300px; margin-left: 25px; ">
            <?php include('layouts/events_sidebar.php'); ?>
         </div>
         <!-- right end -->

         <div class="clear_left"></div>

      </div>
      <!-- top half end -->
      <div>
      <?php
      include('layouts/links.php');
      ?>
    <?php include('layouts/footer.php'); ?>
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

</body>
</html>
<?php
$cachetime = 5 * 60;
// Serve from the cache if it is younger than $cachetime
/*if (file_exists($cachefile) && time() - $cachetime < filemtime($cachefile)) {
    include($cachefile);
    echo "<!-- Cached copy, generated ".date('H:i', filemtime($cachefile))." -->\n";
    exit ;
}*/

if(($cache_this == 1)) // put && ($base == "http://ph.nba.com/")
 {
	 
	// Start the output buffer
	
	/* The code to dynamically generate the page goes here */
	
	// Cache the output to a file
	$fp = fopen($cachefile, 'w');
	fwrite($fp, ob_get_contents());
	fclose($fp);

 }//end cache this
ob_end_flush(); // Send the output to the browser
}//end else cache
?>
