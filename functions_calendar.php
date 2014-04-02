<?php
# PHP Calendar (version 2.3), written by Keith Devens
# http://keithdevens.com/software/php_calendar
#  see example at http://keithdevens.com/weblog
# License: http://keithdevens.com/software/license

function link_calendar($month,$year,$lday,$connect) {

   $date_cal = date("Y-m-d",strtotime($year.'-'.$month.'-'.$lday));

   $this_month = strftime("%B", strtotime("$month/1/2011"));

   //$sql = "SELECT DATE_FORMAT(StartDate, '%e') AS StartDate, DATE_FORMAT(EndDate, '%e') AS EndDate, DATEDIFF(EndDate,StartDate) AS CountDay, Event, Section, ArticleID FROM calendar WHERE $date_cal BETWEEN StartDate AND EndDate ORDER BY StartDate ASC";
   $sql = "SELECT DATE_FORMAT(StartDate, '%d') AS StartDate, DATE_FORMAT(EndDate, '%d') AS EndDate, DATEDIFF(EndDate,StartDate) AS CountDay, Event, Section, ArticleID FROM calendar WHERE ('$date_cal'>=StartDate) AND '$date_cal'<=EndDate ORDER BY StartDate ASC ";

   $result = mysqli_query($connect, $sql) or die(mysqli_error());
   $found_link = mysqli_num_rows($result);

   if($found_link > 0){

      while($row = mysqli_fetch_array($result)){
         $this_day = intval($row['StartDate']);
         $this_end = intval($row['EndDate']);
         $this_event = $row['Event'];
         $this_section = $row['Section'];
         $this_id = $row['ArticleID'];
         $seo_title = seoUrl($this_event);
         $count_day = $row['CountDay'];

         $date_events = $this_day;

            if (($this_section) && ($this_id)) {
               $item_event = "<a href=\"local-events/$this_id/$seo_title\">$this_event</a>";
            } else {
               $item_event = $this_event;
            }

         //highlights the event day
         for($i=$count_day; $i>=0; $i--)
          {

            if (!$days[$date_events]) {
               $days[$date_events] = array(NULL,'linked-day');
            }

            $date_events++;

         }

         if($count_day > 0)
          {

            $date_display = $this_day.' - '.$this_end;

          }
         else
          {

            $date_display = $this_day;

          }

         $event_list .= "<li style=\"list-style:none; font-size: 9pt; font-weight: normal;  \"> $date_display - <span class=\"blue\" >$item_event</span> </li>\n";

      }//end while

   }

$html_calendar .= <<<EOF

      <div style="padding: 10px; " >

         <div class="month_events" >$this_month $lday, $year Events</div>

         <div id="EventContent" style="height: auto !important; min-height: 80px; height: 80px; border: 0px; " >
            <strong><ul style="margin:0px; padding: 5px; border: 0px; list-style-type:none;  ">

               $event_list

            </ul></strong>
         </div>

      </div>

EOF;

return $html_calendar;

}

function query_calendar($month,$year,$lday, $connect) {

$days = array();
$time = time();

if ((($month == date('n',$time)) && ($year == date('Y',$time))) || ((!$month) || (!$year))){
   $today = date('j',$time);
   $days[$today] = array(NULL,'today');
   $month = date('n', $time);
   $year = date('Y', $time);

} else {
   $time = mktime(0, 0, 0, $month, 1, $year);
   $today = "";
}

$sql="SELECT DATE_FORMAT(StartDate, '%d') AS StartDate, DATE_FORMAT(EndDate, '%d') AS EndDate, DATEDIFF(EndDate,StartDate) AS CountDay, Event, Section, ArticleID FROM calendar WHERE (DATE_FORMAT(StartDate, '%c %Y') = '$month $year') ORDER BY StartDate ASC";

      $result = mysqli_query($connect, $sql) or die(mysqli_error());
      if(mysqli_num_rows($result)!=0){

         while($row = mysqli_fetch_array($result)){
            $this_day = intval($row['StartDate']);
            $this_end = intval($row['EndDate']);
            $this_event = $row['Event'];
            $this_section = $row['Section'];
             $this_id = $row['ArticleID'];
            $seo_title = seoUrl($this_event);
            $count_day = $row['CountDay'];

            $date_events = $this_day;

               if (($this_section) && ($this_id)) {
                  $item_event = "<a href=\"local-events/$this_id/$seo_title\">$this_event</a>";
               } else {
                  $item_event = $this_event;
               }

            //highlights the event day
            for($i=$count_day; $i>=0; $i--)
             {

               if (!$days[$date_events]) {
                  $days[$date_events] = array(NULL,'linked-day');
               }

               $date_events++;

            }

            if($count_day > 0)
             {

                $date_display = $this_day.' - '.$this_end;

             }
            else
             {

               $date_display = $this_day;

             }

            $event_list .= "<li style=\"list-style:none; font-size: 9pt; font-weight: normal;  \"> $date_display - <span class=\"blue\" >$item_event</span> </li>\n";

         }

      }

$pn = array('<img src="images/calendar_prev.gif" class="calendarPrev" border="0" style="margin: 3px 0px 3px 0px;">'=>NULL, '<img src="images/calendar_next.gif" border="0" style="margin: 3px 20px 3px 0px;" class="calendarNext">'=>NULL);

$monthly_calendar = generate_calendar(date('Y', $time), date('n', $time), $days, 3, NULL, 0, $pn);

$this_month = strftime("%B", strtotime("$month/1/2011"));

$html_calendar .= <<<EOF

    <center>

    <div id="calendar" >$monthly_calendar</div>

    <!--calendar events-->
    <div class="calendar-events-placeholder" >

      <div style="padding: 10px; " >

         <div class="month_events" >$this_month $year Events</div>

         <div style="height: auto !important; min-height: 80px; height: 80px; " >
            <strong><ul style="margin:0px; padding: 5px;  ">

               $event_list

            </ul></strong>
         </div>

      </div>

    </div>
   </center>

EOF;

return $html_calendar;

}

