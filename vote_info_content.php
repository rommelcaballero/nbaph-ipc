<?php
require('sqli.php');

$playerid=$_GET['id'];

$sql=mysqli_query($connect, "SELECT * FROM startingfive WHERE StartingfiveID='$playerid'") or die ("SELECT ERROR :".mysqli_error());
$info=mysqli_fetch_array($sql);

?>

<div style="width: 195px; height: 80px;">

		<div style="width: 80px; height: 80px;display: inline-block;">
		<?php
       $path = $info['Filename'];
		
		echo "<img src=\"$path\" alt=\"".$info['PlayerName']."\" width=\"80\" height=\"80\">";
		?>
		</div>
		<div style="width: 110px; height: 80px; display: inline-block;float: right; color: #2B75C2; font-size: 12px;">
			<?php echo $info['PlayerName'];?> <br />
			#<?php echo $info['PlayerNumber'];?><br />
			<?php echo $info['Position'];?>
		</div>
</div>
<div style="width: 195px; height: 125px;">
		<iframe src="<?php echo $info['Stats'];?>" align="center" frameborder="0" width="195" height="125" scrolling="no" marginwidth="0" marginheight="0" style="text-align:center; align: center; margin: 0; padding: 0; marginwidth:0">
		</iframe>
</div>