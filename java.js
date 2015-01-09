
headerRemoveMobile=function(){
	$('#nbaph_header_ul_mobile').hide();
}


$(function(){

	$(window).resize(function(){
		var windowWidth = $(window).width();
		if(windowWidth>=765)headerRemoveMobile();
	});

	$(document.body).on("click","#nbaph_header_mobilemenu_btn",function(e){
		$('#nbaph_header_ul_mobile').slideToggle(200);
		e.preventDefault();
	});

	$(document.body).on("click","#nbaph_header_ul_mobile a",function(e){
		var p = $(this).parent().parent().attr('id'), c = $(this).attr('class'), s = $(this).attr('datasolo'), l = $(this).attr('href');

		if(p=='nbaph_header_ul_mobile' && c!='mobilenav mobilenav_inactive' && s!="true")
		{
			if(c=='active'){
				$(this).attr('class','mobilenav');
				$(this).parent().find('.nbaph_submenu_mobile').fadeOut(200,function(){
					$('.mobilenav').removeClass('mobilenav_inactive');
				});
			}else{
				$(this).attr('class','active');
				$(this).parent().find('.nbaph_submenu_mobile').fadeIn(200);
				$('.mobilenav').addClass('mobilenav_inactive');
			}
		}

		if(l!='#')
			window.location.href=l;

		e.preventDefault();
	});

});

$(document).ready(function() {
      $('body').click(function(evt) { 
        if(evt.target == this){  //only if user clicks the background skin
          //console.log("background skin click");
          //window.open("http://bit.ly/1xCdGA9","_target");
         //window.open("http://bit.ly/1uHGLHl","_target");
        }else{
          //console.log("somewhere else");
        }
      });   
    });
