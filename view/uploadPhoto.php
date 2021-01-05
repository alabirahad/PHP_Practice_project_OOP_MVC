<?php
require_once '../classes/database.php';
require_once '../classes/gallerycontrol.php';
$database = new Database();
$galleryControl = new GalleryControl();
if (isset($_POST['upload'])) {
    $galleryControl->photoUpload($_POST);
} ?>
<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label>Select Album :</label>
        <select name="selectAlbum" >
            <?php
            $table = "albumdetails";
            $sql = $database->fullSelect($table);
            foreach ($sql as $key => $row ) { ?>
                <option value="<?php echo $row['id'] ?>"><?php echo $row['album_name'] ?></option>
            <?php } ?>
        </select>
        <br><br>
        <label>Upload Here :</label>
        <input type="file" name="uploadphoto" >
        <br><br>
        <input type="submit" name="upload" value="Upload">
    </div>

</form>