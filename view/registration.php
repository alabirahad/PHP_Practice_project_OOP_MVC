<?php
session_start();
require_once '../classes/database.php';
require_once '../classes/usercontrol.php';
$database = new Database();
$userControl = new UserControl();
if (isset($_POST['insert'])) {
    $userControl->userCreate($_POST);
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
                                                    <li><a class="active" href="../view/registration.php">Sign Up</a></li>
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="mainContent content">
                            <div class="success">
                                <?php
                                if (isset($_SESSION['msg'])) {
                                    echo $_SESSION['msg'];
                                    unset($_SESSION['msg']);
                                    echo "<meta http-equiv='refresh' content='1;url=../view/registration.php' >";
                                } ?>
                            </div>
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="col-md-6"> 
                                    <div class="fname tableBox">
                                        <input type="text" name="firstName" placeholder="First Name" required>
                                    </div>
                                </div>
                                <div class="col-md-6"> 
                                    <div class="lname tableBox">
                                        <input type="text" name="lastName" placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="col-md-6"> 
                                    <div class="username tableBox">
                                        <input type="text" name="userName" placeholder="User Name" required>
                                    </div>
                                </div>
                                <div class="col-md-6"> 
                                    <div class="email tableBox">
                                        <input type="email" name="email" placeholder="Email" value="@gmail.com" required>
                                    </div>
                                </div>
                                <div class="col-md-6"> 
                                    <div class="password tableBox">
                                        <input type="password" name="password" placeholder="Password" required>
                                    </div>
                                </div>
                                <div class="col-md-6"> 
                                    <div class="contact tableBox">
                                        <input type="text" name="contactNumber" placeholder="Contact Number">
                                    </div>
                                </div>
                                <div class="col-md-12"> 
                                    <div class="photo tableBox">
                                        <label>Photo :</label>
                                        <input type="file" name="photo" id="fileToUpload">
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
                                                require_once '../classes/database.php';
                                                $database = new Database();
                                                $table = "division";
                                                $sql = $database->fullSelect($table);
                                                foreach ($sql as $key => $row ) {
                                                    echo '<option value="' . $row['division_id'] . '">' . $row['division_name'] . '</option>';
                                                } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <select name="district" id="district_list" class="district">
                                                <option value="0">--- Select District ---</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <select name="thana" id="thanaId" class="thana-list">
                                                <option value="0">--- Select Thana ---</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="submission tableBox">
                                    <input type="submit" name="insert" value="REGISTER">
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
            var division_id = $(this).val();
            $.ajax({
                type: "POST",
                url: "ajax.php",
                dataType: "html",
                data: {
                    id: division_id
                },
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
                success: function (districts) {
                    $(".thana-list").html(districts);
                }
            });
        });
    });
</script>
<?php require_once '../view/footer.php'; ?>  