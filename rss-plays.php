<?php
include('sql.php');
$xml = simplexml_load_file("http://www.nba.com/playoftheday/rss.xml");

echo $xml->getName() . "<br />";

for ($i = 0; $i < count($xml->channel->item); $i += 1) {
   $hold = $xml->channel->item[$i];

   $ex = explode(" ", $hold->pubDate);

   $months = array(
   "Jan" => "01",
   "Feb" => "02",
   "Mar" => "03",
   "Apr" => "04",
   "May" => "05",
   "Jun" => "06",
   "Jul" => "07",
   "Aug" => "08",
   "Sep" => "09",
   "Oct" => "10",
   "Nov" => "11",
   "Dec" => "12"
   );

   $date = $ex[3] . "-" . $months[$ex[2]] . "-" . $ex[1] . "<br>\n";

   $q = "insert into videos (Title, Intro, Link, DatePosted, Section) values ('" . mysql_real_escape_string($hold->title) . "', '" . mysql_real_escape_string($hold->description) . "', '" . mysql_real_escape_string($hold->link) . "', '$date', 'Top Plays')";
   mysql_query($q);
}

mysql_close($connect);
?> 