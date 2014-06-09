<?php


$part_page = "offcourt";

include('queries/offcourt_news-queries.php');

   $offcourt_id = $found_array['OffcourtID'];
   $offcourt_title = ucfirst(trim(stripslashes($found_array['Title'])));
   $offcourt_credits = ucfirst(trim($found_array['PhotoCredit']));
   $offcourt_content = trim(stripslashes($found_array['Body']));
   $offcourt_intro = myTruncate(trim(stripslashes($found_array['Intro'])), 200, " ", "...");

   if($found_array['Source'] == "US")
   {
      $offm_link = trim($found_array['Link']);
   }
   else
   {
      $offm_link = "/off-court-news/".$offcourt_id."/".seoUrl($offcourt_title);
   }

   $offm_img = $found_array['Photo'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>NBA Philippines</title>

<link rel="stylesheet" type="text/css" href="/style.css">
<link rel="stylesheet" type="text/css" href="/style-offcourt_news.css">
<link rel="stylesheet" type="text/css" href="/colorbox/colorbox.css">
<!--[if IE]>
<link rel="stylesheet" type="text/css" href="/ie_style.css">
<![endif]-->
<!--[if IE 7]>
<link rel="stylesheet" type="text/css" href="/ie7_style.css">
<![endif]-->
<script type="text/javascript" src="/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="/jquery.tools.min.js"></script>
<script type="text/javascript" src="/jquery.imgpreload.js"></script>
<script type="text/javascript" src="/colorbox/jquery.colorbox.js"></script>
<script type="text/javascript" src="/java.js"></script>
</head>

<body>
<?php
include('layouts/popups.php');
?>

<div id="wrapper">
<?php
include('layouts/header.php');
?>

   <div id="main_content">

      <div style="height: 10px"></div>

      <div style="width: 958px; min-height: 90px;text-align: center; margin: 0 auto">
      <?php
      echo $ads_list['nba_OffCourtNews_top_leaderboard']['Content'];
      ?>
      </div>

      <div style="height: 10px"></div>

      <div  style=" border-bottom: 1px solid #d8d8d8; width: 950px; margin: 0 auto; " >

         <div class="blue" style="font-size: 17px; font-weight: bold; padding: 10px 0px 5px 0px; " >OFF-COURT NEWS</div>

      </div>

      <div style="height: 20px"> </div>

      <!-- top half start -->
      <div style="width: 950px; margin: 0 auto;">

         <!-- left start -->
         <div style="float: left; width: 610px; ">

            <!-- latest news -->
            <div id="OffLatest" >

            <div class="addthis_div" style="padding-bottom: 5px">
		<?php  include('addthis.php'); ?>
            </div>

                <div >

                <?php
              if($offm_img)
               {
              ?>
                     <div><a href="<?php echo $offm_link; ?>" ><img src="<?php echo $offm_img; ?>" width="608" height="300" alt="<?php echo $row["Title"]; ?>" title="<?php echo $row["Title"]; ?>" class="btnimg" /></a></div>
                  <?php
               }
              else
               {
              ?>
                     <div style="width: 608px; height: 285px; background: #ccc;  "></div>

                  <?php
               }
              ?>

                </div>

                <div class="image_src" style="text-align: right; padding: 1px 10px 0px 0px; " >
                   <?php echo $offcourt_credits; ?>
                </div>

                <div class="offm_title" >
                   <?php echo $offcourt_title; ?>
                </div>

                <div class="offm_content" >

                      <?php
                 if($off_id && $offcourt_id)
                  {
                    echo $offcourt_content."<br>";
?>
            <div class="addthis_div">
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
			<div id="disqus_thread" style='padding:10px;'></div>
			<script type="text/javascript">
				/* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
				var disqus_shortname = 'ph-nba-com'; // required: replace example with your forum shortname		
				<?php $xbase = 'http://ph.nba.com/'; ?>	
				var disqus_url = '<?php echo $xbase; ?>off-court-news/<?php echo $off_id; ?>/<?php  echo seoUrl($offcourt_title); ?>';
				/* * * DON'T EDIT BELOW THIS LINE * * */
				(function() {
					var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
					dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
					(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
				})();
			</script>
			<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
			<a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
            
<?php
                  }
                 else
                  {

                   echo $offcourt_intro;
                 ?>

                   <a href="<?php echo $offm_link; ?>" >Read Full Article</a> <br />

                      <?php
                  }
                 ?>

                </div>

            </div>
            <!-- latest news -->

            <!-- other news -->
            <div style="margin: 0px; padding: 5px 0px 5px 0px; " >

                <table cellspacing="0" style="padding-top: 10px" id="news_table">
                 <tr>
            <?php
                for ($i = 0; $i < 4; $i += 1) {

               if($offcourt_array[$i]["Source"]=="US")
                {
                  $off_link = trim($offcourt_array[$i]["Link"]);
                }
               else
                {
                  $off_link = "/off-court-news/".$offcourt_array[$i]["OffcourtID"]."/".seoUrl($offcourt_array[$i]['Title']);
                }

                ?>
                  <td <?php
                  if ($i < 3)
                     echo 'style="border-right: 1px solid #d8d8d8"';
                  ?> >

                  <?php
                  if ($offcourt_array[$i]['ImageThumb']) {
              ?>
                     <div><a href="<?php echo $off_link; ?>" ><img src="<?php echo $offcourt_array[$i]['ImageThumb']; ?>" width="135" height="95" alt="<?php echo $offcourt_array[$i]["Title"]; ?>" title="<?php echo $offcourt_array[$i]["Title"]; ?>" class="btnimg" /></a></div>
                  <?php
                  }
              else
               {
              ?>
                     <div style="width: 135px; height: 95px; background: #ccc;  "></div>

                  <?php
               }
              ?>

                     <div class="blue" style="font-size: 13px; " ><a href="<?php echo $off_link; ?>" ><?php echo stripslashes($offcourt_array[$i]['Title']); ?></a></div>

                     <div><?php echo myTruncate($offcourt_array[$i]['Intro'], 50, " ", "...");?></div>

                  </td>
            <?php
                }
                ?>

               </tr>
            </table>

            </div>
            <!-- end other news -->

            <div style="height: 20px; " ></div>

            <!-- html ads -->
            <!-- div style="width: 303px; padding: 20px 0px 0px 0px;  " >
               <?php /*include("html-ads.php");*/ ?>
            </div -->
            <!-- html ads -->

         </div>
         <!-- left end -->

         <!-- right start -->
         <div style="float: left; width: 300px; margin-left: 30px">

            <div style="width: 300px; height: 250px">
         <?php
            echo $ads_list['nba_OffCourtNews_top_medallion']['Content'];
         ?>
            </div>

            <div style="height: 20px; "></div>

            <!-- More offcourt news -->
            <?php  include("right-offcourt.php"); ?>
            <!-- End More offcourt news -->

         </div>
         <!-- right end -->

         <div class="clear"></div>

      </div>
      <!-- top half end -->
      <div>
      <?php
      $footer_ads = $ads_list['nba_OffCourtNews_bottom_leaderboard']['Content'];
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

<?php
include('nav_js.php');
?>
-->
</script>

<?php
include("layouts/background_ads.php");
?>

<?php include('google_dfp.php'); ?>

</body>
</html>

