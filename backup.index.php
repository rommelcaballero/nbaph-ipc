<?php

ob_start();

//replace access token for FB app from here:
//http://www.neosmart.de/social-media/facebook-wall/

$part_page = "index";

include('queries/index-queries.php');

if(file_exists($cachefile) && !isset($user_id))
{ 
	$cache_this = 0;
	//echo "<!-- Cached Copy ".$last_db." -->\n";
	include($cachefile); 
	exit;
}
else
{
	$cache_this = 1; 	  
  if (isset($_SESSION['pollvoter'])){
    if($_SESSION['pollvoter'] != "" || isset($user_id)) $cache_this = 0;
  }
  
 ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>NBA Philippines</title>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1" /> 

<base href="<?php echo $base; ?>">

<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="style-index.css">
<link rel="stylesheet" type="text/css" href="colorbox/colorbox.css">
<link href="fbfeed/jquery.neosmart.fb.wall.css" rel="stylesheet" type="text/css"/>
<style type="text/css">
<!--
#Scroller {
position: relative;
width: 318px;
height: 350px;
overflow: auto;
border-top: 1px solid #ccc;
border-bottom: 1px solid #ccc;
}
-->
</style>
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
<script type="text/javascript" src="http://widgets.twimg.com/j/2/widget.js" charset="utf-8"></script>
<script type="text/javascript" src="fbfeed/jquery.neosmart.fb.wall.js"></script>
<script type="text/javascript" src="java.js"></script>
<script type="text/javascript" >
var base = "<?php echo $base; ?>";

var photo_array = Array(<?php
for ($i = 0; $i < $gallery_total; $i += 1) {
   if ($i > 0)
      echo ",";
	echo "'" . $_SESSION['photos'][$i]['Filename'] . "'";
}
?>);
</script>
<?php
//include('leaderboards_js.php');
?>
</head>

<body>

<?php
include('layouts/popups.php');
?>

