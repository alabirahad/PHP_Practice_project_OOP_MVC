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
                <div class="mainContent content">
                    <div class="col-md-4">
                        <div class="imgs">
                            <img src="../img/featureimg/index.jpg" alt="no photos">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="imgs">
                            <img src="../img/featureimg/2.jpg" alt="no photos">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="imgs">
                            <img src="../img/featureimg/3.jpg" alt="no photos">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="imgs">
                            <img src="../img/featureimg/4.jpg" alt="no photos">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="imgs">
                            <img src="../img/featureimg/5.jpg" alt="no photos">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="imgs">
                            <img src="../img/featureimg/6.jpg" alt="no photos">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="imgs">
                            <img src="../img/featureimg/7.jpg" alt="no photos">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="imgs">
                            <img src="../img/featureimg/8.jpg" alt="no photos">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="imgs">
                            <img src="../img/featureimg/9.jpg" alt="no photos">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<?php require_once '../view/footer.php'; ?>          