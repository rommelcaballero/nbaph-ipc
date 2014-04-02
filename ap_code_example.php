<?php
$apiKey = "xskh3zngppwgtv9d4z8z673b";
$count = 10; // how many results to return
$url = "http://api.ap.org/search?count=$count";

$query = "capsules"; // keyword to search
$howmanydays = 1; // how many days of content to search

// construct the query
$searchDate = date('Y-m-d', time() - ($howmanydays * 24 * 60 * 60));
$query .= ' AND arrivalDate>=' . $searchDate;    
$query = urlencode($query);    
$url .= "&q=$query&apiKey=$apiKey";

$output = file_get_contents($url); // grab the response from the API
$response = new SimpleXMLElement($output); // create an XML element based on XML string

// using the results, build an array of images with alt values and captions
$images = array(); 
$imageCount = 0;
foreach ($response->entry as $result) {    
    // check for a caption
    if(!isset($result->content[1]) || empty($result->content[1])) {
        $result->content[1] == '(no caption)';
    }
    // check for a title
    if(!isset($result->title) || empty($result->title)) {
        $result->title = '(no title)';
    }
    $images[$imageCount] = array('alt' => substr($result->title, 0, 40), 'caption' => $result->content[1]);

    // iterate through the results, pulling out binary links
    // note: some archived images do not have thumbnails or previews
    $images[$imageCount]['thumbnail'] = null;
    $images[$imageCount]['preview'] = null;
    $images[$imageCount]['main'] = null;
    for($i=0;$i<count($result->link);$i++) {
        $attribs = $result->link[$i]->attributes();
        switch($attribs['rel']) {
            case 'thumbnail': $images[$imageCount]['thumbnail'] = $attribs['href']; break;
            case 'preview': $images[$imageCount]['preview'] = $attribs['href']; break;
            case 'main': $images[$imageCount]['main'] = $attribs['href']; break;
        }
    }
    $imageCount++;
}
?>
<html>
<body>
<?php
// output the thumbnails, each wrapped in a link to the high-resolution image
foreach($images as $img) {
    if(!empty($img['thumbnail'])) {
        echo '<a href="' . $img['main'] . '"><img alt="' . $img['alt'] . '" src="' . $img['thumbnail'] . '&apiKey=' . $apiKey . '" /></a>';
    }
}
?> 
</body>
</html> 