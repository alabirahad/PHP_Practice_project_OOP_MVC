<?php

class UserControl extends Database {

    public $database;

    public function __construct() {
        $this->database = new Database();
    }

    public function userCreate($data) {
        $fname = $_POST['firstName'];
        $lname = $_POST['lastName'];
        $userName = $_POST['userName'];
        $password = md5($_POST['password']);
        $email = $_POST['email'];
        $number = $_POST['contactNumber'];
        $photo = $_FILES['photo']['name'];
        $target = "../img/" . basename($photo);
        $tmp = $_FILES['photo']['tmp_name'];
        move_uploaded_file($tmp, $target);

        $division = $_POST['division'];
        $district = $_POST['district'];
        $thana = $_POST['thana'];
        $table = "registerperson";
        $col = "firstName,lastName,userName,password,email,number,photo,division,district,thana";
        $value = "'$fname','$lname','$userName','$password','$email','$number','$photo','$division','$district','$thana'";
        $this->database->insert($table, $col, $value);
    }

    public function userShow() {
        global $getPage;
        if (isset($_GET["page"])) {
            $getPage = $_GET["page"];
        }
        if ($getPage == "" || $getPage == 1) {
            $targetPage = 0;
        } else {
            $targetPage = ($getPage * 3) - 3;
        }
        $sql = $this->database->con->query("SELECT registerperson.*,division.division_name,district.district_name,thana.thana_name FROM registerperson left join division on registerperson.division = division.division_id left join district on registerperson.district = district.district_id left join thana on registerperson.thana = thana.id limit $targetPage, 3");
        $resultArr = [
            'targetpage' => $targetPage,
            'sql' => $sql
        ];
        return $resultArr;
    }

    public function userDelete($id) {
        $id = $_POST['id'];
        $table = "registerperson";
        // file delete
        $this->database->select($table, $id);
        $this->database->delete($table, $id);
        session_start();
        $_SESSION['msg'] = "Delete successfully!!";
        header("location: ../view/user.php");
    }

    public function userUpdate($id) {
        $id = $_POST['id'];
        $fname = $_POST['firstName'];
        $lname = $_POST['lastName'];
        $userName = $_POST['userName'];
        $email = $_POST['email'];
        $number = $_POST['contactNumber'];
        if (!empty($_FILES['photo']['name'])) {
            $photo = $_FILES['photo']['name'];
            $target = "../img/" . basename($photo);
            $tmp = $_FILES['photo']['tmp_name'];
            move_uploaded_file($tmp, $target);
        } else {
            $photo = $_POST['prev_photo'];
        }
        $division = $_POST['division'];
        $district = $_POST['district'];
        $thana = $_POST['thana'];
        $table = "registerperson";
        $value = "firstName = '" . $fname . "',
                lastName = '" . $lname . "',
                userName = '" . $userName . "',
                email = '" . $email . "',
                number = '" . $number . "',
                photo = '" . $photo . "',
                division = '" . $division . "',
                district = '" . $district . "',
                thana = '" . $thana . "'";
        $this->database->update($table, $value, $id);
        $_SESSION['msg'] = "User Updated succesfully!!!";
        header("refresh:1; url= ../view/user.php");
    }

    public function userSearch() {
        
    }

}
