<?php
include('sqli.php');

//setcookie("pollvoter", "Y", time()+3600);  
$_SESSION['pollvoter'] = "Y";

mysqli_query($connect, "insert into pollvote (PollID, UserID, Selection, DateVoted) values ('" . mysqli_real_escape_string($connect, $_POST['pollid']) . "', '" . mysqli_real_escape_string($connect, $_SESSION['userid']) . "', '" . mysqli_real_escape_string($connect, $_POST['poll']) . "', NOW())");
mysqli_query($connect, "update pollquestions set Answers = (Answers + 1) where PollID = '" . mysqli_real_escape_string($connect, $_POST['pollid']) . "' and Selection = '" . mysqli_real_escape_string($connect, $_POST['poll']) . "'");
?>
                     <table cellspacing="0" style="width: 100%; height: 175px">
                        <tr>
<?php
$q = "select * from polls where PollID = '" . mysqli_real_escape_string($connect, $_POST['pollid']) . "'";
$results = mysqli_query($connect, $q);
$poll = mysqli_fetch_array($results);

if ($poll['Image']) {
?>
                           <td rowspan="2" style="width: 105px">
                              <img src="<?php echo $poll['Image']; ?>">
                           </td>
<?php
}
?>
                           <td>
                              <?php echo stripslashes($poll['Question']); ?>

                              <div style="padding: 5px 0"><table border="0" cellspacing="2" cellpadding="0">
<?php
$results = mysqli_query($connect, "select * from pollquestions where PollID = '" . $poll['PollID'] . "'");
 $totalquery = mysqli_query($connect, "select SUM(Answers) as Ans from pollquestions where PollID = '" . $poll['PollID'] . "' GROUP BY PollID");
 $totes = mysqli_fetch_array($totalquery);
	$total = $totes['Ans'];

$count = 0;

while($row = mysqli_fetch_array($results)) {
$percentage = round((($row['Answers']/$total) * 100) * 1.5);
	if ($percentage < 1) { $percentage = 1; }	
?>
               <tr>
                  <td valign="top">
                     <div class="poll_choice"><?php echo $row['Choice'] . "<!-- - " . $row['Answers']; ?>--></div>
                  </td>
                  <td valign="top">
                      <div style="width: 85px">
                        <div style="float: left; margin-left: 5px; background-color:#6699cc; height:10px; width:<?php echo $percentage; ?>%; overflow: hidden"></div>
                        <div style="float: left; margin-left: 3px; color: #666" class="poll_numbers"><?php echo round(($row['Answers']/$total) * 100); ?>%</div>
                        <div class="clear"></div>
                     </div>
                </td>
					</tr>
<?php
}
?>
                             </table> </div>
                           </td>
                        </tr>
                             <tr>
                              <td style="height: 20px"></td>
                            </tr>
                     </table>
<?php
mysqli_close($connect);
?>