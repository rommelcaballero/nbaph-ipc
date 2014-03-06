<?php
include('sqli.php');
include('lib.php');

$action = trim($_REQUEST['action']);
$rand = trim($_REQUEST['rand']);
 
if($action == "get_videos") 
{
	
	$type = stripslashes(trim(urldecode(urlencode($_REQUEST['type']))));
	
	//$results = mysqli_query($connect, "SELECT VideoID, Thumbnail, Title, Link FROM videos where Section = '".mysqli_real_escape_string($connect, $type)."' and Thumbnail <>'' ORDER BY SortOrder DESC, DatePosted DESC LIMIT 0, 12") or die(mysqli_error());
	$results = mysqli_query($connect, "Select id, filename, description, title, small_image from new_videos where categorization='".mysqli_real_escape_string($connect, $type)."' and v_upload_complete=1 and s_img_upload_complete=1 order by  date_created desc, media_game_date desc limit 0, 12") or die(mysqli_error());
	
	$total = mysqli_num_rows($results);
	$count = 0;
	if($total > 0)
	 {
		
		echo $total."|||"; 
		while($row = mysqli_fetch_array($results)) {
		   //if ($count % 4 == 0) {
		?>
		<!--div class="pics_content"-->
		<?php
		   //}
		   //if (preg_match("/^http/i", $row['Thumbnail'])) {
		   //} else {
			//	$row['Thumbnail'] = "http://i2.cdn.turner.com/" .$row['Thumbnail'];		
		   //}
		?>
			<div class="pics_details">
                <div class="pics_actual">
                    <a href="/videos/?id=<?php echo $row['id']; ?>"><img src="/ftp-web/<?php echo $row['small_image']; ?>"  width="132" height="70" border="0" title="<?php echo $row['description']; ?>"></a>
                </div>
                <a href="/videos/?id=<?php echo($row['id']); ?>"><?php echo stripslashes($row['title']); ?></a>
            </div>
		<?php
		   //if ($count % 4 == 3 || $count + 1 == $total) {
		?>
			<!--div class="clear"></div>
			
		</div-->
		<?php
		   //}
		
		   //$count += 1; 
		   
		}//end while
 	
	 }//end if total
	
}//end get videos




if($action == "get_gallery") 
{
	
	$gallery_count = stripslashes(trim(urldecode(urlencode($_REQUEST['gallery_count']))));
	
	//echo "resize_pic.php?file=".$_SESSION['photos'][$gallery_count]['Filename']."&w=282&h=282";
	echo $_SESSION['photos'][$gallery_count]['Filename'];

}

mysqli_close($connect);
?>