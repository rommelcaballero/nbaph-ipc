<?php
include('sql.php');
include('lib.php');


$part_page = "index";

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>NBA Philippines</title>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859" /> 

<base href="<?php echo $base; ?>">

<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="jquery.lightbox-0.5.css"> 

<script type="text/javascript" >
var base = "<?php echo $base; ?>";
</script>

<script type="text/javascript" src="jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="jquery.lightbox-0.5.js"></script>
<script type="text/javascript" src="jquery.tools.min.js"></script>
<script type="text/javascript" src="jquery.imgpreload.js"></script>
<script type="text/javascript" src="java.js"></script>


<!--[if IE]>
<link rel="stylesheet" type="text/css" href="ie_style.css">
<![endif]-->
<style type="text/css">
<!-- 
 

p {
padding: 0;
margin: 0;
}

#carousel_intro a {
color: #0054af;
}

#carousel_intro img {
vertical-align: -2px;
}

.scroll {
position:relative;
overflow:hidden;
width: 600px;
height: 100px;
float:left;
}

/* root element for the scroll pics */
.scroll .pics {
width:20000em;
position:absolute;
clear:both;
}

/* single scroll item */
.pics .pics_content {
float:left;
width:620px !important;
height:110px;
margin:0px;
}

.pics_content a {
color: #0054af;
}

.pics .gallery_content {
float:left;
width:282px !important;
margin:0px;
}

.video_list {
list-style: none;
margin: 0;
padding: 0;
}

.video_list li {
float: left;
width: 130px;
height: 23px;
padding-top: 10px;
background: url('images/tab.png');
font-size: 14px;
font-weight: bold;
color: #0054af;
text-align: center;
cursor: pointer;
}


.share_list {
list-style: none;
margin: 0;
padding: 0;
}

.share_list li {
float: left;
width: 130px;
height: 23px;
padding-top: 10px;
background: url('images/tab.png');
font-size: 14px;
font-weight: bold;
color: #0054af;
text-align: center;
cursor: pointer;
}


.writer_title a {
font-size: 14px;
font-weight: bold;
color: #0054af;
}

.writer_content {
font-size: 10px;
color: #808080;
}

.headline_circle, .video_circle {
cursor: pointer;
}

.pics_actual {
width: 140px;
height: 70px;
text-align: center;
}

.pics_content {
font-size: 12px;
color: #0054af;
}

.pics_details {
width: 140px;
height: 100%;
padding: 0 5px;
background: #fff;
float: left;
font-size: 11px;
}

.cell_330 {
width: 318px;
border: 1px solid #d8d8d8;
padding: 5px 5px 10px 5px;
color: #444;
font-size: 11px;

}

.cell_330 ul {
	
	margin: 5px 0px 0px 15px; 
	padding: 0px;
	
}

.cell_330 ul li {
 	margin: 0px; 
	padding: 0px; 
 }

.cell_300 {
width: 288px;
border: 1px solid #d8d8d8;
padding: 5px 5px 10px 5px;
color: #444;
font-size: 11px;
}

.cell_330 a, .cell_300 a, .more_link a {
color: #0054af;
text-decoration: none;
}

 .cell_330 a:hover, .cell_300 a:hover, .more_link a:hover {
color: #0054af;
text-decoration: underline;
}
 
.poll_choice input {
vertical-align: -3px;
}

#poll_form td {
vertical-align: top;
}

.more_link {
text-align: right;
padding-top: 5px;
font-size: 12px;
}

.carousel {
width: 672px;
position: absolute;
top: 0;
left: 0;
}

.carousel_text {
width: 652px;
height: 82px;
background: url('images/topstory_overlay.png');
position: absolute;
bottom: 10px;
left: 8px;
}

#starting td {
padding: 5px;
width: 183px;
}
-->

 
</style>
</head>

<body  >





<?php
include('popups.php');
?>

