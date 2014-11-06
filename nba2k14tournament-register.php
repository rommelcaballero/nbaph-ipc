<?php
	$www = @$_GET['www'];
	
        $part_page = "index";
        $beta = false;
        include('queries/index-queries-new.php');

                if($num_wall_videos > 0){
                        $csrf = md5("nbaph-".@date("Y-m-d")."-".@$_SERVER['HTTP_X_FORWARDED_FOR']."-".@$_SERVER['REMOTE_ADDR']);
                        $_SESSION['_csrf'] = $csrf;
                        $up = '1';
                }

?>


<!DOCTYPE html>
<html>
<head>
	<title>NBA Philippines</title>
	<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1" /> 	
	
	<META http-equiv="X-UA-Compatible" content="IE=9" />
	<meta http-equiv="Cache-control" content="public">
	
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="style-index.css">
	<link rel="stylesheet" type="text/css" href="style-new.css">
	
	<!--<link rel="stylesheet" href="jquery-ui.css" />-->
	<script type="text/javascript" src="jquery-1.9.1.js"></script>
	<!--<script type="text/javascript" src="jquery-ui.js"></script>-->
	<script type="text/javascript" src="carousel-index.js"></script>

	<link rel="stylesheet" type="text/css" href="2k14-jquery-ui.css">
	<script src="2k14-jquery-1.10.2.js"></script>
	<script src="2k14-jquery-ui.js"></script>
	<link rel="stylesheet"type="text/css"  href="2k14-style.css">
	
	<?php //include('leaderboards_js.php'); ?>

	<style>
    body { font-size: 62.5%; }
    label, input { display:block; }
    input.text { margin-bottom:12px; width:95%; padding: .4em; }
    fieldset { padding:0; border:0; margin-top:25px; }
    h1 { font-size: 1.2em; margin: .6em 0; }
    div#users-contain { width: 350px; margin: 20px 0; }
    div#users-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
    div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
    .ui-dialog .ui-state-error { padding: .3em; }
    .validateTips { border: 1px solid transparent; padding: 0.3em; }
  </style>
  <script>

  $(function() {
    var dialog, form,
	
      // From http://www.whatwg.org/specs/web-apps/current-work/multipage/states-of-the-type-attribute.html#e-mail-state-%28type=email%29
      emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
      name = $( "#name" ),
      email = $( "#email" ),
      password = $( "#password" ),
      allFields = $( [] ).add( name ).add( email ).add( password ),
      tips = $( ".validateTips" );
 
    function updateTips( t ) {
      tips
        .text( t )
        .addClass( "ui-state-highlight" );
      setTimeout(function() {
        tips.removeClass( "ui-state-highlight", 1500 );
      }, 500 );
    }
 
    function checkLength( o, n, min, max ) {
      if ( o.val().length > max || o.val().length < min ) {
        o.addClass( "ui-state-error" );
        updateTips( "Length of " + n + " must be between " +
          min + " and " + max + "." );
        return false;
      } else {
        return true;
      }
    }
 
    function checkRegexp( o, regexp, n ) {
      if ( !( regexp.test( o.val() ) ) ) {
        o.addClass( "ui-state-error" );
        updateTips( n );
        return false;
      } else {
        return true;
      }
    }
 
    function addUser() {
      var valid = true;
      allFields.removeClass( "ui-state-error" );
 
      valid = valid && checkLength( name, "username", 3, 16 );
      valid = valid && checkLength( email, "email", 6, 80 );
      valid = valid && checkLength( password, "password", 5, 16 );
 
      valid = valid && checkRegexp( name, /^[a-z]([0-9a-z_\s])+$/i, "Username may consist of a-z, 0-9, underscores, spaces and must begin with a letter." );
      valid = valid && checkRegexp( email, emailRegex, "eg. ui@jquery.com" );
      valid = valid && checkRegexp( password, /^([0-9a-zA-Z])+$/, "Password field only allow : a-z 0-9" );
 
      if ( valid ) {
        $( "#users tbody" ).append( "<tr>" +
          "<td>" + name.val() + "</td>" +
          "<td>" + email.val() + "</td>" +
          "<td>" + password.val() + "</td>" +
        "</tr>" );
        dialog.dialog( "close" );
      }
      return valid;
    }
	
	function addMessage(){
		$( "#dialog-form" ).dialog("close");
		$( "#dialog-message" ).dialog( "open" );
	}

    dialog = $( "#dialog-form" ).dialog({
      autoOpen: false,
      height: 300,
      width: 350,
      modal: true,
	  
	  show: {
        effect: "fade",
        duration: 1000
      },
		
	  hide: {
        effect: "fade",
        duration: 1000
      },

      buttons: {
        " Submit ": addMessage,
        Cancel: function() {
          dialog.dialog( "close" );		  
        }
      },
      close: function() {
        form[ 0 ].reset();
        allFields.removeClass( "ui-state-error" );
	
      }
    });
 
    form = dialog.find( "form" ).on( "submit", function( event ) {
      event.preventDefault();
      addUser();
    });
 
    $( "#create-user" ).button().on( "click", function() {
      dialog.dialog( "open" );
    });

	$( "#create-user2" ).button().on( "click", function() {
      dialog.dialog( "open" );
    });

  });
  </script>

  <script>
  $(function() {
    $( "#dialog-message" ).dialog({
	  autoOpen: false,
      modal: true,

	  hide: {
        effect: "fade",
        duration: 1000
      },

      buttons: {
        Ok: function() {
          $( this ).dialog( "close" );
        }
      }
    });
  });
  </script>

	</head>
	<body>


