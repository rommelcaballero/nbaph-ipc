<?php
	include('sqli.php');
	include('lib.php');


   	class lookALike_Model{
   		private $_conn;
   		public function __construct($params){
   			$this->_conn = $params['connect'];
   		}   		
   		public function getAds(){
   			$results = mysqli_query($this->_conn, "SELECT Content, AdsDesc FROM ads_list WHERE (AdsDesc='nba_homepage_top_leaderboard' or AdsDesc='nba_homepage_top_medallion' or AdsDesc='nba_homepage_middle_leaderboard' or AdsDesc='nba_homepage_middle_medallion1' or AdsDesc='nba_homepage_middle_medallion2' or AdsDesc='nba_homepage_bottom_leaderboard') AND Status='s' ");
		   	$ads_list = array();
		   	while($row = mysqli_fetch_array($results)) {
		      	$ads_list[$row['AdsDesc']] = $row['Content'];
		   	}
			return $ads_list;	
   		}
   		public function getPhotos($title = ""){
   			$photos = array();
   			if(trim(urldecode($title)) != ""){
		   		$result = mysqli_query($this->_conn, "SELECT * from look_a_like_photos where title ='" . mysqli_real_escape_string($this->_conn, trim(urldecode($title))) . "';");   	
		   		$photos[] = mysqli_fetch_assoc($result);
		   		//$photos[0]['Votes'] = $this->_getVoters($photos[0]['id']);
		   		$photos[0]['vote-statistics'] = $this->_getStatistics();
		   	}else{
		   		$result = mysqli_query($this->_conn, "SELECT * from look_a_like_photos");   	
		   		while($row = mysqli_fetch_assoc($result)){
		   			$photos[] = $row;
		   		}	
		   	}
		   	return $photos;
   		}
		public function getStats(){
			return $this->_getStatistics();
		}
   		private function _getStatistics(){
   			$result = mysqli_query($this->_conn,"SELECT p.*, COUNT(v.id)vc FROM look_a_like_photos p
						LEFT JOIN look_a_like_voters v ON v.photo_id = p.id 
						GROUP BY p.id;");
   			$statistics = array();
   			while($row = mysqli_fetch_assoc($result)){
   				$statistics[] = $row;
   			}
   			return $statistics;
   		}
   		private function _getVoters($photo_id){
   			$result = mysqli_query($this->_conn,"SELECT count(*)tv from look_a_like_voters where photo_id = " . $photo_id);
   			$total_votes = mysqli_fetch_assoc($result);

			$result = mysqli_query($this->_conn,"SELECT count(*)vc from look_a_like_voters");   			
			$voters_count = mysqli_fetch_assoc($result);
			
   			return array("total_votes" => $total_votes['tv'], "voters_count" => $voters_count['vc']);
   		}
   	}
	class votes_Model{
		const EMAIL_ALREADY_EXISTS = 1;
		const CONFIRMATION_KEY_ALREADY_VERIFIED = 2;
		const INVALID_CONFIRMATION_KEY = 3;
		private $_conn;		
		public function __construct($params){
			$this->_conn = $params['connect'];
		}
		public function validateVote($params){

			require_once($_SERVER['DOCUMENT_ROOT']."/lib/recaptchalib.php");
			$privatekey = "6LeqtuMSAAAAAFptdw-4xc1s8IQ8cyIviNnEAOmG";
			$resp = recaptcha_check_answer ($privatekey,
			    $_SERVER["REMOTE_ADDR"],
			    $params["recaptcha_challenge_field"],
			    $params["recaptcha_response_field"]);
			
			$notice = array(
				'fullname' => $params["input-dialog-fullname"],
				'email' => $params["input-dialog-email"]
			);

			if (!$resp->is_valid) {
				// What happens when the CAPTCHA was entered incorrectly
				$notice["error-message"] = "The reCAPTCHA wasn't entered correctly. Please try it again." .
					"(reCAPTCHA said: " . $resp->error .")";					
			}else{
				try{
					$ret = $this->_updateVote($params);
					$notice['confirmation_key']	= $ret['confirmation_key'];
				}catch(Exception $e){
					switch($e->getMessage()){
						case self::EMAIL_ALREADY_EXISTS:
							$notice['error-message'] = 'Email already exists';
							break;
						default:
							break;
					}
				}	
			}
			return $notice;
		}
		public function validateKey($key){
			$result = mysqli_query($this->_conn,"select * from look_a_like_voters where confirmation_key ='" . mysqli_real_escape_string($this->_conn,$key) . "';");			
			if(($result) && ($result->num_rows > 0)){
				$data = mysqli_fetch_assoc($result);
				if($data['verified'] == 0){
					mysqli_query($this->_conn,"update look_a_like_voters set verified = 1 where id=" . $data['id']);
				}else{
					throw new Exception(self::CONFIRMATION_KEY_ALREADY_VERIFIED);
				}
			}else{
				throw new Exeception(self::INVALID_CONFIRMATION_KEY);
			}	
			return true;
		}
		private function _updateVote($params){

			$result = mysqli_query($this->_conn,"select * from look_a_like_voters where email ='" . mysqli_real_escape_string($this->_conn,$params['input-dialog-email']) . "';");
			if(($result) && ($result->num_rows > 0)){
				throw new Exception(self::EMAIL_ALREADY_EXISTS);
			}			
			//insert voters here
			$params['confirmation_key'] = $this->_generateConfirmationKey($params['input-dialog-email'],$params['input-dialog-fullname']);
			$result = mysqli_query($this->_conn,"insert into look_a_like_voters(email,fullname,photo_id,confirmation_key,date_of_entry,public_id) values('".mysqli_real_escape_string($this->_conn,$params['input-dialog-email'])."','".mysqli_real_escape_string($this->_conn,$params['input-dialog-fullname'])."',".$params['photo-id'].",'". $params['confirmation_key'] ."','".$params['date_of_entry']."','".$params['public_ip']."');");
				
			return $params;
		}
		private function _generateConfirmationKey($email,$fullname){
			return md5($email . "-" . $fullname);
		}
	}
	class mailSender_Model{
		public function __construct(){

		}
		public function sendMail($params){
			// Your code here to handle a successful verification		
			$domain = $params['domain'];
			require $_SERVER['DOCUMENT_ROOT'] . '/lib/class.phpmailer.php';
			$mail = new PHPMailer;
			$mail->IsSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';  // Specify main and backup server
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = 'nbahandles@gmail.com';                            // SMTP username
			$mail->Password = 'lethalmamba24';                           // SMTP password
			//$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
			//$mail->Port = "587";
			$mail->SMTPSecure = 'ssl';                            // Enable encryption, 'ssl' also accepted
			$mail->Port = "465";


			$mail->From = 'nbahandles@gmail.com';
			$mail->FromName = 'NBA Handles';
			//$mail->AddAddress('josh@example.net', 'Josh Adams');  // Add a recipient
			$mail->AddAddress($params["input-dialog-email"],$params["input-dialog-fullname"]);               // Name is optional
			//$mail->AddReplyTo('info@example.com', 'Information');
			//$mail->AddCC('cc@example.com');
			//$mail->AddBCC('bcc@example.com');

			$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
			//$mail->AddAttachment('/var/tmp/file.tar.gz');         // Add attachments
			//$mail->AddAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
			$mail->IsHTML(true);                                  // Set email format to HTML

			$mail->Subject = 'NBA Handles Voting Confirmation';
			$mail->Body    = 'Please follow the link bellow to verify your vote for NBA Look A Like contest. <br/>'.$domain.'/look-a-like/verify-key/'.$params['confirmation_key'];
			$mail->AltBody = 'Click the link to verify your vote.';

			if(!$mail->Send()) {
				echo 'Message could not be sent.<br />';
				echo 'Mailer Error: ' . $mail->ErrorInfo;
				return false;
			}			
			return true;
		}
	}		
?>