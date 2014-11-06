<?php
include('sqli2.php');
$sess = $_SESSION['_csrf'];
//$wall_id = $wall_videos[0]['id'];
//$csrf

if(isset($sess)){	
					if($sess != $csrf){
						//echo json_encode(array(
							//'success' => false,
							//'message' => "Forgery not allowed"
						//));
					}else{
						if($wall_id == 0){
							//echo json_encode(array(
								//'success' => false,
								//'message' => "Invalid wall"
							//));
						}else{		
//unset($sess);
$qstr = "Update wall_videos set impression_count = impression_count + 1 where id = '$wall_id' ";
//$qstr = "Update xtest set xtestcol1  = xtestcol1 + 1 where id ='1'";
$uri = $_SERVER['REQUEST_URI'];
//mysqli_query($qstr) or die(mysqli_error());



							//echo json_encode(array(
							//	'success' => true,
							//	'message' => "impression counted"
							//));	
								
						}	
						
					}
				}

?>
