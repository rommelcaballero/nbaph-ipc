/*
 * Drop downmenu
 *
 * Author : Nicholas Ortenzio
 * Created : 2010/03/26
 * Last Modified : 2010/02/26
 *
 */

(function($){

  $.fn.DropDownMenu = function(options) {

    var defaults = $.extend({itemSelector:'li'}, options);
  
    return this.each(function(){
      var $this = $(this);
      var $navs = $this.children('ul').addClass('ui-dropdown-nav').children(defaults.itemSelector);
      $navs.children('ul').addClass('ui-dropdown-sub').hide();
      $navs.hover(
        function(){$(this).addClass('ui-dropdown-active')}, 
        function(){$(this).removeClass('ui-dropdown-active')}
      );
    }).addClass('dropdownmenu');

  };

})(jQuery);

$(function() { 

$("#global_header .inner").DropDownMenu({itemSelector:'li'});

})


/*<!-- for register and login -->
<!--<link media="screen" rel="stylesheet" type="text/css" href="colorbox/colorbox.css" />
<script src="colorbox/jquery.colorbox.js"></script>-->*/
$(function() { 
  $("a.registerbox").colorbox({onComplete: function() {
     init_fb();
  }
});
/*$.colorbox({href:"register_box.php"});
 $("#LoginBtn").click(function(){
  
  login();
  
 });*/
 
})

$("#header_nav_nba").hover(function() {
   $(this).css({backgroundPosition: "0 29px"});
   }, function() {
   $(this).css({backgroundPosition: "0 0"});
});

$(".header_nav_section").hover(function() {
  $(this).css({background: "#fff","border-radius":"0.5em 0.5em 0 0"});
  $(this).find(".header_nav_link").css({color:"#525252"});
  /*$(this).css({background: "url('images/header_nav_over.png') repeat-x"});*/
  var navid = $(this).prop('id');

  $(this).find("#header_" + navid).each(function(){
    $(this).css({display: "block"});
  });  

}, function() {
  $(this).css({background: "none"});
  $(this).find(".header_nav_link").css({color:"#fff"});
  var navid = $(this).prop('id');
  //$("#header_" + navid).css({display: "none"});
  $(this).find("#header_" + navid).each(function(){
    $(this).css({display: "none"});
  });  
});

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-31591663-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
