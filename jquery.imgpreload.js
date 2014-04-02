
if('undefined'!=typeof jQuery)
{(function($){$.imgpreload=function(imgs,settings)
{settings=$.extend({},$.fn.imgpreload.defaults,(settings instanceof Function)?{all:settings}:settings);if('string'==typeof imgs){imgs=[imgs];}
var loaded=[];var t=imgs.length;for(var i=0;i<t;i++)
{var img=new Image();$(img).bind('load error',function(e)
{loaded.push(this);$.data(this,'loaded',('error'==e.type)?false:true);if(settings.each instanceof Function){settings.each.call(this);}
if(loaded.length>=t&&settings.all instanceof Function){settings.all.call(loaded);}});img.src=imgs[i];}};$.fn.imgpreload=function(settings)
{var urls=[];this.each(function()
{urls.push($(this).attr('src'));});$.imgpreload(urls,settings);return this;};$.fn.imgpreload.defaults={each:null,all:null};})(jQuery);}