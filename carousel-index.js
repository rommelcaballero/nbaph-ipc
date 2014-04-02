(function($){
	$.fn.carousel = function(options){
		var settings = $.extend({											            
            itemCount: 0,
            itemMove:0,
            itemWidth:0,
            btnNext:null,
            btnPrev:null,
            circleContainer:null
        }, options);
        return this.each(function(){				        	
        	var max_position = (-(settings.itemWidth * settings.itemCount));
        	var pics_position = 0;
        	var id = $(this).attr("id");	
        	$(this).css({'width':(settings.itemWidth * settings.itemCount)});			        	
			$(settings.btnPrev).click(function(){				
				if(((pics_position * (settings.itemWidth * settings.itemMove)) + (settings.itemWidth * settings.itemMove)) <= 0){
					pics_position += 1;
					$("#"+id).animate({left:(pics_position * (settings.itemWidth * settings.itemMove))});																		
					$(settings.circleContainer).find('img').each(function(){
						if($(this).attr("id") == "headline_circle_"+Math.abs(pics_position)){
							$(this).attr({"src":"images/circle_filled.png"});
						}else{
							$(this).attr({"src":"images/circle_empty.png"});
						}	
					});
				}								
			});	        
			$(settings.btnNext).click(function(){										
				if(((pics_position * (settings.itemWidth * settings.itemMove)) - (settings.itemWidth * settings.itemMove)) > max_position){									
					pics_position -= 1;
					$("#"+id).animate({left:(pics_position * (settings.itemWidth * settings.itemMove))});
					$(settings.circleContainer).find('img').each(function(){										
						if($(this).attr("id") == "headline_circle_"+ Math.abs(pics_position)){
							$(this).attr({"src":"images/circle_filled.png"});
						}else{
							$(this).attr({"src":"images/circle_empty.png"});
						}	
					});
				}
			});	     
			var circle_count = (settings.itemCount / settings.itemMove);
			for(a=1; a<=circle_count; a++){
				if(a == 1){
					$(settings.circleContainer).append('<img src="images/circle_filled.png" id="headline_circle_'+(a-1)+'" class="headline_circle">');
				}else{	
					$(settings.circleContainer).append('<img src="images/circle_empty.png" id="headline_circle_'+(a-1)+'" class="headline_circle">');							
				}			
			}

        });
	}
})(jQuery);