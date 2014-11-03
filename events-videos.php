<?php
include('sql.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
<title>NBA Philippines | Event Videos</title>
<?php
include('head.php');
?>
<link rel="stylesheet" href="videos.css" />
<link rel="stylesheet" href="events.css" />
<link rel="stylesheet" href="style-events.css" />
</head>

<body>
<?php
include('header.php');
?>

<div style="max-width: 993px; margin: 10px auto">
   <div class="nbaph_article_title">
      EVENTS
   </div>

   <div class="nbaph_article_wide_events">
      <div class="nbaph_article_content" style="margin: 0">
         <div class="nbaph_events_margin">
<?php
if ($_GET['video']) {
   $q = "select * from eventsvideos where VideoID = '" . $_GET['video'] . "'";
}
else {
   $q = "select * from eventsvideos order by VideoID desc limit 0, 1";
}

$results = $connect->query($q);

$row = $results->fetch_array();
?>
            <div id="nbaph_events_main" class="nbaph_embed-container">
               <?php echo $row['EmbedCode']; ?>
            </div>

            <div id="nbaph_events_main_title">
               <a href="#"><?php echo stripslashes($row['Title']); ?></a>
            </div>

            <div id="nbaph_events_main_caption">
               <?php echo stripslashes($row['Caption']); ?>
            </div>
         </div>
      </div>

      <div class="clear"></div>

      <div class="nbaph_video_top_padding" style="height: 100%; overflow: hidden">
<?php
$results = $connect->query("select * from eventsvideos where Image != '' order by DatePosted desc limit 0, 40");

$total = ceil($results->num_rows / 4);
$width = 100 / $results->num_rows;
?>
         <table id="nbaph_video_list_max" class="nbaph_video_list_events" style="display: block; width: <?php
         echo (100 * $total);
         ?>%">
            <tr>
<?php
while($row = $results->fetch_array()) {
?>
               <td style="width: <?php echo $width; ?>%">
                  <div class="nbaph_video_thumbnail">
                     <img src="<?php echo $row['Image']; ?>" alt="highlight <?php echo $i; ?>" />
                  </div>

                  <div class="nbaph_video_title">
                     <a href="events-videos.php?video=<?php echo $row['VideoID']; ?>"><?php echo $row['Title']; ?></a>
                  </div>
               </td>
<?php
}
?>
            </tr>
         </table>
<?php
$results = $connect->query("select * from eventsvideos where Image != '' order by DatePosted desc limit 0, 50");

$total = ceil($results->num_rows / 5);
$width = 100 / $results->num_rows;
?>

         <table id="nbaph_video_list_mid" class="nbaph_video_list_events" style="display: none; width: <?php
         echo (100 * $total);
         ?>%">
            <tr>
<?php
while($row = $results->fetch_array()) {
?>
               <td style="width: <?php echo $width; ?>%">
                  <div class="nbaph_video_thumbnail">
                     <img src="<?php echo $row['Image']; ?>" alt="highlight <?php echo $i; ?>" />
                  </div>

                  <div class="nbaph_video_title">
                     <a href="#"><?php echo $row['Title']; ?></a>
                  </div>
               </td>
<?php
}
?>
            </tr>
         </table>

<?php
$results = $connect->query("select * from eventsvideos where Image != '' order by DatePosted desc limit 0, 20");

$total = ceil($results->num_rows / 4);
$width = 100 / $results->num_rows;
?>
         <table id="nbaph_video_list_min" class="nbaph_video_list_events" style="display: none; width: <?php
         echo (100 * $total);
         ?>%">
            <tr>
<?php
while($row = $results->fetch_array()) {
?>
               <td style="width: <?php echo $width; ?>%">
                  <div class="nbaph_video_thumbnail">
                     <img src="<?php echo $row['Image']; ?>" alt="highlight <?php echo $i; ?>" />
                  </div>

                  <div class="nbaph_video_title">
                     <a href="#"><?php echo $row['Title']; ?></a>
                  </div>
               </td>
<?php
}
?>
            </tr>
         </table>

         <div class="nbaph_article_pages_video">
            <img src="imagesph/article_page_active.png" class="nbaph_entry_page_video" alt="page 1" entry="1" />
<?php
//for ($i = 2; $i <= 10; $i += 1) {
for ($i = 2; $i <= $total; $i += 1) {
?>
            <img src="imagesph/article_page_dormant.png" class="nbaph_entry_page_video" alt="page <?php echo $i; ?>" entry="<?php echo $i; ?>" />
<?php
}
?>
         </div>
      </div>

      <div class="clear"></div>

      <div class="nbaph_mobile_only" style="width: 100%; margin-bottom: 20px">
         <div class="nbaph_article_title">
            EVENTS CALENDAR
         </div>

         <div id="calendarContainer_mobile" >
             <center>
              <?php
              include('functions_calendar.php');

              $calendar = query_calendar(NULL,NULL,NULL, $connect);

              echo $calendar;
              ?>
             </center>
         </div>
      </div>
   </div>

   <div class="nbaph_margin nbaph_standard_only">&nbsp;</div>
   <div class="nbaph_margin nbaph_mid_only" style="width: 2%">&nbsp;</div>

   <div class="nbaph_article_standard nbaph_standard_only" style="margin-top: 20px">
      <div id='div-gpt-ad-1410756752515-0' class="nbaph_mrec" style='width:300px; height:250px; margin: 0 auto 10px'>
         <script type='text/javascript'>
         googletag.cmd.push(function() { googletag.display('div-gpt-ad-1410756752515-0'); });
         </script>
      </div>

      <div class="nbaph_article_title">
         EVENTS CALENDAR
      </div>

      <div id="calendarContainer_standard">
          <center>
           <?php
           echo $calendar;
           ?>
          </center>
      </div>

      <div class="clear" style="margin: 15px"></div>

      <div class="nbaph_article_title">
         OTHER ARTICLES
      </div>

      <div class="nbaph_article_content">
         <ul class="nbaph_news_title">
<?php
$results = $connect->query("select * from events order by DatePosted desc limit 1, 5");

while ($row = $results->fetch_array()) {
?>
            <li><a href="events-article.php?id=<?php echo $row['EventID']; ?>"><?php echo stripslashes($row['Title']); ?></a></li>
<?php
}
?>
         </ul>
      </div>

      <div class="nbaph_article_more_link">
         <a href="#">More Articles</a>
      </div>
   </div>

   <div class="nbaph_article_standard nbaph_mid_only" style="margin-top: 20px">
      <div class="nbaph_article_title">
         EVENTS CALENDAR
      </div>

      <div id="calendarContainer_mid" >
         <center>
           <?php
           echo $calendar;
           ?>
         </center>
      </div>

      <div class="clear" style="margin: 15px"></div>

      <div class="nbaph_article_title">
         OTHER ARTICLES
      </div>

      <div class="nbaph_article_content">
         <ul class="nbaph_news_title">
<?php
$results = $connect->query("select * from events order by DatePosted desc limit 1, 5");

while ($row = $results->fetch_array()) {
?>
            <li><a href="events-article.php?id=<?php echo $row['EventID']; ?>"><?php echo stripslashes($row['Title']); ?></a></li>
<?php
}
?>
         </ul>
      </div>

      <div class="nbaph_article_more_link">
         <a href="events-article.php">More Articles</a>
      </div>
   </div>

   <div class="clear"></div>

   <div class="nbaph_article_wide_events nbaph_mobile_only" style="width: 100%">
      <div class="nbaph_article_title">
         OTHER ARTICLES
      </div>

      <div class="nbaph_article_content">
         <ul class="nbaph_news_title">
<?php
$results = $connect->query("select * from events order by DatePosted desc limit 1, 5");

while ($row = $results->fetch_array()) {
?>
            <li><a href="events-article.php?id=<?php echo $row['EventID']; ?>"><?php echo stripslashes($row['Title']); ?></a></li>
<?php
}
?>
         </ul>
      </div>

      <div class="nbaph_article_more_link">
         <a href="#">More Articles</a>
      </div>
   </div>

   <div class="clear"></div>
</div>

<?php
include('footer.php');
?>

<script type="text/javascript">
<!--
var currentTime = new Date();
var cmonth = currentTime.getMonth() + 1;
var cyear = currentTime.getFullYear();

$(function(){
   $(".nbaph_video_list_events").swipe({
      swipeLeft:function(event, direction, distance, duration, fingerCount) {
         $(".nbaph_video_list").each(function() {
            var par = $(this).parent().width();
            var est = parseInt($(this).css('margin-left'));
            var page = Math.floor(-(est / par)) + 2;

            var spl = ($(this).prop('id')).split("nbaph_");

            swiping_video(page, spl[1], 'left', <?php echo $total; ?>);
         });
      },
      swipeRight:function(event, direction, distance, duration, fingerCount) {
         $(".nbaph_video_list").each(function() {
            var par = $(this).parent().width();
            var est = parseInt($(this).css('margin-left'));
            var page = Math.floor(-(est / par));

            var spl = ($(this).prop('id')).split("nbaph_");

            swiping_video(page, spl[1], 'right', <?php echo $total; ?>);
         });
      },
      //Default is 75px, set to 0 for demo so any distance triggers swipe
      threshold:0
   });

   //$.ajaxSetup({ cache: false });

   //$("#featured > ul").tabs({fx:{opacity: "toggle"}}).tabs("rotate", 5000, true);

   function nextCal(data) {

      nmonth = cmonth + 1;
      nyear = cyear;
      if (nmonth > 12) {
         nyear = cyear + 1;
         nmonth = 1;
      }

      $.get("get_calendar.php", { month: nmonth, year: nyear },
         function(data){
            $('div#calendarContainer_standard').html(data);
            $('div#calendarContainer_mid').html(data);
            $('div#calendarContainer_mobile').html(data);
            $('img.calendarNext').on('click', nextCal);
            $('img.calendarPrev').on('click', prevCal);
            cmonth = nmonth;
            cyear = nyear;
         });

   }

   function prevCal(data) {

      pmonth = cmonth - 1;
      pyear = cyear;
      if (pmonth < 1) {
         pyear = cyear - 1;
         pmonth = 12;
      }

      $.get("get_calendar.php", { month: pmonth, year: pyear },
         function(data){

            $('div#calendarContainer_standard').html(data);
            $('div#calendarContainer_mid').html(data);
            $('div#calendarContainer_mobile').html(data);
            $('img.calendarPrev').on('click', prevCal);
            $('img.calendarNext').on('click', nextCal);
            cmonth = pmonth;
            cyear = pyear;
         });

   }

   $('.linked-day').on('click', function(){

      var day = $(this).attr('day');
      var month = $(this).attr('month');
      var year = $(this).attr('year');

      linkCal(month, day, year);

   });

   //prevCal, newxCal on ajax.js
   $("img.calendarNext").on('click', nextCal);
   $("img.calendarPrev").on('click', prevCal);
});

//LINK DAYS
linkCal=function(lmonth, lday, lyear) {

    //organize the data properly
   var data = 'action=link_calendar' + '&rand=' + Math.random() + '&month=' + lmonth  + '&year=' + lyear + '&day=' + lday

    //show the loading sign
   $('.calendar-events-placeholder').css({ opacity: 0.5 });

   //start the ajax
   $.ajax({
      //this is the php file that processes the data and send mail
      url: "get_calendar.php",

      //GET method is used
      type: "POST",

      //pass the data
      data: data,

      //Do not cache the page
      cache: false,

      //success
      success: function (html) {

         var result = html;

         $('.calendar-events-placeholder').css({ opacity: 1.0 });

         if(result)
         {

            $('.calendar-events-placeholder').html(result);

         }

      }//end success

   });//end ajax

   //cancel the submit button default behaviours
   return false;

}
-->
</script>
</body>
</html>
<?php
$connect->close();
?>