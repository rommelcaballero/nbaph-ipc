<?php

if($part_page)
 {
	 if($found_bgads > 0)
	  {		
		$bgads = mysqli_fetch_object($result_bgads);
		
?>

        <div class="advertisements" location="<?php echo $bgads->Link; ?>"  ></div>
        <script type="text/javascript">
        <!--
        $(function() {
		$('.advertisements').css({ 
			backgroundImage : "url('<?php echo $bgads->Image; ?>')", 
			backgroundColor : "#<?php echo $bgads->BgColor; ?>",				
			backgroundPosition : "top center",
			backgroundRepeat : "no-repeat"
			}); 
			
		$(".advertisements").click(function() {                
                	window.open($(this).attr("location"),'_blank'); 
			return false;
                
            	});
       		
        });
        -->
        </script>
        <!-- BEGIN EFFECTIVE MEASURE CODE -->
		<!-- COPYRIGHT EFFECTIVE MEASURE -->
		<script type="text/javascript" src="//ad.effectivemeasure.net/em_adscan.js?emcid=3351&camid=361"></script>
		<!-- END EFFECTIVE MEASURE CODE -->

<?php }else{// end $found_bgads ?>
	 	<!--script type="text/javascript">        
        $(function() {
		$('body').css({ 				
			backgroundImage : "url('/media/2.0/13as_ph_bkgd.jpg')", 
			backgroundColor : "#000",				
			backgroundPosition : "top center",
			backgroundRepeat : "no-repeat",
			backgroundAttachment : "fixed"
		}); 
        });        
        </script-->
<?php }
 }//end if
?>
