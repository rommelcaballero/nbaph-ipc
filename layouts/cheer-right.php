
<div class="cheer_right" >

   <?php

   if($blogger)
    {
   ?>
   <div style="width: 300px; height: 30px; background-color: #8ec63f; color: #ffffff; font-size: 12pt; font-weight: bold; " >
   	
     <div style="padding: 5px 0px 0px 10px; " >More from <?php echo ucwords(strtolower($blogger));  ?></div>

   </div>
   <?php
	}
   else
    {
   ?>
   	<div ><img src="images/cheer_columns.png"></div>
   <?php	
	}
   ?>
   <!-- end column content -->
   <div style="margin: 0px; padding: 15px 10px 9px 10px; border: 1px solid #3c3c3c; border-top: 0px; " >

        <?php

        if($found_col > 0)
         {
            for ($count = 0; $count < $found_col; $count += 1)
             {

                 $column_id = $column_array[$count]['ColumnID'];
                 $column_title = ucfirst(trim($column_array[$count]['Title']));
                 $column_intro = myTruncate(trim($column_array[$count]['Intro']), 110, " ", "...");
                 $column_writer = strtoupper(trim($column_array[$count]['Writer']));
                 $column_link = trim(trim($column_array[$count]['Link']));

                 $column_img = "images/column/".$column_id."_column.jpg";
        ?>

       <!-- column 1 -->
        <div class="column_item" >

            <div class="lfloat" ><a href="cheerdancers-columns/<?php echo $column_id; ?>/<?php  echo seoUrl($column_title); ?>/<?php echo trim(urlencode($column_writer)); ?>"><img src="<?php
               echo $column_array[$count]['ImageThumb'];
            ?>" alt="Closer to finished" title="Closer to finished" width="76" height="76" /></a></div>

            <div class="lfloat" style="width: 189px; margin-left: 10px; " >

                <div class="column_title" ><a href="cheerdancers-columns/<?php echo $column_id; ?>/<?php echo seoUrl($column_title); ?>" ><?php echo $column_title; ?></a></div>

                <div class="column_dancer" ><?php echo $column_writer; ?></div>

                <div class="column_content" >

                    <?php echo $column_intro; ?>

                </div>

            </div>

            <div class="clear_both" ></div>

        </div>
        <!-- end column 1 -->

        <?php	
             }//end while

         }//end if
        ?>

   </div>
   <!-- column content -->

   <!-- div class="column_more" ><a href="#">More Columns</a></div -->

</div>

<div style="height: 10px"></div>

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