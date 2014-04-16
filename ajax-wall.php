<?php
	session_start();	
	include("sqli.php");
	
	$action = isset($_GET['action'])?$_GET['action']:false;
	if(!$action){
		echo json_encode(array(
			'success' => false,
			'message' => "Invalid action"
		));
	}else{
		switch($action){
			case "impr":						
				if(isset($_SESSION['_csrf'])){
					$csrf = isset($_POST['csrf'])?$_POST['csrf']:"";
					$wall_id = isset($_POST['wall_id'])?$_POST['wall_id']:0;
					if($_SESSION['_csrf'] != $csrf){
						echo json_encode(array(
							'success' => false,
							'message' => "Forgery not allowed"
						));
					}else{
						unset($_SESSION['_csrf']);							
						if($wall_id == 0){
							echo json_encode(array(
								'success' => false,
								'message' => "Invalid wall"
							));
						}else{															
							mysqli_query($connect, "update wall_videos set impression_count=impression_count+1 where id='$wall_id'");							
							echo json_encode(array(
								'success' => true,
								'message' => "impression counted"
							));	
						}	
					}
				}else{
					echo json_encode(array(
						'success' => false,
						'message' => "Forgery not allowed"
					));
				}				
				break;
			default:
				echo json_encode(array(
					'success' => false,
					'message' => "Invalid action"
				));
				break;
		}	
	}
	?>
