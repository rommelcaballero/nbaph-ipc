<?php
/*
if(!isset($_SESSION)){
	session_start();
}*/
 
//$path = dirname("http://ph.nba.com/"); // for live

$path = dirname($_SERVER['PHP_SELF']);

$position = strrpos($path,'/') + 1;
$root_folder = substr($path,$position);
 
 
$server_uri = $_SERVER['REQUEST_URI']; 
 
if (!isset($_SERVER['REQUEST_URI']))
{
       $_SERVER['REQUEST_URI'] = substr($_SERVER['PHP_SELF'],1 );
	    
       if (isset($_SERVER['QUERY_STRING'])) { $_SERVER['REQUEST_URI'].='?'.$_SERVER['QUERY_STRING']; }
} 

 
$navString = strtolower(trim($_SERVER['REQUEST_URI'])); // Returns "/Mod_rewrite/edit/1/"
 
 
if($root_folder != "")
 {
	$myvar = trim(end(explode($root_folder,$navString)));  
 }
else
 {
	$myvar = trim($navString);   
 }
 
  
$myvar = trim($myvar,"/");
  
$parts = explode('/', $myvar); // Break into an array

 
/*echo "parts  : ".$part[-1]."<br>";
echo "count : ". count($parts); 

for($i=0; $i<count($parts); $i++)
{
	echo "part ".$i. " - ".$parts[$i];
}

echo "<br> parts 0".$parts[0];*/

/* Lets look at the array of items we have:*/


if($parts[0] == "nba-writers")
 {
  
	 $parts[0] = "writers";
 	
 }

elseif($parts[0] == "writers-content")
 {
     
	 $parts[0] = "writers_full";
   
 }
 
elseif($parts[0] == "news-article")
 {    
	 if(count($parts)>1)
	  {
		$parts[0] = "news_article";  
	  }
	 else
	  {
		 $parts[0] = "news"; 
	  }
   
 }
 
elseif($parts[0] == "news-archives")
 {
     
	 $parts[0] = "news_archives";  
	  
   
 }
 
elseif($parts[0] == "bloggers")
 {
     
	 $parts[0] = "bloggers";  
    
 } 

elseif($parts[0] == "off-court-news")
 {
     
	 $parts[0] = "offcourt_news";  
    
 } 

elseif($parts[0] == "pinoy-beat-writer")
 {
     
	 $parts[0] = "pinoy_beat";  
    
 } 

elseif($parts[0] == "photo-gallery")
 {
     
	 $parts[0] = "photo_gallery";  
    
 }
 
elseif($parts[0] == "local-events")
 {
     
	 $parts[0] = "local-events";  
    
 }

elseif($parts[0] == "events-videos")
 {
     
	 $parts[0] = "events-videos";  
    
 }

elseif($parts[0] == "events-photos")
 {
     
	 $parts[0] = "events-photos";  
    
 }
 
elseif($parts[0] == "cheerdancers")
 {
     
	 $parts[0] = "cheer-v2";  
    
 } 
 
elseif($parts[0] == "cheerdancers-photos")
 {
     
	 $parts[0] = "cheer_photos";  
    
 }  

elseif($parts[0] == "cheerdancers-videos")
 {
     
	 $parts[0] = "cheer_videos";  
    
 }
 
elseif($parts[0] == "cheerdancers-columns")
 {
     
	 $parts[0] = "cheer_columns";  
    
 } 

elseif($parts[0] == "nba-features")
 {
     
	 $parts[0] = "nba-features";  
    
 }

elseif($parts[0] == "starting-five")
 {
     
	 $parts[0] = "startingfive";  
    
 }
 
