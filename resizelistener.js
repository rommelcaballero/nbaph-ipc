var IframeResizeListener = {
  topic : 'resize',
  iframeId : '',
  iframePath : '',  
  allowedDomains : '',
  debug : false,

  /*
  *@param domains - an array of allowed domain strings (must be the full domain) eg ["en.global.nba.com","www.nba.com"]
  */

  listen :  function() {
    //bind current values with closure

    var topic = IframeResizeListener.topic;
    var id = IframeResizeListener.iframeId;
    var path = IframeResizeListener.iframePath;
    var domains = IframeResizeListener.allowedDomains;

    /*Adjust scoreboard iframe using the dimensions specified in  given event object*/

    function resizeElements(event){
      if(IframeResizeListener.debug) {console.log("IframeResizeListener::resize message received"); }

      var windowOrigin = window.location.protocol + "//" + window.location.host;
      var eventDomain = event.origin.replace(/.*?:\/\//g, "");
      var authorized = false;

      for (var i = 0; i < domains.length; ++i) {
          if(domains[i] == eventDomain){
            authorized = true;
            break;
          }
      }

      if (!authorized){  //if not from authorized domain
        if(IframeResizeListener.debug) { console.log("IframeResizeListener::resize message refused, did not originate from an authorized domain. ["+ eventDomain + "]");  }
        return;
      } 

      //console.log(event.data);

      var eventData = JSON.parse(event.data); //JSON does not exist in IE < 8 or IE quirks mode (set DOCTYPE to force to standards mode)

      if(eventData.command == topic ){ //filter for the 'resize' command
        if(eventData.path == path){  //only ajust for uri that we are interested in;
          if(IframeResizeListener.debug) { console.log("IframeResizeListener::adjusting ["+eventData.path+"] element with id [" + id  + "]");  }

          var e = document.getElementById(id);
          e.height= eventData.height + 'px';
        }else{
          if(IframeResizeListener.debug) { console.log("IframeResizeListener::path not configured ["+eventData.path+"]");  }
        }
      }
    }

    /*browser agnostic event attacher*/

    function addEvent( obj, type, fn ) {
      if ( obj.attachEvent ) {
        obj['e'+type+fn] = fn;
        obj[type+fn] = function(){obj['e'+type+fn]( window.event );}
        obj.attachEvent( 'on'+type, obj[type+fn] );
      } else
        obj.addEventListener( type, fn, false );
    }

    /*attach message event*/

    addEvent(window,"message",resizeElements);
  }
}
