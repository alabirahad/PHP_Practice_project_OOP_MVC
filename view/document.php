<?php
session_start();
require_once '../classes/database.php';
require_once '../classes/Document.php';
$database = new Database();
$document = new Document();

if (isset($_POST['fileupload'])) {
    if (isset($_SESSION['user'])) {
        $id = $_SESSION['user'];
        $document->uploadDocument($_POST, $id);
    }
}

if (isset($_POST['delete'])) {
    $document->deleteDocument($_POST);
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
                                                    <li><a  href="../view/gallery.php">Gallery</a></li>
                                                    <li><a class="active" href="../view/document.php">Documents</a></li>
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
                <div class="row">
                    <div class="col-md-12">

                        <div class="success">
                            <?php
                            if (isset($_SESSION['msg'])) {
                                echo $_SESSION['msg'];
                                unset($_SESSION['msg']);
                            }
                            ?>
                        </div>

                        <h1>Documents</h1>
                        <?php if (isset($_SESSION['user'])) { ?>
                            <div class="col-md-12">
                                <div class="add-document">
                                    <button type="button" class="collapsible4"><h5>Add New Document <i class="fa fa-chevron-down" aria-hidden="true"></i></h5></button>
                                    <div class="content" style="display: none">
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label>File Name :</label>
                                                <input type="text" name="fileName" class="form-control">
                                                <br><br>
                                                <label>Upload File :</label>
                                                <input type="file" name="file">
                                                <br><br>



                                                <input type="submit" name="fileupload" value="Upload">
                                            </div>
                                        </form>
                                    </div>
                                    <script src="../js/document.js"></script>
                                </div>
                            </div>
                        <?php } ?>

                        <div class="mainContent content">
                            <div class="success">
                                <?php
                                if (isset($_SESSION['msg'])) {
                                    echo $_SESSION['msg'];
                                    unset($_SESSION['msg']);
                                }
                                ?>
                            </div>
                            <div class="docList">
                                <form action="" method="POST" enctype="multipart/form-data">

                                    <table class="user">
                                        <thead>
                                            <tr>
                                                <td>Serial</td>
                                                <td>Name</td>
                                                <td>Submitted Date</td>
                                                <td>Submitted By</td>
                                                <td>File</td>
                                                <td>Action</td>
                                            </tr>
                                        </thead>
                                        <?php
                                        $sql = $document->showDocument();
                                        $serial = 1;
                                        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                                            ?>
                                            <tbody class="table-body">
                                                <tr>
                                                    <td><?php echo $serial++; ?></td>
                                                    <td><?php echo $row['name'] ?></td>
                                                    <td><?php echo $row['date'] ?></td>
                                                    <td><?php echo $row['userName'] ?></td>

                                                    <?php
                                                    $ext = pathinfo($row['file'], PATHINFO_EXTENSION);
                                                    if ($ext == "pdf") {
                                                        $icon = "../img/pdf.svg";
                                                    } elseif ($ext == "docx") {
                                                        $icon = "../img/word.webp";
                                                    } elseif ($ext == "jpg") {
                                                        $icon = "../img/img.png";
                                                    } else {
                                                        $icon = "";
                                                    }
                                                    ?>
                                                    <td>
                                                        <img src="<?php echo $icon; ?>"/>
                                                    </td>


                                                    <td>
                                                        <div class="actions">
                                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                            <div class="update-action">    
                                                                <a href="../doc/<?= $row['file'] ?>" download="<?= $row['name'] ?>.<?= $ext ?>"> <img src="../img/download.png"/></a>
                                                            </div>
                                                            <div class="delete-action">
                                                                <button type="submit" name="delete">
                                                                    <img src="../img/del.png" />
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
<?php } ?>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require_once '../view/footer.php'; ?>  
