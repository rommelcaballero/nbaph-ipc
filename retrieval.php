<?php
include('sql.php');

if ($_POST['nba_usernamer']) {
   $results = mysql_query("select * from users where Email = '" . mysql_real_escape_string($_POST['nba_usernamer']) . "'");

   if (mysql_num_rows($results) > 0) {
	  
	  $row = mysql_fetch_object($results);
	  
	  $message = "Username: ".$row->Email."\n "."Password: ".$row->Password;
	  
	  if(mail($row-Email,"NBA Account", $message, "From: NBA Philippines\n"))
	   {
		 	echo "Password sent.";  
	   }
	  else
	   {
		   echo "Password not sent. Please comeback later. ";
	   }
	  
      
   }
   else {
      echo "Email not found.";
   }
   
   
}
else {
   echo "Field left blank.";
}

mysql_close($connect);
?>    