<?php
require_once '../classes/database.php';
require_once '../classes/gallerycontrol.php';
$database=new Database();
$galleryControl= new GalleryControl();

if (isset($_POST['create'])){
    $galleryControl->galleryCreate($_POST);
} ?>
<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
            <label>Album Name :</label>
            <input type="text" name="albumname" class="form-control">
            <br><br>
            <label>Cover Photo :</label>
            <input type="file" name="coverphoto">
            <br><br>
            <input type="submit" name="create" value="create">
    </div>
</form>