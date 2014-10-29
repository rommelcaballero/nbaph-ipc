<?php
include('sql.php');

$results = $connect->query("select * from gallery order by GalleryID desc limit " . (intval($_POST['last']) * 10) . ", 10");

$count = 0;

if ($results->num_rows > 0) {
   while($row = $results->fetch_array()) {
      $res = $connect->query("select * from galleryphotos where GalleryID = '" . $row['GalleryID'] . "' limit 0, 1");
      $ph = $res->fetch_array();
?>
            <div class="nbaph_photos_more <?php
            if ($count % 2 == 0) {
               echo 'left';
            }
            ?>">
               <a href="photos-album.php?album=<?php echo $row['GalleryID']; ?>">
                  <img src="<?php echo $ph['ImageThumb']; ?>" alt="<?php echo $ph['Caption']; ?>" />
               </a>

               <ul class="nbaph_photos_title">
                  <li><a href="photos-album.php?album=<?php echo $row['GalleryID']; ?>"><?php echo stripslashes($row['GalleryName']); ?></a></li>
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