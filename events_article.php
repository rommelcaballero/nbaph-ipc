<?php
$part_page = "events article";

include('queries/events_article-queries.php');
include('queries/events-general-queries.php');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>NBA Philippines</title>

<link rel="stylesheet" type="text/css" href="/style.css">
<link rel="stylesheet" type="text/css" href="/style-events.css">
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

      <div style="width: 958px; min-height: 90px; margin: 0 auto; text-align: center;  ">
      <?php
      echo $ads_list['nba_LocalEvents_top_leaderboard']['Content'];
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
         <div class="lfloat" style="width: 632px; z-index: 1000; ">

            <div class="addthis_div" style="padding-bottom: 5px">
               <!--div class="addthis_position">
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
               </div-->
            </div>

            <div style="width: 630px; text-align: center; background-color: #fef5f5; " >
            <?php

                if($event['Image'])
                 {
                     $event_image = $event['Image'];
                 }
                else
                 {
                     $event_image = "/images/events/".$event['EventID']."_event.jpg";
                 }

                ?>

                   <center><div ><img src="<?php echo $event_image; ?>"></div></center>

            </div>

            <div class="blue" style="padding: 5px 0; ">
               <b><?php echo $event['Title']; ?></b>
            </div>

            <div style="font-size: 12px" id="events_article">
               <?php echo stripslashes($event['Description']); ?>
               <div class="clear_both" ></div>
            <!--div class="addthis_div">
               <div class="addthis_position">
                  
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
                  
               </div>
            </div-->
			<div id="disqus_thread" style='padding:10px;'></div>
			<script type="text/javascript">
				/* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
				var disqus_shortname = 'ph-nba-com'; // required: replace example with your forum shortname		
				<?php $xbase = 'http://ph.nba.com/'; ?>	
				var disqus_url = '<?php echo $xbase; ?>local-events/<?php echo $event_id; ?>/<?php  echo seoUrl($event['Title']); ?>';
				/* * * DON'T EDIT BELOW THIS LINE * * */
				(function() {
					var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
					dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
					(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
				})();
			</script>
			<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
			<a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
		
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
      $footer_ads = $ads_list['nba_LocalEvents_bottom_leaderboard']['Content'];
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
</div></div>
<?php include('google_dfp.php'); ?>
</body>
</html>
