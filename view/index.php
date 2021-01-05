<?php require_once '../view/header.php'; ?>
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
                                                    <li ><a class="active" href="../view/index.php">Home</a></li>
                                                    <li><a  href="../view/gallery.php">Gallery</a></li>
                                                    <li><a href="../view/document.php">Documents</a></li>
                                                    <li><a href="../view/registration.php">Sign Up</a></li>
                                                    <?php
                                                    session_start();
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
                    <div class="col-md-5 homewrite">
                        <h1>Create<span>Gallery.</span></h1>
                        <p>For Your Every Moment</p>
                        <div><a  class="active" href="../view/gallery.php">Get Started-></a></div>
                    </div>
                    <div class="col-md-7 homeimage">
                        <div class="col-md-7">
                            <div class="img1"><img src="../img/back4.jpg"></div>
                            <div class="img2"><img src="../img/back3.jpg"></div>
                        </div>
                        <div class="col-md-5">
                            <div class="img3"><img src="../img/back.jpg"></div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>
<?php require_once '../view/footer.php'; ?>          