<?php
if($up=='1' & $www==''){
//include('wall.php');
//$go ='';
$start='';
}

if($www!=="ph"){
//exit();
}

?>


		<?php //include('layouts/popups.php'); ?>
		<div id="wrapper">
			<?php include('layouts/header.php'); ?>
			<div id="main_content" > 
				<div id='header'>
	      	  		<div style="height: 30px"></div>
	          		<div style="width: 958px; min-height: 20px; margin: 0 auto; text-align: center;">
						<?php //echo $ads_list['nba_homepage_top_leaderboard'];?>
	          		</div>    	          		
					<div style="width: 995px;  margin: 0 auto; text-align: center; background: #fff; padding-left:5px;">
						<!--
						<iframe src="http://ph.global.nba.com/hpscoreboardiframe.html" align="center" frameborder="0" width="1000" height="143" scrolling="no" marginwidth="0" marginheight="0" style="text-align:center; align: center; margin: 0; padding: 0; marginwidth:0"></iframe>
						-->
					</div>
				</div>

<div id="container" style="position:relative">
	<div id="img" style="width: 958px; min-height: 40px; margin: 0 auto; text-align: center;">
			<img src="/images/bannerlayout.jpg" style="width:450px">		
		<div id="learnmore"  style="position:absolute;top:423px;left:604px;">
			<!--<a href="/nba2k14tournament-learnmore.php"><img src="/images/learnmore.png" style="width:80px;"></a>-->
		</div>				
	</div>
</div>


<div id="container2" style="position:relative; height:80px">
		<div id="create-user" style="position:absolute;left:286px;top:30px;">
			<a href="#"><img src="/images/nba2k14_tournament_register.png" style="width:200px;"></a>
		</div>
		
		<div id="create-user2" style="position:absolute;left:515px;top:30px;">
			<a href="#"><img src="/images/nba2k14_workshop_register.png" style="width:200px;"></a>
		</div>
</div>


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
		<?php //include("layouts/background_ads.php"); ?>
            
                <?php //if(count($wall_videos) > 0) include("wall.php"); ?>  	
<?php 
//		if($go == '1'){
//			if($num_wall_videos > 0) {
  //                      	include("wall.php");
//				$go ='';
//				$start = '';
  //                      }
//		}

?>

<div id="dialog-form" title="Create new user">
  <p class="validateTips">All form fields are required.</p>
 
  <form>
    <fieldset>
      <label for="name">Name</label>
      <input type="text" name="name" id="name" value="Jane Smith" class="text ui-widget-content ui-corner-all">
      <label for="email">Email</label>
      <input type="text" name="email" id="email" value="jane@smith.com" class="text ui-widget-content ui-corner-all">
      <label for="password">Password</label>
      <input type="password" name="password" id="password" value="xxxxxxx" class="text ui-widget-content ui-corner-all">
 
      <!-- Allow form submission with keyboard without duplicating the dialog button -->
      <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
    </fieldset>
  </form>
</div>

<div id="dialog-message" title="Download complete">
  <p>
    <span class="ui-icon ui-icon-circle-check" style="float:left; margin:0 7px 50px 0;"></span>
    Your files have downloaded successfully into the My Downloads folder.
  </p>
  <p>
    Currently using <b>36% of your storage space</b>.
  </p>
</div>
	
	</body>

</html>
