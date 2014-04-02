<?php
include('sqli.php');

$query2 = "SELECT information_schema.TABLES.TABLE_NAME, information_schema.TABLES.UPDATE_TIME FROM information_schema.TABLES WHERE
         information_schema.TABLES.TABLE_SCHEMA LIKE '$sql_db' ORDER BY information_schema.TABLES.UPDATE_TIME DESC
          LIMIT 0,20 ";
$result2 = mysqli_query($connect, $query2) or die(mysqli_error());
while($row = mysqli_fetch_array($result2)) {

echo $row['TABLE_NAME'] .":" .$row['UPDATE_TIME'] ."<br>";

}




$query1 = "SELECT information_schema.TABLES.UPDATE_TIME FROM information_schema.TABLES WHERE
         information_schema.TABLES.TABLE_SCHEMA LIKE '$sql_db' ORDER BY information_schema.TABLES.UPDATE_TIME DESC
          LIMIT 0,1 ";
$result1 = mysqli_query($connect, $query1) or die(mysqli_error());
$qrow = mysqli_fetch_array($result1); 
$last_db = $qrow['UPDATE_TIME'];

$rep = array(" ", ":");
$per = array("-", "");

$last_file = str_replace($rep, $per, $last_db); 
$cachefile = 'index-cache-'.$last_file.'.html';

if ($handle = opendir('cache/')) {
   /* This is the correct way to loop over the directory. */
   while (false !== ($entry = readdir($handle))) {
   	if (($entry != '.') && ($entry != '..')) {
      $ex = explode("-cache-", $entry);
      if ($ex[1] != "$last_file.html") {
         echo "old index: $entry<br>";
         unlink("cache/" . "$entry");
      }
      }
   }

   closedir($handle);
}
?>