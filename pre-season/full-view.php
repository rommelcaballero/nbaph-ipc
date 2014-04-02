<style>
	.live-stream{
		width: 800px;		
		min-height:200px;
		margin:0 auto;
	}
	.live-stream .stream-container{
		margin: 0 auto;
		width: 600px;
	}
	.tweet{		
		width: 800px;
		min-height:100px;
		margin:0 auto;
	}
	.tweet .tweet-container{
		margin: 0 auto;
		width: 520px;	
	}
	.logo-cover{
		position: absolute;
		z-index: 2;
		background: url(media/2.0/nba_hover_logo.jpg);
		width: 100px;
		height: 25px;
		right:0px;

	}
</style>
<div>
	<?php if($channel == "live"): ?>	
	<div class='live-stream'>		
		<div class='stream-container'>
			<div class='logo-cover'></div>
			<script type="text/javascript">fid="nbalivestreamsample";v_width="600";v_height="450";</script><script type="text/javascript" src="http://veemi.com/javascript/embedPlayer.js"></script>	
		</div>
	</div>
	<div style='height: 10px'></div>
	<div class='tweet'>
		<div class='tweet-container'>
			<a class="twitter-timeline"  href="https://twitter.com/search?q=%40NBA_Philippines%2BOR%2BNBAGlobalGames%2BOR%2B%40Pacers%2BOR%2B%40HoustonRockets"  data-widget-id="382793238425268224">Tweets about "@NBA_Philippines+OR+NBAGlobalGames+OR+@Pacers+OR+@HoustonRockets"</a>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		</div>
	</div>
	<?php else: ?>

	<?php endif; ?>

</div>