<div id="wrapper">
<?php
include('layouts/header.php');
?>
	
   <!-- main_content -->
   <div id="main_content" >
 
      	  <div style="height: 10px"></div>

          <div style="width: 958px; height: 90px; margin: 0 auto; text-align: center; ">
			<?php
            echo $ads_list['nba_homepage_top_leaderboard'];
            //include('layouts/leaderboard_top.php');
            ?>
          </div>
    
          <div style="height: 10px"></div>
    
          <!--div style="text-align: center">
             <a href="http://nbastore.com/" target="_blank"><img src="images/nba_store.png" border="0"></a>
          </div-->
    
          <!--div style="padding: 10px 30px">
             <a href="http://ph.global.nba.com/stats/league/leagueSchedule.xhtml" style="font-size: 14px; font-weight: bold; color: #1c75bc">View Full Calendar</a>
          </div-->
    
          <div style="width: 1000px;  margin: 0 auto; text-align: center; background: #fff">
             <iframe src="http://ph.global.nba.com/hpscoreboardiframe.html" align="center" frameborder="0" width="1000" height="143" scrolling="no" marginwidth="0" marginheight="0" style="text-align:center; align: center; margin: 0; padding: 0; marginwidth:0"></iframe>
          </div>
    
          <!--div style="height: 10px"></div-->
                    
          <!-- top half container start -->
          <div class="container"  style='margin-top:-30px;'>
          
             <!-- top left start  -->
             <div style="float: left; width: 672px; margin-left: 10px; ">
                <!-- headlines start -->
                <div style="width: 672px; padding-bottom: 2px; background: url('images/rounded_bottom_672.png') bottom center no-repeat; ">
                
                   <div style="width: 672px; height: 376px; overflow: hidden">
   					<?php
					$cthumbs = array(); 
					for ($count = 1; $count <= count($carousel_array); $count += 1) { 
						
						$cthumbs[$count-1]['Title'] = stripslashes($carousel_array[$count - 1]['Title']);
                  $cthumbs[$count-1]['Main'] = stripslashes($carousel_array[$count - 1]['Image']); 
                  $cthumbs[$count-1]['Image'] = stripslashes($carousel_array[$count - 1]['ImageThumb']); 
						
					?>
									  <div id="carousel<?php echo $count; ?>" class="carousel" style=" <?php if ($count > 1) echo "display: none"; ?>">
										 <a href="<?php echo $carousel_array[$count - 1]['Link']; ?>"<?php
										 if ($carousel_array[$count - 1]['Source'] == "US")
											echo ' target="_blank"';
										 ?>><span id="icarousel<?php echo $count; ?>"><?php
                               if ($count == 1) {
                               ?><img src="<?php echo $carousel_array[$count - 1]['Image']; ?>" width="672" height="376"><?php
                               }
                               ?></span></a>
										 <div class="carousel_text">
											<div style="font-family: arial; font-size: 20px; color: #fff; margin: 4px 15px; width: 622px; height: 24px; overflow: hidden">
											   <b><a href="<?php echo $carousel_array[$count - 1]['Link']; ?>" style="color: #fff"<?php
											   if ($carousel_array[$count - 1]['Source'] == "US")
												  echo ' target="_blank"';?>><?php echo stripslashes($carousel_array[$count - 1]['Title']); ?></a></b>
											</div>
					
											<div id="carousel_intro" style="font-size: 12px; color: #fff; margin: 4px 15px; width: 622px; height: 46px; overflow: hidden">
											   <b><?php echo stripslashes($carousel_array[$count - 1]['Intro']); ?></b>
											</div>
										 </div>
									  </div>
					<?php
					   //$count += 1;
					}
					
					$carousel .= '<div class="clear"></div>';
					?>
                   </div>
    
                   <div style="width: 650px; border-left: 1px solid #d8d8d8; border-right: 1px solid #d8d8d8; padding: 5px 10px">
                      <table cellspacing="0" cellpadding="0" style="width: 650px; padding-top: 10px">
                         <tr>
                            <td style="width: 25px">
                               <img src="images/left_btn.png" id="headline_left" class="pointer">
                            </td>
                            <td style="width: 600px; background: #ccc">
                               <div class="scroll" id="headline_pics">
                                  <div class="pics">
    							<?php
								$count = 0;
								for($i=0; $i<count($cthumbs); $i++){
									
								   if ($count % 4 == 0) {
								?>
																 <div class="pics_content">
								<?php
								   }
								?>
																	<div class="pics_details pointer" onclick="carousel(<?php echo ($count + 1); ?>, '<?php echo $cthumbs[$i]['Main']; ?>')">
																	   <div class="pics_actual">
																		  <img src="<?php echo $cthumbs[$i]['Image']; ?>" width="132" height="70">
 																		</div>
								
																	   <?php echo stripslashes($cthumbs[$i]['Title']); ?>
																	</div>
								<?php
								   if ($count % 4 == 3 || $count + 1 == $total) {
								?>
																	<div class="clear"></div>
																 </div>
								<?php
								   }
								
								   $count += 1;
								}
								?>		
                                  </div>
                               </div>
                            </td>
                            <td style="width: 25px; text-align: right">
                               <img src="images/right_btn.png" id="headline_right" class="pointer">
                            </td>
                         </tr>
                         <tr>
                            <td colspan="3" style="height: 25px; text-align: center">
                               <img src="images/circle_filled.png" id="headline_circle_0" class="headline_circle">
                               <img src="images/circle_empty.png" id="headline_circle_1" class="headline_circle">
                               <img src="images/circle_empty.png" id="headline_circle_2" class="headline_circle">
                            </td>
                         </tr>
                      </table>
                   </div>
    
                   <div class="clear"></div>
                </div>
                <!-- headlines end -->
    
                <!-- video links start -->
                <div style="width: 672px; padding: 5px 0 2px 0; background: url('images/rounded_bottom_672.png') bottom center no-repeat">
                   <div class="article_header" style="background: url('images/rounded_top_672.png'); width: 642px; height: 15px">
                      VIDEO
                   </div>
    
                   <div style="width: 650px; border-left: 1px solid #d8d8d8; border-right: 1px solid #d8d8d8; padding: 5px 10px">
                      <div style="width: 650px; padding-top: 5px">
                         <ul class="video_list">
                            <li style="background-position: 0 33px; color: #444" class="video_element" id="video_list_highlights" type="Highlights" >
                               HIGHLIGHTS
                            </li>
                            <li class="video_element" id="video_list_top" type="Top Plays" >
                               TOP PLAYS
                            </li>
                            <li class="video_element" id="video_list_picks" type="Editor\'s Picks" >
                               EDITOR'S PICKS
                            </li>
                            <li class="video_element" id="video_list_tv" type="NBA TV" >
                               NBA TV
                            </li>
                            <li class="video_element" id="video_list_live">
                               <a href="http://www.nba.tv/nbatv/" class="blue">WATCH LIVE</a>
                            </li>
                         </ul>
                      </div>
    
                      <table cellspacing="0" cellpadding="0" style="width: 650px; padding-top: 10px">
                         <tr>
                            <td style="width: 25px">
                               <img src="images/left_btn.png" id="video_left" class="pointer">
                            </td>
                            <td style="width: 600px; ">
                            
                               <div class="scroll" id="video_list_gallery">
                               
                                  <div class="pics">
                                      
								                    <?php
                                    for($count = 0; $count < count($vid_array); $count += 1) {
                                       if ($count % 4 == 0) {
                                    ?>
                                        <div class="pics_content">
                                    <?php
                                       }
                                       if (preg_match("/^http/i", $vid_array[$count]['Thumbnail'])) {
                                       } else {
                                            $vid_array[$count]['Thumbnail'] = "http://i2.cdn.turner.com/" .$vid_array[$count]['Thumbnail'];		
                                       }
                                    ?>
                                        <div class="pics_details">
                                           <div class="pics_actual">
                                              <a href="<?php echo stripslashes($vid_array[$count]['Link']); ?>"><img src="<?php echo $vid_array[$count]['Thumbnail']; ?>"  width="132" height="70" border="0"></a>
                                           </div>
    
                                           <a href="<?php echo stripslashes($vid_array[$count]['Link']); ?>"><?php echo stripslashes($vid_array[$count]['Title']); ?></a>
                                        </div>
                                    <?php
                                       if ($count % 4 == 3 || $count + 1 == $total) {
                                    ?>
                                            <div class="clear"></div>
                                         </div>
                                    <?php
                                       }
                                    
                                       //$count += 1;
                                    }
                                    ?>
                                  </div>
                                  
                               </div>
     
                            </td>
                            <td style="width: 25px; text-align: right">
                               <img src="images/right_btn.png" id="video_right" class="pointer">
                            </td>
                         </tr>
                         <tr>
                            <td colspan="3" style="height: 25px; text-align: center">
                               <img src="images/circle_filled.png" id="video_circle_0" class="video_circle">
                               <img src="images/circle_empty.png" id="video_circle_1" class="video_circle">
                               <img src="images/circle_empty.png" id="video_circle_2" class="video_circle">
                            </td>
                         </tr>
                      </table>
                   </div>
                </div>
                <!-- video links end -->
             </div>
             <!-- top left end  -->
             
    
             <!-- top right start -->
             <div style="float: left; width: 300px; margin-left: 10px">
             
                 <div style="width: 300px; height: 250px">
					 <?php
					echo $ads_list['nba_homepage_top_medallion'];
					?>
                </div>
    
                <div style="height: 10px"></div>

