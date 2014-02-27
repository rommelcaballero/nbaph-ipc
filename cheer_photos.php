<?php
ob_start();

$part_page = "cheerdancers photos";

include('queries/cheer_photos-queries.php');
include('queries/cheer-general-queries.php');


if(file_exists($cachefile))
{ 
	$cache_this = 0;
	//echo "<!-- Cached Copy ".$last_db." -->\n";
	include($cachefile); 
	exit;
}
else
{
	$cache_this = 1; 	
//moved t seo.php
//$album_id = trim($_GET['album_id']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>NBA Philippines</title>

<base href="<?php echo $base; ?>">

<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="style-cheer.css">
<link rel="stylesheet" type="text/css" href="colorbox/colorbox.css">
<!--[if IE]>
<link rel="stylesheet" type="text/css" href="ie_style.css">
<![endif]-->
<!--[if IE 7]>
<link rel="stylesheet" type="text/css" href="ie7_style.css">
<![endif]-->
<style type="text/css">
<!--
.scroll {
position:relative;
overflow:hidden;
width: 600px;
height: auto !important;
min-height: 700px;
height: 700px;
}

/* root element for the scroll pics */
.scroll .pics {
width:20000em;
position:absolute;
}
-->
</style>
<script type="text/javascript" src="jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="jquery.tools.min.js"></script>
<script type="text/javascript" src="jquery.imgpreload.js"></script>
<script type="text/javascript" src="colorbox/jquery.colorbox.js"></script>
<script type="text/javascript" src="java.js"></script>
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

      <div style="width: 958px; height: 90px; margin: 0 auto; text-align: center; ">
         <?php
      echo $ads_list['nba_CheerPhotos_top_leaderboard']['Content'];
      ?>
      </div>

      <div style="height: 10px"></div>

      <div class="gray" style="font-size: 17px; width: 940px; margin: 0 auto; padding: 10px 0 0">
         <b>CHEERDANCER PHOTOS</b>
      </div>

      <div style="height: 20px"></div>

      <!-- top half start -->
      <div style="width: 958px; margin: 0 auto; ">
         <!-- left start -->
         <div style="float: left; width: 622px; ">

             <div style="width: 622px; background-image: url(images/cheer_photosbg.gif); background-repeat: repeat-x;  " ><img src="images/cheer_photos.gif"  border="0" /></div>

             <!-- cheer photos list -->
             <div id="CheerPhotosList" >
             <?php
          if($found_pho)
           {

              if($album_id > 0)
               {
          ?>
                 <!-- album id -->
                 <div >

                    <div >

            <div class="addthis_div" style="padding-bottom: 5px">
               <div class="addthis_position">
                  <!-- AddThis Button BEGIN -->
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
                  <!-- AddThis Button END -->
               </div>
            </div>

                       <div class="lfloat"  style="width: 483px; " >

                            <div class="CheerCaption" ><?php echo ucwords($disp['AlbumName'])." ".date("F j, Y", strtotime($disp['DateAdded'])); ?></div>

                        </div>

                        <div class="rfloat" id="CountPhoto" style="width: 114px; margin-right: 10px; text-align: right;  " >
                           <span id="ChangeCount" >1</span> of <?php echo $found_pho; ?>
                        </div>

                        <div class="clear_both" ></div>

                    </div>

                    <!-- buttons -->
                    <div style="padding: 15px 0px 0px 24px; text-align: left; " >

                        <div style="width: 570px;  " >

                            <div class="lfloat" ><input type="button" class="mybtn" value="prev" id="PrevPhoto"   /></div>
                            <div class="lfloat" style="margin-left: 12px; " ><input type="button" class="mybtn" value="next" id="NextPhoto"  /></div>
                            <div class="rfloat"  ><input type="button" class="mybtn" value="back to album list" id="BackAlbum" style="padding: 5px 5px 6px 5px; " /></div>
                            <div class="clear_both" ></div>

                        </div>

                    </div>
                    <!-- end buttons -->

                </div>

                <!-- Image info -->
                <div style="padding: 20px 5px 0px 5px; " >

                    <!-- scroll -->
                   <div class="scroll" id="gallery_pics" style="width: 600px;  ">

                        <div class="pics" >

                            <!-- Image 1 -->
                            <div id="PhotoHolder1" class="photo_holder" style="display: block; " photo="1" >
                               <?php
                           $img_arr = array();
                           $image = $disp['Filename'];
                           $img_arr[] = $image;
                        ?>
                                <div class="CheerImage image1" ><img src="<?php
                                echo $image;
                                ?>" alt="<?php echo ucwords(stripslashes($disp['Caption'])); ?>" title="<?php echo ucwords(stripslashes($disp['Caption'])); ?>" ></div>
                                <div class="CheerCaption" ><?php echo $disp['Caption']; ?></div>
                                <div class="CheerCredits" ><?php  echo $disp['Credits']; ?></div>

                            </div>
                            <!-- end Image 1 -->

                    <?php
                             $ctr = 2;
                             for ($count = 1; $count <= count($gallery_array); $count += 1)
                              {

                                 $albumid = $gallery_array[$count]['AlbumID'];
                                 $photoid = $gallery_array[$count]['PhotoID'];
                                 $caption = $gallery_array[$count]['Caption'];

                                 $image = $gallery_array[$count]['Filename'];
                                 $img_arr[] = $image;

                                 $credits = $gallery_array[$count]['Credits'];
                                 $albumname = $gallery_array[$count]['AlbumName'];
                                 $date = date("F j, Y", strtotime($gallery_array[$count]['DateAdded']));

                    ?>
                            <!-- Image <?php echo $ctr; ?> -->
                            <div id="PhotoHolder<?php echo $ctr; ?>" class="photo_holder" photo="<?php echo $ctr; ?>">

                                <div class="CheerImage image<?php echo $ctr; ?>"></div>
                                <div class="CheerCaption" ><?php echo $caption; ?></div>
                                <div class="CheerCredits" ><?php  echo $credits; ?></div>

                            </div>
                            <!-- end Image <?php echo $ctr; ?> -->
                    <?php
                                $ctr++;
                              }//end while
                    ?>

                        </div>

                    </div>
                    <!-- end scroll -->

                    <div class="clear_left" ></div>

            <div class="addthis_div">
               <div class="addthis_position">
                  <!-- AddThis Button BEGIN -->
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
                  <!-- AddThis Button END -->
               </div>
            </div>
                        <div class="fb-comments" data-href="<?php echo $base; ?>cheerdancers-photos/<?php echo $album_id; ?>/<?php  echo seoUrl($disp['AlbumName']); ?>/<?php echo trim(urlencode($blog_postedby)); ?>" data-num-posts="2" data-width="612"></div>
               </div>
               <!-- Image info -->

               <!-- end album id -->

             <?php
               }//end if $album_id
              else
               {

                  for ($count = 0; $count < count($gallery_array); $count += 1) {

                  $album_idl = $gallery_array[$count]['AlbumID'];
                  $album_name = stripslashes(str_replace("\n", "<br>", trim($gallery_array[$count]['AlbumName'])));
                  $album_date = date("F d, Y", strtotime($gallery_array[$count]['DateAdded']));

                     $album_img = trim($gallery_array[$count]['ImageSecond']);
          ?>
                 <div class="lfloat" style="width: 300px; margin-bottom: 20px; <?php if ($count % 2 == 0) { echo "margin-right: 11px; "; }?>" >

                    <div><a href="cheerdancers-photos/<?php echo $album_idl; ?>/<?php echo seoUrl($album_name); ?>" ><img src="<?php
                     echo $album_img;
                  ?>" width="300" height="215" alt="<?php echo $album_name; ?>" title="<?php echo $album_name; ?>" ></a></div>

                    <div >
                       <span class="cheervid_title"><a href="cheerdancers-photos/<?php echo $album_idl; ?>/<?php echo seoUrl($album_name); ?>" ><?php echo ucwords(trim($album_name)); ?></a></span>
                       <span class="cheervid_time" style="font-size: 9pt; font-weight: bold; " ><?php echo "&nbsp;&nbsp;".$album_date; ?></span>
                    </div>

                 </div>

             <?php
                }//end while

                echo "<div class='clear_both' ></div>";

              }//end else

           }//end if $found_pho
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
      <div>    
      <?php
      $footer_ads = $ads_list['nba_CheerPhotos_bottom_leaderboard']['Content'];
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

var gallery_count = 0;
var gallery_array = new Array(<?php
for ($i = 0; $i < count($img_arr); $i += 1) {
   if ($i > 0)
      echo ",";
   echo "'" . $img_arr[$i] . "'";
}?>);

$(".scroll").scrollable({ circular: true });

 $(function() {

   $("#PrevPhoto").click(function() {
      $("#gallery_pics").data("scrollable").prev();

      gallery_count -= 1;
      if (gallery_count < 0)
        gallery_count = <?php echo ($found_pho - 1); ?>;

      $("[class$=image" + (gallery_count + 1) + "]").html('<img src="' + gallery_array[gallery_count] + '" alt="">');
      $("#ChangeCount").html(gallery_count + 1);
   });

   $("#NextPhoto").click(function() {

      $("#gallery_pics").data("scrollable").next();

      gallery_count += 1;
      if (gallery_count > <?php echo ($found_pho - 1); ?>)
        gallery_count = 0;

      $("[class$=image" + (gallery_count + 1) + "]").html('<img src="' + gallery_array[gallery_count] + '" alt="">');
      $("#ChangeCount").html(gallery_count + 1);
   });

   $("#BackAlbum").click(function() {

      window.location = "<?php echo $base."cheerdancers-photos"; ?>";
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
