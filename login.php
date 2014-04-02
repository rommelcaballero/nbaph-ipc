<?php
include('sql.php');

if ($_POST['nba_username'] && $_POST['nba_password']) {
   $results = mysql_query("select * from users where Email = '" . mysql_real_escape_string($_POST['nba_username']) . "' and Password = '" . md5($_POST['nba_password']) . "'");

   if (mysql_num_rows($results) == 1) {
      mysql_query("update users set SessionID = '" . session_id() . "' where Email = '" . mysql_real_escape_string($_POST['nba_username']) . "'");
      $row = mysql_fetch_array($results);
      $_SESSION['username'] = $row['FirstName'] . " " . $row['LastName'];
      $_SESSION['userid'] = $row['UserID'];
      $_SESSION['email'] = $row['Email'];

      if (isset($_POST['remember'])) {
         setcookie("nba_username", $_SESSION['username'], time()+60*60*24*30);
         setcookie("nba_email", $_SESSION['email'], time()+60*60*24*30);
         setcookie("nba_session", session_id(), time()+60*60*24*30);
      }

      echo "success";
   }
   else {
      echo "Invalid username/password.";
   }
}
else {
   echo "Field(s) left blank.";
}

mysql_close($connect);
?>