<?php
if ($ads_array[0]['Link']) {
?>                
                <div style="width: 300px; height: 100px">
                  <a href="<?php echo $ads_array[0]['Link']; ?>"><img src="ads/<?php echo $ads_array[0]['Image']; ?>"></a>
                </div>
<?php
}
?>
                <div style="height: 10px"></div>
    
                <!-- writers start -->
                <div style="width: 300px; padding: 5px 0 2px 0; background: url('images/rounded_bottom_300.png') bottom center no-repeat">
                   <div class="article_header" style="background: url('images/rounded_top_300.png'); width: 270px; height: 15px">
                      NBA WRITERS
                   </div>
    
                   <!-- writers content start -->
                   <div style="width: 298px; border: 1px solid #d8d8d8">
                   
                      <div style="width: 298px; border-bottom: 1px solid #d8d8d8">
                         <div style="width: 260px; padding-top: 5px; margin: 0 auto">
                            <ul class="video_list">
                               <li style="background-position: 0 33px; color: #444" class="writer_element" id="writer_personality">
                                  Personalities
                               </li>
                               <li class="writer_element" id="writer_blogger">
                                  Bloggers
                               </li>
                            </ul>
    
                            <div class="clear"></div>
                         </div>
                      </div>
    
                      <!-- writers lists start -->
                      <div class="clear" style="padding: 10px">
                         <!-- writers personalities start -->
                         <div id="writer_personality_list">
                            <table>
      <?php
      for ($blog_cnt = 0; $blog_cnt < 2; $blog_cnt += 1) {
         $blogger_pic = strtolower(urlencode(str_replace("ñ", "n", $person_array[$blog_cnt]['Blogger'])));
      ?>
                               <tr>
                                  <td style="width: 55px; vertical-align: top; padding-top: 10px; " >
                                    <div style="width: 45px; height: 75px;">
         <?php
         if ($blogger_pic) {
         ?>
                                       <img src="images/personalities/<?php echo $blogger_pic; ?>.jpg" border="0">
         <?php
         }
         ?>
                                    </div>
                                  </td>
                                  <td style="vertical-align: top;  padding-top: 10px;  " >
                                     <div class="writer_title">
         <?php
			if ($person_array[$blog_cnt]['BlogLink']) {
         ?>
                                       <a href="<?php echo stripslashes($person_array[$blog_cnt]['BlogLink']); ?>" target="_blank"><?php echo stripslashes($person_array[$blog_cnt]['BlogTitle']); ?></a>
         <?php } else { ?>
                                       <a href="writers-content/<?php echo $person_array[$blog_cnt]['BlogID']; ?>/<?php echo seoUrl(trim($person_array[$blog_cnt]['BlogTitle'])); ?>"><?php echo stripslashes($person_array[$blog_cnt]['BlogTitle']); ?></a>
         <?php } ?>
                                     </div>

                                     <div class="writer_content">
                                        <b><?php echo stripslashes(strtoupper($person_array[$blog_cnt]['Blogger'])); ?></b>

                                        <div style="padding-top: 5px">
                                           <?php echo stripslashes($person_array[$blog_cnt]['BlogExcerpt']); ?>
                                        </div>
                                     </div>
                                  </td>
                               </tr>
      <?php
      }
      ?>
                            </table>
    
                            <div class="more_link">
                               <a href="nba-writers">More NBA.com Writers</a>
                            </div>
                         </div>
                         <!-- writers personalities end -->
    
                         <!-- writers bloggers start -->
                         <div id="writer_blogger_list" style="display: none">
                            <table>
      <?php
      for ($blog_cnt = 0; $blog_cnt < 2; $blog_cnt += 1) {
         $blogger_pic = strtolower(urlencode(str_replace("ñ", "n", $blogger_array[$blog_cnt]['Blogger'])));
      ?>
                               <tr>
                                  <td style="width: 55px; vertical-align: top; padding-top: 10px; " >
                                     <div style="width: 45px; height: 75px;"><img src="images/blogs/<?php echo $blogger_pic; ?>.jpg" border="0"></div>
                                  </td>
                                  <td>
                                     <div class="writer_title">
         <?php
			if ($blogger_array[$blog_cnt]['BlogLink']) {
         ?>
                                       <a href="<?php echo stripslashes($blogger_array[$blog_cnt]['BlogLink']); ?>" target="_blank"><?php echo stripslashes($blogger_array[$blog_cnt]['BlogTitle']); ?></a>
         <?php } else { ?>
                                       <a href="bloggers/<?php echo $blogger_array[$blog_cnt]['BlogID']; ?>/<?php echo seoUrl($blogger_array[$blog_cnt]['BlogTitle']); ?>"><?php echo stripslashes($blogger_array[$blog_cnt]['BlogTitle']); ?></a>
         <?php } ?>
                                     </div>
    
                                     <div class="writer_content">
                                        <b><?php echo stripslashes(strtoupper($blogger_array[$blog_cnt]['Blogger'])); ?></b>
    
                                        <div style="padding-top: 5px">
                                           <?php echo stripslashes($blogger_array[$blog_cnt]['BlogExcerpt']); ?>
                                        </div>
                                     </div>
                                  </td>
                               </tr>
      <?php
      }
      ?>
                            </table>
                              <div class="more_link">
                               <a href="bloggers">More Bloggers</a>
                            </div>
                         </div>
                         <!-- writers bloggers end -->
                      </div>
                      <!-- writers lists end -->
                   </div>
                   <!-- writers content end -->
                </div>
                <!-- writers end -->
             </div>
             <!-- top right end -->
    
             <div class="clear"></div>
             
          </div>
          <!-- top half container end -->
 	
          
          <div style="height: 10px"></div>

          <div style="width: 958px; height: 90px; margin: 0 auto; text-align: center; ">
     			<?php
    			echo $ads_list['nba_homepage_middle_leaderboard'];
    			?>
          </div>
    
          <div style="height: 10px"></div>
          
          
          <!-- three columns start -->
          <div class="container" >
             <div style="width: 330px; float: left; margin-left: 10px">
                <div style="width: 330px; padding: 5px 0 2px 0; background: url('images/rounded_bottom_330.png') bottom center no-repeat">
                   <div class="article_header" style="background: url('images/rounded_top_330.png'); width: 300px; height: 15px">
                      HEADLINES
                   </div>
    
                   <!-- Headlines content start -->
                   <div class="cell_330">
                      <table style="width: 100%">
    <?php
    for($count = 0; $count < 5; $count += 1) {
       $style = "";
       if ($count % 2 == 1)
          $style = "background: #ccc";
    ?>
                         <tr style="<?php echo $style; ?>">
                            <td>
                               <a href="<?php
                               if ($news_array[$count]['Link'])
                                  echo $news_array[$count]['Link'];
                               else
                                  //echo "news_article.php?newsid=" . $row['NewsID'];
								  echo "news-article/".$news_array[$count]['NewsID']."/".seoUrl(trim($news_array[$count]['NewsTitle']));
                               ?>"><?php echo stripslashes($news_array[$count]['Title']); ?></a>
                            </td>
                         </tr>
    <?php
       //$count += 1;
    }
    ?>
                      </table>
    
                      <div class="more_link">
                         <a href="news-article">More Headlines</a>
                      </div>
                   </div>
                   <!-- Headlines content end -->
                </div>
    
                <div style="width: 330px; padding: 5px 0 2px 0; background: url('images/rounded_bottom_330.png') bottom center no-repeat">
                   <div class="article_header" style="background: url('images/rounded_top_330.png'); width: 300px; height: 15px">
                      EVENTS
                   </div>
    
                   <!-- Headlines content start -->
                   <div class="cell_330">
                      <div style="width: 318px; ">
                          <img src="<?php echo $events_array['ImageThumb']?>" width="318" height="159">
                          <!-- img src="resize_pic.php?file=<?php echo $events_array['Image']?>&w=318&h=159" -->
                       </div>
    
                      <div style="padding: 5px 0; font-size: 14px">
                         <b><?php echo stripslashes($events_array['Title']); ?></b>
                      </div>
    
                      <?php echo stripslashes($events_array['Intro']); ?>
    
                      <div class="more_link">
                         <a href="local-events">More Events</a>
                      </div>
                   </div>
                   <!-- Headlines content end -->
                </div>
    
                <div style="width: 330px; padding: 5px 0 2px 0; background: url('images/rounded_bottom_330.png') bottom center no-repeat">
                   <div class="article_header" style="background: url('images/rounded_top_330.png'); width: 300px; height: 15px">
                      FEATURES
                   </div>
    
                   <!-- Headlines content start -->
                   <div class="cell_330">
                      <table style="width: 100%">
                      <?php
                      for ($count = 0; $count < 5; $count += 1) {
                         $style = "";
                         if ($count % 2 == 1)
                            $style = "background: #ccc";
                      ?>
                         <tr style="<?php echo $style; ?>">
                            <td>
                               <a href="<?php echo $features_array[$count]['Link']; ?>"><?php echo stripslashes($features_array[$count]['Title']); ?></a>
                            </td>
                         </tr>
                      <?php
                         //$count += 1;
                      }
                      ?>
                      </table>
    
                      <div class="more_link">
                         <a href="nba-features">More Features</a><br>
                      </div>
                   </div>
                   <!-- Headlines content end -->
                </div>
    
                <div style="width: 330px; padding: 5px 0 2px 0; background: url('images/rounded_bottom_330.png') bottom center no-repeat">
                   <div class="article_header" style="background: url('images/rounded_top_330.png'); width: 300px; height: 15px">
                      PHOTO GALLERY
                   </div>
    
                   <!-- Headlines content start -->
                   <div class="cell_330">
                      <table cellspacing="0" cellpadding="0" style="width: 318px">
                         <tr>
                            <td style="width: 13px">
                               <img src="images/left_btn_small.png" id="gallery_left" class="pointer">
                            </td>
                            <td style="width: 282px; padding: 0 5px">
                               <div class="scroll" id="gallery_pics" style="width: 282px; height: 282px; ">
                               
                                  <div class="pics"> 
                                    <div style="width: 282px; height: 282px" >
                                       <!--<table cellspacing="0" cellpadding="0" >
                                          <tr>
                                             <td style="text-align: center"  >
                                                   
                                             </td>
                                          </tr>
                                       </table>--> 
                                       <a  title="<?php echo stripslashes($_SESSION['photos'][0]['Caption']); ?>" href="photo-gallery/<?php echo $_SESSION['photos'][0]['GalleryID']; ?>/<?php  echo seoUrl($_SESSION['photos'][0]['GalleryName']); ?>"><img src="<?php echo $_SESSION['photos'][0]['Filename']; ?>" width="282" height="282" id="GalleryMain" ></a>
                                    </div>
                                  </div>
                               </div>
                            </td>
                            <td style="width: 13px; text-align: right">
                               <img src="images/right_btn_small.png" id="gallery_right" class="pointer">
                            </td>
                         </tr>
                         <tr>
                            <td>&nbsp;</td>
                            <td>
                               <div style="font-size: 10px; color: #444; padding: 5px 0">
                                  <span id="gallery_count">1</span> of <?php echo $gallery_total; ?>
    
                                  <div style="position: absolute; top: 5px; right: 0" class="blue">
                                     <?php echo stripslashes($gallery['GalleryName']); ?>
                                  </div>
                               </div>
                            </td>
                            <td>&nbsp;</td>
                         </tr>
                      </table>
                   </div>
                   <!-- Headlines content end -->
                </div>
             </div>
    
             <div style="width: 330px; float: left; margin-left: 10px">
                <div style="width: 330px; padding: 5px 0 2px 0; background: url('images/rounded_bottom_330.png') bottom center no-repeat">
                   <div class="article_header" style="background: url('images/rounded_top_330.png'); width: 300px; height: 15px">
                      POLL
                   </div>
    
                   <!-- poll content start -->
                   <div class="cell_330" id="poll_cell">
                    <?php
                    if (!isset($_SESSION['pollvoter'])) {
                    ?>
                      <form id="poll_form">
                         <input type="hidden" name="pollid" value="<?php echo $poll['PollID']?>">
                         <table cellspacing="0" style="width: 100%; height: 175px">
                            <tr>
                            <?php
                               if ($poll['Image']) {
                            ?>
                               <td rowspan="2" style="width: 105px">
                                   <img src="<?php echo $poll['Image']; ?>"> 
                                   
                               </td>
                            <?php
                               }
                            ?>
                               <td>
                                  <?php echo stripslashes($poll['Question']); ?>
    
                                  <div style="padding: 5px 0">

                                  <?php
                                     for ($count = 0; $count < count($poll_array); $count += 1) {
                                  ?>
                                     <div class="poll_choice">
                                        <input type="radio" name="poll" id="poll<?php echo $count; ?>" value="<?php echo $poll_array[$count]['Selection']; ?>">
                                        <label for="poll<?php echo $count; ?>"><?php echo $poll_array[$count]['Choice']; ?></label>
                                     </div>
                                  <?php
                                     }
                                  ?>
                                  </div>
                               </td>
                            </tr>
                            <tr>
                               <td>
                                  <img src="images/vote.png" class="pointer" onclick="<?php
                                  if (!isset($_SESSION['pollvoter'])) 
                                     echo "submit_poll()";
                                  else
                                     echo "alert('You have already voted for this poll.')";
                                  ?>">
                               </td>
                            </tr>
                         </table>
                      </form>
                        <?php
                        }
                       else {
                        ?>
                         <table cellspacing="0" style="width: 100%; height: 175px">
                            <tr>
                              <?php
                                if ($poll['Image']) {
                              ?>
                               <td rowspan="2" style="width: 105px">
                                  <img src="<?php echo $poll['Image']; ?>">
                               </td>
                                <?php
                                  }
                                ?>
                               <td valign="top">
                                  <?php echo stripslashes($poll['Question']); ?>
    
                                  <div style="padding: 5px 0"><table border="0" cellspacing="2" cellpadding="0">
                          <?php
                            for ($count = 0; $count < count($poll_array); $count += 1) {
                               $percentage = round((($poll_array[$count]['Answers']/$polltotal['Total']) * 100) * 1);
                               if ($percentage < 1) { $percentage = 1; }	    

                          ?>
               <tr>
                  <td valign="top">
                     <div class="poll_choice"><?php echo $poll_array[$count]['Choice'] . "<!-- - " . $poll_array[$count]['Answers']; ?>--></div>
                  </td>
                  <td valign="top">
                     <div style="width: 85px">
                        <div style="float: left; margin-left: 5px; background-color:#6699cc; height:10px; width:<?php echo $percentage; ?>%; overflow: hidden"></div>
                        <div style="float: left; margin-left: 3px; color: #666" class="poll_numbers"><?php echo round(($poll_array[$count]['Answers']/$polltotal['Total']) * 100); ?>%</div>
                        <div class="clear"></div>
                     </div>
                  </td>
					</tr>
              <?php
                }
              ?>
                                  </table></div>
                               </td>
                            </tr>
                         </table>
                <?php
               }
                ?>
                   </div>
                   <!-- poll content end -->
                </div>
    
                <div style="width: 330px; padding: 5px 0 2px 0; background: url('images/rounded_bottom_330.png') bottom center no-repeat">
                   <div class="article_header" style="background: url('images/rounded_top_330.png'); width: 300px; height: 15px">
                      <?php echo stripslashes($nbaaction_array['Heading']); ?>
                   </div>
                   
                   <!-- Headlines content start -->
                   <div class="cell_330">
                      
                      <?php
                      //if ($row['Photo'])
                         //echo '<img src="thumbs.php?filename=' . $row['Photo'] . '&width=318&height=318">';
    				  	
                      echo stripslashes($nbaaction_array['Content']);
                      ?>
                      
                      <div class="clear_both" ></div>
                      
                   </div>
                   <!-- Headlines content end -->
                </div>
    
                <div style="width: 330px; padding: 5px 0 2px 0; background: url('images/rounded_bottom_330.png') bottom center no-repeat; ">
                
                   <div class="article_header" style="background: url('images/rounded_top_330.png'); width: 300px; height: 15px">
                      FOLLOW THE NBA
                   </div>
    				
                   <!-- tab -->
                   <div style="width: 328px; border: 1px solid #d8d8d8; border-bottom: 0px;  border-top: 0px; text-align: left; ">
                   
                      <div style="width: 327px; padding-top: 10px; ">
                            <ul class="video_list">
                               <li style="background-position: 0 33px; color: #444; " class="share_element" id="facebook_tab">
                                   <span style="background-image: url(images/fb_share1.png); background-repeat: no-repeat; text-align: left; padding-left: 19px; " >Facebook</span> 
                               </li>
                               <li class="share_element" id="twitter_tab">
                                   <span style="background-image: url(images/twit_share1.png); background-repeat: no-repeat; text-align: left; padding-left: 18px; " >Twitter</span> 
                               </li>
                               <li style="cursor: default; height: 22px; width: 66px; border-bottom: 1px solid #e6e6e6; background-image: none; " >
                                  &nbsp;
                               </li>
                            </ul>
                        
                            <div class="clear"></div>
                        
                      </div>
                     
                    </div>
                    <!-- end tab -->
                     
                   <!-- twitter content -->
                    <div id="twitter_tab_list" class="cell_330" style="display:none; height: auto !important; min-height: 390px; height: 390px; border-top: 0px; padding-bottom: 0px; padding-top: 0px;  margin-bottom: 0px; margin-top: 0px;  " >
                         <script>
                         new TWTR.Widget({
                           version: 2,
                           type: 'profile',
                           rpp: 4,
                           interval: 30000,
                           width: 318,
                           height: 261,
                           theme: {
                             shell: {
                               background: '#ffffff',
                               color: '#0055af'
                             },
                             tweets: {
                               background: '#ffffff',
                               color: '#444444',
                               links: '#0055af'
                             }
                           },
                           features: {
                             scrollbar: true,
                             loop: false,
                             live: false,
                             behavior: 'default'
                           }
                         }).render().setUser('NBA_Philippines').start();
                         </script>
                   </div>
                   <!-- end twitter content -->
                   
                   
                   <!-- twitter content -->
                   <div id="facebook_tab_list" class="cell_330"   style="height: auto !important; min-height: 390px; height: 390px; border-top: 0px; padding-bottom: 0px; padding-top: 0px;  margin-bottom: 0px; margin-top: 0px;  " >
                   		
                        
                   		<div class="blue" style="padding: 5px 5px 5px 0px; " ><a href="http://www.facebook.com/philsnba" target="_blank" >Become a fan</a></div> 
                        <!--<iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fphilsnba&amp;width=318&amp;height=395&amp;colorscheme=light&amp;show_faces=false&amp;border_color=white&amp;stream=true&amp;header=false&amp;appId=134247523339520" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:318px; height:320px;" allowTransparency="true"></iframe>-->
                        <div id="Scroller">
                          <div id="Fbcontent" style="padding: 10px 10px 3px 10px">
                              <div style="text-align: center; padding: 10px 0">
                                 <img src="images/ajax-loader.gif">
                              </div>
                              <script type="text/javascript">
                                   /*$(function(){
                                    //function fb_wall_call() {
                                        $('#Fbcontent').fbWall({
                                           id:'philsnba',
                                           //accessToken:'AAAC7gAoWDQ0BAMDPcIvZCZBKsFkQGd31RYXggZCwNjLKrLIAM9BzUM7WndnBsI6C9fljfeTaq8Gw4opAQTPqwxHVl7wP0MLHzpSPZAfERO02HfO6CilM', 
                                          accessToken:'AAAC7gAoWDQ0BAHXnwXnZAMUZCwFoAlAfsk3UG32FuiuQ4OYjB2KVDZCprzPe8fiGIvhAHfN7e02a2mUKGsOs4P4F6tkq2YZD',
                                           showGuestEntries:false,
                                           showComments:false,
                                           max:1,
                                           timeConversion:24 
                                       });
                                       //alert("called");
                                    //}
                                   });*/
                               </script>
                               <div class="clear_both" ></div>
                           </div>
                        </div>
                         <!--<div style="padding: 5px 0px 10px 0px; " >
                            <table border="0" cellpadding="0" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td>View Facebook Group</td>
                                        <td>
                                            <form>
                                                <select name="fbpage" class="fbdd" onchange="window.open(this.options[this.selectedIndex].value,'_top')" style="margin-left: 10px; " >
                                                    <option value="http://www.facebook.com/nba/">Select One</option>
                                                    <option value="http://www.facebook.com/nba/">NBA</option>
                                                    <option value="http://www.facebook.com/wnba/">WNBA</option>
                                                    <option value="http://www.facebook.com/nbadleague/">D League</option>
                                                    <option value="http://www.facebook.com/NBAStore/">NBA Store</option>
                                                    <option value="http://www.facebook.com/NBAStoreNYC/">NBA Store on 5th Ave.</option>
                                                    <option value="http://www.facebook.com/yourNBAdestination/">NBA on ESPN RV Tour</option>
                                                    <option value="http://www.facebook.com/NBAONTNT/">NBA on TNT</option>
                                                </select>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>-->
                        
                      
                   </div>
                   <!-- end twitter content -->
                   
                   
                </div>
                
                
             </div>
    
             <div style="width: 300px; float: left; margin-left: 10px">
             
                <div style="width: 300px; height: 250px">
				<?php
					echo $ads_list['nba_homepage_middle_medallion1'];
					?>
                </div>
    			
                <!-- NBA TV Box -->
                <!--<div style="width: 300px; padding: 5px 0 2px 0; background: url('images/rounded_bottom_300.png') bottom center no-repeat">
                
                   <div class="article_header" style="background: url('images/rounded_top_300.png'); width: 270px; height: 15px">
                      NBA TV
                   </div>
    
                   
                   <div class="cell_300">
                      Entries.
                   </div>
                   
                   
                </div>-->
    			<!-- END NBA TV Box -->
                
                <div style="width: 300px; padding: 5px 0 2px 0; background: url('images/rounded_bottom_300.png') bottom center no-repeat">
                   <div class="article_header" style="background: url('images/rounded_top_300.png'); width: 270px; height: 15px">
                      AROUND THE NBA
                   </div>
    
                   <!-- poll content start -->
                   <div class="cell_300">
                    <?php
                    echo stripslashes($around_array['Content']);
                    ?>					
                   </div>
                   <!-- poll content end -->
                </div>
              <div style="height: 10px"></div>

