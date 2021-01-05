<?php
session_start();
require_once '../classes/database.php';
$database = new Database();
require_once '../classes/database.php';
require_once '../classes/usercontrol.php';
$database = new Database();
$userControl = new UserControl();
require_once '../classes/Pagination.php';
$pagination = new Pagination();
if (isset($_POST['delete'])) {
    $userControl->userDelete($_POST);
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
                                                    <li><a href="../view/document.php">Documents</a></li>
                                                    <li><a href="../view/registration.php">Sign Up</a></li>
                                                    <?php if (isset($_SESSION['user'])) { ?>
                                                        <li class="login"><a class="active" href="../view/user.php">User</a></li>
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
                            echo "<meta http-equiv='refresh' content='1;url=../view/user.php' >";
                        }
                        ?>
                    </div>

                    <form action="filterUser.php" method="POST" enctype="multipart/form-data" class="user-search">
                        <input type="text" name="search" class="user-search-box">
                        <input type="submit" name="searchbtn" value="Search" class="user-search-btn">
                    </form>


                    <div class="userList">
                        <form action="" method="POST" enctype="multipart/form-data">

                            <table class="user">
                                <thead>
                                    <tr>
                                        <td>First Name</td>
                                        <td>Last Name</td>
                                        <td>Email</td>
                                        <td>Number</td>
                                        <td>Photo</td>
                                        <td>Division</td>
                                        <td>District</td>
                                        <td>Thana</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <?php
                                $search_value = $_POST["search"];
                                $sql = "SELECT registerperson.*,division.division_name,district.district_name,thana.thana_name FROM registerperson left join division on registerperson.division = division.division_id left join district on registerperson.district = district.district_id left join thana on registerperson.thana = thana.id where firstName like '%$search_value%'";
                                $query = $database->con->prepare($sql);
                                $query->execute();
                                while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <tbody class="table-body">
                                        <tr>
                                            <td><?php echo $row['firstName'] ?></td>
                                            <td><?php echo $row['lastName'] ?></td>
                                            <td><?php echo $row['email'] ?></td>
                                            <td><?php echo $row['number'] ?></td>
                                            <td><img src="<?php echo '../img/' . $row['photo'] ?>" alt=""></td>
                                            <td><?php echo $row['division_name'] ?></td>
                                            <td><?php echo $row['district_name'] ?></td>
                                            <td><?php echo $row['thana_name'] ?></td>
                                            <td>
                                                <div class="actions">
                                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                    <div class="update-action">    
                                                        <a href="../view/update.php?update=<?php echo $row['id']; ?>""> <img src="../img/edit.png"/></a> 
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
</section>
<?php require_once '../view/footer.php'; ?>   