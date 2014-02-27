<?php
include('sql.php');

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

$xml = simplexml_load_file("http://www.nba.com/rss/david_aldridge.rss");

echo $xml->getName() . "<br />";

for ($i = 0; $i < count($xml->channel->item); $i += 1) {
   $hold = $xml->channel->item[$i];

   $ex = explode(" ", $hold->pubDate);

   $date = $ex[3] . "-" . $months[$ex[2]] . "-" . $ex[1] . "<br>\n";

   $q = "insert into personalities (Blogger, BlogTitle, BlogExcerpt, BlogLink, BlogAffiliation, DatePosted) values ('David Aldridge', '" . mysql_real_escape_string($hold->title) . "', '" . mysql_real_escape_string($hold->description) . "', '" . mysql_real_escape_string($hold->link) . "', 'TNT Analyst', '$date')";
   mysql_query($q);
}

$xml = simplexml_load_file("http://www.nba.com/rss/steve_aschburner.rss");

echo $xml->getName() . "<br />";

for ($i = 0; $i < count($xml->channel->item); $i += 1) {
   $hold = $xml->channel->item[$i];

   $ex = explode(" ", $hold->pubDate);

   $date = $ex[3] . "-" . $months[$ex[2]] . "-" . $ex[1] . "<br>\n";

   $q = "insert into personalities (Blogger, BlogTitle, BlogExcerpt, BlogLink, BlogAffiliation, DatePosted) values ('Steve Aschburner', '" . mysql_real_escape_string($hold->title) . "', '" . mysql_real_escape_string($hold->description) . "', '" . mysql_real_escape_string($hold->link) . "', 'NBA.com', '$date')";
   mysql_query($q);
}

$xml = simplexml_load_file("http://www.nba.com/rss/fran_blinebury.rss");

echo $xml->getName() . "<br />";

for ($i = 0; $i < count($xml->channel->item); $i += 1) {
   $hold = $xml->channel->item[$i];

   $ex = explode(" ", $hold->pubDate);

   $date = $ex[3] . "-" . $months[$ex[2]] . "-" . $ex[1] . "<br>\n";

   $q = "insert into personalities (Blogger, BlogTitle, BlogExcerpt, BlogLink, BlogAffiliation, DatePosted) values ('Fran Blinebury', '" . mysql_real_escape_string($hold->title) . "', '" . mysql_real_escape_string($hold->description) . "', '" . mysql_real_escape_string($hold->link) . "', 'NBA.com', '$date')";
   mysql_query($q);
}

$xml = simplexml_load_file("http://www.nba.com/rss/scott_howard_cooper.rss");

echo $xml->getName() . "<br />";

for ($i = 0; $i < count($xml->channel->item); $i += 1) {
   $hold = $xml->channel->item[$i];

   $ex = explode(" ", $hold->pubDate);

   $date = $ex[3] . "-" . $months[$ex[2]] . "-" . $ex[1] . "<br>\n";

   $q = "insert into personalities (Blogger, BlogTitle, BlogExcerpt, BlogLink, BlogAffiliation, DatePosted) values ('Scott Howard Cooper', '" . mysql_real_escape_string($hold->title) . "', '" . mysql_real_escape_string($hold->description) . "', '" . mysql_real_escape_string($hold->link) . "', 'NBA.com', '$date')";
   mysql_query($q);
}

$xml = simplexml_load_file("http://www.nba.com/rss/shaun_powell.rss");

echo $xml->getName() . "<br />";

for ($i = 0; $i < count($xml->channel->item); $i += 1) {
   $hold = $xml->channel->item[$i];

   $ex = explode(" ", $hold->pubDate);

   $date = $ex[3] . "-" . $months[$ex[2]] . "-" . $ex[1] . "<br>\n";

   $q = "insert into personalities (Blogger, BlogTitle, BlogExcerpt, BlogLink, BlogAffiliation, DatePosted) values ('Shaun Powell', '" . mysql_real_escape_string($hold->title) . "', '" . mysql_real_escape_string($hold->description) . "', '" . mysql_real_escape_string($hold->link) . "', 'NBA.com', '$date')";
   mysql_query($q);
}

$xml = simplexml_load_file("http://www.nba.com/rss/john_schuhmann.rss");

echo $xml->getName() . "<br />";

for ($i = 0; $i < count($xml->channel->item); $i += 1) {
   $hold = $xml->channel->item[$i];

   $ex = explode(" ", $hold->pubDate);

   $date = $ex[3] . "-" . $months[$ex[2]] . "-" . $ex[1] . "<br>\n";

   $q = "insert into personalities (Blogger, BlogTitle, BlogExcerpt, BlogLink, BlogAffiliation, DatePosted) values ('John Schuhmann', '" . mysql_real_escape_string($hold->title) . "', '" . mysql_real_escape_string($hold->description) . "', '" . mysql_real_escape_string($hold->link) . "', 'NBA.com', '$date')";
   mysql_query($q);
}

mysql_close($connect);
?> 