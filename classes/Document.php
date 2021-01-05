<?php

class Document extends Database {

    public $database;

    public function __construct() {
        $this->database = new Database();
    }

    //upload new document
    public function uploadDocument($data, $id) {
        $fileName = $_POST['fileName'];

        $allowed = array('docx', 'pdf', 'jpg');
        $uploadedFile = $_FILES['file']['name'];
        $ext = pathinfo($uploadedFile, PATHINFO_EXTENSION);
        if (!in_array($ext, $allowed)) {
            $_SESSION['msg'] = "This File Type Not Inserted!!!";
            header("refresh:1; url= ../view/document.php");
        } else {


            $target = "../doc/" . basename($uploadedFile);
            $tmp = $_FILES['file']['tmp_name'];
            move_uploaded_file($tmp, $target);

            date_default_timezone_set("Asia/Dhaka");
            $time = date("Y-m-d h:i");

            $table = "documents";
            $col = "name,file,date,user";
            $value = "'$fileName','$uploadedFile','$time','$id'";
            $sql = $this->database->insert($table, $col, $value);
            $_SESSION['msg'] = "File Inserted!!!";
            header("refresh:1; url= ../view/document.php");        }
    }

    public function showDocument() {
        $sql = $this->database->con->query("SELECT documents.*,registerperson.userName FROM documents left join registerperson on documents.user = registerperson.id");

        return $sql;
    }
    
    public function deleteDocument($id) {
        $id = $_POST['id'];
        $table = "documents";
        // file delete
//        $this->database->select($table, $id);
        $this->database->delete($table, $id);
        $_SESSION['msg'] = "Delete successfully!!";
        header("refresh:1; url= ../view/document.php");
    }

}
