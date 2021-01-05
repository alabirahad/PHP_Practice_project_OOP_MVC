<?php
class GalleryControl extends Database {
    public $database;
    public function __construct() {
        $this->database = new Database();
    }

    //gallery create
    public function galleryCreate($data) {
        $album_name = $_POST['albumname'];
        $album_name = str_replace("'", "''", $album_name);
        $album_photo = $_FILES['coverphoto']['name'];
        $target = "../img/" . basename($album_photo);
        $tmp = $_FILES['coverphoto']['tmp_name'];
        move_uploaded_file($tmp, $target);
        $table = "albumdetails";
        $col = "album_name,photo";
        $value = "'$album_name','$album_photo'";
        $sql = $this->database->insert($table, $col, $value);
        if (!$sql) {
            echo 'Not Inserted';
        } else {
            echo 'Album Create Succesfully';
        }
    }

    // gallery Show
    public function galleryShow() {
        $table = "albumdetails";
        $sql = $this->database->fullSelect($table);
        return $sql;
    }

    // gallery delete
    public function galleryDelete($id) {
        $id = $_POST['id'];
        $table = "albumdetails";
        // file delete
        $this->database->select($table, $id);
        $this->database->delete($table, $id);
    }

    //gallery update
    public function galleryUpdate() {
        $id = $_POST['id'];
        $album_name = $_POST['albumname'];
        if (!empty($_FILES['photo']['name'])) {
            $album_photo = $_FILES['photo']['name'];
            $target = "../img/" . basename($album_photo);
            $tmp = $_FILES['photo']['tmp_name'];
            move_uploaded_file($tmp, $target);
        } else {
            $album_photo = $_POST['prev_photo'];
        }
        $table = "albumdetails";
        $value = "album_name = '" . $album_name . "',
                photo = '" . $album_photo . "'";
        $this->database->update($table, $value, $id);
        $_SESSION['msg'] = "Album Updated successfully!!!";
        header("refresh:2; url= ../view/gallery.php");
    }

    //Photo Upload
    public function photoUpload($data) {
        $upload_photo = $_FILES['uploadphoto']['name'];
        $target = "../img/" . basename($upload_photo);
        $tmp = $_FILES['uploadphoto']['tmp_name'];
        $album_id = $_POST['selectAlbum'];
        move_uploaded_file($tmp, $target);
        $table = "albumphotos";
        $col = "photo,album_id";
        $value = "'$upload_photo','$album_id'";
        $sql = $this->database->insert($table, $col, $value);
        echo "<meta http-equiv='refresh';url=../view/photoGallery.php?album_id= $album_id' >";
    }

    //photo delete
    public function photoShow() {
        $albumId = $_GET['album_id'];
        $table = "albumphotos";
        $column="album_id";
        $sql = $this->database->selectForeign($table, $albumId, $column);
        return $sql;
    }

    //photo delete
    public function photoDelete($id) {
        $id = $_POST['id'];
        $albumId = $_POST['album_id'];
        $table = "albumphotos";
        // file delete
        $this->database->select($table, $id);
        $this->database->delete($table, $id);
        $_SESSION['msg'] = "Delete successfully!!";
        header("location: ../view/gallery.php");
    }

    //photo Update
    public function photoUpdate($id) {
        $id = $_POST['id'];
        $album_id = $_POST['selectAlbum'];
        if (!empty($_FILES['photo']['name'])) {
            $album_photo = $_FILES['photo']['name'];
            $target = "img/" . basename($album_photo);
            $tmp = $_FILES['photo']['tmp_name'];
            move_uploaded_file($tmp, $target);
        } else {
            $album_photo = $_POST['prev_photo'];
        }
        $table = "albumphotos";
        $value = "album_id = '" . $album_id . "',
                  photo = '" . $album_photo . "'";
        $this->database->update($table, $value, $id);
        $_SESSION['msg'] = "Photo Updated successfully!!!";
        header("refresh:2; url= ../view/gallery.php");
    }
}
