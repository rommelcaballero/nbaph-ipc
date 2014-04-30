<?php
include("sqli2.php");
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
$qstr = "Update wall_videos set impression_count = (impression_count + 1) where id = ". mysqli_real_escape_string($connect, $wall_id) . ";";
$uri = $_SERVER['REQUEST_URI'];
if(($up=='1' & $uri=='/') || ($up=='1' & $uri='/index.php')){
mysqli_query($connect, $qstr) or die(mysqli_error());
}


							//echo json_encode(array(
							//	'success' => true,
							//	'message' => "impression counted"
							//));	
								
						}	
						
					}
				}

?>
