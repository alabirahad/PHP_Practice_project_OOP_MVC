<?php

class Database {

    //    database Connection
    private $con;

    public function __construct() {

        $servername = "localhost";
        $username = "root";
        $password = "";


        $this->conn = new PDO("mysql:host=$servername;dbname=address", $username, $password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //$this->con = new mysqli('localhost', 'root', '', 'address');
    }

    //    data insert
    public function insert($table, $column, $values) {
        $query = $this->con->query("INSERT INTO " . $table . " (" . $column . ") VALUES (" . $values . ") ");
        return $query;
    }

    // full table select
    public function fullSelect($table) {
        
//      $stmt = $conn->prepare("SELECT id, firstname, lastname FROM MyGuests");
//      $stmt->execute();
        
        $sql = "SELECT * FROM   $table";
        $query = $con->prepare($sql);
        $query->execute();
        


//        $query = $this->con->query("SELECT * FROM " . $table . " ");
        return $query;
    }

    //    data select
    public function select($table, $id) {
        $query = $this->con->query("SELECT * FROM " . $table . " WHERE `id` = $id");

        if (isset($_POST['delete'])) {
            $row = $query->fetch_assoc();
            $path = '../img/' . $row['photo'];
        } else {

            return $query;
        }
    }

    //    data select Foreign key wise
    public function selectForeign($table, $id, $column) {
        $query = $this->con->query("SELECT * FROM " . $table . " WHERE " . $column . " = $id");

        if (isset($_POST['delete'])) {
            $row = $query->fetch_assoc();
            $path = '../img/' . $row['photo'];
            unlink($path);
        } else {

            return $query;
        }
    }

    //    data delete
    public function delete($table, $id) {
        $query = $this->con->query("DELETE FROM " . $table . " WHERE `id` = $id");
    }

    //    data update
    public function update($table, $values, $id) {
        $query = $this->con->query("UPDATE " . $table . " SET " . $values . " WHERE `id` =  $id");
    }

}
