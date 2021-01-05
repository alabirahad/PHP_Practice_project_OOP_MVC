<?php

require_once '../classes/database.php';
$database = new Database();
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $table = "district";
    $column = "division_id";
    $sql = $database->selectForeign($table, $id, $column);

    echo "<option value='0'>" . "--- Select District ---" . "</option>";
    foreach ($sql as $key => $row ) {
        echo '<option value="' . $row['district_id'] . '">' . $row['district_name'] . '</option>';
    }
}

if (isset($_POST['districtId'])) {
    $id = $_POST['districtId'];

    $table = "thana";
    $column = "district_id";
    $sql = $database->selectForeign($table, $id, $column);

    echo "<option value='0'>" . "--- Select Thana ---" . "</option>";
    foreach ($sql as $key => $row ) {
        echo '<option value="' . $row['id'] . '">' . $row['thana_name'] . '</option>';
    }
}
