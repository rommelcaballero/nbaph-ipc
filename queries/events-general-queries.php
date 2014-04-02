<?php
include("functions_calendar.php");

$calendar = query_calendar(NULL,NULL,NULL, $connect);

$results = mysqli_query($connect, "select * from ads where Dimensions = '300x100' order by RAND() limit 0, 1");
$row = mysqli_fetch_array($results);

$ad = array("Link" => $row['Link'], "Image" => $row['Image']);

$results = mysqli_query($connect, "select * from ad_block");
$row = mysqli_fetch_array($results);
$adblock = $row['Text'];

$query_oa = "SELECT EventID, Title FROM events WHERE EventID<>'".mysqli_real_escape_string($connect, $current_eventid)."' ORDER by DatePosted DESC, EventID DESC LIMIT 0, 20";
$result_oa = mysqli_query($connect, $query_oa) or die(mysqli_error());
$found_oa = mysqli_num_rows($result_oa);

$more_array = array();
$count = 0;

while($row = mysqli_fetch_array($result_oa)) {
   $more_array[$count]['EventID'] = $row['EventID'];
   $more_array[$count]['Title'] = $row['Title'];
   $count += 1;
}

mysqli_close($connect);
?>