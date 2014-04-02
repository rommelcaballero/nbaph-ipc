<div class='promo-body'>
	<!--h3 class='title'>Get a chance to Win 1 of the 4 Premier A tickets (P32,000 value)!</h3>
	<table style='width:500px; margin:0 auto; padding-top:10px;'><tr>
		<td style='width:50px;'><span><img src='/super-market/img/nba-logo-large.png' /></td>
		<td>
			<h2 class='title'>MALL OF ASIA ARENA</h2>
			<h1 class='title'>OCTOBER 10, 2013</h1>
		</td>
	</tr></table-->
	<hr/>
	<span class='description'>
		<span style='font-weight:bold;'>How to Join:</span>
		<br />
		Participants are entitled to one (1) raffle entry for a minimum purchase of P500(accumulated receipts) worth of NBA products from August 15, 2013 - September 30, 2013 in selected The SM Store Branches nationwide. Participants will get a scratch card with unique code for every P500 purchase. Complete the form below to join the raffle draw.
		<br />
		<span style='color:#ffff00; '>REGISTER NOW!</span>
		<span id='promo-mechanics' class='promo-mechanics'>view full mechanics here!</span>
		<form method='POST' id='sm-form'>
		<table><tr><td>
			<div class='form' style='margin-top:20px;'>
				<div class='input-row' id='row-name'>
					<span class='input-left'>
						<span><label for='first-name'>Name</label></span>
					</span>
					<span class='input-right'>
						<input type="text" id='first-name' name='first-name' placeholder='First Name' value='<?php echo isset($sent_data['firstname'])?$sent_data['firstname']:""; ?>'/>
						<input type="text" id='last-name' name='last-name' placeholder='Last Name' value='<?php echo isset($sent_data['lastname'])?$sent_data['lastname']:""; ?>'/>
					</span>
				</div>
				<div class='input-row' id='row-address'>
					<span class='input-left'>
						<span><label for='address'>Address</label></span>
					</span>
					<span class='input-right'>
						<textarea type="text" id='address' name='address' placeholder='Address'><?php echo isset($sent_data['address'])?$sent_data['address']:""; ?></textarea>							
					</span>
				</div>
				<div class='input-row' id='row-mobile'>
					<span class='input-left'>
						<span><label for='mobile'>Mobile</label></span>
					</span>
					<span class='input-right'>
						<input type="text" id='mobile' name='mobile' placeholder='Mobile No.' value='<?php echo isset($sent_data['mobile'])?$sent_data['mobile']:""; ?>'/>							
					</span>
				</div>
				<div class='input-row' id='row-email'>
					<span class='input-left'>
						<span><label for='email'>Email</label></span>
					</span>
					<span class='input-right'>
						<input type="text" id='email' name='email' placeholder='Email Address' value='<?php echo isset($sent_data['email'])?$sent_data['email']:""; ?>'/>							
						<input type="text" id='confirm-email' name='confirm-email' placeholder='Confirm Email'/>							
					</span>
				</div>
				<div class='input-row' id='row-branch'>
					<span class='input-left'>
						<span><label for='branch'>SM Store Branch</label></span>
					</span>
					<span class='input-right'>							
						<select type="text" id='branch' name='branch' placeholder='SM Store Branch'>							
						<option value="0" >--Select Branch--</option>
						<option value="SM CUBAO" <?php echo (isset($sent_data['branch']) && $sent_data['branch']=='SM CUBAO')?"selected":""; ?>>SM CUBAO</option>
						<option value="SM MAKATI" <?php echo (isset($sent_data['branch']) && $sent_data['branch']=='SM MAKATI')?"selected":""; ?>>SM MAKATI</option>
						<option value="SM HARRISON" <?php echo (isset($sent_data['branch']) && $sent_data['branch']=='SM HARRISON')?"selected":""; ?>>SM HARRISON</option>
						<option value="SM STA. MESA" <?php echo (isset($sent_data['branch']) && $sent_data['branch']=='SM STA. MESA')?"selected":""; ?>>SM STA. MESA</option>
						<option value="SM NORTH EDSA" <?php echo (isset($sent_data['branch']) && $sent_data['branch']=='SM NORTH EDSA')?"selected":""; ?>>SM NORTH EDSA</option>
						<option value="SM MEGAMALL" <?php echo (isset($sent_data['branch']) && $sent_data['branch']=='SM MEGAMALL')?"selected":""; ?>>SM MEGAMALL</option>
						<option value="SM BACOOR" <?php echo (isset($sent_data['branch']) && $sent_data['branch']=='SM BACOOR')?"selected":""; ?>>SM BACOOR</option>
						<option value="SM FAIRVIEW" <?php echo (isset($sent_data['branch']) && $sent_data['branch']=='SM FAIRVIEW')?"selected":""; ?>>SM FAIRVIEW</option>
						<option value="SM CEBU" <?php echo (isset($sent_data['branch']) && $sent_data['branch']=='SM CEBU')?"selected":""; ?>>SM CEBU</option>
						<option value="SM MANILA" <?php echo (isset($sent_data['branch']) && $sent_data['branch']=='SM MANILA')?"selected":""; ?>>SM MANILA</option>
						<option value="SM ILOILO" <?php echo (isset($sent_data['branch']) && $sent_data['branch']=='SM ILOILO')?"selected":""; ?>>SM ILOILO</option>
						<!--option value="SM BICUTAN" <?php echo (isset($sent_data['branch']) && $sent_data['branch']=='SM BICUTAN')?"selected":""; ?>>SM BICUTAN</option-->
						<option value="SM SOUTHMALL" <?php echo (isset($sent_data['branch']) && $sent_data['branch']=='SM SOUTHMALL')?"selected":""; ?>>SM SOUTHMALL</option>
						<option value="SM PAMPANGA" <?php echo (isset($sent_data['branch']) && $sent_data['branch']=='SM PAMPANGA')?"selected":""; ?>>SM PAMPANGA</option>
						<option value="SM DAVAO" <?php echo (isset($sent_data['branch']) && $sent_data['branch']=='SM DAVAO')?"selected":""; ?>>SM DAVAO</option>
						<option value="SM LANANG" <?php echo (isset($sent_data['branch']) && $sent_data['branch']=='SM LANANG')?"selected":""; ?>>SM LANANG</option>
						<option value="SM GENERAL SANTOS" <?php echo (isset($sent_data['branch']) && $sent_data['branch']=='SM GENERAL SANTOS')?"selected":""; ?>>SM GENERAL SANTOS</option>
						<option value="SM AURA" <?php echo (isset($sent_data['branch']) && $sent_data['branch']=='SM AURA')?"selected":""; ?>>SM AURA</option>
						<option value="SM CAGAYAN DE ORO" <?php echo (isset($sent_data['branch']) && $sent_data['branch']=='SM CAGAYAN DE ORO')?"selected":""; ?>>SM CAGAYAN DE ORO</option>
						<!--option value="SM LUCENA" <?php echo (isset($sent_data['branch']) && $sent_data['branch']=='SM LUCENA')?"selected":""; ?>>SM LUCENA</option-->
						<option value="SM MARILAO" <?php echo (isset($sent_data['branch']) && $sent_data['branch']=='SM MARILAO')?"selected":""; ?>>SM MARILAO</option>
						<option value="SM BAGUIO" <?php echo (isset($sent_data['branch']) && $sent_data['branch']=='SM BAGUIO')?"selected":""; ?>>SM BAGUIO</option>
						<option value="SM BACOLOD" <?php echo (isset($sent_data['branch']) && $sent_data['branch']=='SM BACOLOD')?"selected":""; ?>>SM BACOLOD</option>
						<option value="SM DASMARINAS" <?php echo (isset($sent_data['branch']) && $sent_data['branch']=='SM DASMARINAS')?"selected":""; ?>>SM DASMARINAS</option>
						<option value="SM BATANGAS" <?php echo (isset($sent_data['branch']) && $sent_data['branch']=='SM BATANGAS')?"selected":""; ?>>SM BATANGAS</option>
						<option value="SM SUCAT" <?php echo (isset($sent_data['branch']) && $sent_data['branch']=='SM SUCAT')?"selected":""; ?>>SM SUCAT</option>
						<option value="SM SAN LAZARO" <?php echo (isset($sent_data['branch']) && $sent_data['branch']=='SM SAN LAZARO')?"selected":""; ?>>SM SAN LAZARO</option>
						<option value="SM CLARK" <?php echo (isset($sent_data['branch']) && $sent_data['branch']=='SM CLARK')?"selected":""; ?>>SM CLARK</option>
						<option value="SM STA. ROSA" <?php echo (isset($sent_data['branch']) && $sent_data['branch']=='SM STA. ROSA')?"selected":""; ?>>SM STA. ROSA</option>
						<option value="SM MALL OF ASIA" <?php echo (isset($sent_data['branch']) && $sent_data['branch']=='SM MALL OF ASIA')?"selected":""; ?>>SM MALL OF ASIA</option>
						<option value="SM LIPA" <?php echo (isset($sent_data['branch']) && $sent_data['branch']=='SM LIPA')?"selected":""; ?>>SM LIPA</option>
						<option value="SM TARLAC" <?php echo (isset($sent_data['branch']) && $sent_data['branch']=='SM TARLAC')?"selected":""; ?>>SM TARLAC</option>
						<option value="SM CALAMBA" <?php echo (isset($sent_data['branch']) && $sent_data['branch']=='SM CALAMBA')?"selected":""; ?>>SM CALAMBA</option>
						<option value="SM TAYTAY" <?php echo (isset($sent_data['branch']) && $sent_data['branch']=='SM TAYTAY')?"selected":""; ?>>SM TAYTAY</option>
						<option value="SM MARIKINA" <?php echo (isset($sent_data['branch']) && $sent_data['branch']=='SM MARIKINA')?"selected":""; ?>>SM MARIKINA</option>
						<option value="SM SAN FERNANDO" <?php echo (isset($sent_data['branch']) && $sent_data['branch']=='SM SAN FERNANDO')?"selected":""; ?>>SM SAN FERNANDO</option>
						<option value="SM CONSOLACION" <?php echo (isset($sent_data['branch']) && $sent_data['branch']=='SM CONSOLACION')?"selected":""; ?>>SM CONSOLACION</option>
						<option value="SM OLONGAPO" <?php echo (isset($sent_data['branch']) && $sent_data['branch']=='SM OLONGAPO')?"selected":""; ?>>SM OLONGAPO</option>
						<option value="SM SAN PABLO" <?php echo (isset($sent_data['branch']) && $sent_data['branch']=='SM SAN PABLO')?"selected":""; ?>>SM SAN PABLO</option>
						<option value="SM NOVALICHES" <?php echo (isset($sent_data['branch']) && $sent_data['branch']=='SM NOVALICHES')?"selected":""; ?>>SM NOVALICHES</option>
						<option value="SM NAGA" <?php echo (isset($sent_data['branch']) && $sent_data['branch']=='SM NAGA')?"selected":""; ?>>SM NAGA</option>
						<option value="SM ROSALES" <?php echo (isset($sent_data['branch']) && $sent_data['branch']=='SM ROSALES')?"selected":""; ?>>SM ROSALES</option>
						<option value="SM MASINAG" <?php echo (isset($sent_data['branch']) && $sent_data['branch']=='SM MASINAG')?"selected":""; ?>>SM MASINAG</option>
						</select>
					</span>
				</div>
				<div class='input-row' id='row-codes'>
					<span class='input-left'>
						<span><label for='unique-code'>Unique Code</label></span>
					</span>
					<span class='input-right'>							
						<input type="text" id='unique-code' name='unique-code' placeholder='Unique Code'/>							
					</span>
				</div>					
							
			</div>		
		</td>
		<td style='vertical-align:top;'>
			<div style="margin-top:20px;">
				<div class='input-row'>
					<span class='input-left'>
						<span><label for='captcha'>Captcha</label></span>
					</span>
					<span class='input-right'>							
						<?php
						require_once($_SERVER['DOCUMENT_ROOT']."/lib/recaptchalib.php");
						$publickey = "6LeqtuMSAAAAAEnsE8Lxs7yCTZ1_tzqT_pLKDk9k";
						?>	
						<span class='captcha-container' id='captcha-container'><?php echo recaptcha_get_html($publickey); ?></span>															
					</span>
				</div>	
				<div class='input-row' id='row-terms'>		
					<span class='input-left'>
						<span></span>
					</span>				
					<span class='input-right'>							
						<span>
							<input type="checkbox" name='terms-and-condition' id='terms-and-condition'/>
							<span><label for='terms-and-condition' style='letter-spacing:1px;'>I accept the terms of use applicable to my country of residence and if under 18 years old, I agree and acknowledge that my parent or guardian has also reviewed and accepted the terms of use on my behalf.</label></span>
						</span>
					</span>
				</div>
				<div class='input-row'>	
					<span class='input-left'>
						<span></span>
					</span>									
					<span class='input-right align-center'>							
						<input type="submit" name='submit' value='Submit'/>						
					</span>
				</div>	
			</div>
		</td>
		</tr></table>	
		</form>
	</span>
