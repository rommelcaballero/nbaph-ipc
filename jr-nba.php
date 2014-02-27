<?php
    //$part_page = "pre-season";
    $part_page = "jr-nba";      
    include 'queries/live-stream-queries.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>NBA Philippines | Jr. NBA</title>
    <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1" /> 
    <meta property="og:title" content="PRESEASON GAME"/>
    <meta property="og:type" content="article"/>
    <meta property="og:description" content="NBA TO STAGE FIRST-EVER PRESEASON GAME IN THE PHILIPPINES THIS OCTOBER"/>
    <meta property="og:site_name" content="NBA Philippines"/>
    <meta property="og:url" content="http://ph.nba.com/pre-season.php"/>  
    <meta property="og:image:url" content="http://ph.nba.com/media/2.0/banner_rockets_vs_pacers_v2.jpg"/>   
    <meta property="og:image" content="http://ph.nba.com/media/2.0/banner_rockets_vs_pacers_v2.jpg"/>   
    <meta property="fb:admins" content="668328204" />

    <base href="<?php echo $base; ?>">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="style-index.css">
    <link rel="stylesheet" type="text/css" href="style-new.css">
    <!--[if IE]>
    <link rel="stylesheet" type="text/css" href="ie_style.css">
    <![endif]-->
    <!--[if IE 7]>
    <link rel="stylesheet" type="text/css" href="ie7_style.css">
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
                include ("jr-nba-layout/index.php");                                                        
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