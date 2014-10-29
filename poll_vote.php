<?php
include('sql.php');

$connect->query("insert into pollvote (PollID, UserID, Selection, DateVoted) values ('" . $connect->real_escape_string($_POST['id']) . "', '0', '" . intval($_POST['poll']) . "', NOW())");

$results = $connect->query("select * from pollvote where PollID = '" . $connect->real_escape_string($_POST['id']) . "'");

$total = $results->num_rows;

$choices = array();

while($row = $results->fetch_array()) {
   if (!isset($choices['choice' . $row['Selection']])) {
      $choices['choice' . $row['Selection']] = 0;
   }

   $choices['choice' . $row['Selection']] += 1;
}

$results = $connect->query("select * from pollquestions where PollID = '" . $connect->real_escape_string($_POST['id']) . "'");

$count = 1;
?>
      <table>
<?php
while($row = $results->fetch_array()) {
?>
         <tr>
            <td style="padding-right: 5px; vertical-align: top">
               <?php echo stripslashes($row['Choice']); ?>
            </td>
            <td style="width: 40%; vertical-align: top">
               <div style="background: #69c; margin: 3px 0; width: <?php echo number_format(($choices['choice' . $count] / $total) * 100, 0); ?>%; height: 5px"></div>
               <?php echo number_format(($choices['choice' . $count] / $total) * 100, 0) . "%"; ?>
            </td>
         </tr>
<?php
   $count += 1;
}
?>
      </table>
<?php
$connect->close();
?>