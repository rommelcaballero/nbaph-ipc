<?php
include('sql.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
<title>NBA Philippines | Writers</title>
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
   <div class="nbaph_recent_content">
      RECENT CONTENT
   </div>
<?php
include('news-writers_list.php');

include('mrec.php');
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