   <div id="fb-root"></div>
   <script>
      //https://developers.facebook.com/docs/guides/web/
     //window.fbAsyncInit = function() {
     function init_fb() {
       FB.init({
         appId      : '131694290309870', // App ID
         channelUrl : 'http://116.93.102.156/channel.php', // Channel File
         status     : true, // check login status
         cookie     : true, // enable cookies to allow the server to access the session
         xfbml      : true  // parse XFBML
       });
        FB.Event.subscribe('auth.login', function(response) {
          window.location.reload();
        });
     }
<?php
if ($_SESSION['fb'] || true) {
?>
     window.fbAsyncInit = function() {
       FB.init({
         appId      : '131694290309870', // App ID
         channelUrl : 'http://116.93.102.156/channel.php', // Channel File
         status     : true, // check login status
         cookie     : true, // enable cookies to allow the server to access the session
         xfbml      : true  // parse XFBML
       });
     };
<?php
}
?>
     function fb_out() {
         FB.logout(function(response) {
            window.location.reload();
         });
     }
     // Load the SDK Asynchronously
     (function(d, s, id){
        /*var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement('script'); js.id = id; js.async = true;
        js.src = "//connect.facebook.net/en_US/all.js";
        ref.parentNode.insertBefore(js, ref);*/
//alert(d + ", " + s + ", " + id);
        var js, fjs = d.getElementsByTagName("script")[0];
        if (d.getElementById("facebook-jssdk")) return;
        js = d.createElement("script"); js.id = "facebook-jssdk";
        //var js, fjs = d.getElementsByTagName(s)[0];
        //if (d.getElementById(id)) return;
        //js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=131694290309870";
        fjs.parentNode.insertBefore(js, fjs);
      }(document));
   </script>

   <div id="overlay">
      <div id="popup_spacer"></div>
      <table id="popup_table">
         <tr>
            <td style="padding: 20px 0">
               <div id="popup">
                  <div id="popup_header"></div>

                  <div id="popup_body">
                     <div id="popup_body_content"></div>
                  </div>
               </div>
            </td>
         </tr>
      </table>
   </div>