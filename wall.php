<?php if($wall_videos[0]['wall_type'] == 'mp4'): ?>
<style>
	.ui-button {
	    font-size: 14px !important; /* change font size */					    
	    color:#0054AF !important;
	}
	.ui-dialog-titlebar{display: none;}	
	.ui-dialog-title{
		font-size: 14px !important;
		color:#0054af !important;						
	}
	.ui-widget-overlay{opacity:0.8;}
	.stop-scrolling {
	  	height: 100%;
	  	overflow: hidden;
	}
	.ui-dialog-content{padding:0 !important;}
	.ui-dialog-titlebar-close{display: none;}
	.dialog-ads{height: 100px;
		text-align: center;
		line-height: 8;
	}
	.ui-dialog-buttonpane{margin-top:0 !important;}
	/*
	.dialog{
		width: 900px !important;
		padding:0 !important;		
	}*/
	#dialog{background:url(/media/2.0/study3-material.jpg) no-repeat;}	
	.video-container {
	  	display: block;
	  	left: 135px;
	 	position: absolute;
	  	top: 100px;
	}
	.skin-link{width: 900px; height: 485px; display: block;}
</style>	
<div class='dialog' style="display:none;" id='dialog'>
	<a class='skin-link' target="_blank" href="http://on.fb.me/1aobUqI">
		
			<div class='video-container'>	
				<video controls width="630" height="360" id='wall-video' >
					<source type="video/mp4" src="<?php echo $base; ?>ftp-web/<?php echo $wall_videos[0]['filename']; ?>">
				</video>			
			</div>
		
	</a>
</div>
<script>
	$(window).load(function(){	
		function getCookie(c_name){
			var c_value = document.cookie;
			var c_start = c_value.indexOf(" " + c_name + "=");
			if (c_start == -1){
		  		c_start = c_value.indexOf(c_name + "=");
		  	}
			if (c_start == -1){
		  		c_value = null;
		  	}else{
		  		c_start = c_value.indexOf("=", c_start) + 1;
		  		var c_end = c_value.indexOf(";", c_start);
		  		if (c_end == -1){
		    		c_end = c_value.length;
		    	}
		  		c_value = unescape(c_value.substring(c_start,c_end));
		  	}
			return c_value;
		}

		function setCookie(c_name,value,exdays){
			var exdate=new Date();
			exdate.setDate(exdate.getDate() + exdays);
			var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
			document.cookie=c_name + "=" + c_value;
		}

		function checkCookie(c_name){
			var wall=getCookie(c_name);
			wall = null;
			if (wall==null || wall==""){
				
		  		$("div.dialog").dialog({
					title : "Wall",
					modal : true,
					width:900,
					height:555,
					resizable:false,
					draggable:false,
					show: { effect: 'drop', direction: "up",duration:800 },
					hide: { effect: 'drop', direction: "up",duration:800 },
					buttons: {						
						"Close":function(){
							var v = document.getElementById("wall-video");	
							v.pause();	
							$(this).dialog("close");
						}
					},
					open:function(event,ui){

						var myVar=setInterval(function(){
							start_wall();
						},3000);
						function start_wall(){
							var v = document.getElementById("wall-video");	
							v.onended = function(e){
								$("div.dialog").dialog("close");
							};
							if(v.paused) v.play();
							clearInterval(myVar);
						}
					},
					create:function(event, ui){
						$("body").addClass("stop-scrolling");	
					},
					beforeClose: function(event, ui) {								
					  	$("body").removeClass("stop-scrolling");
					}
				});
		  	
		    setCookie(c_name,c_name,1);
		  	}
		}
		checkCookie("wall-<?php echo $wall_videos[0]['date_created']; ?>");
	});
</script>
<?php elseif($wall_videos[0]['wall_type'] == 'swf'): ?>
<?php /* elseif($wall_videos[0]['wall_type'] == 'swf' && $_GET['test-wall'] == 1): */ ?>
<style>
	.ui-dialog{background: transparent; border: none;}
	.ui-dialog-titlebar{background: transparent; border: none; padding:0 !important;}	
	
	.ui-dialog-titlebar-close{right:6em !important; display: none; margin-right:-15px !important;}

	.ui-dialog-content{overflow: none !important;}
	.ui-widget-header{border: none;}
	.ui-widget-overlay{opacity:0.8; background: #000;}
	.ui-icon{width:32px !important; height:32px !important; background:url(/media/2.0/button_close.png) 0 -32px no-repeat !important; top:23%  !important; margin-left:-16px !important;}	
	.ui-dialog-titlebar-close{width:32px !important; height:32px !important; }
	/*.*/
</style>
<div class='dialog' style="display:none; ">	
	<embed id='wall-video' src="<?php echo $base; ?>ftp-web/wall/<?php echo $wall_videos[0]['filename']; ?>" width="<?php echo $wall_videos[0]['wall_width']; ?>" height="<?php echo $wall_videos[0]['wall_height']; ?>" wmode="transparent" />
</div>
<script>
	$(window).load(function(){			
		function setCookie(cname,cvalue,exhours){
			var d = new Date();
			d.setTime(d.getTime()+(exhours*60*60*1000));
			var expires = "expires="+d.toGMTString();
			document.cookie = cname + "=" + cvalue + "; " + expires;
		} 
		function getCookie(cname){
			var name = cname + "=";
			var ca = document.cookie.split(';');
			for(var i=0; i<ca.length; i++){
				var c = ca[i].trim();
				if (c.indexOf(name)==0) return c.substring(name.length,c.length);
			}
			return "";
		} 
		function checkCookie(c_name){
			var wallcookie = getCookie(c_name);
			
			$("div.dialog").dialog({
				modal : true,
				width:<?php echo ($wall_videos[0]['wall_width'] + 100); ?>,
				height:<?php echo ($wall_videos[0]['wall_height'] + 100); ?>,
				resizable:false,
				draggable:false,
				show: { effect: 'drop', direction: "up",duration:800 },
				hide: { effect: 'drop', direction: "up",duration:800 },					
				open:function(event,ui){
					
					var myVar=setInterval(function(){
						show_close_button();
					},<?php echo $wall_videos[0]['duration']; ?>);
					function show_close_button(){						
						
						$(".ui-dialog-titlebar-close").animate({
								display: "toggle",
								}, 500, "linear", function() {	});

						clearInterval(myVar);
					}
					
					$("body").addClass("stop-scrolling");	
				},
				create:function(event, ui){
					$("body").addClass("stop-scrolling");	
				},
				beforeClose: function(event, ui) {						
					$("body").removeClass("stop-scrolling");
					wallcookie=""; // bypass any intervals
					if(wallcookie == ""){						
						setCookie(c_name,"wall",1);
						// make ajax call to count impressions
						
						$.ajax({
							'url':'<?php echo $base; ?>ajax-wall.php?action=impr',
							'type':'POST',
							'dataType':'json',
							'data':{wall_id:<?php echo $wall_videos[0]['id']; ?>, csrf:"<?php echo $csrf; ?>"}
						}).done(function(ret){
							console.log(ret);
						});						
					}			
				}
			});
		
		}
		checkCookie("wall-<?php echo $wall_videos[0]['date_created']; ?>");		
	});
</script>
<?php endif ?>
