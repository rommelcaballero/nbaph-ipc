<div id="nbaph_footer">
   <div style="margin: 5px 0">
      Copyright 2014 NBA Media Ventures, LLC | NBA Media 
      Ventures, LLC. All rights reserved. No portion of this site 
      may be duplicated, redistributed or manipulated in any form.
   </div>

   <div style="margin: 5px 0">
      By accessing any information beyond this page, you agree to 
      abide by the <a href="http://www.nba.com/news/privacy_policy.html">Privacy Policy</a> and <a href="http://www.nba.com/news/termsofuse.html">Terms of Use</a>.
   </div>

   <div style="margin: 5px 0; color: #005491">
      <a href="mailto:dinomaragay@philstar.com">Contact Editorial</a> |
      <a href="mailto:ladyrempalo@philstar.com">Advertise on NBA.com</a> |
      <a href="http://www.nba.com/help/site_faq.html">NBA.com Help</a> |
      <a href="http://www.nba.com/help/fan_relations_faq.html">Fan Relations FAQ</a>
   </div>
</div>

<script type="text/javascript">
<!--
$(".nbaph_entry_page").click(function() {
   var page = $(this).attr('entry');
   var targ = $(this).attr('targ');

   $(".nbaph_entry_page").each(function() {
      if ($(this).attr('targ') == targ) {
         if ($(this).attr('entry') == page) {
            $(this).attr('src', 'imagesph/article_page_active.png');
         }
         else {
            if (targ == 'headline_image') {
               $(this).attr('src', 'imagesph/article_page_white.png');
            }
            else {
               $(this).attr('src', 'imagesph/article_page_dormant.png');
            }
         }
      }
   });

   $("#nbaph_" + targ).animate({marginLeft: "-" + ((page - 1) * 100) + "%"});
   $("#nbaph_" + targ + "_mid").animate({marginLeft: "-" + ((page - 1) * 100) + "%"});
   $("#nbaph_" + targ + "_mobile").animate({marginLeft: "-" + ((page - 1) * 100) + "%"});
});

$(".nbaph_entry_page_video").click(function() {
   var page = $(this).attr('entry');

   $(".nbaph_entry_page_video").each(function() {
      if ($(this).attr('entry') == page) {
         $(this).attr('src', 'imagesph/article_page_active.png');
      }
      else {
         $(this).attr('src', 'imagesph/article_page_dormant.png');
      }
   });

   $(".nbaph_video_list").animate({marginLeft: "-" + ((page - 1) * 100) + "%"});
});

$(".nbaph_gallery_items").hover(function() {
   $(this).find(".nbaph_gallery_description").css({display: "none"});
   }, function() {
   $(this).find(".nbaph_gallery_description").css({display: "block"});
});

$(".nbaph_video_others_header").click(function() {
   $(".nbaph_video_others_header").removeClass('active');
   $(this).addClass('active');

   var sec = $(this).attr('section');

   $(".nbaph_hl").css({display: "none"});
   $(".nbaph_tp").css({display: "none"});
   $(".nbaph_ep").css({display: "none"});

   $(".nbaph_" + sec).css({display: "block"});
});

