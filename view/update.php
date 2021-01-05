<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("location: ../view/index.php");
}
require_once '../classes/database.php';
require_once '../classes/usercontrol.php';
$database = new Database();
$userControl = new UserControl();
if (isset($_GET['update'])) {
    $id = $_GET['update'];
    $table = "registerperson";
    $user = $database->select($table, $id);
}
if (isset($_POST['update'])) {
    $userControl->userUpdate($_POST);
} ?>
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
                                                    <li ><a href="../view/index.php">Home</a></li>
                                                    <li><a  href="../view/gallery.php">Gallery</a></li>
                                                    <li><a href="../view/document.php">Documents</a></li>
                                                    <li><a href="../view/registration.php">Sign Up</a></li>
                                                    <?php
                                                    if (isset($_SESSION['user'])) { ?>
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="mainContent content">
                            <div class="success">
                                <?php
                                if (isset($_SESSION['msg'])) {
                                    echo $_SESSION['msg'];
                                    unset($_SESSION['msg']);
                                } ?>
                            </div>
                            <form action="" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                <div class="col-md-6"> 
                                    <div class="fname tableBox">
                                        <label>First Name :</label>
                                        <input type="text" name="firstName" value="<?= $user['firstName'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6"> 
                                    <div class="lname tableBox">
                                        <label>Last Name :</label>
                                        <input type="text" name="lastName" value="<?= $user['lastName'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6"> 
                                    <div class="username tableBox">
                                        <label>User Name :</label>
                                        <input type="text" name="userName" value="<?= $user['userName'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6"> 
                                    <div class="email tableBox">
                                        <label>Email :</label>
                                        <input type="email" name="email" value="<?= $user['email'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6"> 
                                    <div class="contact tableBox">
                                        <label>Contact Number :</label>
                                        <input type="text" name="contactNumber" value="<?= $user['number'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6"> 
                                    <div class="updatePhoto photo tableBox">
                                        <label>Photo :</label>
                                        <input type="file" name="photo" id="fileToUpload">
                                        <img src="../img/<?php echo $user['photo'] ?>">
                                        <input type="hidden" name="prev_photo" value="<?= $user['photo'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-12"> 
                                    <div class="address tableBox">
                                        <div class="col-md-12"> 
                                            <label>Address : <br><br></label>
                                        </div>
                                        <div class="col-md-4">
                                            <select name="division" id="division_list" class="division">
                                                <option value="0">--- Select Division ---</option>
                                                <?php
                                                $table = "division";
                                                $sql = $database->fullSelect($table);
                                                foreach ($sql as $key => $row ) {
                                                    $equation = ((!empty($user['division'])) && ($row['division_id'] == $user['division'])) ? "selected" : "";
                                                    echo '<option value="' . $row['division_id'] . '" ' . $equation . '>' . $row['division_name'] . '</option>';
                                                } ?>
                                            </select> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        </div>
                                        <div class="col-md-4">
                                            <select name="district" id="district_list" class="district">
                                                <option>--- Select District ---</option>
                                                <?php
                                                $divId = $user["division"];
                                                if (!empty($divId)) {
                                                    $table = "district";
                                                    $column = "division_id";
                                                    $sql = $database->selectForeign($table, $divId, $column);
                                                    foreach ($sql as $key => $row ) {
                                                        $equation = ((!empty($user['district'])) && ($row['district_id'] == $user['district'])) ? "selected" : "";
                                                        echo '<option value="' . $row['district_id'] . '" ' . $equation . '>' . $row['district_name'] . '</option>';
                                                    }
                                                } ?>

                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <select name="thana" id="thanaId" class="thana-list">
                                                <option>--- Select Thana ---</option>
                                                <?php
                                                $disId = $user["district"];
                                                if (!empty($disId)) {
                                                    $table = "thana";
                                                    $column = "district_id";
                                                    $sql = $database->selectForeign($table, $disId, $column);
                                                    foreach ($sql as $key => $row ) {
                                                        $equation = ((!empty($user['thana'])) && ($row['id'] == $user['thana'])) ? "selected" : "";
                                                        echo '<option value="' . $row['id'] . '" ' . $equation . '>' . $row['thana_name'] . '</option>';
                                                    }
                                                }?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="submission tableBox">
                                    <input type="submit" name="update" value="UPDATE">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(document).on("change", ".division", function () {
            var divisionId = $(this).val();
            $.ajax({
                type: "POST",
                url: "ajax.php",
                dataType: "html",
                data: {
                    id: divisionId
                },
                //cache: false,
                success: function (districts) {
                    $(".district").html(districts);
                    $('.district').trigger('change');
                }
            });
        });

        $(document).on("change", ".district", function () {
            var districtId = $(this).val();

            $.ajax({
                type: "POST",
                url: "ajax.php",
                dataType: "html",
                data: {
                    districtId: districtId
                },
                //cache: false,
                success: function (districts) {
                    $(".thana-list").html(districts);
                }
            });

        });

    });
</script>
<?php require_once '../view/footer.php'; ?>  