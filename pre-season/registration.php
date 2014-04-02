<?php if(($register == '1') || ($register =="error")): ?>
<style>
	.pre-season-registration{
		min-height:100px;
		width: 600px;
		margin: 0 auto;		
		padding:50px 50px 10px 50px;
	}
	.input-row{		
		margin: 0 0 10px;		
		min-height: 40px;
	}
	.input-left{
		display: inline-block;
		width: 140px;				
	}
	.input-left label{
		text-align: right;				
		display: block;
		margin-right: 10px;
		color:#878787;
	}
	.input-right{
		display: inline-block;
		width: 400px;
	}
	.input-right .input-text input{
		width: 180px;
		margin-right: 5px;	
		color:#fff;
		background: #878787;
		border: none;
		padding:3px 5px;
		font-size:14px;
	}
	.input-right .input-select select{
		width: 120px;
		margin-right: 5px;	
		color:#fff;
		background: #878787;
		border: none;
		padding:3px;
		font-size:14px;		
	}	
	.input-right .input-checkbox label{
		color:#878787;
		font-size: 12px;	
	}

	.input-right .input-submit input{
		color:#878787;
		padding:4px 20px;
		font-weight: bold;
		cursor: pointer;
	}
	.input-right .input-submit input:hover{
		color:#333;
	}
	.error{
		color:#ee174c;
		margin-bottom: 20px;
	}
</style>
<div class ="pre-season-registration">
	<?php if(isset($error)): ?>
		<p class='error'>ERROR : <?php echo $error['message']; ?></p>
	<?php endif; ?>
	<form method="POST" action="/pre-season.php?register=1">
		<div class='input-row'>
			<span class='input-left'>
				<label for='firstname'>Name</label>
			</span>
			<span class='input-right'>
				<span class='input-text'><input name='firstname' id='firstname' maxlength="50" type='text' placeholder="First Name" required value="<?php echo isset($firstname)?$firstname:''; ?>"/></span>
				<span class='input-text'><input name='lastname' id='lastname' maxlength="50" type='text' placeholder="Last Name" required value="<?php echo isset($lastname)?$lastname:''; ?>"/></span>
			</span>
		</div>
		<div class='input-row'>
			<span class='input-left'>
				<label for='mobile'>Mobile</label>
			</span>
			<span class='input-right'>
				<span class='input-text'><input name='mobile' id='mobile' maxlength="30" type='text' placeholder="Mobile Number" required value="<?php echo isset($mobile)?$mobile:''; ?>"/></span>			
			</span>
		</div>
		<div class='input-row'>
			<span class='input-left'>
				<label for='birth-month'>
					Date of Birth
				</label>
			</span>
			<span class='input-right'>
				<span class='input-select'>
					<select name='birth-month' id='birth-month' required='required'>
						<option value>Month</option>
						<option value="1" <?php echo isset($birth_month)?(($birth_month=="1")?"selected='selected'":""):""; ?>>January</option>
						<option value="2" <?php echo isset($birth_month)?(($birth_month=="2")?"selected='selected'":""):""; ?>>February</option>
						<option value="3" <?php echo isset($birth_month)?(($birth_month=="3")?"selected='selected'":""):""; ?>>March</option>
						<option value="4" <?php echo isset($birth_month)?(($birth_month=="4")?"selected='selected'":""):""; ?>>April</option>
						<option value="5" <?php echo isset($birth_month)?(($birth_month=="5")?"selected='selected'":""):""; ?>>May</option>
						<option value="6" <?php echo isset($birth_month)?(($birth_month=="6")?"selected='selected'":""):""; ?>>June</option>
						<option value="7" <?php echo isset($birth_month)?(($birth_month=="7")?"selected='selected'":""):""; ?>>July</option>
						<option value="8" <?php echo isset($birth_month)?(($birth_month=="8")?"selected='selected'":""):""; ?>>August</option>
						<option value="9" <?php echo isset($birth_month)?(($birth_month=="9")?"selected='selected'":""):""; ?>>September</option>
						<option value="10" <?php echo isset($birth_month)?(($birth_month=="10")?"selected='selected'":""):""; ?>>October</option>
						<option value="11" <?php echo isset($birth_month)?(($birth_month=="11")?"selected='selected'":""):""; ?>>November</option>
						<option value="12" <?php echo isset($birth_month)?(($birth_month=="12")?"selected='selected'":""):""; ?>>December</option>							
					</select>
				</span>
				<span class='input-select'>
					<select name='birth-day' id='birth-day' required='required'>
						<option value selected="selected">Day</option>
						<?php for($a=1; $a<=31; $a++): ?>
						<option value="<?php echo $a; ?>" <?php echo isset($birth_day)?(($birth_day==$a)?"selected='selected'":""):""; ?>><?php echo $a; ?></option>	
						<?php endfor; ?>
					</select>
				</span>
				<span class='input-select'>
					<select name='birth-year' id='birth-year' required='required'>
						<option value selected="selected">Year</option>
						<?php for($b=2013; $b>=1920; $b--): ?>
						<option value="<?php echo $b; ?>" <?php echo isset($birth_year)?(($birth_year==$b)?"selected='selected'":""):""; ?>><?php echo $b; ?></option>	
						<?php endfor; ?>
					</select>
				</span>
			</span>
		</div>
		<div class='input-row'>
			<span class='input-left'>
				<label for='email'>Email</label>
			</span>
			<span class='input-right'>
				<span class='input-text'><input name='email' id='email' maxlength="50" type='text' placeholder="Email Address" required value="<?php echo isset($email)?$email:""; ?>"/></span>
				<span class='input-text'><input name='confirm_email' id='confirm_email' maxlength="50" type='text' placeholder="Confirm Email" required value="<?php echo isset($email_confirm)?$email_confirm:""; ?>"/></span>
			</span>
		</div>		
		<div class='input-row'>
			<span class='input-left'>
				<label><span>&nbsp;</span></label>
			</span>
			<span class='input-right'>
				<span class='input-checkbox'>															
					<input type="checkbox" name="recieved-other-promo" id="recieved-other-promo" checked='checked' />
					<label for='recieved_other_promo' >Receive news and updates from NBA Philippines to this email address.</label> 				
				</span>	
			</span>
		</div>
		<div class='input-row'>
			<span class='input-left'>
				<label><span>&nbsp;</span></label>
			</span>
			<span class='input-right'>
				<span class='input-checkbox'>															
					<input type="checkbox" name="agreed-to-terms" id="agreed-to-terms" required />
					<label for='agreed-to-terms' >I accept the Terms of Use applicable to my country of residence and if under 18 years old, agree and acknowledge that my parent or guardian has also reviewed and accepted the Terms of Use on my behalf.</label> 				
				</span>	
			</span>
		</div>
		<div class='input-row space-top'>
			<span class='input-left'></span>
			<span class='input-right'>
				<span class='input-submit'>
					<span><input type='submit' name="submit" value="Submit"/></span>
				</span>
			</span>
		</div>
	</form>
</div>
<?php elseif($register == "complete"): ?>
<style>
	.pre-season-registration{
		min-height:100px;
		width: 600px;
		margin: 0 auto;		
		padding:150px 120px;
		text-align: center;
	}	
	.pre-season-registration span{
		font-size:16px;
		display: block;

	}
	.pre-season-registration span.title{
		font-weight: bold;
	}
</style>	
<div class="pre-season-registration">
	<span class='title'>Thank you for registering at NBA Philippines!</span>
	<span>Please check your email inbox or spam/junk folder with the subject NBA PHILIPPINES UPDATES in order to verify your registration.</span>

</div>
<?php endif; ?>