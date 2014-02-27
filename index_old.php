<?php
include('sql.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>NBA Philippines</title>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="jquery.lightbox-0.5.css">
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
height: 90px;
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
height: 78px;
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
}

.cell_330 {
width: 318px;
border: 1px solid #d8d8d8;
padding: 5px;
color: #444;
font-size: 12px;
}

.cell_300 {
width: 288px;
border: 1px solid #d8d8d8;
padding: 5px;
color: #444;
font-size: 12px;
}

.cell_330 a, .cell_300 a, .more_link a {
color: #0054af;
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
width: 662px;
padding: 5px;
background: url('images/clear_white.png');
position: absolute;
bottom: 0;
left: 0;
}

#starting td {
padding: 5px;
width: 183px;
}
-->
</style>
</head>

<body>
<?php
include('popups.php');
?>

<div id="wrapper">
<?php
include('header.php');
?>

   <div id="main_content">
      <div style="height: 10px"></div>

      <div style="width: 958px; height: 90px; margin: 0 auto; text-align: center; background: #ccc">
         Google ads
      </div>

      <div style="height: 10px"></div>

      <div style="text-align: center">
         <a href="#"><img src="images/nba_store.png"></a>
      </div>

      <div style="padding: 10px 30px">
         <a href="#" style="font-size: 14px; font-weight: bold; color: #1c75bc">View Full Calendar</a>
      </div>

      <div style="width: 972px; height: 83px; margin: 0 auto; text-align: center; background: #ccc">
         Stats
      </div>

      <div style="height: 10px"></div>

      <!-- top half start -->
      <div>
         <!-- top left start -->
         <div style="float: left; width: 672px; margin-left: 10px">
            <!-- headlines start -->
            <div style="width: 672px; padding-bottom: 2px; background: url('images/rounded_bottom_672.png') bottom center no-repeat">
               <div style="width: 672px; height: 376px">
<?php
$results = mysql_query("select * from carousel order by DatePosted desc limit 0, 12");

$carousel = "";
$count = 1;

