<?php
	session_start();
	$part_page = "tuesdayggp";	
	$post = $_POST;

	if(isset($post) && count($post)>0){

		require_once($_SERVER['DOCUMENT_ROOT']."/lib/recaptchalib.php");
		$privatekey = "6LeqtuMSAAAAAFptdw-4xc1s8IQ8cyIviNnEAOmG";
		$resp = recaptcha_check_answer ($privatekey,
		    $_SERVER["REMOTE_ADDR"],
		    $post["recaptcha_challenge_field"],
		    $post["recaptcha_response_field"]);

		$sent_data = array(
			'firstname' => isset($post['first-name'])?filter_var($post['first-name'],FILTER_SANITIZE_STRING):false,
			"lastname" => isset($post['last-name'])?filter_var($post['last-name'],FILTER_SANITIZE_STRING):false,
			"address" => isset($post['address'])?filter_var($post['address'],FILTER_SANITIZE_STRING):false,
			"mobile" => isset($post['mobile'])?filter_var($post['mobile'],FILTER_SANITIZE_STRING):false,
			"email" => isset($post['email'])?filter_var($post['email'],FILTER_VALIDATE_EMAIL):false,
			"branch" => isset($post['branch'])?filter_var($post['branch'],FILTER_SANITIZE_STRING):false,
			"code" => isset($post['unique-code'])?filter_var($post['unique-code'],FILTER_SANITIZE_STRING):false			
		);	

		if (!$resp->is_valid) {
			// What happens when the CAPTCHA was entered incorrectly
			$notice["error-message"] = "The reCAPTCHA wasn't entered correctly. Please try it again." .
				"(reCAPTCHA said: " . $resp->error .")";
		}else{						
			if(in_array(false, $sent_data)){
				$notice['error-message'] = "All fields are required and must be valid. Please verify all fields before submission of your entry.";
			}else{
				//check code for validity
				include("queries/sm-queries.php");
				try{
					$sm = new sm_Model();
					$ret = $sm->validateCodeExistence($sent_data['code']);
					if($sm->validateCodeUsage($ret['id'])){
						if($sm->insertEntries(array(
							'codeid' => (int)$ret['id'],
							'branch' => $sent_data['branch'],
							'date_created' => date("Y-m-d H:i:s"),
							'firstname' => $sent_data['firstname'],
							'lastname' => $sent_data['lastname'],
							'address' => $sent_data['address'],
							'mobile' => $sent_data['mobile'],
							'remote_addr' => $_SERVER['REMOTE_ADDR']
						))){
							$notice['success-message'] = "You have successfully entered a raffle coupon.";
						}
					}
				}catch(Exception $e){
					$notice["error-message"] = $e->getMessage();
				}	
			}
		}				
	}else{
		include('queries/sm-queries.php');
		$sm = new sm_Model();
		$res = $sm->getBackgroundAds($part_page);
		$result_bgads = $res['result_bgads'];
		$found_bgads = $res['found_bgads'];
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>NBA Philippines | SM Promo</title>
	<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1" /> 
	<META http-equiv="X-UA-Compatible" content="IE=9" />

	<link rel="stylesheet" type="text/css" href="/super-market/sm-style.css">

	<link rel="stylesheet" type="text/css" href="/style.css">	
	<link rel="stylesheet" type="text/css" href="/style-new.css">
	
	<link rel="stylesheet" href="/jquery-ui.css" />
	<script type="text/javascript" src="/jquery-1.9.1.js"></script>
	<script type="text/javascript" src="/jquery-ui.js"></script>
	<!--script type="text/javascript" src="carousel-index.js"></script-->
	

</head>
<body>			
	<div id="wrapper">
		<?php include('layouts/header.php'); ?>
		<div id="main_content" > 
			<div class='promo-header'></div>	
			<div class='promo-content'>
				
				<?php include ("super-market/index.php"); ?>
			</div>
			<div class='promo-footer'>				
				<div class='promo-sponsors'>
					<hr />
					<table style="width:100%; text-align:center;"><tr>
					<td><img src='/super-market/img/moa-arena-logo.png'/></td>
					<td><img src='/super-market/img/nbaphilippines-logo.png'/></td>
					<td><img src='/super-market/img/sm-thestore-logo.png'/></td>
					<td><img src='/super-market/img/nba-logo.png'/></td>
					</tr>
					</table>
				</div>
				<div class='promo-legal'>
					<table style="width:100%;"><tr>
						<td style="text-align:left; color:#fff; font-size:14px;">2013 NBA Philippines, Inc.</td>
						<td style="text-align:right; color:#fff; font-size:14px;">DTI-NCR Permit No. 4271 Series of 2013</td>
					</tr></table>
				</div>
			</div>
          	<div>
		          	<?php 
		          	//$footer_ads = $ads_list['nba_homepage_bottom_leaderboard']; 
		          	//include('layouts/links.php'); 
		          	include('layouts/footer.php');
		          	?>
		          	<div class='clear'></div>
	          	</div>
          	</div><!-- main_content -->   
          	    
		</div><!-- wrapper -->		
		<?php include("layouts/background_ads.php"); ?>

	</body>

</html>