<?php
$post = $_POST;
$part_page = "look-a-like"; 
include('queries/look-a-like-queries.php');

if(isset($post) && count($post)>0){	
	$notice = array(
		"error-message" => "Voting is now closed, All email is currently being validating"
		);
	/*
	$vote = new votes_Model(array('connect'=>$connect));		
	$email = filter_var($post['input-dialog-email'],FILTER_VALIDATE_EMAIL);
	if(!$email){
		$notice = array(
			'error-message' => "Not valid email address format",
			'fullname' => $post['input-dialog-fullname']
		);
	}else{
		$notice = $vote->validateVote(array(
			"photo-id" => $post['photo-id'],
			"recaptcha_challenge_field" => $post['recaptcha_challenge_field'],
			"recaptcha_response_field" => $post['recaptcha_response_field'],
			"input-dialog-email" => $post['input-dialog-email'],
			"input-dialog-fullname" => $post['input-dialog-fullname'],
			"date_of_entry" => date("Y-m-d"),
			"public_ip" => $_SERVER['REMOTE_ADDR']
		));
	}	
	if(!isset($notice['error-message'])){
		//send email here
		$mail = new mailSender_Model();
		$ret = $mail->sendMail(array(
			'domain' => "http://ph.nba.com",
			'input-dialog-email' => $post['input-dialog-email'],
			'input-dialog-fullname' => $post['input-dialog-fullname'],
			'confirmation_key' => $notice['confirmation_key']
		));
		if($ret){
			header("Location: http://ph.nba.com/look-a-like/mail-send-success");
		}
		header("Location: http://ph.nba.com/look-a-like/mail-send-success");
	}
	*/
}

$look = new lookALike_Model(array('connect' => $connect));
$ads_list = $look->getAds();

