<div class="nbaph_article_wide">   <div class="nbaph_article_content" style="height: 100%; overflow: hidden; margin-top: 0">      <div id="nbaph_headline_image"><?php$results = $connect->query("select * from carousel order by CarouselID desc limit 0, 3");while($row = $results->fetch_array()) {$link = $row['Link'];$link2 = explode("/",$link);?>         <div class="nbaph_headline_image">           <a href="news-article.php?id=<?php echo $link2[4]; ?>"><img src="<?php echo $row['Image']; ?>"></a>            <ul class="nbaph_headline_title">               <li><?php               if ($row['Link']) {												echo '<a href="news-article.php?id=' . $link2[4] . '" style="color: #fff">';				//$link2 = str_replace("ph.nba.com","mobile.nba2k.ph",$link);                  //echo '<a href="' . $link2[] . '" style="color: #fff">';				  //echo '<a href="' . $row['Link'] . '" style="color: #fff">';				  //$title = strtolower($row['Title']);				  //echo '<a href="news-article.php?id=' . $row['CarouselID'] . str_replace(" ","-",stripslashes($title)) style="color: #fff"> ;               }               echo stripslashes($row['Title']);               if ($row['Link']) {                  echo '</a>';               }               ?></li>            </ul>         </div><?php}?>         <div style="clear: both"></div>      </div>      <div class="nbaph_article_pages" style="position: absolute; bottom: 0; left: 0">         <img src="imagesph/article_page_active.png" class="nbaph_entry_page" targ="headline_image" entry="1">         <img src="imagesph/article_page_white.png" class="nbaph_entry_page" targ="headline_image" entry="2">         <img src="imagesph/article_page_white.png" class="nbaph_entry_page" targ="headline_image" entry="3">      </div>   </div></div>