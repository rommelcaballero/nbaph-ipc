<?php
session_start();

$sql_db = "db48516_healthyme";
/*
$sql_server = "localhost";
$sql_root = "root";
$sql_pwd = "root";
/*/

$sql_server = "internal-db.s48516.gridserver.com";
$sql_root = "db48516_thespa";
$sql_pwd = "MassageAdmin101";

header('Content-type: text/html; charset=utf-8');

$connect = new mysqli($sql_server, $sql_root, $sql_pwd, $sql_db);

if (!$connect) {
   die('Connect error: ' . mysql_error());
}
?>