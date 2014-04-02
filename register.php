<?php
include('sql.php');

function check_email($email) {
   if(preg_match("/^[^\s()<>@,;:\"\/\[\]?=]+@\w[\w-]*(\.\w[\w-]*)*\.[a-z]{2,}$/i" , $email)){
      return true;
   }

   return false;
}

//$okay = '<input type="button" value="okay" onclick="retrieve_register()">';

if ($_POST['nbareg_firstname'] && $_POST['nbareg_initial'] && $_POST['nbareg_lastname'] && $_POST['nbareg_location'] && $_POST['nbareg_email'] && $_POST['nbareg_password'] && $_POST['nbareg_verify']) {
   if (check_email($_POST['nbareg_email'])) {
      if ($_POST['nbareg_password'] == $_POST['nbareg_verify']) {
		 
		 //check email 
		 $check_email = strtolower($_POST['nbareg_email']);
		 $check_query = "SELECT UserID FROM users WHERE Email='$check_email' ";
		 $check_result = mysql_query($check_query) or die(mysql_error());
		 $check_found = mysql_num_rows($check_result);
		 //end check email

       $faves = "";
       if ($_POST['nbareg_favorite'])
         $faves = implode(", ", $_POST['nbareg_favorite']);
		 
		 if($check_found <= 0)
		  {
			  
			 mysql_query("insert into users (SessionID, FirstName, Initial, LastName, Gender, Email, Password, Location, Favorites, Birthday) values ('" . session_id() . "', '" . mysql_real_escape_string($_POST['nbareg_firstname']) . "', '" . mysql_real_escape_string($_POST['nbareg_initial']) . "', '" . mysql_real_escape_string($_POST['nbareg_lastname']) . "', '" . mysql_real_escape_string($_POST['nbareg_gender']) . "', '" . mysql_real_escape_string($_POST['nbareg_email']) . "', '" . md5($_POST['nbareg_password']) . "', '" . mysql_real_escape_string($_POST['nbareg_location']) . "', '" . mysql_real_escape_string($faves) . "', '" . mysql_real_escape_string($_POST['nbareg_year'] . "-" . $_POST['nbareg_month'] . "-" . $_POST['nbareg_date']) . "')");
			 
			  $_SESSION['username'] = $_POST['nbareg_firstname'] . " " . $_POST['nbareg_lastname'];
			  $_SESSION['userid'] = mysql_insert_id();
			  $_SESSION['email'] = $_POST['nbareg_email'];
	  
			 echo "success";
		  }
		 else
		 {
			echo "Email address is already exists. ";
		 }
		 
      }
      else {
         echo "Passwords do not match. $okay";
      }
   }
   else {
      echo "Invalid email address. $okay";
   }
}
else {
   echo "Field(s) left blank. $okay";
}

mysql_close($connect);
?>