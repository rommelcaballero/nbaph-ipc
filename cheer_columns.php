<?php
$part_page = "cheerdancers column";

include('queries/cheer_columns-queries.php');
include('queries/cheer-general-queries.php');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns:fb="http://ogp.me/ns/fb#">
<head>
<title>NBA Philippines</title>

<link rel="stylesheet" type="text/css" href="/css/style.css">
<link rel="stylesheet" type="text/css" href="/css/style-cheer.css">
<link rel="stylesheet" type="text/css" href="/css/colorbox/colorbox.css">
<!--[if IE]>
<link rel="stylesheet" type="text/css" href="/css/ie_style.css">
<![endif]-->
<!--[if IE 7]>
<link rel="stylesheet" type="text/css" href="/css/ie7_style.css">
<![endif]-->
<script type="text/javascript" src="jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="jquery.tools.min.js"></script>
<script type="text/javascript" src="jquery.imgpreload.js"></script>
<script type="text/javascript" src="colorbox/jquery.colorbox.js"></script>
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
  
<?php
include('layouts/popups.php');
?>

<div id="wrapper">
<?php
include('layouts/header.php');
?>

   <div id="main_content">
      <div style="height: 10px"></div>

      <div style="width: 958px; min-height: 90px; margin: 0 auto; text-align: center; ">
         <?php
      echo $ads_list['nba_CheerColumns_top_leaderboard']['Content'];
      ?>
      </div>

      <div style="height: 10px"></div>

      <div class="gray" style="font-size: 17px; width: 940px; margin: 0 auto; padding: 10px 0 0">
         <b>CHEERDANCERS</b>
      </div>

      <div style="height: 20px"></div>

      <!-- top half start -->
      <div style="width: 958px; margin: 0 auto; ">
         <!-- left start -->
         <div style="float: left; width: 622px; ">

             <div style="width: 622px; background-image: url(images/cheer_columnsbg.gif); background-repeat: repeat-x;  " ><img src="images/cheer_columns.gif"  border="0" /></div>

             <!-- cheer photos list -->

<?php

//moved to seo.php
?>

<div class="lfloat" style="width: 580px; padding-top: 10px;  " >

                 <?php
              if($found > 0)
              {

                 $ctr = 1;
                 for ($count = 0; $count < count($col_array); $count += 1)
                  {

                    $blog_id = $col_array[$count]['ColumnID'];
                    $blog_title = ucfirst(trim(stripslashes($col_array[$count]['Title'])));
                    $blog_content = ucfirst(trim(stripslashes($col_array[$count]['Content'])));
                    $blog_intro = ucfirst(trim(stripslashes($col_array[$count]['Intro'])));
                    $blog_postedby = strtolower(trim(stripslashes($col_array[$count]['Writer'])));
                    $blog_date = date("l / F d / Y", strtotime($col_array[$count]['DatePosted']));

                    if($sblog_id)
                     {
                        $blog_content = $blog_content;
                        $link = "";

                     }
                    else
                     {
                        $blog_content = $blog_intro;
                        $blog_content .= "<br><a href=\"cheerdancers-columns/$blog_id/" . seoUrl($blog_title) . "\" class=\"blog_title_link\">read more</a>";
                        $link = $blog_id;
                        $blog_title = "<a href=\"cheerdancers-columns/$blog_id/" . seoUrl($blog_title) . "\" class=\"blog_title_link\">$blog_title</a>";
                     }

            ?>

                <!-- pb writer <?php echo $ctr; ?> -->
                 <div class="blog_item" >

                    <div class="blog_date" ><?php echo $blog_date; ?>
					   <!--div class="addthis_position">
						  <div class="addthis_toolbox addthis_default_style ">
						  <a class="addthis_button_preferred_1"></a>
						  <a class="addthis_button_preferred_2"></a>
						  <a class="addthis_button_preferred_3"></a>
						  <a class="addthis_button_preferred_4"></a>
						  <a class="addthis_button_compact"></a>
						  <a class="addthis_counter addthis_bubble_style"></a>
						  </div>
						  <script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
						  <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-503c81d36918b206"></script>
					   </div-->
                    </div>

                    <div class="pb_   title" style="color: #ffffff; "><?php echo $blog_title; ?></div>

                    <div class="blog_posted" style="color: #cccccc; " ><?php echo $blog_postedby; ?><!--, October 29, 2007 1 comment to this post--></div>

                    <div class="blog_content" style="color: #cccccc; " >

                       <?php echo $blog_content; ?>
                       <div class="clear_both" ></div>

                        <!--div class="addthis_div">
                           <div class="addthis_position">
                              <div class="addthis_toolbox addthis_default_style ">
                              <a class="addthis_button_preferred_1"></a>
                              <a class="addthis_button_preferred_2"></a>
                              <a class="addthis_button_preferred_3"></a>
                              <a class="addthis_button_preferred_4"></a>
                              <a class="addthis_button_compact"></a>
                              <a class="addthis_counter addthis_bubble_style"></a>
                              </div>
                              <script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
                              <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-503c81d36918b206"></script>
                           </div>
                        </div-->
			
						<div id="disqus_thread" style='padding:10px;'></div>
						<script type="text/javascript">
							/* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
							var disqus_shortname = 'ph-nba-com'; // required: replace example with your forum shortname		
							<?php $xbase = 'http://ph.nba.com/'; ?>	
							var disqus_url = '<?php echo $xbase; ?>cheerdancers-columns/<?php echo $sblog_id; ?>/<?php  echo seoUrl($blog_title); ?>/<?php echo trim(urlencode($blog_postedby)); ?>';
							/* * * DON'T EDIT BELOW THIS LINE * * */
							(function() {
								var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
								dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
								(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
							})();
						</script>
						<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
						<a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
						
						
                    </div>

                 </div>
                 <!-- end pb writer <?php echo $ctr; ?> -->

                <?php
                     $ctr++;

                  }//end while

              }//end if
             ?>

             </div>

             <!-- end cheer photos list -->

         </div>
         <!-- left end -->

         <!-- right start -->
         <div style="float: left; width: 300px; margin-left: 25px; ">

            <?php include("layouts/cheer-right.php"); ?>

         </div>
         <!-- right end -->

         <div class="clear" ></div>

      </div>
      <!-- top half end -->
    <div style="height: 20px"></div>  
    <div style='background:#fff;'>          
    <?php
    $footer_ads = $ads_list['nba_CheerColumns_bottom_leaderboard']['Content'];
    //$footer_ads = $ads_list['nba_Cheerdancers_bottom_leaderboard']['Content'];
    include('layouts/links.php');
    ?>
    <?php include('layouts/footer.php'); ?>
    </div>
   </div>
</div>

<script type="text/javascript">
<!--

$(function() {

    var main_disp = 0;

   $(".cheer_subheadline").hover(
      function() {
         $("#cheer_" + $(this).prop("id")).css({display: "block"});
        },
      function() {
         $("#cheer_" + $(this).prop("id")).css({display: "none"});
     });

   $(".cheer_subheadline").click(function(){

      var main = $(this).attr("main");

         $("#MainCheerp" + main_disp).fadeOut("fast");
      $("#MainCheerp" + main).fadeIn("fast");
      main_disp = main;

   });

});

<?php
include('nav_js.php');
?>
-->
</script>

<?php
include("layouts/background_ads.php");
?>

</body>
</html>

