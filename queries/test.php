<?php
include_once('sqli.php');
if(!$connect){
echo 'unable to connect!<br>';
}else{
echo 'connected!<br>';
}

$sql_string = "(SELECT  'blog' tablename, b.DatePosted, bo.Position, b.DisplayOn, b.BlogID, b.Blogger, b.BlogTitle, b.BlogLink, b.BlogExcerpt 
   FROM blog b JOIN blogorder bo ON bo.Blogger = b.Blogger ORDER BY b.DisplayOn DESC LIMIT 5)
   UNION
   (SELECT  'personalities' tablename, p.DatePosted, po.Position, p.DisplayOn, p.BlogID, p.Blogger, p.BlogTitle, p.BlogLink, p.BlogExcerpt 
   FROM personalities p JOIN personalitiesorder po ON po.Blogger = p.Blogger ORDER BY p.DisplayOn DESC LIMIT 5)
   ORDER BY DisplayOn DESC;";

   $results = mysqli_query($connect,$sql_string) or die('error');
   $last_blogger = "";
   $person_array = array();
   $blog_cnt = 0;

   while($row = mysqli_fetch_array($results)) {
         $person_array[$blog_cnt]['tablename'] = $row['tablename'];
         $person_array[$blog_cnt]['BlogID'] = $row['BlogID'];
         $person_array[$blog_cnt]['Blogger'] = $row['Blogger'];
         $person_array[$blog_cnt]['BlogTitle'] = $row['BlogTitle'];
         $person_array[$blog_cnt]['BlogLink'] = $row['BlogLink'];
         $person_array[$blog_cnt]['BlogExcerpt'] = $row['BlogExcerpt'];
         $blog_cnt += 1;
         $last_blogger = $row['Blogger'];
      
   }

foreach($person_array as $k => $v)
{
$writer_pic = strtolower(urlencode(str_replace("ñ", "n", $v['Blogger'])));
$writer_pic = preg_replace("/[^A-Za-z0-9 ]/", '', $writer_pic);
echo '
<img  src="../images/personalities/',$writer_pic,'.jpg" />
';
}



?>
