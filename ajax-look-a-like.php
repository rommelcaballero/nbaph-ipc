<?php
	$params = $_GET;
	if(isset($params['request-captcha'])){		
		require_once($_SERVER['DOCUMENT_ROOT']."/lib/recaptchalib.php");
		$publickey = "6LeqtuMSAAAAAEnsE8Lxs7yCTZ1_tzqT_pLKDk9k";
		?>		
		<form id='dialog-form'>
			<p>Please enter your E-mail address and Fullname below to participate your vote. If you agree to continue voting a confirmation link will be send to your email for confirmation.</p>
			<div class='input-row'>
				<span class='input-left'>
					<span><label>E-mail address : </label></span>
				</span>
				<span class='input-right'>
					<span><input name='input-dialog-email' type='text' placeholder="Enter your E-mail address here" /></span>
				</span>
			</div>
			<div class='input-row'>
				<span class='input-left'>
					<span><label>Fullname : </label></span>
				</span>
				<span class='input-right'>
					<span><input name='input-dialog-fullname' type='text' placeholder="Enter your fullname here" /></span>
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
		</form>	
		<?php		
	}	
?>