</div>
<div id='dialog'><div id='dialog-container'></div></div>
<script>
$(function(){
	//var dob_regex = /^([0-9]){2}(\/){1}([0-9]){2}(\/)([0-9]){4}$/;   // DD/MM/YYYY
	var email_regex = /^[a-zA-Z0-9._-]+@([a-zA-Z0-9.-]+\.)+[a-zA-Z0-9.-]{2,4}$/;  // email address
	//var string_regex = /^[\w.#+,.() -]+$/;  // allowed characters: any word . -, ( \w ) represents any word character (letters, digits, and the underscore _ ), equivalent to [a-zA-Z0-9_]
	var string_regex = /^[a-zA-Z0-9_ ,.+#()\@\n-]+$/;
	var name_regex = /^[a-zA-Z0-9 .,-]+$/;
	//var num_regex = /^\d+$/; // numeric digits only
	//var search_regex = "/hello/"; 
	//var password_regex = /^[A-Za-z\d]{6,8}$/;  // any upper/lowercase characters and digits, between 6 to 8 characters in total
	//var phone_regex = /^\(\d{3}\) \d{3}-\d{4}$/;  // (xxx) xxx-xxxx  
	var phone_regex = /^[0-9 +()-]+$/;
	//var question_regex = /\?$/; // ends with a question mark
	var codes_regex = /^[a-zA-Z0-9]+$/; //unique code

	function validateFirstname(obj){
		var input = obj.val();		
		$("#error-name").remove();
		if(!name_regex.test(input)){
			$("#row-name").append("<p id='error-name' class='error'>Invalid format or Firstname and Lastname must not be empty. Valid characters are \"space\" \"a-z\" \"A-Z\" \"0-9\" and special charters like \",.-\"</p>");
			return false;
		}else{
			return true;
		}
	}
	function validateLastname(obj){
		var input = obj.val();
		$("#error-name").remove();
		if(!name_regex.test(input)){
			$("#row-name").append("<p id='error-name' class='error'>Invalid format or Firstname and Lastname must not be empty. Valid characters are \"space\" \"a-z\" \"A-Z\" \"0-9\" and special charters like \",.-\"</p>");
			return false;
		}else{
			return true;
		}
	}
	function validateAddress(obj){
		var input = obj.val();
		$("#error-address").remove();		
		if(!string_regex.test(input)){
			$("#row-address").append("<p id='error-address' class='error'>Invalid format or Address must not be empty. Valid characters are \"space\" \"a-z\" \"A-Z\" \"0-9\" and special charters like \",.+#()@-\"</p>");
			return false;
		}else{
			return true;
		}
	}
	function validateMobile(obj){
		var input = obj.val();
		$("#error-mobile").remove();
		if(!phone_regex.test(input)){
			$("#row-mobile").append("<p id='error-mobile' class='error'>Invalid format or Mobile must not be empty. valid characters are \"0-9()-+\" and space.</p>");			
			return false;
		}else{
			return true;
		}
	}
	function validateEmail(obj){
		var input = obj.val();
		$("#error-email").remove();
		if(!email_regex.test(input)){
			$("#row-email").append("<p id='error-email' class='error'>Invalid format or Email must not be empty.</p>");						
			return false;
		}else{
			return true;
		}
	}
	function validateConfirmationEmail(obj1, obj2){
		var input = obj1.val();
		var email = obj2.val();		
		$("#error-c-email").remove();
		if(input != email){
			$("#row-email").append("<p id='error-c-email' class='error'>Invalid confirmation Email.</p>");						
			return false;
		}else{
			return true;
		}
	}
	function validateBranch(obj){
		var input = obj.val();
		$("#error-branch").remove();
		if(input == 0){
			$("#row-branch").append("<p id='error-branch' class='error'>You must select a branch.</p>");
			return false;
		}else{
			return true;
		}
	}
	function validateCodes(obj){
		var input = obj.val();
		$("#error-codes").remove();
		if(!codes_regex.test(input)){
			$("#row-codes").append("<p id='error-codes' class='error'>Unique codes must be alpha numeric string without space and without special characters.</p>");			
			return false;
		}else{
			return true;
		}
	}
	function validateTermsCondition(obj){
		$("#error-terms").remove();		
		if(!obj[0].checked){
			$("#row-terms").append("<p id='error-terms' class='error'>You must agree to the terms and conditions before submition of entry.</p>");			
			return false;
		}else{
			return true;	
		}		
	}
	$("#first-name").on('focusout',function(){
		validateFirstname($(this));
	});
	$("#last-name").on('focusout',function(){
		validateLastname($(this));
	});
	$("#address").on('focusout',function(){
		validateAddress($(this));
	});
	$("#mobile").on('focusout',function(){
		validateMobile($(this));
	});
	$("#email").on('focusout',function(){
		validateEmail($(this));
	});
	$("#confirm-email").on('focusout',function(){
		validateConfirmationEmail($(this),$("#email"));
	});
	$("#branch").on('focusout',function(){
		validateBranch($(this));
	});
	$('#unique-code').on('focusout',function(){
		validateCodes($(this));
	});

	$("#sm-form").submit(function(){		
		var validate_return = true;

		if(!validateFirstname($("#first-name"))) validate_return = false;
		if(!validateLastname($("#last-name"))) validate_return = false;		
		if(!validateAddress($("#address"))) validate_return = false;	
		if(!validateMobile($("#mobile"))) validate_return = false;
		if(!validateEmail($("#email"))) validate_return = false;		
		if(!validateConfirmationEmail($("#confirm-email"),$("#email"))) validate_return = false;
		if(!validateBranch($("#branch"))) validate_return = false;
		if(!validateCodes($("#unique-code"))) validate_return = false;
		if(!validateTermsCondition($("#terms-and-condition"))) validate_return = false;

		if(!validate_return){				
			$("div[id=dialog]").dialog({
				title : "Form Validation",
				width:480,
				height:300,
				buttons: {					
					"Close":function(){
						$(this).dialog("close");							
					}
				},
				open: function(event,ui){		
					$("body").addClass("stop-scrolling");			
					$("div[id=dialog-container]").html("<p class='error-dialog'><span style='display:block; font-size:20px;'>Error</span>All fields are required and must be valid. Please verify all fields before submission of your entry.</p>");
				}
			}).dialog("open");				
		}				
		return validate_return;		
	});	

	$("div[id=dialog]").dialog({						
		modal : true,		
		resizable:false,
		draggable:false,
		show: { effect: 'drop', direction: "up",duration:800 },
		hide: { effect: 'drop', direction: "up",duration:800 },
		autoOpen: false,
		beforeClose: function(event, ui) {		
		  	$("body").removeClass("stop-scrolling");
		}
	});		
	$("span[id=promo-mechanics]").click(function(){
		$("div[id=dialog]").dialog({
			title : "Terms and Conditions",
			width:680,
			height:500,
			buttons: {					
				"Close":function(){
					$(this).dialog("close");
				}
			},
			open: function(event,ui){				
				$("body").addClass("stop-scrolling");	
				$("div[id=dialog-container]").html("<p class='info-dialog'></p>");
				$.ajax({
					url:"/super-market/mechanics.php"
				}).done(function(data){
					$("p.info-dialog").append(data);	
				});				
			}
		}).dialog("open");
	});
	<?php if(isset($notice['error-message'])): ?>
	$("div[id=dialog]").dialog({
		title : "Error Message",
		width:480,
		height:300,
		buttons: {					
			"Close":function(){
				$(this).dialog("close");							
			}
		},
		open: function(event,ui){		
			$("body").addClass("stop-scrolling");			
			$("div[id=dialog-container]").html("<p class='error-dialog'><span style='display:block; font-size:20px;'>Error</span><?php echo $notice['error-message']; ?></p>");
		}
	}).dialog("open");	
	<?php elseif(isset($notice['success-message'])): ?>
	$("div[id=dialog]").dialog({
		title : "Success Message",
		width:680,
		height:400,
		buttons: {					
			"Close":function(){
				$(this).dialog("close");							
				document.location.href = "/tuesdayggp";
			},
			"Submit Again":function(){
				$(this).dialog("close");								
			}
		},
		open: function(event,ui){		
			$("body").addClass("stop-scrolling");			
			$.ajax({
				url:"/super-market/success.php"
			}).done(function(data){	
				$("div[id=dialog-container]").html("<p class='success-dialog'></p>");
				$("p.success-dialog").append(data);
			});	
			
		}
	}).dialog("open");	
	<?php endif; ?>
});
</script>
