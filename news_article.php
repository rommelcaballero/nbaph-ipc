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

<link rel="stylesheet" href="https://s3-ap-southeast-1.amazonaws.com/nbaphfiles/sib2/style2.css">
<?php include('static_nav2.php');?>
<link rel="stylesheet" type="text/css" href="/css/style.css">
<link rel="stylesheet" type="text/css" href="/css/style-new.css">
<link rel="stylesheet" type="text/css" href="/colorbox/colorbox.css">
<!--[if IE]>
<link rel="stylesheet" type="text/css" href="/css/ie_style.css">
<![endif]-->
<!--[if IE 7]>
<link rel="stylesheet" type="text/css" href="/css/ie7_style.css">
<![endif]-->

	<!-- 1. skin -->
	<link rel="stylesheet" href="//releases.flowplayer.org/5.4.4/skin/minimalist.css">
	 
	<!-- 2. jquery library -->
	<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>-->
	 
	<!-- 3. flowplayer -->
	<script src="//releases.flowplayer.org/5.4.4/flowplayer.min.js"></script>


<!--<script type="text/javascript" src="/jquery-1.7.1.min.js"></script>-->
<script type="text/javascript" src="/jquery.tools.min.js"></script>
<script type="text/javascript" src="/jquery.imgpreload.js"></script>
<script type="text/javascript" src="/colorbox/jquery.colorbox.js"></script>
<script type="text/javascript" src="/java.js"></script>
</head>

<body>
  
<?php include('layouts/popups.php'); ?>
     <div id="wrapper">
		
		<?php include('static_nav.php');?>
		<?php include('nbaph_header.php');?>


          <div id="main_content">
               <div style="height: 10px"></div>
               <div style="width: 980px; padding:10px; min-height: 90px; text-align: center; ">
                    <?php echo $ads_list['nba_NewsArticle_top_leaderboard']['Content']; ?>
               </div>
               <div style="height: 10px"></div>
               <div id="bluecontainer" style=" position: relative;">
					<div class="blue" style="font-size: 17px; margin: 0 auto; width:980px; padding:0 20px;">
						<b>LATEST HEADLINES - NBA NEWS</b>
					</div>
					<div id="bluecontainerlogo" style=" position: absolute; left: 468px; top: -7px;">
						<!--<a href="http://www.facebook.com/AcerPH"><img src="/images/pressacerlogo.png"></a>-->
					</div>
				</div>
               
               <!-- top half start -->
               <div style="width: 980px; padding:10px; margin: 0 auto">
               <!-- left start -->
                    <div style="float: left; width: 68%; font-size: 12px;">                         
                         <?php if(!(is_null($article['Photo']) || ($article['Photo'] == ""))) : ?>
                         <div style="text-align: center; padding:0 10px 10px;">
                            <div style="width: 100%; height: 300px;">
								<img src="<?php echo $article['Photo']; ?>" border="0">
							</div>
                              <b><?php echo $article['PhotoCredit']; ?></b>
                         </div>
                         <?php endif; ?>
						
			<?php include('addthis.php'); ?>

                         <div style="font-size: 25px; padding:10px;">
                              <b><?php echo stripslashes($article['Title']); ?></b>
                          </div>

                          <div style="font-size: 14px; color: #444; border-bottom: 1px solid #d8d8d8; padding: 10px; width: 670px;">                               
								<?php 
								$remote_addr = $_SERVER['REMOTE_ADDR'];
								
								$test_geoip_none_ph = isset($_GET['test-geoip'])?true:false;
								$geo_data = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip={$remote_addr}"));
								$geoLocBlocked = ($geo_data['geoplugin_countryCode'] != 'PH' || $test_geoip_none_ph);
								$ip = get_IP_address();
							$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}"));	
							$city = $details->city;
							$country = $details->country;
							$location = $details->loc;
							$geoLocBlocked = ($country != 'PH' || $test_geoip_none_ph);
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
                         
			<?php include('addthis.php'); ?>
                         
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
include('google_dfp.php');
function get_IP_address()
{
    foreach (array('HTTP_CLIENT_IP',
                   'HTTP_X_FORWARDED_FOR',
                   'HTTP_X_FORWARDED',
                   'HTTP_X_CLUSTER_CLIENT_IP',
                   'HTTP_FORWARDED_FOR',
                   'HTTP_FORWARDED',
                   'REMOTE_ADDR') as $key){
        if (array_key_exists($key, $_SERVER) === true){
            foreach (explode(',', $_SERVER[$key]) as $IPaddress){
                $IPaddress = trim($IPaddress); // Just to be safe

                if (filter_var($IPaddress,FILTER_VALIDATE_IP,FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false) {

                    return $IPaddress;
                }
            }
        }
    }
}
?>

	
</body>
</html>

