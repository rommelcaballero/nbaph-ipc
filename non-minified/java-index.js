$(".scroll").scrollable({ circular: true });

var video_section = "video_list_gallery";

var headline_count = 0;
var video_count = 0;

$("#headline_left").click(function() {
   $("#headline_pics").data("scrollable").prev();

   $("#headline_circle_" + headline_count).prop("src", "images/circle_empty.png");

   headline_count -= 1;
   if (headline_count < 0)
      headline_count = 2;

   $("#headline_circle_" + headline_count).prop("src", "images/circle_filled.png");
   
});

$("#headline_right").click(function() {
   $("#headline_pics").data("scrollable").next();

   $("#headline_circle_" + headline_count).prop("src", "images/circle_empty.png");

   headline_count += 1;
   if (headline_count > 2)
      headline_count = 0;

   $("#headline_circle_" + headline_count).prop("src", "images/circle_filled.png"); 
   
});


$(".headline_circle").click(function() {
   $("#headline_circle_" + headline_count).prop("src", "images/circle_empty.png");

   var num = parseInt($(this).prop("id").substring($(this).prop("id").length - 1));
   $("#headline_pics").data("scrollable").seekTo(num);
   headline_count = num;

   $("#headline_circle_" + headline_count).prop("src", "images/circle_filled.png");
});

$("#video_left").click(function() {
   $("#" + video_section).data("scrollable").prev();

   $("#video_circle_" + video_count).prop("src", "images/circle_empty.png");

   video_count -= 1;
   if (video_count < 0)
      video_count = 2;

   $("#video_circle_" + video_count).prop("src", "images/circle_filled.png");
});

$("#video_right").click(function() {
   $("#" + video_section).data("scrollable").next();

   $("#video_circle_" + video_count).prop("src", "images/circle_empty.png");

   video_count += 1;
   if (video_count > 2)
      video_count = 0;

   $("#video_circle_" + video_count).prop("src", "images/circle_filled.png");
});

$(".video_circle").click(function() {
   $("#video_circle_" + video_count).prop("src", "images/circle_empty.png");

   var num = parseInt($(this).prop("id").substring($(this).prop("id").length - 1));
   $("#" + video_section).data("scrollable").seekTo(num);
   video_count = num;

   $("#video_circle_" + video_count).prop("src", "images/circle_filled.png");
});


var video_tab = "video_list_highlights";

$(".video_element").hover(function() {
   $(this).css({backgroundPosition: "0 33px", color: "#444"});
   }, function() {
   if ($(this).prop("id") != video_tab) {
      $(this).css({backgroundPosition: "0 0", color: "#0054af"});
   }
});

$(".video_element").click(function() {
    
   if ($(this).prop('id') != "video_list_live") {
	  
	  	getVideos($(this))
	  
   }
   
});

var writer_tab = "writer_personality";

$(".writer_element").hover(function() {
   $(this).css({backgroundPosition: "0 33px", color: "#444"});
   }, function() {
   if ($(this).prop("id") != writer_tab) {
      $(this).css({backgroundPosition: "0 0", color: "#0054af"});
   }
});

$(".writer_element").click(function() {
   $("#" + writer_tab).css({backgroundPosition: "0 0", color: "#0054af"});
   $("#" + writer_tab + "_list").css({display: "none"});

   writer_tab = $(this).prop("id");
   
   $("#" + writer_tab).css({backgroundPosition: "0 33px", color: "#444"});
   $("#" + writer_tab + "_list").css({display: "block"});
});

//SHARE MEDIA
var share_tab = "twitter_tab";

$("._element").hover(function() {
   $(this).css({backgroundPosition: "0 33px", color: "#444"});
   }, function() {
   if ($(this).prop("id") != writer_tab) {
      $(this).css({backgroundPosition: "0 0", color: "#0054af"});
   }
});

$(".share_element").click(function() {
   $("#" + share_tab).css({backgroundPosition: "0 0", color: "#0054af"});
   $("#" + share_tab + "_list").css({display: "none"});

   share_tab = $(this).prop("id");
   
   $("#" + share_tab).css({backgroundPosition: "0 33px", color: "#444"});
   $("#" + share_tab + "_list").css({display: "block"});
});


function submit_poll() {
   var dat = $("#poll_form").serialize();

   $.post("submit_poll.php", dat, function(msg) {
      $("#poll_cell").html(msg);
   });
}

var p_top = 1;
var c_top = 1;

function carousel(targ, img) {
   if (c_top != targ) {
      $("#carousel" + c_top).css({zIndex: 0});

      p_top = c_top;
      c_top = targ;

      $("#icarousel" + targ).html('<img src="' + img + '" width="672" height="376">');

      $("#carousel" + targ).css({zIndex: 10});
      $("#carousel" + targ).css({left: "-672px", display: "block"}).animate({left: '0'}, "fast", function() {
       $("#carousel" + p_top).css({display: "none"});
      });
      //$("#carousel" + targ).slideDown("fast", function() {
       //$("#carousel" + p_top).css({display: "none"});
      //});
   }
}