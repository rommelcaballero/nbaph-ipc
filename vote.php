<?php
$part_page = "vote";

include('queries/vote-queries.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>NBA Philippines</title>

<link rel="stylesheet" href="https://s3-ap-southeast-1.amazonaws.com/nbaphfiles/sib2/style2.css">
<?php include('static_nav2.php');?>
<link rel="stylesheet" type="text/css" href="/style.css">
<link rel="stylesheet" type="text/css" href="/style-vote.css">
<link rel="stylesheet" type="text/css" href="/colorbox/colorbox.css">
<!--[if IE]>
<link rel="stylesheet" type="text/css" href="/ie_style.css">
<![endif]-->
<!--[if IE 7]>
<link rel="stylesheet" type="text/css" href="/ie7_style.css">
<![endif]-->
<!--<script type="text/javascript" src="/jquery-1.7.1.min.js"></script>-->
<script src="http://code.jquery.com/jquery-migrate-1.0.0.js"></script>
<script type="text/javascript" src="/jquery.tools.min.js"></script>
<script type="text/javascript" src="/jquery.imgpreload.js"></script>
<script type="text/javascript" src="/colorbox/jquery.colorbox.js"></script>
<script type="text/javascript" src="/java.js"></script>
<script>

//option
$(document).ready(function() {
   $("input:radio").click(function(){
      var playerid=$(this).val();
      var imgsrc=$("#imgsrc_"+playerid).val();
      var imgid=$("#imgid_"+playerid).val();

      //alert(playerid+" --- "+ imgsrc +" --- "+imgid);
      $("#"+imgid).hide(300).html('<img src="'+imgsrc+'">').fadeIn('slow');

      $("#vote_info_" + imgid).html('<img src="/images/loader.gif" width="190" height="190">');
      $.ajax({
      url: "vote_info_content.php?id="+playerid,
      cache: false,
      success: function(vInfo){
         //alert(imgid);
      $('#vote_info_'+imgid).hide().html(vInfo).fadeIn('slow');

      },
   });
   });

   $("#vote_reset").click(function(){
      $("#c").html('<img src="/images/default_vote.png">');
      $("#pg").html('<img src="/images/default_vote.png">');
      $("#pf").html('<img src="/images/default_vote.png">');
      $("#sf").html('<img src="/images/default_vote.png">');
      $("#sg").html('<img src="/images/default_vote.png">');

   });

   $("#vote_sub").click(function(){
      var c=$.trim($("input:[name=option_c]:checked").val());
      var pf=$.trim($("input:[name=option_pf]:checked").val());
      var sf=$.trim($("input:[name=option_sf]:checked").val())
      var sg=$.trim($("input:[name=option_sg]:checked").val());
      var pg=$.trim($("input:[name=option_pg]:checked").val());

      //alert(c+" -- "+ pf +" -- "+sf+" -- "+sg+" -- "+pg);
      if(c=="" || pg=="" || pf=="" || sg=="" || pg==""){
         alert("Please choose a player from each category");
         return false;
      }else{
      alert("Thank you for voting!");
      return true;
      }
   });
});
</script>
</head>

<body>
<?php
include('layouts/popups.php');
?>

<div id="wrapper">
		<?php include('static_nav.php');?>
		<?php include('nbaph_header.php');?>

<?php
//include('layouts/header.php');
?>

   <!-- main_content -->
   <div id="main_content" >

           <div style="height: 10px"></div>

          <div style="width: 980px; min-height: 90px; margin: 0 auto; text-align: center;">
        <!-- ADS 728 x 90 | 210x90 -->
          <?php
         echo $ads_list['nba_Vote_top_leaderboard']['Content'];
         ?>
          </div>

          <div style="height: 10px"></div>

        <div style="height: 10px"></div>

          <!-- top half container start -->
          <div class="container"  >
         <form action="vote.php" id="sfive_form" name="sfive_form" method="post" enctype="multipart/form-data">

             <!-- top left start  -->
             <div style="float: left; width: 672px; margin-left: 10px; ">

            <span style="color:#0e4b8d; font-size: 26px; font-weight: bold;">Who's Your Starting 5?</span>
            <!-- Vote block start CENTER-->
                <div style="width: 672px; height: 240px; margin: 30px 0px; overflow: hidden;">
               <div style="width: 270px; height: 240px; float: left; overflow: hidden;" id="c">
                  <img src="/images/default_vote.png">
               </div>
               <div style="width: 395px; height: 240px; float: right;font-weight: bold; font-size: 16px; color:#666; padding-left: 5px;">
                  POSITION: <span style="color: #2b75c2; font-weight: bold; font-size: 16px;">CENTER</span>
                  <div style="margin-top: 15px;"></div>
                  <!-- VOTE OPTIONS -->
                  <div style="width: 395px; height: 210px;">
                     <div style="width: 195px; height: 210px; float: left;">
                        <?php
                           for ($count = 0; $count < 5; $count += 1){
                              echo "<span class=\"option\">";
			      if($starting_array['Center'][$count]['StartingfiveID']){
                              echo "<input type=\"radio\" name=\"option_c\" id=\"option_c\" value=\"".$starting_array['Center'][$count]['StartingfiveID']."\"> ".$starting_array['Center'][$count]['PlayerName']."";
			      }
                              echo "<input type=\"hidden\" id=\"imgsrc_".$starting_array['Center'][$count]['StartingfiveID']."\" value=\"".$starting_array['Center'][$count]['Filename']."\">";
                              echo "<input type=\"hidden\" id=\"imgid_".$starting_array['Center'][$count]['StartingfiveID']."\" value=\"c\">";
                              echo "</span><br>";
                           }
                        ?>
                     </div>
                     <div class="vote_info_box" id="vote_info_c">

                     </div>
                  </div>
                  <!-- END VOTE OPTIONS -->
               </div>

                </div>
            <!-- Vote block end CENTER-->

            <!-- Vote block start POWER FORWARD-->
                <div style="width: 672px; height: 240px; margin: 10px 0px; overflow: hidden;">
               <div style="width: 270px; height: 240px; float: left; overflow: hidden;" id="pf">
                  <img src="/images/default_vote.png">
               </div>
               <div style="width: 395px; height: 240px; float: right;font-weight: bold; font-size: 16px; color:#666; padding-left: 5px;">
                  POSITION: <span style="color: #2b75c2; font-weight: bold; font-size: 16px;">POWER FORWARD</span>
                  <div style="margin-top: 15px;"></div>
                  <!-- VOTE OPTIONS -->
                  <div style="width: 395px; height: 210px;">
                     <div style="width: 195px; height: 210px; float: left;">
                        <?php
                           for ($count = 0; $count < 5; $count += 1){
                              echo "<span class=\"option\">";
                              echo "<input type=\"radio\" name=\"option_pf\" id=\"option_pf\" value=\"".$starting_array['Power Forward'][$count]['StartingfiveID']."\"> ".$starting_array['Power Forward'][$count]['PlayerName']."";
                              echo "<input type=\"hidden\" id=\"imgsrc_".$starting_array['Power Forward'][$count]['StartingfiveID']."\" value=\"".$starting_array['Power Forward'][$count]['Filename']."\">";
                              echo "<input type=\"hidden\" id=\"imgid_".$starting_array['Power Forward'][$count]['StartingfiveID']."\" value=\"pf\">";
                              echo "</span><br>";
                           }
                        ?>
                     </div>
                     <div class="vote_info_box" id="vote_info_pf">
                     </div>
                  </div>
                  <!-- END VOTE OPTIONS -->
               </div>

                </div>
            <!-- Vote block end POWER FORWARD-->

            <!-- Vote block start SMALL FORWARD-->
                <div style="width: 672px; height: 240px; margin: 10px 0px; overflow: hidden;">
               <div style="width: 270px; height: 240px; float: left; overflow: hidden;" id="sf">
                  <img src="/images/default_vote.png">
               </div>
               <div style="width: 395px; height: 240px; float: right;font-weight: bold; font-size: 16px; color:#666; padding-left: 5px;">
                  POSITION: <span style="color: #2b75c2; font-weight: bold; font-size: 16px;">SMALL FORWARD</span>
                  <div style="margin-top: 15px;"></div>
                  <!-- VOTE OPTIONS -->
                  <div style="width: 395px; height: 210px;">
                     <div style="width: 195px; height: 210px; float: left;">
                        <?php
                           for ($count = 0; $count < 5; $count += 1){
                              echo "<span class=\"option\">";
                              echo "<input type=\"radio\" name=\"option_sf\" id=\"option_sf\" value=\"".$starting_array['Small Forward'][$count]['StartingfiveID']."\"> ".$starting_array['Small Forward'][$count]['PlayerName']."";
                              echo "<input type=\"hidden\" id=\"imgsrc_".$starting_array['Small Forward'][$count]['StartingfiveID']."\" value=\"".$starting_array['Small Forward'][$count]['Filename']."\">";
                              echo "<input type=\"hidden\" id=\"imgid_".$starting_array['Small Forward'][$count]['StartingfiveID']."\" value=\"sf\">";
                              echo "</span><br>";
                           }
                        ?>
                     </div>
                     <div class="vote_info_box" id="vote_info_sf">
                     </div>
                  </div>
                  <!-- END VOTE OPTIONS -->
               </div>

                </div>
            <!-- Vote block end SMALL FORWARD-->

            <!-- Vote block start SHOOTING GUARD-->
                <div style="width: 672px; height: 240px; margin: 10px 0px; overflow: hidden;">
               <div style="width: 270px; height: 240px; float: left; overflow: hidden;" id="sg">
                  <img src="/images/default_vote.png">
               </div>
               <div style="width: 395px; height: 240px; float: right;font-weight: bold; font-size: 16px; color:#666; padding-left: 5px;">
                  POSITION: <span style="color: #2b75c2; font-weight: bold; font-size: 16px;"> SHOOTING GUARD</span>
                  <div style="margin-top: 15px;"></div>
                  <!-- VOTE OPTIONS -->
                  <div style="width: 395px; height: 210px;">
                     <div style="width: 195px; height: 210px; float: left;">
                        <?php
                           for ($count = 0; $count < 5; $count += 1){
                              echo "<span class=\"option\">";
                              echo "<input type=\"radio\" name=\"option_sg\" id=\"option_sg\" value=\"".$starting_array['Shooting Guard'][$count]['StartingfiveID']."\"> ".$starting_array['Shooting Guard'][$count]['PlayerName']."";
                              echo "<input type=\"hidden\" id=\"imgsrc_".$starting_array['Shooting Guard'][$count]['StartingfiveID']."\" value=\"".$starting_array['Shooting Guard'][$count]['Filename']."\">";
                              echo "<input type=\"hidden\" id=\"imgid_".$starting_array['Shooting Guard'][$count]['StartingfiveID']."\" value=\"sg\">";
                              echo "</span><br>";
                           }
                        ?>
                     </div>
                     <div class="vote_info_box" id="vote_info_sg">
                     </div>
                  </div>
                  <!-- END VOTE OPTIONS -->
               </div>

                </div>
            <!-- Vote block end SHOOTING GUARD-->

            <!-- Vote block start POINT GUARD-->
                <div style="width: 672px; height: 240px; margin: 10px 0px; overflow: hidden;">
               <div style="width: 270px; height: 240px; float: left; overflow: hidden;"  id="pg">
                  <img src="/images/default_vote.png">
               </div>
               <div style="width: 395px; height: 240px; float: right;font-weight: bold; font-size: 16px; color:#666; padding-left: 5px;">
                  POSITION: <span style="color: #2b75c2; font-weight: bold; font-size: 16px;"> POINT GUARD</span>
                  <div style="margin-top: 15px;"></div>
                  <!-- VOTE OPTIONS -->
                  <div style="width: 395px; height: 210px;">
                     <div style="width: 195px; height: 210px; float: left;">
                        <?php
                           for ($count = 0; $count < 5; $count += 1){
                              echo "<span class=\"option\">";
                              echo "<input type=\"radio\" name=\"option_pg\" id=\"option_pg\" value=\"".$starting_array['Point Guard'][$count]['StartingfiveID']."\"> ".$starting_array['Point Guard'][$count]['PlayerName']."";
                              echo "<input type=\"hidden\" id=\"imgsrc_".$starting_array['Point Guard'][$count]['StartingfiveID']."\" value=\"".$starting_array['Point Guard'][$count]['Filename']."\">";
                              echo "<input type=\"hidden\" id=\"imgid_".$starting_array['Point Guard'][$count]['StartingfiveID']."\" value=\"pg\">";
                              echo "</span><br>";
                           }
                        ?>
                     </div>
                     <div class="vote_info_box" id="vote_info_pg">
                     </div>
                  </div>
                  <!-- END VOTE OPTIONS -->
               </div>

                </div>
            <!-- Vote block end POINT GUARD-->

            <div style="width: 672px;height: 50px; margin-top: 40px;text-align: center; padding-top: 15px;">
            <?php
            if(!isset($_SESSION['voteStatus']) && !isset($_POST['vote_sub'])){
            ?>

               <input class="vote_btns" type="reset" name="vote_reset" value="" id="vote_reset" style="border: 0px; background: url('/images/reset_new.png'); width: 140px; height: 30px;">
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               <input class="vote_btns" type="submit" name="vote_sub" id="vote_sub" value="" style="border: 0px; background: url('/images/vote_new.png'); width: 140px; height: 30px;">
            <?php
            }else{
            if($success==''){

            ?>
            <h1 style="text-align: center; color: #F00;">You have already voted!<br> View the results!<br>
               <a href="/startingfive.php" style="text-decoration: none;"><span style="text-align: center; font-size: 18px; color: #2b75c2; margin: 0px; padding: 0px;">Click Here</span></a></h1>
            <?php
            }else{
            ?>
            <h1 style="text-align: center; color: #F00;"><?php echo $success;?><br> View the results!<br>
               <a href="/startingfive.php" style="text-decoration: none;"><span style="text-align: center; font-size: 18px; color: #2b75c2; margin: 0px; padding: 0px;">Click Here</span></a></h1>

            <?php
            }
            }
            ?>
            </div>
            </form>
             </div>

             <!-- top left end  -->


             <!-- top right start -->
             <div style="float: left; width: 300px; margin-left: 10px; margin-top: 35px;">
             <!-- ADS 300x250 -->
          <?php
            for ($count = 0; $count < 3; $count += 1){
          ?>
                <div style="width: 300px; height: 250px;">
               <?php echo $ads_array[$count]['Content'];?>
            </div>
            <div style="height: 10px"></div>
         <?php
         }
         ?>

                <!-- writers start -->
                <div style="width: 300px; padding: 5px 0 2px 0; background: url('/images/rounded_bottom_300.png') bottom center no-repeat">
                   <div class="article_header" style="background: url('/images/rounded_top_300.png'); width: 270px; height: 15px">
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
    for ($count = 0; $count < count($write_array); $count += 1) {
      $blogger_pic = str_replace("+","",strtolower(urlencode($write_array[$count]['Blogger'])));
      
    ?>
                               <tr>
                                  <td style="width: 55px; vertical-align: top; padding-top: 10px; " >
                                     <div style="width: 45px; height: 75px;"><img src="/images/personalities/<?php echo $blogger_pic; ?>.jpg" border="0"></div>
                                  </td>
                                  <td style="vertical-align: top;  padding-top: 10px;  " >
                                     <div class="writer_title">
                                        <?php
         if ($write_array[$count]['BlogLink']) {
?>
                                        <a href="<?php echo stripslashes($write_array[$count]['BlogLink']); ?>" target="_blank"><?php echo stripslashes($write_array[$count]['BlogTitle']); ?></a>
<?php } else { ?>
               <a href="/writers-content/<?php echo $write_array[$count]['BlogID']; ?>/<?php echo seoUrl(stripslashes($write_array[$count]['BlogTitle'])); ?>"><?php echo stripslashes($write_array[$count]['BlogTitle']); ?></a>
<?php }  ?>
                                     </div>

                                     <div class="writer_content">
                                        <b><?php echo stripslashes(strtoupper($write_array[$count]['Blogger'])); ?></b>

                                        <div style="padding-top: 5px">
                                           <?php echo stripslashes($write_array[$count]['BlogExcerpt']); ?>
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
    for ($count = 0; $count < count($write_array); $count += 1) {
      $blogger_pic = str_replace("+","",strtolower(urlencode($blog_array[$count]['Blogger'])));
    ?>
                               <tr>
                                  <td style="width: 55px; vertical-align: top; padding-top: 10px; " >
                                     <div style="width: 45px; height: 75px;"><img src="/images/blogs/<?php echo $blogger_pic; ?>.jpg" border="0"></div>
                                  </td>
                                  <td>
                                     <div class="writer_title">
<?php
         if ($blog_array[$count]['BlogLink']) {
?>
                                        <a href="<?php echo stripslashes($blog_array[$count]['BlogLink']); ?>" target="_blank"><?php echo stripslashes($blog_array[$count]['BlogTitle']); ?></a>
<?php } else { ?>
               <a href="/bloggers/<?php echo $blog_array[$count]['BlogID']; ?>/<?php echo seoUrl(stripslashes($blog_array[$count]['BlogTitle'])); ?>"><?php echo stripslashes($blog_array[$count]['BlogTitle']); ?></a>
<?php }  ?>
                                     </div>

                                     <div class="writer_content">
                                        <b><?php echo stripslashes(strtoupper($blog_array[$count]['Blogger'])); ?></b>

                                        <div style="padding-top: 5px">
                                           <?php echo stripslashes($blog_array[$count]['BlogExcerpt']); ?>
                                        </div>
                                     </div>
                                  </td>
                               </tr>
    <?php
    }
    ?>
                            </table>
            <div class="more_link">
                               <a href="blogs.php">More Bloggers</a>
                            </div>
                         </div>
                         <!-- writers bloggers end -->
                      </div>
                      <!-- writers lists end -->
                   </div>
                   <!-- writers content end -->
                </div>
                <!-- writers end -->
            <div style="width: 300px; padding: 5px 0 2px 0; background: url('/images/rounded_bottom_330.png') bottom center no-repeat">
                   <div class="article_header" style="background: url('/images/rounded_top_300.png') no-repeat; width: 300px; height: 15px;">
                      PHOTO GALLERY
                   </div>

                   <!-- Headlines content start -->
                   <div class="cell_300">
                      <table cellspacing="0" cellpadding="0">
                         <tr>
                            <td style="width: 13px">
                               <img src="/images/left_btn_small.png" id="gallery_left" class="pointer">
                            </td>
                            <td style="width: 255px; padding: 0 5px">
                               <div class="scroll" id="gallery_pics" style="width: 255px; height: 255px; ">

                                  <div class="pics">
                                 <?php
                                 $strip = array(" ", ",", "'", "\"", "!", "?");

                                 for ($count = 0; $count < $gallery_total; $count += 1) {
                                    $filename = $gallery_array[$count]['Filename'];
                                 ?>
                                     <div class="gallery_content">
                                        <table cellspacing="0" cellpadding="0" style="width: 255px; height: 255px">
                                           <tr>
                                              <td style="text-align: center">
                                                 <a  title="<?php echo stripslashes($gallery_array[$count]['Caption']); ?>" href="/photos.php?gallery_id=<?php echo $gallery_array[$count]['GalleryID']; ?>"><img src="<?php echo $filename; ?>"></a>
                                              </td>
                                           </tr>
                                        </table>
                                     </div>
                                 <?php
                                 }
                                 ?>
                                  </div>
                               </div>
                            </td>
                            <td style="width: 13px; text-align: right">
                               <img src="/images/right_btn_small.png" id="gallery_right" class="pointer">
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
             <!-- top right end -->

             <div class="clear"></div>

          </div>
          <!-- top half container end -->


          <div style="height: 10px"></div>

          <div style="width: 980px; height: 90px; margin: 0 auto; text-align: center;">
        <!-- ADS 728 x 90 | 210x90 -->
          <?php
         echo $ads_list['nba_Vote_bottom_leaderboard']['Content'];
         ?>
          </div>
          <div style="height: 10px"></div>


          <!-- three columns start -->
 </div>
 <!-- end main_content -->

</div>

   <?php
       include('layouts/footer.php');
    ?>
<script type="text/javascript">
<!--
$(".scroll").scrollable({ circular: true });

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

//for(var votesctr=1;votesctr<=5;votesctr++)
//showVotes(votesctr);

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
