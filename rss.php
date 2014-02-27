<?php
$read = "http://www.facebook.com/feeds/page.php?format=rss20&id=394193573945381";
/*$rss = simplexml_load_file($read);
echo "reading from: $read - " . $rss;

if($rss) {
   echo '<h1>'.$rss->channel->title.'</h1>';
   echo '<li>'.$rss->channel->pubDate.'</li>';
   $items = $rss->channel->item;
   foreach($items as $item) {
      $title = $item->title;
      $link = $item->link;
      $published_on = $item->pubDate;
      $description = $item->description;
      echo '<h3><a href="'.$link.'">'.$title.'</a></h3>';
      echo '<span>('.$published_on.')</span>';
      echo '<p>'.$description.'</p>';
   }
}*/
require_once('php/autoloader.php');

$feed = new SimplePie();
 
// Set which feed to process.
$feed->set_feed_url($read);
 
// Run SimplePie.
$feed->init();
 
// This makes sure that the content is sent to the browser as text/html and the UTF-8 character set (since we didn't change it).
$feed->handle_content_type();

?> 
<!--div class="header">
		<h1><a href="<?php /*echo $feed->get_permalink();*/ ?>"><?php /*echo $feed->get_title();*/ ?></a></h1>
		<p><?php /*echo $feed->get_description();*/ ?></p>
	</div-->
 
	<?php
	/*
	Here, we'll loop through all of the items in the feed, and $item represents the current item in the loop.
	*/
   $count = 0;
	foreach ($feed->get_items() as $item):
	?>
 		<div style="font-family: arial, helvetica; font-size: 8pt; color: #626262; line-height: 1.2em">
			<!--h2><a href="<?php echo $item->get_permalink(); ?>"><?php echo $item->get_title(); ?></a></h2-->
			<div><b><a href="http://www.facebook.com/profile.php?id=394193573945381" style="color: #3B5998">NBA Philippines</a></b> <?php echo str_replace("<img", '<img style="width:130px;height:auto"', $item->get_description()); ?></div>
         <div>
            <small>Posted on <?php echo $item->get_date('j F Y | g:i a'); ?></small>
         </div>
		</div>
 
	<?php
      $count += 1;

      if ($count == 4)
         break;
   endforeach;
   ?>