<div id="wrapper">
<?php
include('header.php');
?>
	
   <!-- main_content -->
   <div id="main_content" >
 
      	  <div style="height: 10px"></div>

          <div style="width: 958px; height: 90px; margin: 0 auto; text-align: center; ">
			<?php
            $results = mysql_query("SELECT Content FROM ads_list WHERE AdsDesc='nba_homepage_top_leaderboard' AND Status='s' ");
            $row = mysql_fetch_array($results);
            echo $row['Content'];
            ?>
          </div>
    
          <div style="height: 10px"></div>
    
          <div style="text-align: center">
             <a href="http://nbastore.com/" target="_blank"><img src="images/nba_store.png" border="0"></a>
          </div>
    
          <div style="padding: 10px 30px">
             <a href="http://ph.global.nba.com/stats/league/leagueSchedule.xhtml" style="font-size: 14px; font-weight: bold; color: #1c75bc">View Full Calendar</a>
          </div>
    
          <div style="width: 1000px;  margin: 0 auto; text-align: center; background: #fff">
             <iframe src="http://ph.global.nba.com/hpscoreboardiframe.html" align="center" frameborder="0" width="1000" height="143" scrolling="no" marginwidth="0" marginheight="0" style="text-align:center; align: center; margin: 0; padding: 0; marginwidth:0"></iframe>
          </div>
    
          <div style="height: 10px"></div>
          
          
          
          <!-- top half container start -->
          <div class="container"  >
          
             <!-- top left start  -->
             <div style="float: left; width: 672px; margin-left: 10px; ">
                <!-- headlines start -->
                <div style="width: 672px; padding-bottom: 2px; background: url('images/rounded_bottom_672.png') bottom center no-repeat; ">
                
                   <div style="width: 672px; height: 376px; overflow: hidden">
   					<?php
					$results = mysql_query("SELECT CarouselID, Title, Image, Link, Source, Intro FROM carousel ORDER BY DatePosted DESC LIMIT 0, 12");
					
					$carousel = "";
					$count = 1;
					
					$cthumbs = array(); 
					while ($row = mysql_fetch_array($results)) { 
						
						$cthumbs[$count-1]['Title'] = stripslashes($row['Title']);
						$cthumbs[$count-1]['Image'] = stripslashes($row['Image']); 
						
					?>
									  <div id="carousel<?php echo $count; ?>" class="carousel" style=" <?php if ($count > 1) echo "display: none"; ?>">
										 <a href="<?php echo $row['Link']; ?>"<?php
										 if ($row['Source'] == "US")
											echo ' target="_blank"';
										 ?>><img src="<?php echo $row['Image']; ?>" ></a>
										 <div class="carousel_text">
											<div style="font-family: arial; font-size: 20px; color: #fff; margin: 4px 15px; width: 622px; height: 24px; overflow: hidden">
											   <b><a href="<?php echo $row['Link']; ?>" style="color: #fff"<?php
											   if ($row['Source'] == "US")
												  echo ' target="_blank"';?>><?php echo stripslashes($row['Title']); ?></a></b>
											</div>
					
											<div id="carousel_intro" style="font-size: 12px; color: #fff; margin: 4px 15px; width: 622px; height: 46px; overflow: hidden">
											   <b><?php echo stripslashes($row['Intro']); ?></b>
											</div>
										 </div>
									  </div>
					<?php
					   $count += 1;
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
																	<div class="pics_details pointer" onclick="carousel(<?php echo ($count + 1); ?>)">
																	   <div class="pics_actual">
																		  <img src="<?php echo resizeCrop($cthumbs[$i]['Image'], 132, 70, ''); ?>">
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
                                    $results = mysql_query("SELECT VideoID, Thumbnail, Title, Link FROM videos where Section = 'Highlights' ORDER BY SortOrder DESC, DatePosted DESC LIMIT 0, 12");
                                    
                                    $total = mysql_num_rows($results);
                                    $count = 0;
                                    
                                    while($row = mysql_fetch_array($results)) {
                                       if ($count % 4 == 0) {
                                    ?>
                                                                     <div class="pics_content">
                                    <?php
                                       }
                                       if (preg_match("/^http/i", $row['Thumbnail'])) {
                                       } else {
                                            $row['Thumbnail'] = "http://i2.cdn.turner.com/" .$row['Thumbnail'];		
                                       }
                                    ?>
                                                                        <div class="pics_details">
                                                                           <div class="pics_actual">
                                                                              <a href="<?php echo stripslashes($row['Link']); ?>"><img src="resize_crop.php?file=<?php echo $row['Thumbnail']; ?>&w=132&h=70" border="0"></a>
                                                                           </div>
                                    
                                                                           <a href="<?php echo stripslashes($row['Link']); ?>"><?php echo stripslashes($row['Title']); ?></a>
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
					$results = mysql_query("SELECT Content FROM ads_list WHERE AdsDesc='nba_homepage_top_medallion' AND Status='s' LIMIT 0,1 ");
					$row = mysql_fetch_array($results);
					echo $row['Content'];
					?>
                </div>
    
                <div style="height: 10px"></div>
    
                <div style="width: 300px; height: 100px">
				<?php
                $results = mysql_query("select AdID, Image, Link from ads where Dimensions = '300x100' order by RAND() limit 0, 1");
                $row = mysql_fetch_array($results);
                ?>
               <a href="<?php echo $row['Link']; ?>"><img src="ads/<?php echo $row['Image']; ?>"></a>
                </div>
    
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
    $results = mysql_query("select BlogID, Blogger, BlogTitle, BlogLink, BlogExcerpt from personalitiesorder left join personalities using (Blogger) order by Position, DatePosted desc limit 0, 100");
    $last_blogger = "";
$blog_cnt = 0;

    while ($row = mysql_fetch_array($results)) {

if (($last_blogger != $row['Blogger']) && ($blog_cnt < 2)) {

   $blogger_pic = strtolower(urlencode(str_replace("ñ", "n", $row['Blogger'])));

$blog_cnt++;

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
			if ($row['BlogLink']) {
?>
                                        <a href="<?php echo stripslashes($row['BlogLink']); ?>" target="_blank"><?php echo stripslashes($row['BlogTitle']); ?></a>
<?php } else { ?>
					<a href="writers-content/<?php echo $row['BlogID']; ?>/<?php echo seoUrl(trim($row['BlogTitle'])); ?>"><?php echo stripslashes($row['BlogTitle']); ?></a>
<?php }  ?>
                                     </div>
    
                                     <div class="writer_content">
                                        <b><?php echo stripslashes(strtoupper($row['Blogger'])); ?></b>
    
                                        <div style="padding-top: 5px">
                                           <?php echo stripslashes($row['BlogExcerpt']); ?>
                                        </div>
                                     </div>
                                  </td>
                               </tr>
    <?php
    }
$last_blogger = $row['Blogger'];

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
    $results = mysql_query("select BlogID, Blogger, BlogTitle, BlogLink, BlogExcerpt from blogorder left join blog using (Blogger) order by Position, DatePosted desc limit 0, 100");
    $last_blogger = "";
	$blog_cnt = 0;

    while ($row = mysql_fetch_array($results)) {
if (($last_blogger != $row['Blogger']) && ($blog_cnt < 2)) {
$blogger_pic = strtolower(urlencode(str_replace("ñ", "n", $row['Blogger'])));
$blog_cnt++;
    ?>
                               <tr>
                                  <td style="width: 55px; vertical-align: top; padding-top: 10px; " >
                                     <div style="width: 45px; height: 75px;"><img src="images/blogs/<?php echo $blogger_pic; ?>.jpg" border="0"></div>
                                  </td>
                                  <td>
                                     <div class="writer_title">
<?php
			if ($row['BlogLink']) {
?>
                                        <a href="<?php echo stripslashes($row['BlogLink']); ?>" target="_blank"><?php echo stripslashes($row['BlogTitle']); ?></a>
<?php } else { ?>
					<a href="bloggers/<?php echo $row['BlogID']; ?>/<?php echo seoUrl($row['BlogTitle']); ?>"><?php echo stripslashes($row['BlogTitle']); ?></a>
<?php }  ?>
                                     </div>
    
                                     <div class="writer_content">
                                        <b><?php echo stripslashes(strtoupper($row['Blogger'])); ?></b>
    
                                        <div style="padding-top: 5px">
                                           <?php echo stripslashes($row['BlogExcerpt']); ?>
                                        </div>
                                     </div>
                                  </td>
                               </tr>
    <?php
    }
$last_blogger = $row['Blogger'];

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
			$results = mysql_query("SELECT Content FROM ads_list WHERE AdsDesc='nba_homepage_middle_leaderboard' AND Status='s' ");
			$row = mysql_fetch_array($results);
			echo $row['Content'];
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
    $results = mysql_query("select NewsID, Title, Link, Source from news order by DatePosted desc limit 0, 5");
    
    $count = 0;
    
    while($row = mysql_fetch_array($results)) {
       $style = "";
       if ($count % 2 == 1)
          $style = "background: #ccc";
    ?>
                         <tr style="<?php echo $style; ?>">
                            <td>
                               <a href="<?php
                               if ($row['Link'])
                                  echo $row['Link'];
                               else
                                  //echo "news_article.php?newsid=" . $row['NewsID'];
								  echo "news-article/".$row['NewsID']."/".seoUrl(trim($row['NewsTitle']));
                               ?>"><?php echo stripslashes($row['Title']); ?></a>
                            </td>
                         </tr>
    <?php
       $count += 1;
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
    <?php
    $results = mysql_query("select EventID, Title, Intro, Image from events order by DatePosted desc limit 0, 1");
    $row = mysql_fetch_array($results);
    ?>
                      <div style="width: 318px; ">
                          <img src="<?php echo resizePic($row['Image'], 318, 159, ''); ?>" >
                       </div>
    
                      <div style="padding: 5px 0; font-size: 14px">
                         <b><?php echo stripslashes($row['Title']); ?></b>
                      </div>
    
                      <?php echo stripslashes($row['Intro']); ?>
    
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
    $results = mysql_query("select * from features order by FeatureID DESC limit 0, 5");
    
    $count = 0;
    
    while($row = mysql_fetch_array($results)) {
       $style = "";
       if ($count % 2 == 1)
          $style = "background: #ccc";
    ?>
                         <tr style="<?php echo $style; ?>">
                            <td>
                               <a href="<?php echo $row['Link']; ?>"><?php echo stripslashes($row['Title']); ?></a>
                            </td>
                         </tr>
    <?php
       $count += 1;
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
                                  
									<?php
                                    $strip = array(" ", ",", "'", "\"", "!", "?");
                                    
                                    $results = mysql_query("select GalleryID, GalleryName from gallery order by SortOrder DESC, DateAdded desc limit 0, 1");
                                    $gallery = mysql_fetch_array($results);
                                    
                                    $results = mysql_query("select PhotoID, GalleryID, Filename, Caption from galleryphotos where GalleryID = '" . mysql_real_escape_string($gallery['GalleryID']) . "'");
                   					
									
                                    $gallery_total = mysql_num_rows($results);
                                    $count = 0;
                                    $_SESSION['photos'] = array();	
									
                                      while($row = mysql_fetch_array($results)) {
                                        
                                       if($row['Filename'])
                                         {
                                             $filename = "images/gallery/".$row['GalleryID']."/".$row['Filename'];
                                         }
                                        else
                                         {
                                             $filename = "images/gallery/".$row['GalleryID']."/".$row['PhotoID']."_photos.jpg";
                                         }
                             		   
									   $_SESSION['photos'][$count]['PhotoID'] = $row['PhotoID']; 
									   $_SESSION['photos'][$count]['GalleryID'] = $row['GalleryID']; 
									   $_SESSION['photos'][$count]['Caption'] = stripslashes($row['Caption']); 
									   $_SESSION['photos'][$count]['GalleryName'] = stripslashes($gallery['GalleryName']); 
									   $_SESSION['photos'][$count]['Filename'] = $filename; 
									  
                                        $count += 1;
                                    }
                                    ?>
                                    
                                         
                                     	
                                        <div  style="width: 282px; height: 282px" >
                                            <!--<table cellspacing="0" cellpadding="0" >
                                               <tr>
                                                  <td style="text-align: center"  >
                                                         
                                                  </td>
                                               </tr>
                                            </table>--> 
                                            <a  title="<?php echo stripslashes($_SESSION['photos'][0]['Caption']); ?>" href="photo-gallery/<?php echo $_SESSION['photos'][0]['GalleryID']; ?>/<?php  echo seoUrl($_SESSION['photos'][0]['GalleryName']); ?>"><img src="<?php echo resizePic($_SESSION['photos'][0]['Filename'], 282, 282, ''); ?>" id="GalleryMain" ></a>
                                                 
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
    $results = mysql_query("select PollID, Question, Image from polls order by DatePosted desc limit 0, 1");
    $poll = mysql_fetch_array($results);
    
    $q = "select * from pollvote where PollID = '" . mysql_real_escape_string($poll['PollID']) . "' and UserID = '" . mysql_real_escape_string($_SESSION['userid']) . "'";
    $latest = mysql_query($q);
    $voted = mysql_num_rows($latest);
    
    if (!isset($_COOKIE['pollvoter'])) {
    ?>
                      <form id="poll_form">
                         <input type="hidden" name="pollid" value="<?php echo $poll['PollID']?>">
                         <table cellspacing="0" style="width: 100%; height: 175px">
                            <tr>
    <?php
       if ($poll['Image']) {
    ?>
                               <td rowspan="2" style="width: 105px">
                                   <img src="<?php echo resizeCrop($poll['Image'], 132, 70, ''); ?>"> 
                               </td>
    <?php
       }
    ?>
                               <td>
                                  <?php echo stripslashes($poll['Question']); ?>
    
                                  <div style="padding: 5px 0">

    <?php
       $results = mysql_query("select * from pollquestions where PollID = '" . mysql_real_escape_string($poll['PollID']) . "' order by PollID desc");
    
       $count = 0;
    
       while($row = mysql_fetch_array($results)) {
    ?>
                                     <div class="poll_choice">
                                        <input type="radio" name="poll" id="poll<?php echo $count; ?>" value="<?php echo $row['Selection']; ?>">
                                        <label for="poll<?php echo $count; ?>"><?php echo $row['Choice']; ?></label>
                                     </div>
    <?php
          $count += 1;
       }
    ?>
                                  </div>
                               </td>
                            </tr>
                            <tr>
                               <td>
                                  <img src="images/vote.png" class="pointer" onclick="<?php
                                  if (!isset($_COOKIE['pollvoter'])) 
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
                                  <img src="<?php echo resizeCrop($poll['Image'], 100, 100, ''); ?>">
                               </td>
    <?php
    }
    ?>
                               <td valign="top">
                                  <?php echo stripslashes($poll['Question']); ?>
    
                                  <div style="padding: 5px 0"><table border="0" cellspacing="2" cellpadding="0">
    <?php
    $results = mysql_query("select * from pollquestions where PollID = '" . mysql_real_escape_string($poll['PollID']) . "'");
    $totalquery = mysql_query("select SUM(Answers) from pollquestions where PollID = '" . $poll['PollID'] . "' GROUP BY PollID");
	$total = mysql_result($totalquery, 0);

   
    $count = 0;
    
    while($row = mysql_fetch_array($results)) {
	$percentage = round((($row['Answers']/$total) * 100) * 1);
	if ($percentage < 1) { $percentage = 1; }	    

    ?>
               <tr>
                  <td valign="top">
                     <div class="poll_choice"><?php echo $row['Choice'] . "<!-- - " . $row['Answers']; ?>--></div>
                  </td>
                  <td valign="top">
                     <div style="width: 85px">
                        <div style="float: left; margin-left: 5px; background-color:#6699cc; height:10px; width:<?php echo $percentage; ?>%; overflow: hidden"></div>
                        <div style="float: left; margin-left: 3px; color: #666" class="poll_numbers"><?php echo round(($row['Answers']/$total) * 100); ?>%</div>
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
    <?php
    $results = mysql_query("select * from nbaaction order by DatePosted desc limit 0, 1");
    $row = mysql_fetch_array($results);
    ?>
                   <div class="article_header" style="background: url('images/rounded_top_330.png'); width: 300px; height: 15px">
                      <?php echo stripslashes($row['Heading']); ?>
                   </div>
                   
                   <!-- Headlines content start -->
                   <div class="cell_330">
                      
                      <?php
                      //if ($row['Photo'])
                         //echo '<img src="thumbs.php?filename=' . $row['Photo'] . '&width=318&height=318">';
    				  	
                      echo stripslashes($row['Content']);
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
                               <li style="background-position: 0 33px; color: #444; " class="share_element" id="twitter_tab">
                                   <span style="background-image: url(images/twit_share1.png); background-repeat: no-repeat; text-align: left; padding-left: 18px; " >Twitter</span> 
                               </li>
                               <li class="share_element" id="facebook_tab">
                                   <span style="background-image: url(images/fb_share1.png); background-repeat: no-repeat; text-align: left; padding-left: 19px; " >Facebook</span> 
                               </li>
                               <li class="share_element" style="height: 22px; width: 66px; border-bottom: 1px solid #e6e6e6; background-image: none; " >
                                  &nbsp;
                               </li>
                            </ul>
                        
                            <div class="clear"></div>
                        
                      </div>
                     
                    </div>
                    <!-- end tab -->
                     
                   <!-- twitter content -->
                    <div id="twitter_tab_list" class="cell_330" style="height: auto !important; min-height: 390px; height: 390px; border-top: 0px; padding-bottom: 0px; padding-top: 0px;  margin-bottom: 0px; margin-top: 0px;  " >
						 <script charset="utf-8" src="http://widgets.twimg.com/j/2/widget.js"></script>
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
                   <link href="fbfeed/jquery.neosmart.fb.wall.css" rel="stylesheet" type="text/css"/>
					<!--<script src="fbfeed/jquery-1.6.1.min.js" type="text/javascript"></script>-->
                    <script src="fbfeed/jquery.neosmart.fb.wall.js" type="text/javascript"></script>
                    
                   <div id="facebook_tab_list" class="cell_330"   style="display:none; height: auto !important; min-height: 390px; height: 390px; border-top: 0px; padding-bottom: 0px; padding-top: 0px;  margin-bottom: 0px; margin-top: 0px;  " >
                   		
                        
                   		<div class="blue" style="padding: 5px 5px 5px 0px; " ><a href="http://www.facebook.com/philsnba" target="_blank" >Become a fan</a></div> 
                        <!--<iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fphilsnba&amp;width=318&amp;height=395&amp;colorscheme=light&amp;show_faces=false&amp;border_color=white&amp;stream=true&amp;header=false&amp;appId=134247523339520" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:318px; height:320px;" allowTransparency="true"></iframe>-->
                       <div id="Fbcontent" style="padding: 10px 10px 3px 10px; "  >
						   <script type="text/javascript">
                                $(function(){
                                     
                                     $('#Fbcontent').fbWall({
                                        id:'philsnba',
                                        //accessToken:'AAAC7gAoWDQ0BAMDPcIvZCZBKsFkQGd31RYXggZCwNjLKrLIAM9BzUM7WndnBsI6C9fljfeTaq8Gw4opAQTPqwxHVl7wP0MLHzpSPZAfERO02HfO6CilM', 
										accessToken:'AAAC7gAoWDQ0BAGzwrx0cLkpSMFxmvSwZAi414H4xsFRUZCuwNjcahoZCnI5CHyZARDDcgVK5TG8yCSvVXElOZCga4aQDsargZD',
                                        showGuestEntries:false,
                                        showComments:false,
                                        max:1,
                                        timeConversion:24 
                                    });
                                     
                                });
                            </script>
                            <div class="clear_both" ></div>
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
					$results = mysql_query("SELECT Content FROM ads_list WHERE AdsDesc='nba_homepage_middle_medallion1' AND Status='s' LIMIT 0,1 ");
					$row = mysql_fetch_array($results);
					echo $row['Content'];
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
    $results = mysql_query("select AroundID, Content from aroundnba order by DatePosted desc limit 0, 1");
    $row = mysql_fetch_array($results);
    
    echo stripslashes($row['Content']);
    ?>					
 

                   </div>
                   <!-- poll content end -->
                </div>
<div style="height: 10px"></div>
    
                <div style="width: 300px; height: 100px">
<?php
$results = mysql_query("select AdID, Link, Image from ads where Dimensions = '300x100' order by RAND() limit 0, 1");
$row = mysql_fetch_array($results);
?>
               <a href="<?php echo $row['Link']; ?>"><img src="ads/<?php echo $row['Image']; ?>"></a>
               </div>
    
                
                <div style="height: 5px"></div>
    
                <div style="width: 300px; height: 250px">
					<?php
				$results = mysql_query("SELECT Content FROM ads_list WHERE AdsDesc='nba_homepage_middle_medallion2 ' AND Status='s' ");
				$row = mysql_fetch_array($results);
				echo $row['Content'];
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
    $results = mysql_query("select StartingfiveID, Position, PlayerName, Votes, PlayerNumber, Filename from startingfive order by Votes");
    
    $names = array();
    $votes = array();
    
    while($row = mysql_fetch_array($results)) {
       if ($votes[$row['Position']] < $row['Votes']) {
          $names[$row['Position']] = stripslashes($row['PlayerName']);
          $votes[$row['Position']] = $row['Votes'];
       }
    }
    
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
		 $results = mysql_query("SELECT Content FROM ads_list WHERE AdsDesc='nba_homepage_bottom_leaderboard' AND Status='s' ");
		$row = mysql_fetch_array($results);
		$footer_ads = $row['Content']; 
		include('links.php');
		?> 
          
            
   </div>
  
       
</div>

 <!-- end main_content -->
   
	<?php
    	include('footer.php');
    ?>
<script type="text/javascript">
<!--
$(function() {
   $('.boxlight').filter(function(index) {
     if (index != 0 && index != <?php echo ($gallery_total + 1); ?>)
      $(this).addClass("lightbox");
   });

   $('a.lightbox').lightBox();
});


$(".scroll").scrollable({ circular: true });


var video_section = "video_list_gallery";

var headline_count = 0;
var video_count = 0;

$("#headline_left").click(function() {
   $("#headline_pics").data("scrollable").prev();

   $("#headline_circle_" + headline_count).prop("src", "images/circle_empty.png");

   headline_count -= 1;
   if (headline_count < 0)
      headline_count = 2;

   $("#headline_circle_" + headline_count).prop("src", "images/circle_filled.png");
   
});

$("#headline_right").click(function() {
   $("#headline_pics").data("scrollable").next();

   $("#headline_circle_" + headline_count).prop("src", "images/circle_empty.png");

   headline_count += 1;
   if (headline_count > 2)
      headline_count = 0;

   $("#headline_circle_" + headline_count).prop("src", "images/circle_filled.png"); 
   
});


$(".headline_circle").click(function() {
   $("#headline_circle_" + headline_count).prop("src", "images/circle_empty.png");

   var num = parseInt($(this).prop("id").substring($(this).prop("id").length - 1));
   $("#headline_pics").data("scrollable").seekTo(num);
   headline_count = num;

   $("#headline_circle_" + headline_count).prop("src", "images/circle_filled.png");
});

$("#video_left").click(function() {
   $("#" + video_section).data("scrollable").prev();

   $("#video_circle_" + video_count).prop("src", "images/circle_empty.png");

   video_count -= 1;
   if (video_count < 0)
      video_count = 2;

   $("#video_circle_" + video_count).prop("src", "images/circle_filled.png");
});

$("#video_right").click(function() {
   $("#" + video_section).data("scrollable").next();

   $("#video_circle_" + video_count).prop("src", "images/circle_empty.png");

   video_count += 1;
   if (video_count > 2)
      video_count = 0;

   $("#video_circle_" + video_count).prop("src", "images/circle_filled.png");
});

$(".video_circle").click(function() {
   $("#video_circle_" + video_count).prop("src", "images/circle_empty.png");

   var num = parseInt($(this).prop("id").substring($(this).prop("id").length - 1));
   $("#" + video_section).data("scrollable").seekTo(num);
   video_count = num;

   $("#video_circle_" + video_count).prop("src", "images/circle_filled.png");
});


var video_tab = "video_list_highlights";

$(".video_element").hover(function() {
   $(this).css({backgroundPosition: "0 33px", color: "#444"});
   }, function() {
   if ($(this).prop("id") != video_tab) {
      $(this).css({backgroundPosition: "0 0", color: "#0054af"});
   }
});

$(".video_element").click(function() {
    
   if ($(this).prop('id') != "video_list_live") {
	  
	  	getVideos($(this))
	  
   }
   
});


var writer_tab = "writer_personality";

$(".writer_element").hover(function() {
   $(this).css({backgroundPosition: "0 33px", color: "#444"});
   }, function() {
   if ($(this).prop("id") != writer_tab) {
      $(this).css({backgroundPosition: "0 0", color: "#0054af"});
   }
});

$(".writer_element").click(function() {
   $("#" + writer_tab).css({backgroundPosition: "0 0", color: "#0054af"});
   $("#" + writer_tab + "_list").css({display: "none"});

   writer_tab = $(this).prop("id");
   
   $("#" + writer_tab).css({backgroundPosition: "0 33px", color: "#444"});
   $("#" + writer_tab + "_list").css({display: "block"});
});



//SHARE MEDIA
var share_tab = "twitter_tab";

$("._element").hover(function() {
   $(this).css({backgroundPosition: "0 33px", color: "#444"});
   }, function() {
   if ($(this).prop("id") != writer_tab) {
      $(this).css({backgroundPosition: "0 0", color: "#0054af"});
   }
});

$(".share_element").click(function() {
   $("#" + share_tab).css({backgroundPosition: "0 0", color: "#0054af"});
   $("#" + share_tab + "_list").css({display: "none"});

   share_tab = $(this).prop("id");
   
   $("#" + share_tab).css({backgroundPosition: "0 33px", color: "#444"});
   $("#" + share_tab + "_list").css({display: "block"});
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


function submit_poll() {
   var dat = $("#poll_form").serialize();

   $.post("submit_poll.php", dat, function(msg) {
      $("#poll_cell").html(msg);
   });
}

var p_top = 1;
var c_top = 1;

function carousel(targ) {
   if (c_top != targ) {
      $("#carousel" + c_top).css({zIndex: 0});

      p_top = c_top;
      c_top = targ;

      $("#carousel" + targ).css({zIndex: 10});
      $("#carousel" + targ).css({left: "-672px", display: "block"}).animate({left: '0'}, "fast", function() {
       $("#carousel" + p_top).css({display: "none"});
      });
      //$("#carousel" + targ).slideDown("fast", function() {
       //$("#carousel" + p_top).css({display: "none"});
      //});
   }
}



<?php
include('nav_js.php');
?>
-->
</script>



<script type="text/javascript">
<!--
$(function() {
	 
 
});
-->
</script>


<?php
include("background_ads.php");
?>


</body>
</html>



<?php
mysql_close($connect);
?>