while ($row = mysql_fetch_array($results)) {
?>
                  <div id="carousel<?php echo $count; ?>" class="carousel" style="<?php if ($count > 1) echo "display: none"; ?>">
                     <a href="<?php echo $row['Link']; ?>"<?php
                     if ($row['Source'] == "US")
                        echo ' target="_blank"';
                     ?>><img src="<?php echo $row['Image']; ?>"></a>
                     <div class="carousel_text">
                        <div style="font-size: 22px; color: #231f20">
                           <a href="' . $row['Link'] . '" style="color: #000"<?php
                           if ($row['Source'] == "US")
                              echo ' target="_blank"';?>><?php echo stripslashes($row['Title']); ?></a>
                        </div>

                        <div id="carousel_intro" style="font-size: 12px; color: #444; padding-top: 5px">
                           <?php echo stripslashes($row['Intro']); ?>
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
$results = mysql_query("select * from carousel order by DatePosted desc limit 0, 12");

$total = mysql_num_rows($results);
$count = 0;

while($row = mysql_fetch_array($results)) {
   if ($count % 4 == 0) {
?>
                                 <div class="pics_content">
<?php
   }
?>
                                    <div class="pics_details pointer" onclick="carousel(<?php echo ($count + 1); ?>)">
                                       <div class="pics_actual">
                                          <img src="thumbs.php?filename=<?php echo $row['Image']; ?>&width=140&height=78">
                                       </div>

                                       <?php echo stripslashes($row['Title']); ?>
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
                        <li style="background-position: 0 33px; color: #444" class="video_element" id="video_list_highlights">
                           HIGHLIGHTS
                        </li>
                        <li class="video_element" id="video_list_top">
                           TOP PLAYS
                        </li>
                        <li class="video_element" id="video_list_picks">
                           EDITOR'S PICKS
                        </li>
                        <li class="video_element" id="video_list_tv">
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
                        <td style="width: 600px; background: #ccc">
                           <div class="scroll" id="video_list_highlights_gallery">
                              <div class="pics">
<?php
$results = mysql_query("select * from videos where Section = 'Highlights' order by DatePosted desc limit 0, 12");

$total = mysql_num_rows($results);
$count = 0;

while($row = mysql_fetch_array($results)) {
   if ($count % 4 == 0) {
?>
                                 <div class="pics_content">
<?php
   }
?>
                                    <div class="pics_details">
                                       <div class="pics_actual">
                                          <a href="<?php echo stripslashes($row['Link']); ?>"><img src="thumbs.php?filename=<?php echo $row['Thumbnail']; ?>&width=140&height=78"></a>
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

                           <div class="scroll" id="video_list_top_gallery" style="display: none">
                              <div class="pics">
<?php
$results = mysql_query("select * from videos where Section = 'Top Plays' order by DatePosted desc limit 0, 12");

$total = mysql_num_rows($results);
$count = 0;

while($row = mysql_fetch_array($results)) {
   if ($count % 4 == 0) {
?>
                                 <div class="pics_content">
<?php
   }
?>
                                    <div class="pics_details">
                                       <div class="pics_actual">
                                          <img src="thumbs.php?filename=<?php echo $row['Thumbnail']; ?>&width=140&height=78">
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

                           <div class="scroll" id="video_list_picks_gallery" style="display: none">
                              <div class="pics">
<?php
$results = mysql_query("select * from videos where Section = 'Editor\'s Picks' order by DatePosted desc limit 0, 12");

$total = mysql_num_rows($results);
$count = 0;

while($row = mysql_fetch_array($results)) {
   if ($count % 4 == 0) {
?>
                                 <div class="pics_content">
<?php
   }
?>
                                    <div class="pics_details">
                                       <div class="pics_actual">
                                          <img src="thumbs.php?filename=<?php echo $row['Thumbnail']; ?>&width=140&height=78">
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

                           <div class="scroll" id="video_list_tv_gallery" style="display: none">
                              <div class="pics">
<?php
$results = mysql_query("select * from videos where Section = 'NBA TV' order by DatePosted desc limit 0, 12");

$total = mysql_num_rows($results);
$count = 0;

while($row = mysql_fetch_array($results)) {
   if ($count % 4 == 0) {
?>
                                 <div class="pics_content">
<?php
   }
?>
                                    <div class="pics_details">
                                       <div class="pics_actual">
                                          <img src="thumbs.php?filename=<?php echo $row['Thumbnail']; ?>&width=140&height=78">
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
         <!-- top left end -->

         <!-- top right start -->
         <div style="float: left; width: 300px; margin-left: 10px">
            <div style="width: 300px; height: 250px; background: #ccc">Ad</div>

            <div style="height: 10px"></div>

            <div style="width: 300px; height: 100px; background: #ccc">Ad</div>

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
$results = mysql_query("select distinct Blogger, BlogTitle, BlogLink, BlogExcerpt from personalities order by DatePosted desc limit 0, 4");

while ($row = mysql_fetch_array($results)) {
?>
                           <tr>
                              <td style="width: 85px">
                                 <div style="width: 75px; height: 75px; background: #00f"></div>
                              </td>
                              <td>
                                 <div class="writer_title">
                                    <a href="<?php echo stripslashes($row['BlogLink']); ?>" target="_blank"><?php echo stripslashes($row['BlogTitle']); ?></a>
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
?>
                        </table>

                        <div class="more_link">
                           <a href="writers.php">More NBA.com Writers</a>
                        </div>
                     </div>
                     <!-- writers personalities end -->

                     <!-- writers bloggers start -->
                     <div id="writer_blogger_list" style="display: none">
                        <table>
<?php
$results = mysql_query("select * from blog order by DatePosted desc limit 0, 4");

while ($row = mysql_fetch_array($results)) {
?>
                           <tr>
                              <td style="width: 85px">
                                 <div style="width: 75px; height: 75px; background: #00f"></div>
                              </td>
                              <td>
                                 <div class="writer_title">
                                    <a href="<?php echo stripslashes($row['BlogLink']); ?>" target="_blank"><?php echo stripslashes($row['BlogTitle']); ?></a>
                                 </div>

                                 <div class="writer_content">
                                    <b><?php echo stripslashes(strtoupper($row['Blogger'])); ?></b>

                                    <div style="padding-top: 5px">
                                       Exerpt from entry.
                                    </div>
                                 </div>
                              </td>
                           </tr>
<?php
}
?>
                        </table>
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
      <!-- top half end -->

      <div style="height: 10px"></div>

      <div style="width: 958px; height: 90px; margin: 0 auto; text-align: center; background: #ccc">
         Google ads
      </div>

      <div style="height: 10px"></div>

      <!-- three columns start -->
      <div>
         <div style="width: 330px; float: left; margin-left: 10px">
            <div style="width: 330px; padding: 5px 0 2px 0; background: url('images/rounded_bottom_330.png') bottom center no-repeat">
               <div class="article_header" style="background: url('images/rounded_top_330.png'); width: 300px; height: 15px">
                  HEADLINES
               </div>

               <!-- Headlines content start -->
               <div class="cell_330">
                  <table style="width: 100%">
<?php
$results = mysql_query("select * from news order by DatePosted desc limit 0, 10");

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
                              echo "news_article.php?newsid=" . $row['NewsID'];
                           ?>"><?php echo stripslashes($row['Title']); ?></a>
                        </td>
                     </tr>
<?php
   $count += 1;
}
?>
                  </table>

                  <div class="more_link">
                     <a href="news.php">More Headlines</a>
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
$results = mysql_query("select * from events order by DatePosted desc limit 0, 1");
$row = mysql_fetch_array($results);
?>
                  <div style="width: 318px">
                     <img src="thumbs.php?filename=<?php echo $row['Image']; ?>&width=318&height=318">
                  </div>

                  <div style="padding: 5px 0; font-size: 14px">
                     <b><?php echo stripslashes($row['Title']); ?></b>
                  </div>

                  <?php echo substr(stripslashes($row['Description']), 0, 150); ?>

                  <div class="more_link">
                     <a href="events.php">More Events</a>
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
$results = mysql_query("select * from features order by RAND() limit 0, 10");

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
                     <a href="features.php">More Features</a>
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
                           <div class="scroll" id="gallery_pics" style="width: 282px; height: 282px">
                              <div class="pics">
<?php
$strip = array(" ", ",", "'", "\"", "!", "?");

$results = mysql_query("select * from gallery order by DateAdded desc limit 0, 1");
$gallery = mysql_fetch_array($results);

$results = mysql_query("select * from galleryphotos where GalleryID = '" . $gallery['GalleryID'] . "'");

$gallery_total = mysql_num_rows($results);
$count = 1;

while($row = mysql_fetch_array($results)) {
   $filename = "images/gallery/" . str_replace($strip, "", stripslashes(strtolower($gallery['GalleryName']))) . "/" . $row['Filename'];
?>
                                 <div class="gallery_content">
                                    <table cellspacing="0" cellpadding="0" style="width: 282px; height: 282px">
                                       <tr>
                                          <td style="text-align: center">
                                             <a class="boxlight" title="<?php echo stripslashes($row['Caption']); ?>" href="<?php echo $filename; ?>"><img src="thumbs.php?filename=<?php echo $filename; ?>&width=282&height=282"></a>
                                          </td>
                                       </tr>
                                    </table>
                                 </div>
<?php
   $count += 1;
}
?>
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
$results = mysql_query("select * from polls order by DatePosted desc limit 0, 1");
$poll = mysql_fetch_array($results);

$q = "select * from pollvote where PollID = '" . $poll['PollID'] . "' and UserID = '" . mysql_real_escape_string($_SESSION['userid']) . "'";
$latest = mysql_query($q);
$voted = mysql_num_rows($latest);

if ($voted == 0) {
?>
                  <form id="poll_form">
                     <input type="hidden" name="pollid" value="<?php echo $poll['PollID']?>">
                     <table cellspacing="0" style="width: 100%">
                        <tr>
<?php
   if ($poll['Image']) {
?>
                           <td rowspan="2" style="width: 105px">
                              <img src="thumbs.php?filename=<?php echo $poll['Image']; ?>&width=100&height=100">
                           </td>
<?php
   }
?>
                           <td>
                              <?php echo stripslashes($poll['Question']); ?>

                              <div style="padding: 5px 0">
<?php
   $results = mysql_query("select * from pollquestions where PollID = '" . $poll['PollID'] . "' order by PollID desc");

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
                              if ($_SESSION['userid'])
                                 echo "submit_poll()";
                              else
                                 echo "alert('Please log in to participate in the poll.')";
                              ?>">
                           </td>
                        </tr>
                     </table>
                  </form>
<?php
}
else {
?>
                     <table cellspacing="0" style="width: 100%">
                        <tr>
<?php
if ($poll['Image']) {
?>
                           <td rowspan="2" style="width: 105px">
                              <img src="thumbs.php?filename=<?php echo $poll['Image']; ?>&width=100&height=100">
                           </td>
<?php
}
?>
                           <td>
                              <?php echo stripslashes($poll['Question']); ?>

                              <div style="padding: 5px 0">
<?php
$results = mysql_query("select * from pollquestions where PollID = '" . $poll['PollID'] . "' order by RAND()");

$count = 0;

while($row = mysql_fetch_array($results)) {
?>
                                 <div class="poll_choice">
                                    <?php echo $row['Choice'] . " - " . $row['Answers']; ?>
                                 </div>
<?php
}
?>
                              </div>
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
                  if ($row['Photo'])
                     echo '<img src="thumbs.php?filename=' . $row['Photo'] . '&width=318&height=318">';

                  echo stripslashes($row['Content']);
                  ?>
               </div>
               <!-- Headlines content end -->
            </div>

            <div style="width: 330px; padding: 5px 0 2px 0; background: url('images/rounded_bottom_330.png') bottom center no-repeat">
               <div class="article_header" style="background: url('images/rounded_top_330.png'); width: 300px; height: 15px">
                  FOLLOW THE NBA
               </div>

               <!-- Headlines content start -->
               <div class="cell_330">
                  Entries.
               </div>
               <!-- Headlines content end -->
            </div>
         </div>

         <div style="width: 300px; float: left; margin-left: 10px">
            <div style="width: 300px; height: 300px; background: #ccc">
               Google ads
            </div>

            <div style="width: 300px; padding: 5px 0 2px 0; background: url('images/rounded_bottom_300.png') bottom center no-repeat">
               <div class="article_header" style="background: url('images/rounded_top_300.png'); width: 270px; height: 15px">
                  NBA TV
               </div>

               <!-- poll content start -->
               <div class="cell_300">
                  Entries.
               </div>
               <!-- poll content end -->
            </div>

            <div style="width: 300px; padding: 5px 0 2px 0; background: url('images/rounded_bottom_300.png') bottom center no-repeat">
               <div class="article_header" style="background: url('images/rounded_top_300.png'); width: 270px; height: 15px">
                  AROUND THE NBA
               </div>

               <!-- poll content start -->
               <div class="cell_300">
<?php
$results = mysql_query("select * from aroundnba order by DatePosted desc limit 0, 1");
$row = mysql_fetch_array($results);

echo stripslashes($row['Content']);
?>
               </div>
               <!-- poll content end -->
            </div>

            <div style="height: 5px"></div>

            <div style="width: 300px; height: 300px; background: #ccc">
               System ads
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
               <a href="#" class="blue">VOTE NOW!</a>
            </div>
         </div>

         <div style="width: 970px; border: 1px solid #d8d8d8; padding: 10px 5px; color: #444; font-size: 12px">
            <table cellspacing="0" style="width: 100%; text-align: center; font-weight: bold" id="starting">
               <tr>
<?php
$results = mysql_query("select * from startingfive order by Votes");

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
include('links.php');
?>

   </div>
</div>
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

var video_section = "video_list_highlights_gallery";

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
      $("#" + video_tab).css({backgroundPosition: "0 0", color: "#0054af"});
      $("#" + video_section).css({display: "none"});

      video_tab = $(this).prop("id");
      video_section = video_tab + "_gallery";
      
      $("#" + video_tab).css({backgroundPosition: "0 33px", color: "#444"});
      $("#" + video_section).css({display: "block"});
      $("#" + video_section).data("scrollable").begin();

      $("#video_circle_" + video_count).prop("src", "images/circle_empty.png");
      $("#video_circle_0").prop("src", "images/circle_filled.png");

      video_count = 0;
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

var gallery_count = 0;

$("#gallery_left").click(function() {
   $("#gallery_pics").data("scrollable").prev();

   gallery_count -= 1;
   if (gallery_count < 0)
      gallery_count = <?php echo ($gallery_total - 1); ?>;

   $("#gallery_count").html(gallery_count + 1);
});

$("#gallery_right").click(function() {
   $("#gallery_pics").data("scrollable").next();

   gallery_count += 1;
   if (gallery_count > <?php echo ($gallery_total - 1); ?>)
      gallery_count = 0;

   $("#gallery_count").html(gallery_count + 1);
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
      $("#carousel" + targ).slideDown("fast", function() {
         $("#carousel" + p_top).css({display: "none"});
      });
   }
}
<?php
include('nav_js.php');
?>
-->
</script>
</body>
</html>
<?php
mysql_close($connect);
?>