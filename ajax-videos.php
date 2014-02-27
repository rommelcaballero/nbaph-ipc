<?php	
	define('USERNAME','nba_web_97');
	define('PASSWORD','$3rv3rdb97');
	define('SERVER','10.50.1.92');
	define('DATABASE','db48516_nba');			
	
	$action = isset($_GET['action'])?$_GET['action']:false;
	if(!$action){
		echo json_encode(array(
			'success' => false,
			'message' => "Invalid action"
		));
	}else{ 

		switch($action){
			case "liked":
				$id = isset($_POST['id'])?$_POST['id']:false;
				$fb = new FB(SERVER,USERNAME,PASSWORD,DATABASE);
				$fb->gotLiked($id);
				echo json_encode(array(
					'success' => true,
					'message' => "You have like this"
				));
				break;
			case "pagechange":
				$page = isset($_POST['page'])?filter_var($_POST['page'],FILTER_VALIDATE_INT):1;				
				$limit = isset($_POST['limit'])?filter_var($_POST['limit'],FILTER_VALIDATE_INT):12;
				$vList = Video::getListByPage(array(
						'server' => SERVER,
						'username' => USERNAME,
						'password' => PASSWORD,
						'database' => DATABASE
						),$page,$limit);
				echo json_encode(array(
						'success' => true,
						'data' => $vList,
						'message' => "Request completed. Page : $page | Limit : $limit"
					));
				break;				
			default:
				echo json_encode(array(
					'success' => false,
					'message' => "This action is not supported."
				));
				break;
		}
	}	

	class FB{
		private $_mysqli;
		public function __construct($server, $username, $password, $database){
			$this->_mysqli = new mysqli($server, $username, $password, $database);			
		}		
		public function gotLiked($id){
			$result = $this->_mysqli->query("select id from new_videos where id =".$id);
			if($result->num_rows > 0){
				$this->_mysqli->query("update new_videos set likes = (likes + 1) where id=".$id);
			}
			//$result->close();
		}
	}
	class Video{
		/*private $_mysqli;
		public function __construct($server, $username, $password, $database){

		}*/
		private static $instance;
		private static function init($conn){
			self::$instance = new mysqli($conn['server'],$conn['username'],$conn['password'],$conn['database']);
			if(self::$instance->connect_error){				
    			throw new Exception('Connect error: ' . self::$instance->connect_error);
			}
			return self::$instance;
		}
		public static function getListByPage($conn, $page,$limit){
			try{
				$result = self::init($conn)->query("SELECT id,filename,description,title,media_game_date,duration,player,small_image FROM new_videos where v_upload_complete=1 and s_img_upload_complete=1 order by date_created desc, id desc, media_game_date desc limit ".(($page-1)*$limit).", $limit");
				$data = array();
				while($row = $result->fetch_array(MYSQLI_ASSOC)){
					$data[] = $row;
				}
				return $data;
			}catch(Exception $e){
				var_dump($e->message);
				return false;	
			}
		}

	}
?>
