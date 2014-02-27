<?php
include('sql.php');
$xml = simplexml_load_file("http://www.nba.com/rss/nba_rss.xml");

echo $xml->getName() . "<br />";

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

for ($i = 0; $i < count($xml->channel->item); $i += 1) {
   $hold = $xml->channel->item[$i];

   $ex = explode(" ", $hold->pubDate);

   $date = $ex[3] . "-" . $months[$ex[2]] . "-" . $ex[1] . " " . $ex[4];

   $q = "insert into news (Title, Body, Link, DatePosted, Source) values ('" . mysql_real_escape_string(str_replace("\t", "", $hold->title)) . "', '" . mysql_real_escape_string($hold->description) . "', '" . mysql_real_escape_string($hold->link) . "', '$date', 'US')";
   mysql_query($q);
}

mysql_close($connect);
?> 