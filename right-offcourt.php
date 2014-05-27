<div id="MoreOffcourt" >
            
   <div class="right_header" >
      MORE OFF-COURT NEWS
   </div>
   
   <div class="right_holder" >
        
        <div style="margin: 0px; padding: 15px; " >
             
             <?php
            for ($count = 0; $count < count($other_array); $count += 1) {
                if($other_array[$count]["Source"]=="US")
                 {
                    $offr_link = trim($other_array[$count]["Link"]);
                 }
                else
                 {
                    $offr_link = "/off-court-news/".$other_array[$count]["OffcourtID"]."/".seoUrl(stripslashes($other_array[$count]['Title'])); 
                 }
            ?>
                <div style="padding: 0px 0px 5px 0px;" ><a href="<?php echo $offr_link; ?>"><?php echo stripslashes($other_array[$count]['Title']); ?></a></div>
            <?php
            }
            ?>
             
   
        </div>
        
   </div>	
   
   
</div>
