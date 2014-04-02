<?php

include('sqli.php');
include "functions_calendar.php";

$m = $_REQUEST['month'];
$y = $_REQUEST['year'];
$d = $_REQUEST['day'];

$action = trim($_REQUEST['action']);

if($action == "link_calendar")
 {
	$html_calendar = link_calendar($m,$y,$d,$connect); 
 }
else
 {
	$html_calendar = query_calendar($m,$y,'',$connect);
 }

 echo $html_calendar;
mysqli_close($connect);
?>