elseif($parts[0] == "vote")
{
     
	 $parts[0] = "vote";  
    
} 
elseif($parts[0]=='jr-nba'){

}
/*elseif($parts[0]=='live-stream-v2'){

}*/
elseif($parts[0]=='videos'){
	$parts[0] = 'videos';
}elseif($parts[0] == "link-forwarder"){
	$link_action = trim($parts[1]);
	switch($link_action){
		case "preroll":
			$preroll_id = $parts[2];			
			break;
		default:
			break;
	}
	$parts[0] ='forwarder';	
}

elseif($parts[0] == 'around-the-nba'){

	if(isset($parts[1]) && trim($parts[1]) != ""){
		$search_title = utf8_decode(urldecode(trim($parts[1])));
	}	
}
elseif($parts[0] == 'conference'){}
elseif($parts[0] == 'finals'){}
elseif($parts[0] == 'look-a-like'){}
elseif($parts[0] == 'draftboard-2013'){}
elseif($parts[0] == 'tuesdayggp'){}
elseif($parts[0] == 'nbaglobalgamesphilippines2013'){}
elseif($parts[0] == 'news-article-disqus'){}
elseif($parts[0] == 'allstar2014'){
	if(isset($parts[1]) && trim($parts[1]) != ""){
		$search_allstar_id = trim($parts[1]);
		include("allstar2014-read.php"); 
	}else{
		include("allstar2014.php"); 
	}
}
else{	 
	 $parts[0] = "index"; 	 
}
 

if(($parts[0]!="writers_full") && ($parts[0]!="news-article-disqus") && ($parts[0]!="news_article") && ($parts[0]!="news_archives") && ($parts[0]!="bloggers") && ($parts[0]!="offcourt_news") && ($parts[0]!="photo_gallery") && ($parts[0]!="local-events") && ($parts[0]!="events-photos") && ($parts[0]!="cheer_photos") &&  ($parts[0]!="cheer_videos") && ($parts[0]!="cheer_columns")  && ($parts[0]!="nba-features") && ($parts[0]!="admin") && (file_exists($parts[0].".php"))) { 	
 	include($parts[0] . ".php");	
}
elseif($parts[0] == "allstar2014"){	
	
}
elseif($parts[0] == "news-article-disqus"){
	if(trim($parts[1])){
		$newsid = trim(@$parts[1]);
		include "news_article_disqus.php";
	}else{
		include("news.php"); 
	}
	
}
elseif($parts[0] == "nbaglobalgamesphilippines2013"){
	if(isset($parts[1]) && trim($parts[1]) != ""){
		$article_title = urldecode($parts[1]);

		if($article_title == "videos" && (isset($parts[2]) && trim($parts[2] != ""))) {
			$gg_video_title = urldecode($parts[2]);
		}else{
			$gg_video_title = "index";
		}
		
		
		include "globalgames2013-article.php";
	}else{
		include "globalgames2013.php";
	}
}
elseif($parts[0] == 'tuesdayggp'){
	include "sm.php";
}
elseif($parts[0] == 'draftboard-2013'){	
	include "draft13.php";
}
elseif($parts[0] == 'conference'){
	include "conference.php";
}
elseif($parts[0] == 'finals'){
	include "finals.php";
}
elseif($parts[0] == "look-a-like"){
	include "look-a-like.php";
}
elseif($parts[0] == "writers_full") {
   
	if(trim(@$parts[1]))
	 {
		if(is_numeric($parts[1]))
		 {
			$sblog_id = $parts[1];
		 }
		else
		 {
			$blogger = urldecode(trim($parts[1])); 
		 }
		 
		include("writers_full.php"); 
	 }
	else
	 {
		include("writers.php"); 
	 }
 	
}

elseif($parts[0] == "news_article") {
   
	if(trim($parts[1]))
	 {
		 $newsid = trim($parts[1]);
		 include("news_article.php"); 
	 }
	else
	 {
		include("news.php"); 
	 }
 		
}

