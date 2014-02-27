<?php
include('sql.php');

$results = mysql_query("select * from videos");

while($row = mysql_fetch_array($results)) {
   $ex = explode("/", $row['Link']);

   $pic = $ex[count($ex) - 2] . ".136x96.jpg";
   $url = "http://i2.cdn.turner.com/nba/nba";

   for ($i = 3; $i < count($ex) - 2; $i += 1) {
      $url .= "/" . $ex[$i];
   }

   $url .= "/$pic";

   mysql_query("update videos set Thumbnail = '$url' where Link = '" . $row['Link'] . "'");
}

mysql_close($connect);
?>