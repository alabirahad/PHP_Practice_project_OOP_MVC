<?php

class Database {
    //    database Connection
    public $con;
    public function __construct() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $this->con = new PDO("mysql:host=$servername;dbname=address", $username, $password);
    }

    //    data insert
    public function insert($table, $column, $values) {
        $query = $this->con->prepare("INSERT INTO " . $table . " (" . $column . ") VALUES (" . $values . ") ");
        $query->execute();
        return $query;
    }

    // full table select
    public function fullSelect($table) {
        $sql = "SELECT * FROM   $table";
        $query = $this->con->prepare($sql);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    //data select
    public function select($table, $id) {
        $query = $this->con->prepare("SELECT * FROM " . $table . " WHERE `id` = $id");
        $query->execute();
        if (isset($_POST['delete'])) {
            $row = $query->fetch(PDO::FETCH_ASSOC);
            $path = '../img/' . $row['photo'];
        } else {
            $result=$query->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
    }

    //    data select Foreign key wise
    public function selectForeign($table, $id, $column) {
        $query = $this->con->prepare("SELECT * FROM " . $table . " WHERE " . $column . " = $id");
        $query->execute();
        if (isset($_POST['delete'])) {
            $row = $query->fetch(PDO::FETCH_ASSOC);
            $path = '../img/' . $row['photo'];
            unlink($path);
        } else {
            $result=$query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }

    //    data delete
    public function delete($table, $id) {
        $query = $this->con->prepare("DELETE FROM " . $table . " WHERE `id` = $id");
        $query->execute();
    }

    //    data update
    public function update($table, $values, $id) {
        $query = $this->con->prepare("UPDATE " . $table . " SET " . $values . " WHERE `id` =  $id");
        $query->execute();
    }

}
