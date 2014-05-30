<style>
     .cheer-container{
          width: 958px; margin: 0 auto; padding:10px;
     }
     .cheer-section1{
          float:left;          
     }
     .cheer-blog-preview{
          height:400px;
     }
     .cheer-blog-preview span{
          display: block;

     }
     .cheer-blog-carousel{
          margin: 0 auto;
          text-align: center;
     }
     span.preview-description{
          position: relative;
          padding:10px;
          background: url("/images/topstory_overlay.png") no-repeat scroll 0 0 transparent;     
          width: 652px;
          height: 62px;
          margin: 10px;
          top: -105px;
     }
     span.preview-intro, span.preview-title{
          display: block;
          color:#fff;
          width: 632px;
     }
     span.preview-title{
          font-size:20px;
     }
     span.preview-intro{
          font-size:12px;          
     }
     span.preview-img a{
          margin: 0;
          padding:0;
          border: none;
          text-decoration: none;
     }
     .width675{width: 675px;}
     .clear{clear:both;}
     .carousel-left, .carousel-center, .carousel-right{
          float:left;          
          height: 110px;
     }
     .carousel-left, .carousel-right{
          width: 20px;
          cursor: pointer;          
     }
     .carousel-left{
          background: url(media/2.0/carousel-left.png) no-repeat;
          margin-right: 5px;
     }
     .carousel-right{
          background: url(media/2.0/carousel-right.png) no-repeat;
          margin-left: 5px;
     }
     .carousel-center{overflow: hidden; width: 620px; height: 110px;}
     .carousel-center ul{list-style-type: none; width: 2000px; padding:0; margin: 0;}
     .carousel-center ul li {display: inline; width: 130px;}
     .carousel-item-container{height: 100px;}
     .carousel-item{float: left; margin: 0 12px;}
     .carousel-item .item-img, .carousel-item .item-title{
          display: block;
     }
     .carousel-item .item-img{
          cursor: pointer;
     }
     .carousel-item .item-title{
          font-size: 11px;
          color:#fff;
          text-align: center;
     }

     div.photos-container{margin-left: 15px;}
     div.photos-title{
          background: #8EC63F;
          width: 256px;
          color:#fff;
          font-size:20;
          font-weight: bold;
          padding:6px 5px;
          border-right: 1px solid #d8d8d8;
          border-left: 1px solid #d8d8d8;
          border-top: 1px solid #d8d8d8;     
     }

     div.photos-item{
          width: 150px;
          border-right: 1px solid #d8d8d8;
          border-left: 1px solid #d8d8d8;
          min-height: 450px;
          background: url(/media/2.0/green_background_10x470.png) repeat transparent;
          padding:10px 58px;
     }
     div.photos-footer{
          height: 3px;
          background: #8EC63F;
          border-right: 1px solid #d8d8d8;
          border-left: 1px solid #d8d8d8;
          border-bottom: 1px solid #d8d8d8;     
     }
     div.photos_subheadline{          
          width: 150px;
          height: 100px;
          margin-bottom: 10px;          
     }
     .photo_subheadline_text{
          color: #000;
          display: none;
          height: 100px;
          left: 0;
          overflow: hidden;
          position: absolute;
          text-align: center;
          top: 0;
          width: 149px;
          background: #ffffff;
          opacity:0.6;
          filter:alpha(opacity=60);
     }

     div.photos_subheadline:hover .photo_subheadline_text{display: block;}
     .cheervid_caption{color: #787878 !important;}
</style>     
<div class='cheer-container'>
     <div class='cheer-section1 width675'>
          <div class='cheer-blog-preview' id='cheer-blog-preview'>
               <span class='preview-img'>
                    <a href="cheerdancers-columns/<?php echo $column_array[0]['ColumnID']; ?>/<?php echo seoUrl($column_array[0]['Title']); ?>">
                    <img src="<?php echo $column_array[0]['PhotoThumb']; ?>" />
                    </a>
               </span>
               <span class='preview-description'>
                    <span class='preview-title'>
                    <?php echo $column_array[0]['Title']; ?>
                    </span>
                    <span class='preview-intro'>
                    <?php echo $column_array[0]['Intro']; ?>
                    </span>
               </span>
          </div>
          <div class='cheer-blog-carousel'>
               <div class='carousel-left' id="nav-prev"></div>
               <div class='carousel-center' id="carousel">                    
                    <ul>
                    <?php for($a=0; $a<count($column_array); $a++): ?>
                    <li class='carousel-item'>
                         <div class='item-img' id='item-img'>
                              <img src="<?php
                              echo pauResizePic($column_array[$a]['PhotoThumb'], 130, 70);
                              ?>"/>
                              <input type='hidden' id='title' value="<?php echo $column_array[$a]['Title']; ?>" />
                              <input type='hidden' id='intro' value="<?php echo $column_array[$a]['Intro']; ?>" />
                              <input type='hidden' id='img-link' value="<?php echo $column_array[$a]['PhotoThumb']; ?>" />
                              <input type='hidden' id='url-link' value="cheerdancers-columns/<?php echo $column_array[$a]['ColumnID']; ?>/<?php echo seoUrl($column_array[$a]['Title']); ?>" />
                         </div>
                         <div class='item-title'>
                              <?php echo $column_array[$a]['Title']; ?>
                         </div>
                    </li>
                    <?php endfor; ?>                  
                    </ul>
               </div>
               <div class='carousel-right' id="nav-next"></div>
               <div class='clear'></div>
          </div>
     </div>
     <div class='cheer-section1'>
          <div class='photos-container'>
               <div class='photos-title'>CHEERDANCERS PHOTO</div>
               <div class='photos-item'>
                    <?php
                    for($i=0; $i<count($photos); $i++) {
                    $imgbg = $photos[$i]['ImageThumb'];
                    ?>
                         <div style="background-image: url('<?php echo $imgbg; ?>')" class="photos_subheadline" id="subheadline<?php echo $i; ?>" style="margin: 0px;" main="<?php echo $i; ?>" >
                              <div class="photo_subheadline_text" id="cheer_subheadline<?php echo $i; ?>" >
                                   <table cellspacing="0"   height="100%" width="100%" >
                                        <tr>
                                             <td>
                                                   <div>
                                                       <?php echo $photos[$i]['AlbumName']; ?>
                                                  </div>
                                             </td>
                                        </tr>
                                   </table>
                              </div>
                         </div>                         
                    <?php } ?>
               </div>
               <div class='photos-footer'>
                    <div style="position: relative;
                    text-align: center;
                    top: -20px;" >
                    <a style="color: #0054AF;
                         font-size: 13px;
                         font-weight: bold;" href="cheerdancers-photos" >More Photos</a></div>
               </div>
          </div>

     </div>
     <div class="clear"></div>
</div> 
<script>
     $(document).ready(function(){
          var speed = 600;
          var carousel_block = 616;
          var carousel_width = <?php echo count($column_array); ?> * 154;          
          var carousel_position = 0;
          $(".carousel-center ul").css({width:carousel_width+"px"});
          $("#nav-next").click(function(){
               if((Number(carousel_position)+Number(carousel_block)+1) <= Number(carousel_width)){
                    carousel_position += carousel_block;
                    $("#carousel ul").animate({marginLeft:'-'+carousel_position+'px'},speed);                                        
               }
          });
          $("#nav-prev").click(function(){
               if(Number(carousel_position) > 0){
                    carousel_position -= carousel_block;
                    $("#carousel ul").animate({marginLeft:'-'+carousel_position+'px'},speed);                    
               }  
          });
          $("div.item-img").bind("click",function(){
               var img_link = $(this).find("input[id=img-link]").val();
               var intro = $(this).find("input[id=intro]").val();               
               var title = $(this).find("input[id=title]").val();               
               var url_link = $(this).find("input[id=url-link]").val();               
               $("#cheer-blog-preview").find("span.preview-img").find("a").find("img").attr({"src":img_link});
               $("#cheer-blog-preview").find("span.preview-description").find("span.preview-title").html(title);
               $("#cheer-blog-preview").find("span.preview-description").find("span.preview-intro").html(intro);
               $("#cheer-blog-preview").find("span.preview-img").find("a").attr({"href":url_link});
          }); 
     });
</script>   
<!-- ===============================old================================= --> 
<div style="width: 958px; margin: 0 auto">     
     <div style="width: 655px; float:left">
          <div style="float: left; width: 305px">
               <div class="cheer_subsection" style='background:#fff url(/media/2.0/blue_background_10x440.png) repeat-x; background-position:bottom; border:none'>

                    <div class="cheer_subsection_header"><img src="images/cheer_videos.png"></div>

                    <!-- column videos -->
                    <div style="margin: 0px; padding: 5px 5px 0px 5px; " >

                         <?php
                         if($found_video > 0){
                              $ctr = 1;
                              for ($count = 0; $count < count($video_array); $count += 1){
                                   $video_id = $video_array[$count]['VideoID'];
                                   $video_title = trim($video_array[$count]['Title']);
                                   $video_caption = trim($video_array[$count]['Caption']);
                                   $video_youtube = trim($video_array[$count]['YouTubeLink']);
                                   $video_thumb = trim($video_array[$count]['ImageThumb']);
                                   $video_caption = myTruncate($video_caption, 150, " ", "...");
                                   if ($video_youtube){
                                        $feedURL = 'http://gdata.youtube.com/feeds/api/videos/'. $video_youtube;
                                        // read feed into SimpleXML object
                                        $entry = simplexml_load_file($feedURL);
                                        $vid = parseVideoEntry($entry);
                                        $video_duration = mysql_real_escape_string(stripslashes($vid->length));
                                        $dur_min = intval($video_duration / 60);
                                        $dur_sec = $video_duration % 60;
                                        if($dur_min < 10){
                                             $dur_min = '0'.$dur_min;
                                        }
                                        if($dur_sec < 10){
                                             $dur_sec = '0'.$dur_sec;
                                        }
                                        $video_length = $dur_min.":".$dur_sec;

                                   }
                                   ?>                        
                                   <div class="cheervid_item" >
                                        <div class="cheervid_title" ><a href="cheerdancers-videos/<?php echo $video_id; ?>/<?php echo seoUrl($video_title); ?>" ><?php echo strtoupper($video_title); ?></a></div>
                                        <div class="lfloat" ><a href="cheerdancers-videos/<?php echo $video_id; ?>/<?php echo $video_id; ?>" >
                                             <img src="<?php
                                             if ($video_thumb) echo $video_thumb;
                                             else echo resizeCrop("images/cheer_videos/".$video_id.".jpg", 142, 100, '');
                                             ?>" alt="<?php echo strtoupper($video_title); ?>" title="<?php echo strtoupper($video_title); ?>" class="btnimg" /></a>
                                        </div>
                                        <div class="lfloat" style="width: 133px; margin-left: 8px; " >
                                             <div class="cheervid_caption" ><?php echo ucfirst($video_caption); ?></div>
                                             <div class="cheervid_time" ><?php echo $video_length; ?></div>
                                        </div>
                                        <div class="clear_both" ></div>
                                   </div>                        
                              <?php
                         }//end for
                    }//end if
                    ?>
                    </div>
                    <!-- end column videos -->
                    <div class="column_more" ><a href="cheerdancers-videos">More Videos</a></div>
               </div>
               <div style="height:3px; background:#27AAE2; width:303px;"></div>                    
          </div>

          <div style="float: left; width: 305px; margin-left: 20px">

               <div class="cheer_subsection" style='background:#fff url(/media/2.0/ping_background_10x440.png) repeat-x; background-position:bottom; border:none; width:293px;'>

                    <div class="cheer_subsection_header"><img src="images/cheer_featured.png"></div>

                    <div class="cheer_featcon" style="margin: 0px; padding: 5px; " >
                         <!-- FEATURED CONTENT -->
                         <?php
                         if($found_fd > 0){
                              echo trim($fdancer->Content);
                         }//end if
                         ?>
                         <div class="clear_both" ></div>
                         <!-- FEATURED CONTENT -->
                    </div>                    
               </div>
               <div style="height:3px; background:#ED008C; width:303px;"></div>                    
               
          </div>
          <div class='clear'></div>
     </div>
     <div style='float:left;'>          
          <?php
          if ($ad['Link']) {
          ?>
                      <div style="width: 300px; height: 100px">
                         <a href="<?php echo $ad['Link']; ?>"><img src="ads/<?php echo $ad['Image']; ?>"></a>
                      </div>
          <?php
          }
          ?>

          <div style="height: 15px"></div>

          <!-- html ads -->
          <?php
          echo $ads_list['nba_Cheerdancers_medallion1']['Content'];
          ?>
          <!-- end html ads -->
     </div>
     <div class='clear'></div>
</div>
