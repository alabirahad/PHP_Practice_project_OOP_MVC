<?php
require_once '../classes/database.php';
require_once '../classes/gallerycontrol.php';
$database = new Database();
$galleryControl = new GalleryControl();
$sql = $galleryControl->galleryShow();?>

<form action="" method="POST" enctype="multipart/form-data">
    <?php  foreach ($sql as $key => $row ){ ?>
        <div class="album-name">
            <a href="../view/filterPhoto.php?album_id=<?php echo $row['id']; ?>">
                <?php echo $row['album_name'] ?>
            </a>
        </div>
    <?php } ?>
</form>




