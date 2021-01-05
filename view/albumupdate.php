<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("location: ../view/index.php");
}
require_once '../classes/database.php';
require_once '../classes/gallerycontrol.php';
$database = new Database();
$galleryControl = new GalleryControl();
if (isset($_GET['update'])) {
    $id = $_GET['update'];
    $table = "albumdetails";
    $user = $database->select($table, $id);
}
if (isset($_POST['btn'])) {
    $i = 1;
    $galleryControl->galleryUpdate();
} 
require_once '../view/header.php'; ?>

<section>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-3">
                <div class="leftSidebar content">
                    <div class="mainMenu">
                        <div class="menu">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="menus">
                                        <nav class="navbar">
                                            <li class="toggle-button"><a href="#"><i class="fas fa-bars"></i></a></li>
                                            <div class="navbar-links">
                                                <ul>
                                                    <li ><a href="../view/index.php">Home</a></li>
                                                    <li><a class="active"  href="../view/gallery.php">Gallery</a></li>
                                                    <li><a href="../view/document.php">Documents</a></li>
                                                    <li><a href="../view/registration.php">Sign Up</a></li>
                                                    <?php
                                                    if (isset($_SESSION['user'])) { ?>
                                                        <li class="login"><a href="../view/user.php">User</a></li>
                                                    <?php } ?>
                                                    <?php if (!isset($_SESSION['user'])) { ?>
                                                        <li class="login"><a href="../view/login.php">Login</a></li>
                                                    <?php } else { ?>
                                                        <li class="login"><a href="../view/logout.php">Logout</a></li>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="mainContent content">
                    <div class="success">
                        <?php
                        if (isset($_SESSION['msg'])) {
                            echo $_SESSION['msg'];
                            unset($_SESSION['msg']);
                        }
                        ?>
                    </div>
                    <form action="" method="POST" enctype="multipart/form-data" class="album-edit">
                        <input type="hidden" name="id" value="<?= $user['id'] ?>">
                        <div>
                            <label>Album Name :</label>
                            <input type="text" name="albumname" value="<?= $user['album_name'] ?>">
                        </div>
                        <br><br>
                        <div>
                            <label>Cover Photo :</label>
                            <img src="../img/<?php echo $user['photo'] ?>">
                        </div>
                        <br><br>
                        <div>
                            <label>Change Cover Photo :</label>
                            <input type="file" name="photo">
                            <input type="hidden" name="prev_photo" value="<?= $user['photo'] ?>">
                        </div>
                        <br><br>
                        <div class="update-btn">
                            <input type="submit" name="btn" value="UPDATE">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require_once '../view/footer.php'; ?>  