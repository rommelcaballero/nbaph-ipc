<?php
if(!isset($_SESSION)){
        session_start();
}


$domain = str_replace("https://", "", $_SERVER['SERVER_NAME']);
$domain = str_replace("http://", "", $domain);

$path = trim(dirname($_SERVER['PHP_SELF']),'/');

if($path != ""){ $path = $path.'/'; }

$base = "http://".$domain."/".$path; //for live

//$base = "http://$domain/";
$base = "/";

	$sql_db = "db48516_nba";
	$sql_server = "nbadb.cgvo8mpef8im.ap-southeast-1.rds.amazonaws.com";
	$sql_root = "nbaawsuser";
	$sql_pwd = "p@ssw0rd_123";	


$connect = mysqli_connect($sql_server, $sql_root, $sql_pwd, $sql_db);
if(!$connect){
 die('Connect Error: ' . mysqli_connect_error());
}

function seoUrl($string) {
        //Unwanted:  {UPPERCASE} ; / ? : @ & = + $ , . ! ~ * ' ( )
        $string = strtolower($string);
        //Strip any unwanted characters
        $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
        //Clean multiple dashes or whitespaces
        $string = preg_replace("/[\s-]+/", " ", $string);
        //Convert whitespaces and underscore to dash
        $string = preg_replace("/[\s_]/", "-", $string);
        return $string;
}


?>


