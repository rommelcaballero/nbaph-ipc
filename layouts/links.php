      <div style="height: 10px"></div>

      <div style="width: 100%;">
         <?php if(($part_page != "index") && ($part_page != 'global_games2013')): ?>
         <div style="width: 98%; margin: 0 auto; padding:20px;">
            <table id="links_table">
               <tr>
                  <td class="links_heading">
                     OTHER FEATURES
                  </td>
                  <td class="links_heading">
                     NBA
                  </td>
                  <td class="links_heading">
                     EVENTS
                  </td>
                  <td class="links_heading">
                     NBA 101
                  </td>
                  <td class="links_heading">
                     ALL-ACCESS
                  </td>
                  <td class="links_heading">
                     24/7
                  </td>
               </tr>
               <tr>
                  <td>
                     <a href="http://www.nba.com/mvp-ladder/" target='_blank'>Race to the MVP Ladder</a>
                     <a href="http://www.nba.com/top-plays-ladder/" target='_blank'>Top Plays Ladder</a>
                     <a href="http://www.nba.com/dunk-ladder/" target='_blank'>Dunk Ladder</a>
                     <a href="http://www.nba.com/rookies/" target='_blank'>Rookie Ladder</a>
                  </td>
                  <td>
                     <a href="mailto:dinomaragay@philstar.com">Contact Editorial</a>
                     <a href="mailto:dangdomingo@philstar.com">Advertise on NBA.com</a>
                     <a href="mailto:dangdomingo@philstar.com">Contact Us</a>
                     <a href="http://www.nbpa.org/" target='_blank'>NBPA</a>
                     <a href="http://www.nba.com/nba_cares/" target='_blank'>NBA Cares</a>
                     <a href="http://www.nba.com/green" target='_blank'>NBA Green</a>
                     <a href="http://www.nba.com/nbafit/" target='_blank'>NBA FIT</a>
                     <a href="http://www.ihoops.com/" target='_blank'>iHoops</a>
                     <a href="http://www.usabasketball.com/" target='_blank'>USA Basketball</a>
                     <a href="http://www.nba.com/nbacity/" target='_blank'>NBA City Restaurant</a>
                     <a href="http://www.nba.com/videogames/nbalive10_overview.html" target='_blank'>NBA Video Games</a>
                     <a href="http://www.nba.com/nycstore/" target='_blank'>NYC Store</a>
                  </td>
                  <td>
                     <a href="http://www.nba.com/allstar/2012/" target='_blank'>2012 All-Star</a>
                     <a href="http://www.nba.com/draft/" target='_blank'>2012 Draft</a>
                     <a href="http://www.nba.com/news/key-dates/index.html" target='_blank'>Important Dates</a>
                     <a href="http://www.nba.com/halloffame" target='_blank'>2011 Hall of Fame Induction</a>
                     <a href="http://www.nba.com/nbanation/" target='_blank'>NBA Nation</a>
                     <a href="http://www.nba.com/jamvan/" target='_blank'>NBA Jam Van</a>
                     <a href="http://www.nba.com/jamsession/" target='_blank'>Jam Session</a>
                     <a href="http://www.nba.com/bwb/" target='_blank'>Basketball Without Borders</a>
                  </td>
                  <td>
                     <a href="http://www.nba.com/official" target='_blank'>NBA Official</a>
                     <a href="http://www.nba.com/about/game.html" target='_blank'>About the NBA</a>
                     <a href="http://www.nba.com/history" target='_blank'>History</a>
                     <a href="http://www.nba.com/nba101" target='_blank'>Rules of the Game</a>
                     <a href="http://www.nba.com/videorulebook" target='_blank'>Video Rulebook</a>
                     <a href="http://hoopedia.nba.com/index.php/Main_Page" target='_blank'>Hoopedia: Basketball Wiki</a>
                     <a href="http://www.nba.com/roundball/" target='_blank'>Red on Roundball</a>
                     <a href="http://www.nba.com/news/transactions/nba.guide/index.html" target='_blank'>NBA Guide</a>
                     <a href="http://www.nba.com/news/transactions/nba.register/index.html" target='_blank'>NBA Register</a>
                  </td>
                  <td>
                     <a href="http://www.nba.com/allaccess" target='_blank'>Member Center</a>
                     <!--<a href="http://www.nba.com/leaguepass/index.html">NBA LEAGUE PASS</a>-->
                     <a href="http://www.nba.com/nbatv/" target='_blank'>NBA.TV</a>
                     <a href="http://www.nba.com/allaccess/watchListen.html" target='_blank'>Audio LEAGUE PASS</a>
                     <a href="http://www.nba.com/fantasy" target='_blank'>Fantasy Games</a>
                     <a href="http://www.nba.com/games" target='_blank'>Online Games</a>
                     <a href="http://my.nba.com/" target='_blank'>Fan Voice</a>
                     <a href="http://www.nba.com/allaccess/shop.html" target='_blank'>NBA Deals and Discounts</a>
                     <a href="http://www.nba.com/allaccess/newsletters.html" target='_blank'>Newsletters</a>
                     <a href="http://www.nba.com/hoop/hoop_archives_2009_08_28.html" target='_blank'>HOOP Magazine</a>
                  </td>
                  <td>
                     <a href="http://www.nba.com/nbatv/" target='_blank'>NBA.TV</a>
                     <a href="http://www.nba.com/rss" target='_blank'>RSS Feeds</a>
                  </td>
               </tr>
            </table>
         </div>
         <?php endif; ?>
         <div style="height: 10px"></div>
         <?php if(isset($footer_ads) && trim($footer_ads !="")): ?>
            <div style="width: 958px; height: 90px; text-align: center; margin: 0 auto;  ">
   			   <?php
      			/*$results = mysql_query("SELECT Content FROM ads_list WHERE AdsDesc='nba_homepage_bottom_leaderboard' AND Status='s' LIMIT 0,1 ");
      			$row = mysql_fetch_array($results);
      			echo $row['Content'];*/
      			
                  echo @$footer_ads;
               //include('layouts/leaderboard_bottom.php');
      			?>
            </div>
         <?php endif; ?>

         <div style="height: 10px"></div>
      </div>