$(function() {
   $("#nbaph_headline_image").swipe({
      swipeLeft:function(event, direction, distance, duration, fingerCount) {
         var par = $("#nbaph_headline_image").parent().width();
         var est = parseInt($("#nbaph_headline_image").css('margin-left'));
         var page = Math.ceil(-(est / par)) + 2;

         swiping(page, 'headline_image', 'left', 3, '');
      },
      swipeRight:function(event, direction, distance, duration, fingerCount) {
         var par = $("#nbaph_headline_image").parent().width();
         var est = parseInt($("#nbaph_headline_image").css('margin-left'));
         var page = Math.ceil(-(est / par));

         swiping(page, 'headline_image', 'right', 3, '');
      },
      //Default is 75px, set to 0 for demo so any distance triggers swipe
      threshold:0
   });

   $("#nbaph_video_entries").swipe({
      swipeLeft:function(event, direction, distance, duration, fingerCount) {
         var par = $("#nbaph_video_entries").parent().width();
         var est = parseInt($("#nbaph_video_entries").css('margin-left'));
         var page = Math.ceil(-(est / par)) + 2;

         swiping(page, 'video_entries', 'left', 3, '');
      },
      swipeRight:function(event, direction, distance, duration, fingerCount) {
         var par = $("#nbaph_video_entries").parent().width();
         var est = parseInt($("#nbaph_video_entries").css('margin-left'));
         var page = Math.ceil(-(est / par));

         swiping(page, 'video_entries', 'right', 3, '');
      },
      //Default is 75px, set to 0 for demo so any distance triggers swipe
      threshold:0
   });

   $("#nbaph_shop_items").swipe({
      swipeLeft:function(event, direction, distance, duration, fingerCount) {
         var par = $("#nbaph_shop_items").parent().width();
         var est = parseInt($("#nbaph_shop_items").css('margin-left'));
         var page = Math.ceil(-(est / par)) + 2;

         swiping(page, 'shop_items', 'left', 3, '');
      },
      swipeRight:function(event, direction, distance, duration, fingerCount) {
         var par = $("#nbaph_shop_items").parent().width();
         var est = parseInt($("#nbaph_shop_items").css('margin-left'));
         var page = Math.ceil(-(est / par));

         swiping(page, 'shop_items', 'right', 3, '');
      },
      //Default is 75px, set to 0 for demo so any distance triggers swipe
      threshold:0
   });

   $("#nbaph_article_writers").swipe({
      swipeLeft:function(event, direction, distance, duration, fingerCount) {
         var par = $("#nbaph_article_writers").parent().width();
         var est = parseInt($("#nbaph_article_writers").css('margin-left'));
         var page = Math.ceil(-(est / par)) + 2;

         swiping(page, 'article_writers', 'left', 3, '');
      },
      swipeRight:function(event, direction, distance, duration, fingerCount) {
         var par = $("#nbaph_article_writers").parent().width();
         var est = parseInt($("#nbaph_article_writers").css('margin-left'));
         var page = Math.ceil(-(est / par));

         swiping(page, 'article_writers', 'right', 3, '');
      },
      //Default is 75px, set to 0 for demo so any distance triggers swipe
      threshold:0
   });

   $("#nbaph_article_writers_mobile").swipe({
      swipeLeft:function(event, direction, distance, duration, fingerCount) {
         var par = $("#nbaph_article_writers_mobile").parent().width();
         var est = parseInt($("#nbaph_article_writers_mobile").css('margin-left'));
         var page = Math.ceil(-(est / par)) + 2;

         swiping(page, 'article_writers', 'left', 3, '');
      },
      swipeRight:function(event, direction, distance, duration, fingerCount) {
         var par = $("#nbaph_article_writers_mobile").parent().width();
         var est = parseInt($("#nbaph_article_writers_mobile").css('margin-left'));
         var page = Math.ceil(-(est / par));

         swiping(page, 'article_writers', 'right', 3, '');
      },
      //Default is 75px, set to 0 for demo so any distance triggers swipe
      threshold:0
   });

   $("#nbaph_gallery_items").swipe({
      swipeLeft:function(event, direction, distance, duration, fingerCount) {
         var par = $("#nbaph_gallery_items").parent().width();
         var est = parseInt($("#nbaph_gallery_items").css('margin-left'));
         var page = Math.ceil(-(est / par)) + 2;

         swiping(page, 'gallery_items', 'left', 3, '');
      },
      swipeRight:function(event, direction, distance, duration, fingerCount) {
         var par = $("#nbaph_gallery_items").parent().width();
         var est = parseInt($("#nbaph_gallery_items").css('margin-left'));
         var page = Math.ceil(-(est / par));

         swiping(page, 'gallery_items', 'right', 3, '');
      },
      //Default is 75px, set to 0 for demo so any distance triggers swipe
      threshold:0
   });

   $("#nbaph_news_image").swipe({
      swipeLeft:function(event, direction, distance, duration, fingerCount) {
         var par = $("#nbaph_news_image").parent().width();
         var est = parseInt($("#nbaph_news_image").css('margin-left'));
         var page = Math.ceil(-(est / par)) + 2;

         swiping(page, 'news_image', 'left', 3, '');
      },
      swipeRight:function(event, direction, distance, duration, fingerCount) {
         var par = $("#nbaph_news_image").parent().width();
         var est = parseInt($("#nbaph_news_image").css('margin-left'));
         var page = Math.ceil(-(est / par));

         swiping(page, 'news_image', 'right', 3, '');
      },
      //Default is 75px, set to 0 for demo so any distance triggers swipe
      threshold:0
   });

   $(".nbaph_video_list").swipe({
      swipeLeft:function(event, direction, distance, duration, fingerCount) {
         $(".nbaph_video_list").each(function() {
            var par = $(this).parent().width();
            var est = parseInt($(this).css('margin-left'));
            var page = Math.floor(-(est / par)) + 2;

            var spl = ($(this).prop('id')).split("nbaph_");

            swiping_video(page, spl[1], 'left', 10);
         });
      },
      swipeRight:function(event, direction, distance, duration, fingerCount) {
         $(".nbaph_video_list").each(function() {
            var par = $(this).parent().width();
            var est = parseInt($(this).css('margin-left'));
            var page = Math.floor(-(est / par));

            var spl = ($(this).prop('id')).split("nbaph_");

            swiping_video(page, spl[1], 'right', 10);
         });
      },
      //Default is 75px, set to 0 for demo so any distance triggers swipe
      threshold:0
   });

   $("#nbaph_events_videos").swipe({
      swipeLeft:function(event, direction, distance, duration, fingerCount) {
         var par = $("#nbaph_events_videos").parent().width();
         var est = parseInt($("#nbaph_events_videos").css('margin-left'));
         var page = Math.ceil(-(est / par)) + 2;

         swiping(page, 'events_videos', 'left', 3, '');
      },
      swipeRight:function(event, direction, distance, duration, fingerCount) {
         var par = $("#nbaph_events_videos").parent().width();
         var est = parseInt($("#nbaph_events_videos").css('margin-left'));
         var page = Math.ceil(-(est / par));

         swiping(page, 'events_videos', 'right', 3, '');
      },
      //Default is 75px, set to 0 for demo so any distance triggers swipe
      threshold:0
   });

   $("#nbaph_events_photos").swipe({
      swipeLeft:function(event, direction, distance, duration, fingerCount) {
         var par = $("#nbaph_events_photos").parent().width();
         var est = parseInt($("#nbaph_events_photos").css('margin-left'));
         var page = Math.ceil(-(est / par)) + 2;

         swiping(page, 'events_photos', 'left', 3, '');
      },
      swipeRight:function(event, direction, distance, duration, fingerCount) {
         var par = $("#nbaph_events_photos").parent().width();
         var est = parseInt($("#nbaph_events_photos").css('margin-left'));
         var page = Math.ceil(-(est / par));

         swiping(page, 'events_photos', 'right', 3, '');
      },
      //Default is 75px, set to 0 for demo so any distance triggers swipe
      threshold:0
   });

   $("#nbaph_events_photos_mid").swipe({
      swipeLeft:function(event, direction, distance, duration, fingerCount) {
         var par = $("#nbaph_events_photos_mid").parent().width();
         var est = parseInt($("#nbaph_events_photos_mid").css('margin-left'));
         var page = Math.ceil(-(est / par)) + 2;

         swiping(page, 'events_photos', 'left', 3, '');
      },
      swipeRight:function(event, direction, distance, duration, fingerCount) {
         var par = $("#nbaph_events_photos_mid").parent().width();
         var est = parseInt($("#nbaph_events_photos_mid").css('margin-left'));
         var page = Math.ceil(-(est / par));

         swiping(page, 'events_photos', 'right', 3, '');
      },
      //Default is 75px, set to 0 for demo so any distance triggers swipe
      threshold:0
   });

   $("#nbaph_events_photos_mobile").swipe({
      swipeLeft:function(event, direction, distance, duration, fingerCount) {
         var par = $("#nbaph_events_photos_mobile").parent().width();
         var est = parseInt($("#nbaph_events_photos_mobile").css('margin-left'));
         var page = Math.ceil(-(est / par)) + 2;

         swiping(page, 'events_photos', 'left', 3, '');
      },
      swipeRight:function(event, direction, distance, duration, fingerCount) {
         var par = $("#nbaph_events_photos_mobile").parent().width();
         var est = parseInt($("#nbaph_events_photos_mobile").css('margin-left'));
         var page = Math.ceil(-(est / par));

         swiping(page, 'events_photos', 'right', 3, '');
      },
      //Default is 75px, set to 0 for demo so any distance triggers swipe
      threshold:0
   });
});

