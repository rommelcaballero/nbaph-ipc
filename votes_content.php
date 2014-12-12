<?php
require('sqli.php');
//require('admin/clean.php');

    function clean($connect, $str) {
       $str = @trim($str);
       if(get_magic_quotes_gpc()) {
              $str = stripslashes($str);
       }
       return mysqli_real_escape_string($connect, $str);
    }
$posid=$_GET['posid'];
$sfid=clean($connect, trim($_GET['sfid']));


switch($posid){
case '1': $posname="Center";
			break;
case '2': $posname="Power Forward";
			break;
case '3': $posname="Small Forward";
			break;
case '4': $posname="Shooting Guard";
			break;
case '5': $posname="Point Guard";
			break;
}



if($sfid=='undefined')
$firstsql="SELECT * FROM startingfive WHERE Position='$posname' ORDER BY Votes DESC LIMIT 0,1;";
else
$firstsql="SELECT * FROM startingfive WHERE StartingfiveID='$sfid' ORDER BY Votes DESC LIMIT 0,1;";

$first=mysqli_query($connect, $firstsql) or die ("FIRST : ".mysqli_error());
$firstinfo=mysqli_fetch_array($first);
$highctr=1;


$exclude_id=$firstinfo['StartingfiveID'];
?>

<div style="float: left; width: 270px; height: 100%;">
	
		<?php
		echo "<img src=\"" . $firstinfo['Filename'] . "\" alt=\"".$firstinfo['PlayerName']."\">";
		?>
</div>
<div style="float: left; width: 402px; height: 100%;">
	<div style="width: 150px; height: 130px; float: left; margin: 0px 15px; font-size: 14px;">
		<span style="color: #999; font-weight: bold;"><?php echo $posname;?></span><br>
		<span style="color: #F00; font-weight: bold; font-size: 16px;"><?php echo $firstinfo['Votes'];?> votes</span><br>
		<span style="color: #2b75c2; font-weight: bold; font-size: 16px;"><?php echo $firstinfo['PlayerName'];?></span><br>
		<span style="color: #2b75c2; font-weight: bold; font-size: 16px;">#<?php echo $firstinfo['PlayerNumber'];?></span><br>
	</div>
	<!-- IFRAME content -->
	
	<div style="width: 220px; height: 130px; float: left;">
		<!--<iframe src="<?php echo $firstinfo['Stats'];?>" align="center" frameborder="0" width="220" height="130" scrolling="no" marginwidth="0" marginheight="0" style="text-align:center; align: center; margin: 0; padding: 0; marginwidth:0">
		</iframe>-->
		<iframe src="/playerstats.php?fullname=<?php echo $firstinfo['PlayerName'];?>" align="center" frameborder="0" width="220" height="130" scrolling="no" marginwidth="0" marginheight="0" style="text-align:center; align: center; margin: 0; padding: 0; marginwidth:0">
		</iframe>
	</div>
	<!-- END IFRAME content -->
	<div style="clear: both;"></div>
	<div style="width: 380px; height: 110px; margin: 0px 10px;">
		<span style="color: #333; font-weight: bold; font-size: 12px;">Other Players</span><br>
		<div class="thumbs">
		<?php
		$restsql="SELECT StartingfiveID,PlayerName,Votes,Filename FROM startingfive WHERE Position='$posname' AND StartingfiveID<>'$exclude_id' ORDER BY Votes DESC";
		$rest=mysqli_query($connect, $restsql) or die ("REST : ".mysqli_error());
		
		while($others=mysqli_fetch_array($rest)){
			 $path = $others['Filename'];
		?>
			<a href="javascript:showVotes(<?php echo $posid.",".$others['StartingfiveID'];?>)" style="border:0px;">
			<div style="float: left; font-size: 11px; width: 85px; margin: 0px 5px;">
				<img src="<?php echo $path; ?>" width="80" height="80" alt="<?php echo $others['PlayerName'];?>">
				<span style="color: #F00; font-weight: bold;"><?php echo $others['Votes'];?> votes</span><br>
				<span style="font-weight: bold; color: #666;"><?php echo $others['PlayerName'];?></span>
			</div>
			</a>
		<?php
		}
		?>
			<div style="clear: both;"></div>
		</div>
	</div>
</div>