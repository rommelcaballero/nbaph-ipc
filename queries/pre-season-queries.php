<?php
	include 'sqli.php';
	include 'lib.php';
	class DB{
		private $_conn;
		public function __construct($param){
			$this->_conn = new mysqli($param['server'],$param['username'],$param['password'],$param['database']);				
		}
		public function insert($data){			
			if($this->_seekDataIfExist($data['email'])){
				return false;
			}
			$this->_conn->query("Insert into preseason_reg(firstname,lastname,mobile,birthdate,email,confirmed,news_update,date_registered,confirmation_code) 
				values ('".$this->_conn->real_escape_string($data['firstname'])."','".$this->_conn->real_escape_string($data['lastname'])."','".$this->_conn->real_escape_string($data['mobile'])."','".date("Y-m-d",strtotime($data['birth_date']))."','{$data['email']}',0,{$data['news_update']},'".date("Y-m-d H:i:s")."','".md5($email.date("Y-m-d H:i:s"))."');");
			return true;
		}
		private function _seekDataIfExist($email){
			$result = $this->_conn->query("Select id from preseason_reg where email ='".$email."' limit 1;");
			return ($result->num_rows >= 1);			
		}
	}
	class Mail{
		private $_to;
		private $_from;
		private $_subject;
		public function __construct($param){
			$this->_to = $param['to'];
			$this->_from = $param['from'];
			$this->_subject = $param['subject'];
		}
		public function sendMail($message){
			//$to      = 'nobody@example.com';
			//$subject = 'the subject';
			$headers = 'From: '.$this->_from . "\r\n";

			return mail($this->_to, $this->_subject, $message, $headers);
		}
	}

?>