elseif($parts[0] == "news_archives") {
   
	if (@trim($parts[1])) {
  	   $start_date = explode("-", $parts[1]);
	}
	else {
	   $start_date = array(@date("Y"), @date("m"), @date("d") - @date("w"));
	}
 	
	 
	include("archives.php"); 
	
}
elseif($parts[0] == "bloggers") {
   
	if(trim(@$parts[1]))
	 {
		if(is_numeric($parts[1]))
		 {
			$sblog_id = $parts[1];
		 }
		else
		 {
			$blogger = urldecode(trim($parts[1])); 
		 }
		 
		include("blogs_full.php"); 
	 }
	else
	 {
		include("blogs.php"); 
	 }
 	
}elseif($parts[0] == "offcourt_news") {
   
	if((trim(@$parts[1])) && (is_numeric(@$parts[1])))
	 {
		
		 $off_id = trim($parts[1]);
		 
	 }
	 
	 include("offcourt_news.php");
 	
}elseif($parts[0] == "pinoy_beat") {
   
	if((trim($parts[1])) && (is_numeric($parts[1])))
	 {
		 
		 $pinoybeat_id = trim($parts[1]);
		 
	 }
	 
	 include("pinoy_beat.php");
 	
}

elseif($parts[0] == "photo_gallery") {
   
	if((trim(@$parts[1])) && (is_numeric(@$parts[1])))
	 {
		 
		 $gallery_id = trim($parts[1]); 
		 
	 }
	 
	 include("photos.php");
 	
}


elseif($parts[0] == "local-events") {
   
	if((trim(@$parts[1])) && (is_numeric(@$parts[1])))
	 {
		 $event_id = trim($parts[1]); 
		 include("events_article.php");
	 }
	else
	 {
	 	include("events.php");
	 }
	 
}


elseif($parts[0] == "events-videos") {
   
	if((trim($parts[1])) && (is_numeric($parts[1])))
	 {
		 $video_id = trim($parts[1]); 
		
	 }
	 
	 include("events_videos.php");
	 
}


elseif($parts[0] == "events-photos") {
   
	if((trim($parts[1])) && (is_numeric($parts[1])))
	 {
		 $album_id = trim($parts[1]); 
		
	 }
	 
	 if((trim($parts[2])) && (is_numeric($parts[2])))
	 {
		 $photo_id = trim($parts[2]); 
		
	 }
	 
	 include("events_photos.php");
	 
}

 
elseif($parts[0] == "cheer_photos") {
  	 
	if(isset($parts[1]) && (trim($parts[1])) && (is_numeric($parts[1])))
	 {
		 $album_id = trim($parts[1]); 
		
	 }
 
	 include("cheer_photos.php");
	 
}


elseif($parts[0] == "cheer_videos") {
   
	if((trim($parts[1])) && (is_numeric($parts[1])))
	 {
		 $video_id = trim($parts[1]); 
		
	 }
 
	 include("cheer_videos.php");
	 
}



elseif($parts[0] == "cheer_columns") {
   
	if((trim($parts[1])) && (is_numeric($parts[1])))
	 {
		 $sblog_id = trim($parts[1]); 
		
	 }
	 
	 if(trim(isset($parts[3])?$parts[3]:""))
	 {
		 $blogger = trim(urldecode($parts[3])); 
		
	 }
	 
	 include("cheer_columns.php");
	 
}


elseif($parts[0] == "nba-features") {
   
	if(isset($parts[1]) && (trim($parts[1])) && (is_numeric($parts[1])))
	 {
		 $current_page = trim($parts[1]); 
		
	 }
	else
	 {
		$current_page = 0;  
	 }
 
	 include("features.php");
	 
}
elseif($parts[0]=='jr-nba'){	
	include ("jr-nba.php");
}
/*elseif($parts[0] == "live-stream-v2"){
	
 	include("live-stream-v2.php");
}*/
elseif($parts[0] == "videos"){
	include("videos.php");	
}
elseif($parts[0]=="ajax-videos"){
	include("ajax-videos.php");
}
else {

   include('index.php');

}


?>
