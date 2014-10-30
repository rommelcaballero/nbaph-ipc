<?php
include('sql.php');

$results = $connect->query("select * from eventsalbum order by SortOrder desc limit " . (intval($_POST['last']) * 10) . ", 10");

$count = 0;

if ($results->num_rows > 0) {
   while($row = $results->fetch_array()) {
      $res = $connect->query("select * from eventsphotos where AlbumID = '" . $row['AlbumID'] . "' limit 0, 1");
      $ph = $res->fetch_array();
?>
            <div class="nbaph_photos_more <?php
            if ($count % 2 == 0) {
               echo 'left';
            }
            ?>">
               <a href="events-album.php?album=<?php echo $row['AlbumID']; ?>">
                  <img src="<?php echo $ph['ImageSecond']; ?>" alt="<?php echo $ph['Caption']; ?>" />
               </a>

               <ul class="nbaph_photos_title">
                  <li><a href="events-album.php?album=<?php echo $row['AlbumID']; ?>"><?php echo stripslashes($row['AlbumName']); ?></a></li>
               </ul>
            </div>
<?php
      $count += 1;
   }
}
else {
   echo "none";
}

$connect->close();
?>