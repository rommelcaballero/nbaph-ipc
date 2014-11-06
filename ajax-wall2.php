<?php
//include('sqli.php');
$wall_id = $wall_videos[0]['id'];
$qstr = "Update wall_videos set impression_count = impression_count+1 where id = '$wall_id'";							
mysqli_query($connect, $qstr);
?>