function swiping(page, targ, dir, max, alb) {
   if ((page <= max && dir == 'left') || (page >= 1 && dir == 'right')) {
      $(".nbaph_entry_page" + alb).each(function() {
         if ($(this).attr('targ') == targ) {
            if ($(this).attr('entry') == page) {
               $(this).attr('src', 'imagesph/article_page_active.png');
            }
            else {
               if (targ == 'headline_image') {
                  $(this).attr('src', 'imagesph/article_page_white.png');
               }
               else {
                  $(this).attr('src', 'imagesph/article_page_dormant.png');
               }
            }
         }
      });

      var inc = "-" + ((page - 1) * 100) + "%";

      $("#nbaph_" + targ).animate({marginLeft: inc});
      $("#nbaph_" + targ + "_mid").animate({marginLeft: inc});
      $("#nbaph_" + targ + "_mobile").animate({marginLeft: inc});
   }
}

function swiping_video(page, targ, dir, max) {
   if (page > 0 && ((page <= max && dir == 'left') || (page >= 1 && dir == 'right'))) {
      $(".nbaph_entry_page_video").each(function() {
         if ($(this).attr('entry') == page) {
            $(this).attr('src', 'imagesph/article_page_active.png');
         }
         else {
            $(this).attr('src', 'imagesph/article_page_dormant.png');
         }
      });

      var inc = "-" + ((page - 1) * 100) + "%";

      $("#nbaph_" + targ).animate({marginLeft: inc});
   }
}

