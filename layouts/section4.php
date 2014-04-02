<ul class='three-column'>
    <li id='column1'>
        <div style="width: 330px; padding: 0px 0 2px 0; background: url('images/rounded_bottom_330.png') bottom center no-repeat">
            <div class="article_header" style="background: url('images/rounded_top_330.png'); width: 300px; height: 15px">
                POLL
            </div>    
            <!-- poll content start -->
            <div class="cell_330" id="poll_cell" style='height:225px;'>
                <?php if (!isset($_SESSION['pollvoter'])): ?>
                <form id="poll_form">
                    <input type="hidden" name="pollid" value="<?php echo $poll['PollID']?>">
                    <table cellspacing="0" style="width: 100%; height: 175px">
                        <tr>
                            <?php if ($poll['Image']): ?>
                            <td rowspan="2" style="width: 115px">
                                <img src="<?php echo $poll['Image']; ?>"> 
                            </td>
                            <?php endif; ?>
                            <td>
                                <?php echo stripslashes($poll['Question']); ?>    
                                <div style="padding: 5px 0">
                                <?php for ($count = 0; $count < count($poll_array); $count += 1): ?>
                                    <div class="poll_choice">
                                        <input type="radio" name="poll" id="poll<?php echo $count; ?>" value="<?php echo $poll_array[$count]['Selection']; ?>">
                                        <label for="poll<?php echo $count; ?>"><?php echo $poll_array[$count]['Choice']; ?></label>
                                    </div>
                                <?php endfor; ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style='text-align:center;'>
                                <img src="images/vote.png" class="pointer" onclick="<?php
                                if (!isset($_SESSION['pollvoter'])) echo "submit_poll()";
                                else echo "alert('You have already voted for this poll.')";
                                ?>">
                            </td>
                        </tr>
                    </table>
                </form>
                <?php else: ?>
                <table cellspacing="0" style="width: 100%; height: 175px">
                    <tr>
                        <?php if ($poll['Image']): ?>
                        <td rowspan="2" style="width: 105px">
                            <img src="<?php echo $poll['Image']; ?>">
                        </td>
                        <?php endif; ?>
                        <td valign="top">
                            <?php echo stripslashes($poll['Question']); ?>
                            <div style="padding: 5px 0">
                                <table border="0" cellspacing="2" cellpadding="0">    
                                <?php
                                for ($count = 0; $count < count($poll_array); $count += 1):
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
                                <?php endfor; ?>
                                </table>
                            </div>
                        </td>
                    </tr>
                </table>
                <?php endif; ?>
            </div>
        </div>
        <div class='section-container' style="width: 330px; padding: 5px 0 0px 0; ">
            <div class="article_header" style="background: url('images/rounded_top_330.png'); width: 300px; height: 15px">
                <?php echo stripslashes($nbaaction_array['Heading']); ?>
            </div>                   
            <!-- Headlines content start -->
            <div class="cell_330" style='height:265px;'>
                <?php echo stripslashes($nbaaction_array['Content']); ?>
                <div class="clear_both" ></div>
                      
            </div>
            <!-- Headlines content end -->
        </div> 
    </li>
    <li class='spacer'></li>
    <li id='column2'> 
        <div style="width: 290px; height: 250px; padding:0 20px;">
        <?php echo $ads_list['nba_homepage_middle_medallion2']; ?>
        </div>
        <div class='section-container' style="width: 330px; padding: 5px 0 0px 0; ">
            <div class="article_header" style="background: url('images/rounded_top_330.png'); width: 300px; height: 15px">
                PHOTO GALLERY
            </div>
            <div class="cell_330" style="height:294px;">
                <table cellspacing="0" cellpadding="0" style="width: 318px">
                    <tr>
                        <td style="width: 13px">
                            <img src="images/left_btn_small.png" id="gallery_left" class="pointer">
                        </td>
                        <td style="width: 282px; padding: 0 5px">
                            <div class="scroll" id="gallery_pics" style="width: 282px; height: 282px; ">                   
                                <div class="pics"> 
                                    <div style="width: 282px; height: 282px" >                           
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
        </div>
    </li>
    <li class='spacer'></li>
    <li id='column3'>
        <?php if ($ads_array[0]['Link']): ?>                
        <div style="width: 300px; height: 100px">
                <a href="<?php echo $ads_array[0]['Link']; ?>"><img src="ads/<?php echo $ads_array[0]['Image']; ?>"></a>
        </div>
        <?php endif; ?>          
        <?php
            //$lazada_ads = array("coby.jpg","gshock.jpg","spalding.jpg","toshiba.jpg","xperia.jpg");
            //$lazada_random_index = rand(0,4);

        ?>
        <!--div style="width: 300px; height: 100px">
            <a href="http://campaign.lazada.com.ph/philstar/" target="_blank"><img src="/media/2.0/lazada/< ?php echo $lazada_ads[$lazada_random_index]; ?>" /></a>
        </div-->
        <div class='section-container'  style="width: 300px; padding: 5px 0 0px 0;">
            <div class="article_header" style="background: url('images/rounded_top_300.png'); width: 270px; height: 15px">
              AROUND THE NBA
            </div>                
            <div class="cell_288" style="height:444px;">
                <?php echo stripslashes($around_array['Content']); ?>                  
            </div>           
        </div>
    </li>
</ul>