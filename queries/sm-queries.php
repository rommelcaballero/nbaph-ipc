<?php
	class sm_Model{		
		private $_conn;
		public function __construct(){
			$domain = str_replace("https://", "", $_SERVER['SERVER_NAME']);
			$domain = str_replace("http://", "", $domain); 
			if($domain != "ph.nba.com"){
				$sql_db = "nba.local";
				$sql_server = "localhost";
				$sql_user = "root";
				$sql_pwd = "pau";
			}else{ 	  
				$sql_db = "db48516_nba";
				$sql_server = "10.50.1.92";
				$sql_user = "nba_web_97";
				$sql_pwd = "$3rv3rdb97";
			} 			
			$this->_conn = new mysqli($sql_server,$sql_user,$sql_pwd,$sql_db);			
			if($this->_conn->connect_error){
				throw new exception("Connect Failed: %s\n" . $this->_conn->connect_error);
			}

		}
		public function getBackgroundAds($part_page){
			//$query_bgads = "SELECT AdsID, Title, Link, Image, BgColor FROM background_ads WHERE Status='s' AND Page='". $this->_conn->real_escape_string(trim($part_page))."' ORDER BY DateUpdated DESC, DateAdded DESC LIMIT 0, 1 ";
		    //$result_bgads = $this->_conn->query($query_bgads);
		   	//$found_bgads = $result_bgads->num_rows;
		   	$domain = str_replace("https://", "", $_SERVER['SERVER_NAME']);
			$domain = str_replace("http://", "", $domain); 
			if($domain != "ph.nba.com"){
				$sql_db = "nba.local";
				$sql_server = "localhost";
				$sql_user = "root";
				$sql_pwd = "pau";
			}else{ 	  
				$sql_db = "db48516_nba";
				$sql_server = "10.50.1.92";
				$sql_user = "nba_web_97";
				$sql_pwd = "$3rv3rdb97";
			} 
		   	$connect = mysqli_connect($sql_server,$sql_user,$sql_pwd,$sql_db);			
		   	$result_bgads = mysqli_query($connect,"SELECT AdsID, Title, Link, Image, BgColor FROM background_ads WHERE Status='s' AND Page='". mysqli_real_escape_string($connect,trim($part_page))."' ORDER BY DateUpdated DESC, DateAdded DESC LIMIT 0, 1 ");
		   	$found_bgads = mysqli_num_rows($result_bgads);
		   	return array('result_bgads' => $result_bgads, 'found_bgads' => $found_bgads);
		}
		public function validateCodeExistence($code){
			$result = $this->_conn->query("select * from sm_promo_codes where codes ='" . $this->_conn->real_escape_string($code) . "';");			
			if(($result) && ($result->num_rows > 0)){			
				$ret = $result->fetch_assoc();		
			
				return $ret;	
			}	
			
			throw new exception("Sorry the unique code you entered is invalid, kindly register again with a valid code.");
		}
		public function validateCodeUsage($codeid){
			$result = $this->_conn->query("select * from sm_promo_entries where code_id =" . $codeid . ";");			
			
			if(($result) && ($result->num_rows > 0)){
			
				throw new exception("Sorry the unique code you entered has already been used.");
			}			
			
			return true;
		}
		public function insertEntries($params){

			$sql = "Insert into sm_promo_entries(code_id,branch,date_created,firstname,lastname,address,mobile,remote_addr) 
			values({$params['codeid']},'{$params['branch']}','{$params['date_created']}','{$params['firstname']}','{$params['lastname']}','{$params['address']}','{$params['mobile']}','{$params['remote_addr']}');";
			
			$stmt = $this->_conn->prepare($sql);
			if($stmt->execute()){
				return true;
			}else{
				throw new exception("Something went wrong while insert your entries");
			}
			
		}
	};
   
			
?>