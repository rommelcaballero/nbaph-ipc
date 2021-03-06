<?php
$part_page = "news article";

if (@$newsid== "") {
     header("Location: news.php");
     exit();
}

include('queries/news_article-queries.php');
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>NBA Philippines</title>

<link rel="stylesheet" type="text/css" href="/css/style.css">
<link rel="stylesheet" type="text/css" href="/css/style-new.css">
<!--link rel="stylesheet" type="text/css" href="style-news.css"-->
<link rel="stylesheet" type="text/css" href="/css/colorbox/colorbox.css">
<!--[if IE]>
<link rel="stylesheet" type="text/css" href="/css/ie_style.css">
<![endif]-->
<!--[if IE 7]>
<link rel="stylesheet" type="text/css" href="/css/ie7_style.css">
<![endif]-->
<script type="text/javascript" src="/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="/jquery.tools.min.js"></script>
<script type="text/javascript" src="/jquery.imgpreload.js"></script>
<script type="text/javascript" src="/colorbox/jquery.colorbox.js"></script>
<script type="text/javascript" src="/java.js"></script>
</head>

<body>
  
<?php include('layouts/popups.php'); ?>
     <div id="wrapper">
          <?php include('layouts/header.php'); ?>

          <div id="main_content">
               <div style="height: 10px"></div>
               <div style="width: 980px; padding:10px; height: 90px; text-align: center; ">
                    <?php echo $ads_list['nba_NewsArticle_top_leaderboard']['Content']; ?>
               </div>
               <div style="height: 10px"></div>
               <div class="blue" style="font-size: 17px; margin: 0 auto; width:980px; padding:0 20px;">
                    <b>LATEST HEADLINES - NBA NEWS</b>
               </div>
               
               <!-- top half start -->
               <div style="width: 980px; padding:10px; margin: 0 auto">
               <!-- left start -->
                    <div style="float: left; width: 67%; font-size: 12px;">                         
                         <?php if(!(is_null($article['Photo']) || ($article['Photo'] == ""))) : ?>
                         <div style="text-align: center; padding:0 10px 10px;">
                            <div style="width: 100%; height: 300px;">
								<img src="<?php echo $article['Photo']; ?>" border="0">
							</div>
                              <b><?php echo $article['PhotoCredit']; ?></b>
                         </div>
                         <?php endif; ?>
						
						<!--div class="addthis_div" >
							<div class="addthis_position" style='padding:0 20px;'>							
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

                         <div style="font-size: 25px; padding:10px;">
                              <b><?php echo stripslashes($article['Title']); ?></b>
                          </div>

                          <div style="font-size: 14px; color: #444; border-bottom: 1px solid #d8d8d8; padding: 10px">                               
								<?php 
								$remote_addr = $_SERVER['REMOTE_ADDR'];
								
								$test_geoip_none_ph = isset($_GET['test-geoip'])?true:false;
								$geo_data = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip={$remote_addr}"));
								$geoLocBlocked = ($geo_data['geoplugin_countryCode'] != 'PH' || $test_geoip_none_ph);
								
								$content = stripslashes($article['Body']);
								
								if($geoLocBlocked){
									$reg = '/^\r+|\n+/';
									$out = "";
									$content = preg_replace($reg, $out, $content);
									
									$reg= '#\<video (.*?)\</video\>#i';
									$out = "<div style='width:630px; height:360px; background:#000;'>
											<span style='display:block; width:60%; padding-top:150px; margin:0 auto; color:#fff; text-transform:uppercase; text-align:center;'>The video you were trying to watch cannot be viewed from your current country or location</span>
										</div>";	
									$content = preg_replace($reg, $out, $content);							
								}
								echo $content; 							   
								?>
                          </div>
                          <div class="clear" style="height: 10px"></div>
                          <div style='padding: 10px;'>                            
                            <div class="OUTBRAIN" data-src="<?php echo $base; ?>news-article/<?php echo $newsid . "/" . seoUrl(strtolower($article['Title'])); ?>" data-widget-id="AR_1" data-ob-template="NBAPH" ></div>
                            <div class="OUTBRAIN" data-src="<?php echo $base; ?>news-article/<?php echo $newsid . "/" . seoUrl(strtolower($article['Title'])); ?>" data-widget-id="AR_2" data-ob-template="NBAPH" ></div>
                            <script type="text/javascript" async="async" src="http://widgets.outbrain.com/outbrain.js"></script> 
                          </div>
                          <div class="clear" style="height: 10px"></div>
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
							var disqus_url = '<?php echo $xbase; ?>news-article/<?php echo $newsid; ?>/<?php  echo seoUrl($article['Title']); ?>/<?php echo trim(urlencode($blog_postedby)); ?>';
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
                    
                    <!-- left end -->

                    <!-- right start -->
					
                    <div style="float: left; width: 32%;">
						<div style="width: 300px; padding: 10px; height: 250px; background: #ccc">
                         
			            <?php echo $ads_list['nba_NewsArticle_medallion1']['Content']; ?>
                        </div>
                        <div style="height: 10px"></div>
                        <?php if ($ad['Link']) { ?>
                        <div style="width: 300px; padding: 10px; background: #ccc">
                            <a href="<?php echo $ad['Link']; ?>"><img src="/ads/<?php echo $ad['Image']; ?>"></a>
                        </div>
                        <?php } ?>
                    </div>
                    <!-- right end -->

                    <div class="clear"></div>
               </div>
               <!-- top half end -->
               <div>      
                    <?php
                    $footer_ads = $ads_list['nba_NewsArticle_bottom_leaderboard']['Content'];
                    include('layouts/links.php');
                    ?>
                    <?php include('layouts/footer.php'); ?>
               </div>   
          </div>             
     </div>
<script type="text/javascript">
<!--
var news_tab = "news_list_highlights";

$(".news_element").hover(function() {
   $(this).css({backgroundPosition: "0 29px"});
   }, function() {
   if ($(this).prop("id") != news_tab) {
      $(this).css({backgroundPosition: "0 0"});
   }
});

$(".news_element").click(function() {
   $("#" + news_tab).css({backgroundPosition: "0 0"});

   news_tab = $(this).prop("id");
   
   $("#" + news_tab).css({backgroundPosition: "0 29px"});
});
console.log("<?php var_export($geo_data,1); ?>");
<?php
//include('nav_js.php');
?>
-->
</script> 

<?php
include("layouts/background_ads.php");
?>
	
</body>
</html>

