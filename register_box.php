
<style>
label.error {
	position: absolute;
	left: 340px;
	top: 5px;
	font-size: 8pt;
	font-style: italic;
	background-color: transparent;
	width: auto;
	width: 180px;

}



</style>
<script type="text/javascript" src="jquery.validate.js"></script>


<script type="text/javascript">


$(function() {
	

	
	//CLICKING SUBMIT BUTTON
	//$('#ReturnMessage').hide();
	
	/*$("#SubmitReg").click(function(){
	
		if($("#register_form").valid())
		 {
			register();
		 }
		//document.form_contact.submit();
		
	});
	
	
	$("#register_form").validate ({

		submitHandler:function(form) {
				register();
			},
				
		rules: {
			
			nbareg_firstname: {
				required: true
		
			},//
			
			nbareg_lastname: {
				required: true
		
			},
			
		   nbareg_email: {				// compound rule
				required: true,
				email: true
			},
		
		   nbareg_password: {
				required: true
		
			},
			
		},
		
		messages: {
			//contact_message: "Please enter a comment/message."
		}
		
	});*/
	
	$("#SubmitReg").click(function(){
	
		register();
		
	});
	
	
});

</script>

<div id="RegisterBox" >

	<div style="margin: 0px; padding: 15px 0px 8px 0px; " >

    	<div class="lfloat" style="margin-left: 23px;" ><img src="images/nba_philippines.png"  /></div>

        <div class="clear_both" ></div>

    </div>

    <div id="LoginDivider" style="margin: 0 auto; border: 1px solid #4b4b4b; " >
    	
        <div style="height: 31px; background-image: url(images/login_grad1.gif); background-repeat: repeat-x; background-color: #646464;  " >
        	<div ><img src="images/create_accttxt.png"  border="0" /></div>
        </div>

    </div>

    <div style="margin: 0px; padding: 25px 0px 0px 0px; " >
    	
        <!-- left content -->
        <div class="lfloat" style="width: 373px; border-right: 1px solid #bbbbbb; "  >

            <div style="padding: 0px 0px 20px 40px; " >

                <div id="ReqText" style="position: absolute; right: 20px; top: 8px; font-size: 7pt;  " >* Required</div>

            	<div style="font-size: 15pt; font-weight: bold; color: #000000; " >Create Your Account</div>
                <div style="margin: 0px; padding: 0px; font-size: 9pt; " >Membership Credetials: </div>
                <form method="post" id="registration_form" >
                <div id="RegisterTable" style="padding-top: 5px; font-size: 8pt; font-weight: bold; " >

                	<table border="0" cellpadding="0" cellspacing="10" >

                        <tr>
                        	<td valign="middle" align="right" width="85" id="fnametxt" >* First Name</td>
                            <td  width="8" ></td>
                            <td  align="left" ><input type="text" class="reg_input"  name="nbareg_firstname" id="nbareg_firstname" /></td>
                        </tr>

                        <tr>
                        	<td valign="middle" align="right" width="85" id="fnametxt" >* Middle Initial</td>
                            <td  width="8" ></td>
                            <td  align="left" ><input type="text" class="reg_input"  name="nbareg_initial" id="nbareg_initial" /></td>
                        </tr>

                        <tr>
                        	<td valign="middle" align="right" width="85" id="lnametxt" >* Last Name</td>
                            <td  width="8" ></td>
                            <td  align="left" ><input type="text" class="reg_input"  name="nbareg_lastname" id="nbareg_lastname"  /></td>
                        </tr>

                        <tr>
                        	<td valign="middle" align="right" width="85" id="fnametxt" >* Gender</td>
                           <td  width="8" ></td>
                           <td  align="left" >
                              <input type="radio" name="nbareg_gender" value="male" style="vertical-align: -3px" id="radio_male" checked="checked" />
                              <label for="radio_male">Male</label>
                              <input type="radio" name="nbareg_gender" value="female" style="vertical-align: -3px" id="radio_female" />
                              <label for="radio_female">Female</label>
                           </td>
                        </tr>

                        <tr>
                        	<td valign="middle" align="right" width="85" id="bdaytxt">* Birthday</td>
                            <td  width="8" ></td>
                            <td  align="left" >

                            	<select name="nbareg_month" class="reg_input" style="width: auto; " >
                                    <option value="01"<?php
                                    if ($_POST['nbareg_month'] == "01")
                                       echo ' selected="selected"';
                                    ?>>January</option>
                                    <option value="02"<?php
                                    if ($_POST['nbareg_month'] == "02")
                                       echo ' selected="selected"';
                                    ?>>February</option>
                                    <option value="03"<?php
                                    if ($_POST['nbareg_month'] == "03")
                                       echo ' selected="selected"';
                                    ?>>March</option>
                                    <option value="04"<?php
                                    if ($_POST['nbareg_month'] == "04")
                                       echo ' selected="selected"';
                                    ?>>April</option>
                                    <option value="05"<?php
                                    if ($_POST['nbareg_month'] == "05")
                                       echo ' selected="selected"';
                                    ?>>May</option>
                                    <option value="06"<?php
                                    if ($_POST['nbareg_month'] == "06")
                                       echo ' selected="selected"';
                                    ?>>June</option>
                                    <option value="07"<?php
                                    if ($_POST['nbareg_month'] == "07")
                                       echo ' selected="selected"';
                                    ?>>July</option>
                                    <option value="08"<?php
                                    if ($_POST['nbareg_month'] == "08")
                                       echo ' selected="selected"';
                                    ?>>August</option>
                                    <option value="09"<?php
                                    if ($_POST['nbareg_month'] == "09")
                                       echo ' selected="selected"';
                                    ?>>September</option>
                                    <option value="10"<?php
                                    if ($_POST['nbareg_month'] == "10")
                                       echo ' selected="selected"';
                                    ?>>October</option>
                                    <option value="11"<?php
                                    if ($_POST['nbareg_month'] == "11")
                                       echo ' selected="selected"';
                                    ?>>November</option>
                                    <option value="12"<?php
                                    if ($_POST['nbareg_month'] == "12")
                                       echo ' selected="selected"';
                                    ?>>December</option>
                                 </select>

                                 <select name="nbareg_date" class="reg_input" style="width: auto; " >
                        <?php
                        for ($i = 1; $i < 32; $i += 1) {
                        ?>
                                    <option value="<?php
                                    if ($i < 10)
                                       echo "0";
                                    echo $i;
                                    ?>"<?php
                                    if ($_POST['nbareg_date'] == "0$i" || $_POST['nbareg_date'] == "$i")
                                       echo ' selected="selected"';
                                    ?>><?php echo $i; ?></option>
                        <?php
                        }
                        ?>
                                 </select>

                                 <select name="nbareg_year" class="reg_input" style="width: auto; margin-left: 3px; " >
                        <?php
                        for ($i = date("Y"); $i >= 1950; $i -= 1) {
                        ?>
                                    <option value="<?php echo $i; ?>"<?php
                                    if ($_POST['nbareg_year'] == "$i")
                                       echo ' selected="selected"';
                                    ?>><?php echo $i; ?></option>
                        <?php
                        }
                        ?>
                                 </select>

                            </td>
                        </tr>

                        <tr>
                        	<td valign="middle" align="right" width="85" id="emailtxt" >* Email Address</td>
                            <td  width="8" ></td>
                            <td  align="left" ><input type="text" class="reg_input"  name="nbareg_email" id="nbareg_email"  /></td>
                        </tr>

                        <tr>
                        	<td valign="middle" align="right" width="85" id="lnametxt" >* Location</td>
                            <td  width="8" ></td>
                            <td  align="left" ><input type="text" class="reg_input"  name="nbareg_location" id="nbareg_location"  /></td>
                        </tr>

                        <tr>
                        	<td valign="middle" align="right" width="85" id="passtxt" >* Password</td>
                            <td  width="8" ></td>
                            <td  align="left" ><input type="password" class="reg_input" name="nbareg_password" id="nbareg_password" /></td>
                        </tr>

                        <tr>
                        	<td valign="middle" align="right" width="85" id="cpasstxt">* Confirm Password</td>
                            <td  width="8" ></td>
                            <td  align="left" ><input type="password" class="reg_input" name="nbareg_verify" id="nbareg_verify" /></td>
                        </tr>

                        <tr>
                        	<td valign="middle" width="85" id="lnametxt" colspan="3">
                              <div style="text-align: center">Favorite Team(s)</div>

                              <table style="font-weight: normal">
                                 <tr>
                                    <td style="width: 150px">
                                       <input type="checkbox" name="nbareg_favorite[]" value="Boston Celtics"> Boston Celtics
                                    </td>
                                    <td style="width: 150px">
                                       <input type="checkbox" name="nbareg_favorite[]" value="Dallas Mavericks"> Dallas Mavericks
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>
                                       <input type="checkbox" name="nbareg_favorite[]" value="Brooklyn Nets"> Brooklyn Nets
                                    </td>
                                    <td>
                                       <input type="checkbox" name="nbareg_favorite[]" value="Houston Rockets"> Houston Rockets
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>
                                       <input type="checkbox" name="nbareg_favorite[]" value="New York Knicks"> New York Knicks
                                    </td>
                                    <td>
                                       <input type="checkbox" name="nbareg_favorite[]" value="Memphis Grizzlies"> Memphis Grizzlies
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>
                                       <input type="checkbox" name="nbareg_favorite[]" value="Philadelphia 76ers"> Philadelphia 76ers
                                    </td>
                                    <td>
                                       <input type="checkbox" name="nbareg_favorite[]" value="New Orleans Hornets"> New Orleans Hornets
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>
                                       <input type="checkbox" name="nbareg_favorite[]" value="Toronto Raptors"> Toronto Raptors
                                    </td>
                                    <td>
                                       <input type="checkbox" name="nbareg_favorite[]" value="San Antonio Spurs"> San Antonio Spurs
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>
                                       <input type="checkbox" name="nbareg_favorite[]" value="Chicago Bulls"> Chicago Bulls
                                    </td>
                                    <td>
                                       <input type="checkbox" name="nbareg_favorite[]" value="Denver Nuggets"> Denver Nuggets
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>
                                       <input type="checkbox" name="nbareg_favorite[]" value="Cleveland Cavaliers"> Cleveland Cavaliers
                                    </td>
                                    <td>
                                       <input type="checkbox" name="nbareg_favorite[]" value="Minnesota Timberwolves"> Minnesota Timberwolves
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>
                                       <input type="checkbox" name="nbareg_favorite[]" value="Detroit Pistons"> Detroit Pistons
                                    </td>
                                    <td>
                                       <input type="checkbox" name="nbareg_favorite[]" value="Portland Trail Blazers"> Portland Trail Blazers
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>
                                       <input type="checkbox" name="nbareg_favorite[]" value="Indiana Pacers"> Indiana Pacers
                                    </td>
                                    <td>
                                       <input type="checkbox" name="nbareg_favorite[]" value="Oklahoma City Thunder"> Oklahoma City Thunder
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>
                                       <input type="checkbox" name="nbareg_favorite[]" value="Milwaukee Bucks"> Milwaukee Bucks
                                    </td>
                                    <td>
                                       <input type="checkbox" name="nbareg_favorite[]" value="Utah Jazz"> Utah Jazz
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>
                                       <input type="checkbox" name="nbareg_favorite[]" value="Atlanta Hawks"> Atlanta Hawks
                                    </td>
                                    <td>
                                       <input type="checkbox" name="nbareg_favorite[]" value="Golden State Warriors"> Golden State Warriors
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>
                                       <input type="checkbox" name="nbareg_favorite[]" value="Charlotte Bobcats"> Charlotte Bobcats
                                    </td>
                                    <td>
                                       <input type="checkbox" name="nbareg_favorite[]" value="Los Angeles Clippers"> Los Angeles Clippers
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>
                                       <input type="checkbox" name="nbareg_favorite[]" value="Miami Heat"> Miami Heat
                                    </td>
                                    <td>
                                       <input type="checkbox" name="nbareg_favorite[]" value="Los Angeles Lakers"> Los Angeles Lakers
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>
                                       <input type="checkbox" name="nbareg_favorite[]" value="Orlando Magic"> Orlando Magic
                                    </td>
                                    <td>
                                       <input type="checkbox" name="nbareg_favorite[]" value="Phoenix Suns"> Phoenix Suns
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>
                                       <input type="checkbox" name="nbareg_favorite[]" value="Washington Wizards"> Washington Wizards
                                    </td>
                                    <td>
                                       <input type="checkbox" name="nbareg_favorite[]" value="Sacramento Kings"> Sacramento Kings
                                    </td>
                                 </tr>
                              </table>
                           </td>
                        </tr>

                    </table>

                </div>

                <div id="RegMessage" >
                	
                </div>

                <div style="margin: 0px; padding: 10px 0px 0px 0px; font-size: 9pt; " >
                	<span class="blue" ><a href="#">Privacy Policy</a></span> and <span class="blue" ><a href="#">Terms of Use</a></span>.
                	<input type="button"  class="regbtn" value="register" id="SubmitReg" style="margin-left: 10px; " />
                </div>

                </form>

            </div>

        </div>
        <!-- end left content -->

        <!--<div class="lfloat" style="width: 15px; height: 165px;  margin-left: 10px; " ></div>-->

        <!-- right content -->
        <div class="lfloat" style="width: 341px; margin-left: 25px;  "  >

        	 <div style="padding: 0px 0px 20px 10px; " >

            	<div style="font-size: 15pt; font-weight: bold; color: #000000; " >Facebook User?</div>
                <div style="margin: 0px; padding: 0px; font-size: 9pt; " >Connect even faster and make the most out of your membership:</div>

               <div class="fb-login-button" scope="email,user_birthday,publish_stream">Login with Facebook</div>
          </div>

        </div>
        <!-- end right content -->

        <div class="clear_both" ></div>

    </div>

</div>