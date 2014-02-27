
<!-- CALENDAR -->
<div class="events_subsection" style="width: 300px; background: #59585d; ">

   <div class="events_subsection_header" style="width: 300px; " >

       <div class="tab_wtitle" >Events Calendar</div>

   </div>

   <div id="calendarContainer" >

       <center>
        <?php echo $calendar; ?>
       </center>

   </div>

</div>

<script type="text/javascript">

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
                   $('div#calendarContainer').html(data);
                  //$('img.calendarNext').bind('click', nextCal);
                  //$('img.calendarPrev').bind('click', prevCal);
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

                  $('div#calendarContainer').html(data);
                  //$('img.calendarPrev').bind('click', prevCal);
                  //$('img.calendarNext').bind('click', nextCal);
                  cmonth = pmonth;
                  cyear = pyear;
               });

         }

         $('.linked-day').live('click', function(){

            var day = $(this).attr('day');
            var month = $(this).attr('month');
            var year = $(this).attr('year');

            linkCal(month, day, year);

         });

         //prevCal, newxCal on ajax.js
         $("img.calendarNext").live('click', nextCal);
         $("img.calendarPrev").live('click', prevCal);

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

   </script>
 <!-- END CALENDAR -->

<div style="height: 10px"></div>

<!-- GUESTBOOK -->
<!--div class="events_subsection" >

   <div class="events_subsection_top"></div>

   <div class="events_subsection_bottom"></div>

   <div class="events_subsection_header" style="width: 300px; " >

       <div class="tab_wtitle" >Guestbook</div>

   </div>

   <div style="width: 300px; text-align: center; padding: 3px 0px 5px 0px; " >
      <textarea id="guestbook" style="width: 280px; height: 100px; border: 1px solid #c9c9c9">Write your comment here</textarea>
   </div>

   <div id="guestbook_messages">
<?php
//$results = mysql_query("select * from guestbook left join users using (UserID) order by DatePosted desc limit 0, 4");

/*while($row = mysql_fetch_array($results)) {
$ex = explode(" ", $row['DatePosted']);
$date = explode("-", $ex[0]);
$time = explode(":", $ex[1]);*/
?>
      <table style="width: 100%">
         <tr>
            <td style="color: #000; font-size: 15px">
               <b><?php echo stripslashes($row['FirstName'] . " " . $row['LastName']); ?></b>
            </td>
            <td style="text-align: right">
               <b><?php echo date("g:ma F j, Y", mktime($time[0], $time[1], $time[2], $date[1], $date[2], $date[0])); ?></b>
            </td>
         </tr>
         <tr>
            <td colspan="2" style="color: #999"><?php echo stripslashes(str_replace("\n", "<br>", $row['Message'])); ?></td>
         </tr>
      </table>
<?php
//}
?>
   </div>

</div-->
<!-- GUESTBOOK -->

<div style="height: 20px; "></div>

<?php
if ($ad['Link']) {
?>
            <div style="width: 300px; height: 100px">
               <a href="<?php echo $ad['Link']; ?>"><img src="ads/<?php echo $ad['Image']; ?>"></a>
            </div>
<?php
}
?>

<div style="height: 20px; "></div>

<!-- html ads -->
<?php include("html-ads.php"); ?>
<!-- end html ads -->

<div style="height: 20px; "></div>

<!-- more articles -->
<?php
if($found_oa > 0) {
?>

<div class="events_subsection" >

   <div class="events_subsection_top" style="top: 31px; left: 0px; " ></div>

   <div class="events_subsection_bottom"></div>

   <div class="events_subsection_header" style="width: 300px; " >

       <div class="tab_wtitle" >Other Articles</div>

   </div>

   <div style="height: auto !important; min-height: 200px; height: 200px; " >

       <div style="margin: 0px; padding: 10px; font-size: 9pt; " >

        <?php
        for ($count = 0; $count < count($more_array); $count += 1)
         {

        ?>

        <div class="blue" style="padding-bottom: 3px" ><a href="local-events/<?php echo $more_array[$count]['EventID']; ?>/<?php echo seoUrl(trim(stripslashes($more_array[$count]['Title']))); ?>" ><?php echo trim(stripslashes($more_array[$count]['Title'])); ?></a></div>

        <?php
         }//end while
        ?>

       </div>

   </div>

</div>
<?php
}//end if $found_oa
?>
<!-- more articles -->
