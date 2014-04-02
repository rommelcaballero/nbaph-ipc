<div class="section-container" style="width: 672px; padding: 5px 0px 0px 0; float:left; margin-right:8px;">
    <div class="article_header" style="background: url('images/rounded_top_672.png'); width: 642px; height: 15px">
      VIDEO
    </div>

    <div style="width: 650px; border-left: 1px solid #d8d8d8; border-right: 1px solid #d8d8d8; padding: 5px 10px; height:189px;">
        <div style="width: 650px; padding-top: 5px">
            <ul class="video_list">
                <li style="background-position: 0 33px; color: #444" class="video_element" id="video_list_highlights" cat='HL' type="Highlights" >HIGHLIGHTS</li>
                <li class="video_element" id="video_list_top" cat='TP' type="Top Plays" >TOP PLAYS</li>
                <li class="video_element" id="video_list_picks" cat='EP' type="Editor\'s Picks" >EDITOR'S PICKS</li>
                <li class="video_element" id="video_list_tv" cat='NT' type="NBA TV" >NBA TV</li>
                <li class="video_element" id="video_list_live"><a href="http://www.nba.tv/nbatv/" class="blue" target="_blank">WATCH LIVE</a></li>
            </ul>
        </div>

        <table cellspacing="0" cellpadding="0" style="width: 650px; padding-top: 10px">
            <tr>
                <td style="width: 25px">
                    <img src="images/left_btn.png" id="video_left" class="pointer">
                </td>
                <td style="width: 600px; ">            
                    <div class="scroll" id="video_list_gallery">               
                        <div class="pics" id='video_pics'>                            
                            <?php while($row = mysqli_fetch_array($new_vid_array)): ?>
                                    <div class="pics_details">
                                        <div class="pics_actual">
                                            <a href="/videos/?id=<?php echo $row['id']; ?>">
                                              <?php if(file_exists("./ftp-web/".$row['small_image']) && trim($row['small_image']) != "" ): ?>  
                                              <img src="/ftp-web/<?php echo $row['small_image']; ?>"  width="132" height="70" border="0" title="<?php echo $row['description']; ?>">
                                              <?php else: ?>
                                              <img src="/ftp-web/default.jpg"  width="132" height="70" border="0" title="<?php echo $row['description']; ?>">
                                              <?php endif; ?>
                                            </a>
                                        </div>
                                        <a href="/videos/?id=<?php echo($row['id']); ?>"><?php echo stripslashes($row['title']); ?></a>
                                    </div>
                            <?php endwhile; ?>
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

<div class="section-container" style="width: 300px; padding: 5px 0 0px 0; float:left">
    <!--div class="article_header" style="background: url('images/rounded_top_300.png'); width: 270px; height: 15px">
      NBA WRITERS
    </div-->

    <div style="width: 300px;">
        <div style="width: 260px;">
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
    <!-- writers content start -->
    <div style="width: 298px; border: 1px solid #d8d8d8; height:199px;">     

      <!-- writers lists start -->
      <div class="clear" style="padding: 10px">
         <!-- writers personalities start -->
         <div id="writer_personality_list">
            <table>
            <?php
            for ($blog_cnt = 0; $blog_cnt < 1; $blog_cnt += 1) {
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
            for ($blog_cnt = 0; $blog_cnt < 1; $blog_cnt += 1) {
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

<div class='clear'></div>