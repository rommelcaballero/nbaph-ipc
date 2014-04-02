<?php

    //replace access token for FB app from here:
    //http://www.neosmart.de/social-media/facebook-wall/
    //error_reporting(E_ALL);
    $part_page = "pre-season";
    
    include 'queries/pre-season-queries.php';

    if(isset($_POST['submit'])){

        //process registration
        $firstname = isset($_POST['firstname'])?filter_var($_POST['firstname'],FILTER_SANITIZE_STRING):false;
        $lastname = isset($_POST['lastname'])?filter_var($_POST['lastname'],FILTER_SANITIZE_STRING):false;
        $mobile = isset($_POST['mobile'])?filter_var($_POST['mobile'],FILTER_SANITIZE_STRING):false;
        $birth_day = isset($_POST['birth-day'])?filter_var($_POST['birth-day'],FILTER_VALIDATE_INT):0;
        $birth_month = isset($_POST['birth-month'])?filter_var($_POST['birth-month'],FILTER_VALIDATE_INT):0;
        $birth_year = isset($_POST['birth-year'])?filter_var($_POST['birth-year'],FILTER_VALIDATE_INT):0;
        $email = isset($_POST['email'])?filter_var($_POST['email'],FILTER_VALIDATE_EMAIL):false;
        $email_confirm = isset($_POST['confirm_email'])?filter_var($_POST['confirm_email'],FILTER_VALIDATE_EMAIL):false;
        $agree_to_terms = isset($params['agreed-to-terms'])?true:false;     
        $recieved_other_promo = isset($params['recieved-other-promo'])?1:0;
        
        if(!$firstname){
            $error = array(
                "notice" => "error",
                "message" => "Invalid Firstname format."
            );            
        }else if(!$lastname){
            $error = array(
                "notice" => "error",
                "message" => "Invalid Lastname format."
            );            
        }else if(!$mobile){
            $error = array(
                "notice" => "error",
                "message" => "Invalid Mobile format."
            );            
        }else if(!checkdate($birth_month, $birth_day, $birth_year)){
            $error = array(
                "notice" => "error",
                "message" => "Invalid birth date format."
            );            
        }else if(!$email){
            $error = array(
                "notice" => "error",
                "message" => "Invalid email format."
            );            
        }else if($email != $email_confirm){
            $error = array(
                "notice" => "error",
                "message" => "Email not match"
            );            
        }else{
            
            $conn = new DB(array(
                "server" => $sql_server,
                "username" => $sql_root,
                "password" => $sql_pwd,
                "database" => $sql_db
            ));
            $return = $conn->insert(array(
                "firstname" => $firstname,
                "lastname" => $lastname,
                "mobile" => $mobile,
                "birth_date" => date("Y-m-d",mktime(0, 0, 0, $birth_month, $birth_day, $birth_year)),
                "email" => $email,
                "news_update" => $recieved_other_promo
            ));
            
            if($return){        
                /*
                ini_set("SMTP","ssl://smtp.gmail.com");
                ini_set("smtp_port","465"); 
                $mail = new Mail(array(
                    "to" => $email,
                    "from" => "xplay.noreply@xplay.ph",
                    "subject" => "Test Subject"
                ));
                $ret_mail = $mail->sendMail("nothing");       
                if(!$ret_mail){
                    $error = error_get_last();
                    var_dump($error); die;
                }
                */
                header("Location: {$base}pre-season.php?register=complete");
            }else{
                $error = array(
                    "notice" => "error",
                    "message" => "Email address already exists"
                );
            }
        }   

    }


?>
<!DOCTYPE html>
<html>
<head>
    <title>NBA Philippines | Pre-season</title>
    <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1" /> 
    <meta property="og:title" content="PRESEASON GAME"/>
    <meta property="og:type" content="article"/>
    <meta property="og:description" content="NBA TO STAGE FIRST-EVER PRESEASON GAME IN THE PHILIPPINES THIS OCTOBER"/>
    <meta property="og:site_name" content="NBA Philippines"/>
    <meta property="og:url" content="http://ph.nba.com/pre-season.php"/>  
    <meta property="og:image:url" content="http://ph.nba.com/media/2.0/banner_rockets_vs_pacers_v2.jpg"/>   
    <meta property="og:image" content="http://ph.nba.com/media/2.0/banner_rockets_vs_pacers_v2.jpg"/>   
    <meta property="fb:admins" content="668328204" />

    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/css/style-index.css">
    <link rel="stylesheet" type="text/css" href="/css/style-new.css">
    <!--[if IE]>
    <link rel="stylesheet" type="text/css" href="/css/ie_style.css">
    <![endif]-->
    <!--[if IE 7]>
    <link rel="stylesheet" type="text/css" href="/css/ie7_style.css">
    <![endif]-->

    <!--script type="text/javascript" src="jquery-1.7.1.min.js"></script-->
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.7.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>

    <script type='text/javascript' src='/jwplayer/jwplayer.js'></script>

    <script type="text/javascript" src="java.js"></script>
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
        <div id="main_content" ><!-- main_content -->             
            <?php 
            $register = isset($_GET['register'])?filter_var($_GET['register'],FILTER_SANITIZE_STRING):null;
            if(isset($register)){                
                include "pre-season/registration.php";
            }else{
                $channel = isset($_GET['channel'])?filter_var($_GET['channel'],FILTER_SANITIZE_STRING):null;
                if(isset($channel) && ($channel == "live" || file_exists("pre-season/videos/".$channel."mp4") )){
                    echo "<div style='height: 10px'></div>";
                    include "pre-season/full-view.php";
                }else{

                    include "pre-season/index.php";
                }
            }    
            ?>
            <div style="height: 10px"></div>            
            <div>
                <?php include('layouts/footer.php'); ?>
            </div>
        </div><!-- end main_content -->
        <script type="text/javascript">
        <?php include('nav_js.php'); ?>
        </script>
        <!--script type="text/javascript" src="java-index.js"></script-->

        <?php // include("layouts/background_ads.php"); ?>
    </div> 
</body>
</html>