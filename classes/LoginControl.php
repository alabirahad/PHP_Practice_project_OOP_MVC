<?php
class LoginControl extends Database {
    public $database;
    public function __construct() {
        session_start();
        $this->database = new Database();
    }
    public function login() {
        $userName = $_POST['userName'];
        $password = md5($_POST['password']);
        $sql = $this->database->con->prepare("select userName,password,id from registerperson where userName='$userName' AND password='$password'");
        $sql->execute();
        $row = $sql->rowCount();
        $data = $sql->fetch(PDO::FETCH_ASSOC);
        if ($row == 1) {
            $_SESSION['user'] = $data['id'];
            $_SESSION['msg'] = "Login Succesfully!!!";
            header("refresh:1; url= ../view/index.php");
        } else {
            $_SESSION['msg'] = "Login Unsuccesfully!!!";
        }
    }
    public function logout() {
        session_destroy();
        header("Location:../view/index.php");     
    }
}
