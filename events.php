<?php
include('sql.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
<title>NBA Philippines | Events</title>
<?php
include('head.php');
?>
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
$results = $connect->query("select * from events order by EventID desc limit 0, 1");

$row = $results->fetch_array();
?>
            <div id="nbaph_events_main">
               <a href="events-article.php?id=<?php echo $row['EventID']; ?>">
                  <img src="<?php echo $row['Image']; ?>" alt="<?php echo $row['Title']; ?>" />
               </a>
            </div>

            <div id="nbaph_events_main_title">
               <a href="events-article.php?id=<?php echo $row['EventID']; ?>"><?php echo $row['Title']; ?></a>
            </div>

            <div id="nbaph_events_main_caption">
               <?php echo $row['Intro']; ?> <a href="events-article.php?id=<?php echo $row['EventID']; ?>">Read full article.</a>
            </div>
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

      <div class="nbaph_article_title">
         VIDEOS
      </div>

      <div class="nbaph_article_content" style="height: 100%; overflow: hidden">
         <div id="nbaph_events_videos">
<?php
$results = $connect->query("select * from eventsvideos order by DatePosted desc limit 0, 3");

while($row = $results->fetch_array()) {
?>
            <table class="nbaph_events_video">
               <tr>
                  <td class="nbaph_events_video_thumb">
                     <img src="<?php echo $row['Image']; ?>" style="width: 100%" class="nbaph_hl" alt="highlights main" />
                  </td>
                  <td class="nbaph_events_video_details">
                     <div class="nbaph_events_video_title">
                        <a href="events-videos.php?video=<?php echo $row['VideoID']; ?>"><?php echo $row['Title']; ?></a>
                     </div>

                     <div class="nbaph_events_video_caption">
                        <?php echo $row['Caption']; ?>
                     </div>
                  </td>
               </tr>
            </table>

            <table class="nbaph_events_video_mobile">
               <tr>
                  <td class="nbaph_events_video_thumb">
                     <img src="<?php echo $row['Image']; ?>" style="width: 100%" class="nbaph_hl" alt="highlights main" />
                  </td>
               </tr>
               <tr>
                  <td class="nbaph_events_video_details">
                     <div class="nbaph_events_video_title">
                        <a href="#"><?php echo $row['Title']; ?></a>
                     </div>

                     <div class="nbaph_events_video_caption">
                        <?php echo $row['Caption']; ?>
                     </div>
                  </td>
               </tr>
            </table>
<?php
}
?>

            <div class="clear"></div>
         </div>

         <div class="nbaph_article_pages">
            <img src="imagesph/article_page_active.png" class="nbaph_entry_page" targ="events_videos" alt="page 1" entry="1" />
            <img src="imagesph/article_page_dormant.png" class="nbaph_entry_page" targ="events_videos" alt="page 2" entry="2" />
            <img src="imagesph/article_page_dormant.png" class="nbaph_entry_page" targ="events_videos" alt="page 3" entry="3" />
         </div>
      </div>

      <div class="nbaph_article_more_link">
         <a href="events-videos.php">More Videos</a>
      </div>

      <div class="clear" style="margin: 10px 0"></div>

      <div class="nbaph_standard_only">
         <div class="nbaph_article_title">
            PHOTOS
         </div>

         <div class="nbaph_article_content" style="height: 100%; overflow: hidden">
            <div id="nbaph_events_photos">
               <table class="nbaph_events_photo">
                  <tr>
<?php
$results = $connect->query("select * from eventsphotos order by PhotoID desc limit 0, 9");

while($row = $results->fetch_array()) {
?>
                  <td class="nbaph_events_photo_thumb">
                     <img src="<?php echo $row['ImageSecond']; ?>" style="width: 100%" alt="highlights main" />
                  </td>
<?php
}
?>
                  </tr>
               </table>

               <div class="clear"></div>
            </div>

            <div class="nbaph_article_pages">
               <img src="imagesph/article_page_active.png" class="nbaph_entry_page" targ="events_photos" alt="page 1" entry="1" />
               <img src="imagesph/article_page_dormant.png" class="nbaph_entry_page" targ="events_photos" alt="page 2" entry="2" />
               <img src="imagesph/article_page_dormant.png" class="nbaph_entry_page" targ="events_photos" alt="page 3" entry="3" />
            </div>
         </div>

         <div class="nbaph_article_more_link">
            <a href="events-photos.php">More Photos</a>
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
         <a href="#">More Articles</a>
      </div>
   </div>

   <div class="clear"></div>

   <div class="nbaph_article_wide_events nbaph_mid_only" style="width: 100%">
      <div class="nbaph_article_title">
         PHOTOS
      </div>

      <div class="nbaph_article_content" style="height: 100%; overflow: hidden">
         <div id="nbaph_events_photos_mid">
            <table class="nbaph_events_photo">
               <tr>
<?php
$results = $connect->query("select * from eventsphotos order by PhotoID desc limit 0, 9");

while($row = $results->fetch_array()) {
?>
               <td class="nbaph_events_photo_thumb">
                  <img src="<?php echo $row['ImageSecond']; ?>" style="width: 100%" alt="highlights main" />
               </td>
<?php
}
?>
               </tr>
            </table>

            <div class="clear"></div>
         </div>

         <div class="nbaph_article_pages">
            <img src="imagesph/article_page_active.png" class="nbaph_entry_page" targ="events_photos" alt="page 1" entry="1" />
            <img src="imagesph/article_page_dormant.png" class="nbaph_entry_page" targ="events_photos" alt="page 2" entry="2" />
            <img src="imagesph/article_page_dormant.png" class="nbaph_entry_page" targ="events_photos" alt="page 3" entry="3" />
         </div>
      </div>

      <div class="nbaph_article_more_link">
         <a href="#">More Photos</a>
      </div>
   </div>

   <div class="nbaph_article_wide_events nbaph_mobile_only" style="width: 100%">
      <div class="nbaph_article_title">
         PHOTOS
      </div>

      <div class="nbaph_article_content" style="height: 100%; overflow: hidden">
         <div id="nbaph_events_photos_mobile">
            <table class="nbaph_events_photo">
               <tr>
<?php
$results = $connect->query("select * from eventsphotos order by PhotoID desc limit 0, 3");

while($row = $results->fetch_array()) {
?>
               <td class="nbaph_events_photo_thumb">
                  <img src="<?php echo $row['ImageSecond']; ?>" style="width: 100%" alt="highlights main" />
               </td>
<?php
}
?>
               </tr>
            </table>

            <div class="clear"></div>
         </div>

         <div class="nbaph_article_pages">
            <img src="imagesph/article_page_active.png" class="nbaph_entry_page" targ="events_photos" alt="page 1" entry="1" />
            <img src="imagesph/article_page_dormant.png" class="nbaph_entry_page" targ="events_photos" alt="page 2" entry="2" />
            <img src="imagesph/article_page_dormant.png" class="nbaph_entry_page" targ="events_photos" alt="page 3" entry="3" />
         </div>
      </div>

      <div class="nbaph_article_more_link">
         <a href="#">More Photos</a>
      </div>
   </div>

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

<div style="padding: 10px; max-width: 993px; margin:0 auto">                            
   <div class="OUTBRAIN" data-src="http://ph.nba.com/news-article/3024/wolves-gm-optimistic-wont-rush-rubio-extension" data-widget-id="AR_1" data-ob-template="NBAPH" ></div>
   <div class="OUTBRAIN" data-src="http://ph.nba.com/news-article/3024/wolves-gm-optimistic-wont-rush-rubio-extension" data-widget-id="AR_2" data-ob-template="NBAPH" ></div>
   <script type="text/javascript" async="async" src="http://widgets.outbrain.com/outbrain.js"></script> 
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