$("#nbaph_scores_calendar_button").click(function() {
   if (calendar == 0) {
      $(this).css({backgroundPosition: "0 31px"});
   }
   else {
      $(this).css({backgroundPosition: "0 0"});
   }

   calendar = (calendar + 1) % 2;
});
-->
</script>

<script type="text/javascript">
    var _gaq = _gaq || [];
   _gaq.push(['_setAccount', 'UA-31591663-1']);
   _gaq.push(['_trackPageview']);

   (function() {
     var ga = document.createElement('script'); ga.type = 'text/javascript'; 
ga.async = true;
ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 
'stats.g.doubleclick.net/dc.js';
     var s = document.getElementsByTagName('script')[0]; 
s.parentNode.insertBefore(ga, s);
   })();
</script>

<!-- BEGIN: SiteCatalyst code version: H.20.3. -->

<!-- END: SiteCatalyst code version: H.20.3. -->


<!-- BEGIN: Override Section -->
<script language="JavaScript" type="text/javascript">
  nbaOmCurrentLeague='nba';
  nbaOmAccountIds='nbag-i-philippines,nbag-i-international';
</script>
<!-- END: Override Section -->


<script id="_nbaJsGlobalSettings" 
src="http://www.nba.com/javascriptGlobalSettings.js.html" type="text/javascript"></script>
<!-- BEGIN: NBA analytics package snippet. -->
<!-- Should be as close the the closing "body" tag as possible. -->
<script id="_nbaScoutAnalytics" 
src="http://z.cdn.turner.com/nba/tmpl_asset/static/nba-cms3-base/latest/js/pkgAnalyticsScout-min.js" type="text/javascript"></script>
<!-- END: NBA analytics package snippet. -->