function generate_calendar($year, $month, $days = array(), $day_name_length = 3, $month_href = NULL, $first_day = 0, $pn = array()){
   $first_of_month = gmmktime(0,0,0,$month,1,$year);
   #remember that mktime will automatically correct if invalid dates are entered
   # for instance, mktime(0,0,0,12,32,1997) will be the date for Jan 1, 1998
   # this provides a built in "rounding" feature to generate_calendar()

   $day_names = array(); #generate all the day names according to the current locale
   for($n=0,$t=(3+$first_day)*86400; $n<7; $n++,$t+=86400) #January 4, 1970 was a Sunday
      $day_names[$n] = ucfirst(gmstrftime('%A',$t)); #%A means full textual day name

   list($month, $year, $month_name, $weekday) = explode(',',gmstrftime('%m,%Y,%B,%w',$first_of_month));
   $weekday = ($weekday + 7 - $first_day) % 7; #adjust for $first_day
   $title   = htmlentities(ucfirst($month_name)).'&nbsp;'.$year;  #note that some locales don't capitalize month and day names

   #Begin calendar. Uses a real <caption>. See http://diveintomark.org/archives/2002/07/03
   @list($p, $pl) = each($pn); @list($n, $nl) = each($pn); #previous and next links, if applicable
   if($p) $p = '<div class="calendar-prev" style="width: 50px; float:left">'.($pl ? '<a href="'.htmlspecialchars($pl).'">'.$p.'</a>' : $p).'</div>';
   if($n) $n = '<div class="calendar-next" style="width: 50px; text-align: right; float:right">'.($nl ? '<a href="'.htmlspecialchars($nl).'">'.$n.'</a>' : $n).'</div>';
   $calendar = ''."\n".
      '<div class="calendar-month" >'.$p.'<div style="width: 160px; text-align: center; float:left; " id="MonthName" >'.($month_href ? '<a href="'.htmlspecialchars($month_href).'">'.$title.'</a>' : $title).'</div>'.$n."<div style=\"clear: both;\" ></div></div>
      <div id='DateList'><table class=\"calendar\" cellspacing=\"0\">\n<tr class='cal_days' >";

   if($day_name_length){ #if the day names should be shown ($day_name_length > 0)
      #if day_name_length is >3, the full name of the day will be printed
      foreach($day_names as $d)
         $calendar .= '<th abbr="'.htmlentities($d).'">'.htmlentities($day_name_length < 4 ? substr($d,0,$day_name_length) : $d).'</th>';
      $calendar .= "</tr>\n<tr>";
   }

   if($weekday > 0) $calendar .= '<td colspan="'.$weekday.'">&nbsp;</td>'; #initial 'empty' days

   for($day=1,$days_in_month=gmdate('t',$first_of_month); $day<=$days_in_month; $day++,$weekday++){

      if($weekday == 7){
         $weekday   = 0; #start a new week
         $calendar .= "</tr>\n<tr>";
      }

      if(isset($days[$day]) and is_array($days[$day])){
         @list($link, $classes, $content) = $days[$day];
         if(is_null($content))  $content  = $day;
         $calendar .= '<td'.($classes ? ' class="'.htmlspecialchars($classes).'" day='.$day.' month='.$month.' year='.$year.' ><span>' : '>').
            ($link ? '<a href="'.htmlspecialchars($link).'">'.$content.'</a>' : $content).'</td>';
      }
      else $calendar .= "<td><span>$day</span></td>";
   }
   if($weekday != 7) $calendar .= '<td colspan="'.(7-$weekday).'">&nbsp;</td>'; #remaining "empty" days

   return $calendar."</tr>\n</table></div>\n";
}
?>

