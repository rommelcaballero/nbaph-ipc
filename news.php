<?php
$part_page = "news";

include('queries/news-queries.php');
 	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>NBA Philippines</title>
<link rel="stylesheet" type="text/css" href="/css/style.css">
<link rel="stylesheet" type="text/css" href="/css/style-news.css">
<link rel="stylesheet" type="text/css" href="/css/colorbox/colorbox.css">
<!--[if IE]>
<link rel="stylesheet" type="text/css" href="ie_style.css">
<![endif]-->
<!--[if IE 7]>
<link rel="stylesheet" type="text/css" href="ie7_style.css">
<![endif]-->
<script type="text/javascript" src="jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="jquery.tools.min.js"></script>
<script type="text/javascript" src="jquery.imgpreload.js"></script>
<script type="text/javascript" src="colorbox/jquery.colorbox.js"></script>
<script type="text/javascript" src="java.js"></script>
</head>

<body>
     <?php include('layouts/popups.php'); ?>

     <div id="wrapper">
          <?php include('layouts/header.php');?>
          <div id="main_content"  >
               <div style="height: 10px"></div>
               <div style="width: 958px; height: 90px; text-align: center; margin: 0 auto; ">
                    <?php echo $ads_list['nba_news_top_leaderboard']['Content']; ?>
               </div>
               <div style="height: 10px"></div>
               <div class="blue" style="font-size: 17px; border-bottom: 1px solid #d8d8d8; width: 920px; margin: 0 auto; padding: 10px 0 0">
                    <b>LATEST HEADLINES - NBA NEWS</b>
               </div>
               <div style="height: 20px"></div>
               <!-- top half start -->
               <div style="width: 920px; margin: 0 auto">
               <!-- left start -->
                    <div style="float: left; width: 608px; font-size: 12px">
                         <?php 
                         if ($main_article['Source'] == 'PH') {
                              $link = "/news-article/".$main_article['NewsID']."/".seoUrl(strtolower($main_article['Title']));
                         } else {
	                        $link = $main_article['Link'];
                         }
                         if ($main_article['Photo']) {
                         ?>
                         <div style="text-align: right">
                              <div style="width: 100%; height: 300px; background: #ccc"><a href="<?php echo $link; ?>"><img src="<?php echo $main_article['Photo']; ?>" border="0"></a></div>
                              <b><?php echo $main_article['PhotoCredit']; ?></b>
                         </div>
                         <?php } ?>
                         
                         <div style="font-size: 25px">
                              <b><?php echo stripslashes($main_article['Title']); ?></b>
                         </div>
                         
                         <div style="font-size: 12px; color: #444; border-bottom: 1px solid #d8d8d8; padding-bottom: 10px">
                              <?php echo substr(strip_tags(stripslashes($main_article['Body'])), 0, 200); ?>
                              <?php if (strlen(stripslashes($main_article['Body'])) > 200) echo "..."; ?>
                              <span class="blue" ><a href="<?php echo $link; ?>">Read full article</a></span><br>
                              <?php for ($count = 0; $count < 3; $count += 1): ?>
	                              <?php if ($news_array[$count]['Source'] == 'PH'): 
                                        $link_2 = "/news-article/".$news_array[$count]['NewsID']."/".seoUrl(strtolower($news_array[$count]['Title'])); 
                                   else: 
                                        $link_2 = $news_array[$count]['Link'];
                                   endif; ?>
                         
                                   <span class="blue" ><a href="<?php echo $link_2; ?>"><?php echo stripslashes($news_array[$count]['Title']); ?></a></span>
                                   <?php if ($count < 2) echo " | "; 
                              endfor; ?>
                         </div>

                         <table cellspacing="0" style="padding-top: 10px" id="news_table">
                              <tr>
                              <?php 
                              $newline = 0;     
                              for ($count = 0; $count < 12; $count += 1) :
                                   $newline++;
                                   if ($news_array[$count]['Source'] == 'PH') {
                                        $link_3 = "/news-article/".$news_array[$count]['NewsID']."/".seoUrl(strtolower($news_array[$count]['Title']));
                                   } else {
                                        $link_3 = $news_array[$count]['Link'];
                                   }
                                   ?>
                                   <td <?php if ($i < 3) echo 'style="border-right: 1px solid #d8d8d8"'; ?>>
					               <?php if ($news_array[$count]['ImageThumb']) { ?>
                                        <div><a href="<?php echo $link_3; ?>"><img src="<?php echo $news_array[$count]["ImageThumb"]; ?>" alt="<?php echo $news_array[$count]["Title"]; ?>" title="<?php echo $news_array[$count]["Title"]; ?>" width='135' height='95'/></a></div>
                                        <?php } else { ?>
                                        <div style="width: 135px; height: 95px; background: #ccc"></div>
                                        <?php } ?>
                                        <div class="blue" ><a href="<?php echo $link_3; ?>" style="font-size: 13px"><?php echo stripslashes($news_array[$count]['Title']); ?></a></div>
                                             <?php echo myTruncate(trim(strip_tags(stripslashes($news_array[$count]['Body']))), 50, " ", "..."); ?> 
                                   </td>
                                   <?php if($newline == 4):
                                        echo "</tr><tr>";
                                        $newline=0;
                                   endif; ?>
                              <?php endfor; ?>
                              </tr>
                         </table>
                         <!--div style="height: 5px"></div>
                         <div style="height:20px; text-align:center"><a href="#">More Stories</a></div>
                         <div style="height: 20px"></div-->
                         <hr style="border-top:none; border-left:none; border-right:none; border-bottom: 1px solid #D8D8D8;                             
                             padding-bottom: 10px;"/>
                         
                    </div>
                    <!-- left end -->

                    <!-- right start -->
                    <div style="float: left; width: 300px; margin-left: 10px">
                         <div style="width: 300px; height: 250px">
                              <?php echo $ads_list['nba_news_top_medallion']['Content']; ?>
                         </div>
                         <div style="height: 10px"></div>
                         <?php if ($ad['Link']) { ?>
                         <div style="width: 300px; height: 100px">
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
                    $footer_ads = $ads_list['nba_news_bottom_leaderboard']['Content'];
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
          <?php include('nav_js.php');?> -->
     </script> 
     <?php include("layouts/background_ads.php"); ?>

    </body>
</html>
