<?php
require_once '../classes/database.php';
require_once '../classes/LoginControl.php';
$database = new Database();
$login = new LoginControl();
if (isset($_POST['btn'])) {
    $login->login($_POST);
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
                                                    <li><a  href="../view/gallery.php">Gallery</a></li>
                                                    <li><a href="../view/document.php">Documents</a></li>
                                                    <li><a href="../view/registration.php">Sign Up</a></li>
                                                    <?php
                                                    if (isset($_SESSION['user'])) { ?>
                                                        <li class="login"><a href="../view/user.php">User</a></li>
                                                    <?php } ?>
                                                    <?php if (!isset($_SESSION['user'])) { ?>
                                                        <li class="login"><a class="active" href="../view/login.php">Login</a></li>
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
                        } ?>
                    </div>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="col-md-7">
                            <div class="loguser userName tableBox">
                                <input type="text" name="userName" placeholder="User Name">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="logpass password tableBox" >
                                <input type="password" name="password" placeholder="Password">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="submission tableBox">
                                <input type="submit" name="btn" value="Login">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require_once '../view/footer.php'; ?>  