<?php
$i = count($ads_array) - 1;
if ($ads_array[$i]['Link']) {
?>    
                <div style="width: 300px; height: 100px">
               <a href="<?php echo $ads_array[$i]['Link']; ?>"><img src="ads/<?php echo $ads_array[$i]['Image']; ?>"></a>
               </div>
<?php
}
?>
                
                <div style="height: 5px"></div>
    
                <div style="width: 300px; height: 250px">
        					<?php
          				  echo $ads_list['nba_homepage_middle_medallion2'];
          				?>
                </div>
             </div>
    
             <div class="clear"></div>
          </div>
          <!-- three columns end -->
          
          
          <!-- starting 5 start -->
          <div style="width: 982px; margin: 0 auto; padding: 5px 0 2px 0; background: url('images/rounded_bottom_982.png') bottom center no-repeat">
             <div class="article_header" style="background: url('images/rounded_top_982.png'); width: 952px; height: 15px">
                WHO'S YOUR STARTING 5?
    
                <div style="font-size: 14px; font-weight: bold; position: absolute; top: 10px; right: 15px">
                   <a href="starting-five" class="blue">VOTE NOW!</a>
                </div>
             </div>
    
             <div style="width: 970px; border: 1px solid #d8d8d8; padding: 10px 5px; color: #444; font-size: 12px">
                <table cellspacing="0" style="width: 100%; text-align: center; font-weight: bold" id="starting">
                   <tr>
            <?php
            $count = 0;
    
          foreach ($names as $k => $v) {
          ?>
                      <td <?php
                      if ($count < 4)
                         echo 'style="border-right: 1px solid #999"';
                      ?>>
                         <div style="color: #999; font-size: 14px"><?php echo $k; ?></div>
                         <div class="blue" style="font-size: 14px"><?php echo $v; ?></div>
                         <div style="color: #f03; font-size: 15px"><?php echo number_format($votes[$k], 0); ?> votes</div>
                      </td>
              <?php
                 $count += 1;
              }
              ?>
                   </tr>
                </table>
             </div>
          </div>
          <!-- starting 5 end -->
          
      
      
         <?php
		$footer_ads = $ads_list['nba_homepage_bottom_leaderboard']; 
		include('layouts/links.php');
		?> 
          
            
   </div>
  
       
