<?php
$part_page = "news";
if(isset($_GET['s'])){
     $filtered_search = filter_var($_GET['s'],FILTER_SANITIZE_STRING);
     $search = explode(" ",$filtered_search);
}
include('queries/news-queries.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>NBA Philippines</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=9" />
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="style-news.css">
<link rel="stylesheet" type="text/css" href="colorbox/colorbox.css">
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
               <style>
               .search-input{display: block; position: absolute; bottom: 20px; right:0; }
               .search-input input[type=text]{width: 260px; height:24px; font-size: 14px; line-height: 14px; padding:3px; color:#333; border:1px solid #d5d5d5; margin:0; float:left; border-radius: 2px 0 0 2px;}
               .search-input input[type=submit]{width:32px; height:32px; border: 1px solid #d5d5d5; padding:0; float:left; border-left:0; border-radius: 0 2px 2px 0; cursor: pointer; background:url(/media/2.0/search.png) no-repeat;}
               .story{background: #f6f6f6; min-height: 50px; margin-bottom: 4px; padding:10px; }
               .story .left, .story .right{display: block; float:left;}
               .story .left{ margin-right:8px;}
               .story .left img{margin:0; padding:0;}
               .story .right{width:480px;}
               p.blue{font-size:16px; margin:0 0 4px; padding:0;}
               .story .right .date{font-style: italic; color:#9e9e9e; display: block; margin-top:4px;}
               </style>
               <div style="width: 980px; min-height: 90px; text-align: center; margin: 0 auto; padding:20px 10px 10px 10px; ">
                    <?php echo $ads_list['nba_news_top_leaderboard']['Content']; ?>
               </div>
               <div class="blue" style="font-size: 20px; width: 960px; margin: 0 auto; padding:20px 0 20px;">
                    <?php if(isset($filtered_search)): ?>
                    <b>Search : <?php echo $filtered_search; ?></b>
                    <?php else: ?>
                    <b>LATEST HEADLINES - NBA NEWS</b>
                    <?php endif; ?>
                    <span class='search-input'>
                         <form method='GET'>
                              <input type='text' name='s' placeholder="Search NBA" />
                              <input type='submit' value=""/>
                         </form>
                    </span>
               </div>
               <!-- top half start -->
               <div style="width: 960px; margin: 0 auto">
               <!-- left start -->
                    <div id='story-container' style="float: left; width: 650px; font-size: 12px; min-height:100px;">

                         <?php foreach($news_array as $k=>$v): ?>
                         <div class='story'>
                              <div class='left'><img src="<?php echo $v["ImageThumb"]; ?>" /></div>
                              <div class='right'>
                                    <?php if ($v['Source'] == 'PH'): 
                                        $link_2 = "news-article/".$v['NewsID']."/".seoUrl(strtolower($v['Title'])); 
                                        else: 
                                        $link_2 = $v['Link'];
                                        endif; 
                                   ?> 
                                   <p class="blue" ><a href="<?php echo $link_2; ?>"><?php echo stripslashes($v['Title']); ?></a></p>
                                   <span><?php echo myTruncate(trim(strip_tags(stripslashes($v['Body']))), 450, " ", "..."); ?></span>
                                   <span class='date'>Date : <?php echo date("M d, Y",strtotime($v['DatePosted'])); ?></span>
                              </div>
                              <div class='clear'></div>
                         </div>
                         <?php endforeach; ?>
                         <?php if(isset($filtered_search) && count($news_array) == 0): ?>
                         <div class='story'>
                         <h3>No result for search : <?php echo $filtered_search; ?></h3>
                         </div>
                         <?php endif; ?>
                    </div>
                    <!-- left end -->

                    <!-- right start -->
                    <div id='ad-container' style="float: left; width: 300px; margin-left: 10px">
                         <div id='ad-panel'>
                              <div style="width: 300px; height: 250px">
                                   <?php echo $ads_list['nba_news_top_medallion']['Content']; ?>
                              </div>
                              <div style="height: 10px"></div>
                              <?php if ($ad['Link']) { ?>
                              <div style="width: 300px; height: 100px">
                                   <a href="<?php echo $ad['Link']; ?>"><img src="ads/<?php echo $ad['Image']; ?>"></a>
                              </div>
                              <?php } ?>
                         </div>     
                    </div>
                    <!-- right end -->

                    <div class="clear"></div>
               </div>
               <!-- top half end -->
               <script>               
               $(function(){
                    $(window).scroll(function(){
                         var story_container = $("#story-container").height();
                         var ad_panel = $("#ad-panel").height();
                         var top = $(window).scrollTop();

                         if(story_container > ad_panel){
                              if (top < 300){
                                   $('#ad-panel').css({'top':0,'position': "relative"});
                              }else{
                                   if((top+ad_panel+4) > (story_container+300)){
                                        $('#ad-panel').css({'top': (story_container-ad_panel-4 ),'position': "absolute"});
                                   }else{
                                        $('#ad-panel').css({'top':0,'position': "fixed"});     
                                   }                              
                              }
                         }     
                    });  
               });
               </script>
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
