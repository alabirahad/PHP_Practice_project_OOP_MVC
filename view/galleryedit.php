<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("location: ../view/index.php");
}
require_once '../classes/database.php';
require_once '../classes/gallerycontrol.php';
$database = new Database();
$galleryControl = new GalleryControl();
if (isset($_POST['delete'])) {
    $galleryControl->photoDelete($_POST);
}
require_once '../view/header.php';
?>
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
                                                    if (isset($_SESSION['user'])) {
                                                        ?>
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
                            echo "<meta http-equiv='refresh' content='1;url=../view/gallery.php' >";
                        }
                        ?>
                    </div>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <table class="user">
                            <thead>
                                <tr>
                                    <td>Photo ID</td>
                                    <td>Photos</td>
                                    <td> Actions</td>
                                </tr>
                            </thead>
                            <?php
                            require_once '../classes/database.php';
                            $database = new Database();
                            $albumId = $_GET['album_id'];
                            $table = "albumphotos";
                            $column = "id";
                            $sql = $database->selectForeign($table, $albumId, $column);
                            foreach ($sql as $key => $row) {
                                ?>
                                <tr>
                                    <td><?php echo $row['id'] ?></td>
                                    <td><img src="<?php echo '../img/' . $row['photo'] ?>" alt=""></td>
                                    <td>
                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                        <input type="hidden" name="album_id" value="<?= $albumId ?>">
                                        <div class="actions">
                                            <div class="update-action">
                                                <a href="../view/photoupdate.php?update=<?php echo $row['id']; ?>"> <img src="../img/edit.png"/></a>
                                            </div>
                                            <div class="delete-action">
                                                <button type="submit" name="delete">
                                                    <img src="../img/del.png" />
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                            <?php } ?>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require_once '../view/footer.php'; ?>  