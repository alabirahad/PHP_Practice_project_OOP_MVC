<?php
require_once '../classes/database.php';
require_once '../classes/gallerycontrol.php';
$database = new Database();
$galleryControl = new GalleryControl();
if (isset($_POST['delete'])) {
    $galleryControl->galleryDelete($_POST);
}
$sql = $galleryControl->galleryShow();
//print_r($sql);exit;


if (!empty($sql)) {
    $albumCount = 0;?>
    <form action="" method="POST" enctype="multipart/form-data">
        <?php
        foreach ($sql as $key => $row ) {
            if ($albumCount == 0 || $albumCount % 3 == 0) {
                echo '<tr>';
            } ?>
            <div class="col-md-4 albums">
                <td class="albums">
                    <a href="../view/photoGallery.php?album_id=<?php echo $row['id']; ?>">
                        <span class="gallery-title"><?php echo $row['album_name'] . ':-' ?></span>
                        <img src="<?php echo '../img/' . $row['photo'] ?>" alt="">
                    </a>
                    <!--Album Edit Buttons Start-->
                    <?php if (isset($_SESSION['user'])) { ?>
                        <div class="albumeditbuttons">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <div class=" album-update">
                                <div class="">
                                    <a href="../view/albumupdate.php?update=<?php echo $row['id']; ?>"> <img src="../img/edit.png"/></a>
                                </div>
                            </div>
                            <div class=" album-delete">
                                <div class="">
                                    <button type="submit" name="delete">
                                        <img src="../img/del.png" />
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <!--Album Edit Buttons End-->
                </td>
            </div>
            <?php
            if (($albumCount + 1) % 3 == 0) {
                echo '</tr>';
            }
            $albumCount++;
        } ?>
    </form>
    <?php
}


