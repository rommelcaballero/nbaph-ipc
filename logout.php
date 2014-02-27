<?php
include('sql.php');

mysql_query("update users set SessionID = '' where Email = '" . mysql_real_escape_string($_SESSION['email']) . "'");
$_SESSION['username'] = "";
$_SESSION['userid'] = "";
$_SESSION['email'] = "";

if (isset($_COOKIE['nba_username'])) {
   setcookie("nba_username", "", 1);
   setcookie("nba_email", "", 1);
   setcookie("nba_session", "", 1);
} 

mysql_close($connect);

$back_url = $_SERVER['HTTP_REFERER'];
header('Location: ' .$back_url);
?>