switch($parts[1]){
	case "title":
		$photos = $look->getPhotos($parts[2]);		
		break;
	case "mail-send-success":
		$photos = $look->getPhotos();		
		//$notice['success-message'] = "A confirmation link has been sent to your email. Be sure to click on the emailed verification link to validate your vote.";
		$notice['success-message'] = "Thank you for your participation.";
		$stats = $look->getStats();
		break;
	case "verify-key":
		$stats = $look->getStats();
		$photos = $look->getPhotos();		
		$vote = new votes_Model(array('connect'=>$connect));

		try{
			$ret = $vote->validateKey($parts[2]);
			$notice['success-message'] = "Thank you for your participation. Your vote has been successfully verified.";
		}catch(Exception $e){
			switch($e->getMessage()){
				case $vote::CONFIRMATION_KEY_ALREADY_VERIFIED:
					$notice['error-message'] = "Your vote is already verified.";
					break;
				case $vote::INVALID_CONFIRMATION_KEY:
					$notice['error-message'] = "Invalid confirmation key.";
					break;
				default:
					var_dump($e->getMessage());
					break;
			}
		}

	default:
		$photos = $look->getPhotos();
		$stats = $look->getStats();
		break;		
}
	
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>Look a Like</title>
	<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1" /> 

	<base href="<?php echo $base; ?>">

	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="style-index.css">	
	<link rel="stylesheet" type="text/css" href="style-new.css">
	
	<link rel='stylesheet' href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

	</head>
	<body>
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=131694290309870";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>

		<?php include('layouts/popups.php'); ?>
		<div id="wrapper">
			<?php include('layouts/header.php'); ?>
			<div id="main_content" > 
				<div id='header'>
	      	  		<div style="height: 10px"></div>
	          		<div style="width: 958px; height: 105px; margin: 0 auto; text-align: center; ">
						<?php echo $ads_list['nba_homepage_top_leaderboard']; ?>
	          		</div>
	          		<div>
	          			<img src='/media/2.0/look-a-like-header.jpg'/>
	          		</div>
				</div>
				
				<?php if(count($photos) == 1): ?>
				<style>
					.photo-entry{text-align: center; width: 650px; margin: 0 auto;}
					.photo-entry h1{color:#0054AF; text-align: left; margin: 10px 20px;}
					.photo-entry h3{text-align: left; margin: 10px 20px 10px;}
					.photo-frame span{display: inline-block; padding:10px; border-radius: 3px; background: #e1e1e1;}
					.description{padding:10px;}
					.vote-box{padding:10px;text-align:center; margin-bottom: 50px;}
					.vote-button{background:blue url(/media/2.0/btn-blue.jpg); display: inline-block; border:1px solid #000; border-radius: 2px; padding:5px 40px; color:#fff; font-size:40px; font-weight: bold; font-family: verdana, tahoma, serif; height:53px; cursor: pointer;}
					.ui-button {
					    font-size: 14px !important; /* change font size */					    
					    color:#0054AF !important;
					}
					.ui-dialog-title{
						font-size: 14px !important;
						color:#0054af !important;						
					}
					.ui-widget-overlay{opacity:0.8;}
					.stop-scrolling {
					  	height: 100%;
					  	overflow: hidden;
					}
					#dialog-form p{font-size:12px; color:#888; padding:5px 0 20px;}
					.input-row{min-height: 40px; width:500px; vertical-align: top;}
					.input-left{display: inline-block; text-align: right; padding-right: 10px; font-size:14px; width: 130px; vertical-align: top;}
					.input-right{display: inline-block; text-align: left;  font-size:14px;}
					.input-right input{width: 300px;}
					.error{padding:10px 20px; font-size:14px; color:#860400; background: #F5BFBF; border: 1px solid #860400; border-radius: 3px;}

					/* twitter button - begin */
					iframe.twitter-follow-button{height: 24px !important;}
					
					/* twitter button - end */
				</style>
				<div class='photo-entry'>
					<h1><?php echo $photos[0]['title']; ?></h1>
					<h3>By <?php echo $photos[0]['owner']; ?></h3>	
					<div style='text-align:left; padding:10px 15px;'>
						<div class="fb-like" data-href="http://ph.nba.com/look-a-like/title/<?php echo $photos['0']['title']; ?>/" data-send="false" data-width="450" data-show-faces="false"></div>

						<a href="https://twitter.com/NBA_Philippines" class="twitter-follow-button" data-show-count="false" data-lang="en" data-size="medium">Follow @NBA_Philippines</a>
						<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

					</div>
					<div class='photo-frame'>
						<span><img src='/media/2.0/look-a-like/<?php echo $photos[0]['image_large']; ?>'/></span>						
					</div>
					<div class='description'>

					</div>
					<div class='rating'>
						<?php 
						$active_photo_count = 0;
			          	$overall_count = 0;
			          	foreach($photos[0]['vote-statistics'] as $k=>$v){						          		
			          		//echo "['" . $v['title'] . "',". (int)$v['vc'] ."],";
			          		if($photos[0]['id'] == $v['id']){
			          			$active_photo_count += $v['vc'];
			          		}else{
			          			$overall_count += $v['vc'];
			          		}
			          	}
			          	if(($active_photo_count > 0) || ($overall_count > 0)): 
						?>

						<!--script type="text/javascript" src="https://www.google.com/jsapi"></script>
					    <script type="text/javascript">
						    google.load("visualization", "1", {packages:["corechart"]});
						    google.setOnLoadCallback(drawChart);
						    function drawChart() {
						        var data = google.visualization.arrayToDataTable([
						          	['Title','Total Votes'],						          	
						          	<?php 						          	
						          	echo "['" . $photos[0]['title'] . "',". $active_photo_count ."],";
						          	echo "['Total Voters',". $overall_count ."]";
						          	?>
						        ]);
						        var options = {
						          title: 'Look A Like contest',
						          //pieSliceText: 'value',
						          sliceVisibilityThreshold:0
						        };
						        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
						        chart.draw(data, options);
						        
						    }
						    
					    </script>
					    <div id='chart_div' style="width: 600px; height: 300px; margin:0 auto;"></div-->
						<?php endif; ?>
						<h3><p></p></h3>
					</div>
					<!--div class='vote-box'>
						<span id='vote-button' class='vote-button'>VOTE</span>
					</div-->
				</div>
				<div id='dialog' style='display:none;'>
					<?php
					require_once($_SERVER['DOCUMENT_ROOT']."/lib/recaptchalib.php");
					$publickey = "6LeqtuMSAAAAAEnsE8Lxs7yCTZ1_tzqT_pLKDk9k";
					?>		
					<?php if(isset($notice['error-message'])): ?>
					<p class='error' id='captcha-error-container'><span id='captcha-error-msg' style='display:none;'></span></p>
					<?php endif; ?>
					<form id='dialog-form' method='POST' action="">
						<p>Please enter your E-mail address and Fullname below to participate in voting.</p>
						<div class='input-row'>
							<span class='input-left'>
								<span><label>E-mail address : </label></span>
							</span>
							<span class='input-right'>
								<span><input name='input-dialog-email' type='text' placeholder="Enter your E-mail address here" required value="<?php echo (isset($notice['email']))?$notice['email']:""; ?>"/></span>
							</span>
						</div>
						<div class='input-row'>
							<span class='input-left'>
								<span><label>Fullname : </label></span>
							</span>
							<span class='input-right'>
								<span><input name='input-dialog-fullname' type='text' placeholder="Enter your fullname here" required value="<?php echo (isset($notice['fullname']))?$notice['fullname']:""; ?>"/></span>
							</span>
						</div>
						<div class='input-row'>
							<span class='input-left'>
								<span><label>Captcha : </label></span>
							</span>
							<span class='input-right'>
								<span id='captcha-container'><?php echo recaptcha_get_html($publickey); ?></span>								
							</span>
						</div>
						<input type='hidden' name='photo-id' value="<?php echo $photos[0]['id']; ?>" />
					</form>	

				</div>
				<script>
					$(document).ready(function(){
						$('div[id=dialog]').dialog({								
							title:"Vote Now",
							modal:true,
							width:600,
							height:<?php echo (isset($notice['error-message']))?"460":"400"; ?>,
							resizable:false,
							buttons:{
								"Cancel":function(){									
									$(this).dialog("close");
								},
								"Continue Voting":function(){
									//process vote here
									$(this).dialog("close");	
									document.forms["dialog-form"].submit();
								}
							},
							create:function(event, ui){
								$("body").addClass("stop-scrolling");	
							},
							beforeClose: function(event, ui) {									
								$('p[id=captcha-error-container]').css("display","none");
								$('div[id=dialog]').dialog({height:400});
							  	$("body").removeClass("stop-scrolling");
							}
						});
						<?php if(isset($notice['error-message'])): ?>
						$('span[id=captcha-error-msg]').html("<?php echo $notice['error-message']; ?>").css("display","block");
						<?php else: ?>
						$('div[id=dialog]').dialog("close");
						<?php endif; ?>

						$("span[id=vote-button]").click(function(){
							$("body").addClass("stop-scrolling");	
							$('div[id=dialog]').dialog("open");
						});
					});
				</script>
				<?php else: ?>
				<style>										
					.photo-entry h3{text-align: left; margin: 10px 20px 10px;}
					.photo-frame span{display: inline-block; padding:10px; border-radius: 3px; background: #e1e1e1;}

					.photo-content{text-align: center;}
					.photo-content h1{color:#0054AF; text-align: left; margin: 10px 20px;}
					.photo-content h3{text-align: left; margin: 10px 20px 10px;}
					.photo-container{display: inline-block; width: 310px; padding: 10px; vertical-align: top; height: 193px; margin-bottom: 20px;}
					.votes, .title, .social-box, .details-box, .img-box{display: block;}
					.img-box{text-align: center; padding:10px; background: #e1e1e1; border-radius: 3px;}
					.details-box{min-height:35px; bottom:55px;background: url(/media/2.0/white-bg.png); padding:10px 20px; position: relative;}
					.photo-container:hover .details-box{display:none;}
					.img-box img{max-width: 290px;}
					.title{text-align: left; display: block;}
					.owner{text-align:left; display: block; color:#888; font-size:12px;}
					.success{margin: 5px 10px; padding:10px 20px; font-size:14px; color:#264601; background: #CDFC98; border: 1px solid #264601; border-radius: 3px;}
					.error{margin:5px 10px; padding:10px 20px; font-size:14px; color:#860400; background: #F5BFBF; border: 1px solid #860400; border-radius: 3px;}
				</style>
				<div class='photo-content'>

					<h1>NBA Look-ALike photo contest</h1>
					<h3><p>After validating emails, we have a winner!
						Congratulations to Jeofrey James Rafales for winning the NBA Look-Alike contest with 1,058 votes!</p></h3>	
					<?php if(isset($notice['success-message'])): ?>
					<p class='success'><?php echo $notice['success-message']; ?></p>
					<?php endif; ?>					
					<?php if(isset($notice['error-message'])): ?>
					<p class='error'><?php echo $notice['error-message']; ?></p>
					<?php endif; ?>					
					<div class='photo-entry' >																			
						<div class='photo-frame'>
							<span><img src='/media/2.0/look-a-like/<?php echo $photos[6]['image_large']; ?>'/></span>						
							<h4><?php echo $photos[6]['title']; ?></h4>
							<h4>By <?php echo $photos[6]['owner']; ?></h4>
						</div>
						
					</div>
					<?php foreach($photos as $k => $v): ?>
						<?php if($v['owner'] != 'Jeofrey James Rafales'): ?>
						<span class='photo-container'>
							<a href='/look-a-like/title/<?php echo ($v['title']); ?>'>
							<span class='img-box'><span><img src="/media/2.0/look-a-like/<?php echo $v['image_small']; ?>" /></span></span>
							<span class='details-box'>							
								<span class='title'><?php echo $v['title']; ?></span>														
								<span class='owner'>By <?php echo $v['owner']; ?></span>
							</span>
							</a>
						</span>
						<?php endif; ?>
					<?php endforeach; ?>
					
				</div>

				<div class='rating'>
				
					<script type="text/javascript" src="https://www.google.com/jsapi"></script>
				    <script type="text/javascript">
					    google.load("visualization", "1", {packages:["corechart"]});
					    google.setOnLoadCallback(drawChart);
					    function drawChart() {						
							var data = google.visualization.arrayToDataTable([
							  ['Photo By', 'Votes'],
							  	<?php 						      
								foreach($stats as $k => $v){
									if($v['owner'] == 'Jeofrey James Rafales'){
										echo "['" . $v['owner'] . "',1058],";
									}elseif($v['owner'] == 'Kidd Ambray'){
										echo "['" . $v['owner'] . "',664],";	
									}else{
										echo "['" . $v['owner'] . "'," . $v['vc'] . "],";	
									}									
								}
					          	?>							  
							]);	
					        var options = {					          
							  hAxis: {title: 'Look-ALike Contest', titleTextStyle: {color: 'red'}}				          
					        };
							var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
							chart.draw(data, options);
					    }					    
				    </script>
				    <div id='chart_div' style="width: 1000px; height: 500px; margin:0 auto;"></div>					
					<br /><br />
				</div>
				<?php endif; ?>
	          	<div>
		          	<?php 
		          	$footer_ads = $ads_list['nba_homepage_bottom_leaderboard']; 
		          	include('layouts/links.php'); 
		          	include('layouts/footer.php');
		          	?>
		          	<div class='clear'></div>
	          	</div>
          	</div><!-- main_content -->   
          	    
		</div><!-- wrapper -->
		
		<?php include("layouts/background_ads.php"); ?>
	</body>

</html>