<?php
include('sql.php');

$q = "insert into guestbook (UserID, Message, DatePosted) values ('" . mysql_real_escape_string($_SESSION['userid']) . "', '" . mysql_real_escape_string($_POST['message']) . "', NOW())";
$results = mysql_query($q);

if ($results) {
?>
                  <table style="width: 100%">
                     <tr>
                        <td style="color: #000; font-size: 15px">
                           <b><?php echo stripslashes($_SESSION['username']); ?></b>
                        </td>
                        <td style="text-align: right">
                           <b><?php echo date("g:ma F j, Y"); ?></b>
                        </td>
                     </tr>
                     <tr>
                        <td colspan="2" style="color: #999"><?php echo stripslashes(str_replace("\n", "<br>", $_POST['message'])); ?></td>
                     </tr>
                  </table>
<?php
}

mysql_close($connect);
?>