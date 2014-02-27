<?php

// The file
$filename = $_GET['file'];

$width = $_GET['w'];
$height = $_GET['h'];
$mode = $_GET['mode'];
//$mode = "";
	
	

//for caching..
$newimage = $filename;
$dimention = $width."x".$height."_";
$path_parts = pathinfo($newimage);
$cache_imgfile = "scache/".$path_parts['dirname']."/".$dimention.$path_parts['basename'];

if(file_exists($cache_imgfile))
 {
 	
	$newimage = $cache_imgfile; 	
 	
	/*header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($newimage));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma: public');
    header('Content-Length: ' . filesize($newimage));
    ob_clean();
    flush();*/
	
	header('Content-type: image/jpeg');
    readfile($newimage);
 
	
    exit;
	 
 }
else
 {

	if (!$mode) { $mode = 'crop'; } else { $mode = 'fit'; }  
	
	
	$output = explode(".", $filename);
	
	
	
	
		
	header('Content-type: image/jpeg');
	
	list($width_orig, $height_orig) = getimagesize($filename);
	
	$ratio_orig = $width_orig/$height_orig;
	
	if ($width/$height < $ratio_orig) {
	   $width_aspect = $height*$ratio_orig;
	   $height_aspect = $height;
	} else {
	   $height_aspect = $width/$ratio_orig;
	   $width_aspect = $width;
	}
	
	$cropStartX = 0;
	$cropStartY = 0;
	
	
	$image = @ImageCreateFromJPEG ($filename) or // Read JPEG Image	
	$image = @ImageCreateFromPNG ($filename) or // or PNG Image	
	$image = @ImageCreateFromGIF ($filename) or // or GIF Image	
	$image = false; // If image is not JPEG, PNG, or GIF 	
	
	
	if (!$image) {		// We get errors from PHP's ImageCreate functions...		
	// So let's echo back the contents of the actual image.		
	readfile ($filename);	
	
	} else {
	
	
	if ($mode == 'crop') {
		$image_p = imagecreatetruecolor($width, $height);
		
	}
	
	if ($mode == 'fit') {
		$image_p = imagecreatetruecolor($width_aspect, $height_aspect);
	}
	
	 
	
	imagecopyresampled($image_p, $image, 0, 0, $cropStartX, $cropStartY, $width_aspect, $height_aspect, $width_orig, $height_orig);
	
	// Output
	imagejpeg($image_p, null, 100);
	
	
	
		// Create cache file
		$cache = "scache/";
	
	
		
		$path_parts = pathinfo($filename);
	
		$directory = $path_parts['dirname'];
		$imgfile = $path_parts['basename'];
		
		
		
		$new_imgfile = $width."x".$height."_".$imgfile;
		
	
		if(!is_dir($cache))
		 {
			 mkdir($cache, 0777);	
		 }
		
		if((!is_dir($cache.$directory)) && ($cache != ""))
		 {
			 mkdir($cache.$directory, 0777);	
		 }
		 
		 
		 
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
							echo $created_dir; 
							if(($created_dir!="") && (!is_dir($created_dir)))
							   {
								   mkdir($created_dir, 0777);
								    //chmod($created_dir, 0777);
							   }
				   
						}
				   }
				
				  
				   
			  }
			  
		  }
		 
		 
		
		
		
		$cache_path = $cache.$directory."/".$new_imgfile;
		
		imagejpeg($image_p, $cache_path, 100);

			
			
		
	}

 }//end else


?> 
