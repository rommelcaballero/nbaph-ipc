<?php
include('sql.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
<title>NBA Philippines | News</title>
<?php
include('head.php');
?>
<link rel="stylesheet" href="news.css" />
</head>

<body>
<?php
include('header.php');
?>

<div style="max-width: 993px; margin: 10px auto">
<?php
$results = $connect->query("select * from news order by DatePosted limit 0, 11");

include('news_headline.php');

include('mrec.php');
?>
   <div style="clear: both"></div>

<?php
include('news_more.php');
?>   

   <div style="clear: both"></div>
</div>

<?php
include('footer.php');
?>
</body>
</html>
<?php
$connect->close();
?>