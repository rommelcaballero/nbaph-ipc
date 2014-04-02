function ajax_loader(txt) {
   //$("#popup_table").css({height: $(document).height()});
   $("#popup_body_content").css({padding: "40px 25px 25px", width: "714px"});
   $("#popup_body_content").html('<table style="width: 100%"><tr><td style="height: 200px; text-align: center"><img src="images/ajax-loader.gif"></td></tr></table>');
   $("#overlay").css({height: $(document).height()});
   $("#overlay").fadeIn("fast");
   //$("#popup_header").html(txt);
   calculate_spacer();
}

function calculate_spacer() {
   $("#popup_spacer").css({height: ((window.innerHeight / 2) + window.pageYOffset - ($("#popup_table").height() / 2))});
}

function fadeout() {
   $("#overlay").fadeOut("fast");
}





//URL ENCODE
function urlencode(str) {

    str = (str+'').toString();
    
    return encodeURIComponent(str).replace(/!/g, '%21').replace(/'/g, '%27').replace(/\(/g, '%28').replace(/\)/g, '%29').replace(/\*/g, '%2A').replace(/%20/g, '+');
}




 


function show_ajax(targ) {
   ajax_loader("");

   $.post(targ, "", function(msg) {
      $("#popup_body_content").html(msg);
      calculate_spacer();
   });
}

function login() {
   var dat = $("#login_form").serialize();

   //ajax_loader("LOGGING IN");
   $("#RegMessage").html("please wait...");
   $.post("login.php", dat, function(msg) {
      if (msg == "success") {
		  $("#RegMessage").html("");
         window.location = window.location;
      }
      else {
         //$("#popup_body_content").html(msg);
         //calculate_spacer();
		 $("#RegMessage").html(msg);
		 $("#ReqText").css({ color: '#f54d40' });
      }
   });
}


var temp_dat;

function register() {
   var dat = $("#registration_form").serialize();

   //ajax_loader("registration");
   $("#RegMessage").html("please wait...");
   $.post("register.php", dat, function(msg) {
      if (msg == "success") {
		 
		 $("#RegMessage").html("");
		  
         //window.location = window.location+"";
		 location.reload();  
		 
      }
      else {
         temp_dat = dat;
         //$("#popup_body_content").html(msg);
         //calculate_spacer();
		 $("#RegMessage").html(msg);
		 $("#ReqText").css({ color: '#f54d40' });
		 
		 
      }
   });
}

function retrieve_register() {
   	
   $.post("registration_form.php", temp_dat, function(msg) {
      $("#popup_body_content").html(msg);
      calculate_spacer();
	  
	  
   });
}

function retrieve() {
	
   var dat = $("#login_form").serialize();

   //ajax_loader("forgot password");
   $("#RegMessage").html("please wait...");
   
   $.post("retrieval.php", dat, function(msg) {
		 							 
      /*$("#popup_body_content").html(msg);
      calculate_spacer();*/
	  $("#RegMessage").html(msg);
	  $("#ReqText").css({ color: '#f54d40' });
   });
}




 
 //TRIM FUNCTION 
String.prototype.trim = function() {

a = this.replace(/^\s+/, '');

return a.replace(/\s+$/, '');

};
 


getVideos = function(tab)
{
	
	var video_type = tab.attr("type");
 
	$("#" + video_tab).css({backgroundPosition: "0 0", color: "#0054af"});
	 
	video_tab = tab.attr("id");
	video_section = "video_list_gallery";
 
	$("#" + video_tab).css({backgroundPosition: "0 33px", color: "#444"});
 	
 	$("#video_circle_" + video_count).prop("src", "images/circle_empty.png");
	$("#video_circle_0").prop("src", "images/circle_filled.png");
 	
	
	$("#"+video_section).css({ opacity: 0.5 });//loading sign
	
	//organize the data properly
	var data = 'action=get_videos' + '&rand=' + Math.random() + '&type=' + urlencode(video_type);
	
 	//start the ajax
	$.ajax({
 		url: "ajax-index.php",	
  		type: "POST",
 		data: data,		
 		cache: false,
 		success: function (html) {			
 			var result = html.split("|||"); 
			$("#"+video_section).css({ opacity: 1.0 });//loading sign
	
 			if(result[0] > 0)
			 { 
			  
			    $("#video_list_gallery div.pics").html(result[1]);
  				$("#video_list_gallery").data("scrollable").begin();
				video_count = 0;
			 }
 	
		}//end success
		
	});//end ajax
	
	//cancel the submit button default behaviours
	return false; 
	
	 
	
}//end get videos



getGallery = function(gallery_count) {
	
	$("#GalleryMain").css({ opacity: 0.5 });
	//organize the data properly
	var data = 'action=get_gallery' + '&rand=' + Math.random() + '&gallery_count=' + urlencode(gallery_count);
 
 	//start the ajax
	$.ajax({
 		url:  "ajax-index.php",	
  		type: "POST",
 		data: data,		
 		cache: false,
 		success: function (html) {			
 			//var result = html.split("|||"); 
			$("#GalleryMain").css({ opacity: 1.0 });//loading sign
		 	var result = html; 
 	
			$("#GalleryMain").attr('src', result); 
			$("#gallery_count").html(gallery_count+1);
	
 	
		}//end success
		
	});//end ajax
	
	//cancel the submit button default behaviours
	return false; 
	
}