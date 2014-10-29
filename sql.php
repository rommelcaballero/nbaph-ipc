<?php
session_start();

//$sql_db = "db48516_healthyme";
$sql_db = "db48516_nba";

$sql_server = "nbadb.cgvo8mpef8im.ap-southeast-1.rds.amazonaws.com";
$sql_root = "nbaawsuser";
$sql_pwd = "p@ssw0rd_123";

$connect = mysqli_connect($sql_server, $sql_root, $sql_pwd, $sql_db);

if (!$connect) {
   die('Connect error: ' . mysqli_connect_error());
}


//$sql_server = "localhost";
//$sql_root = "root";
//$sql_pwd = "root";


//$sql_db = "nba";
//$sql_server = "localhost";
//$sql_root = "root";
//$sql_pwd = "password";	

//header('Content-type: text/html; charset=utf-8');

//$connect = mysqli_connect($sql_server, $sql_root, $sql_pwd, $sql_db);

//if (!$connect) {
//   die('Connect error: ' . mysqli_connect_error());
//}
?>
