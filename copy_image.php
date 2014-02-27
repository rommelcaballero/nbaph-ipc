<?php

include("sql.php");
include_once 'class.get.image.php';


function createDirectory($directory){ 

	//CREATING DIRECTORIES...
	 $directories = split('/', trim($directory,'/'));
	 if(count($directories) > 0)
	  {
		 for($i=0; $i<count($directories); $i++)
		  {
			  
			  $created_dir = $cache;
			  
			  for($z=0; $z<=$i; $z++)
			   {
				   if($directories[$z] != "")
					{
						$created_dir = $created_dir."/".$directories[$z];
						//echo $created_dir; 
						if(($created_dir!="") && (!is_dir($created_dir)))
						   {
							   mkdir($created_dir, 0777);
								//chmod($created_dir, 0777);
						   }
			   
					}
			   }
			
			  
			   
		  }
		  
	  }

}



function downloadImage($filename, $folder, $file) {
	
	 if(!file_exists($file))
	  {
		  
		// initialize the class
		$image = new GetImage;
		
		// just an image URL
		$image->source = $filename;
		$image->save_to = $folder; // with trailing slash at the end
		
		$get = $image->download('curl'); // using GD
	  
	  }
		 

}//end function


 
 
 
 
 
 


$query = "SELECT Thumbnail FROM videos WHERE Section='Highlights' ";
$results = mysql_query($query) or die(mysql_error());
$found_results = mysql_num_rows($results);


 echo $found_results."<br>"; 
while($copy = mysql_fetch_object($results)) {
	
	set_time_limit(0);
	
	$newimage = str_replace("http://i2.cdn.turner.com/","",$copy->Thumbnail); 
	$path_parts = pathinfo($newimage);
	
	$filename = $copy->Thumbnail;
	$folder = "images/carousel/".$path_parts['dirname']."/";
	$file = $folder.$path_parts['basename'];
	 
	if(!is_dir($folder))
	 {
		mkdir($folder, 0777, true); 
	 }
	
	downloadImage($filename, $folder, $file);	
	echo "downloading -- ".$filename ."<br>"; 
	
} 






?>