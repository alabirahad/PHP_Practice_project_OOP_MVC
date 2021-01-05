<?php
require_once '../classes/database.php';
require_once '../classes/gallerycontrol.php';
$database = new Database();
$galleryControl = new GalleryControl();
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
                                                    session_start();
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="gallerButtons">
                            <?php if (isset($_SESSION['user'])) { ?>
                                <div class="col-md-3">
                                    <div class="albumCreate">
                                        <button type="button" class="collapsible"><h5>Create Album <i class="fa fa-chevron-down" aria-hidden="true"></i></h5></button>
                                        <div class="content" style="display: none">
                                            <?php require_once '../view/createAlbum.php'; ?>
                                        </div>
                                        <script src="../js/createAlbum.js"></script>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (isset($_SESSION['user'])) { ?>
                                <div class="col-md-3">
                                    <div class="uploadPhoto">
                                        <button type="button" class="collapsible2"><h5>Create Gallery <i class="fa fa-chevron-down" aria-hidden="true"></i></h5></button>
                                        <div class="content2" style="display: none">
                                            <?php require_once '../view/uploadPhoto.php'; ?>
                                        </div>
                                        <script src="../js/uploadPhoto.js"></script>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="col-md-3">
                                <div class="show-all-photos">
                                    <a href="../view/showAllPhotos.php" ><h5>All Photos</h5></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mainContent content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="all-photos">
                                <?php
                                $sql = $galleryControl->photoShow();
                                foreach ($sql as $key => $row ) {?>
                                    <div class="col-md-4">
                                        <div class="albumallphotos">
                                            <img src="<?php echo '../img/' . $row['photo'] ?>" alt="">
                                            <?php if (isset($_SESSION['user'])) { ?>
                                                <a class="editbtn" href="../view/galleryedit.php?album_id= <?php echo $row['id'] ?>"> ... </a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                <?php }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require_once '../view/footer.php'; ?>  