
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
	 
	
	$("#LoginBtn").click(function(){
	 
		login();
		
	});
	
	
	
	
	
});

</script>


 
<script>
$(function() { 

	//$("a.registerbox").colorbox();
	
   //$("#ForgotLink").colorbox();
	//$("#ForgotLink").colorbox({width:"50%", inline:true, href:"register_box.php"});
   $("#ForgotLink").click(function(){
	 
		$("#RegisterTable").hide();
		$("#ForgotTable").show();
		
	}); 
   
   $("#ForgotCancel").click(function(){
	 
		$("#RegisterTable").show();
		$("#ForgotTable").hide();
		
	}); 
   
   $("#ForgotSubmit").click(function(){
	 
		 retrieve();
		
	}); 
   
   
})
</script>

<div id="RegisterBox" >

	<div style="margin: 0px; padding: 15px 0px 8px 0px; " >
    
    	<div class="lfloat" style="margin-left: 23px;" ><img src="images/nba_philippines.png"  /></div>
        
        <div class="clear_both" ></div>
        
    </div>
    
    <div id="LoginDivider" style="margin: 0 auto; border: 1px solid #4b4b4b; " >
    	
        <div style="height: 31px; background-image: url(images/login_grad1.gif); background-repeat: repeat-x; background-color: #5b5b5b;  " >
        </div>
        
    </div>
    
    <div style="margin: 0px; padding: 25px 0px 0px 0px; " >
    	
        <!-- left content -->
        <div class="lfloat" style="width: 373px; border-right: 1px solid #bbbbbb; "  >
        	
            <div style="padding: 0px 0px 20px 40px; " >
                
                <div id="ReqText" style="position: absolute; right: 20px; top: 28px; font-size: 7pt;  " >* Required</div>
                
            	<div style="font-size: 15pt; font-weight: bold; color: #000000; " >Returning All-Access Member?</div>
                <div style="margin: 0px; padding: 0px; font-size: 9pt; " >Membership Credetials: </div>
                <form method="post" id="login_form" >
                
                <div id="RegisterTable" style="padding-top: 5px; font-size: 8pt; font-weight: bold; " >
                
                	<table border="0" cellpadding="0" cellspacing="10" >
          
                        <tr>
                        	<td valign="middle" align="right" width="100" id="emailtxt" >* E-Mail</td>
                            <td  width="3" ></td>
                            <td  align="left" ><input type="text" class="reg_input"  name="nba_username" id="nba_username"  /></td>
                        </tr>
                        
                        <tr>
                        	<td valign="middle" align="right" id="passtxt" >* Password</td>
                            <td   ></td>
                            <td  align="left" ><input type="password" class="reg_input" name="nba_password" id="nba_password" /></td>
                        </tr>
                        
                        <tr>
                        	<td valign="middle" align="right" id="passtxt" ></td>
                            <td   ></td>
                            <td  align="left" >
                            	<input type="checkbox" name="remember">  <span style="font-weight: normal; font-size: 9pt; " >Remember me </span>
                            </td>
                        </tr>
                        
                        <tr>
                        	<td valign="middle" align="right" id="passtxt" ></td>
                            <td  ></td>
                            <td  align="left" ><span class="blue" style="font-weight: normal; font-size: 9pt; " ><a  href="#" id="ForgotLink" class="registerbox" >Forgot Password?</a></span></td>
                        </tr>
                        
                        
                        
                        <tr>
                        	<td valign="middle" align="right" id="passtxt" ></td>
                            <td  ></td>
                            <td  align="left" ><input type="button"  class="regbtn" value="login" id="LoginBtn"  /></td>
                        </tr>
                    
                        
                    </table>
                
                </div>
                
                
                <div id="ForgotTable" style="padding-top: 5px; font-size: 8pt; font-weight: bold; display: none; " >
                
                	<table border="0" cellpadding="0" cellspacing="10" >
          
                        <tr>
                        	<td valign="middle" align="right" width="100" id="emailtxt" >* E-Mail</td>
                            <td  width="3" ></td>
                            <td  align="left" ><input type="text" class="reg_input" name="nba_usernamer" id="nba_usernamer" /></td>
                        </tr>
                        
                        
                        
                        <tr>
                        	<td valign="middle" align="right" id="passtxt" ></td>
                            <td  ></td>
                            <td  align="left" ><input type="button"  class="regbtn" value="submit" id="ForgotSubmit"  /> <input type="button"  class="regbtn" value="cancel" id="ForgotCancel"  /></td>
                        </tr>
                    
                        
                    </table>
                
                </div>
                
                <div id="RegMessage" >
                	 
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