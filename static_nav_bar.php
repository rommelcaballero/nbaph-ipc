  <!-- Static navbar -->
  
  <div class="hidden-sm" id="global-nav">
    <div id="edition_wrapper">
      <div id="edition" class="edition_open">
        <form name="editionForm">
          <div class="rule"></div>
          <span class="choose-edition">Please select your default edition</span>
          <span class="controls"><input type="radio" name="edition" value="ph"> ph.nba.com
            <input type="radio" name="edition" value="us" onclick="set_HP_default('us');">US
          </span>
        </form>
      </div>
      <div id="edition_message" class="edition_closed">
        <span class="edition-message">Your default site has been set for 7 days</span>
      </div>
    </div> 
    <div class="container">
      <button type="button" class="navbar-toggle">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <div>
        <div class="nav-collapse collapse global-nav-collapse">
          <ul id="global-nav-1" class="nav navbar-nav">
            <li><a href="javascript:handle_redirect();">NBA.COM</a></li>
            <li class="dropdown">
              <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">Teams</a>
              <ul class="dropdown-menu">
                <li><a target="_blank" href="http://www.nba.com/hawks/">Atlanta</a></li>
                <li><a target="_blank" href="http://www.nba.com/celtics/">Boston</a></li>
                <li><a target="_blank" href="http://www.nba.com/nets/">Brooklyn</a></li>
                <li><a target="_blank" href="http://www.nba.com/bobcats/">Charlotte</a></li>
                <li><a target="_blank" href="http://www.nba.com/bulls/">Chicago</a></li>
                <li><a target="_blank" href="http://www.nba.com/cavaliers/">Cleveland</a></li>
                <li><a target="_blank" href="http://www.nba.com/mavericks/">Dallas</a></li>
                <li><a target="_blank" href="http://www.nba.com/nuggets/">Denver</a></li>
                <li><a target="_blank" href="http://www.nba.com/pistons/">Detroit</a></li>
                <li><a target="_blank" href="http://www.nba.com/warriors/">Golden State</a></li>
                <li><a target="_blank" href="http://www.nba.com/rockets/">Houston</a></li>
                <li><a target="_blank" href="http://www.nba.com/pacers/">Indiana</a></li>
                <li><a target="_blank" href="http://www.nba.com/clippers/">LA Clippers</a></li>
                <li><a target="_blank" href="http://www.nba.com/lakers/">LA Lakers</a></li>
                <li><a target="_blank" href="http://www.nba.com/grizzlies/">Memphis</a></li>
                <li><a target="_blank" href="http://www.nba.com/heat/">Miami</a></li>   
                <li><a target="_blank" href="http://www.nba.com/bucks/">Milwaukee</a></li>
                <li><a target="_blank" href="http://www.nba.com/timberwolves/">Minnesota</a></li>
                <li><a target="_blank" href="http://www.nba.com/hornets/">New Orleans</a></li>
                <li><a target="_blank" href="http://www.nba.com/knicks/">New York</a></li>
                <li><a target="_blank" href="http://www.nba.com/thunder/">Oklahoma City</a></li>
                <li><a target="_blank" href="http://www.nba.com/magic/">Orlando</a></li>
                <li><a target="_blank" href="http://www.nba.com/sixers/">Philadelphia</a></li>
                <li><a target="_blank" href="http://www.nba.com/suns/">Phoenix</a></li>
                <li><a target="_blank" href="http://www.nba.com/blazers/">Portland</a></li>
                <li><a target="_blank" href="http://www.nba.com/kings/">Sacramento</a></li>
                <li><a target="_blank" href="http://www.nba.com/spurs/">San Antonio</a></li>
                <li><a target="_blank" href="http://www.nba.com/raptors/">Toronto</a></li>
                <li><a target="_blank" href="http://www.nba.com/jazz/">Utah</a></li>
                <li><a target="_blank" href="http://www.nba.com/wizards/">Washington</a></li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">Global</a>
              <ul class="dropdown-menu">
                <li><a target="_blank" href="http://www.supersport.com/basketball/nba">Africa</a></li>
                <li><a target="_blank" href="http://www.ole.com.ar/nba">Argentina</a></li>
                <li><a target="_blank" href="http://www.sportal.com.au/nba">Australia</a></li>
                <li><a target="_blank" href="http://www.nba.com/brasil">Brasil</a></li>
                <li><a target="_blank" href="http://www.nba.com/canada">Canada</a></li>
                <li><a target="_blank" href="http://china.nba.com">??</a></li>
                <li><a target="_blank" href="http://baloncesto.as.com/baloncesto/nba.html">España</a></li>
                <li><a target="_blank" href="http://www.nba.com/enebea/">éne-bé-a</a></li>
                <li><a target="_blank" href="http://www.nba.com/france">France</a></li>
                <li><a target="_blank" href="http://www.spox.com/de/sport/ussport/nba/index.html">Deutschland</a></li>
                <li><a target="_blank" href="http://nba.sport24.gr/?ls=greecenbacom">Greece</a></li>
                <li><a target="_blank" href="http://www.nba.co.jp/">??</a></li>
                <li><a target="_blank" href="http://www.gazzetta.it/Nba/">Italia</a></li>
                <li><a target="_blank" href="http://www.nba.com/india">India</a></li>
                <li><a target="_blank" href="http://nba.clarosports.com/nba/inicio/">Mexico</a></li>
                <li><a target="_blank" href="http://www.sportal.co.nz/nba">New Zealand</a></li>
                <li><a target="_blank" href="http://ph.nba.com/">Philippines</a></li>
                <li><a target="_blank" href="http://www.nba.com/brasil/ "> Portuguese</a></li>
                <li><a target="_blank" href="http://www.ajansspor.com/nba/">Turkey</a></li>       
              </ul>
            </li>
            <li><a href="javascript:handle_edition();">Set Default Edition</a></li>    
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
  </div>