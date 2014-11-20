<?php
$sql_db = "db48516_nba";
	$sql_server = "nbadb.cgvo8mpef8im.ap-southeast-1.rds.amazonaws.com";
	$sql_root = "nbaawsuser";
	$sql_pwd = "p@ssw0rd_123";	


$connect = mysqli_connect($sql_server, $sql_root, $sql_pwd, $sql_db);
if(!$connect){
 die('Connect Error: ' . mysqli_connect_error());
}

$query = "select jwkey, title from new_videos where jwkey!=''";
$result = mysqli_query($query);
while ($row=mysqli_fetch_array){
echo '
$row['jwkey']<br>
';
}

?>