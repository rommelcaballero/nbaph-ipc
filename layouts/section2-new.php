<div class="container"  style='width:1000px;'>  
    <div class="section-container" style="width: 672px; padding: 5px 0px 0px 0; float:left; margin-right:8px; border-bottom: 4px solid #2363BE;">
        <!--div class="article_header" style="background: url('images/rounded_top_672.png'); width: 642px; height: 15px">
          VIDEO
        </div-->
        <div style="width: 672px; border-bottom: 1px solid #d8d8d8;">
            <ul class="video_list">
                <li style="background-position: 0 33px; color: #444" class="video_element" id="video_list_highlights" cat='HL' type="Highlights" onclick="getVideos($(this));">HIGHLIGHTS</li>
                <li class="video_element" id="video_list_top" cat='TP' type="Top Plays" onclick="getVideos($(this));">TOP PLAYS</li>
                <li class="video_element" id="video_list_picks" cat='EP' type="Editor\'s Picks" onclick="getVideos($(this));">EDITOR'S PICKS</li>
                <!--li class="video_element" id="video_list_tv" cat='NT' type="NBA TV" >NBA TV</li-->
                <li class="video_element" id="video_list_live"><a href="http://www.nba.tv/nbatv/" class="blue" target="_blank">WATCH LIVE</a></li>
            </ul>
            <div class='clear'></div>
        </div>
        <div style="width: 650px; border-left: 1px solid #d8d8d8; border-right: 1px solid #d8d8d8; padding: 5px 10px; height:190px;">
            
            <script>
                function urlencode(str){str=(str+'').toString();return encodeURIComponent(str).replace(/!/g,'%21').replace(/'/g,'%27').replace(/\(/g,'%28').replace(/\)/g,'%29').replace(/\*/g,'%2A').replace(/%20/g,'+');}
                getVideos=function(tab){
                    var video_type=tab.attr("type");
                    var video_category = tab.attr('cat');
                    var video_tab=tab.attr("id");
                    var video_count = 12;

                    $("li.video_element").css({backgroundPosition:"0 0",color:"#0054af"});
                    
                    var video_section="video_list_gallery";
                    $("#"+video_tab).css({backgroundPosition:"0 33px",color:"#444"});
                    $("#video_circle_"+video_count).prop("src","images/circle_empty.png");
                    $("#video_circle_0").prop("src","images/circle_filled.png");
                    $("#"+video_section).css({opacity:0.5});
                    var data='action=get_videos'+'&rand='+Math.random()+'&type='+urlencode(video_category);
                    $.ajax({
                        url:"ajax-index.php",
                        type:"POST",
                        data:data,
                        cache:false,
                        success:function(html){
                            var result=html.split("|||");
                            $("#"+video_section).css({opacity:1.0});
                            if(result[0]>0){
                                $("#video_list_gallery div.pics").html(result[1]);
                                //$("#video_list_gallery").data("scrollable").begin();
                                video_count=0;
                            }
                        }
                    });
                    return false;
                };
            </script>
            <table cellspacing="0" cellpadding="0" style="width: 650px; padding-top: 10px">
                <tr>
                    <td style="width: 25px; vertical-align:top; padding-top:51px;">
                        <!--img src="images/left_btn.png" id="video_left" class="pointer"-->
                        <span id='video_left' class='arrow-left'></span>
                    </td>
                    <td style="width: 600px; height:144px; ">            
                        <div class="scroll" id="video_list_gallery">               
                            <div class="pics" id='video_pics'>                            
                                <?php while($row = mysqli_fetch_array($new_vid_array)): ?>
                                    <div class="pics_details">
                                        <div class="pics_actual" style="float:left;">
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
                    <td style="width: 25px; text-align: right; vertical-align:top; padding-top:51px;">
                        <!--img src="images/right_btn.png" id="video_right" class="pointer"-->
                        <span id='video_right' class='arrow-right'></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="height: 25px; text-align: center">
                        <div id='video-circle-indicator'></div>
                    </td>
                </tr>
            </table>
            <script>
                $("div[id=video_pics]").carousel({
                    circleContainer:$("div[id=video-circle-indicator]"),
                    itemWidth:150,
                    itemCount:12,
                    itemMove:4,
                    btnNext:$("span[id=video_right]"),
                    btnPrev:$("span[id=video_left]")
                });                
            </script>
            
        </div>
        <div class="section-more_link">
           <a href="videos">More ph.nba.com Videos</a>
        </div>
    </div>

    <div class="section-container" style="width: 300px; padding: 5px 0 0px 0; float:left; border-bottom: 4px solid #2363BE;">
        <div class="article_header" style="background: url('images/rounded_top_300.png'); width: 270px; height: 15px">
          NBA Writers
        </div>

        </div-->
        <!-- writers content start -->        
        <div style="width: 298px; border-left: 1px solid #d8d8d8; border-right: 1px solid #d8d8d8;  height:199px;">     
            <div style="padding:5px 10px; height:190px;">                
                <table cellspacing="0" cellpadding="0" style="width: 278px;">
                    <tr>
                        <td style="width: 15px; vertical-align:top; padding-top:60px;">
                            <!--img src="images/left_btn.png" id="personality_btn_left" class="pointer" /-->
                            <span id='personality_btn_left' class='arrow-left'></span>
                        </td>
                        <td>  
                            
                            <div class='personality-carousel-container'>
                                <div class='personality-carousel' id='stories' style="overflow:hidden; height:170px;">
                                    <?php foreach($person_array as $k => $v): ?>
                                    <?php $writer_pic = strtolower(urlencode(str_replace("ñ", "n", $v['Blogger']))); ?>    
                                    <span class='personality-story-excerpt'>                                        
                                        <!--img class='personality-photo' src="images/writers/< ?php echo $blogger_pic; ?>.jpg" border="0" /-->
                                        <?php if($v['tablename']=='blog'): ?>
                                        <img class='personality-photo' src="images/blogs/<?php echo $writer_pic; ?>.jpg" border="0" />
                                        <?php else: ?>
                                        <img class='personality-photo' src="images/personalities/<?php echo $writer_pic; ?>.jpg" border="0" />
                                        <?php endif; ?>
                                        <p>
                                        <a href="/<?php echo ($v['tablename'] == 'blog')?"bloggers":"writers-content"; ?>/<?php echo $v['BlogID']; ?>/<?php echo seoUrl(trim(stripslashes($v['BlogTitle']))); ?>" target="_blank"><?php echo stripslashes($v['BlogTitle']); ?></a><br/> 
                                        <b><?php echo stripslashes(strtoupper($v['Blogger'])); ?></b><br/>
                                        <?php echo stripslashes($v['BlogExcerpt']); ?>
                                        </p>
                                    </span>                            
                                    <?php endforeach; ?>
                                    <div class='clear'></div>
                                </div>
                            </div>
                        </td>
                        <td style="width: 15px; vertical-align:top; padding-top:60px;">
                            <!--img src="images/right_btn.png" id="personality_btn_right" class="pointer" /-->
                            <span id='personality_btn_right' class='arrow-right'></span>
                        </td>
                    </tr>   
                </table>
                
                <div class="section-more_link">
                    <a href="nba-writers">More ph.nba.com Stories</a>
                </div>
                <script type='text/javascript'>
                    $(document).ready(function(){
                        $("div[id=stories]").carousel({
                            itemWidth:238,
                            itemCount:10,
                            itemMove:1,
                            btnNext:$("span[id=personality_btn_right]"),
                            btnPrev:$("span[id=personality_btn_left]")
                        });
                    });
                </script>
            </div>

        </div>        
    </div>

    <div class='clear'></div>   
</div>