</div>

 <!-- end main_content -->
   
	<?php
    	include('layouts/footer.php');
    ?>
<script type="text/javascript">
<!--
$(function() {
   post_fb_content();
});

var gallery_count = 0;

$("#gallery_left").click(function() {
   //$("#gallery_pics").data("scrollable").prev();

   gallery_count -= 1;
   if (gallery_count < 0)
      gallery_count = <?php echo ($gallery_total - 1); ?>;

   getGallery(gallery_count);
});

$("#gallery_right").click(function() {
   
   //$("#gallery_pics").data("scrollable").next();
	 
   gallery_count += 1;
   if (gallery_count > <?php echo ($gallery_total - 1); ?>)
      gallery_count = 0;
	 
 	 getGallery(gallery_count);
    
});

<?php
include('nav_js.php');
?>
-->
</script>
<script type="text/javascript" src="java-index.js"></script>

<?php
include("layouts/background_ads.php");
?>


</body>
</html>


<?php

$cachetime = 5 * 60;
// Serve from the cache if it is younger than $cachetime
/*if (file_exists($cachefile) && time() - $cachetime < filemtime($cachefile)) {
    include($cachefile);
    echo "<!-- Cached copy, generated ".date('H:i', filemtime($cachefile))." -->\n";
    exit ;
}*/

if(($cache_this == 1)) // put && ($base == "http://ph.nba.com/")
 {
	 
	// Start the output buffer
	
	/* The code to dynamically generate the page goes here */
	
	// Cache the output to a file
	$fp = fopen($cachefile, 'w');
	fwrite($fp, ob_get_contents());
	fclose($fp);

}//end cache this
ob_end_flush(); // Send the output to the browser
}//end else cache
?>
